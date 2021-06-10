var active = 0;


function checkEmail(e1, e2) {
    if (e1.localeCompare(e2) == 0) 
        return true;
    else
        return false;
}

function checkPasw(e1, e2) {
    if (e1.localeCompare(e2) == 0) 
        return true;
    else
        return false;
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

function check1(str) {
    if (str.lenght < 8) {
        return false;
    } else return true;
}

function check2(str) {
    if (str.length < 10) {
        return false;
    } else return true;
}

function isEmail(e1) {
    if(!/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(e1))
        return false;
    else
        return true;

}

function isPassw(e1) {
    if (e1.length < 8) {
        return false;
    } else return true;
}



function check(event) {
    event.preventDefault()
    const a = document.querySelector("#mail").value;
    const b = document.querySelector("#mail2").value;
    const fz = checkEmail(a, b);
    const ea = isEmail(a);
    const c = document.querySelector("#passw").value;
    const d = document.querySelector("#passw2").value;
    const rz = checkPasw(c, d);
    const eb = isPassw(c);
    const a1 = check1(document.querySelector("#name").value); 
    const a2 = check2(document.querySelector("#ind").value)
    if (fz)   {
        if (active === 0)
        removeError1();
    }
    if (rz) {
        if (active === 0)
        removeError1();
    }
    if (a1) {
        if (active === 0)
        removeError1();
    }
    if (a2) {
        if (active === 0)
        removeError1();
    }
    if (!a1) {
        if (active === 0) {addError1(); updateError1("Lunghezza minima username: 8 caratteri")}
        else updateError1("Lunghezza minima username: 8 caratteri");
        return false;
    }
    if (!fz) {
        if (active === 0) {addError1(); updateError1("L'email non sono corrispondenti")}
        else updateError1("L'email non sono corrispondenti");
        return false;
    }
    if(!rz) {
        if (active === 0) {addError1(); updateError1("Le password non corrispondono")}
        else updateError1("Le password non corrispondono");
        return false;
    }
    if (!ea) {
        if (active === 0) {addError1(); updateError1("Inserire una mail valida")}
        else updateError1("Inserire una mail valida");
        return false;
    }
    if (!eb) {
        if (active === 0) {addError1(); updateError1("Inserire una password valida \r\n( 8 caratteri almeno )")}
        else updateError1("Inserire una password valida ( 8 caratteri almeno )");
        return false;
    }
    if (!a2) {
        if (active === 0) {addError1(); updateError1("Inserire un indirizzo valido")}
        else updateError1("Inserire un indirizzo valido");
        return false;
    }
    if (ea) {
        if (active === 0)
        removeError1();
    }
    if (eb) {
        if (active === 0) 
        removeError1();
    }
    if(active === 0)
        j.submit();
}




const j = document.querySelector(".flex3");
j.addEventListener("submit", check);