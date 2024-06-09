<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AvantageSocial;
use App\Models\Employe;
use App\Models\TypeAvantageSocial;

class GrhAvantageSociauxController extends Controller
{
    public function create()
    {
        // Fetch all employes and types of avantages sociaux for the dropdowns
        $employes = Employe::all();
        $typesAvantages = TypeAvantageSocial::all();
        return view('content.apps.app-grh-avantages-sociaux-add', compact('employes', 'typesAvantages'));
    }

    public function index()
    {
        $avantages_sociaux = AvantageSocial::with(['employe', 'typeAvantage'])->get();
        return view('content.apps.app-grh-avantages-sociaux-list', compact('avantages_sociaux'));
    }

    public function store(Request $request)
    {
        // Validate and store the form data
        $validatedData = $request->validate([
            'IDTypeAvantage' => 'required|exists:types_avantages_sociaux,IDTypeAvantage',
            'DescriptionAvantageSocial' => 'required|string|max:200',
            'IDEmploye' => 'required|exists:employe,IDEmploye',
        ]);

        // Automatically set the prime based on the selected type of avantage social
        $typeAvantage = TypeAvantageSocial::find($request->IDTypeAvantage);
        $validatedData['prime'] = $typeAvantage->Prime;
        $validatedData['NomAvantageSocial'] = $typeAvantage->NomTypeAvantage;

        AvantageSocial::create($validatedData);

        return redirect()->route('avantages_sociaux.create')->with('success', 'Avantage social ajouté avec succès');
    }

    public function edit($id)
    {
        $avantage = AvantageSocial::findOrFail($id);
        $employes = Employe::all();
        $typesAvantages = TypeAvantageSocial::all();
        return view('content.apps.app-grh-avantages-sociaux-edit', compact('avantage', 'employes', 'typesAvantages'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'IDTypeAvantage' => 'required|exists:types_avantages_sociaux,IDTypeAvantage',
            'DescriptionAvantageSocial' => 'required|string|max:200',
            'IDEmploye' => 'required|exists:employe,IDEmploye',
        ]);

        // Automatically set the prime based on the selected type of avantage social
        $typeAvantage = TypeAvantageSocial::find($request->IDTypeAvantage);
        $validatedData['prime'] = $typeAvantage->Prime;
        $validatedData['NomAvantageSocial'] = $typeAvantage->NomTypeAvantage;

        AvantageSocial::where('IDAvantageSocial', $id)->update($validatedData);

        return redirect()->route('avantages_sociaux.index')->with('success', 'Avantage social mis à jour avec succès');
    }

    public function destroy($id)
    {
        AvantageSocial::destroy($id);
        return redirect()->route('avantages_sociaux.index')->with('success', 'Avantage social supprimé avec succès');
    }
}
