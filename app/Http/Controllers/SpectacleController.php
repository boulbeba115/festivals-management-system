<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use  App\models\Soire;
use  App\models\Artist;
use  App\models\Spectacle;
use Carbon\Carbon;
use  App\models\Reservation;



class SpectacleController extends Controller
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
        $spectacles= Spectacle::All();        
        return view('administration.spectacle.index')->with('spectacles',$spectacles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $artists= Artist::All();
        $soires= Soire::All();   
        return view('administration.spectacle.create')->with(compact('artists','soires'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $spectacles = Spectacle::All();
        $this->validate($request, [
            'tempDebSpec' => 'required',
            'imgSpec' =>'image|required|max:1999',
        ],

        [
            'tempFinSpec.after' =>'la Temp de debut de spectacle est  avant le Temp Fin de spectacle '
        ]
        );
        // Handle File Upload
        if($request->hasFile('imgSpec')){
            // Get filename with the extension
            $filenameWithExt = $request->file('imgSpec')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('imgSpec')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('imgSpec')->storeAs('public/spectacle', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }
        $err;
        
        $idSoi = $request->input('soire');
        $pos= strpos($idSoi,',');
        $ch=substr ( $idSoi ,0,$pos);
        $idSoi=preg_replace("/[^0-9]/",'', $ch);

        $idart = $request->input('artist');
        $pos= strpos($idart,',');
        $ch=substr ( $idart ,0,$pos);
        $idart=preg_replace("/[^0-9]/",'', $ch); 
        foreach($spectacles as $spec) 
            {
                if($spec->soire_idSoi==$idSoi&& $spec->artist_idArt==$idart)
                {
                    $err[0] = "ce Spectacle Deja Existe ";
                    return redirect('spectacle/create')->with(compact('err'));
                }
            }
           $tdeb=date("H:i",strtotime($request->input('tempDebSpec')) );
           $tFin=date("H:i",strtotime($request->input('tempFinSpec')) );
           $specta = Spectacle::where('soire_idSoi',$idSoi)->get();
        foreach($specta as $spec) 
        {
            if(Carbon::parse($tdeb)->between(Carbon::parse($spec->tempDebSpec),Carbon::parse($spec->tempFinSpec)))
            {
                $err[0] = "Pendant ce Temp il existe une organisation de spectacle dans la meme soiré ";
                return redirect('spectacle/create')->with(compact('err'));
            }
        }
        
        $spectacle = new Spectacle;
        $spectacle->nomSpec = $request->input('nomSpec');
        $spectacle->typeSpec = $request->input('typeSpec');
        $spectacle->tempDebSpec=$tdeb;
        $spectacle->tempFinSpec=$tFin;
        $spectacle->artist_idArt=$idart;
        $spectacle->soire_idSoi=$idSoi;
        $spectacle->imgSpec = $fileNameToStore;
        $spectacle->save();

        return redirect('/spectacle')->with('success', 'Le Spectaacle a été Ajouter Avec Succes');
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
        $artists= Artist::All();
        $soires= Soire::All();  
        $spectacle=Spectacle::find($id); 
        return view('administration.spectacle.edit')->with(compact('artists','soires','id','spectacle'));
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
            'nomSpec'=>'required',
            'typeSpec'=>'required',
            'tempDebSpec' => 'required',
            'tempFinSpec' => 'required',
            'imgSpec' =>'image|nullable|max:1999',
        ]);
        // Handle File Upload
        if($request->hasFile('imgSpec')){
            // Get filename with the extension
            $filenameWithExt = $request->file('imgSpec')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('imgSpec')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('imgSpec')->storeAs('public/spectacle', $fileNameToStore);
        } 
        $err;
        
           $tdeb=date("H:i",strtotime($request->input('tempDebSpec')) );
           $tFin=date("H:i",strtotime($request->input('tempFinSpec')) );
           $spec =Spectacle::find($id);
           $spectacles = Spectacle::where([['idSpec','<>',$id],['soire_idSoi','=',$spec->soire_idSoi]])->get();
        foreach($spectacles as $specta) 
        {
            if(Carbon::parse($tdeb)->between(Carbon::parse($specta->tempDebSpec),Carbon::parse($specta->tempFinSpec)))
            {
                $err[0] = "Pendant ce Temp il existe une organisation de spectacle dans la meme soiré ";
                return redirect('spectacle/'.$id.'/edit/')->with(compact('err'));
            }
        }
        if(strlen ($request->input('desSpec'))>=250)
        {
            $err[0] = "la Description est trés long";
            return redirect('spectacle/'.$id.'/edit/')->with(compact('err'));
        }
        $spec->nomSpec = $request->input('nomSpec');
        $spec->typeSpec = $request->input('typeSpec');
        $spec->tempDebSpec=$tdeb;
        $spec->tempFinSpec=$tFin;
        if($request->hasFile('imgSpec')){
        $spec->imgSpec = $fileNameToStore;
        }
        $spec->save();

        return redirect('/spectacle')->with('success', 'Le Spectacle a été modifier Avec Succes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $spec = Spectacle::find($id);
        $reservs = Reservation::all();
        foreach ($reservs as $res)
        {
        if($res->soire_idSoi==$spec->soire->idSoi)
        return redirect('/spectacle')->with('error', "Suppresion impossible car il existe des Réservation au soiré de ce Spectacle");
        }
        Storage::delete('public/spectacle/'.$spec->imgSpec);
        $spec->delete();
        return redirect('/spectacle')->with('success', 'Le Spectacle  a été Supprimer Avec Succés');
    }
}
