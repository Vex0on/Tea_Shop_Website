let computed = false;
let decimal = 0;

function convert(entryForm, fromUnit, toUnit) {
    const convertFrom = fromUnit.selectedIndex;
    const convertTo = toUnit.selectedIndex;
    entryForm.display.value = (entryForm.input.value * fromUnit[convertFrom].value / toUnit[convertTo].value);
}

function addChar(inputField, character) {
    if ((character === '.' && decimal === '0') || character !== '.') {
        if (inputField.value === "" || inputField.value === "0") {
            inputField.value = character;
        } else {
            inputField.value += character;
        }
        convert(inputField.form, inputField.form.measure1, inputField.form.measure2);
        computed = true;
        if (character === '.') {
            decimal = 1;
        }
    }
}

function openVothcom() {
    window.open("", "Display window", "toolbar-no,directories-no,menubar-no");
}

function clearForm(form) {
    form.input.value = 0;
    form.display.value = 0;
    decimal = 0;
}

function changeBackground(hexNumber) {
    document.body.style.background = hexNumber;
    document.body.style.transition = "background 1s ease";
}