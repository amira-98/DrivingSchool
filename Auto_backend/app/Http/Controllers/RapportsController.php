<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Seance;
use App\Rapport;
use App\Reponse;

class RapportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function RapportsByMoniteurs($idmoniteur)
    {
     $rapports=Rapport::all();
      $rapportmoniteur=collect();
        foreach($rapports as $rapport)
      {
          if( $rapport->seance->id_moniteur== $idmoniteur )
          $rapportmoniteur->add($rapport);
        }
    
      
      return response()->json($rapportmoniteur);


    }
    public function RapportsByMoniteursandcandidat($idmoniteur,$idcandidat)
    {
        $rapports=Rapport::all();
        $rapportmoniteur=collect();
          foreach($rapports as $rapport)
        {
            if( $rapport->seance->id_moniteur== $idmoniteur && $rapport->seance->id_candidat== $idcandidat )
            $rapportmoniteur->add($rapport);
          }
      
        
        return response()->json($rapportmoniteur);
    }
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
    public function store(Request $request)
    {
        //
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
    public function update(Request $request, $id)
    {
       
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idmoniteur,$idcandidat,$id)
    {   
        $rapport=Rapport::find($id);
        $reponse = new Reponse;
        if($idmoniteur!=$rapport->seance->moniteur->id||$idcandidat!=$rapport->seance->candidat->id||$rapport==null)
        {
            $reponse->message="erreur d'acheminiement";
            $reponse->result =false;
        return response()->json($reponse);
        }
        else{
        $rapport->delete();
        $reponse->message="le rapport a été supprimé avec succée";
        $reponse->result =true;
        return response()->json($reponse);
        }
    }

  
}
