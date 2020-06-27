var CORRECT_USER = 'admingreenwich';
var CORRECT_PASS = 'hung123';

var inputUsername = document.getElementById('username');
var inputPassword = document.getElementById('password');

var formLogin = document.getElementById('form-login');
if (formLogin.attachEvent) {
    formLogin.attachEvent('submit',onFormSubmit);
} else {
    formLogin.addEventListener('submit',onFormSubmit);
}


function onFormSubmit(e){
        if(e.prevenDefault) e.prevenDefault();
        var username = inputUsername.value;
        var password = inputPassword.value;
        if(username == CORRECT_USER && password == CORRECT_PASS) {
            alert('Login completed');
        } else {
            alert('Your username or password incorrect');
        }
        return false;
}