console.log("LoadMoreAjax OK");

jQuery(document).ready(function ($) {
  $("#load-more").on("click", function (e) {
    e.preventDefault();
    var offset = $(this).data("offset");
    var postsPerPage = $(this).data("posts-per-page");
    var ajaxUrl = $(this).data("ajaxurl");

    $.ajax({
      type: "POST",
      url: ajaxUrl,
      data: {
        action: "charger_plus_de_photos",
        offset: offset,
        posts_per_page: postsPerPage,
      },
      success: function (response) {
        $("#bouton_charger_plus").before(response);
        $("#load-more").data("offset", offset + 1);
      },
    });
  });
});
