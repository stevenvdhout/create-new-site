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
    var url = window.location.host;
    var output = "<div id='cns-bookmarklet-output' style='margin: 0px 25%; position: absolute; width: 50%; height: 600px; display: block; z-index: 999;'><iframe width='680px' height='650px' src='" + ajaxpath + "&ref=" + url + "'></iframe></div>";
    jQuery('body').prepend(output);
}
