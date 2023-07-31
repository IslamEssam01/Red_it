const postEllipses = document.querySelectorAll(".post-ellipsis");
let currentDropDownContent;
let currentEllipsis;

postEllipses.forEach((ellipsis) => {
    ellipsis.addEventListener("click", () => {
        if (currentDropDownContent) {
            currentDropDownContent.classList.remove("dropdown-content-appear");
            currentDropDownContent.classList.add("display-none");
        }
        currentDropDownContent = ellipsis.nextElementSibling; // the next sibling is always the dropdown content
        currentDropDownContent.classList.add("dropdown-content-appear");
        currentDropDownContent.classList.remove("display-none");

        currentEllipsis = ellipsis;
    });
});

const commentEllipses = document.querySelectorAll(".comment-ellipsis-icon");
commentEllipses.forEach((ellipsis) => {
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
});

document.body.addEventListener("click", (e) => {
    // console.log(e.target !== currentEllipsis);
    // console.log(e.target , currentEllipsis);
    if (currentEllipsis && currentEllipsis !== e.target) {
        currentDropDownContent.classList.remove("dropdown-content-appear");
        currentDropDownContent.classList.add("display-none");
        currentEllipsis = currentDropDownContent = null;
    }
});
