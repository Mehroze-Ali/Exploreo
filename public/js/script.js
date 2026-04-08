function getLoggedInUser() {
  return localStorage.getItem("userName");
}

function updateAuthStatusUI() {
  const userName = getLoggedInUser();
  const $authButtons = $("#authButtons");
  const $userProfile = $("#userProfile");
  const $userInitial = $("#userInitial");

  if (userName) {
    // User is logged in: SHOW Avatar, HIDE Buttons
    $authButtons.css("display", "none");
    $userProfile.css("display", "flex");
    $userInitial.text(userName.charAt(0).toUpperCase());
  } else {
    // User is NOT logged in: HIDE Avatar, SHOW Buttons
    $userProfile.css("display", "none");
    $authButtons.css("display", "block");
  }
}

function handleLogout() {
  localStorage.removeItem("userName");
  alert("You have been logged out. Redirecting to home.");
  window.location.reload();
}

$(document).ready(function () {
  updateAuthStatusUI();

  // Navbar scroll effect
  var navbar = $("#mainNav");
  var scrollThreshold = 100;

  $(window).scroll(function () {
    if ($(document).scrollTop() > scrollThreshold) {
      navbar.removeClass("navbar-transparent").addClass("navbar-scrolled");
    } else {
      navbar.removeClass("navbar-scrolled").addClass("navbar-transparent");
    }
  });

  $(window).scroll();

  // Smooth Scroll
  $('a[href^="#"]').on("click", function (event) {
    if (this.hash !== "") {
      event.preventDefault();
      var hash = this.hash;
      var targetElement = $(hash);

      if (targetElement.length) {
        var navbarHeight = navbar.hasClass("navbar-scrolled") ? 70 : 0;
        var scrollTopPosition = targetElement.offset().top - navbarHeight;

        $("html, body").animate({ scrollTop: scrollTopPosition }, 800);
      }
    }
  });
});
