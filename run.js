// Switch view to Registration Form
function showRegister() {
  const loginSec = document.getElementById('loginSection');
  const regSec = document.getElementById('registerSection');

  if (loginSec && regSec) {
    loginSec.classList.remove('active');
    regSec.classList.add('active');
  }
}

// Switch view to Login Form
function showLogin() {
  const loginSec = document.getElementById('loginSection');
  const regSec = document.getElementById('registerSection');

  if (loginSec && regSec) {
    regSec.classList.remove('active');
    loginSec.classList.add('active');
  }
}