"use strict";

// All functions go HERE

function postTime(date) {
    function calcPassedSeconds(date1, date2) {
        return Math.trunc(Math.abs(date1 - date2) / 1000);
    }

    const now = new Date();

    const passedSeconds = calcPassedSeconds(now, date);
    // console.log(passedSeconds);
    // console.log(date);
    // console.log(now);
    if (passedSeconds <= 60) return `Created ${passedSeconds} Seconds ago`;
    if (Math.trunc(passedSeconds / 60) <= 60)
        return `Created ${Math.trunc(passedSeconds / 60)} Minutes ago`;
    if (Math.trunc(passedSeconds / (60 * 60)) <= 24)
        return `Created ${Math.trunc(passedSeconds / (60 * 60))} Hours ago`;
    if (Math.trunc(passedSeconds / (60 * 60 * 24)) <= 7)
        return `Created ${Math.trunc(passedSeconds / (60 * 60 * 24))} Days ago`;
    if (Math.trunc(passedSeconds / (60 * 60 * 24 * 7)) <= 4)
        return `Created ${Math.trunc(
            passedSeconds / (60 * 60 * 24 * 7)
        )} Weeks ago`;

    const formattedDate = Intl.DateTimeFormat(navigator.language, {
        day: "numeric",
        month: "numeric",
        year: "numeric",
        hour: "numeric",
        minute: "numeric",
        second: "numeric",
    }).format(date);
    return `Created at : ${formattedDate}`;
}

function likeOrDislikePost(event, form) {
    event.preventDefault();
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

function addComment(event, form) {
    event.preventDefault();

    const formData = new FormData(form);
    form.querySelector(".comment-input").value = "";

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
            // const serverLink = window.location.origin;

            fetch(`${homeUrl}/addComment`, {
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
        currentDropDownContent = ellipsis.nextElementSibling; // the next sibling is always the dropdown content
        currentDropDownContent.classList.add("dropdown-content-appear");
        currentDropDownContent.classList.remove("display-none");

        currentEllipsis = ellipsis;
    });

    // the parent's parent is the whole comment box (has the width of the comment section)
    ellipsis.parentElement.parentElement.addEventListener("mouseleave", () => {
        if (currentDropDownContent) {
            currentDropDownContent.classList.remove("dropdown-content-appear");
            currentDropDownContent.classList.add("display-none");
            currentEllipsis = currentDropDownContent = null;
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

function deleteComment(event, btn) {
    event.preventDefault();
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
}

const createdAtLabels = document.querySelectorAll(".created-at");
createdAtLabels.forEach((label) => {
    label.textContent = postTime(new Date(label.textContent));
});

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

const likeBtns = document.querySelectorAll(".like-btn");

likeBtns.forEach((btn) => {
    // console.log(btn);
    btn.addEventListener("click", (e) => {
        if (auth) {
            likeOrDislikePost(e, btn.form);
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
            likeOrDislikePost(e, btn.form);
        }

        btn.querySelector(".action-icon").classList.toggle("filled");

        // This removes the like
        btn.previousElementSibling.previousElementSibling
            .querySelector(".action-icon")
            .classList.remove("filled");
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
            addComment(e, form);
        }
    });
});

const deleteCommentBtns = document.querySelectorAll(".delete-comment-btn");

deleteCommentBtns.forEach((btn) => {
    btn.addEventListener("click", (e) => {
        deleteComment(e, btn);
    });
});
