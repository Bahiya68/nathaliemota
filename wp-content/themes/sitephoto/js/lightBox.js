// Lightbox Gallery
console.log("Lightbox OK");

// Fonction pour initialiser la lightbox
function initLightbox() {
  const lightboxEnabled = document.querySelectorAll(".lightbox-enabled");
  const lightboxArray = Array.from(lightboxEnabled);
  const lastImage = lightboxArray.length - 1;
  const lightboxContainer = document.querySelector(".lightbox-container");
  const lightboxImage = document.querySelector(".lightbox-image");
  const lightboxBtns = document.querySelectorAll(".lightbox-btn");
  const lightboxBtnRight = document.querySelector("#right");
  const lightboxBtnLeft = document.querySelector("#left");
  const close = document.querySelector("#close");
  let activeImage;

  const showLightBox = () => {
    lightboxContainer.classList.add("active");
  };

  const hideLightBox = () => {
    lightboxContainer.classList.remove("active");
  };

  const setActiveImage = (image) => {
    if (
      image &&
      image.dataset &&
      image.dataset.imgsrc &&
      image.dataset.reference &&
      image.dataset.categorie
    ) {
      lightboxImage.src = image.dataset.imgsrc;
      activeImage = lightboxArray.indexOf(image);

      const reference = image.dataset.reference;
      const category = image.dataset.categorie;
      document.querySelector(".lightbox_reference").innerText = reference;
      document.querySelector(".lightbox_categorie").innerText = category;
    } else {
      console.error(
        "Image or its dataset is undefined or missing required attributes."
      );
    }
  };

  const transitionSlidesLeft = () => {
    if (typeof activeImage === "undefined") return;
    lightboxBtnLeft.focus();
    $(".lightbox-image").addClass("slideright");
    setTimeout(function () {
      activeImage === 0
        ? setActiveImage(lightboxArray[lastImage])
        : setActiveImage(lightboxArray[activeImage - 1]);
    }, 250);

    setTimeout(function () {
      $(".lightbox-image").removeClass("slideright");
    }, 500);
  };

  const transitionSlidesRight = () => {
    if (typeof activeImage === "undefined") return;
    lightboxBtnRight.focus();
    $(".lightbox-image").addClass("slideleft");
    setTimeout(function () {
      activeImage === lastImage
        ? setActiveImage(lightboxArray[0])
        : setActiveImage(lightboxArray[activeImage + 1]);
    }, 250);
    setTimeout(function () {
      $(".lightbox-image").removeClass("slideleft");
    }, 500);
  };

  const transitionSlideHandler = (moveItem) => {
    moveItem.includes("left")
      ? transitionSlidesLeft()
      : transitionSlidesRight();
  };

  lightboxEnabled.forEach((image) => {
    image.addEventListener("click", (e) => {
      showLightBox();
      setActiveImage(image);
    });
  });

  lightboxContainer.addEventListener("click", () => {
    hideLightBox();
  });

  close.addEventListener("click", () => {
    hideLightBox();
  });

  lightboxBtns.forEach((btn) => {
    btn.addEventListener("click", (e) => {
      e.stopPropagation();
      transitionSlideHandler(e.currentTarget.id);
    });
  });

  lightboxImage.addEventListener("click", (e) => {
    e.stopPropagation();
  });
}

// Appel de la fonction initLightbox au chargement initial de la page
document.addEventListener("DOMContentLoaded", function () {
  initLightbox();
});
