<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use  App\models\Festivale;
use Carbon\Carbon;
use DB;

class FestivaleController extends Controller
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
    public function select(Request $request)
    {   
        $fes= $request->input('festivale');
        $pos= strpos($fes,',');
        $ch=substr ( $fes ,0,$pos);
        $id=preg_replace("/[^0-9]/",'', $ch); 
        $seledctedfes= $festivales= Festivale::All();        
        foreach($seledctedfes as  $seledcted)
        {
            DB::table('festivales')
            ->where('idFes', $seledcted->idFes)
            ->update(['selectedFes'=> 0]);
        }
        DB::table('festivales')
        ->where('idFes', $id)
        ->update(['selectedFes'=> 1]);

        return redirect('/festivale')->with('success', 'le festivale '.$fes.'a été Selectioné');

    }
    public function index()
    {
        $festivales= Festivale::All();   
        $today = Carbon::today()->toDateString();
        $Updatedfestivales= Festivale::where('dateFinFes', '>=',$today)->get();     
        return view('administration.festivale.index')->with(compact('festivales','Updatedfestivales'));  
        //return view('administration.festivale.index')->with('festivales',$festivales);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $date = Carbon::today()->toDateString();
        return view('administration.festivale.create')->with('date',$date);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       $festivales = Festivale::All();
       $nom= $request->input('nomFes');
       $tour= $request->input('tourFes');
       $err;

        $this->validate($request, [
            'nomFes' => 'required',
            'tourFes' => 'required',
            'dateDebFes' => 'required|date|',
            'dateFinFes' => 'required|date|after:dateDebFes',
            'logoFesImg' =>'image|required|max:2100',
            'coverFesImg' =>'image|required|max:2100',
            'telFes'=>'required|digits:8',
            'adrFes'=>'required|max:255',
            'mailFes'=>'required|email|max:255'
        ],

        [
            'nomFes.required' => 'Le Nom de Festival est un champ  obligatoire',
            'tourFes.required' => "l'Edition de Festival est un champ  obligatoire",
            'dateDebFes.required' =>'le date début de Festival est un champ  obligatoire',
            'dateDebFes.date' =>'le date debut doit étre un date valide',
            'dateFinFes.required' =>'le date fin Festival  est un champ obligatoire',
            'dateFinFes.date' =>'le date date fin Festival doit  étre un date valide',
            'dateFinFes.after' =>'la date fin de festivale est avant la date debut de festivale',
            'logoFesImg.required' =>'le logo est obligatoire',
            'logoFesImg.image' =>"la format de l'image de logo  n'est pas valide",
            'logoFesImg.max' =>"la taille maximale de l'image ne doit pas dépassé  2 mo ",
            'coverFesImg.required' =>'la photo cover est obligatoire',
            'coverFesImg.image' =>"la format de l'image de cover n'est pas valide",
            'coverFesImg.max' =>"la taille maximale de l'image est 2 mo ",
            'telFes.required' =>'le numéro de  contact est un champ  obligatoire',
            'telFes.digits' =>'Ce champ doit étre numurique et ne dépasse pas la longeur de 8 ',
            'adrFes.required' =>"l'adresse contact est un champ obligatoire",
            'adrFes.max' =>'ce champ ne doit pas dépassé 255 caractére',
            'mailFes.required' =>"l'email contact est obligatoire",
            'mailFes.max' =>'ce champ ne doit pas dépassé 255 caractére',
            'mailFes.email' =>"La format de l'email n'est pas valide",
        ]
    );
    foreach($festivales as $fes)
    {
        if(strtolower($fes->nomFes)==(strtolower($nom)) && $fes->tourFes==$tour  )
        {
            $err[0] = "ce festivale deja existe ";
            return redirect('festivale/create')->with(compact('err'));
        }
    }
        if($request->hasFile('logoFesImg')){
            $filenameWithExt = $request->file('logoFesImg')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('logoFesImg')->getClientOriginalExtension();
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            $path = $request->file('logoFesImg')->storeAs('public/festivale', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }
        if($request->hasFile('coverFesImg')){
            $filenameWithExt = $request->file('coverFesImg')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('coverFesImg')->getClientOriginalExtension();
            $fileNameToStore2= $filename.'_'.time().'.'.$extension;
            $path = $request->file('coverFesImg')->storeAs('public/festivale', $fileNameToStore2);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }
        $festivale = new Festivale;
        $festivale->nomFes = strtoupper($request->input('nomFes')) ;
        $festivale->tourFes = $request->input('tourFes');
        $festivale->dateDebFes = $request->input('dateDebFes');
        $festivale->dateFinFes = $request->input('dateFinFes');
        $festivale->telFes = $request->input('telFes');
        $festivale->adrFes = $request->input('adrFes');
        $festivale->mailFes = $request->input('mailFes');
        $festivale->logoFesImg = $fileNameToStore;
        $festivale->coverFesImg = $fileNameToStore2;
        $festivale->save();

        return redirect('/festivale')->with('success', 'festivale a été Ajouter Avec Succes');
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
        $festivale = Festivale::find($id);
        return view('administration.festivale.edit')->with(compact('festivale','id'));

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
             'nomFes' => 'required',
             'tourFes' => 'required',
             'dateDebFes' => 'required|date|',
             'dateFinFes' => 'required|date|after:dateDebFes',
             'logoFesImg' =>'image|nullable|max:1999',
             'coverFesImg' =>'image|nullable|max:1999',
             'telFes'=>'required|digits:8',
             'adrFes'=>'required|max:255',
             'mailFes'=>'required|email|max:255',
         ],
 
         [
            'nomFes.required' => 'Le Nom de Festival est un champ  obligatoire',
            'tourFes.required' => "l'Edition de Festival est un champ  obligatoire",
            'dateDebFes.required' =>'le date début de Festival est un champ  obligatoire',
            'dateDebFes.date' =>'le date debut doit étre un date valide',
            'dateFinFes.required' =>'le date fin Festival  est un champ obligatoire',
            'dateFinFes.date' =>'le date date fin Festival doit  étre un date valide',
            'dateFinFes.after' =>'la date fin de festivale est avant la date debut de festivale',
            'logoFesImg.required' =>'le logo est obligatoire',
            'logoFesImg.image' =>"la format de l'image de logo  n'est pas valide",
            'logoFesImg.max' =>"la taille maximale de l'image ne doit pas dépassé  2 mo ",
            'coverFesImg.required' =>'la photo cover est obligatoire',
            'coverFesImg.image' =>"la format de l'image de cover n'est pas valide",
            'coverFesImg.max' =>"la taille maximale de l'image est 2 mo ",
            'telFes.required' =>'le numéro de  contact est un champ  obligatoire',
            'telFes.digits' =>'Ce champ doit étre numurique et ne dépasse pas la longeur de 8 ',
            'adrFes.required' =>"l'adresse contact est un champ obligatoire",
            'adrFes.max' =>'ce champ ne doit pas dépassé 255 caractére',
            'mailFes.required' =>"l'email contact est obligatoire",
            'mailFes.max' =>'ce champ ne doit pas dépassé 255 caractére',
            'mailFes.email' =>"La format de l'email n'est pas valide",
         ]
     );
         if($request->hasFile('logoFesImg')){
             $filenameWithExt = $request->file('logoFesImg')->getClientOriginalName();
             $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
             $extension = $request->file('logoFesImg')->getClientOriginalExtension();
             $fileNameToStore= $filename.'_'.time().'.'.$extension;
             $path = $request->file('logoFesImg')->storeAs('public/festivale', $fileNameToStore);
         } else {
             $fileNameToStore = 'noimage.jpg';
         }
         if($request->hasFile('coverFesImg')){
             $filenameWithExt = $request->file('coverFesImg')->getClientOriginalName();
             $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
             $extension = $request->file('coverFesImg')->getClientOriginalExtension();
             $fileNameToStore2= $filename.'_'.time().'.'.$extension;
             $path = $request->file('coverFesImg')->storeAs('public/festivale', $fileNameToStore2);
         } else {
             $fileNameToStore = 'noimage.jpg';
         }
         $festivale = Festivale::find($id);
         $festivale->nomFes = strtoupper($request->input('nomFes')) ;
         $festivale->tourFes = $request->input('tourFes');
         $festivale->dateDebFes = $request->input('dateDebFes');
         $festivale->dateFinFes = $request->input('dateFinFes');
         $festivale->telFes = $request->input('telFes');
         $festivale->adrFes = $request->input('adrFes');
         $festivale->mailFes = $request->input('mailFes');
         if($request->hasFile('logoFesImg'))
         {
         Storage::delete('public/festivale/'.$festivale->logoFesImg);
         $festivale->logoFesImg = $fileNameToStore;
        }
         if($request->hasFile('coverFesImg'))
         {
         Storage::delete('public/festivale/'.$festivale->coverFesImg);
         $festivale->coverFesImg = $fileNameToStore2;
         }
         $festivale->save();
 
         return redirect('/festivale')->with('success', 'Festivale a été Mise a Jour Avec Succes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $festivale= Festivale::find($id);
        /*Storage::delete('public/festivale/'.$festivale->coverFesImg);
        Storage::delete('public/festivale/'.$festivale->LogoFesImg);*/
        $festivale->delete();
        return redirect('/festivale')->with('success', 'Le Festivale a été Supprimer Avec Succés');
    }

}
