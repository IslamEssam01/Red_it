"use strict";

const copyPostBtns = document.querySelectorAll(".copy-post-btn");

// Add click event listener to each button
copyPostBtns.forEach((btn) => {
    btn.addEventListener("click", () => {
        // Find the post box that contains the button
        const postBox = btn.closest(".post-box");

        // Copy the post content
        const postContent = postBox.querySelector(".content").textContent;
        navigator.clipboard.writeText(postContent);
    });
});

const dropDownBtns = document.querySelectorAll(".dropdown");

let dropDownContent;
let dropDownBtn;
dropDownBtns.forEach((btn) => {
    btn.addEventListener("click", () => {
        if (dropDownContent) {
            dropDownContent.classList.remove("dropdown-content-appear");
        }
        dropDownContent = btn.querySelector(".dropdown-content");
        dropDownContent.classList.add("dropdown-content-appear");
        dropDownContent.classList.remove("display-none");
        dropDownBtn = btn;
    });
});

document.body.addEventListener("click", (e) => {
    if (dropDownBtn && !dropDownBtn.contains(e.target)) {
        dropDownContent.classList.remove("dropdown-content-appear");
        dropDownContent.classList.add("display-none");
        dropDownBtn = dropDownContent = null;
    }
});

const likeBtns = document.querySelectorAll(".like-btn");

likeBtns.forEach((btn) => {
    // console.log(btn);
    btn.addEventListener("click", (e) => {
        if (auth) {
            e.preventDefault();
            const form = btn.form;
            const formData = new FormData(form);
            fetch(form.action, {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": "@csrf",
                },
                body: formData,
            })
                .then((data) => {
                    // Handle the response data here
                    // console.log(data);
                })
                .catch((error) => {
                    // Handle any errors that occurred during the fetch
                    console.error(error);
                });
        }

        btn.querySelector(".action-icon").classList.toggle("filled");
        // This removes the dislike
        btn.nextElementSibling.nextElementSibling
            .querySelector(".action-icon")
            .classList.remove("filled");
    });
});

const disLikeBtns = document.querySelectorAll(".dislike-btn");

disLikeBtns.forEach((btn) => {
    // console.log(btn);
    btn.addEventListener("click", (e) => {
        if (auth) {
            e.preventDefault();
            const form = btn.form;
            const formData = new FormData(form);
            fetch(form.action, {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": "@csrf",
                },
                body: formData,
            })
                .then((data) => {
                    // Handle the response data here
                    // console.log(data);
                })
                .catch((error) => {
                    // Handle any errors that occurred during the fetch
                    console.error(error);
                });
        }

        btn.querySelector(".action-icon").classList.toggle("filled");

        // This removes the like
        btn.previousElementSibling.previousElementSibling
            .querySelector(".action-icon")
            .classList.remove("filled");
    });
});

const commentsBtns = document.querySelectorAll(".comments-btn");
const overlayPost = document.querySelector(".overlay");
let openCommentsModal;
commentsBtns.forEach((btn) => {
    btn.addEventListener("click", () => {
        const commentsModal =
            btn.parentElement.parentElement.nextElementSibling;
        // console.log(commentsModal);
        // console.log(commentsModal);
        commentsModal.classList.remove("display-none");
        overlayPost.classList.remove("display-none");

        openCommentsModal = commentsModal;
    });
});

overlayPost.addEventListener("click", function () {
    openCommentsModal.querySelector(".comments-modal").scrollTop = 0;
    openCommentsModal.classList.add("display-none");
    openCommentsModal = null;
});

document.addEventListener("keydown", function (e) {
    if (e.key === "Escape" && !overlay.classList.contains("display-none")) {
        openCommentsModal.querySelector(".comments-modal").scrollTop = 0;
        openCommentsModal.classList.add("display-none");
        openCommentsModal = null;
    }
});

