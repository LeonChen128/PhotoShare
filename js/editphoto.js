
function checkTitle() {
  var title = document.getElementById('_title').value;
  var file  = document.getElementById('_file').value;

  if (title.trim() == '') {
    window.alert('請輸入照片名稱');
    return false;
  } 
  if (title.length > 10) {
    window.alert('名稱字數須小於10');
    return false;
  }
  if (file.trim() == '') {
    window.alert('請上傳相簿封面');
    return false;
  } 
}