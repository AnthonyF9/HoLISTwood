$(document).ready(function() {
  $('button').on('mouseover',function () {
    $(this).css({'cursor':'pointer'})
  });
  $('input[type="submit"]').on('mouseover',function () {
    $(this).css({'cursor':'pointer'})
  });
  // $('#search-by-id-button').click(function () {
  //     var c = $("#search-by-id-form #i").filter(function (index, element) {
  //         return $(element).val() != "";
  //     }).serialize();
  //     console.log(c);
  //     var d = 'http://www.omdbapi.com/?' + c + '&apikey=67f441ca';
  //     console.log(d);
  // });
});
