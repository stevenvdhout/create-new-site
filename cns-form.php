<div id="drush-form">
  <h2>Fill in this form</h2>
  <form class="form-horizontal" method="post" enctype="multipart/form-data">

    <div class="control-group">
      <label class="control-label">drupal version</label>
      <div class="controls">
        <select name="version">
          <option value="6"<?php if ($version == 6) echo ' selected'; ?>>6</option>
          <option value="7"<?php if ($version == 7) echo ' selected'; ?>>7</option>
        </select>
      </div>
    </div>
    <div class="control-group">
      <label class="control-label">Site name</label>
      <div class="controls"><input type="text" class="input-large" name="sitename" value="<?php echo $sitename; ?>"></div>
    </div>
    <div class="control-group">
      <label class="control-label">repository</label>
      <div class="controls">
        <select name="repo">
          <option value="dgit"<?php if ($version == 'dgit') echo ' selected'; ?>>dgit</option>
          <option value="git"<?php if ($version == 'git') echo ' selected'; ?>>git</option>
          <option value="svn"<?php if ($version == 'svn') echo ' selected'; ?>>svn</option>
        </select>
      </div>
    </div>
    <div class="control-group">
      <label class="control-label">repo name</label>
      <div class="controls"><input type="text" class="input-large" name="reponame" value="<?php echo $reponame; ?>"></div>
    </div>
    <div class="control-group">
      <label class="control-label">site url</label>
      <div class="controls"><input type="text" class="input-large" name="url" value="<?php echo $url; ?>"></div>
    </div>
    <div class="control-group">
      <label class="control-label">newdb</label>
      <div class="controls"><input type="text" class="input-large" name="db" value="<?php echo $db; ?>"></div>
    </div>
    <div class="control-group">
      <label class="control-label">Database</label>
      <div class="controls"><input type="file" class="filestyle" name="dbfile" value="<?php echo $dbfile; ?>"></div>
    </div>
    <div class="control-group">
      <div class="controls">
        <input type="hidden" name="post" value="post">
        <input class="btn" type="submit" value="Go">
       </div>
    </div>
  </form>

</div>
