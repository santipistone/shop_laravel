<div id="box4">
<p class='check_reg'>Benvenuto {{ session('name')}} </p>
<div id="collect">
        <a href="{{ url('home/user') }}" id="but2"><p>Utente</p></a>
        <a href="{{ action('Login@logout') }}" id="but2"><p>Esci</p></a>
</div>