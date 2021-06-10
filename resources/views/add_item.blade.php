<div class="unbd2" ><p> 
    <a href="/home/user" id="but1">Torna indietro</a><br>
    <form class="flex3" action="/home/item/add" method="POST" enctype="multipart/form-data"><br><br>
        <input required="" class="input-box3" placeholder="Nome prodotto" name="name">
        <label required="" id="but1" for="upload-photo">Immagine prodotto</label>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input required="" type="file" name="photo" id="upload-photo" />   <br> 
        <select required="" class="input-box3" name="codice-rep">
        <option value="" disabled selected>Categoria</option>
        <option value="1">Smartphone & Tablet</option>
        <option value="2">TV & Elettrodomestici</option>
        <option value="3">Console & Giochi</option>
        <option value="4">PC & Workstation</option>
        </select>
        <textarea required="" placeholder="Descrizione prodotto" class="input-box3" name="desc" rows="4" cols="50"></textarea>

        <input required="" class="input-box3" placeholder="Prezzo prodotto" name="prezzo">
        <input required=""  min="1" max="999" class="input-box3" placeholder="Quantità prodotto" name="stock">
        {{ Item::getMagazine() }}
        <select required=""  class="input-box3" name ="home">
        <option value="" disabled selected>Homepage</option>
        <option value="1">Si</option>
        <option value="0">No</option>
        </select>
        <select required="" class="input-box3" name ="hidden">
        <option value="" disabled selected>Nascondi</option>
        <option value="1">Si</option>
        <option value="0">No</option>
        
        </select>
        <input type="submit" value="Invia" id="but1" style="padding: 20px 30px;"></input>
    </form>
</div>