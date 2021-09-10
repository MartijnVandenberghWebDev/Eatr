const stepBtn = document.querySelector("#stepBtn");
stepBtn.addEventListener("click", addStep);

function addStep() {
    const stepText = document.querySelector("#stepText");
    const stepList = document.querySelector("#stepList");

    if (stepText.value !== "" && stepList.children.length < 10) {
        stepList.hidden = false;
        const inputField = document.createElement("input");
        inputField.name = "steps";
        inputField.value = stepText.value;
        inputField.setAttribute("readonly", true);
        inputField.classList.add("form-control");
        
        const li = document.createElement("li");
        li.appendChild(inputField);
        stepList.appendChild(li);

        stepText.value = "";
    }
}


const ingredientOptions = document.querySelectorAll("#categorySelect>option");
ingredientOptions.forEach(ingredient => {
    ingredient.addEventListener("click", addIngredient);
});

function addIngredient() {
    const ingredientList = document.querySelector("#ingredientList");
    if(!ingredientList.querySelector(`#${this.dataset.name}`)) {
        const span = document.createElement("span");
        span.id = this.dataset.name;
        span.innerText += this.dataset.name;
        span.innerHTML += " &#x2718;";
        span.addEventListener("click", removeIngredient);
        span.classList = "btn btn-light btn-outline-dark mr-1"
        ingredientList.appendChild(span);
    }
}

function removeIngredient() {
    this.remove();
}

const ingredients = document.querySelectorAll("#ingredientInList");
ingredients.forEach(ingredient => {
    ingredient.addEventListener("click", function(e){
        e.stopPropagation();
    })
});

function targetCheckbox(event) {
    event.preventDefault();
}