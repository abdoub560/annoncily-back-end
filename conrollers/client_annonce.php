<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\annonce;
use App\electromenager;
use App\access_info;
use App\immobilier;
use App\ordinateur;
use App\telephone_tablette;
use App\vehicule;
use App\vettement;
use App\outre;
use App\image;

class client_annonce extends Controller
{
    public function client_annonces($categorie,$client){
        $table='';
        switch ($categorie){
            case 1:$table='access_infos';break;
            case 2:$table='electromenagers';break;
            case 3:$table='immobiliers';break;
            case 4:$table='ordinateurs';break;
            case 5:$table='telephone_tablettes';break;
            case 6:$table='vehicules';break;
            case 7:$table='vettements';break;
            case 8:$table='outres';break;
        }
        $rows = DB::table($table)
            ->join('annonces', $table.'.id', '=', 'annonces.id_produit')
            ->Where(function ($query) use ($client, $categorie) {
                $query->where('id_client', '=', $client)
                    ->where('categorie', '=', $categorie);
            })->get();
        $responce=array();

        if ($rows->count()==0){
            array_push($responce,array(
                'type'=>'error',
                'message'=>"aucune annonce trouvée"
            ));
        }else{

            foreach ($rows as $row){
                $images=DB::table('images')->where("id_annonce",'=',$row->id)->get();
                $imgs_table=array();
                foreach ($images as $image){
                    array_push($imgs_table,$image);
                }
                $row->images=$imgs_table;

            }

            array_push($responce,array(
                    'type'=>'success',
                    'message'=>$rows
                )
            );

        }
        print_r(json_encode(array('responce'=>$responce)));

    }

    public function update_annonce(Request $request,$ann,$cl){
        $annonce=annonce::find($ann);
        $response=array();


        if ($annonce->id_client==$cl){

        $categorie=$annonce->categorie;
        switch ($categorie){
            case 1:$model=access_info::find($annonce->id_produit);
            $model=$this->add($model,$request->marque,'marque');
            $model=$this->add($model,$request->color,"color")
            ;break;
            case 2:$model=electromenager::find($annonce->id_produit);
            $model=$this->add($model,$request->poids,'poids');
            $model=$this->add($model,$request->marque,'marque');
            $model=$this->add($model,$request->color,"color")
            ;break;
            case 3:$model=immobilier::find($annonce->id_produit);break;
            $model=$this->add($model,$request->adresse,"adresse");
            $model=$this->add($model,$request->surface,"surface");
            $model=$this->add($model,$request->v_l,"v_l");
            case 4:$model=ordinateur::find($annonce->id_produit);
            $model=$this->add($model,$request->marque,'marque');
            $model=$this->add($model,$request->color,"color");
            $model=$this->add($model,$request->ram,"ram");
            $model=$this->add($model,$request->cpu,"cpu");
            $model=$this->add($model,$request->dd,"dd");
            break;
            case 5:$model=telephone_tablette::find($annonce->id_produit);
            $model=$this->add($model,$request->marque,'marque');
            $model=$this->add($model,$request->color,"color");
            $model=$this->add($model,$request->ram,"ram");
            $model=$this->add($model,$request->rom,"rom");
            $model=$this->add($model,$request->cam_avant,"cam_avant");
            $model=$this->add($model,$request->cam_arriere,"cam_arriere");
            $model=$this->add($model,$request->cpu,"cpu");
            break;
            case 6:$model=vehicule::find($annonce->id_produit);
            $model=$this->add($model,$request->poids,'poids');
            $model=$this->add($model,$request->marque,'marque');
            $model=$this->add($model,$request->color,"color");
            $model=$this->add($model,$request->vitesse,"vitesse");
            $model=$this->add($model,$request->date_fabrication,"date_fabrication");
            break;
            case 7:$model=vettement::find($annonce->id_produit);break;
            $model=$this->add($model,$request->marque,'marque');
            $model=$this->add($model,$request->color,"color");
            $model=$this->add($model,$request->h_f,"h_f");
            $model=$this->add($model,$request->age,"age");
            $model=$this->add($model,$request->taille,"taille");
            case 8:$model=outre::find($annonce->id_produit);break;
            }
            $model=$this->add($model,$request->type,"type");
            $model=$this->add($model,$request->description,"description");
            $model=$this->add($model,$request->prix,"prix");
            $model->save();
            if (isset($request->position))
                $annonce->positiob=$request->position;






        }else{
            $type="error";
            $message="vous n'avez pas le droit pour modifier cette annonce";
        }



        }
    public function add($model,$request,$attribut){
        if (isset($request))
        {$model->$attribut=$request;}
        return $model;
    }


}
