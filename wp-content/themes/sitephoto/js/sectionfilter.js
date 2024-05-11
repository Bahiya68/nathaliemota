console.log("Filter OK");

jQuery(document).ready(function ($) {
  // Événement de changement sur les éléments de formulaire
  $(".filter-select").on("change", function () {
    // Récupère les données du formulaire
    var formData = $("#filter-form").serialize();
    console.log(formData); // Vérifiez les données dans la console

    // Effectue la requête AJAX
    $.ajax({
      type: "GET",
      url: ajaxurl,
      data: formData + "&action=my_photo_filter", // Ajoutez l'action pour WordPress
      success: function (response) {
        // Met à jour la liste des photos avec la réponse du serveur
        $(".gallery-container").html(response);

        // Réinitialiser la lightbox pour les nouvelles photos
        initLightbox();
      },

      error: function (xhr, status, error) {
        console.error(xhr.responseText); // Affichez l'erreur dans la console
      },
    });
  });
});
