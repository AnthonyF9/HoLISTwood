function OpenPage('id') {
  var page = document.getElementById('id');
  if (page.style.display === 'none') {
    page.style.display = 'block';
  } else {
    page.style.display = 'none';
  }
}
