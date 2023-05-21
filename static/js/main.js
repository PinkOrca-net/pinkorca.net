// Pre Loader
window.onload = () => {
  document.getElementById('preLoader').classList.add('hidden');
}



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



// Ajax msg
(function(){
    function validateForm(e){
        e.preventDefault();
        if (!this.msg.value) {
            document.getElementById("response").innerHTML = "هنوز پیامی وارد نکردید!";
        } else {
            loadDoc(this);
        }
    }
    function loadDoc(sendMsg){
        // Get the form data
        let formData = new FormData(sendMsg);
        fetch('./includes/server/send-msg.php', {
            method:"POST",
            body: formData,
        })
            .then(response =>{
                response.text()
                    .then(txt => {
                        document.getElementById("response").innerHTML = txt;
                        document.getElementById("aMsg").value = "";
                    })
            })
    }
  document.querySelector("form").addEventListener("submit", validateForm);
})();