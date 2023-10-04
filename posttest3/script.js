// ham 
const ham = document.querySelector('.hamburger')
const nav = document.querySelector('nav')
ham.addEventListener('click', () => {
  nav.classList.toggle('active')
})
const items = document.querySelectorAll('.nav-item')

items.forEach(item => item.addEventListener('click', () => {
  nav.classList.remove('active')
}))

// Ambil elemen-elemen yang diperlukan
    // Ambil elemen-elemen yang diperlukan
    document.addEventListener("DOMContentLoaded", function () {
      var popup = document.getElementById("popup");
      var closeButton = document.getElementById("closePopup");
  
      // Menampilkan popup box secara otomatis
      popup.style.visibility = "visible";
  
      // Menangani penutupan popup saat tombol "X" diklik
      closeButton.onclick = function (e) {
      e.preventDefault(); // Mencegah tindakan default dari tombol X
      popup.style.visibility = "hidden"; // Menyembunyikan popup box
      };
  
      // Menangani penutupan popup saat bagian luar popup diklik
      popup.onclick = function (e) {
      if (e.target === popup) {
          popup.style.visibility = "hidden"; // Menyembunyikan popup box
      }
      };
      });

//back to top
const toTop = document.querySelector('.to-top')
window.addEventListener('scroll', () => {
  if (window.pageYOffset > 20) {
    toTop.classList.add('active')
  } else {
    toTop.classList.remove('active')
  }
})

// darkmode
const darkModeButton = document.querySelector('.dark-mode-button')
darkModeButton.addEventListener('click', () => {
  document.body.classList.toggle('darkmode')
  if (darkModeButton.innerText === 'Darkmode') {
    darkModeButton.innerText = 'Lightmode'
  } else {
    darkModeButton.innerText = 'Darkmode'
  }
})

