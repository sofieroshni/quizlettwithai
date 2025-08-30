const slider = document.getElementById("slider");
const slides = document.querySelectorAll(".slide");
const prevBtn = document.querySelector(".prev");
const nextBtn = document.querySelector(".next");

let index = 0;

function showSlide() {
  slider.style.transform = `translateX(-${index * 100}%)`;
}

function flipCard(card) {
  card.classList.toggle("flipped");
}

nextBtn.addEventListener("click", () => {
  index = (index + 1) % slides.length;
  showSlide();
});

prevBtn.addEventListener("click", () => {
  index = (index - 1 + slides.length) % slides.length;
  showSlide();
});

// start med første kort
showSlide();
