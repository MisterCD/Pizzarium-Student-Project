





let avatar = document.getElementById("file");
let prewiew = document.getElementById("prewiew");
let notification = document.getElementById("notification");



avatar.onchange = () => {
    let file = avatar.files[0];
    let url = URL.createObjectURL(file);
    prewiew.src = url;
}

setTimeout(() => {
    notification.style.opacity = 0;
    setTimeout(() => {notification.remove();}, 1000);
}, 5000)

