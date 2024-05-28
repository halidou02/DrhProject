<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Poste;
use App\Models\Departement;

class GrhPosteController extends Controller
{
    public function create()
    {
        $departements = Departement::all();
        return view('content.apps.app-grh-poste-add', compact('departements'));
    }

    public function index()
    {
        $postes = Poste::with('departement')->get();
        return view('content.apps.app-grh-poste-list', compact('postes'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'TitrePoste' => 'required|string|max:255',
            'Description' => 'nullable|string',
            'SalaireDeBase' => 'required|numeric',
            'IDDepartement' => 'required|exists:departement,IDDepartement',
        ]);

        Poste::create($validatedData);

        return redirect()->route('poste.create')->with('success', 'Poste ajouté avec succès');
    }

    public function edit($id)
    {
        $poste = Poste::findOrFail($id);
        $departements = Departement::all();
        return view('content.apps.app-grh-poste-edit', compact('poste', 'departements'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'TitrePoste' => 'required|string|max:255',
            'Description' => 'nullable|string',
            'SalaireDeBase' => 'required|numeric',
            'IDDepartement' => 'required|exists:departement,IDDepartement',
        ]);

        Poste::where('IDPoste', $id)->update($validatedData);

        return redirect()->route('poste.index')->with('success', 'Poste mis à jour avec succès');
    }

    public function destroy($id)
    {
        Poste::destroy($id);
        return redirect()->route('poste.index')->with('success', 'Poste supprimé avec succès');
    }
}
