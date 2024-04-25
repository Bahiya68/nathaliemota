console.log("Filter OK");

// Change option 1 selected
const label = document.querySelector(".dropdown__filter-selected");
const options = Array.from(
  document.querySelectorAll(".dropdown__select-option")
);

options.forEach((option) => {
  option.addEventListener("click", () => {
    label.textContent = option.textContent;
  });
});

// Close dropdown onclick outside
document.addEventListener("click", (e) => {
  const toggle = document.querySelector(".dropdown__switch");
  const element = e.target;

  if (element == toggle) return;

  const isDropdownChild = element.closest(".dropdown__filter");

  if (!isDropdownChild) {
    toggle.checked = false;
  }
});

//******* Change option 2 selected

// Change option 1 selected
const label2 = document.querySelector(".dropdown2__filter-selected2");
const options2 = Array.from(
  document.querySelectorAll(".dropdown2__select-option2")
);

options2.forEach((option) => {
  option.addEventListener("click", () => {
    label2.textContent2 = option.textContent2;
  });
});

// Close dropdown onclick outside
document.addEventListener("click", (e) => {
  const toggle2 = document.querySelector(".dropdown2__switch2");
  const element2 = e.target;

  if (element2 == toggle2) return;

  const isDropdownChild = element2.closest(".dropdown2__filter2");

  if (!isDropdownChild) {
    toggle2.checked = false;
  }
});

//******* Change option 3 selected

// Change option 1 selected
const label3 = document.querySelector(".dropdown3__filter-selected3");
const options3 = Array.from(
  document.querySelectorAll(".dropdown3__select-option3")
);

options3.forEach((option) => {
  option.addEventListener("click", () => {
    label3.textContent3 = option.textContent3;
  });
});

// Close dropdown onclick outside
document.addEventListener("click", (e) => {
  const toggle3 = document.querySelector(".dropdown3__switch3");
  const element3 = e.target;

  if (element3 == toggle3) return;

  const isDropdownChild = element3.closest(".dropdown3__filter3");

  if (!isDropdownChild) {
    toggle3.checked = false;
  }
});
