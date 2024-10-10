// Live search dengan menggunakan ajax

const searchButton = document.querySelector(".search-button");
const keyword = document.querySelector(".keyword");
const container = document.querySelector(".container");

// hilangkan tombol search
searchButton.style.display = "none";

// event ketika menuliskan keyword
keyword.addEventListener("keyup", function () {
  // fetch()
  fetch("ajax/ajax_search.php?keyword=" + keyword.value)
    .then((response) => response.text())
    .then((response) => (container.innerHTML = response));
});

// Preview Image untuk tambah dan ubah
function previewImage() {
  const picture = document.querySelector(".picture");
  const imgPreview = document.querySelector(".img-preview");

  const oFReader = new FileReader();
  oFReader.readAsDataURL(picture.files[0]);

  oFReader.onload = function (oFREvent) {
    imgPreview.src = oFREvent.target.result;
  };
}
