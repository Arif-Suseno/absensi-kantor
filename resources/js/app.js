import "./bootstrap";
import "../css/app.css";

// Membuat hamburger menu
const buttonHamburger = document.querySelector("header button");
const sidebar = document.querySelector(".sidebar");
buttonHamburger.addEventListener("click", () => {
    sidebar.classList.toggle("hidden");
});
