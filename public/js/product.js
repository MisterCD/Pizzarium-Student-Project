



class Slider extends HTMLElement{

    constructor(){
        super();
    }
    connectedCallback(){
        let images = this.querySelectorAll("img");
        let container = document.createElement("div");
        container.className = "container";
        images.forEach(elem => {
            container.append(elem);
        })
        let back = document.createElement("div");
        back.className = "back";
        back.textContent = "<";
        let next = document.createElement("div");
        next.className = "next";
        next.textContent = ">";
        let count = 0;
        let max = images.length - 1;
        function changeImages(){
            container.style.left = -100 * count + "%";   
        }
        back.onclick = () => {
            count--;
            if(count < 0){
                count = max;
            }
            changeImages();

        }
        next.onclick = () => {
            count++;
            if(count > max){
                count = 0;
            }
            changeImages();
        }
        container.style.left = 0;
        container.style.width = 100 * images.length + "%";
        this.append(container);
        this.append(back);
        this.append(next);
    }
    
}


customElements.define("slider-component", Slider)



