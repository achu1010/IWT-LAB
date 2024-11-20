const calculationDisplay = document.getElementById("calculation");
const resultDisplay = document.getElementById("result");

function appendToDisplay(input) {
    calculationDisplay.innerText += input;
    resultDisplay.innerText = ""; // Clear result when appending new input
}

function clearDisplay() {
    calculationDisplay.innerText = "";
    resultDisplay.innerText = "";
}

function backspace() {
    // Remove the last character from the calculation display
    calculationDisplay.innerText = calculationDisplay.innerText.slice(0, -1);
}

function calculate() {
    try {
        const calculation = calculationDisplay.innerText;
        const result = eval(calculation);
        resultDisplay.innerText = result; // Show result
    } catch (error) {
        resultDisplay.innerText = "Error";
    }
}
