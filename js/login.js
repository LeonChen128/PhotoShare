
function overHeader(demo) {
  document.getElementById(demo).style.background="rgba(18,60,93,1)";
}

function outHeader(demo) {
  document.getElementById(demo).style.background="rgba(32,84,125)";
}

function overButton(demo) {
  document.getElementById(demo).style.background="rgba(28,83,125,1)";
}

function outButton(demo) {
  document.getElementById(demo).style.background="rgba(40,118,179,1)";
}

function overCancel(demo) {
  document.getElementById(demo).style.background="rgba(146,36,36,1)";
}

function outCancel(demo) {
  document.getElementById(demo).style.background="rgba(179,44,44,1)";
}

function checkLogin() {
  var account = document.getElementById('_account').value;
  var password = document.getElementById('_password').value;

  if (account.trim() == '') {
    window.alert('請輸入你的帳號');
    return false;
  }
  if (password.trim() == '') {
    window.alert('請輸入你的密碼');
    return false;
  }
}