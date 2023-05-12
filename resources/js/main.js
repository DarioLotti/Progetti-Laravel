// NAVBAR
let navbar = document.querySelector("#navbar");
let links = document.querySelectorAll('.nav-scrolled-link');

window.addEventListener("scroll", () => {
  let scrolled = window.scrollY;
  if (scrolled > 0) {
    navbar.classList.add("bg-grss");
    navbar.style.height = "80px";
    links.forEach((link) => {
      link.classList.add("text-white");
    });
  } else {
    navbar.classList.remove("bg-grss");
    navbar.style.height = "100px";
    links.forEach((link) => {
      link.classList.remove("text-white");
    });
  }
});

//BUBBLY BUTTON
var animateButton = function(e) {
  e.preventDefault;
  //reset animation
  e.target.classList.remove('animate');
  e.target.classList.add('animate');
  setTimeout(function(){
    e.target.classList.remove('animate');
  },700);
};

var bubblyButtons = document.getElementsByClassName("bubbly-button");
for (var i = 0; i < bubblyButtons.length; i++) {
  bubblyButtons[i].addEventListener('click', animateButton, false);
}

//REVISOR 
// $('#revisor-list a').on('click', function (e) {
//   e.preventDefault()
//   $(this).tab('show')
// })

