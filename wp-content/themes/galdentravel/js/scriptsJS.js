document.addEventListener("DOMContentLoaded", function () {
    if (typeof lightbox !== "undefined") {
        lightbox.option({
            'resizeDuration': 200,
            'wrapAround': true
        });
    } else {
        console.error("Lightbox no se ha cargado correctamente.");
    }
});


function downcounter(){
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
    }
  }


  /* Mobile-Menu */
  try {
    let menu = document.getElementsByClassName("mobile-menu")[0];
    menu.addEventListener('click',showMenu);
    window.addEventListener('resize',checkSize);
  } catch (e) {}

  /* Fix menu */
  try{
    window.addEventListener('scroll',fixedMenu);
  }
  catch(e)
  {}

