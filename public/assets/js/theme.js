document.addEventListener("DOMContentLoaded", function () {
  const themeToggle = document.getElementById("themeToggle");
  const rtlToggle = document.getElementById("rtlToggle");
  const themeLink = document.getElementById("theme-style");
  const icon = themeToggle?.querySelector("i");

  // ===== Restore Saved Preferences =====
  const savedTheme = localStorage.getItem("theme") || "light";
  const savedDir = localStorage.getItem("dir") || "ltr";

  // Apply saved theme
  themeLink.setAttribute("href", "/assets/css/theme-" + savedTheme + ".css");
  if (icon) {
    icon.classList.remove("fa-sun", "fa-moon");
    icon.classList.add(savedTheme === "dark" ? "fa-moon" : "fa-sun");
  }

  // Apply saved direction
  document.documentElement.setAttribute("dir", savedDir);

  // ===== Theme Toggle Event =====
  if (themeToggle) {
    themeToggle.addEventListener("click", function () {
      const currentTheme = themeLink.getAttribute("href").includes("dark") ? "dark" : "light";
      const newTheme = currentTheme === "light" ? "dark" : "light";
      themeLink.setAttribute("href", "/assets/css/theme-" + newTheme + ".css");
      localStorage.setItem("theme", newTheme);

      if (icon) {
        icon.classList.remove("fa-sun", "fa-moon");
        icon.classList.add(newTheme === "dark" ? "fa-moon" : "fa-sun");
      }
    });
  }

  // ===== RTL Toggle Event =====
  if (rtlToggle) {
    rtlToggle.addEventListener("click", function () {
      const html = document.documentElement;
      const currentDir = html.getAttribute("dir") === "rtl" ? "rtl" : "ltr";
      const newDir = currentDir === "ltr" ? "rtl" : "ltr";
      html.setAttribute("dir", newDir);
      localStorage.setItem("dir", newDir);
    });
  }
});
