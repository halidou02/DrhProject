<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employe;
use App\Models\Departement;
use App\Models\Poste;

class GrhEmployeAdd extends Controller
{
    public function create()
    {
        // Fetch all departements and postes for the dropdowns
        $departements = Departement::all();
        $postes = Poste::all();

        return view('content.apps.app-grh-employe-add', compact('departements', 'postes'));
    }
    public function index()
    {
        $employes = Employe::with(['departement', 'poste'])->get();
        return view('content.apps.app-grh-employe-add', compact('employes'));
    }

    public function store(Request $request)
    {
        // Validate and store the form data
        $validatedData = $request->validate([
            'Nom' => 'required|string|max:50',
            'Prenom' => 'required|string|max:50',
            'DateNaissance' => 'required|date',
            'Genre' => 'required|string|max:1',
            'Adresse' => 'nullable|string|max:200',
            'NumeroTelephone' => 'nullable|string|max:50',
            'Email' => 'nullable|email|max:100',
            'DateIncorporation' => 'required|date',
            'SalairedeBase' => 'nullable|integer',
            'Statut' => 'nullable|string|max:50',
            'EtatCivil' => 'nullable|string|max:50',
            'Photo' => 'nullable|string|max:200',
            'IDDepartement' => 'required|exists:departement,IDDepartement',
            'IDPoste' => 'required|exists:poste,IDPoste',
        ]);

        Employe::create($validatedData);

        return redirect()->route('employe.create')->with('success', 'Employé ajouté avec succès');
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'Nom' => 'required|string|max:255',
            'Prenom' => 'required|string|max:255',
            'DateNaissance' => 'required|date',
            'Genre' => 'required|string|max:1',
            'Adresse' => 'required|string|max:255',
            'NumeroTelephone' => 'required|string|max:50',
            'Email' => 'required|string|email|max:100',
            'DateIncorporation' => 'required|date',
            'SalairedeBase' => 'required|integer',
            'Statut' => 'required|string|max:50',
            'EtatCivil' => 'required|string|max:50',
            'Photo' => 'nullable|string|max:200',
            'IDDepartement' => 'required|integer',
            'IDPoste' => 'required|integer',
        ]);

        Employe::where('IDEmploye', $id)->update($validatedData);

        return redirect()->route('employe.index')->with('success', 'Employé mis à jour avec succès');
    }

    public function destroy($id)
    {
        Employe::destroy($id);
        return redirect()->route('employe.index')->with('success', 'Employé supprimé avec succès');
    }
}


  // public function index()
  // {
  //   return view('content.apps.app-grh-employe-add');
  // }


