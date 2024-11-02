const body = document.body;
const toggleTheme = document.querySelector(".theme-toggle-btn");
const lightIcon = document.querySelector(".fa-sun");
const darkIcon = document.querySelector(".fa-cloud-moon");

// darkIcon.style.display = "none";

toggleTheme.addEventListener("click", () => {
  if (body.classList.contains("dark-theme")) {
    body.classList.remove("dark-theme");
    body.classList.add("light-theme");
    // darkIcon.style.display = "none";
    // lightIcon.style.display = "block";
  } else {
    body.classList.add("dark-theme");
    body.classList.remove("light-theme");
    // darkIcon.style.display = "block";
    // lightIcon.style.display = "none";
  }
});
