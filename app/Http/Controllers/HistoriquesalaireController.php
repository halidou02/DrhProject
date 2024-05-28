<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HistoriqueSalaire;
use App\Models\Employe;

class HistoriqueSalaireController extends Controller
{
    public function create()
    {
        $employes = Employe::all();
        return view('content.apps.app-grh-historiquesalaire-add', compact('employes'));
    }

    public function index()
    {
        $historiques = HistoriqueSalaire::with('employe')->get();
        return view('content.apps.app-grh-historiquesalaire-list', compact('historiques'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'IDEmploye' => 'required|exists:employe,IDEmploye',
            'DateChangementSalaire' => 'required|date',
            'NouveauSalaire' => 'required|integer',
        ]);

        $historique = HistoriqueSalaire::create($validatedData);

        // Update employe's salary
        $employe = Employe::find($validatedData['IDEmploye']);
        $employe->SalairedeBase = $validatedData['NouveauSalaire'];
        $employe->save();

        return redirect()->route('historiquesalaire.create')->with('success', 'Historique de salaire ajouté avec succès');
    }

    public function edit($id)
    {
        $historique = HistoriqueSalaire::findOrFail($id);
        $employes = Employe::all();
        return view('content.apps.app-grh-historiquesalaire-edit', compact('historique', 'employes'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'IDEmploye' => 'required|exists:employe,IDEmploye',
            'DateChangementSalaire' => 'required|date',
            'NouveauSalaire' => 'required|integer',
        ]);

        $historique = HistoriqueSalaire::findOrFail($id);
        $historique->update($validatedData);

        // Update employe's salary
        $employe = Employe::find($validatedData['IDEmploye']);
        $employe->SalairedeBase = $validatedData['NouveauSalaire'];
        $employe->save();

        return redirect()->route('historiquesalaire.index')->with('success', 'Historique de salaire mis à jour avec succès');
    }

    public function destroy($id)
    {
        $historique = HistoriqueSalaire::findOrFail($id);
        $historique->delete();

        return redirect()->route('historiquesalaire.index')->with('success', 'Historique de salaire supprimé avec succès');
    }
}
