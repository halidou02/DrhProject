<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conge;
use App\Models\Employe;

class CongeController extends Controller
{
    public function create()
    {
        $employes = Employe::all();
        return view('content.apps.app-grh-conge-add', compact('employes'));
    }

    public function index()
    {
        $conges = Conge::with('employe')->get();
        return view('content.apps.app-grh-conge-list', compact('conges'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'IDEmploye' => 'required|exists:employe,IDEmploye',
            'Type' => 'required|string|max:10',
            'dateDebutConge' => 'required|date',
            'dateFinConge' => 'nullable|date',
            'StatutConge' => 'required|string|max:10',
        ]);

        Conge::create($validatedData);
        return redirect()->route('conge.create')->with('success', 'Congé ajouté avec succès');
    }

    public function edit($id)
    {
        $conge = Conge::findOrFail($id);
        $employes = Employe::all();
        return view('content.apps.app-grh-conge-edit', compact('conge', 'employes'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'IDEmploye' => 'required|exists:employe,IDEmploye',
            'Type' => 'required|string|max:10',
            'dateDebutConge' => 'required|date',
            'dateFinConge' => 'nullable|date',
            'StatutConge' => 'required|string|max:10',
        ]);

        Conge::where('IDConge', $id)->update($validatedData);
        return redirect()->route('conge.index')->with('success', 'Congé mis à jour avec succès');
    }

    public function destroy($id)
    {
        Conge::destroy($id);
        return redirect()->route('conge.index')->with('success', 'Congé supprimé avec succès');
    }

    public function approve($id)
    {
        $conge = Conge::findOrFail($id);
        $conge->update(['StatutConge' => 'approuvé']);
        $employe = $conge->employe;
        $employe->update(['Statut' => 'En congé']);
        return redirect()->route('conge.index')->with('success', 'Congé approuvé avec succès');
    }

    public function reject($id)
    {
        $conge = Conge::findOrFail($id);
        $conge->update(['StatutConge' => 'rejeté']);
        return redirect()->route('conge.index')->with('success', 'Congé rejeté avec succès');
    }

    public function cancel($id)
    {
        $conge = Conge::findOrFail($id);
        $conge->update(['StatutConge' => 'annulé']);
        return redirect()->route('conge.index')->with('success', 'Congé annulé avec succès');
    }
}
