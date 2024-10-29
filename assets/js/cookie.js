const cookieBox = document.querySelector(".wrapper");
const contentBox = document.querySelector(".content");
const acceptBtn = cookieBox.querySelector(".accept-btn");
const cookieNotice = document.getElementById("cookie-notice");
const blockCookieBtn = document.getElementById("block-cookie-btn");

acceptBtn.onclick = () => {
  // Setting a cookie for 1 month
  document.cookie = "CookieBy=Fabit; max-age=" + 60 * 60 * 24 * 30;

  if (document.cookie.indexOf("CookieBy=Fabit") !== -1) {
    contentBox.style.display = "none"; // Hide consent content
    cookieNotice.style.display = "block"; // Show notice message
  } else {
    alert("Cookie can't be set! Please unblock this site from the cookie settings in your browser.");
  }
};

// Check if cookie is already set to hide the consent box on page load
if (document.cookie.indexOf("CookieBy=Fabit") !== -1) {
  contentBox.style.display = "none"; // Hide consent content
  cookieNotice.style.display = "block"; // Show notice message
} else {
  cookieBox.classList.remove("hide");
}

// Block cookie button functionality
blockCookieBtn.onclick = () => {
  // Clearing the cookie
  document.cookie = "CookieBy=; max-age=0";
  cookieNotice.style.display = "none"; // Hide cookie notice message
  contentBox.style.display = "block"; // Show consent content again
  cookieBox.classList.remove("hide");
};
