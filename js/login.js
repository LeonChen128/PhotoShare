
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