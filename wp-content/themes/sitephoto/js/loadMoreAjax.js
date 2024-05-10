console.log("LoadMoreAjax OK");

// Fonction pour charger plus de photos via AJAX
jQuery(document).ready(function ($) {
  $("#load-more").on("click", function () {
    var offset = $(this).data("offset");
    var ajaxurl = $(this).data("ajaxurl");

    $.ajax({
      url: ajaxurl,
      type: "POST",
      data: {
        action: "charger_plus_de_photos",
        offset: offset,
      },
      success: function (response) {
        if (response.success) {
          $(".gallery-container").append(response.data);
          $("#load-more").data("offset", offset + 1);

          // Réinitialiser la lightbox pour les nouvelles photos
          initLightbox();
        } else {
          alert("No more photos found.");
        }
      },
    });
  });
});
