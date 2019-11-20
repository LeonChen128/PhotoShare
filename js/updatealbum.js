
function checkInput() {
  var title = document.getElementById('_title').value;
  if (title.trim() == '') {
    window.alert('標題不可空白');
    return false;
  }
  if (title.length > 10) {
    window.alert('標題字數須小於10');
    return false;
  }
}