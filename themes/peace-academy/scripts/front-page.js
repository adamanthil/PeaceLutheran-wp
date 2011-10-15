// Dom Ready
jQuery(document).ready(function($) {
  $.fn.cycle.defaults.speed   = 900;
  $.fn.cycle.defaults.timeout = 6000;
  $('#main-pics').cycle();
  $('#mid').cycle();
});