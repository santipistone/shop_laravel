<div id="box4">
<form action="{{ action('Login@checkLogin') }}" method="POST">
<input type="hidden" name="_token" value="{{ $csrf_token }}">
<input class="input-box2" name="email" placeholder="Username">
<input type="password" name="passw" id="change-id" class="input-box2" placeholder="Password">
<img src="{{ URL::asset('img/eye-slash.png') }}" class="ico-eye"></img>
<input id="but6" value="Accedi" type="submit"><br>
<a href="{{ URL('home/reg') }}" id="but6">Registrati</a>
</form>
</div>