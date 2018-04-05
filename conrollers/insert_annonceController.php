<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\access_info;
use App\immobilier;
use App\ordinateur;
use App\telephone_tablette;
use App\vehicule;
use App\vettement;
use App\outre;
use App\electromenager;
use App\annonce;
use App\image;
use Illuminate\Support\Facades\Storage;

class insert_annonceController extends Controller
{

    public function insert_access_info(Request $request){
        $type=1;
        $access_info=new access_info();
        $access_info->type=$request->type;
        $access_info->description=$request->description;
        $access_info->marque=$request->marque;
        $access_info->prix=$request->prix;
        $access_info->color=$request->color;
        $access_info->save();
        $id_acc_inf= $access_info->id;
        $annonce=new annonce();
        $annonce->position=$request->position;
        $annonce->categorie=$type;
        $annonce->id_client=$request->id_client;
        $annonce->id_produit=$id_acc_inf;
        $id_annonce=$annonce->save();

        foreach ($request->images as $image){
            $img=new image();
            $img->url=$image;
            $img->id_annonce=$id_annonce;
            $img->save();
        }

    }
    public function insert_electromenager(Request $request){
        $type=2;
        $electromenager=new electromenager();
        $electromenager->type=$request->type;
        $electromenager->description=$request->description;
        $electromenager->marque=$request->marque;
        $electromenager->prix=$request->prix;
        $electromenager->color=$request->color;
        $electromenager->poids=$request->poids;
        $electromenager->save();
        $id_electro= $electromenager->id;
        $annonce=new annonce();
        $annonce->position=$request->position;
        $annonce->categorie=$type;
        $annonce->id_client=$request->id_client;
        $annonce->id_produit=$id_electro;
        $id_annonce=$annonce->save();

        foreach ($request->images as $image){
            $img=new image();
            $img->url=$image;
            $img->id_annonce=$id_annonce;
            $img->save();
        }

    }
    public function insert_immobilier(Request $request){
        $type=3;
        $mmobilier=new immobilier();
        $mmobilier->type=$request->type;
        $mmobilier->description=$request->description;
        $mmobilier->prix=$request->prix;
        $mmobilier->adresse=$request->adresse;
        $mmobilier->surface=$request->surface;
        $mmobilier->v_l=$request->v_l;
        $mmobilier->save();
        $id_immob= $mmobilier->id;
        $annonce=new annonce();
        $annonce->position=$request->position;
        $annonce->categorie=$type;
        $annonce->id_client=$request->id_client;
        $annonce->id_produit=$id_immob;
        $id_annonce=$annonce->save();

        foreach ($request->images as $image){
            $img=new image();
            $img->url=$image;
            $img->id_annonce=$id_annonce;
            $img->save();
        }

    }
    public function insert_ordinateur(Request $request){
        $type=4;
        $ordinateur=new ordinateur();
        $ordinateur->type=$request->type;
        $ordinateur->description=$request->description;
        $ordinateur->marque=$request->marque;
        $ordinateur->prix=$request->prix;
        $ordinateur->color=$request->color;
        $ordinateur->ram=$request->ram;
        $ordinateur->cpu=$request->cpu;
        $ordinateur->dd=$request->dd;
        $ordinateur->save();
        $id_ord= $ordinateur->id;
        $annonce=new annonce();
        $annonce->position=$request->position;
        $annonce->categorie=$type;
        $annonce->id_client=$request->id_client;
        $annonce->id_produit=$id_ord;
        $annonce->save();
        $id_annonce=$annonce->id;


        $response=array();
        if (isset($id_annonce)){
            $type="success";
            $message=$id_annonce;
            array_push($response,array($type,$message));
        }else{
            $type="error";
            $message="aucune annonce insertée";
            array_push($response,array($type,$message));
        }
        print_r(json_encode(array('response'=>$response)));





    }
    public function insert_telephone_tablette(Request $request){
        $type=5;
        $tel_tab=new telephone_tablette();
        $tel_tab->type=$request->type;
        $tel_tab->description=$request->description;
        $tel_tab->marque=$request->marque;
        $tel_tab->prix=$request->prix;
        $tel_tab->color=$request->color;
        $tel_tab->ram=$request->ram;
        $tel_tab->rom=$request->rom;
        $tel_tab->cam_avant=$request->cam_avant;
        $tel_tab->cam_arriere=$request->cam_arriere;
        $tel_tab->cpu=$request->cpu;
        $tel_tab->save();
        $id_tel_tab= $tel_tab->id;
        $annonce=new annonce();
        $annonce->position=$request->position;
        $annonce->categorie=$type;
        $annonce->id_client=$request->id_client;
        $annonce->id_produit=$id_tel_tab;
        $id_annonce=$annonce->save();

        foreach ($request->images as $image){
            $img=new image();
            $img->url=$image;
            $img->id_annonce=$id_annonce;
            $img->save();
        }


    }
    public function insert_vehicule(Request $request){
        $type=6;
        $vehicule=new vehicule();
        $vehicule->type=$request->type;
        $vehicule->description=$request->description;
        $vehicule->marque=$request->marque;
        $vehicule->prix=$request->prix;
        $vehicule->color=$request->color;
        $vehicule->vitesse=$request->vitesse;
        $vehicule->poids=$request->poids;
        $vehicule->date_fabrication=$request->date_fabrication;
        $vehicule->save();
        $id_vehicule= $vehicule->id;
        $annonce=new annonce();
        $annonce->position=$request->position;
        $annonce->categorie=$type;
        $annonce->id_client=$request->id_client;
        $annonce->id_produit=$id_vehicule;
        $id_annonce=$annonce->save();

        foreach ($request->images as $image){
            $img=new image();
            $img->url=$image;
            $img->id_annonce=$id_annonce;
            $img->save();
        }

    }
    public function insert_vettement(Request $request){
        $type=7;
        $vettement=new vettement();
        $vettement->type=$request->type;
        $vettement->description=$request->description;
        $vettement->marque=$request->marque;
        $vettement->prix=$request->prix;
        $vettement->color=$request->color;
        $vettement->h_f=$request->h_f;
        $vettement->age=$request->age;
        $vettement->taille=$request->taille;
        $vettement->save();
        $id_vett= $vettement->id;
        $annonce=new annonce();
        $annonce->position=$request->position;
        $annonce->categorie=$type;
        $annonce->id_client=$request->id_client;
        $annonce->id_produit=$id_vett;
        $id_annonce=$annonce->save();
        $response=array();
        if (isset($id_annonce)){
            $type="success";
            $message=$id_annonce;
            array_push($response,array($type,$message));
        }else{
            $type="error";
            $message="aucune annonce insertée";
            array_push($response,array($type,$message));
        }
        print_r(json_encode(array('response'=>$response)));

    }
    public function insert_outre(Request $request){
        $type=8;
        $autre=new outre();
        $autre->type=$request->type;
        $autre->description=$request->description;
        $autre->prix=$request->prix;
        $autre->save();
        $id_autre= $autre->id;
        $annonce=new annonce();
        $annonce->position=$request->position;
        $annonce->categorie=$type;
        $annonce->id_client=$request->id_client;
        $annonce->id_produit=$id_autre;
        $id_annonce=$annonce->save();

        foreach ($request->images as $image){
            $img=new image();
            $img->url=$image;
            $img->id_annonce=$id_annonce;
            $img->save();
        }

        }
        public function insert_image(Request $request){
            $response=array();




           if ($request->hasFile("image")) {

               $extension= $request->image->extension();
               if (in_array($extension,array("jpeg","png","jpg","tiff","svg","bmp","gif"))){
                   $size= ($request->image->getClientSize())/1024/1024;
                   if ($size<3){
                       try{
                           $image=new image();
                           $image->url=$request->image->getClientOriginalName();
                           $image->id_annonce=$request->id_annonce;
                           $image->save();
                           $request->image->storeAs('public',$request->image->getClientOriginalName());
                           $type="success";
                           $message="images insireés";
                           array_push($response,array($type,$message));
                           }catch (\Exception $exception){
                           $type="error";
                           $message="error essayez une autre foit !";
                           array_push($response,array($type,$message));

                           }

                   }else{
                       $type="error";
                       $message="la taille d'image est volumineuse ! ";
                       array_push($response,array($type,$message));

                   }



               }else{
                   $type="error";
                   $message="image invalide";
                   array_push($response,array($type,$message));
               }
               }
               else{
               $type="error";
               $message="image non trouvée";
               array_push($response,array($type,$message));
           }
           // $image_name='we will delete it.'.$request->image->extension();
          //$str=  $request->image->storeAs('public',$image_name);
        // $str=  $request->image->storeAs('public',$request->image->getClientOriginalName());
       //  $str=  $request->image->storeAs('public','kk.png');
           //Storage::delete('we will delete it');



                //return Storage::size($str);
      //  }
            print_r(json_encode(array('response'=>$response)));

        }
       /* $image=new image();
        $image->id_annonce=$annonce;
        $image->url=$request->url;
        }*/
}
