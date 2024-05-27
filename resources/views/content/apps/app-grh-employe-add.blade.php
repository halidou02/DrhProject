@extends('layouts/layoutMaster')

@section('title', 'Ajouter un Employe - Apps')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/quill/typography.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/quill/katex.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/quill/editor.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/dropzone/dropzone.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/flatpickr/flatpickr.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/tagify/tagify.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/quill/katex.js')}}"></script>
<script src="{{asset('assets/vendor/libs/quill/quill.js')}}"></script>
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/dropzone/dropzone.js')}}"></script>
<script src="{{asset('assets/vendor/libs/jquery-repeater/jquery-repeater.js')}}"></script>
<script src="{{asset('assets/vendor/libs/flatpickr/flatpickr.js')}}"></script>
<script src="{{asset('assets/vendor/libs/tagify/tagify.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/app-grh-employe-add.js')}}"></script>
@endsection

@section('content')
<h4 class="py-3 mb-0">
  <span class="text-muted fw-light">Employe/</span><span class="fw-medium"> Ajouter un Employe</span>
</h4>

<div class="app-grh">

  <!-- Add employe -->
  <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">

    <div class="d-flex flex-column justify-content-center">
      <h4 class="mb-1 mt-3">Nouveau Employe</h4>

    </div>
    <div class="d-flex align-content-center flex-wrap gap-3">
      <div class="d-flex gap-3"><button class="btn btn-label-secondary">Annuler</button>
        </div>
      <button type="submit" class="btn btn-primary">Enregistrer</button>
    </div>

  </div>

  <div class="container">
    <div class="row">
        <!-- Colonne principale -->
        <div class="col-12 col-lg-8">
            <!-- Informations de l'employé -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">Formulaire Employe</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label" for="grh-employe-nom">Nom</label>
                        <input type="text" class="form-control" id="grh-employe-nom" placeholder="Nom" name="employeNom" aria-label="employe title">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="grh-employe-prenom">Prenom</label>
                        <input type="text" class="form-control" id="grh-employe-prenom" placeholder="Prenom" name="employePrenom" aria-label="employe title">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="employe-date-naissance">Date de Naissance</label>
                        <input type="date" class="form-control" id="employe-date-naissance" name="DateNaissance" aria-label="Date de Naissance">
                    </div>
                    <div class="mb-3 col-4">
                    <label class="form-label" for="employe-etat-civil">Genre</label>
                    <select id="employe-etat-civil" class="select2 form-select" data-placeholder="Genre">
                      <option value="">Homme</option>
                      <option value="size">Femme</option>
                    </select>
                  </div>
                    <div class="mb-3">
                        <label class="form-label" for="employe-adresse">Adresse</label>
                        <input type="text" class="form-control" id="employe-adresse" placeholder="Adresse" name="Adresse" aria-label="Adresse">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="employe-telephone">Numéro de Téléphone</label>
                        <input type="text" class="form-control" id="employe-telephone" placeholder="Numéro de Téléphone" name="NumeroTelephone" aria-label="Numéro de Téléphone">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="employe-email">Email</label>
                        <input type="email" class="form-control" id="employe-email" placeholder="Email" name="Email" aria-label="Email">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="employe-date-incorporation">Date d'Incorporation</label>
                        <input type="date" class="form-control" id="employe-date-incorporation" name="DateIncorporation" aria-label="Date d'Incorporation">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="employe-salaire-base">Salaire de Base</label>
                        <input type="number" class="form-control" id="employe-salaire-base" placeholder="Salaire de Base" name="SalairedeBase" aria-label="Salaire de Base">
                    </div>
                    <div class="mb-3 col-4">
                    <label class="form-label" for="employe-statut">Statut</label>
                    <select id="employe-statut" class="select2 form-select" data-placeholder="Actif">
                      <option value="">Actif</option>
                      <option value="">En mission</option>
                      <option value="size">En congé</option>
                      <option value="size">Retraité</option>
                    </select>
                  </div>
                    <div class="mb-3 col-4">
                    <label class="form-label" for="employe-etat-civil">État Civil</label>
                    <select id="employe-etat-civil" class="select2 form-select" data-placeholder="Celibataire">
                      <option value="">Celibataire</option>
                      <option value="size">Marrier</option>
                    </select>
                  </div>
                </div>
            </div>
        </div>
        <!-- Colonne secondaire -->
        <div class="col-12 col-lg-4">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">Upload Image</h5>
                </div>
                <div class="card-body">
                    <form action="/upload" class="dropzone needsclick" id="dropzone-basic">
                        <div class="dz-message needsclick">
                            <p class="fs-4 note needsclick pt-3 mb-1">Glisser et deposer votre image</p>
                            <p class="text-muted d-block fw-normal mb-2">ou</p>
                            <span class="note needsclick btn bg-label-primary d-inline" id="btnBrowse">Choisir un fichier</span>
                        </div>
                        <div class="fallback">
                            <input name="file" type="file"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
