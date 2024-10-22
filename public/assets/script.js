const burger = document.querySelector(".burger");
const navbarLinks = document.querySelector(".navbar-links");

burger.addEventListener("click", () => {
  navbarLinks.classList.toggle("show");
});
