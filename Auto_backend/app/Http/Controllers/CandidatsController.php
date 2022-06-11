<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Reponse;
use App\Candidat ;

class CandidatsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /*public function __construct()
    {
        $this->middleware('candidat');
    } 
*/

    public function index()
    {
        $candidats=Candidat::all();
        return response()->json($candidats);
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
        $candidat= new Candidat ; 
        $candidat->nom=$request->nom;
        $candidat->numero_tel=$request->numero_tel;
        $candidat->prenom=$request->prenom;
        $candidat->email=$request->email;
        $candidat->date_naissance=$request->date_naissance;
        $candidat->pseudo=$request->pseudo;
        $candidat->mot_de_passe=$request->mot_de_passe;
        $candidat->montant_payer=$request->montant_payer;
        $candidat->date_inscription=$request->date_inscription;
        $candidat->total_prix=$request->total_prix;
        $candidat->cin=$request->cin;
        $reponse = new Reponse;
        $reponse->result =$candidat->save();
        if( $reponse->result)  $reponse->message="ajouté avec succée" ; else   $reponse->message="erreur lors de l'ajout";
        return response()->json($reponse);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   $candidat=null;
        $candidat=Candidat::find($id);
        if ($candidat==null){
            $reponse = new Reponse;
            $reponse->result= false ; 
            $reponse->message="candidat introuvable";
            return response()->json($reponse);

        }
        else 
        return response()->json($candidat);

    }
    
    public function showByCin($cin)
    {
        $candidat = Candidat::all()->where('cin',$cin);
        return response()->json($candidat);
    
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
    {
        if($request->id!=$id){
            $reponse = new Reponse;
           $reponse->result= false ; 
           $reponse->message="erreur d'acheminement";
        }else{
            $candidat=Candidat::find($id);
            
            $candidat->nom=$request->nom;
            $candidat->numero_tel=$request->numero_tel;
            $candidat->prenom=$request->prenom;
            $candidat->email=$request->email;
            $candidat->date_naissance=$request->date_naissance;
            $candidat->pseudo=$request->pseudo;
            $candidat->mot_de_passe=$request->mot_de_passe;
            $candidat->montant_payer=$request->montant_payer;
            $candidat->date_inscription=$request->date_inscription;
            $candidat->total_prix=$request->total_prix;
            $candidat->cin=$request->cin;
            
               
           $reponse = new Reponse;
           $reponse->result=  $candidat->save();
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
        $candidat=null;
        $candidat=Candidat::find($id);
        $reponse = new Reponse;
        if ($candidat==null){
            
            $reponse->result= false ; 
            $reponse->message="candidat introuvable";
            return response()->json($reponse);

        }
        else 
     { 
if($reponse->result= $candidat->delete()) $reponse->message="erreur lors de la suppression";
else $reponse->message="candidat supprimé avec succée";
return response()->json($reponse);

    }}
    public function showByNom($nom)
    {
        
        $candidat=Candidat::all()->where('nom',$nom);
        return response()->json($candidat);
    }
    public function showByEmail($email)
    {
        
        $candidat=Candidat::all()->where('email',$email);
        return response()->json($candidat);
    }

}
