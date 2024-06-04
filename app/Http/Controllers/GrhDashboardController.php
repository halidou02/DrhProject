<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employe;
use App\Models\Conge;
use App\Models\Departement;
use Carbon\Carbon;

class GrhDashboardController extends Controller
{
  public function index()
  {
    // Effectif total de l'entreprise
    $effectifTotal = Employe::count();
    $TotalDepartement = Departement::count();

    $repartitionGenre = Employe::selectRaw('Genre, COUNT(*) as count')
    ->groupBy('Genre')
    ->get();

// Répartition par âge
$repartitionAge = Employe::selectRaw('YEAR(CURRENT_DATE) - YEAR(DateNaissance) as age, COUNT(*) as count')
    ->groupBy('age')
    ->get();

// Répartition par département
$repartitionDepartement = Departement::withCount('employes')->get();

    // Rotation du personnel (pour l'année en cours)
    $debutAnnee = Carbon::now()->startOfYear();
    $departures = Employe::where('Statut', 'quitte')->whereBetween('DateIncorporation', [$debutAnnee, Carbon::now()])->count();
    $rotationPersonnel = ($departures / $effectifTotal) * 100;

    // Taux d'absentéisme
    $joursAbsence = Conge::whereBetween('dateDebutConge', [$debutAnnee, Carbon::now()])->count();
    $joursTravailAnnee = $effectifTotal * 260; // Supposons 260 jours de travail par an
    $tauxAbsenteisme = ($joursAbsence / $joursTravailAnnee) * 100;

    // Coût total de la main-d'œuvre
    $coutTotal = Employe::sum('SalairedeBase');

    // Durée moyenne de recrutement (exemple fictif, à adapter)
    $dureeRecrutement = 30; // A calculer selon vos données
   // Formater les valeurs
   $rotationPersonnel = number_format($rotationPersonnel, 2) . '%';
   $tauxAbsenteisme = number_format($tauxAbsenteisme, 2) . '%';
   $coutTotal = number_format($coutTotal, 2, ',', ' ') . ' DA';
    // Obtenir tous les employés
    $employes = Employe::with('departement')->get();

    return view('content.dashboard.GrhDashboard', compact(
      'effectifTotal', 'TotalDepartement', 'repartitionGenre', 'repartitionAge',
      'repartitionDepartement', 'rotationPersonnel', 'tauxAbsenteisme',
      'coutTotal', 'dureeRecrutement', 'employes'
    ));
  }
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
        } else {
            return response()->json([]);
        }

        return response()->json($employes);
    }
}
