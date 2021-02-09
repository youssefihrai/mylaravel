<?php

namespace App\Http\Controllers;

use App\CompanyEncadrant;
use App\Encadrant;
use App\Http\Requests\storeResquest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CompanyencadrantController extends Controller
{


    public function index()
    {
        $encadrant = CompanyEncadrant::all();
        return view('encadrant.index')->with(['encadrantcompany' => $encadrant]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('encadrant.addencadrant');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeResquest $request, CompanyEncadrant $encadrant)
    {
        CompanyEncadrant::create([
            'name'=>$request->name,
            'email'=> $request->email,
            'matricule' => $request->matricule,
            'sexe' => $request->sexe,

            'telephonne' => $request->telephonne,
            'adresse' => $request->adresse,
            'date_naissance' => $request->date_naissance,
            'password' => Hash::make($request->password),
            'etablissement_id' => Auth::guard('etablissement')->user()->id
        ]);
        return redirect()->route('CompanyEncadrant.index');

    }
    public function edit($id)
    {
        $encadrantcompany=CompanyEncadrant::findOrfail($id);
        // $this->authorize("update",$post);
         return view('encadrant.edit',[
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
        $etudiant=CompanyEncadrant::findOrfail($id);
        $etudiant->name=$request->input('name');
        $etudiant->email=$request->input('email');
        $etudiant->matricule=$request->input('matricule');
        $etudiant->adresse=$request->input('adresse');

        $etudiant->save();
        return redirect()->route('CompanyEncadrant.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $encadrant = CompanyEncadrant::findOrFail($id);
        //$this->authorize("delete",$post);
        $encadrant->delete();
            return redirect()->back();

    }
    public  function afficher(){
      //  $etudiants= CompanyEncadrant::with(['affectation'])->where('id', Auth::guard('encadrant')->user()->id);
        // $etudiants=CompanyEncadrant::where('etudiant_id',Auth::guard('etudiant')->user()->id);
        return view('encadrant.voir',
        [
            "etudiant"=> CompanyEncadrant::with(['etudiants','soutenances'])->where('id', Auth::guard('encadrant')->user()->id),
          //     "etudiants"=>Affectation::where('etudiant_id',Auth::guard('etudiant')->user()->id)

            ]
       );

    }

}
