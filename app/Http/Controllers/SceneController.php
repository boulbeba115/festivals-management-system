<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use  App\models\Scene;
use DB;

class SceneController extends Controller
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
        $scenes= Scene::All();        
        return view('administration.scene.index')->with('scenes',$scenes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administration.scene.create');
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
        if($request->hasFile('ImgScene')){
            // Get filename with the extension
            $filenameWithExt = $request->file('ImgScene')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('ImgScene')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('ImgScene')->storeAs('public/scene', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $scene = new Scene;
        $scene->nomScene = $request->input('nomScene');
        $scene->adrScene = $request->input('adrScene');
        $scene->capScene = $request->input('capScene');
        $scene->ImgScene = $fileNameToStore;
        $scene->save();

        return redirect('/scene')->with('success', 'Scene a été Ajouter Avec Succes');
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
        $scene = Scene::find($id);

        return view('administration.scene.edit',compact('scene', 'id'));
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
            'nomScene' => 'required',
            'adrScene' => 'required',
            'capScene' => 'required',
            'ImgScene' =>'image|nullable|max:9000'
        ]);
          // Handle File Upload
        if($request->hasFile('ImgScene')){
            // Get filename with the extension
            $filenameWithExt = $request->file('ImgScene')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('ImgScene')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('ImgScene')->storeAs('public/scene', $fileNameToStore);
        } 
        $scene = Scene::find($id);
        $scene->nomScene = $request->input('nomScene');
        $scene->adrScene = $request->input('adrScene');
        $scene->capScene = $request->input('capScene');
        if($request->hasFile('ImgScene')){
            Storage::delete('public/scene/'.$scene->ImgScene);
            $scene->ImgScene = $fileNameToStore;
        }
        $scene->save();
        return redirect('/scene')->with('success', 'la scene a eté mis a jour');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $scene = Scene::find($id);
        Storage::delete('public/scene/'.$scene->ImgScene);
        $scene->delete();
        return redirect('/scene')->with('success', 'Le Scene a été Supprimer Avec Succés');
    }
}
