<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use  App\models\Soire;
use  App\models\Scene;
use  App\models\Festivale;
use Carbon\Carbon;
use  App\models\Reservation;

class SoireController extends Controller
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
        $soires= Soire::All();        
        return view('administration.soire.index')->with('soires',$soires);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $scenes= Scene::All();
        $today = Carbon::today()->toDateString();
        $festivales= Festivale::where('dateFinFes', '>=',$today)->get();
        $date = Carbon::today()->toDateString(); 
        return view('administration.soire.create')->with(compact('scenes','festivales','date'));
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
            'imgSoi' =>'image|max:9000'
        ]);
        // Handle File Upload
        if($request->hasFile('imgSoi')){
            // Get filename with the extension
            $filenameWithExt = $request->file('imgSoi')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('imgSoi')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('imgSoi')->storeAs('public/soire', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }
        $err;
        $idfes = $request->input('festivale');
        $pos= strpos($idfes,',');
        $ch=substr ( $idfes ,0,$pos);
        $idfes=preg_replace("/[^0-9]/",'', $ch);

        $idscn = $request->input('scene');
        $pos= strpos($idscn,',');
        $ch=substr ( $idscn ,0,$pos);
        $idscn=preg_replace("/[^0-9]/",'', $ch); 
        $fes = Festivale::find($idfes);
        $datesoi=$request->input('dateSoi');
        $i=0;
        if(!(Carbon::parse($datesoi)->between(Carbon::parse($fes->dateDebFes),Carbon::parse($fes->dateFinFes))))
        {
            $err[$i] = "la date  de soiré n'est pas entre la date début fest et la date fin festivale selectionner";
            return redirect('soire/create')->with(compact('err'));
        }
        else
        {
        foreach($fes->soires as $lasoi)
        {
        if($lasoi->dateSoi == $datesoi)
        {
                $err[0] = "il existe Déja une Soiré pendant cette date";
            return redirect('soire/create')->with(compact('err'));
        }
        }
      }
        $soire = new Soire;
        $soire->nomSoi = $request->input('nomSoi');
        $soire->dateSoi = $request->input('dateSoi');
        $soire->desSoi = $request->input('desSoi');
        $soire->festivale_idFes=$idfes;
        $soire->scene_idScene=$idscn;
        $soire->imgSoi = $fileNameToStore;
        $soire->save();

        return redirect('/soire')->with('success', 'La Soiré a été Ajouter Avec Succes');
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
        $soi= soire::find($id);
        $scenes= Scene::All();
        $festivales= Festivale::All();   
        return view('administration.soire.edit')->with(compact('scenes','festivales','soi','id'));
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
            'imgSoi' =>'image|max:9000'
        ]);
        // Handle File Upload
        if($request->hasFile('imgSoi')){
            // Get filename with the extension
            $filenameWithExt = $request->file('imgSoi')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('imgSoi')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('imgSoi')->storeAs('public/soire', $fileNameToStore);
        } 
        $err;
        $datesoi=$request->input('dateSoi');
        $soire =Soire::find($id);
        if(!(Carbon::parse($datesoi)->between(Carbon::parse($soire->festivale->dateDebFes),Carbon::parse($soire->festivale->dateFinFes))))
        {
            $err[0] = "la date  de soiré n'est pas entre la date début fest et la date fin festivale selectionner";
            return redirect('soire/'.$id.'/edit')->with(compact('err'));
        }
        $soire =Soire::find($id);
        if($request->hasFile('imgSoi')){
            // Delete Image
            Storage::delete('public/soire/'.$soire->imgSoi);
        }
        $soire->nomSoi = $request->input('nomSoi');
        $soire->dateSoi = $request->input('dateSoi');
        $soire->desSoi = $request->input('desSoi');
        if($request->hasFile('imgSoi')){
        $soire->imgSoi = $fileNameToStore;
        }
        $soire->save();

        return redirect('/soire')->with('success', 'La Soiré a Mis a Jour Ajouter Avec Succes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $soire= Soire::find($id);
        if(count($soire->spectacles)>0)
        {
         return redirect('/soire')->with('error', "Suppresion impossible car il y a des spectacle affecter a ce Soiré ");
        }
        $reservs = Reservation::all();
        foreach ($reservs as $res)
        {
        if($res->soire_idSoi==$id)
        return redirect('/soire')->with('error', "Suppresion impossible car il existe des Réservation a ce Soiré");
        }
        Storage::delete('public/soire/'.$soire->imgSoi);
        $soire->delete();
        return redirect('/soire')->with('success', 'La Soiré a été Supprimer Avec Succés');
    }
}
