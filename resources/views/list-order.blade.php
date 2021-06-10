<div class="unbd2" ><p>
<br><a href="/home/user" id="but1">Torna indietro</a><br><br><br>
<table>
    <tr><td>Nome prodotto</td><td>Codice Cliente</td><td>Data</td><td>Quantità</td><td>Orario</td><td>Indirizzo</td><td>Negozio</td><td>Spedito</td></tr>
    @foreach ($q1 as $x) 
        <tr><td>{{ Prodotto::where('codice', $x->codice_prodotto)->first()->nome }}</td><td> {{$x->codice_cliente}}</td><td>{{ $x->data_}}</td><td>{{ $x->stock}}</td><td>{{ $x->orario}}</td><td>{{ $x->indirizzo_sped}}</td><td>{{Negozio::where("codice", $x->codice_neg)->first()->codice_m }}</td><td>  @if ($x->spedito == '1') 
            <img src=/img/ok.png' style='height: 20px; margin-right: 5px;'>
        @else
        <img src='/img/no.png' style='height: 30px;'>@endif </td></tr>
    @endforeach
</table><br><br></p>
</div>