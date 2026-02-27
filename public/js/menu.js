


let button = document.getElementById("menu-button");
let menu = document.querySelector(".menu-type");
button.addEventListener("click", (e) => {
    if(menu.style.display == "grid"){
        menu.style.display = "none";
    }else{
        menu.style.display = "grid";
    }
})



