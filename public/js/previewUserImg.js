const userImg = document.querySelector(".user-img");
userImg.onchange = (e) => {
    const [file] = userImg.files;
    const showUserImg = document.querySelector(".showUserImg");
    if (file) {
        showUserImg.style.display = "inline-block";
        showUserImg.src = URL.createObjectURL(file);
    } else {
        showUserImg.style.display = "none";
        showUserImg.src = "";
    }
};
