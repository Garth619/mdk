jQuery(function ($) { 

	$( "#onep21-alertbar" ).prependTo("body");

	if (!Cookies.get("onep21-alert")) {
      $("#onep21-alertbar").css("display", "block");

      $(".onep21-alertbar-btn").click(function () {
        Cookies.set('onep21-alert', false, { expires: 1 })
        $("#onep21-alertbar").slideUp("slow");
      });
    }

});