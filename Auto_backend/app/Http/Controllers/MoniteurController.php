<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Moniteur;
use App\Reponse;

class MoniteurController extends Controller
{ 
    
    /*public function __construct()
    {
        $this->middleware('moniteur');
    } 
*/

    public function index()
    {   
        $moniteurs=Moniteur::all();
        return response()->json($moniteurs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    /*  $this->validate($request,[
        'nom'->required , 'numero_tel'->required, 'prenom'->required, 'email'->required,'date_naissance'->required
        , 'pseudo'->required, 'mot_de_passe'->required, 'salaire'->required
        , 'date_embauche'->required, 'cin'->required

       ]);*/
   
       $moniteur = new Moniteur;
       $moniteur->nom=$request->nom;
       $moniteur->numero_tel=$request->numero_tel;
       $moniteur->prenom=$request->prenom;
       $moniteur->email=$request->email;
       $moniteur->date_naissance=$request->date_naissance;
       $moniteur->pseudo=$request->pseudo;
       $moniteur->mot_de_passe=bcrypt($request->mot_de_passe);
       $moniteur->salaire=$request->salaire;
       $moniteur->date_embauche=$request->date_embauche;
       $moniteur->cin=$request->cin;
       
       $reponse = new Reponse;
       $reponse->result=$moniteur->save();
       if( $reponse->result)  $reponse->message="succe" ; else   $reponse->message="fail";
       return response()->json($reponse);
   }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showByCin($cin)
    {

        $moniteur=Moniteur::all()->where('cin',$cin);
        return response()->json($moniteur);
    }
    public function showByNom($nom)
    {

        $moniteur=Moniteur::all()->where('nom',$nom);
        return response()->json($moniteur);
    }
    public function showByEmail($email)
    {

        $moniteur=Moniteur::all()->where('email',$email);
        return response()->json($moniteur);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {if($request->id!=$id){
        $reponse = new Reponse;
       $reponse->result= false ; 
       $reponse->message="erreur d'acheminement";
    }else{
        $moniteur=Moniteur::find($id);
        $moniteur->nom=$request->nom;
        $moniteur->numero_tel=$request->numero_tel;
        $moniteur->prenom=$request->prenom;
        $moniteur->email=$request->email;
        $moniteur->date_naissance=$request->date_naissance;
        $moniteur->pseudo=$request->pseudo;
        $moniteur->mot_de_passe=bcrypt($request->mot_de_passe);
        $moniteur->salaire=$request->salaire;
        $moniteur->date_embauche=$request->date_embauche;
        $moniteur->cin=$request->cin;
           
       $reponse = new Reponse;
       $reponse->result=$moniteur->save();
      if( $reponse->result)  $reponse->message="updated successfully" ; else   $reponse->message="fail";
    }
        return response()->json($reponse);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $moniteur=Moniteur::find($id);
     
       $reponse = new Reponse;
       $reponse->result=  $moniteur->delete();
      if( $reponse->result)  $reponse->message="deleted successfully" ; else   $reponse->message="fail";
        return response()->json($reponse);

    }
   
}
