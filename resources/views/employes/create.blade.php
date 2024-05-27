<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un employé</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="container">
    <h1>Ajouter un employé</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('employes.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="IDDepartement">Département</label>
            <input type="text" class="form-control" id="IDDepartement" name="IDDepartement" required>
        </div>
        <div class="form-group">
            <label for="IDPoste">Poste</label>
            <input type="text" class="form-control" id="IDPoste" name="IDPoste" required>
        </div>
        <div class="form-group">
            <label for="Prenom">Prénom</label>
            <input type="text" class="form-control" id="Prenom" name="Prenom" required>
        </div>
        <div class="form-group">
            <label for="Nom">Nom</label>
            <input type="text" class="form-control" id="Nom" name="Nom" required>
        </div>
        <div class="form-group">
            <label for="DateNaissance">Date de naissance</label>
            <input type="date" class="form-control" id="DateNaissance" name="DateNaissance" required>
        </div>
        <div class="form-group">
            <label for="Genre">Genre</label>
            <select class="form-control" id="Genre" name="Genre" required>
                <option value="M">Masculin</option>
                <option value="F">Féminin</option>
            </select>
        </div>
        <div class="form-group">
            <label for="Adresse">Adresse</label>
            <input type="text" class="form-control" id="Adresse" name="Adresse" required>
        </div>
        <div class="form-group">
            <label for="NumeroTelephone">Numéro de téléphone</label>
            <input type="text" class="form-control" id="NumeroTelephone" name="NumeroTelephone" required>
        </div>
        <div class="form-group">
            <label for="Email">Email</label>
            <input type="email" class="form-control" id="Email" name="Email" required>
        </div>
        <div class="form-group">
            <label for="DateIncorporation">Date d'incorporation</label>
            <input type="date" class="form-control" id="DateIncorporation" name="DateIncorporation" required>
        </div>
        <div class="form-group">
            <label for="SalairedeBase">Salaire de base</label>
            <input type="number" class="form-control" id="SalairedeBase" name="SalairedeBase" required>
        </div>
        <div class="form-group">
            <label for="Statut">Statut</label>
            <input type="text" class="form-control" id="Statut" name="Statut" required>
        </div>
        <div class="form-group">
            <label for="EtatCivil">État civil</label>
            <input type="text" class="form-control" id="EtatCivil" name="EtatCivil" required>
        </div>
        <div class="form-group">
            <label for="Photo">Photo (URL)</label>
            <input type="text" class="form-control" id="Photo" name="Photo">
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
