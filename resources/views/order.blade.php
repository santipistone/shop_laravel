<script src="{{ asset('js/order.js') }}" defer></script>    
<form id="order" action="{{ action('Order@showOrdini2') }}" method="POST">        
<input type="hidden" id="x2" name="x2" value="1">
<input type="hidden" name="_token" value="{{ $csrf_token }}">           
<div class="unbd3">
<div class="opt3">
<div class="opt2">
<div><p class="price"> Prezzo : </p> <p class="price_add"></p>
</div>
</div>
<div class="opt2"><button type="submit" id="but1" style="margin-bottom: 20px; width: 200px; margin-left: 150px;">Acquista</button></div>
</form></div></div>