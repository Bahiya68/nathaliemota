console.log("Modale OK");

// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("menu-item-14");
var btn2 = document.getElementById("myBtn");
var btn3 = document.getElementById("CONTACT");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// Get the reference input field
var referenceInput = document.getElementById("reference");

// When the user clicks the button, CONTACT
btn.onclick = function () {
  modal.style.display = "block";
};

// When the user clicks the button, CONTACT
btn2.onclick = function () {
  modal.style.display = "block";
};

btn2.onclick = function () {
  // Afficher la modale
  modal.style.display = "block";

  // Préremplir le champ de référence de la photo
  var refPhotoField = document.querySelector(
    '.boiterefphoto input[type="text"]'
  );
  var refPhotoValue = document.querySelector(".ref-val").textContent;
  refPhotoField.value = refPhotoValue;
};

// When the user clicks the button, CONTACT
btn3.onclick = function () {
  modal.style.display = "block";
};

// When the user clicks on <span> (x), close the modal
span.onclick = function () {
  modal.style.display = "none";
};

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
};