const commentEllipses = document.querySelectorAll(".comment-ellipsis-icon");
commentEllipses.forEach((ellipsis) => {
    ellipsis.addEventListener("click", () => {
        dropDownContent = ellipsis.nextElementSibling;
        dropDownContent.classList.remove("display-none");
        dropDownContent.classList.add("dropdown-content-appear");
    });

    ellipsis.parentElement.parentElement.addEventListener("mouseleave", () => {
        if (dropDownContent) {
            dropDownContent.classList.remove("dropdown-content-appear");
            dropDownContent.classList.add("display-none");
        }
    });
});

const copyCommentBtns = document.querySelectorAll(".copy-comment-btn");

// Add click event listener to each button
copyCommentBtns.forEach((btn) => {
    btn.addEventListener("click", () => {
        // Find the post box that contains the button
        const commentBox = btn.closest(".comment");

        // Copy the post content
        const commentContent =
            commentBox.querySelector(".comment-content").textContent;
        navigator.clipboard.writeText(commentContent);
    });
});

const commentForms = document.querySelectorAll(".comment-form");

commentForms.forEach((form) => {
    form.addEventListener("submit", (e) => {
        if (auth) {
            e.preventDefault();

            const formData = new FormData(form);
            fetch(form.action, {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": "@csrf",
                },
                body: formData,
            })
                .then((data) => {
                    // Handle the response data here
                    // console.log(data);

                    form.querySelector(".comment-input").value = "";

                    fetch("addComment", {
                        method: "POST",
                        headers: {
                            "X-CSRF-TOKEN": "@csrf",
                        },
                        body: formData,
                    })
                        .then((response) => {
                            // Handle the response data here
                            response.text().then((data) => {
                                addPartialComment(data, form);
                            });
                        })
                        .catch((error) => {
                            // Handle any errors that occurred during the fetch
                            console.error(error);
                        });
                })
                .catch((error) => {
                    // Handle any errors that occurred during the fetch
                    console.error(error);
                });
        }

        // form.previousElementSibling.insertAdjacentHTML(
        //     "beforeend",
        //     commentHTML
        // );
    });
});

function addPartialComment(data, form) {
    // console.log(data);
    const formModal = form.previousElementSibling;
    const comments = formModal.querySelector(".comments");

    comments.insertAdjacentHTML("beforeend", data);
    formModal.scrollTo({
        top: formModal.scrollHeight,
        behavior: "smooth",
    });
    const ellipsis = comments.lastElementChild.querySelector(
        ".comment-ellipsis-icon"
    );

    // console.log(ellipsis);
    ellipsis.addEventListener("click", () => {
        dropDownContent = ellipsis.nextElementSibling;
        dropDownContent.classList.remove("display-none");
        dropDownContent.classList.add("dropdown-content-appear");
    });
    ellipsis.parentElement.parentElement.addEventListener("mouseleave", () => {
        if (dropDownContent) {
            dropDownContent.classList.remove("dropdown-content-appear");
            dropDownContent.classList.add("display-none");
        }
    });

    const copyBtn =
        comments.lastElementChild.querySelector(".copy-comment-btn");
    copyBtn.addEventListener("click", () => {
        // Find the post box that contains the button
        const commentBox = copyBtn.closest(".comment");

        // Copy the post content
        const commentContent =
            commentBox.querySelector(".comment-content").textContent;
        navigator.clipboard.writeText(commentContent);
    });
}

const deleteCommentBtns = document.querySelectorAll(".delete-comment-btn");

deleteCommentBtns.forEach((btn) => {
    btn.addEventListener("click", (e) => {
        e.preventDefault();
        const form = btn.form;
        const formData = new FormData(form);
        fetch(form.action, {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": "@csrf",
                "X-HTTP-Method-Override": "DELETE",
            },
            body: formData,
        })
            .then((data) => {
                // Handle the response data here
                console.log(data);
                btn.closest(".comment").remove();
            })
            .catch((error) => {
                // Handle any errors that occurred during the fetch
                console.error(error);
            });
    });
});
