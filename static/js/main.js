// Menu
const menuBtn = document.querySelector("#menu-btn");
const mobileMenu = document.querySelector("#mobile-menu");

// function to toggle the menu display and button icon/image
function toggleMenu() {
  if (mobileMenu.classList.contains("hidden")) {
    // show the menu and change the button image
    mobileMenu.classList.remove("hidden");
    mobileMenu.classList.add("flex");
    menuBtn.src = "static/images/icons/close.svg";
  } else {
    // hide the menu and change the button image
    mobileMenu.classList.remove("flex");
    mobileMenu.classList.add("hidden");
    menuBtn.src = "static/images/icons/hamburger-sidebar.svg";
  }
}

// add click listener to the menu button
menuBtn.addEventListener("click", toggleMenu);

// add click listener to the body to close the menu on any click outside of it
document.body.addEventListener("click", function(event) {
  if (!mobileMenu.contains(event.target) && !menuBtn.contains(event.target)) {
    // hide the menu and change the button image
    mobileMenu.classList.remove("flex");
    mobileMenu.classList.add("hidden");
    menuBtn.src = "static/images/icons/hamburger-sidebar.svg";
  }
});




// Pre Loader
window.onload = () => {
  document.getElementById('preLoader').classList.add('hidden');
}
