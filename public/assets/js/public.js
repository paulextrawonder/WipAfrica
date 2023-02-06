//Public Pages

//Navigation Menu
function disableScroll() {
  document.body.classList.add("stop-scrolling");
}

function enableScroll() {
  document.body.classList.remove("stop-scrolling");
}

let pbnOpenNav = document.getElementById("open__nav");
let pbnCloseNav = document.getElementById("close__nav");
pbnOpenNav.addEventListener("click", () => {
  console.log("clicked");
  document.querySelector(".navigation__bar").classList.add("navigation__open");
  disableScroll();
});
pbnCloseNav.addEventListener("click", () => {
  document
    .querySelector(".navigation__bar")
    .classList.remove("navigation__open");
  setTimeout(enableScroll, 1200);
});

let mobileIcon = document.querySelector(".navigation__mobile-btn");
let mobileMenu = document.querySelector(".navigation__mobile-nav");

mobileIcon.addEventListener("click", () => {
  mobileMenu.classList.toggle("nav__d-mobile");
});

//Homepage Project Slides
var swiper = new Swiper(".mySwiper", {
  slidesPerView: 3.2,
  spaceBetween: 30,
  loop: true,
  breakpoints: {
    // when window width is >= 260px
    260: {
      slidesPerView: 1.2,
      spaceBetween: 20,
    },
    // when window width is >= 320px
    320: {
      slidesPerView: 1.2,
      spaceBetween: 20,
    },
    // when window width is >= 480px
    480: {
      slidesPerView: 1.2,
      spaceBetween: 20,
    },
    // when window width is >= 640px
    640: {
      slidesPerView: 2.5,
      spaceBetween: 30,
    },
    // when window width is >= 940px
    940: {
      slidesPerView: 3.2,
      spaceBetween: 30,
    },
  },
  navigation: {
    nextEl: ".slider__btn-next",
    prevEl: ".slider__btn-prev",
  },
});

let prevBtn = document.querySelector(".slider__btn-prev");
let nextBtn = document.querySelector(".slider__btn-next");

function removeAll() {
  prevBtn.classList.remove("slider__btn-active");
  nextBtn.classList.remove("slider__btn-active");
}
prevBtn.addEventListener("click", () => {
  removeAll();
  prevBtn.classList.add("slider__btn-active");
});
nextBtn.addEventListener("click", () => {
  removeAll();
  nextBtn.classList.add("slider__btn-active");
});

//stories
var swiper = new Swiper(".pbnstories", {
  slidesPerView: 3.2,
  spaceBetween: 30,
  loop: true,
  breakpoints: {
    // when window width is >= 260px
    260: {
      slidesPerView: 1.1,
      spaceBetween: 20,
    },
    // when window width is >= 320px
    320: {
      slidesPerView: 1.1,
      spaceBetween: 20,
    },
    // when window width is >= 480px
    480: {
      slidesPerView: 1.1,
      spaceBetween: 20,
    },
    // when window width is >= 640px
    640: {
      slidesPerView: 1.2,
      spaceBetween: 30,
    },
    // when window width is >= 940px
    940: {
      slidesPerView: 1.7,
      spaceBetween: 30,
    },
  },
  navigation: {
    nextEl: ".slider__btn-next",
    prevEl: ".slider__btn-prev",
  },
});
