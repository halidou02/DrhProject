<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employe;
use App\Models\Departement;
use App\Models\Poste;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GrhEmployeController extends Controller
{

  public function getEmployesByStat(Request $request)
  {
      $statType = $request->query('statType');
      $statValue = $request->query('statValue');

      if ($statType === 'departement') {
          $employes = Employe::whereHas('departement', function ($query) use ($statValue) {
              $query->where('NomDepartement', 'LIKE', "%{$statValue}%");
          })->with('departement', 'poste')->get();
      } elseif ($statType === 'age') {
          $employes = Employe::whereRaw('YEAR(CURRENT_DATE) - YEAR(DateNaissance) = ?', [$statValue])->with('departement', 'poste')->get();
      } elseif ($statType === 'genre') {
          $employes = Employe::where('Genre', $statValue)->with('departement', 'poste')->get();
      } else {
          return response()->json([]);
      }

      return response()->json($employes);
  }


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
        return view('content.apps.app-grh-employe-list', compact('employes'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'Nom' => 'required|string|max:50',
            'Prenom' => 'required|string|max:50',
            'DateNaissance' => 'required|date',
            'Genre' => 'required|string|max:6',
            'Adresse' => 'nullable|string|max:200',
            'NumeroTelephone' => 'nullable|string|max:50',
            'Email' => 'nullable|email|max:100',
            'DateIncorporation' => 'required|date',
            'SalairedeBase' => 'nullable|integer',
            'Statut' => 'nullable|string|max:50',
            'EtatCivil' => 'nullable|string|max:50',
            'Photo' => 'nullable|image|max:2048',
            'IDDepartement' => 'required|exists:departement,IDDepartement',
            'IDPoste' => 'required|exists:poste,IDPoste',
        ]);

        if ($request->hasFile('Photo')) {
            $photo = $request->file('Photo');
            $photoName = time() . '_' . Str::slug($photo->getClientOriginalName());
            $photoPath = 'assets/photo/' . $photoName;

            $photo->move(public_path('assets/photo'), $photoName);

            $validatedData['Photo'] = $photoPath;
        }

        Employe::create($validatedData);

        return redirect()->route('employe.create')->with('success', 'Employé ajouté avec succès');
    }

    public function edit($id)
    {
        $employe = Employe::findOrFail($id);
        $departements = Departement::all();
        $postes = Poste::all();

        return view('content.apps.app-grh-employe-edit', compact('employe', 'departements', 'postes'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'Nom' => 'required|string|max:255',
            'Prenom' => 'required|string|max:255',
            'DateNaissance' => 'required|date',
            'Genre' => 'required|string|max:6',
            'Adresse' => 'required|string|max:255',
            'NumeroTelephone' => 'required|string|max:50',
            'Email' => 'required|string|email|max:100',
            'DateIncorporation' => 'required|date',
            'SalairedeBase' => 'required|integer',
            'Statut' => 'required|string|max:50',
            'EtatCivil' => 'required|string|max:50',
            'Photo' => 'nullable|image|max:2048',
            'IDDepartement' => 'required|integer',
            'IDPoste' => 'required|integer',
        ]);

        if ($request->hasFile('Photo')) {
            $photo = $request->file('Photo');
            $photoName = time() . '_' . Str::slug($photo->getClientOriginalName());
            $photoPath = 'assets/photo/' . $photoName;

            $photo->move(public_path('assets/photo'), $photoName);

            // Delete old photo if exists
            $oldPhoto = Employe::findOrFail($id)->Photo;
            if ($oldPhoto && file_exists(public_path($oldPhoto))) {
                unlink(public_path($oldPhoto));
            }

            $validatedData['Photo'] = $photoPath;
        }

        Employe::where('IDEmploye', $id)->update($validatedData);

        return redirect()->route('employe.index')->with('success', 'Employé mis à jour avec succès');
    }

    public function destroy($id)
    {
        $employe = Employe::findOrFail($id);

        // Delete photo if exists
        if ($employe->Photo && file_exists(public_path($employe->Photo))) {
            unlink(public_path($employe->Photo));
        }

        $employe->delete();
        return redirect()->route('employe.index')->with('success', 'Employé supprimé avec succès');
    }
}


  // public function index()
  // {
  //   return view('content.apps.app-grh-employe-add');
  // }


