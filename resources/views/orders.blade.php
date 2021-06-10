<div class="unbd2" > <br>
<a href="/home" id="but1">Torna indietro</a><br><br><br>

<p> Benvenuto : {{ session('name') }}<br>
<br>Lista ordini <br><br>
{{ Utente::getOrderClient(session('id')) }} 
</div>