


const prewiew = document.getElementById("prewiew");
const fileInput = document.getElementById("file");

fileInput.onchange = () => {
    let file = fileInput.files[0];
    let url = URL.createObjectURL(file);
    prewiew.src = url;
}

/**
 * @param {Blob} file 
 * 
 * @returns {Promise<string>}
 */
async function getLink(file){
    let output;
    let data = new FormData();
    data.append("image", file)
    let request = await fetch(requestPath, {method:"POST",headers: {
                'X-CSRF-TOKEN': token,
                'Accept': 'application/json'
            }, body:data});
    if(request.ok){
        let responce = await request.json();
        console.log(responce);
        output = responce.link
    }else{
        output = "Ошибка отправки формы";    
    }
    return output;
}


const form = document.getElementById("image-form");
const image_file = form.querySelector("#image-file");
const image_view = form.querySelector("#image-prewiew");
const image_link = document.getElementById("image-link");

setTimeout(() => {
   let notification = document.getElementById("notification");
   if(notification != null){
        notification.style.opacity = 0;
        setTimeout(() => {
            notification.remove();
        }, 1000)
   }
}, 5000)

form.addEventListener('submit', (e) => {
    e.preventDefault();
    let file = image_file.files[0];     
    let request = getLink(file);
    request.then((link) => {
        image_link.value = link;
    })
})
image_file.onchange = () => {
    let file = image_file.files[0];
    let url = URL.createObjectURL(file);
    image_view.src = url;
}

