function togglePopup(popupId) {
  var popup = document.getElementById(popupId);
  var overlay = document.getElementById("overlay");
  popup.classList.toggle("active");
  overlay.classList.toggle("active");
}