<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use  App\models\Artist;
use DB;

class ArtistController extends Controller
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
        $artists= Artist::All();        
        return view('administration.artiste.index')->with('artists',$artists);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administration.artiste.create');
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
            'ImgArt' =>'image|required|max:9000'
        ]);
        // Handle File Upload
        if($request->hasFile('ImgArt')){
            // Get filename with the extension
            $filenameWithExt = $request->file('ImgArt')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('ImgArt')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('ImgArt')->storeAs('public/artiste', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $artiste = new Artist;
        $artiste->NomArt = $request->input('NomArt');
        $artiste->PrenomArt = $request->input('PrenomArt');
        $artiste->DesArt = $request->input('DesArt');
        $artiste->ImgArt = $fileNameToStore;
        $artiste->save();

        return redirect('/artiste')->with('success', 'L Artiste a été Ajouter Avec Succes');
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
        $artiste = Artist::find($id);

        return view('administration.artiste.edit',compact('artiste', 'id'));
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
            'NomArt' => 'required',
            'PrenomArt' => 'required',
            'DesArt' => 'required',
            'ImgArt' =>'image|nullable|max:9000'
        ]);
          // Handle File Upload
        if($request->hasFile('ImgArt')){
            // Get filename with the extension
            $filenameWithExt = $request->file('ImgArt')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('ImgArt')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('ImgArt')->storeAs('public/artiste', $fileNameToStore);
        } 
        $artiste = Artist::find($id);
        $artiste->NomArt = $request->input('NomArt');
        $artiste->PrenomArt = $request->input('PrenomArt');
        $artiste->DesArt = $request->input('DesArt');
        if($request->hasFile('ImgArt')){
            Storage::delete('public/artiste/'.$artiste->ImgArt);
            $artiste->ImgArt = $fileNameToStore;
        }
        $artiste->save();
        return redirect('/artiste')->with('success', 'l Artiste a eté mis a jour');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $artiste = Artist::find($id);
        if(count($artiste->spectacles()))
        {
        return redirect('/artiste')->with('error', "Suppresion impossible car l'artist a eté effectuer dans un ou plus des spectacle");
        }
        Storage::delete('public/artiste/'.$artiste->ImgArt);
        $artiste->delete();
        return redirect('/artiste')->with('success', 'L Artiste a été Supprimer Avec Succés');
    }
}
