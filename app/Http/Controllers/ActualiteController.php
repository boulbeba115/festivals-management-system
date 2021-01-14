<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use  App\models\Actualite;
use  App\models\Festivale;
use DB;
use Carbon\Carbon;

class ActualiteController extends Controller
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
        $actualites= Actualite::All();        
        return view('administration.actualite.index')->with('actualites',$actualites);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $today = Carbon::today()->toDateString();
        $festivales= Festivale::where('dateFinFes', '>=',$today)->get();
        return view('administration.actualite.create')->with('festivales',$festivales);
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
            'corpAct' => 'required',
            'imgAct' =>'image|max:9000'
        ]);
        // Handle File Upload
        if($request->hasFile('imgAct')){
            // Get filename with the extension
            $filenameWithExt = $request->file('imgAct')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('imgAct')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('imgAct')->storeAs('public/actualite', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }
        $actualite = new Actualite;
        $idfes = $request->input('festivale');
        $pos= strpos($idfes,',');
        $ch=substr ( $idfes ,0,$pos);
        $idfes=preg_replace("/[^0-9]/",'', $ch); 
        $actualite->festivale_idFes=$idfes;
        $actualite->titreAct = $request->input('titreAct');
        $actualite->sujAct = $request->input('sujAct');
        $actualite->corpAct = $request->input('corpAct');
        $actualite->imgAct = $fileNameToStore;
        $actualite->save();

        return redirect('/actualite')->with('success', 'Actualite a été Ajouter Avec Succes');
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
        $actualite= Actualite::find($id);
        $festivales= Festivale::All();
        return view('administration.actualite.edit')->with(compact('actualite','id','festivales'));
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
            'titreAct' => 'required',
            'sujAct' => 'required',
            'corpAct' => 'required',
            'imgAct' =>'image|max:9000'
        ]);
        // Handle File Upload
        if($request->hasFile('imgAct')){
            // Get filename with the extension
            $filenameWithExt = $request->file('imgAct')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('imgAct')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('imgAct')->storeAs('public/actualite', $fileNameToStore);
        } 
        $actualite= Actualite::find($id);
        $idfes = $request->input('festivale');
        $pos= strpos($idfes,',');
        $ch=substr ( $idfes ,0,$pos);
        $idfes=preg_replace("/[^0-9]/",'', $ch); 
        $actualite->festivale_idFes=$idfes;
        $actualite->titreAct = $request->input('titreAct');
        $actualite->sujAct = $request->input('sujAct');
        $actualite->corpAct = $request->input('corpAct');
        if($request->hasFile('imgAct')){
            Storage::delete('public/actualite/'.$actualite->imgAct);
            $actualite->imgAct = $fileNameToStore;
        }
        $actualite->save();
        

        return redirect('/actualite')->with('success', 'l Actualité a été mis a jour');    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $actualite= Actualite::find($id);
        Storage::delete('public/actualite/'.$actualite->imgAct);
        $actualite->delete();
        return redirect('/actualite')->with('success', 'L Actualité a été Supprimer Avec Succés');
    }
}
