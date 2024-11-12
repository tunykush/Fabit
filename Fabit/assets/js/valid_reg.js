const userNameInpt = document.getElementById("username-message");
const emailInpt = document.getElementById("email-message");
const passwordInpt = document.getElementById("password-message");
const conpassInpt = document.getElementById("confirmpassword-message");
let isUsernameValid = false;
let isEmailValid = false;
let isPasswordValid = false;
let pass, cPass;

document.getElementById("signupForm").addEventListener('submit', beforeSubmit);
document.getElementById("signupUsername").addEventListener("input", (e) => {
    const { isValid, message } = validUsername(e.target.value);
    userNameInpt.textContent = '';

    if (!isValid) {
        userNameInpt.textContent = message;
    }
    isUsernameValid = isValid;
});
document.getElementById("signupEmail").addEventListener("input", (e) => {
    const { isValid, message } = validEmail(e.target.value);
    emailInpt.textContent = ''
    if (!isValid) {
        emailInpt.textContent = message
    }
    isEmailValid = isValid
});;
document.getElementById("signupPassword").addEventListener("input", (e) => {
    pass = e.target.value;
    const { isValid, message } = validPassword(cPass, pass);
    passwordInpt.textContent = ''

    if (!isValid) {
        passwordInpt.textContent = message
    }
    isPasswordValid = isValid
});
document.getElementById("signupCPassword").addEventListener("input", (e) => {
    cPass = e.target.value;
    const { isValid, message } = validPassword(cPass, pass);
    conpassInpt.textContent = ''
    if (!isValid) {
        conpassInpt.textContent = message
    }

    if(isValid){
        passwordInpt.textContent = ''
    }
    isPasswordValid = isValid
});;

function beforeSubmit(e) {
    e.preventDefault();
    const canSubmit = isUsernameValid && isEmailValid && isPasswordValid;
    console.log(canSubmit);
    if (canSubmit) {
        e.target.submit();
        return;
    }
    alert("Form data not valid");
}

window.addEventListener('copy', function (e) {
    if (e.target.id == "signupPassword") {
        e.preventDefault();
        alert("not allowed");
    }
});

window.addEventListener('paste', function (e) {
    if (e.target.id == "signupCPassword") {
        e.preventDefault();
        alert("not allowed");
    }
});

