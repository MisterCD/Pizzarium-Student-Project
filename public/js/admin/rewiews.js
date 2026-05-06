let tool = document.querySelector(".tool");
let id = document.querySelectorAll(".rewiewId");
addEventListener("click", (e) => {
    let selector = e.target.getAttribute("class");
    if(selector == "rewiew-card"){
        tool.style.display = "flex";
        tool.style.top = e.pageY + "px";
        tool.style.left = e.pageX - 110 + "px";
        id.forEach(input => {
            input.value = e.target.querySelector("input").value;
            console.log(e.target.querySelector("input").value);
        })
    }else{
         tool.style.display = "none";
    }
})






