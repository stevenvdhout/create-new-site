<div id='bookmarklet'>
  <a id="icon" href="javascript:
  (function () {
      var jsCode1 = document.createElement('script');jsCode1.innerHTML = '
      var ajaxpath = \'http://<?php echo $cns; ?>?callback=true\';';
      document.body.appendChild(jsCode1);
      var jsCode = document.createElement('script');
      jsCode.setAttribute('src', 'http://<?php echo $cns; ?>js/bookmarklet.js');
      document.body.appendChild(jsCode);}()
    );
  ">
    + CNS
  </a>
  <h2>Drag this icon to your bookmarks bar</h2>
</div>
