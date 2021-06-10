let price_s = [];
var prezzo = 0;
let shop2 = [];

let numero = 0;

function loadOrder(a, b, c, d) {



    let targ1 = document.querySelector(".unbd3");
                                    
    var opt = document.createElement('div');
    opt.className ="opt";
    targ1.appendChild(opt);

    var hot1 = document.createElement("a");
    hot1.href = "home/item/"+d;
    opt.appendChild(hot1);

    var img_x = document.createElement("img");

    img_x.className ="shop_img";
    img_x.src = "/upload_img/"+a;
    hot1.appendChild(img_x);

    var text1 = document.createElement("p");
    text1.textContent = b;
    text1.style="margin-right: 600px; font-size: 1.6em;";
    opt.appendChild(text1);

    var text2 = document.createElement("p");
    text2.textContent = c + " €";
    text2.style ="margin-right: 60px; font-size: 1.6em;";
    opt.appendChild(text2);

    var inpt2 = document.createElement("input");
    inpt2.type="hidden";
    inpt2.id ="cod2["+numero+"]";
    inpt2.name ="cod2["+numero+"]";
    inpt2.value = d;
    opt.appendChild(inpt2);
    numero++;

    if (numero == shop2.length) {
        numItem(numero);
    }

}

function numItem(numero) {
    let formx = document.querySelector("#order");
    var inpt3 = document.createElement("input");
    inpt3.type="hidden";
    inpt3.id ="num";
    inpt3.name ="num";
    inpt3.value = numero;
    formx.appendChild(inpt3);

}

function onRes(resp) {
    return resp.json();
}

let j=0;


function getValue(resp) {
    prezzo = prezzo + resp.prezzo*1;
    loadOrder(resp.image, resp.nome, resp.prezzo, resp.codice);
    document.querySelector(".price_add").textContent = prezzo + " € ";
    j++;
}

function isValid(value) {
    return (/^\d+$/.test(value) && !isNaN(parseInt(value.trim(), 10)));
};


function getShop() {
    var ca = document.cookie.split(';');
    for (let x=0; x<ca.length; x++) {
        var j = ca[x];
        var iy = j.split("=")[1];
        if (isValid(iy)) 
            shop2.push(iy);
    }
}


function loadOrderPrice() {
    getShop();
    if (shop2.length == 0) {
        window.location.replace("/home"); 
    }
    for (let i=0; i<shop2.length; i++) {
        fetch("/cont/item/"+shop2[i]).then(onRes).then(getValue);

    }

}

loadOrderPrice();
