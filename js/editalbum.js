
function overHeader(demo) {
  document.getElementById(demo).style.background="rgba(18,60,93,1)";
}

function outHeader(demo) {
  document.getElementById(demo).style.background="rgba(32,84,125,1)";
}

function overButton(demo) {
  document.getElementById(demo).style.background="rgba(28,83,125,1)";
}

function outButton(demo) {
  document.getElementById(demo).style.background="rgba(40,118,179,1)";
}

function checkTitle() {
  var title = document.getElementById('_title').value;

  if (title.trim() == '') {
    window.alert('請輸入相簿名稱');
    return false;
  } 
  if (title.length > 10) {
    window.alert('名稱字數須小於10');
    return false;
  }
}