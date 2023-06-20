// SWIPER JS
const swiper = new Swiper('.swiper', {
    // Optional parameters
    autoplay: {
        delay: 5000,
        dispableOnInteraction: false,
    },
    loop: true,

    // If we need pagination
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },

    // Navigation arrows
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    });
// TABS JS

function openTab(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
  }

// POPUP PROF JS

function toggleProfile() {
  var profileContainer = document.getElementById("profileContainer");
  var toggleButton = document.getElementById("toggleButton");
  
  if (profileContainer.style.display === "none") {
    profileContainer.style.display = "flex";
    overlay.style.display = "block";
    toggleButton.style.display = "none";
  } else {
    profileContainer.style.display = "none";
    overlay.style.display = "none";
    toggleButton.style.display = "block";
  }
}