// add jquery to the plugin
if (!($ = window.jQuery)) { // typeof jQuery=='undefined' works too
  script = document.createElement( 'script' );
  script.src = 'http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js';
  script.onload=bookmarklet;
  document.body.appendChild(script);
}
else {
  bookmarklet();
}

function bookmarklet() {

    // get the drupal version
    var version = 6;
    if (jQuery('meta[name=Generator]').attr('content') == "Drupal 7 (http://drupal.org)") version = 7;
    if (jQuery('meta[name=generator]').attr('content') == "Drupal 7 (http://drupal.org)") version = 7;

    var url = window.location.host;
    var output = "<div id='cns-bookmarklet-output' style='margin: 0px 25%; position: absolute; display: block; z-index: 9999;'><iframe width='680px' height='700px' frameborder='0' src='" + ajaxpath + "&ref=" + url + "&v=" + version + "'></iframe></div>";
    jQuery('body').prepend(output);

    // download the database
    var bam = '/admin/content/backup_migrate/export/quick';
    if (version == 7) {
      bam = '/admin/config/system/backup_migrate/export/quick';

      jQuery('body').append('<div id="bam">test</div>');
      jQuery('#bam').hide();
      jQuery('#bam').load("http://" + url + bam, function() {
        jQuery('#backup-migrate-ui-manual-quick-backup-form .form-submit').click();
      });
    }

}
