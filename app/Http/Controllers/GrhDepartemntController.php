<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GrhDepartemntController extends Controller
{

  public function index()
  {
      return view('content.apps.app-grh-departement-add');
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

      Departement::create($validatedData);

      return redirect()->route('departement.create')->with('success', 'Departement ajouté avec succès');
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

      Departement::where('IDDepartement', $id)->update($validatedData);

      return redirect()->route('departement.index')->with('success', 'Departement mis à jour avec succès');
  }

  public function destroy($id)
  {
      Departement::destroy($id);
      return redirect()->route('departement.index')->with('success', 'Departement supprimé avec succès');
  }
}
