<div class="unbd2">
<script src="{{ URL::asset('js/check_reg.js') }}" defer></script>
<h3><p>Registrati ora!<br></p></h3><br>
<form class="flex3" action="{{ action('Reg@Registra') }}" method="POST">
<input type="hidden" name="_token" value="{{ $csrf_token }}">
<input required="required" id="name" name="name" class="input-box3" placeholder="Nome">
<input required="required" id="mail" name="mail" class="input-box3" placeholder="E-mail">
<input required="required" id="mail2" name="mail2" class="input-box3" placeholder="Ripeti e-mail">
<input required="required" id="passw" type="password" name="passw" class="input-box3" placeholder="Password">
<input required="required" id="passw2" type="password" name="passw2" class="input-box3" placeholder="Ripeti password">
<input required="required" id="ind" name="ind" class="input-box3" placeholder="Indirizzo">
<input id="checkd" required="" type="text" name="data" class="date1" placeholder="Data di nascita" onfocus="(this.type='date')"/>
<p><input name="check" required="required" type="checkbox" id="ok" > Registrandoti accetti la nostra politica sulla privacy</p>
<input id="but1" type="submit" value="Registrati ora!">
</form>
<div class="hidden" id="alert"><p></p></div>
</div>
</div>