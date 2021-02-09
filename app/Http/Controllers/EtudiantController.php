<?php

namespace App\Http\Controllers;

use App\Affectation;
use App\Etablissement;
use App\Etudiant;
use App\Etablissment;
use App\Http\Requests\storeResquest;
use App\Image;
use Etablissment as GlobalEtablissment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class EtudiantController extends Controller
{




    public function index()
    {
        return view('etudiant.index',
        [
            'etudiants'=> Etudiant::withTrashed()->where('etablissement_id', Auth::guard('etablissement')->user()->id)->get()

        ]
       );
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('etablissement.addetudiant');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $has_file=$request->hasFile('picture');
          $path_image=$request->file('picture');

          $data['name']=$request->name;
          $data['email']= $request->email;
          $data['matricule'] = $request->matricule;
          $data['sexe'] = $request->sexe;
          $data['typegroupe'] = $request->typegroupe;
          $data['adresse'] = $request->adresse;
          $data['date_naissance'] = $request->date_naissance;
          $data ['password'] = Hash::make($request->password);
          $data ['etablissement_id'] = Auth::guard('etablissement')->user()->id;
          $etudiant=  Etudiant::create($data);


            $path = $request->file('picture')->store('hhh');


            $etudiant->image()->save(Image::make(['path' => $path]));

        return redirect()->route('Etudiant.index');
    }





    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('etudiant.show',[
            "etudiant"=>  Etudiant::with(['image'])->findOrFail($id)//eager
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $etudiant=Etudiant::findOrfail($id);
        // $this->authorize("update",$post);
         return view('etudiant.edit',[
             'Etudiant'=>$etudiant
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
        $etudiant=Etudiant::findOrfail($id);
        $etudiant->name=$request->input('name');
        $etudiant->email=$request->input('email');
        $etudiant->matricule=$request->input('matricule');
        $etudiant->adresse=$request->input('adresse');

        $etudiant->save();
        return redirect()->route('Etudiant.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $post = Etudiant::findOrFail($id);
        //$this->authorize("delete",$post);
        $post->delete();

        // Post::destroy($id);
     return redirect()->back();
    }
    public function restore($id){
        $etudiant = Etudiant::onlyTrashed()->where('id',$id)->first();
        $etudiant->restore();
        return redirect()->back();
    }
    public function forcedelete($id){
        $post = Etudiant::onlyTrashed()->where('id',$id)->first();
        $post->forcedelete();
        return redirect()->back();
    }
    public function activer1($id)
    {
        $affectation=Affectation::findOrfail($id);
        $affectation->seance1='présent';
        $affectation->save();
        return redirect()->back();
    }
    public function activer2($id)
    {
        $affectation=Affectation::findOrfail($id);
        $affectation->seance2='présent';
        $affectation->save();
        return redirect()->back();
    }
    public function activer3($id)
    {
        $affectation=Affectation::findOrfail($id);
        $affectation->seance3='présent';
        $affectation->save();
        return redirect()->back();
    }
    public function activer4($id)
    {
        $affectation=Affectation::findOrfail($id);
        $affectation->seance4='présent';
        $affectation->save();
        return redirect()->back();
    }


}
