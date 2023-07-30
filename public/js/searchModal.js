"use strict";

const searchBar = document.querySelector(".search-form");
const overlay = document.querySelector(".overlay");

searchBar.addEventListener("click", function () {
    searchBar.classList.add("search-modal");

    overlay.classList.remove("display-none");
});

overlay.addEventListener("click", function () {
    searchBar.classList.remove("search-modal");
    searchBar.querySelector(".search").value = "";
    overlay.classList.add("display-none");
});

document.addEventListener("keydown", function (e) {
    if (e.key === "Escape" && !overlay.classList.contains("display-none")) {
        searchBar.classList.remove("search-modal");
        searchBar.querySelector(".search").value = "";
        overlay.classList.add("display-none");
    }
});
