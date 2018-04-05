<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\client;
use Illuminate\Support\Facades\DB;


class clientController extends Controller
{
    public function register(Request $request){
        $this->validate($request,[
        "username"=>'required|unique:clients,username'
        ,'email'=>'required|email|unique:clients,email',
        "phone"=>'required|unique:clients,phone',
        'password'=>'required|min:6|confirmed'
        ]);
        $client =new client();
        $client->username=$request->username;
        $client->src_image=$request->src_image;
        $client->email=$request->email;
        $client->password=$request->password;
        $client->phone=$request->phone;
        $client->position=$request->position;
        $client->save();

    }
    public function login(Request $request){
        $this->validate($request,[
            'email'=>'required',
            'password'=>'required'
        ]);
        $client = DB::table('clients')->orWhere(function ($query) {
            $query->where('email', '=', 'email2@email.com')
                ->where('password', '=', '12356867');
        })->first();

        $responce=array();
        if (empty($client)){
            array_push($responce,array(
                'type'=>'error',
                'message'=>"user inconnue"
            ));

        }else{
            array_push($responce,array(
                'type'=>'success',
                'message'=>response()->json(['data'=>$client],200,[],JSON_NUMERIC_CHECK)
                )
            );
        }
        print_r(json_encode(array('responce'=>$responce)));


    }
    public function edit(Request $request,$id){
        $this->validate($request,[
            "username"=>'unique:clients,username',
            "phone"=>'unique:clients,phone',
            'password'=>'min:6|confirmed'
        ]);
        $client=client::find($id);
        if (isset($request->username))
            $client->username=$request->username;
        if (isset($request->phone))
             $client->phone=$request->phone;
        if (isset($request->src_image))
             $client->src_image=$request->src_image;
        if (isset($request->password))
            $client->password=$request->password;
        if (isset($request->position))
            $client->position=$request->position;
        $client->save();
        }

}
