<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departement;

class GrhDepartementController extends Controller
{
    public function create()
    {
        return view('content.apps.app-grh-departement-add');
    }

    public function index()
    {
        $departements = Departement::all();
        return view('content.apps.app-grh-departement-list', compact('departements'));
    }

    public function store(Request $request)
    {
        // Validate and store the form data
        $validatedData = $request->validate([
            'NomDepartement' => 'required|string|max:100',
            'ResponsableDepartement' => 'nullable|string|max:10',
        ]);

        Departement::create($validatedData);

        return redirect()->route('departement.create')->with('success', 'Departement ajouté avec succès');
    }

    public function edit($id)
    {
        $departement = Departement::findOrFail($id);
        return view('content.apps.app-grh-departement-edit', compact('departement'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'NomDepartement' => 'required|string|max:100',
            'ResponsableDepartement' => 'nullable|string|max:10',
        ]);

        Departement::where('IDDepartement', $id)->update($validatedData);

        return redirect()->route('departement.index')->with('success', 'Departement mis à jour avec succès');
    }

    public function destroy($id)
    {
        Departement::destroy($id);
        return redirect()->route('departement.index')->with('success', 'Departement supprimé avec succès');
    }
}
