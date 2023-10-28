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


    document.addEventListener("DOMContentLoaded", function () {
      var popup = document.getElementById("popup");
      var closeButton = document.getElementById("closePopup");
  
      // Menampilkan popup box secara otomatis
      popup.style.visibility = "visible";
  
      closeButton.onclick = function (e) {
      e.preventDefault(); 
      popup.style.visibility = "hidden"; 
      };
  
      popup.onclick = function (e) {
      if (e.target === popup) {
          popup.style.visibility = "hidden"; 
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

function displayInput() {
  const textInput = document.getElementById('textInput').value;
  const numberInput = document.getElementById('numberInput').value;
  const passwordInput = document.getElementById('passwordInput').value;

  document.getElementById('textResult').textContent = `Name : ${textInput}`;
  document.getElementById('numberResult').textContent = `Number : ${numberInput}`;
  document.getElementById('passwordResult').textContent = `Password : ${passwordInput}`;

  document.getElementById('result').style.display = 'block';
}
