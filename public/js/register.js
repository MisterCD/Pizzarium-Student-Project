



let password = document.getElementById("password");
let passwordVerefy = document.getElementById("password-verefy");
let error = document.getElementById("error-message");
let button = document.getElementById("register-button");
button.style.pointerEvents = "none";
button.style.backgroundColor = "red";
let form = document.querySelector("form")
passwordVerefy.onchange = () => {
    if(password.value != passwordVerefy.value){
        error.textContent = "Пароли не совпадают!";
        button.style.pointerEvents = "none";
        button.style.backgroundColor = "red";
    }else{
        error.textContent = "";
        button.style.pointerEvents = "";
        button.style.backgroundColor = "";
    }
}
password.onchange = () => {
    if(password.value != passwordVerefy.value){
        error.textContent = "Пароли не совпадают!";
        button.style.pointerEvents = "none";
        button.style.backgroundColor = "red";
    }else{
        error.textContent = "";
        button.style.pointerEvents = "";
        button.style.backgroundColor = "";
    }
}
form.addEventListener("keydown", (e) => {
    if(e.keyCode == 13){
        e.preventDefault();
    }
})


