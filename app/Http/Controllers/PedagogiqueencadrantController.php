<?php

namespace App\Http\Controllers;

use App\Etudiant;
use App\Http\Requests\storeResquest;
use App\Image;
use App\Pedagogiqueencadrant;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PedagogiqueencadrantController extends Controller
{


    public function index()
    {

        return view('pedagogique.index')->with(['encadrantcompany' =>  Pedagogiqueencadrant::withTrashed()->where('etablissement_id', Auth::guard('etablissement')->user()->id)->get()

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('pedagogique.addencadrant');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeResquest $request)
    {
        $has_file=$request->hasFile('picture');
        $path_image=$request->file('picture');

            $data['name']=$request->name;
            $data['email']= $request->email;
            $data['matricule'] = $request->matricule;
            $data['sexe'] = $request->sexe;
            $data['grade'] = $request->grade;
            $data['departement'] = $request->departement;
            $data['matiere'] = $request->matiere;
            $data['telephonne'] = $request->telephonne;
            $data['adresse'] = $request->adresse;
            $data['date_naissance'] = $request->date_naissance;
            $data['password'] = Hash::make($request->password);
            $data['etablissement_id'] = Auth::guard('etablissement')->user()->id;
            $peda=  Pedagogiqueencadrant::create($data);


            $path = $request->file('picture')->store('hhh');


            $peda->image()->save(Image::make(['path' => $path]));
        return redirect()->route('Pedagogiqueencadrant.index');

    }
    public function edit($id)
    {
        $encadrantcompany=Pedagogiqueencadrant::findOrfail($id);
        // $this->authorize("update",$post);
         return view('pedagogique.edit',[
             'encadrantcompany'=>$encadrantcompany
         ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(storeResquest $request, $id)
    {
        $etudiant=Pedagogiqueencadrant::findOrfail($id);
        $etudiant->name=$request->input('name');
        $etudiant->email=$request->input('email');
        $etudiant->matricule=$request->input('matricule');
        $etudiant->adresse=$request->input('adresse');

        $etudiant->save();
        return redirect()->route('Pedagogiqueencadrant.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('pedagogique.show',[
            "encadrantcompany"=>  Pedagogiqueencadrant::with(['image','etudiants','affectations'])->findOrFail($id)
            //eager

            ]);
    }
    public function destroy($id)
    {
        $post = Pedagogiqueencadrant::findOrFail($id);
        //$this->authorize("delete",$post);
        $post->delete();

        // Post::destroy($id);
     return redirect()->back();
    }
    public function restore($id){
        $etudiant = Pedagogiqueencadrant::onlyTrashed()->where('id',$id)->first();
        $etudiant->restore();
        return redirect()->back();
    }
    public function forcedelete($id){
        $post = Pedagogiqueencadrant::onlyTrashed()->where('id',$id)->first();
        $post->forcedelete();
        return redirect()->back();
    }
    public  function afficher(){

          return view('pedagogique.voir',
          [
              "etudiant"=> Pedagogiqueencadrant::with(['affectations','soutenances'])->where('id', Auth::guard('pedagogiquencadrant')->user()->id),

              ]
         );

       }


}
