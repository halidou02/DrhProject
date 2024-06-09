<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employe;
use App\Models\Conge;
use App\Models\Departement;
use App\Models\EvolutionPerformance;
use Carbon\Carbon;

class GrhDashboardController extends Controller
{
    public function index(Request $request)
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

        $laborCostData = [
          'labels' => ['Salaires', 'Avantages', 'Bonus', 'Autres'],
          'data' => [30000, 15000, 10000, 5000]
        ];

        $laborRotationData = [
            'departures' => $departures,
            'effectifTotal' => $effectifTotal
        ];

        $evolutionData = [
          'categories' => ['7/12', '8/12', '9/12', '10/12', '11/12', '12/12', '13/12', '14/12', '15/12', '16/12', '17/12', '18/12', '19/12', '20/12', '21/12'],
          'data' => [280, 200, 220, 180, 270, 250, 70, 90, 200, 150, 160, 100, 150, 100, 50]
        ];

        $absenteeismData = [
          'categories' => ['7/12', '8/12', '9/12', '10/12', '11/12', '12/12', '13/12', '14/12', '15/12', '16/12', '17/12', '18/12', '19/12', '20/12'],
          'data' => [100, 120, 90, 170, 130, 160, 140, 240, 220, 180, 270, 280, 375]
        ];

        $dureeRecrutement = 30; // Example duration
        // Coût total de la main-d'œuvre
        $coutTotal = Employe::sum('SalairedeBase');

        // Formater les valeurs
        $rotationPersonnel = number_format($rotationPersonnel, 2) . '%';
        $tauxAbsenteisme = number_format($tauxAbsenteisme, 2) . '%';
        $coutTotal = number_format($coutTotal, 2, ',', ' ') . ' DA';

        // Obtenir tous les employés
        $employes = Employe::with('departement')->get();

        // Récupérer les paramètres de mois et d'année
        $selectedMonth = $request->input('month', Carbon::now()->month);
        $selectedYear = $request->input('year', Carbon::now()->year);

        // Récupérer les départements ayant les meilleurs scores aux évaluations mensuelles
        $bestDepartments = EvolutionPerformance::select('Departement')
            ->selectRaw('AVG(ResultEvaluat) as avg_score')
            ->whereMonth('DateEvaluat', $selectedMonth)
            ->whereYear('DateEvaluat', $selectedYear)
            ->groupBy('Departement')
            ->orderBy('avg_score', 'DESC')
            ->take(5)
            ->get();

        return view('content.dashboard.GrhDashboard', compact(
            'effectifTotal', 'TotalDepartement', 'repartitionGenre', 'repartitionAge',
            'repartitionDepartement', 'rotationPersonnel', 'tauxAbsenteisme',
            'coutTotal', 'employes', 'laborCostData', 'laborRotationData', 'evolutionData', 'absenteeismData', 'bestDepartments', 'selectedMonth', 'selectedYear'
        ));
    }
}
