(function () {
  'use strict';
  document.addEventListener("DOMContentLoaded", function () {

    if (typeof lightbox !== "undefined") {
      lightbox.option({
        'resizeDuration': 200,
        'wrapAround': true
      });
    } else {
      console.error("Lightbox no se ha cargado correctamente.");
    }

    var dateElement = document.getElementById("date-countdown");
    if (dateElement) {
      // Si el elemento existe, procesamos la fecha
      var countDownDate = new Date(dateElement.innerText).getTime();

      function downcounter() {
        console.log("downcounter");
        // Get today's date and time
        var now = new Date().getTime();

        // Find the distance between now and the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Display the result in the element with id="demo"
        document.getElementById("days").innerHTML = days;
        document.getElementById("hours").innerHTML = hours;
        document.getElementById("minutes").innerHTML = minutes;
        document.getElementById("seconds").innerHTML = seconds;

        // If the count down is finished, write some text
        if (distance < 0) {
          clearInterval(x);
          // Puedes añadir algo cuando la cuenta atrás termine, como un mensaje
        }
      }

      var x = setInterval(downcounter, 1000); // Llama a downcounter cada segundo
    } else {
      console.log("No countdown element found on this page.");
    }


    /* Mobile-Menu */
    let menuAssigned = false;

    try {
      let menu = document.getElementsByClassName("mobile-menu")[0];
      if (!menuAssigned) {
        console.log("MobileMenu");
        menu.addEventListener('click', showMenu);
        menuAssigned = true;
      }
    } catch (e) {
      console.warn("menu not loaded");
    }

    function showMenu() {
      let navigation = document.querySelector(".navigation-bar");
      navigation.classList.toggle("show-menu");
      console.log("show Menu");
    }

  });
})();