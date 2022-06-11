<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Resulat;
use App\Reponse;
use App\Question;
use App\Seance;
use App\Rapport;

class ResultatsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request,$idmoniteur,$idcandidat,$idseance)
    {$seance=null;
        $seance=Seance::find($idseance);
        $reponse = new Reponse;
        if($idmoniteur!=$seance->moniteur->id||$idcandidat!=$seance->candidat->id||$seance==null)
        {
            $reponse->message="erreur d'acheminiement";
            $reponse->result =false;
        return response()->json($reponse);
        }
        else{
    //ajout du rapport selon l'id de la séance envoyé en parametre
    $rapport=Rapport::find($idseance);
       //ajout du resultat lié au rapport 
       $resultat=new Resulat;
       //affecter le rapport au resultat
    $resultat->rapport()->associate($rapport);
    $question=null;
   $question=Question::find($request->question_id);
   if($question==null){
    $reponse->message="question introuvable";
    $reponse->result=false;
    return response()->json($reponse);
   }
       //affecter une question au resultat
       else{
       $resultat->question()->associate($question);
       //mettre le contenu dans la seance 
       $resultat->contenu=$request->contenu;
       $reponse->result= $resultat->save();
       $reponse->message="modification avec succée";
       return response()->json($reponse);}

    }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request,$idmoniteur,$idcandidat,$idresultat)
    {if($request->id!=$idresultat){
        $reponse = new Reponse;
       $reponse->result= false ; 
       $reponse->message="erreur d'acheminement";
       return response()->json($reponse);

    }else{
        $resultat=Resulat::find($idresultat);
        $reponse = new Reponse;
        if($idmoniteur!=$resultat->rapport->seance->id_moniteur||$idcandidat!=$resultat->rapport->seance->id_candidat)
        {
            $reponse->message="erreur d'acheminiement";
            $reponse->result =false;
        return response()->json($reponse);
        }
        else{
    
       $resultat->contenu=$request->contenu;
       $reponse->result= $resultat->save();
       $reponse->message="modification avec succée";
        
       return response()->json($reponse);

    }
}
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
