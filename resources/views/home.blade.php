<head>
<link rel='stylesheet' href="{{ URL::asset('css/style.css') }}"/>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script> var assetBaseUrl = "{{ asset('') }}";</script>
<script src="{{ URL::asset('js/script.js') }}" defer></script>
<script src="{{ URL::asset('js/db.js') }}" defer></script>
<script src="{{ URL::asset('js/shop.js') }}" defer></script>
<script src="{{ URL::asset('js/cookies.js') }}" defer></script>


<title>Shop</title>
</head>
<body>
    <nav>
    <div class="nav1">
            <a href="{{ url('home') }} "><div class="logo">Shop</div> </a>
            <form class="flex-1">
                <input class="input-box" placeholder="Cerca">
                <button id="but1"><img class ="img2" src="{{ URL::asset('img/glass.png') }}"></button>
            </form>
            <div class="acc"> 
                <a href="#" id="but3" ><img class ="img2" id="open_shop" src="{{ URL::asset('img/shop2.png') }}"></a>
                <a href="#" id="but3" ><img class ="img2" id="open_log" src="{{ URL::asset('img/user2.png') }}"></a></div>
                <div id="box" class="hidden">
                    <img src="{{ URL::asset('img/ex') }}" id="x">
                    <div class ="head1"></div>
                </div>
                <div id="box1" class="hidden">
                    <img src="{{ URL::asset('img/ex') }}" id="x1">
                    <div class ="head1"></div>
                    <div class="head2"><a href="/item/buy" id="but1" class="multi-acq" style="margin-left: 5px;">Acquista</a></div>
                </div>
                <div id="box3" class="hidden">
                    <img src="{{ URL::asset('img/ex') }}" id="x2">
                    <div class ="head1">
                    {{Login::login() }}

                        </div>
                    </div>
                </div>
            <div class="menu">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div> 
        
        </nav>

        <div class="head">
            <div class="overlay">
                <div id="intestazione"><br><br><br>
                    <p class="text1">Acquista!<br>Approfitta della spedizione gratuita!</p>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="start">
            @if (strpos(request()->route()->uri(), 'smartphone')  != false) 
                <a id="but4click" href="{{ url('home/smartphone-tablet') }}">
                    Smartphone & Tablet
                </a>
            @else
                <a id="but4" href="{{ url('home/smartphone-tablet') }}">
                        Smartphone & Tablet
                </a>
            @endif
            @if (strpos(request()->route()->uri(), "tv")) 
                <a id="but4click" href="{{ url('home/tv-elettrodomestici') }}">
                    TV & Elettrodomestici
                </a>
            @else
                <a id="but4" href="{{ url('home/tv-elettrodomestici') }}">
                TV & Elettrodomestici
                </a>
            @endif
            @if (strpos(request()->route()->uri(), "console")) 
                <a id="but4click" href="{{ url('home/console-giochi') }}">
                Console & Giochi
                </a>
            @else
                <a id="but4" href="{{ url('home/console-giochi') }}">
                Console & Giochi
                </a>
            @endif
            @if (strpos(request()->route()->uri(), "music")) 
                <a id="but4click" href="{{ url('home/music') }}">
                    Music
                </a>
            @else
                <a id="but4" href="{{ url('home/music') }}">
                        Music
                </a>
            @endif
            @if (strpos(request()->route()->uri(), "pc")) 
                <a id="but4click" href="{{ url('home/pc-workstation') }}">
                    PC & Workstation
                </a>
            @else
                <a id="but4" href="{{ url('home/pc-workstation') }}">
                        PC & Workstation
                </a>
            @endif
            </div>

            <div class="bd2">
                    @if (!isset($page))
                        {{ Content::getHome() }} 
                    @elseif($page === "reg")
                        {{ Reg::showReg() }}
                    @elseif($page === "item")
                        {{ Content::getItem($item) }}
                    @elseif ($page === "order")
                        {{ view("order")->with("csrf_token", csrf_token()) }}  
                    @elseif ($page === 'smartphone')
                        {{ view("smartphone") }}
                    @elseif ($page == "order/info")
                        {{ view("order-info")->with("csrf_token", csrf_token()) }}
                    @elseif ($page == "orders")
                        {{ view("orders") }}
                    @elseif ($page == "admin")
                        {{ view("admin") }}
                    @elseif ($page == "list-order")
                        {{ view("list-order")->with("q1", $q1) }}
                    @elseif ($page == "item-list")
                        {{ view("item-list")->with("q1", $q1) }}
                    @elseif ($page == "music")
                        {{ view("music") }}
                    @elseif ($page === "success") 
                        @if ($success === 'login') 
                            {{ view("success_login") }}
                        @elseif ($success === "reg")
                            {{ view("success_reg") }}
                        @elseif ($success === "order")
                            {{ view("success_order") }}
                        @endif    
                    @elseif ($page === "fail") 
                        @if ($fail === 'login') 
                            {{ view("fail_login") }}
                        @elseif ($fail === "reg")
                            {{ view("fail_reg") }}
                        @elseif ($fail === "order")
                            {{ view("fail_order") }}
                        @endif  
                    @else
                        {{ view($page)  }}
                    @endif
        </div>
        </div>

        <div class="footer">
        <div id="elem1"><p><a href="#"><img class="img3" src="{{ URL::asset('img/map.png') }}"></a><br><p>Vieni a trovarci nel punto<br> vendita piu' vicino</p></div>
        <div id="elem1"><p><a href="#"><img class="img3" src="{{ URL::asset('img/time.png') }}"></a><br><p>Spedizione gratuita e veloce!<br> In sole 24h il vostro ordine <br>sara' gia' processato</p></div>
        <div id="elem1"><p><a href="#"><img class="img3" src="{{ URL::asset('img/credit-card.png') }}"></a><br><p>Accettiamo tutti i metodi di pagamento!</p></div>
        <div id="elem1"><p><a href="#"><img class="img3" src="{{ URL::asset('img/msg.png') }}"></a><br><p>Serve qualche info? Non esitare a <br> contattare il nostro servizio clienti</p></div>
        
    </div>
    <div class="footer1">
        <p>Santi Pier Pistone<br>O46002254</p>
    </div>

    </div>
        <section id="modal-view" class="hidden">


    </body>
</html>
    