
function checkTitle() {
  var file  = document.getElementById('_file').value;

  if (file.trim() == '') {
    window.alert('請上傳照片');
    return false;
  } 
}