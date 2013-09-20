<?php
/**
 * @todo make the variables safe for exec!!!
 */
define('DOWNLOAD_PATH', 'db/');

  $cns = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

  $bookmarklet = TRUE;
  if (count($_POST) || isset($_GET['ref'])) $bookmarklet = FALSE;

  $ref = (isset($_GET['ref']) ? $_GET['ref'] : '');
  $post = (isset($_POST['post']) ? $_POST['post'] : '');
  $sitename = (isset($_POST['sitename']) ? $_POST['sitename'] : '');
  $repo = (isset($_POST['repo']) ? $_POST['repo'] : 'dgit');
  $reponame = (isset($_POST['reponame']) ? $_POST['reponame'] : '');
  $version = (isset($_POST['version']) ? $_POST['version'] : '7');
  $url = (isset($_POST['url']) ? $_POST['url'] : '');
  $db = (isset($_POST['db']) ? $_POST['db'] : '');
  $dbfile = (isset($_POST['dbfile']) ? $_POST['dbfile'] : '');
  if ($_FILES) {
    $ext = pathinfo($_FILES['dbfile']['name'], PATHINFO_EXTENSION);
    $new_filename = "$sitename-" . date('Y-m-d-H-i') . ".$ext";
    $target_path = DOWNLOAD_PATH . $new_filename;
    if(move_uploaded_file($_FILES['dbfile']['tmp_name'], $target_path)) {
      $dbfilepath = $_SERVER['DOCUMENT_ROOT'] . "/$target_path";
    }
  }


  if ($ref) {
  	$eref = explode('.', $ref);
  	if ($eref[0] == 'www') $project = $eref[1];
  	else $project = $eref[0];

  	if (!$sitename) $sitename = $project;
  	if (!$db) $db = str_replace('-', '_', $project);
    if (!$reponame) $reponame = $project;
  	if (!$url) $url = $ref;
  }

  if ($sitename && $post) {
    $drush = "sudo drush cns $sitename";

    if ($db) {
      $drush .= " --newdb=$db";
      if ($version) $drush .= " --cs=$version";
      if ($dbfilepath) $drush .= " --dbpath=" . $dbfilepath;
    }
    if ($reponame) {
      if ($repo == 'git') $drush .= " --git=$reponame";
      if ($repo == 'dgit') $drush .= " --dgit=$reponame";
      if ($repo == 'svn') $drush .= " --svn=$reponame";
    }
    if ($url) $drush .= " --files=$url";
  }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<script src="js/jquery-1.8.2.min.js" type="text/javascript"></script>
  <script src="js/bootstrap-filestyle.min.js" type="text/javascript"></script>

	<link type="text/css" rel="stylesheet" media="all" href="css/bootstrap.css">
	<link type="text/css" rel="stylesheet" media="all" href="css/style.css">

	<link rel="icon" type="image/png" href="img/favicon.png">

	<title>Drush create-new-site Interface</title>
</head>
<body>
	<div id="wrapper">
		<h1>Create New Site</h1>
		<?php if($bookmarklet): ?>
			<?php include 'bookmarklet.php'; ?>
		<?php endif; ?>

    <?php if (isset($drush)): ?>
    	<div id='drush-make'><?php echo $drush; ?></div>"
    <?php else: ?>
			<?php include 'cns-form.php'; ?>
		<?php endif; ?>

	</div>
  <script>
    //$(".filestyle").filestyle({input: false});
  </script>
</body>
</html>
