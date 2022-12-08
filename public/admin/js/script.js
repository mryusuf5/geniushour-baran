const readMoreButton = document.querySelector("#readMore")
const moreText = document.querySelector("#moreText");

let closed = true;

readMoreButton.addEventListener("click", () => {
    if(closed)
    {
        moreText.style.display = "none";
        closed = false;
    }
    else
    {
        moreText.style.display = "inline-block";
        closed = true;
    }

})
