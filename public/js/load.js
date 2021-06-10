
function addElement(resp) {

    let x=0;
    let y=1;
    while (resp[x] != undefined) {
        //DIV
        let div = document.createElement('div');
        let base = document.querySelector(".bd");
        div.className = "square" ;
        base.appendChild(div);

        //TITLE
        let title = document.createElement("p");
        title.textContent = resp[x].nome;
        title.id = 'text_h'
        div.appendChild(title);

        //LINK
        let link = document.createElement("a");
        link.href = 'home.php?page=item&item='+resp[x].codice;
        div.appendChild(link);

        //IMG
        let img = document.createElement("img");
        img.src = "img/"+resp[x].img;
        img.className = 'img1';
        link.appendChild(img);


        let br = document.createElement("br");
        div.appendChild(br);

        //DESC
        let desc = document.createElement("p");
        desc.textContent = resp[x].desc;
        desc.classList.add("hidden");
        desc.id="text1";
        desc.addEventListener("click", removeText);
        div.appendChild(desc);
        

        let desc2 = document.createElement("p");
        desc2.textContent = "Clicca qui per maggiori info";
        desc2.id = "desc";
        desc2.addEventListener("click", getText);
        div.appendChild(desc2);


        let div1 = document.createElement('div');
        div1.className = "div1" ;
        div.appendChild(div1);


        //SHOP BUTTON
        let but1 = document.createElement("img");
        but1.id = "img4";
        but1.className = 'props';
        but1.src = 'img/shop.png';
        but1.dataset.indexNumber = resp[x].codice;
        but1.addEventListener("click", addShop);
        div1.appendChild(but1);
        x++;
    }
    
}

function getCont(resp) {
    return resp.json();
}



var resp = fetch("cont/look.php").then(getCont).then(addElement);


function getText(event) {
    event.currentTarget.classList.add("hidden");
    event.currentTarget.parentNode.querySelector("#text1").classList.remove("hidden");
}

function removeText(event) {
    event.currentTarget.classList.add("hidden");
    event.currentTarget.parentNode.querySelector("#desc").classList.remove("hidden");
}
