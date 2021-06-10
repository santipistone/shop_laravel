<div class="desc">
<h2><p>{{ $name }}  </p></h2>
<img class="title" src="{{ URL::asset('upload_img/'.$img) }}">

<div>
<h4><p>
<form id="order" action="{{ action('Order@showOrdini2') }}" method="POST">
<input type="hidden" id="cod2[1]" name="cod2[0]" value="{{ $it }} ">
<input type="hidden" id="num" name="num" value=1>
<input type="hidden" id="x2" name="x2" value=1>
<input type="hidden" name="_token" value="{{ csrf_token() }}">     
<div style="margin-top: -40px;">
@if($stock > 0)
<p>Quantità <br></p>
<select style="width:100px; height: 30px; margin-top:20px; margin-left: 16px;", class="stock" id="stock", name="stock">
<script src="{{ URL::asset('js/tip.js') }}"></script>
 <script> addElem(@if ($stock < 5) {{ $stock }} @else {{ 5 }} @endif) </script> @else @endif
</select> 
</div> <div style="margin-top: 20px;">
@if ($stock > 0) 
<button type="submit">Acquista ora <br> <img src="{{ URL::asset('img/shop2.png') }}" class="img_shop" ></button></div></form>
@elseif ($stock < 1)  <p>Non disponibile</p>  @endif
</p></h4>
<h4><p>{{ $desc }} <br><br><br>Prezzo : {{ $price}} €</p></h4>
<h4><p>@if ($stock > 10) Disponibile @elseif ($stock >= 1 && $stock < 10) Disponibilità limitata @else Sold-out @endif<br><br><br> Magazzino: {{ $mag }}                               

</p></h4>
</div>
</div>