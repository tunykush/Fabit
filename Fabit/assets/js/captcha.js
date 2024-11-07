// Toggle between Login and Signup forms
// document.getElementById("loginBtn").addEventListener("click", () => {
//     document.getElementById("loginForm").classList.remove("hidden");
//     document.getElementById("signupForm").classList.add("hidden");
// });

// document.getElementById("signupBtn").addEventListener("click", () => {
//     document.getElementById("loginForm").classList.add("hidden");
//     document.getElementById("signupForm").classList.remove("hidden");
// });

// Generate Captcha
function generateCaptcha() {
    const captchaCanvas = document.getElementById("captchaCanvas");
    const ctx = captchaCanvas.getContext("2d");
    const chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    const captchaText = Array.from({ length: 6 }, () => chars[Math.floor(Math.random() * chars.length)]).join("");

    captchaCanvas.width = 150;
    captchaCanvas.height = 50;
    ctx.clearRect(0, 0, captchaCanvas.width, captchaCanvas.height);
    ctx.font = "30px Arial";
    ctx.fillStyle = "#000";
    ctx.fillText(captchaText, 20, 35);

    // Store the captcha text inside the canvas for later validation
    captchaCanvas.dataset.captchaText = captchaText;

    //lưu captcha vào server
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "../php/savecaptcha.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("captcha=" + captchaText);
}

// Validate Login Form
// function validateLoginForm(event) {
//     // event.preventDefault();
//     // const username = document.getElementById("loginUsername").value.trim();
//     // const password = document.getElementById("loginPassword").value.trim();
//     const captchaInput = document.getElementById("captchaInput").value.trim();
//     const captchaText = document.getElementById("captchaCanvas").dataset.captchaText;

//     // // Get stored users from localStorage
//     // const users = JSON.parse(localStorage.getItem("users")) || [];

//     // // Check if the user exists in the stored data
//     // const userExists = users.find(user => user.username === username && user.password === password);

//     if (captchaInput !== captchaText) {
//         alert("Incorrect Captcha. Please try again.");
//         generateCaptcha();
//         return false;
//     }
//     return true;

//     // if (userExists) {
//     //     alert("Login successful!");
//     // } else {
//     //     alert("Invalid username or password. Please check your credentials.");
//     // }
// }

// // Validate Signup Form
// function validateSignupForm(event) {
//     event.preventDefault();
//     const username = document.getElementById("signupUsername").value.trim();
//     const email = document.getElementById("signupEmail").value.trim();
//     const password = document.getElementById("signupPassword").value.trim();

//     // Get stored users from localStorage
//     const users = JSON.parse(localStorage.getItem("users")) || [];

//     // Check if username or email already exists
//     const userExists = users.some(user => user.username === username || user.email === email);
//     if (userExists) {
//         alert("Username or email already exists. Please choose another.");
//         return false;
//     }

//     // Add new user to the list and save to localStorage
//     users.push({ username, email, password });
//     localStorage.setItem("users", JSON.stringify(users));

//     alert("Signup successful! You can now login.");
//     // Switch to the login form after signup
//     document.getElementById("loginBtn").click();
// }

// Initialize captcha on page load
window.onload = generateCaptcha;


// Event listener for hover to switch forms
// document.getElementById("loginBtn").addEventListener("mouseenter", () => {
//     document.getElementById("loginForm").classList.remove("hidden");
//     document.getElementById("signupForm").classList.add("hidden");
// });

// document.getElementById("signupBtn").addEventListener("mouseenter", () => {
//     document.getElementById("loginForm").classList.add("hidden");
//     document.getElementById("signupForm").classList.remove("hidden");
// });

