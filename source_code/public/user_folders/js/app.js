const bars = document.querySelector(".fa-bars");
const navbar = document.querySelector(".second-navbar");
const list = document.querySelector(".list_of_links");
const leftArrow = document.querySelectorAll(".fa-circle-arrow-left");
const rightArrow = document.querySelectorAll(".fa-circle-arrow-right");
const activeSlider = document.querySelector("#sliders").children;
let counter = 1;
bars.addEventListener("click", () => {
    navbar.classList.toggle("showNavbar");
    list.classList.toggle("vertical_navbar");
});
activeSlider[0].classList.add("active");
let currentCounter = 1;
rightArrow.forEach((arrow) => {
    arrow.addEventListener("click", () => {
        activeSlider[currentCounter - 1].classList.remove("active");
        if (currentCounter + 1 > 5) {
            currentCounter = 0;
        }
        activeSlider[currentCounter++].classList.add("active");
    });
});
leftArrow.forEach((arrow) => {
    arrow.addEventListener("click", () => {
        activeSlider[currentCounter - 1].classList.remove("active");
        console.log(currentCounter);
        if (currentCounter - 1 <= 0) {
            currentCounter = 6;
        }
        activeSlider[currentCounter--].classList.add("active");
    });
});
