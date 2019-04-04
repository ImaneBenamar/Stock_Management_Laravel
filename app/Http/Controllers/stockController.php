<?php

namespace App\Http\Controllers;

use App\Generation;
use App\Type;
use Session;
use Illuminate\Http\Request;

class stockController extends Controller
{

    //-------------- les types -----------------


    public function allTypes(){

        $types = Type::all();
        return view('type.home')->with('types',$types);
    }

    public function postTypes(Request $request){

        // add a type

        $this->validate($request,[
            'name' => 'required',
        ]);

        $type = new Type;

        $type->name = $request->get('name');

        $type->save();

        return redirect()->route('home.types');
    }

    public function single_type($id){
        $generations = Generation::where('type_id',$id)->get();
        $type = Type::find($id);
        return view('type.page')->with('types',$generations)->with('name',$type);
    }



    //--------------- Les entrees----------------


    public function showEntres(){

        $entres = Generation::where('mode',1)->OrderBy('date')->get();

        return view('In.show')->with('entres',$entres);

    }

    public function getAddEntres(){

        // get all types and add them to the select tag in the add form
        $types = Type::all();

        return view('In.add')->with('types',$types);
    }

    public function postEntres(Request $request){

        // add entres to data base
        $this->validate($request,[
            'type_id' => 'required',
            'date' => 'required',
            'nfacture' => 'required',
            'quantite' => 'required',
            'prix_uni' => 'required',
            'fourni' => 'required'
        ]);

        $entres = new Generation;
        $entres->type_id = $request->type_id;
        $entres->date = $request->date;
        $entres->numero_facture = $request->nfacture;
        $entres->prix_unitaire = $request->prix_uni;
        $entres->quantite = $request->quantite;
        $entres->fournisseur = $request->fourni;
        $entres->mode = 1;
        $entres->save();

        Session::flash('success','Vous Avez Bien effectuer votre operation!');

        return redirect()->route('show.entres');
    }

    public function editEntres($id){

        $entres = Generation::find($id);
        $types = Type::all();
        $typo = [];
        foreach($types as $type)
        {
            $typo[$type->id] = $type->name;
        }
        return view('In.edit')->with('entres',$entres)->with('types',$typo);

    }

    public function postEditEntres(Request $request, $id){

        $entres = Generation::find($id);
        //change validate after
        $this->validate($request,[
            'type_id' => 'required',
            'date' => 'required',
            'nfacture' => 'required',
            'quantite' => 'required',
            'prix_uni' => 'required',
            'fourni' => 'required'
        ]);
        $entres->type_id = $request->type_id;
        $entres->date = $request->date;
        $entres->numero_facture = $request->nfacture;
        $entres->prix_unitaire = $request->prix_uni;
        $entres->quantite = $request->quantite;
        $entres->fournisseur = $request->fourni;
        $entres->mode = 1;
        $entres->update();


        Session::flash('success','Vous avez bien modifier votre entres');
        return redirect()->route('show.entres');
    }


    public function deleteEntres($id){

        $entres = Generation::find($id);
        $entres->delete();


        Session::flash('failed','Vous avez bien supprimer votre entres');
        return redirect()->route('show.entres');
    }

    //--------------- Stock ----------------------

    public function  showStock(){

        return view('stock.home');
    }

    public function editStock($id){

        // get stock with id = $id from data base

        return view('stock.edit');
    }

    public function postEditStock(Request $request, $id){

        // edit entres with id = $id

        Session::flash('success','Vous avez bien modifier votre generation');
        return redirect()->route('home.stock');
    }


    public function deleteStock($id){

        //$entres = Generation::find($id);
        //$entres->delete();

        Session::flash('failed','Vous avez bien supprimer votre generation');
        return redirect()->route('home.stock');
    }



    //--------------- Les sorties ----------------



    public function showSorties(){

        $sorties = Generation::where('mode',2)->OrderBy('date')->get();
        return view('Out.show')->with('sorties',$sorties);

    }

    public function addSorties(){

        // get all types and add them to the select tag in the add form
        $types = Type::all();
        return view('Out.add')->with('types',$types);
    }

    public function postSorties(Request $request){

        // add entres to data base
        $this->validate($request,[
            'type_id' => 'required',
            'date' => 'required',
            'nfacture' => 'required',
            'quantite' => 'required',
            'prix_uni' => 'required',
            'fourni' => 'required'
        ]);

        $sorties = new Generation();

        $sorties->type_id = $request->type_id;
        $sorties->date = $request->date;
        $sorties->numero_facture = $request->nfacture;
        $sorties->prix_unitaire = $request->prix_uni;
        $sorties->quantite = $request->quantite;
        $sorties->fournisseur = $request->fourni;
        $sorties->mode = 2;
        $sorties->save();

        Session::flash('success','Vous avez bien effectuer votre operation');
        return redirect()->route('show.sorties');
    }

    public function editSorties($id){

        // get entres with id = $id from data base
        $sorties = Generation::find($id);
        $types = Type::all();
        $typo = [];
        foreach($types as $type)
        {
            $typo[$type->id] = $type->name;
        }
        return view('Out.edit')->with('sorties',$sorties)->with('types',$typo);

    }

    public function postEditSorties(Request $request, $id){

        // edit entres with id = $id

        $this->validate($request,[
            'type_id' => 'required',
            'date' => 'required',
            'nfacture' => 'required',
            'quantite' => 'required',
            'prix_uni' => 'required',
            'fourni' => 'required'
        ]);

        $sorties = Generation::find($id);

        $sorties->type_id = $request->type_id;
        $sorties->date = $request->date;
        $sorties->numero_facture = $request->nfacture;
        $sorties->prix_unitaire = $request->prix_uni;
        $sorties->quantite = $request->quantite;
        $sorties->fournisseur = $request->fourni;
        $sorties->mode = 2;
        $sorties->update();

        Session::flash('success','Vous avez bien modifier votre sortie');
        return redirect()->route('show.sorties');
    }


    public function deleteSorties($id){

        $sorties = Generation::find($id);
        $sorties->delete();

        Session::flash('failed','Vous avez bien supprimer votre sortie');
        return redirect()->route('show.sorties');
    }




    //--------------- generation -----------------

    public function generation_page(){

        $generations = Generation::OrderBy('date')->get();

        return view('generation.home')->with('generation',$generations);
    }

    public function editGeneration($id){

        // get entres with id = $id from data base

        $generation = Generation::find($id);
        $types = Type::all();
        $modifier = [];

        foreach ($types as $type){
            $modifier[$type->id] = $type->name;
        }

        return view('generation.edit')->with('generation',$generation)->with('types',$modifier);
    }


    public function postEditGeneration(Request $request, $id){

        // edit entres with id = $id

        $this->validate($request,[
            'type_id' => 'required',
            'date' => 'required',
            'nfacture' => 'required',
            'quantite' => 'required',
            'prix_uni' => 'required',
            'fourni' => 'required'
        ]);

        $generation = new Generation();

        $generation->type_id = $request->type_id;
        $generation->date = $request->date;
        $generation->numero_facture = $request->nfacture;
        $generation->prix_unitaire = $request->prix_uni;
        $generation->quantite = $request->quantite;
        $generation->fournisseur = $request->fourni;
        $generation->update();

        Session::flash('success','Vous avez bien modifier votre generation');
        return redirect()->route('home.generation');
    }


    public function deleteGeneration($id){

        $generation = Generation::find($id);
        $generation->delete();

        Session::flash('failed','Vous avez bien supprimer votre generation');
        return redirect()->route('home.generation');
    }






}
