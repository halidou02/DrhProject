<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EvolutionPerformance;
use App\Models\Employe;

class GrhEvaluationController extends Controller
{
    public function create()
    {
        $employes = Employe::with('departement')->get(); // Charger le département avec l'employé
        return view('content.apps.app-grh-evaluation-add', compact('employes'));
    }

    public function index()
    {
        $evaluations = EvolutionPerformance::with(['employe'])->get();
        return view('content.apps.app-grh-evaluation-list', compact('evaluations'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'IDEmploye' => 'required|exists:employe,IDEmploye',
            'DateEvaluat' => 'required|date',
            'ResultEvaluat' => 'required|integer|min:1|max:10',
            'Departement' => 'required|string', // Valider le champ département
        ]);

        $employe = Employe::with('departement')->findOrFail($request->IDEmploye);
        $validatedData['IDDepartement'] = $employe->IDDepartement;

        EvolutionPerformance::create($validatedData);

        return redirect()->route('evaluation.create')->with('success', 'Évaluation ajoutée avec succès');
    }

    public function edit($id)
    {
        $evaluation = EvolutionPerformance::findOrFail($id);
        $employes = Employe::with('departement')->get(); // Charger le département avec l'employé
        return view('content.apps.app-grh-evaluation-edit', compact('evaluation', 'employes'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'IDEmploye' => 'required|exists:employe,IDEmploye',
            'DateEvaluat' => 'required|date',
            'ResultEvaluat' => 'required|integer|min:1|max:10',
            'Departement' => 'required|string', // Valider le champ département
        ]);

        $employe = Employe::with('departement')->findOrFail($request->IDEmploye);
        $validatedData['IDDepartement'] = $employe->IDDepartement;

        EvolutionPerformance::where('IDEvaPerform', $id)->update($validatedData);

        return redirect()->route('evaluation.index')->with('success', 'Évaluation mise à jour avec succès');
    }

    public function destroy($id)
    {
        EvolutionPerformance::destroy($id);
        return redirect()->route('evaluation.index')->with('success', 'Évaluation supprimée avec succès');
    }
}
