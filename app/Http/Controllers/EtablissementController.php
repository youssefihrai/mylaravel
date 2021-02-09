<?php

namespace App\Http\Controllers;

use App\Affectation;
use App\Etablissement;
use Illuminate\Http\Request;
use App\Etudiant;
use App\Pedagogiqueencadrant;
use App\Soutenance;
use Illuminate\Support\Facades\Auth;
class EtablissementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    //
    //    $etablissment=Etablissement::find()->get();
        return view('etablissement.index',
        [
            'etudiants'=>Etudiant::with('encadres','pegaogiqueencadrants')->where('etablissement_id',Auth::guard('etablissement')->user()->id)->get()

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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public  function afficher(){

        $etudiant=Etudiant::find(Auth::guard('etudiant')->user()->id);
        return view('etudiant.voir',
        [
            "jury1"=>$etudiant->jury1,
            "jury2"=>$etudiant->jury2

        ]
        );
    }


}
