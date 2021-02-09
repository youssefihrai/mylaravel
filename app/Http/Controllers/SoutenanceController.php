<?php

namespace App\Http\Controllers;

use App\CompanyEncadrant;
use App\Etudiant;
use App\Http\Requests\NoteRequest;
use App\Pedagogiqueencadrant;
use App\Soutenance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SoutenanceController extends Controller
{
    public function create()
    {
        $soutenance=Soutenance::get('etudiant_id');
        return view('soutenance.add',
        [
            'encadrant'=> Pedagogiqueencadrant::all(),
            'jury1'=> Pedagogiqueencadrant::all(),
            'jury2'=> Pedagogiqueencadrant::all(),
            'company'=> CompanyEncadrant::all(),
            'etudiant'=> Etudiant::whereNotIn('id', $soutenance)->get()
        ]
       );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Soutenance $soutenance)
    {
    Soutenance::create([
        'etudiant_id'=>$request->etudiant_id,
        'company_encadrants_id'=> $request->company_encadrants_id,
        'pedagogiqueencadrant_id'=> $request->pedagogiqueencadrant_id,
        'jury1'=>$request->jury1,
        'jury2'=>$request->jury2,
        'classe' => $request->classe,
        'date' => $request->date,

    ]);
    return redirect()->route('Etablissement.index');
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
        $etudiant=Soutenance::findOrfail($id);
        $etudiant->name=$request->input('name');
        $etudiant->save();

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
public  function editnoteencadrant($id,NoteRequest $request)
{
    $Soutenance=Soutenance::findOrfail($id);
    if( $request->input('notepedagogique')<20 && $request->input('notepedagogique')>0){
    $Soutenance->noteencadrant=$request->input('notepedagogique');
    $Soutenance->livrable=$request->input('livrable');
    $Soutenance->save();
    }
    return redirect()->back();
}
public  function editnotepedagogique($id,NoteRequest $request)
{
    $Soutenance=Soutenance::findOrfail($id);

    $Soutenance->noteRapportencadrant=$request->input('livrable');
    $Soutenance->notepedagogique=$request->input('notepedagogique');
    $Soutenance->save();


    return redirect()->back();

}

public  function editnotejury($id,NoteRequest $request)
{
    $Soutenance=Soutenance::findOrfail($id);
    $Soutenance->noteRapportjury1=$request->input('livrable');
    $Soutenance->notejury1=$request->input('notepedagogique');
    $Soutenance->save();
    return redirect()->back();

}
public  function editnotejury2($id,Request $request)
{
    $Soutenance=Soutenance::findOrfail($id);
    $Soutenance->noteRapportjury2=$request->input('livrable');
    $Soutenance->notejury2=$request->input('notepedagogique');
    $Soutenance->save();
    return redirect()->back();

}

}
