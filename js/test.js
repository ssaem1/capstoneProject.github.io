// function toggleProfile() {
//     var profileContainer = document.getElementById("profileContainer");
//     var toggleButton = document.getElementById("toggleButton");
    
//     if (profileContainer.style.display === "none") {
//       profileContainer.style.display = "flex";
//       overlay.style.display = "block";
//       toggleButton.style.display = "none";
//     } else {
//       profileContainer.style.display = "none";
//       overlay.style.display = "none";
//       toggleButton.style.display = "block";
//     }
//   }

// var acc = document.getElementsByClassName("accordion");
// var i;

// for (i = 0; i < acc.length; i++) {
//   acc[i].addEventListener("click", function() {
//     /* Toggle between adding and removing the "active" class,
//     to highlight the button that controls the panel */
//     this.classList.toggle("active");

//     /* Toggle between hiding and showing the active panel */
//     var panel = this.nextElementSibling;
//     if (panel.style.display === "block") {
//       panel.style.display = "none";
//     } else {
//       panel.style.display = "block";
//     }
//   });
// }

function toggleProfile(profileId) {
    const profileContainer = document.getElementById(`profileContainer_${profileId}`);
    profileContainer.classList.toggle("show");
  }