<?php
/**
 * @todo make the variables safe for exec!!!
 */
  $bookmarklet = TRUE;
  if (count($_GET)) $bookmarklet = FALSE;

  $ref = (isset($_GET['ref']) ? $_GET['ref'] : '');
  $post = (isset($_GET['post']) ? $_GET['post'] : '');
  $sitename = (isset($_GET['sitename']) ? $_GET['sitename'] : '');
  $repo = (isset($_GET['repo']) ? $_GET['repo'] : 'dgit');
  $reponame = (isset($_GET['reponame']) ? $_GET['reponame'] : '');
  $version = (isset($_GET['version']) ? $_GET['version'] : '7');
  $url = (isset($_GET['url']) ? $_GET['url'] : '');
  $db = (isset($_GET['db']) ? $_GET['db'] : '');


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

	<link type="text/css" rel="stylesheet" media="all" href="css/bootstrap.css">
	<link type="text/css" rel="stylesheet" media="all" href="css/style.css">

	<link rel="icon" type="image/png" href="img/favicon.png">

	<title>Drush create-new-site Interface</title>
</head>
<body>
	<div id="wrapper">
		<h1>Create New Site</h1>
		<?php if($bookmarklet): ?>
			<div id='bookmarklet'>
				<?php $cns = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>

				<a id="icon" href="javascript:
        (function () {
            var jsCode1 = document.createElement('script');jsCode1.innerHTML = '
            var ajaxpath = \'http://<?php echo $cns; ?>?callback=true\';';
            document.body.appendChild(jsCode1);
            var jsCode = document.createElement('script');
            jsCode.setAttribute('src', 'http://<?php echo $cns; ?>/js/bookmarklet.js');
            document.body.appendChild(jsCode);}()
          );
        "
        >
					+ CNS
				</a>
				<h2>Drag this icon to your bookmarks bar</h2>
			</div>
		<?php endif; ?>

    <?php if (isset($drush)): ?>
    	<div id='drush-make'><?php echo $drush; ?></div>"
    <?php else: ?>
			<?php include 'cns-form.php'; ?>
		<?php endif; ?>

	</div>
</body>
</html>
