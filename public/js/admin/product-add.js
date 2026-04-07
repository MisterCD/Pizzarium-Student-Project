


const prewiew = document.getElementById("prewiew");
const fileInput = document.getElementById("file");

fileInput.onchange = () => {
    let file = fileInput.files[0];
    let url = URL.createObjectURL(file);
    prewiew.src = url;
}


