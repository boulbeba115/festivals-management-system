<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use  App\models\Ticket;
use  App\models\Soire;
use  App\models\SoireTicket;
use  App\models\Reservation;

use DB;

class AffectticketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index()
    {
        $affectations = Soire::All();        
        return view('administration.affectticket.index')->with(compact('affectations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tickets = Ticket::All();        
        $soires = Soire::All();        
        return view('administration.affectticket.create')->with(compact('soires','tickets'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'prixTic' => 'required',
            'nbTicDes' => 'required',
        ]);
        $idSoi = $request->input('soire');
        $pos= strpos($idSoi,',');
        $ch=substr ( $idSoi ,0,$pos);
        $idSoi=preg_replace("/[^0-9]/",'', $ch);
        
        $idTic = $request->input('ticket');
        $pos= strpos($idTic,',');
        $ch=substr ( $idTic ,0,$pos);
        $idTic=preg_replace("/[^0-9]/",'', $ch);
        $soireticks = SoireTicket::All();
        foreach($soireticks as $soiretick) 
        {
            if($soiretick->soire_idSoi==$idSoi && $soiretick->ticket_idTic==$idTic)
            {
                $err[0] = "Cette ticket ".$request->input('ticket')." est deja affecter au soiré ".$request->input('soire');
                return redirect('affectticket/create')->with(compact('err'));
            }
        }
        foreach($soireticks as $soiretick) 
        {
            if($soiretick->soire_idSoi==$idSoi && $soiretick->ticket_idTic==$idTic)
            {
                $err[0] = "Cette ticket ".$request->input('ticket')." est deja affecter au soiré ".$request->input('soire');
                return redirect('affectticket/create')->with(compact('err'));
            }
        }
        $nbtoaltic=0;

        foreach($soireticks as $soiretick) 
        {
            if($soiretick->soire_idSoi==$idSoi)
            {
            $nbtoaltic+=$soiretick->nbTicDes;
            }

        }
       $nbtoaltic+=$request->input('nbTicDes');
       $lasoi = Soire::find($idSoi);
       $capscn = $lasoi->scene->capScene;
       if($capscn <= $nbtoaltic)
       {
        $err[0] = "le nombre total de ticket de tous les type de ticket affecter a ce soiré ".$nbtoaltic."  et supérieur au capcité de Scene ".$capscn;
        return redirect('affectticket/create')->with(compact('err'));
       }
        $soire = Soire::find($idSoi);
        $soire->tickets()->attach($idTic, ['prixTic' => $request->input('prixTic'), 'nbTicDes' =>$request->input('nbTicDes')]);
        return redirect('/affectticket')->with('success', 'Ticket Affecté Avec succes au Soiré');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }  
    public function suppaffect($id,$id2)
    {   $reservs = Reservation::all();
        $affectation = SoireTicket::where([['soire_idSoi', $id],['ticket_idTic',$id2]]);
        foreach ($reservs as $res)
        {
        if($res->offreTic==$id2)
        return redirect('/affectticket')->with('error', "Suppresion impossible car il existe une a réservation avec ce type de ticket");
        }
        $affectation->delete();
        return redirect('/affectticket')->with('success', "L'Affectation  a été Supprimer Avec Succés");
    }
}
