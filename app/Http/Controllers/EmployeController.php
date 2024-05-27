<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employe;

class EmployeController extends Controller
{
    public function create()
    {
        return view('employes.create');
    }

    public function store(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'IDDepartement' => 'required|integer',
            'IDPoste' => 'required|integer',
            'Prenom' => 'required|string|max:50',
            'Nom' => 'required|string|max:50',
            'DateNaissance' => 'required|date',
            'Genre' => 'required|string|max:1',
            'Adresse' => 'required|string|max:200',
            'NumeroTelephone' => 'required|string|max:20',
            'Email' => 'required|string|email|max:100|unique:employe,Email',
            'DateIncorporation' => 'required|date',
            'SalairedeBase' => 'required|integer',
            'Statut' => 'required|string|max:50',
            'EtatCivil' => 'required|string|max:50',
            'Photo' => 'nullable|string|max:200'
        ]);

        // Créer un nouvel employé
        Employe::create($request->all());

        // Rediriger vers une page de succès ou une autre page appropriée
        return redirect()->route('employes.create')->with('success', 'Employé ajouté avec succès.');
    }
}
