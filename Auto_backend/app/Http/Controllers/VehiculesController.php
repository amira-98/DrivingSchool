<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehicule;
use App\Reponse;
class VehiculesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicules=Vehicule::all();
        return response()->json($vehicules);
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showByMatricule($Matricule)
    {
       
        $vehicule=Vehicule::all()->where('matricule',$Matricule);
        return response()->json($vehicule);
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
        $vehicule=Vehicule::find($id);
        
        $vehicule->matricule=$request->matricule;
        $vehicule->date_acq=$request->date_acq;
        $vehicule->modele=$request->modele;
        $vehicule->kilometrage=$request->kilometrage;
        $vehicule->depense=$request->depense;
        $vehicule->type=$request->type;
        
           
       $reponse = new Reponse;
       $reponse->result=  $vehicule->save();
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
        $vehicule=Vehicule::find($id);

        $reponse = new Reponse;
        $reponse->result=  $vehicule->delete();
        if( $reponse->result)  $reponse->message="deleted successfully" ; else   $reponse->message="fail";
        return response()->json($reponse);


    }

    public function showByModele($modele)
    {
        $vehicule=Vehicule::all()->where('modele',$modele);
        return response()->json($vehicule);
    }

    public function showByType($type)
    {
        $vehicule=Vehicule::all()->where('type',$type);
        return response()->json($vehicule);
    }

    public function store(Request $request)
    {
   
   
       $vehicule = new Vehicule;
       $vehicule->matricule = $request->matricule;
       $vehicule->modele=$request->modele;
       $vehicule->date_acq = $request->date_acq;
       $vehicule->kilometrage = $request->kilometrage;
       $vehicule->depense = $request->depense;
       $vehicule->type = $request->type;
       
       $reponse = new Reponse;
       $reponse->result = $vehicule->save();
       if( $reponse->result)  $reponse->message="ajouté avec succée" ; else   $reponse->message="erreur lors de l'ajout";
       return response()->json($reponse);
   }

}
