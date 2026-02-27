

function getRandomPosition(){
    return {
        left:Math.random() * 100,
        top:Math.random() * 100,
        duration:Math.random() * 20
    }
}


let pizzas = document.querySelectorAll(".pizza");
let fishs = document.querySelectorAll(".fish");
pizzas.forEach(pizza => {
        let position = getRandomPosition();
        pizza.style.left = position.left + "%";
        pizza.style.top = position.top + "%";
        pizza.style.animationDuration = (position.duration >= 5 ? position.duration : 5) + "s";
    })
    fishs.forEach(fish => {
        let position = getRandomPosition();
        fish.style.left = position.left + "%";
        fish.style.top = position.top + "%";
})

setInterval(() => {
    pizzas.forEach(pizza => {
        let position = getRandomPosition();
        pizza.style.left = position.left + "%";
        pizza.style.top = position.top + "%";
        pizza.style.animationDuration = (position.duration >= 5 ? position.duration : 5) + "s";
    })
    fishs.forEach(fish => {
        let position = getRandomPosition();
        fish.style.left = position.left + "%";
        fish.style.top = position.top + "%";
    })
}, 10000)