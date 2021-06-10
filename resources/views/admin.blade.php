<div class="unbd2" >
    <p>Benvenuto {{ session('name') }} <br><br> Mansione : {{ Admin::getMansione() }}<br>Salario mensile: {{ Admin::getMoney()}}  € </p><br>
        @if (Admin::OnOff() == True  )  
        <form method="POST" action="/home/admin/exit">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button style="padding: 20px 30px;" id="but1"> Uscita</button>
            </form>
              @elseif (session('exit') == 1 && strtotime(Carbon\Carbon::now()->addHours(2)->toDateString()) == strtotime(session('data'))) 
        
            
             @else  
            <form method="POST" action="/home/admin/enter">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button style="padding: 20px 30px;" id="but1"> Ingresso</button>
            </form>
            @endif
        

        <form action="/home/admin/order" method="POST">
        <p>Cerca ordini</p> 
        <input class="input-box2" style="width: 400px;" placeholder="ID cliente" name="list-order-id"><br>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input class="input-box2" style="width: 400px;" placeholder="Nome cliente" name="list-order-name"><br>
        <center><input style="padding: 20px 30px;" value="Invia" type="submit" id="but1"></input></center>
        </form>
        <form action="/home/admin/item" method="POST">
        <p>Cerca item</p> 
        <div class="flex1" style="width: 500px;">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="flex1" style="flex-direction: row; justify-content: space-between;">
        <select class="input-box2" style="width: 400px;" id="list-item-id" name="list-item-id">
        <option value disabled selected>Categoria</option>
        <option value="1">Smartphone & Tablet</option>
        <option value="2">TV & Elettrodomestici</option>
        <option value="3">Console & Giochi</option>
        <option value="4">PC & Workstation</option>
        </select>
        <input class="input-box2" style="width: 80px" placeholder="Num." name="num1">
        </div>
        <div class="flex1" style="flex-direction: row; justify-content: space-between;">
        <input class="input-box2" style="width: 400px;" placeholder="Nome item" name="list-item-name"><br>
        <input class="input-box2" style="width: 80px" placeholder="Num." name="num2">
        </div>
        <center><input style="padding: 20px 30px;" value="Invia" type="submit" id="but1"></input></center><br>
        </div>

        </form>

        <a href="/home/admin/item/add" style="padding: 20px 30px;" id="but1">Inserisci un nuovo item</a><br><br>

            </div>