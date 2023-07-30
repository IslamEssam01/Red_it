"use strict";

const editBtn = document.querySelector(".enable-btn");
const saveBtn = document.querySelector(".save-btn");
const infoForm = document.querySelector(".form-info");
const infoInputs = document.querySelectorAll(".form-info input");
let originalInputs = [];

for (const input of infoInputs) {
    originalInputs.push(input.value);
}

editBtn.addEventListener("click", function () {
    if (!editBtn.classList.contains("cancel-btn")) {
        for (const input of infoInputs) {
            input.disabled = false;
            input.classList.remove("disabled");
        }
        // editBtn.classList.remove("enable-btn");
        editBtn.classList.add("cancel-btn");
        editBtn.textContent = "Cancel";
        // saveBtn.style.display = " block";
    } else {
        for (const [i, input] of infoInputs.entries()) {
            input.disabled = true;
            input.classList.add("disabled");
            input.value = originalInputs[i];
        }
        // editBtn.classList.add("enable-btn");
        editBtn.classList.remove("cancel-btn");
        editBtn.textContent = "Edit Information";
    }

    saveBtn.classList.toggle("hide");
});

infoForm.addEventListener("submit", (e) => {
    e.preventDefault();
    const formData = new FormData(infoForm);
    fetch(infoForm.action, {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": "@csrf",
            "X-HTTP-Method-Override": "PUT",
        },
        body: formData,
    })
        .then((data) => {
            // Handle the response data here
            console.log(data);
        })
        .catch((error) => {
            // Handle any errors that occurred during the fetch
            console.error(error);
        });

    for (const [i, input] of infoInputs.entries()) {
        input.disabled = true;
        input.classList.add("disabled");
        originalInputs[i] = input.value;
    }
    // editBtn.classList.add("enable-btn");
    editBtn.classList.remove("cancel-btn");
    editBtn.textContent = "Edit Information";
    saveBtn.classList.add("hide");
});

// Change Password

const changePasswordBtn = document.querySelector(".change-password-btn");
const changePasswordForm = document.querySelector(".form-change-password");
const changePasswordHidden = document.querySelector(".password-change-hidden");
const cancelPasswordChangeBtn = document.querySelector(
    ".cancel-password-change"
);

changePasswordBtn.addEventListener("click", function () {
    changePasswordHidden.classList.remove("hide");
});

cancelPasswordChangeBtn.addEventListener("click", function () {
    changePasswordHidden.classList.add("hide");

    changePasswordForm.querySelector("#passwordChange").value = "";
});

changePasswordForm.addEventListener("submit", (e) => {
    e.preventDefault();
    const formData = new FormData(changePasswordForm);
    fetch(changePasswordForm.action, {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": "@csrf",
            "X-HTTP-Method-Override": "PUT",
        },
        body: formData,
    })
        .then((data) => {
            // Handle the response data here
            console.log(data);
        })
        .catch((error) => {
            // Handle any errors that occurred during the fetch
            console.error(error);
        });

    changePasswordHidden.classList.add("hide");

    changePasswordForm.querySelector("#passwordChange").value = "";
});

// Change Image

const changeImageForm = document.querySelector("#change-img-form");
const confirmImgChange = document.querySelector(".confirm-img-change");
const cancelImgChange = document.querySelector(".cancel-img-change");

const userImg = document.querySelector(".user-img");
const showUserImg = document.querySelector(".showUserImg");
let originalImg = showUserImg.src;
userImg.onchange = (e) => {
    const [file] = userImg.files;
    if (file) {
        showUserImg.src = URL.createObjectURL(file);
        confirmImgChange.classList.remove("hide");
        cancelImgChange.classList.remove("hide");
    }
};

cancelImgChange.addEventListener("click", function () {
    showUserImg.src = originalImg;
    confirmImgChange.classList.add("hide");
    cancelImgChange.classList.add("hide");
    userImg.value = null;
});

changeImageForm.addEventListener("submit", (e) => {
    e.preventDefault();
    const formData = new FormData(changeImageForm);
    fetch(changeImageForm.action, {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": "@csrf",
            "X-HTTP-Method-Override": "PUT",
        },
        body: formData,
    })
        .then((data) => {
            // Handle the response data here
            console.log(data);
        })
        .catch((error) => {
            // Handle any errors that occurred during the fetch
            console.error(error);
        });

    originalImg = showUserImg.src;
    confirmImgChange.classList.add("hide");
    cancelImgChange.classList.add("hide");
    userImg.value = null;
});
