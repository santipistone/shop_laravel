let shop= [];
let dx=0;


function loadShop(num) {

    const arrival = document.querySelector("#box1");

    //DIV
    let div = document.createElement("div");
    div.id = "box21";
    arrival.appendChild(div);

    //IMG

    let img = document.createElement("img");
    img.src = assetBaseUrl +"upload_img/"+CONTENT[num].image;
    img.className = "img5";
    div.appendChild(img);


    //TESTO

    let texts = document.createElement("p");
    texts.textContent = CONTENT[num].nome;
    texts.id = "text2";
    div.appendChild(texts);
   

    //ICS

    let img2 = document.createElement("img");
    img2.src = assetBaseUrl +"img/trash.png";
    img2.id = "img6";
    img2.dataset.indexNumber = num;
    div.appendChild(img2);
    img2.addEventListener("click", delShop);
    return;
}

function onThumbnailClick() {
    const area = document.createElement("div");
    const text123 = document.createElement("p");
    text123.textContent ="Ops!";
    const br = document.createElement("br");
    const br1 = document.createElement("br");
    const br2 = document.createElement("br");
    const br3 = document.createElement("br");
    const br4 = document.createElement("br");

    area.appendChild(br);
    area.appendChild(text123);
    area.appendChild(br1);
    area.appendChild(br2);
    const text124 = document.createElement("p");
    text124.textContent = "Sembra che il prodotto selezionato da te sia sold-out!"
    area.appendChild(text124);
    const text125 = document.createElement("p");
    text125.textContent = "Tornerà disponibile a breve!"
    area.appendChild(text125);
    document.body.classList.add('no-scroll');
    modalView.style.top = window.pageYOffset + 'px';
    modalView.appendChild(area);
    modalView.classList.remove('hidden');
  }

function onModalClick() {
    document.body.classList.remove('no-scroll');
    modalView.classList.add('hidden');
    modalView.innerHTML = '';
}


function addShop(event) {
    const num = event.currentTarget.dataset.indexNumber;
    if (CONTENT[num].stock < 1*1) {
        onThumbnailClick()
        return;
    }
    if (isAlsoShop(num) === false) {
        let name = "shop"+num;
        getItems();
        setCookie(name, num, 7);
        shop.push(num);
        loadShop(num);
        return;
    }
}

function isValid(value) {
    if (isNaN(parseInt(value, "10")))
        return false;
    else return true;
};

function getItems() {
    var ca = document.cookie.split(';');
    for (let x=0; x<ca.length; x++) {
        var j = ca[x];
        var iy = j.split("=")[1];
        if (isValid(iy)) 
            shop.push(iy);
    }
    for (let j=0; j<shop.length; j++) {
        if (isAlsoShop(shop[j]) === false)
            loadShop(shop[j]);
    }
}

function gotOrder() {
    var ca = document.cookie.split(';');
    for (let x=0; x<ca.length; x++) {
        var j = ca[x];
        var iy = j.split("=")[1];
        if (isValid(iy)) 
            eraseCookie(iy);
    }
}


function openShop() {
    if (open === 1) {
        closeLog();
        open = 0;
    }
    let cdf = 0;
    const l1 = document.querySelector("#box1");
    if (shop.length === 0) {
        getItems();
        for (let j=0; j<shop.length; j++) {
            loadShop(shop[j]);
            cdf = 1;
        }
        if (cdf === 1) {
            if (l1.classList.contains("flex1")) {
                l1.classList.remove("flex1");
                l1.classList.add("hidden");
            } else {
                l1.classList.add("flex1");
                l1.classList.remove("hidden");
            }
        }
    } else {
        if (l1.classList.contains("flex1")) {
            l1.classList.remove("flex1");
            l1.classList.add("hidden");
        } else {
            l1.classList.add("flex1");
            l1.classList.remove("hidden");
        }
        open = 1;
    }
    
}


function closeShop() {
    const l1 = document.querySelector("#box1");
    l1.classList.add("hidden");
    l1.classList.remove("flex1");
    open=0;
}

function updateShop(x) {
    const tagh = document.querySelectorAll("#box21");
    for (let b of tagh) {
        if (b.querySelector("#img6").dataset.indexNumber === x) {
            b.parentNode.removeChild(b);
            shop.pop(x);
            let name = "shop" + x;
            eraseCookie(name);
            if (shop.length === 0) {
                closeShop();
            }
        }
    }
}


function delShop(event) {
    const num = event.currentTarget.dataset.indexNumber; 
    updateShop(num);
}

    

function isAlsoShop(x) {
    for (let yeld of shop) {
        if (x === yeld) {
            return true;
        }
    }
    return false;
}



function retrieveItems() {
    getItems();
    if (shop.length != 0 && dx===0) {
    for (let j=0; j<shop.length; j++) {
        loadShop(shop[j]);
        dx =1;
        }
    }
    document.querySelector("#open_shop").addEventListener("click", openShop);
    document.querySelector("#x1").addEventListener("click", closeShop);

}

document.body.onload = retrieveItems;
var modalView;

modalView = document.querySelector('#modal-view');
modalView.addEventListener('click', onModalClick);
