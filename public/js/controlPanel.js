"use strict";

// All functions goes HERE

// The function to make edit info request
function editInfo(event, form) {
    event.preventDefault();
    const formData = new FormData(form);
    fetch(form.action, {
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
}

function changePassword(event, form) {
    event.preventDefault();
    const formData = new FormData(form);
    fetch(form.action, {
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
}

function changeImage(event, form) {
    event.preventDefault();
    const formData = new FormData(form);
    fetch(form.action, {
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
}

// Manipulation the edit info section in the controlPanel
const editBtn = document.querySelector(".enable-btn");
const saveBtn = document.querySelector(".save-btn");
const infoForm = document.querySelector(".form-info");
const infoInputs = document.querySelectorAll(".form-info input");
let originalInputs = [];

for (const input of infoInputs) {
    originalInputs.push(input.value);
}

// When edit button pressed , the save button appears and edit becomes cancel button ,
// when cancel button pressed the save button disappears and cancel becomes edit button
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

// Makes the form request happen in place ,without redirecting
infoForm.addEventListener("submit", (e) => {
    editInfo(e, infoForm);
    for (const [i, input] of infoInputs.entries()) {
        input.disabled = true;
        input.classList.add("disabled");
        originalInputs[i] = input.value;
    }
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
    changePasswordBtn(e, changePasswordForm);
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

// if the change image got canceled , the original image is returned
cancelImgChange.addEventListener("click", function () {
    showUserImg.src = originalImg;
    confirmImgChange.classList.add("hide");
    cancelImgChange.classList.add("hide");
    userImg.value = null;
});

changeImageForm.addEventListener("submit", (e) => {
    changeImage(e, changeImageForm);
    originalImg = showUserImg.src;
    confirmImgChange.classList.add("hide");
    cancelImgChange.classList.add("hide");
    userImg.value = null;
});
