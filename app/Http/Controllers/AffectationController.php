<?php

namespace App\Http\Controllers;

use App\Affectation;
use App\Etudiant;
use App\Pedagogiqueencadrant;
use Illuminate\Http\Request;

class AffectationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $affectation=Affectation::get('etudiant_id');
        return view('affectation.add',
        [
            'encadrant'=> Pedagogiqueencadrant::all(),
            'etudiant'=> Etudiant::whereNotIn('id', $affectation)->get()

        ]
       );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Affectation $affectation)
    {
        Affectation::create([
            'etudiant_id'=>$request->etudiant_id,
            'pedagogiqueencadrant_id'=> $request->pedagogiqueencadrant_id,
            'classe' => $request->classe,
            'horaire' => $request->horaire,
            'seance' => $request->grade,


        ]);
        return redirect()->route('Pedagogiqueencadrant.index');

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
    public function getencadrant(){

    }
}
