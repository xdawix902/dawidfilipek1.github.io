const display = document.getElementById("display");
let lastWasOperation = false;

function addToDisplay(input, currOperation=false){
    if(lastWasOperation && currOperation){
        alert("Nie można dać dwóch znaków operacji po sobie!!!");
        return;
    }

    if(input==="0" && display.value.slice(-1)==="/"){
        alert("Nie można dzielić przez 0!!!")
        return;
    }

    if(input==="." && display.value.indexOf('.') != -1){
        alert("Wynik już zawiera kropkę!!!");
        return;
    }

    lastWasOperation = currOperation;
    display.value += input;
}

function clearDisplay(){
    display.value = "";
}

function sumOfCalculation(){
    display.value = eval(display.value);
}