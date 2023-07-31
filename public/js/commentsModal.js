const commentsBtns = document.querySelectorAll(".comments-btn");

// The overlay var already declared in the searchModal file , it will be there always
let openCommentsModal;
commentsBtns.forEach((btn) => {
    btn.addEventListener("click", () => {
        const commentsModal =
            btn.parentElement.parentElement.nextElementSibling; // This returns the comments modal , the structure is like that always
        commentsModal.classList.remove("display-none");
        overlay.classList.remove("display-none");

        openCommentsModal = commentsModal;
    });
});

overlay.addEventListener("click", function () {
    if (openCommentsModal) {
        openCommentsModal.querySelector(".comments-modal").scrollTop = 0;
        openCommentsModal.classList.add("display-none");
        openCommentsModal = null;
    }
});

document.addEventListener("keydown", function (e) {
    if (e.key === "Escape" && openCommentsModal) {
        openCommentsModal.querySelector(".comments-modal").scrollTop = 0;
        openCommentsModal.classList.add("display-none");
        openCommentsModal = null;
    }
});
