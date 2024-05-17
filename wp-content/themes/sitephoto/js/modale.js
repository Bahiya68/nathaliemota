console.log("Modale OK");

document.addEventListener("DOMContentLoaded", (event) => {
  // Get the modal
  var modal = document.getElementById("myModal");

  // Check if modal exists
  if (!modal) return;

  // Get the buttons that open the modal
  var btn = document.getElementById("menu-item-14");
  var btn2 = document.getElementById("myBtn");
  var btn3 = document.getElementById("CONTACT");

  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close")[0];

  // Get the reference input field
  var referenceInput = document.getElementById("reference");
  console.log("test 3");

  // Function to open the modal and prefill the reference field if necessary
  function openModal() {
    modal.style.display = "block";
    //console.log("test 2");

    if (referenceInput) {
      var refPhotoField = document.querySelector(
        '.boiterefphoto input[type="text"]'
      );
      //console.log("testr");
      var refPhotoValue = document.querySelector(".ref-val").textContent;
      if (refPhotoField) {
        refPhotoField.value = refPhotoValue;
      }
    }
  }

  // Add event listeners to buttons
  if (btn) btn.onclick = openModal;
  if (btn2) btn2.onclick = openModal;
  if (btn3) btn3.onclick = openModal;

  // When the user clicks on <span> (x), close the modal
  if (span) {
    span.onclick = function () {
      modal.style.display = "none";
    };
  }

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function (event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  };
});
