

const background = document.getElementById("background");

function spawnObjects(count, className){
    let list = [];
    for(let i = 0; i <= count; i++){
        let object = document.createElement("div");
        object.className = className;
        background.append(object);
        list.push(object);
    }
    return list;

}

let count = (Math.random() * 10).toFixed(0);

let vs = spawnObjects(count, "vodrosli");

vs.forEach((elem) => {
    elem.style.left = Math.random() * 100 + "%";
})
count = (Math.random() * 10).toFixed(0) - 3;

let rooks = spawnObjects(count, "rook");

rooks.forEach((elem) => {
    elem.style.left = Math.random() * 100 + "%";
})

count = (Math.random() * 10).toFixed(0) - 5;

let fishsRandom = spawnObjects(count, "fish");

fishsRandom.forEach((elem) => {
    let orintation = Math.random();
    if(orintation > 0.5){
        elem.style.transform = "rotate(180deg)";
    }
    elem.style.animation = "left 15s infinite";
})
vs = null;
rooks = null;
fishsRandom = null;
fishs = document.querySelectorAll(".fish");
fishs.forEach(fish => {
        let position = getRandomPosition();
        fish.style.left = position.left + "%";
        fish.style.top = position.top + "%";
})

const v1 = document.getElementById("vodrosli1");
const v2 = document.getElementById("vodrosli2");
const v3 = document.getElementById("vodrosli3");
const v4 = document.getElementById("vodrosli4");
const r = document.querySelector(".rook");

v1.style.left = Math.random() * 100 + "%";
v2.style.left = Math.random() * 100 + "%";
v3.style.right = Math.random() * 100 + "%";
v4.style.right = Math.random() * 100 + "%";
r.style.left = Math.random() * 100 + "%";

