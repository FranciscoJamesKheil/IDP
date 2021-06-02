function scrollAppear() {
  var introText = document.querySelector(".dev-statement");
  var introPosition = introText.getBoundingClientRect().top;
  var screenPosition = window.innerHeight / 2;

  if (introPosition < screenPosition) {
    introText.classList.add("appear");
  }
}

window.addEventListener("scroll", scrollAppear);
