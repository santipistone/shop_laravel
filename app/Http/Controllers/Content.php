<?php

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Http;

class Content extends BaseController
{

    public static function getItem($id) {
        $product = Prodotto::where('codice', $id)->first();
        if ($product === null) {
            return view("error_item");
        }
        return view('item')->with('name', $product->nome)->with('img', $product->image)->with('it', $product->codice)->with('stock', $product->stock)->with('desc', $product->descrizione)->with('price', $product->prezzo)->with('mag', $product->codice_m);
    }

    public static function getHome() {
        return view('main');
    }

    public function database() {
        $product = Prodotto::all();
        $x=0;
        foreach ($product as $prodotto) {
            $dot[$x] = ["codice" => $prodotto->codice,
                "codice_rep" => $prodotto->codice_rep,
                "image" => $prodotto->image,
                "nome" => $prodotto->nome,
                "descrizione" => $prodotto->descrizione,
                "prezzo" => $prodotto->prezzo,
                "stock" => $prodotto->stock,
                "codice_m" => $prodotto->codice_m,
                "home" => $prodotto->home,
                "hidden" => $prodotto->hidden
            ];
            $x++;
        }
        return Response::json($dot);
    }

    public function item($q = "0") {
        $x=0;
        if ($q === "0")        {
            $product = Prodotto::all()->where('home', 1)->where("hidden", 0)->sortBy('stock')->reverse();
        } else  {
            $product = Prodotto::all()->where('codice_rep', $q)->where("hidden", 0)->sortBy('stock')->reverse();
        }
        foreach ($product as $prodotto) {
            $dot[$x] = ["codice" => $prodotto->codice,
                "codice_rep" => $prodotto->codice_rep,
                "image" => $prodotto->image,
                "nome" => $prodotto->nome,
                "descrizione" => $prodotto->descrizione,
                "prezzo" => $prodotto->prezzo,
                "stock" => $prodotto->stock,
                "codice_m" => $prodotto->codice_m,
                "home" => $prodotto->home,
                "hidden" => $prodotto->hidden
            ];
            $x++;
        }
        if (isset($dot)) {return Response::json($dot);}
        else {
            return "";
        }
        
    }

    public function item_($q) {
        $prodotto = Prodotto::where('codice', $q)->first();
        $x =["codice" => $prodotto->codice,
            "codice_rep" => $prodotto->codice_rep,
            "image" => $prodotto->image,
            "nome" => $prodotto->nome,
            "descrizione" => $prodotto->descrizione,
            "prezzo" => $prodotto->prezzo,
            "stock" => $prodotto->stock,
            "codice_m" => $prodotto->codice_m,
            "home" => $prodotto->home,
            "hidden" => $prodotto->hidden
        ];
        return $x;
    }

    public function Spotify($query) {   
        $client_id = "2ac7e9d0250e43039d633b6ad4162172";
        $client_secret = "6fea43cd69ce45d09d5c29ef66f55ed5";    
        $token = Http::asForm()->withHeaders([
            'Authorization' => 'Basic '.base64_encode($client_id.':'.$client_secret),
        ])->post('https://accounts.spotify.com/api/token', [
            'grant_type' => 'client_credentials',
        ]);
        if ($token->failed()) abort(500);

        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.$token['access_token']
        ])->get('https://api.spotify.com/v1/search', [
            'type' => 'album',
            'q' => $query
        ]);
        if($response->failed()) abort(500);

        return $response->body();
    }

    public function Lastfm($query) {
        $api_key = "7637822e4c2aad625bd05b86a1a28c56";
        $response = Http::asForm()->get('http://ws.audioscrobbler.com/2.0/?method=album.search', [
            'method' => 'album.search',
            'album' => $query,
            'api_key' => $api_key,
            'format' => 'json'
        ]);
                
        if($response->failed()) abort(500);

        return $response->body();
    }
}
