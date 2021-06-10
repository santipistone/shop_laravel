function addElem(num) {
    let select = document.querySelector(".stock");
    for (let x=0; x<num; x++) {
        var opt = document.createElement('option');
        opt.value = x+1;
        opt.innerHTML = x+1;
        select.appendChild(opt);
    }
}

var active = 0;

var valueForm = 0;

function checkInd(str) {
    return (/\d/.test(str));
}

function checkCF(str) {
    return (/^[0-9a-zA-Z]{16}$/.test(str));
}

function checkCC(str) {
    return (/^[0-9]{16}$/.test(str));
}

function updateError1(str) {
    const h = document.querySelector("#alert");

    h.innerText = "Errore! \n\r"+str;
}


function removeError1() {
    const h = document.querySelector("#alert");
    h.classList.add("hidden");
    h.classList.remove("alert");
}


function addError1() {
    const h = document.querySelector("#alert");
    h.classList.remove("hidden");
    h.classList.add("alert");
}

function checkInput(event) {
    event.preventDefault();
    const ind = document.querySelector("#indirizzo").value
    const cf = document.querySelector("#cf").value;
    const cc = document.querySelector("#card-id").value;
    const f1 = checkInd(ind);
    const f2 = checkCF(cf);
    const f3 = checkCC(cc);
    if (f1)   {
        if (active === 0)
        removeError1();
    }
    if (f2)   {
        if (active === 0)
        removeError1();
    }
    if (f3)   {
        if (active === 0)
        removeError1();
    }
    if (!f1) {
        if (active === 0) {addError1(); updateError1("L'indirizzo inserito non e' valido!")}
        else updateError1("L'email non sono corrispondenti");
        return false;
    }
    if (!f2) {
        if (active === 0) {addError1(); updateError1("Il codice fiscale inserito non e' valido!")}
        else updateError1("L'email non sono corrispondenti");
        return false;
    }
    if (!f3) {
        if (active === 0) {addError1(); updateError1("La carta di credito inserita non è valido!")}
        else updateError1("L'email non sono corrispondenti");
        return false;
    }
    if(active === 0)
        kkkk3.submit();
}



function checkLog(event) {
    event.preventDefault();
    if (document.querySelector(".check_reg") === null) {
        alert("Devi accedere per effettuare un ordine!");
        return false;
    } else
    document.querySelector("#order").submit();
}


function onThumbnailClick() {
    const area = document.createElement("div");
    const text123 = document.createElement("p");
    text123.textContent ="Attento!";
    const br = document.createElement("br");
    const br1 = document.createElement("br");
    const br2 = document.createElement("br");

    area.appendChild(br);
    area.appendChild(text123);
    area.appendChild(br1);
    const text124 = document.createElement("p");
    text124.textContent = "Eliminando il prodotto eliminerai pure tutti gli ordini!"
    area.appendChild(text124);
    const text125 = document.createElement("p");
    text125.textContent = "Sei sicuro di volerlo fare?!"
    area.appendChild(text125);
    const but = document.createElement("button");
    but.id ="but1";
    but.textContent = "Procedi";
    area.appendChild(but);

    but.addEventListener("click", submitForm);
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

function warningModal(event) {
    event.preventDefault();
    valueForm = event.target[1].value;
    onThumbnailClick();
    return;
}

function submitForm(event) {
    var xgfs = document.querySelectorAll(".delete-item");
    for (var hhhhs of xgfs) {
        if (hhhhs.value == valueForm) {
            hhhhs.parentNode.parentNode.submit();
        }
    }
}

var kkkk3 = 0;

if (document.querySelector(".flex3")) {
    kkkk3 = document.querySelector(".flex3");
    kkkk3.addEventListener("submit", checkInput);
}

var kkkk1 = 0;

if (document.querySelector("#order")) {
    const kkkk1 = document.querySelector("#order");
    kkkk1.addEventListener("submit", checkLog);
}

if (document.querySelector(".elimina")) {
    var xgfs = document.querySelectorAll(".elimina");
    for (var respx of xgfs)
        respx.addEventListener("submit", warningModal);
}



