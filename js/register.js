
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

function checkRegister() {
  var name       = document.getElementById('_name').value;
  var account    = document.getElementById('_account').value;
  var password   = document.getElementById('_password').value;
  var repassword = document.getElementById('_repassword').value;

  if (name.trim() == '') {
    window.alert('名稱尚未輸入');
    return false;
  } else if (account.trim() == '') {
    window.alert('帳號尚未輸入');
    return false;
  } else if (password.trim() == '') {
    window.alert('密碼尚未輸入');
    return false;
  }
  if (name.length > 10) {
    window.alert('名稱字數須小於10');
    return false;
  }
  if (account.length > 12) {
    window.alert('帳號字數須小於12');
    return false;
  }
  if (password.length > 12) {
    window.alert('密碼字數須小於12');
    return false;
  }
  if (password != repassword) {
    window.alert('密碼確認錯誤');
    return false;
  }
}




