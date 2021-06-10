

///////////////////////////////////////////////////////////////////////////
//FAV.JS
///////////////////////////////////////////////////////////////////////////


let open= 0;

let show = 0;


function hidElement(str) {

    const r31 = document.querySelectorAll("#img4");
    for (let r32 of r31) {
        if (r32.dataset.indexNumber === str) {
            const t = r32.parentNode.parentNode;
            t.classList.add("hidden");
        } else {
        }
    }
    
}

function retElement() {
    const r31 = document.querySelectorAll("#img4");
    for (let r33 of r31) {
        const t = r33.parentNode.parentNode;
        if (t.classList.contains("hidden"))
            t.classList.remove("hidden");
    }
}

function retElement2(str) {
    const r31 = document.querySelectorAll("#img4");
    for (let r34 of r31) {
        const t = r34.parentNode.parentNode;
        if (t.classList.contains("hidden") && t.querySelector("#text_h").textContent.toLowerCase().indexOf(str) > -1 )
            t.classList.remove("hidden");
    }
}

function updateElement(str) {
    if (str.length === 0) {
        retElement();
    } else {
        for (let i in CONTENT) {
            if (CONTENT[i].nome.toLowerCase().indexOf(str.toLowerCase()) < 0) {
                hidElement(i);
            }
            else {
                retElement2(str.toLowerCase());
            }
        }   
    }
}


function checkInput(event) {
    event.preventDefault();
    const input = document.querySelector(".input-box");
    updateElement(input.value);
}



function closeLog(event) {
    const l1 = document.querySelector("#box3");
    l1.classList.add("hidden");
    open=0;
}


function openLogin(event) {
    if (open === 1) {
        closeShop();
        open = 0;
    }
    const l1 = document.querySelector("#box3");
    if (l1.classList.contains("hidden")) {
        l1.classList.remove("hidden");
    } else {
        l1.classList.add("hidden");
    }
    open = 1;
}


function updateInput(event) {

    if (show == 0) {
        console.log(event.currentTarget);
        console.log("OK");
        event.currentTarget.src = "img/eye.png";
        const te = document.querySelector("#change-id");
        te.type="text";
        show = 1;
        return;
    }
    if (show == 1) {
        console.log(event.currentTarget);
        console.log("OK2");
        event.currentTarget.src = "img/eye-slash.png";
        const te = document.querySelector("#change-id");
        te.type="password";
        show = 0;
        return;
    }

}


var queryString = window.location.search;
var urlParams = new URLSearchParams(queryString);
var x = urlParams.get('page');

if (x != "music") {
    const fz = document.querySelector(".input-box");
    fz.addEventListener("keyup", checkInput);
} else 
    fz = "";

const fk = document.querySelector("#open_log");
fk.addEventListener("click", openLogin);

const fl = document.querySelector("#x2");
fl.addEventListener("click", closeLog);

if (document.querySelector(".ico-eye")) {
    const hggg = document.querySelector(".ico-eye");
    hggg.addEventListener("click", updateInput);
}








//////////////////////////////////////////////////////////////////////////////////





