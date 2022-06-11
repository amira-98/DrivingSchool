<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Seance;
use App\Moniteur;
use App\Candidat;
use App\Vehicule;
use App\Reponse;
use App\Rapport;
class SeancesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seances=Seance::all();
        return response()->json($seances);
     
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
        $seance = new Seance ; 
        $seance->date=$request->date;
        $seance->HD=$request->HD;
        $seance->HF=$request->HF;
        
        $moniteur = Moniteur::find($request->id_moniteur);
        $candidat = Candidat::find($request->id_candidat);
        $vehicule = Vehicule::find($request->id_vehicule);
        $seance->moniteur()->associate($moniteur);
        $seance->candidat()->associate($candidat);
        $seance->vehicule()->associate($vehicule);
        $reponse = new Reponse;
        
        if($moniteur === null || $candidat === null || $vehicule === null  )
        {   
            $reponse->result = false ;
            $reponse->message="Violation des clés étrangères";
        }
        else{
            
            $reponse->result=$seance->save();
            
            if( $reponse->result) 
            {
                $reponse->message="succe" ;
            }  
            else{
                $reponse->message="fail";
            } 
            $rapport=new Rapport;
            $rapport->id=$seance->id;
            $rapport->seance()->associate($seance);
            $rapport->save();
           
        }
        return response()->json($reponse);



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $seance=Seance::find($id);
        return response()->json($seance);
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
        $seance=Seance::find($id);
        $seance->date=$request->date;
        $seance->HD=$request->HD;
        $seance->HF=$request->HF;
        $seance->type=$request->type;
        $seance->id_moniteur=$request->id_moniteur;
        $seance->id_candidat=$request->id_candidat;
        $seance->id_vehicule=$request->id_vehicule;
        
        $moniteur = Moniteur::find($request->id_moniteur);
        $candidat = Candidat::find($request->id_candidat);
        $vehicule = Vehicule::find($request->id_vehicule);
        
        $reponse = new Reponse;
        
        if($moniteur === null || $candidat === null || $vehicule === null  )
        {   
            $reponse->result = false ;
            $reponse->message="Violation des clés étrangères";
        }
        else{
            
            $reponse->result=$seance->save();
            
            if( $reponse->result) 
            {
                $reponse->message="succe" ;
            }  
            else{
                $reponse->message="fail";
            } 
           
        }}
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
        $seance=Seance::find($id);
     
        $reponse = new Reponse;
        $reponse->result=  $seance->delete();
        if( $reponse->result)  $reponse->message="deleted successfully" ; else   $reponse->message="fail";
        return response()->json($reponse);
 
    }
    public function AgendaforCandidat($idcandidat)
    {
        $seances=Seance::all()->where('id_candidat',$idcandidat);
        return response()->json($seances);
    }
    public function AgendaforMoniteur($idmoniteur)
    {
        $seances=Seance::all()->where('id_moniteur',$idmoniteur);
        return response()->json($seances);
    }
    public function MoniteurforCandidatByAgenda($idcandidat,$idseance,$idmoniteur)
    {
        $seance= Seance::find($idseance);
        $reponse = new Reponse;
        if($idmoniteur != $seance->id_moniteur || $idcandidat != $seance->id_candidat)
        {   
            $reponse->message="erreur d'acheminiement";
            $reponse->result =false;
            return response()->json($reponse);
        }
        else{
            $moniteur=Moniteur::find($idmoniteur);
            return response()->json($moniteur);
        }

    }
    public function CandidatforMoniteurByAgenda($idmoniteur,$idseance,$idcandidat)
    {
        $seance= Seance::find($idseance);
        $reponse = new Reponse;
        if($idmoniteur!=$seance->id_moniteur||$idcandidat!=$seance->id_candidat)
        {
            $reponse->message="erreur d'acheminiement";
            $reponse->result =false;
        return response()->json($reponse);
        }
        else{
            $candidat=Candidat::find($idcandidat);

            return response()->json($candidat);
        }

    }
}
