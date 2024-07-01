const lightModeButton = document.querySelector("#light-mode");
const darkModeButton = document.querySelector("#dark-mode");
const systemModeButton = document.querySelector("#system-mode");
const html = document.querySelector("html");

lightModeButton.addEventListener("click", function () {
    html.classList.remove("dark");
    localStorage.theme = "light";
});

darkModeButton.addEventListener("click", function () {
    html.classList.add("dark");
    localStorage.theme = "dark";
});

systemModeButton.addEventListener("click", function () {
    localStorage.removeItem("theme");
    applySystemTheme();
});

function applySystemTheme() {
    if (window.matchMedia("(prefers-color-scheme: dark)").matches) {
        html.classList.add("dark");
    } else {
        html.classList.remove("dark");
    }
}

// On page load or when changing themes, best to add inline in `head` to avoid FOUC
if (localStorage.theme === "dark") {
    html.classList.add("dark");
} else if (localStorage.theme === "light") {
    html.classList.remove("dark");
} else {
    applySystemTheme();
}
