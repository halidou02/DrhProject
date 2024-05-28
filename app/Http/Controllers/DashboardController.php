<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employe;
use App\Models\Conge;
use App\Models\Departement;
use App\Models\HistoriqueSalaire;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Effectif total de l'entreprise
        $effectifTotal = Employe::count();

        // Répartition par genre
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

        return view('content.dashboard.index', compact('effectifTotal', 'repartitionGenre', 'repartitionAge', 'repartitionDepartement', 'rotationPersonnel', 'tauxAbsenteisme', 'coutTotal', 'dureeRecrutement'));
    }
}
