<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\models\Sponseur;
use App\models\Festivale;
use App\models\FestivaleSponseur;
use DB;
use Carbon\Carbon;

class SponseurController extends Controller
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
        $sponseurs= Sponseur::All();
        $affectations = Sponseur::with('festivales')->get();
        return view('administration.sponseurs.index')->with(compact('sponseurs', 'affectations'));
    }

    public function affect()
    {
        $sponseurs= Sponseur::All();
        $today = Carbon::today()->toDateString();
        $festivales= Festivale::where('dateFinFes', '>=',$today)->get();
        return view('administration.sponseurs.affect')->with(compact('sponseurs', 'festivales'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administration.sponseurs.create');
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
        if($request->hasFile('sponImg')){
            // Get filename with the extension
            $filenameWithExt = $request->file('sponImg')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('sponImg')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('sponImg')->storeAs('public/sponseur', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $Sponseur = new Sponseur;
        $Sponseur->nomSpon = $request->input('nomSpon');
        $Sponseur->siteSpon = $request->input('siteSpon');
        $Sponseur->sponImg = $fileNameToStore;
        $Sponseur->save();

        return redirect('/sponseurs')->with('success', 'Sponseur Ajouter Avec succes');
    }
    public function affecter(Request $request)
    {   
        $festivaleSponseur = new FestivaleSponseur;
        $idspons; 
        $i=0;$j=1;$k=0;
        $err;
        $succ;
        $dataset=[];
        $lesaffect= FestivaleSponseur::All();
        $sponseurs = $request->input('sponseurs');

        $pos= strpos($request->input('festivale'),',');
        $ch=substr ( $request->input('festivale') ,0,$pos);
        $idfest=preg_replace("/[^0-9]/",'', $ch); 

        foreach($sponseurs as $sponseur)
        {
            $pos= strpos($sponseur,',');
            $ch=substr ( $sponseur ,0,$pos);
            $idspons[$k]=preg_replace("/[^0-9]/",'', $ch); 
            $k++;
        }
        $i=0;$k=0;
        foreach($idspons as $idspon)
        {
            $fest = Festivale::find($idfest);
            $spn = Sponseur::find($idspon);
        foreach($lesaffect as $affectspon)
        {
                if(($affectspon->festivale_idFes== $idfest) && ($affectspon->sponseur_idSpon == $idspon) )
                {   
                    $err[$k] = "le sponseur ".$spn->nomSpon."a éte déja Affecter au Festivale ".$fest->nomFes.".";
                    $i++;$k++;

                }

        }
        if($i==0)
        {
            $dataSet[] = [
            'festivale_idFes'=>$idfest,
            'sponseur_idSpon' => $idspon,
            'created_at' =>  \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(), 
            ];
            $succ[$j] = "le sponseur ".$spn->nomSpon."a été  Affecter avec Succes avec ".$fest->nomFes.".";
            $j++;
        }
        $i=0;
        }
        if(!empty($dataSet))
        {
        DB::table('festivale_sponseur')->insert($dataSet);
        return redirect('/sponseurs')->with(compact('succ', 'err'));
        }
        else
        return redirect('/sponseurs')->with(compact('err'));


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
        $sponseur = Sponseur::find($id);

        return view('administration.sponseurs.edit',compact('sponseur', 'id'));

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
            'nomSpon' => 'required',
            'siteSpon' => 'required',
            'sponImg' =>'image|nullable|max:1999'
        ]);
         // Handle File Upload
         if($request->hasFile('sponImg')){
            // Get filename with the extension
            $filenameWithExt = $request->file('sponImg')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('sponImg')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('sponImg')->storeAs('public/sponseur', $fileNameToStore);
        } 

        $sponseur = Sponseur::find($id);
        $sponseur->nomSpon = $request->input('nomSpon');
        $sponseur->siteSpon = $request->input('siteSpon');
        if($request->hasFile('sponImg')){
            Storage::delete('public/sponseur/'.$sponseur->sponImg);
            $sponseur->sponImg = $fileNameToStore;
        }
        $sponseur->save();
        return redirect('/sponseurs')->with('success', 'le sponseur a eté mis a jour');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sponseur = Sponseur::find($id);

        if($sponseur->sponImg != 'noimage.jpg'){
            // Delete Image
            Storage::delete('public/sponseur/'.$sponseur->sponImg);
        }
        
        $sponseur->delete();
        return redirect('/sponseurs')->with('success', 'Le Sponseur a été Supprimer Avec Succés');
    }
    public function suppaffect($id,$id2)
    {
        $affectation = FestivaleSponseur::where([['festivale_idFes', $id],['sponseur_idSpon',$id2]]);
        
        $affectation->delete();
        return redirect('/sponseurs')->with('success', "L'Affectation  a été Supprimer Avec Succés");
    }
        
}
