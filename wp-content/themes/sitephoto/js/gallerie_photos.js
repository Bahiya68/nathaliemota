// Lightbox Gallery
console.log("Lightbox OK");
// query selectors
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
// Functions
const showLightBox = () => {
  lightboxContainer.classList.add("active");
};

const hideLightBox = () => {
  lightboxContainer.classList.remove("active");
};

const setActiveImage = (image) => {
  lightboxImage.src = image.dataset.imgsrc;
  activeImage = lightboxArray.indexOf(image);
};

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

// Query selectors for reference and categorie
const lightboxArray2 = Array.from(lightboxEnabled);
const lightboxArray3 = Array.from(lightboxEnabled);
const lastReference = lightboxArray2.length - 1;
const lastCategorie = lightboxArray3.length - 1;
const lightboxContainer2 = document.querySelector(".lightbox-container");
const lightboxContainer3 = document.querySelector(".lightbox-container");
const lightboxReference = document.querySelector(".lightbox_reference");
const lightboxCategorie = document.querySelector(".lightbox_categorie");
let activeReference;
let activeCategorie;

//**************Reference ***************/
// Functions
const showLightBox2 = () => {
  lightboxContainer2.classList.add("active");
};

const hideLightBox2 = () => {
  lightboxContainer2.classList.remove("active");
};
const setActiveReference = (element) => {
  lightboxReference.textContent = element.dataset.reference;
  activeReference = lightboxArray2.indexOf(element);
};

const transitionSlidesLeft2 = () => {
  lightboxBtnLeft.focus();
  $(".lightbox_reference").addClass("slideright");
  setTimeout(function () {
    activeReference === 0
      ? setActiveReference(lightboxArray2[lastReference])
      : setActiveReference(lightboxArray2[activeReference - 1]);
  }, 250);

  setTimeout(function () {
    $(".lightbox_reference").removeClass("slideright");
  }, 500);
};

const transitionSlidesRight2 = () => {
  lightboxBtnRight.focus();
  $(".lightbox_reference").addClass("slideleft");
  setTimeout(function () {
    activeReference === lastReference
      ? setActiveReference(lightboxArray2[0])
      : setActiveReference(lightboxArray2[activeReference + 1]);
  }, 250);
  setTimeout(function () {
    $(".lightbox_reference").removeClass("slideleft");
  }, 500);
};

const transitionSlideHandler2 = (moveItem) => {
  moveItem.includes("left") ? transitionSlidesLeft() : transitionSlidesRight();
};

// Event Listeners
lightboxEnabled.forEach((element) => {
  element.addEventListener("click", (e) => {
    showLightBox2();
    setActiveReference(element);
  });
});

lightboxContainer2.addEventListener("click", () => {
  hideLightBox2();
});

close.addEventListener("click", () => {
  hideLightBox2();
});

lightboxBtns.forEach((btn) => {
  btn.addEventListener("click", (e) => {
    e.stopPropagation();
    transitionSlideHandler2(e.currentTarget.id);
  });
});

lightboxReference.addEventListener("click", (e) => {
  e.stopPropagation();
});

//****************************************Categorie *************************************************/
// Functions
const showLightBox3 = () => {
  lightboxContainer3.classList.add("active");
};

const hideLightBox3 = () => {
  lightboxContainer3.classList.remove("active");
};
const setActiveCategorie = (element) => {
  lightboxCategorie.textContent = element.dataset.categorie;
  activeCategorie = lightboxArray3.indexOf(element);
};

const transitionSlidesLeft3 = () => {
  lightboxBtnLeft.focus();
  $(".lightbox_categorie").addClass("slideright");
  setTimeout(function () {
    activeCategorie === 0
      ? setActiveCategorie(lightboxArray3[lastCategorie])
      : setActiveCategorie(lightboxArray3[activeCategorie - 1]);
  }, 250);

  setTimeout(function () {
    $(".lightbox_categorie").removeClass("slideright");
  }, 500);
};

const transitionSlidesRight3 = () => {
  lightboxBtnRight.focus();
  $(".lightbox_categorie").addClass("slideleft");
  setTimeout(function () {
    activeCategorie === lastCategorie
      ? setActiveCategorie(lightboxArray3[0])
      : setActiveCategorie(lightboxArray3[activeCategorie + 1]);
  }, 250);
  setTimeout(function () {
    $(".lightbox_categorie").removeClass("slideleft");
  }, 500);
};

const transitionSlideHandler3 = (moveItem) => {
  moveItem.includes("left") ? transitionSlidesLeft() : transitionSlidesRight();
};

// Event Listeners
lightboxEnabled.forEach((element) => {
  element.addEventListener("click", (e) => {
    showLightBox3();
    setActiveCategorie(element);
  });
});

lightboxContainer3.addEventListener("click", () => {
  hideLightBox3();
});

close.addEventListener("click", () => {
  hideLightBox3();
});

lightboxBtns.forEach((btn) => {
  btn.addEventListener("click", (e) => {
    e.stopPropagation();
    transitionSlideHandler3(e.currentTarget.id);
  });
});

lightboxCategorie.addEventListener("click", (e) => {
  e.stopPropagation();
});
