const showSignUp = document.getElementById('showSignUp');
const showLogin = document.getElementById('showLogin');
const login = document.getElementById('login');
const signup = document.getElementById('signup');

showSignUp.addEventListener('click', () => {
  login.style.display = 'none';
  signup.style.display = 'block';
});

showLogin.addEventListener('click', () => {
  signup.style.display = 'none';
  login.style.display = 'block';
});
