const btnCont = document.querySelector(".btn-continue");
const iCard = document.querySelector(".card-interests");
const body = document.querySelector("body");
const main = document.querySelector("main");
const options = document.querySelectorAll(".opt")

let interests = [];

options.forEach(function(option) {
    option.addEventListener("click", function() {
      if (this.classList.contains("selected")) {
        // Deselect the button and remove the interest from the array
        this.classList.remove("selected");
        var index = interests.indexOf(this.textContent);
        if (index !== -1) {
          interests.splice(index, 1);
        }
      } else {
        // Select the button and add the interest to the array
        this.classList.add("selected");
        interests.push(this.textContent);
      }
      console.log(interests);
    });
});

btnCont.onclick = () => {
    iCard.classList.add("inactive");
    body.style.overflow = "auto";
    main.style.opacity = "1";
}



