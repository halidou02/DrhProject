<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departement;
use App\Models\Employe;

class GrhDepartementController extends Controller
{
    public function create()
    {
        // Fetch all employes for the dropdown
        $employes = Employe::all();
        return view('content.apps.app-grh-departement-add', compact('employes'));
    }

    public function index()
    {
        $departements = Departement::with('responsable')->get();
        return view('content.apps.app-grh-departement-list', compact('departements'));
    }

    public function store(Request $request)
    {
        // Validate and store the form data
        $validatedData = $request->validate([
            'NomDepartement' => 'required|string|max:100',
            'ResponsableDepartement' => 'nullable|exists:employe,IDEmploye',
        ]);

        Departement::create($validatedData);

        return redirect()->route('departement.create')->with('success', 'Département ajouté avec succès');
    }

    public function edit($id)
    {
        $departement = Departement::findOrFail($id);
        $employes = Employe::all();
        return view('content.apps.app-grh-departement-edit', compact('departement', 'employes'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'NomDepartement' => 'required|string|max:100',
            'ResponsableDepartement' => 'nullable|exists:employe,IDEmploye',
        ]);

        Departement::where('IDDepartement', $id)->update($validatedData);

        return redirect()->route('departement.index')->with('success', 'Département mis à jour avec succès');
    }

    public function destroy($id)
    {
        Departement::destroy($id);
        return redirect()->route('departement.index')->with('success', 'Département supprimé avec succès');
    }
}
