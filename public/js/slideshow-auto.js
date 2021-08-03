var slideIndex = 0;
showSlidesAuto();

function showSlidesAuto() {
  var i;
  var slides = document.getElementsByClassName("mySlidesAuto");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}
  slides[slideIndex-1].style.display = "block";
  setTimeout(showSlidesAuto, 5000); // Change image every 2 seconds
}