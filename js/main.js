function slideBanner() {
  var elem = document.querySelector(".banner-carousel");
  var flkty = new Flickity(elem, {
    // options
    cellAlign: "left",
    contain: true,
    draggable: true,
    wrapAround: true,
    autoPlay: 1700,
  });
}
slideBanner();
