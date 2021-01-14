<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use  App\models\PartMedia;
use  App\models\Festivale;
use  App\models\FestivalepartMedia;
use DB;
use Carbon\Carbon;

class PartmediaController extends Controller
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
        $partmedias= PartMedia::All();
        $affectations = PartMedia::with('festivales')->get();
        /*$affectpms= FestivalepartMedia::All();*/
        
        return view('administration.partmedia.index')->with(compact('partmedias', 'affectations'));
    }

    public function affectation()
    {
        $partmedias= PartMedia::All();
        $today = Carbon::today()->toDateString();
        $festivales= Festivale::where('dateFinFes', '>=',$today)->get();
        return view('administration.partmedia.affect')->with(compact('festivales', 'partmedias'));
    }

    public function affect()
    {
        $partmedias= PartMedia::All();
        $festivales= Festivale::All();
        return view('administration.partmedia.affect')->with(compact('festivales', 'partmedias'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administration.partmedia.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Handle File Upload
        if($request->hasFile('PmImg')){
            // Get filename with the extension
            $filenameWithExt = $request->file('PmImg')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('PmImg')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('PmImg')->storeAs('public/partmedia', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $partmedia = new PartMedia;
        $partmedia->nomPm = $request->input('nomPm');
        $partmedia->sitePm = $request->input('sitePm');
        $partmedia->PmImg = $fileNameToStore;
        $partmedia->save();

        return redirect('/partmedia')->with('success', 'Partenaire Media Ajouter Avec succes');
    }

    public function affecter(Request $request)
    {   
        $festivalepartmedia = new FestivalepartMedia;
        $idpms; 
        $i=0;$j=1;$k=0;
        $err;
        $succ;
        $dataset=[];
        $lesaffect= FestivalepartMedia::All();
        $partmedias = $request->input('partmedias');
        $pos= strpos($request->input('festivale'),',');
        $ch=substr ( $request->input('festivale') ,0,$pos);
        $idfest=preg_replace("/[^0-9]/",'', $ch); 

        foreach($partmedias as $partmedia)
        {
            $pos= strpos($partmedia,',');
            $ch=substr ( $partmedia ,0,$pos);
            $idpms[$k]=preg_replace("/[^0-9]/",'', $ch); 
            $k++;
        }
        $i=0;$k=0;
        foreach($idpms as $idpartm)
        {
            $partmed = PartMedia::find($idpartm);
            $fest = Festivale::find($idfest);
        foreach($lesaffect as $affectpm)
        {
                if(($affectpm->festivale_idFes== $idfest) && ($affectpm->part_media_idPm == $idpartm) )
                {   
                    $err[$k] = "le partenaire media ".$partmed->nomPm."a éte déja Affecter au Festivale ".$fest->nomFes.".";
                    $i++;$k++;

                }

        }
        if($i==0)
        {
            $dataSet[] = [
            'festivale_idFes'=>$idfest,
            'part_media_idPm' => $idpartm,
            'created_at' =>  \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(), 
            ];
            $succ[$j] = "le partenaire media ".$partmed->nomPm."a été  Affecter avec Succes avec ".$fest->nomFes.".";
            $j++;
        }
        $i=0;
        }
        if(!empty($dataSet))
        {
        DB::table('festivale_part_media')->insert($dataSet);
        return redirect('/partmedia')->with(compact('succ', 'err'));
        }
        else
        return redirect('/partmedia')->with(compact('err'));


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
        $partmedia = PartMedia::find($id);

        return view('administration.partmedia.edit',compact('partmedia', 'id'));

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
            'Nompart' => 'required',
            'sitePm' => 'required',
            'PmImg' =>'image|nullable|max:1999'
        ]);
          // Handle File Upload
        if($request->hasFile('PmImg')){
            // Get filename with the extension
            $filenameWithExt = $request->file('PmImg')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('PmImg')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('PmImg')->storeAs('public/partmedia', $fileNameToStore);
        } 

        $partmedia = PartMedia::find($id);
        $partmedia->nomPm = $request->input('Nompart');
        $partmedia->sitePm = $request->input('sitePm');
        if($request->hasFile('PmImg')){
            Storage::delete('public/partmedia/'.$partmedia->PmImg);
            $partmedia->PmImg = $fileNameToStore;
        }
        $partmedia->save();
        return redirect('/partmedia')->with('success', 'le Partenaire Media a eté mis a jour');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $partmedia = PartMedia::find($id);

        if($partmedia->PmImg != 'noimage.jpg'){
            // Delete Image
            Storage::delete('public/partmedia/'.$partmedia->PmImg);
        }
        
        $partmedia->delete();
        return redirect('/partmedia')->with('success', 'Le Partenaire Media  a été Supprimer Avec Succés');
    }
    public function suppaffect($id,$id2)
    {
        $affectation = FestivalepartMedia::where([['festivale_idFes', $id],['part_media_idPm',$id2]]);
        
        $affectation->delete();
        return redirect('/partmedia')->with('success', "L'Affectation  a été Supprimer Avec Succés");
    }
}
