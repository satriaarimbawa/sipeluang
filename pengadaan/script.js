let inputCount = 1;
const maxInputs = 20;

function addInput() {
  if (inputCount < maxInputs) {
    const formContainer = document.getElementById("form-container");
    const newInputContainer = document.createElement("div");
    newInputContainer.className = "input-container row"; // Menambahkan kelas "row" untuk menggunakan Grid System

    const newInputCol = document.createElement("div");
    newInputCol.className = "col"; // Menentukan lebar kolom input (Anda dapat menyesuaikan sesuai kebutuhan)
    const newInput = document.createElement("input");
    newInput.type = "file";
    newInput.name = `input_files[]`;
    newInput.placeholder = `Input ${inputCount + 1}`;
    newInput.className = "form-control";
    newInput.id = `input_files${inputCount + 1}`;

    const removeButtonCol = document.createElement("div");
    removeButtonCol.className = "col-auto"; // Menentukan lebar kolom tombol hapus (Anda dapat menyesuaikan sesuai kebutuhan)
    const removeButton = document.createElement("button");
    removeButton.innerHTML =
      '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="red" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg>';
    removeButton.className = "btn btn-outline-secondary";
    removeButton.type = "button";
    removeButton.onclick = function () {
      removeInput(inputCount + 1);
    };

    newInputCol.appendChild(newInput);
    removeButtonCol.appendChild(removeButton);

    newInputContainer.appendChild(newInputCol);
    newInputContainer.appendChild(removeButtonCol);

    formContainer.appendChild(newInputContainer);
    inputCount++;

    updateRemoveButtonHandlers();
  }
}

function removeInput(inputNumber) {
  const inputContainerToRemove = document.querySelector(
    `input[name="input_files${inputNumber}"]`
  ).parentNode.parentNode;
  inputContainerToRemove.remove();
  inputCount--;

  updateRemoveButtonHandlers();
  updateInputNames();
}

function updateRemoveButtonHandlers() {
  const removeButtons = document.querySelectorAll(".input-container button");
  removeButtons.forEach((button, index) => {
    button.onclick = function () {
      removeInput(index + 1);
    };
  });
}

function updateInputNames() {
  const inputContainers = document.querySelectorAll(".input-container");
  inputContainers.forEach((container, index) => {
    const input = container.querySelector("input");
    const removeButton = container.querySelector("button");

    input.name = `input_files${index + 1}`;
    input.placeholder = `Input ${index + 1}`;
    input.id = `input_files${index + 1}`;

    removeButton.onclick = function () {
      removeInput(index + 1);
    };
  });
}
