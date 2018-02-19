$(document).ready(function() {
  $('button').on('mouseover',function () {
    $(this).css({'cursor':'pointer'})
  });
  $('input[type="submit"]').on('mouseover',function () {
    $(this).css({'cursor':'pointer'})
  });


  /* Scroll to Top */
  $(window).scroll(function() {
      if ($(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
          $('#return-to-top').fadeIn(300);    // Fade in the arrow
      } else {
          $('#return-to-top').fadeOut(300);   // Else fade out the arrow
      }
  });
  $('#return-to-top').click(function() {      // When arrow is clicked
      $('body,html').animate({
          scrollTop : 0                      // Scroll to top of body
      }, 900);
  });

  ///////////////////////////////////////////////////
  /////////////////// Les modales ///////////////////
  ///////////////////////////////////////////////////
    // Get the modal
    var modal = document.getElementById('myModal');
    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];
    var nodelete = document.getElementsByClassName("nodelete")[0];
    // When the user clicks on the button, open the modal
    btn.onclick = function() {
        modal.style.display = "block";
    }
    if ($('#loginerror').text() == 'Login error') {
        modal.style.display = "block";
        console.log('Login error');
    }
    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }
    nodelete.onclick = function() {
        modal.style.display = "none";
    }
    // When the user clicks anywhere outside of the modal, close it
    // window.onclick = function(event) {
    //     if (event.target == modal) {
    //         modal.style.display = "none";
    //     }
    // }
});
