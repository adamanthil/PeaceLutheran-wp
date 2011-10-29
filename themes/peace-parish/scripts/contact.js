// Dom Ready
jQuery(document).ready(function($) {
  
  // Define getUrlVars jQuery extension
  $.extend({
    getUrlVars: function(){
      var vars = [], hash;
      var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
      for(var i = 0; i < hashes.length; i++)
      {
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = unescape(hash[1]);
      }
      return vars;
    },
    getUrlVar: function(name){
      return $.getUrlVars()[name];
    }
  });
  
  // var selectorId = '#si_contact_CID1';
  var name = $.getUrlVar('n');
  var val;
  
  if(name) {
    console.log(name);
    $('select option').each(function() {
      if($(this).text() == name) {
        val = $(this).val();
      }
    });
    $('select').val(val);
  }

});