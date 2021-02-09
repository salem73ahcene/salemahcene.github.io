<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dom;
class DomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $listedom=Dom::all();
       return view('domss.index',['mouv'=>$listedom]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('domss.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dom = new Dom();
         $request->validate([
                'numcv' => 'required',
                'natdos' => 'required|min:2',
                'name' => 'required|min:4',
                'poste'=> 'required|min:4',
                'dat_s' => 'required|date',
                'obs' => 'required|min:5'
               
            ], [
                'numcv.required' => 'Renseignez ce champs S.V.P!',
                'natdos.required' => 'Renseignez ce champs S.V.P!',
                'name.required' => 'Renseignez ce champs S.V.P!',
                'poste.required' => 'Renseignez ce champs S.V.P!',
                'dat_s.required' => 'Renseignez ce champs S.V.P!',
                'obs.required' => 'Renseignez ce champs S.V.P!'

            ]);

         $dom->numcv = $request->input('numcv');
         $dom->natdos = $request->input('natdos');
         $dom->name = $request->input('name');
         $dom->poste = $request->input('poste');
         $dom->dat_s = $request->input('dat_s');
         $dom->dat_e = $request->input('dat_e');
         $dom->obs = $request->input('obs');

         $dom->save();

         session()->flash('success','Bravo!!Le mouvement a été stocker avec succès.');
          return redirect('index');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Dom $id)
    {
       return view('domss.show',['doms' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mv=Dom::find($id);

        return view('domss.edit')->with('mv', $mv);
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
        $mv =Dom::find($id);

           $request->validate([
                'numcv' => 'required|min:10|max:10',
                'natdos' => 'required|min:2',
                'name' => 'required|min:4',
                 'poste' => 'required|min:6',
                'dat_s' => 'required',
                'obs' => 'required|min:5'
               
            ], [
                'numcv.required' => 'Renseignez le champs (Numéro convention)S.V.P!',
                'natdos.required' => 'Renseignez le champs(nature dossier) S.V.P!',
                'name.required' => 'Renseignez le champs(Demandeur) S.V.P!',
                'poste.required' => 'Renseignez le champs(poste) S.V.P!',
                'dat_s.required' => 'Renseignez le champs(Date sortie) S.V.P!',
                'obs.required' => 'Renseignez le champs(Observation) S.V.P!'

            ]);



        $mv->numcv = $request->input('numcv');
        $mv->natdos = $request->input('natdos');
        $mv->name = $request->input('name');
         $mv->poste = $request->input('poste');
        $mv->dat_s = $request->input('dat_s');
        $mv->dat_e = $request->input('dat_e');
        $mv->obs = $request->input('obs');

        $mv->save();
        

          if($mv->dat_e !==null){

            $mv->delete();

             session()->flash('danger','Bravo!!Le mouvement a été supprimé avec succès!!');
               
        }

        return redirect('/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mv=Dom::find($id);
        
        $mv->delete();

        session()->flash('danger','Bravo!!Le mouvement a été supprimé avec succès!!');

        return redirect('/index');
    }
}
