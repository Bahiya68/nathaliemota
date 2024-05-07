console.log("LoadMoreAjax OK");

jQuery(document).ready(function ($) {
  $("#load-more").on("click", function (e) {
    e.preventDefault();

    var offset = $(this).data("offset");

    $.ajax({
      type: "POST",
      url: "./wp-admin/admin-ajax.php",
      data: {
        action: "charger_plus_de_photos",
        offset: offset,
      },
      success: function (response) {
        $("#bouton_charger_plus").before(response);
        $("#load-more").data("offset", offset + 1);
      },
    });
  });
});
