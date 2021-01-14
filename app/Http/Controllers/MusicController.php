<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use  App\models\Music;
use  App\models\Festivale;
use  App\models\FestivaleMusic;
use DB;
use Carbon\Carbon;

class MusicController extends Controller
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
        $musics= Music::All(); 
        $affectations = Music::with('festivales')->get();        
        return view('administration.music.index')->with(compact('musics', 'affectations'));
    }
    public function affect()
    {
        $musics= Music::All();
        $today = Carbon::today()->toDateString();
        $festivales= Festivale::where('dateFinFes', '>=',$today)->get();
        return view('administration.music.affect')->with(compact('festivales', 'musics'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administration.music.create');
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
            'libMu' => 'required',
            'musicLink' =>'required|max:9000'
        ]);
        // Handle File Upload
        if($request->hasFile('musicLink')){
            // Get filename with the extension
            $filenameWithExt = $request->file('musicLink')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('musicLink')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('musicLink')->storeAs('public/musique', $fileNameToStore);
        } else {
            $fileNameToStore = 'pas de musique';
        }

        $musique = new Music;
        $musique->libMu = $request->input('libMu');
        $musique->musicLink = $fileNameToStore;
        $musique->save();

        return redirect('/music')->with('success', 'Musique a été Ajouter Avec succes');
    }


    public function affecter(Request $request)
    {   
        $festivalemusic = new FestivaleMusic;
        $idpmus; 
        $i=0;$j=1;$k=0;
        $err;
        $succ;
        $dataset=[];
        $lesaffect= FestivaleMusic::All();
        $musics = $request->input('musics');
        $idfest=preg_replace("/[^0-9]/",'', $request->input('festivale')); 

        foreach($musics as $music)
        {   $pos= strpos($music,',');
            $ch=substr ( $music ,0,$pos);
            $idpmus[$k]=preg_replace("/[^0-9]/",'', $ch); 
            $k++;
        }

        $i=0;$k=0;
        foreach($idpmus as $idpmu)
        {
            $music = Music::find($idpmu);
            $fest = Festivale::find($idfest);
        foreach($lesaffect as $affectpm)
        {
                if(($affectpm->festivale_idFes== $idfest) && ($affectpm->music_idMu == $idpmu) )
                {   
                    $err[$k] = "cette musique ".$music->libMu." a été déja Affecter au Festivale ".$fest->nomFes.".";
                    $i++;$k++;

                }

        }
        if($i==0)
        {
            $dataSet[] = [
            'festivale_idFes'=>$idfest,
            'music_idMu' => $idpmu,
            'created_at' =>  \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(), 
            ];
            $succ[$j] = "Cette Musique  ".$music->libMu."a été  Affecter avec Succes avec ".$fest->nomFes.".";
            $j++;
        }
        $i=0;
        }
        if(!empty($dataSet))
        {
        DB::table('festivale_music')->insert($dataSet);
        return redirect('/music')->with(compact('succ', 'err'));
        }
        else
        return redirect('/music')->with(compact('err'));


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
        $music = Music::find($id);

        return view('administration.music.edit',compact('music', 'id'));
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
            'libMu' => 'required',
            'musicLink' =>'nullable|max:9000'
        ]);
         // Handle File Upload
         if($request->hasFile('musicLink')){
            // Get filename with the extension
            $filenameWithExt = $request->file('musicLink')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('musicLink')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('musicLink')->storeAs('public/musique', $fileNameToStore);
        } 
        
        $music = Music::find($id);
        if($request->hasFile('musicLink'))
        {
        Storage::delete('public/musique/'.$music->musicLink);
        $music->musicLink = $fileNameToStore;
        }
        $music->libMu = $request->input('libMu');
        $music->save();
        return redirect('/music')->with('success', 'la Music a été mis a jour');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $music = Music::find($id);
        Storage::delete('public/musique/'.$music->musicLink);
        $music->delete();
        return redirect('/music')->with('success', 'La Musique a été Supprimer Avec Succés');
    }

    public function suppaffect($id,$id2)
    {
        $affectation = FestivaleMusic::where([['festivale_idFes', $id],['music_idMu',$id2]]);
        
        $affectation->delete();
        return redirect('/music')->with('success', "L'Affectation  a été Supprimer Avec Succés");
    }
}
