jQuery(document).ready(function($) {
  $(document).foundation();

  $('a[href="http://mail"]').replaceWith('<n uers=\"znvygb:pbagnpg@enqvngrqcvkry.pbz\">pbagnpg@enqvngrqcvkry.pbz</n>'.replace(/[a-zA-Z]/g, function (c) {
    return String.fromCharCode((c <= "Z" ? 90 : 122) >= (c = c.charCodeAt(0) + 13) ? c : c - 26);
  }));
  $('#feedback').replaceWith('<n uers=\"znvygb:bssvpr@znahryjvrfre.pbz?fhowrpg=Srrqonpx sbe Enqvngrq Cvkry\" gnetrg=\"_oynax\">Fraq n zrffntr gb Znahry Jvrfre!</n>'.replace(/[a-zA-Z]/g, function (c) {
    return String.fromCharCode((c <= "Z" ? 90 : 122) >= (c = c.charCodeAt(0) + 13) ? c : c - 26);
  }));

  $('.menu-item a').click(function() {
    $('.menu-item').removeClass('current-menu-item');
    $(this).parent().addClass('current-menu-item');
  });
});

jQuery(window).load(function() {
  var firstContentPanel = jQuery('.post:first-of-type .panel');
  var firstSidebarPanel = jQuery('.widget:first-of-type ul');
  var firstSidebarTitle = jQuery('.widget:first-of-type .widget-title');

  if (typeof firstContentPanel.offset() !== 'undefined') {
    if (firstContentPanel.offset().top < jQuery('#primary').height()) {
      firstSidebarTitle.css('marginTop', 0);
      firstSidebarTitle.css('marginTop', firstContentPanel.offset().top - firstSidebarPanel.offset().top);
    }
  }
});