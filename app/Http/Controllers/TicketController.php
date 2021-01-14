<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use  App\models\Ticket;
use DB;

class TicketController extends Controller
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
        $tickets= Ticket::All();
        return view('administration.ticket.index')->with(compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administration.ticket.create');
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
            'typeTic' => 'required',
            'desTic' => 'required',
        ]);
        $tickets= Ticket::All();
        foreach($tickets as $ticket)
        {
            if(trim(strtoupper($ticket->typeTic))==trim(strtoupper($request->input('typeTic'))))
            {
                $err[0] = "Ce Type de Ticket ".$ticket->typeTic." Deja Existe ";
                return redirect('ticket/create')->with(compact('err'));
            }
        }
        $ticket = new Ticket;
        $ticket->typeTic = $request->input('typeTic');
        $ticket->desTic = $request->input('desTic');
        $ticket->save();

        return redirect('/ticket')->with('success', 'Ticket Ajouter Avec succes');
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
        $ticket = Ticket::find($id);
        return view('administration.ticket.edit',compact('ticket', 'id'));
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
        $this->validate($request, [
            'typeTic' => 'required',
            'desTic' => 'required',
        ]);
        $tickets= Ticket::where('idTic','<>',$id)->get();
        foreach($tickets as $ticket)
        {
            if(trim(strtoupper($ticket->typeTic))==trim(strtoupper($request->input('typeTic'))))
            {
                $err[0] = "Ce Type de Ticket ".$ticket->typeTic." Deja Existe ";
                return redirect('ticket/'.$id.'/edit')->with(compact('err'));
            }
        }
        $ticket = Ticket::find($id);
        $ticket->typeTic = $request->input('typeTic');
        $ticket->desTic = $request->input('desTic');
        $ticket->save();
        return redirect('/ticket')->with('success', 'la Ticket a été mis a jour');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ticket = Ticket::find($id);
        $ticket->delete();
        return redirect('/ticket')->with('success', 'La Ticket a été Supprimer Avec Succés');
    }
}
