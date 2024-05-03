// Lightbox Gallery
console.log("Lightbox OK");
// query selectors des éléments du lightbox
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

//****************************************Image *************************************************/
// Functions :  Affiche la lightbox en ajoutant la classe "active" au conteneur
const showLightBox = () => {
  lightboxContainer.classList.add("active");
};

const hideLightBox = () => {
  lightboxContainer.classList.remove("active");
};
//Affiche une image spécifique dans la lightbox en changeant la source de l'image et en affichant les données supplémentaires telles que la référence et la catégorie.
const setActiveImage = (image) => {
  lightboxImage.src = image.dataset.imgsrc;
  activeImage = lightboxArray.indexOf(image);

  // Récupérer et afficher les données supplémentaires
  const reference = image.dataset.reference;
  const category = image.dataset.categorie;
  document.querySelector(".lightbox_reference").innerText = reference;
  document.querySelector(".lightbox_categorie").innerText = category;
};

//Gèrent la transition entre les images
const transitionSlidesLeft = () => {
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

//Gère le mouvement de la transition en fonction de l'élément (gauche ou droit).
const transitionSlideHandler = (moveItem) => {
  moveItem.includes("left") ? transitionSlidesLeft() : transitionSlidesRight();
};

// Event Listeners
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


