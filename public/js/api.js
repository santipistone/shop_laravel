
const num_max_result = 9;


function onTResp(response) {
    return response.json();
}

function onJRest(json) {
    //console.log(json);
    token = json.access_token;
}



function onJson2(json) {
    list = json.albums.items;
    jax = list.length;
    if (jax === 0) return;
    if (jax > num_max_result) jax = num_max_result;
    for (let y =0; y< jax; y++) {
        addAlbum(list[y].artists[0].name, list[y].images[1].url, list[y].name, list[y].uri)
    }
}

function lookFor2(val) {
    q = encodeURIComponent(val);
    const url = "/home/api/service/2/"+val ;
    fetch(url).then(onTResp).then(onJson2);
}


function addAlbum(name, img2, author, url) {

    let show = document.querySelector(".int2").parentElement;
    show.classList.remove("hidden");
    show.id = "flex";
    let hider = document.querySelector("#alert1");
    hider.classList.add("hidden");
    let div = document.createElement('div');
    let base = document.querySelector(".bd");
    div.className = "square" ;
    base.appendChild(div);

    //TITLE
    let title = document.createElement("p");
    title.textContent = name;
    title.id = 'text_h'
    div.appendChild(title);


    //IMG
    let img = document.createElement("img");
    img.src = img2;
    img.className = 'img1';
    div.appendChild(img);


    let br = document.createElement("br");
    div.appendChild(br);

    //DESC
    let desc = document.createElement("p");
    desc.textContent = author;
    desc.classList.add("hidden");
    desc.id="text1";
    desc.addEventListener("click", removeText);
    div.appendChild(desc);
    

    let desc2 = document.createElement("p");
    desc2.textContent = "Clicca qui per il titolo della canzone";
    desc2.id = "desc";
    desc2.addEventListener("click", getText);
    div.appendChild(desc2);

    let pr = document.createElement("a");
    pr.href = url;
    div.appendChild(pr);

    let but1 = document.createElement("img");
    but1.id = "img4";
    but1.className = 'props';
    but1.src = '/img/headphone.png';
    but1.style = 'height: 30px;'
    pr.appendChild(but1);


}



///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
//LAST.FM
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////



function addElem(name, img2, author, url) {

    let show = document.querySelector(".int").parentElement;
    show.classList.remove("hidden");
    show.id = "flex";
    let hider = document.querySelector("#alert1");
    hider.classList.add("hidden");
    let div = document.createElement('div');
    let base = document.querySelector(".bd3");
    div.className = "square" ;
    base.appendChild(div);

    //TITLE
    let title = document.createElement("p");
    title.textContent = name;
    title.id = 'text_h'
    div.appendChild(title);

    //LINK
    let link = document.createElement("a");
    link.href = '#';
    div.appendChild(link);

    //IMG
    let img = document.createElement("img");
    img.src = img2;
    img.className = 'img1';
    link.appendChild(img);


    let br = document.createElement("br");
    div.appendChild(br);

    //DESC
    let desc = document.createElement("p");
    desc.textContent = author;
    desc.classList.add("hidden");
    desc.id="text1";
    desc.addEventListener("click", removeText);
    div.appendChild(desc);
    

    let desc2 = document.createElement("p");
    desc2.textContent = "Clicca qui per il titolo della canzone";
    desc2.id = "desc";
    desc2.addEventListener("click", getText);
    div.appendChild(desc2);

    let pr = document.createElement("a");
    pr.href = url;
    div.appendChild(pr);

    let but1 = document.createElement("img");
    but1.id = "img4";
    but1.className = 'props';
    but1.src = '/img/headphone.png';
    but1.style = 'height: 30px;'
    pr.appendChild(but1);


}


function onJson(resp) {
    const start = resp.results.albummatches.album;
    let author;
    let name;
    let img;

    let num = start.length;
    if (num === 0) return;
    if (num > num_max_result)  num = num_max_result;
    for (let i=0; i<num_max_result; i++) {
        const x = start[i];
        const title = x.name;
        const author = x.artist;
        const img2 = x.image[2]["#text"];
        const url = x.url;
        addElem(author, img2, title, url);
    }
    return;
}


function clearHome() {
    const j = document.querySelector(".bd");
    if (j.querySelectorAll(".square")) {
        const k = j.querySelectorAll(".square");
        if (k.length !== 0)  {
            for (let h = 0; h < k.length; h++) {
                k[h].parentNode.removeChild(k[h]);
            }
        }
    }
   
}

function clearHome2() {
    const j = document.querySelector(".bd2");
    if (j.querySelectorAll(".square")) {
        const k = j.querySelectorAll(".square");
        if (k.length !== 0)  {
            for (let h = 0; h < k.length; h++) {
                k[h].parentNode.removeChild(k[h]);
            }
            
        }
    }
}


function onResp(resp) {
    return resp.json();
}


function lookFor(val) {
    const url = "/home/api/service/1/"+val ;
    fetch(url).then(onResp).then(onJson);
}


function searchFor(event) {
    event.preventDefault();
    clearHome();
    clearHome2();
    const value1 = document.querySelector(".input-box").value;
    var values = value1.replace(" ", "%2");
    var valuel = value1.replace(" ", "%27");
    lookFor2(values);
    lookFor(valuel);

}

function getText(event) {
    event.currentTarget.classList.add("hidden");
    event.currentTarget.parentNode.querySelector("#text1").classList.remove("hidden");
}

function removeText(event) {
    event.currentTarget.classList.add("hidden");
    event.currentTarget.parentNode.querySelector("#desc").classList.remove("hidden");
}


document.querySelector(".flex-1").addEventListener("submit", searchFor);

