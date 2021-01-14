<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use  App\models\PointVente;
use  App\models\Festivale;
use  App\models\FestivalePointVente;
use DB;
use Carbon\Carbon;

class PointventeController extends Controller
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
        $pointventes= PointVente::All();
        $affectations = PointVente::with('festivales')->get();        
        return view('administration.pointvente.index')->with(compact('pointventes', 'affectations'));
    }

    public function affect()
    {
        $pvs= PointVente::All();
        $today = Carbon::today()->toDateString();
        $festivales= Festivale::where('dateFinFes', '>=',$today)->get();
        return view('administration.pointvente.affect')->with(compact('festivales', 'pvs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administration.pointvente.create');
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
            'nomPv' => 'required',
            'adrPv' => 'required',
            'telPv'=>'required|digits:8',
            'faxPv'=>'required|digits:8',
            'pvMapx' => 'required',
            'pvMapy' => 'required',
            'pvImg' =>'required|max:9000'
        ]);
        // Handle File Upload
        if($request->hasFile('pvImg')){
            // Get filename with the extension
            $filenameWithExt = $request->file('pvImg')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('pvImg')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('pvImg')->storeAs('public/pointvente', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }
        
        $pointVente = new PointVente;
        $pointVente->nomPv = $request->input('nomPv');
        $pointVente->adrPv = $request->input('adrPv');
        $pointVente->telPv = $request->input('telPv');
        $pointVente->faxPv = $request->input('faxPv');
        $pointVente->pvMapx = substr($request->input('pvMapx'),0,9);
        $pointVente->pvMapy = substr($request->input('pvMapy'),0,9);
        $pointVente->pvImg = $fileNameToStore;
        $pointVente->save();

        return redirect('/pointvente')->with('success', 'Point Vente a été Ajouter Avec succes');
    }


    public function affecter(Request $request)
    {   
        $festivalepointvente = new FestivalePointVente;
        $idpvs; 
        $i=0;$j=1;$k=0;
        $err;
        $succ;
        $dataset=[];
        $lesaffect= FestivalePointVente::All();
        $pointventes = $request->input('pointventes');
        $idfest=preg_replace("/[^0-9]/",'', $request->input('festivale')); 


        foreach($pointventes as $pointvente)
        {   $pos= strpos($pointvente,',');
            $ch=substr ( $pointvente ,0,$pos);
            $idpvs[$k]=preg_replace("/[^0-9]/",'', $ch); 
            $k++;
        }

        $i=0;$k=0;
        foreach($idpvs as $idpv)
        {
            $point = PointVente::find($idpv);
            $fest = Festivale::find($idfest);
        foreach($lesaffect as $affectpm)
        {
                if(($affectpm->festivale_idFes== $idfest) && ($affectpm->point_vente_idPv == $idpv) )
                {   
                    $err[$k] = "ce Point de Vente ".$point->nomPv." a été déja Affecter au Festivale ".$fest->nomFes.".";
                    $i++;$k++;

                }

        }
        if($i==0)
        {
            $dataSet[] = [
            'festivale_idFes'=>$idfest,
            'point_vente_idPv' => $idpv,
            'created_at' =>  \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(), 
            ];
            $succ[$j] = "Ce Point de Vente ".$point->nomPv."a été  Affecter avec Succes avec ".$fest->nomFes.".";
            $j++;
        }
        $i=0;
        }
        if(!empty($dataSet))
        {
        DB::table('festivale_point_vente')->insert($dataSet);
        return redirect('/pointvente')->with(compact('succ', 'err'));
        }
        else
        return redirect('/pointvente')->with(compact('err'));


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
        $pointvente = PointVente::find($id);

        return view('administration.pointvente.edit',compact('pointvente', 'id'));
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
            'nomPv' => 'required',
            'telPv'=>'required|digits:8',
            'faxPv'=>'required|digits:8',
            'adrPv' => 'required',
            'pvMapx' => 'required',
            'pvMapy' => 'required',
            'pvImg' =>'nullable|max:9000'
        ]);
        // Handle File Upload
        if($request->hasFile('pvImg')){
            // Get filename with the extension
            $filenameWithExt = $request->file('pvImg')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('pvImg')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('pvImg')->storeAs('public/pointvente', $fileNameToStore);
        } 
        $pv = PointVente::find($id);
        if($request->hasFile('pvImg')){
        Storage::delete('public/pointvente/'.$pv->pvImg);
        }
        $pv->nomPv = $request->input('nomPv');
        $pv->adrPv = $request->input('adrPv');
        $pv->telPv = $request->input('telPv');
        $pv->faxPv = $request->input('faxPv');
        $pv->pvMapx = substr($request->input('pvMapx'),0,9);
        $pv->pvMapy = substr($request->input('pvMapy'),0,9);
        if($request->hasFile('pvImg')){
            $pv->pvImg = $fileNameToStore;
        }
        $pv->save();
        return redirect('/pointvente')->with('success', 'la point de Vente a été mis a jour');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pointvente = PointVente::find($id);
        Storage::delete('public/pointvente/'.$pointvente->pvImg);
        $pointvente->delete();
        return redirect('/pointvente')->with('success', 'La point de vente a été Supprimer Avec Succés');
    }

    public function suppaffect($id,$id2)
    {
        $affectation = FestivalePointVente::where([['festivale_idFes', $id],['point_vente_idPv',$id2]]);
        
        $affectation->delete();
        return redirect('/pointvente')->with('success', "L'Affectation  a été Supprimer Avec Succés");
    }
}
