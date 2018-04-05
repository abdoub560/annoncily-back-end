<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\electromenager;
use App\access_info;
use App\immobilier;
use App\ordinateur;
use App\telephone_tablette;
use App\vehicule;
use App\vettement;
use App\outre;
use App\annonce;
use Illuminate\Support\Facades\DB;


class get_annonceController extends Controller
{

    public function get_access_info(){

    }
    public function get_electromenagers(){
        $rows = DB::table('electromenagers')
            ->join('annonces', 'electromenagers.id', '=', 'annonces.id_produit')
            ->where('categorie','=','2')
            ->get();


       foreach ($rows as $row){
           $images=DB::table('images')->where("id_annonce",'=',$row->id)->get();
           $imgs_table=array();
           foreach ($images as $image){
               array_push($imgs_table,$image);
           }
           $row->images=$imgs_table;
           print_r($row);
       }

    }
    public function get_immobilier(){

    }
    public function get_ordinateur(){

    }
    public function get_telephone_tablette(){

    }
    public function get_vehicule(){

    }
    public function get_vettement(){

    }
    public function get_outre(){

    }
}
