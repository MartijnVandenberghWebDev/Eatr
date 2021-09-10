const stepBtn = document.querySelector("#stepBtn");
stepBtn.addEventListener("click", addStep);

const categoryArray = document.createElement("input");
categoryArray.name = "categoryArray";
// categoryArray.setAttribute("hidden", true);
categoryArray.setAttribute("readonly", true);
document.querySelector(".arraysForForm").appendChild(categoryArray);

const categories = document.querySelectorAll("#category");
categories.forEach(category => {
    category.addEventListener("click", () => {
        categoryArray.value += `/${category.value}`;
    })
});

const ingredientArray = document.createElement("input");
ingredientArray.name = "ingredientArray";
// ingredientArray.setAttribute("hidden", true);
ingredientArray.setAttribute("readonly", true);
document.querySelector(".arraysForForm").appendChild(ingredientArray);

const stepArray = document.createElement("input");
stepArray.name = "stepArray";
// stepArray.setAttribute("hidden", true);
stepArray.setAttribute("readonly", true);
document.querySelector(".arraysForForm").appendChild(stepArray);

function addStep() {
    const stepText = document.querySelector("#stepText");
    const stepList = document.querySelector("#stepList");

    if (stepText.value !== "" && stepList.children.length < 10) {
        stepList.hidden = false;
        const inputField = document.createElement("input");
        inputField.name = "steps";
        inputField.value = stepText.value;
        stepArray.value += `/${stepText.value}`;
        inputField.setAttribute("readonly", true);
        inputField.classList.add("form-control");
        
        const li = document.createElement("li");
        li.appendChild(inputField);
        stepList.appendChild(li);

        stepText.value = "";
    }
}

const ingredients = document.querySelectorAll("#ingredientInList");
ingredients.forEach(ingredient => {
    ingredient.addEventListener("click", function(e){
        e.stopPropagation();
        e.preventDefault();
        console.log(e.target.querySelector("input"));
        e.target.querySelector("input").setAttribute("checked", true);
        console.log(this.querySelector(":first-child").value);
        ingredientArray.value += `/${this.querySelector(":first-child").value}`;
        this.classList.add("disabled");
    })
});