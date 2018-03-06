$(document).ready(function() {
  $('button').on('mouseover',function () {
    $(this).css({'cursor':'pointer'})
  });
  $('input[type="submit"]').on('mouseover',function () {
    $(this).css({'cursor':'pointer'})
  });
  $('span#myBtn').on('mouseover',function () {
    $(this).css({'cursor':'pointer'})
  });
  $('span#myBtn-bis').on('mouseover',function () {
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

  // ////// Signaler un commentaire //////
  $('.report').click(function(event) {
    alert("This comment is reported.");
    console.log("This comment is reported.");
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
    // if ($('#loginerror').text() == 'Login error') {
    //     modal.style.display = "block";
    //     console.log('Login error');
    // }
    // When the user clicks on the button, open the modal
    $("#myBtn").on("click",function () {
      modal.style.display = "block";
      // console.log('bonjour');
    });
    $(".nodelete").on("click",function () {
      modal.style.display = "none";
      // console.log('quoi ?');
    });
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      // console.log('ferme-là !');
        if (event.target == modal) {
            modal.style.display = "none";
            // console.log('mais ferme-là, bon sang !!!');
        }
    }
    // When the user clicks on <span> (x), close the modal
    $(".close").on("click",function () {
      // console.log('ferme-là !');
      modal.style.display = "none";
    });


});
