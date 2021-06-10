    <div class="unbd2" ><p>
    Complimenti {{ session('name') }} !  <br>Grazie per aver effettuato l'ordine! <br><br>Riceverai una mail con tutte le informazioni riguardanti il tuo ordine entro pochi minuti.<br><br><br>
    <!--FUNZIONE PER SVUOTARE CARRELLO -->
    <script defer>

    var ca = document.cookie.split(';');
    for (let x=0; x<ca.length-1; x++) {
        var j = ca[x];
        console.log(ca[x]);
        document.cookie = j +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
    } 
    </script>
    <a href="/home" id="but1" style="width: 200px;" > Torna alla home</a>
    </p> </div>
