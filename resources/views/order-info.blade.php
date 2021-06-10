<div class="unbd2">
<script src="{{ asset('js/tip.js') }}" defer ></script>
<h3><p>{{ session('name') }} effettua un ordine!<br></p></h3><br>
<form class="flex3" action="{{ action('Order@ordina') }}" method="POST">
    @for ($var=0; $var < request('num'); $var++) 
        <input type='hidden' id=' cod2[{{ $var }}] ' name='cod2[{{ $var }}]' value='{{request('cod2')[$var] }}'>
    
    @endfor
<input type="hidden" id = "stock" name="stock" value= "{{ request('stock')}} ">
<input required="required" id="indirizzo" name="indirizzo" class="input-box3" placeholder="Indirizzo">
<input type="hidden" name="_token" value="{{ $csrf_token }}">     
<input required="required" id="cf" name="cf" class="input-box3" placeholder="Codice fiscale">
<input required="required" id="card-id" name="card-id" class="input-box3" placeholder="Codice carta di credito">
<input type="number" min="100" max="999" required="required" id="cvv" name="cvv" class="input-box3" placeholder="CVV">
<input required="required" id="data-card"  class="date1" name="data-card class="input-box3" placeholder="Data di scadenza" onfocus="(this.type='date')"><br><br>
<input type="hidden" id="num" name="num" value="{{ request('num') }}">

<div class="hidden" id="alert" style="top:110.5%;"><p></p></div>


<input id="but1" style="padding: 25px;" type="submit" value="Acquista"></div></div>

</form>
</div>