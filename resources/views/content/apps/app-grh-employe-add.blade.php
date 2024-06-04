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
<script>
    $(document).ready(function() {
        $('.select2').select2();

        $('#Photo').change(function() {
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#photo-preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
    });
</script>
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

            <!-- Informations de l'employé -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">Formulaire Employe</h5>
                </div>
                <div class="card-body">
                <form action="{{ route('employe.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="Nom" class="form-label">Nom</label>
                <input type="text" class="form-control" id="Nom" name="Nom" required>
            </div>

            <div class="mb-3">
                <label for="Prenom" class="form-label">Prenom</label>
                <input type="text" class="form-control" id="Prenom" name="Prenom" required>
            </div>

            <div class="mb-3">
                <label for="DateNaissance" class="form-label">Date de Naissance</label>
                <input type="date" class="form-control" id="DateNaissance" name="DateNaissance" required>
            </div>

            <div class="mb-3">
                <label for="Genre" class="form-label">Genre</label>
                <select class="form-control select2" id="Genre" name="Genre" required>
                    <option value="Homme">Homme</option>
                    <option value="Femmme">Femme</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="Adresse" class="form-label">Adresse</label>
                <input type="text" class="form-control" id="Adresse" name="Adresse">
            </div>

            <div class="mb-3">
                <label for="NumeroTelephone" class="form-label">Numéro de Téléphone</label>
                <input type="text" class="form-control" id="NumeroTelephone" name="NumeroTelephone">
            </div>

            <div class="mb-3">
                <label for="Email" class="form-label">Email</label>
                <input type="email" class="form-control" id="Email" name="Email">
            </div>

            <div class="mb-3">
                <label for="DateIncorporation" class="form-label">Date d'Incorporation</label>
                <input type="date" class="form-control" id="DateIncorporation" name="DateIncorporation" required>
            </div>

            <div class="mb-3">
                <label for="SalairedeBase" class="form-label">Salaire de Base</label>
                <input type="number" class="form-control" id="SalairedeBase" name="SalairedeBase">
            </div>

            <div class="mb-3">
                <label for="Statut" class="form-label">Statut</label>
                <select class="form-control select2" id="Statut" name="Statut" required>
                    <option value="Actif">Actif</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="EtatCivil" class="form-label">État Civil</label>
                <input type="text" class="form-control" id="EtatCivil" name="EtatCivil">
            </div>

            <div class="mb-3">
                <label for="Photo" class="form-label">Photo</label>
                <input type="file" class="form-control" id="Photo" name="Photo">
                <img id="photo-preview" src="" alt="Aperçu de la photo" style="max-width: 200px; margin-top: 10px;">
            </div>

            <div class="mb-3">
                <label for="IDDepartement" class="form-label">Département</label>
                <select class="form-control select2" id="IDDepartement" name="IDDepartement" required>
                    @foreach($departements as $departement)
                        <option value="{{ $departement->IDDepartement }}">{{ $departement->NomDepartement }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="IDPoste" class="form-label">Poste</label>
                <select class="form-control select2" id="IDPoste" name="IDPoste" required>
                    @foreach($postes as $poste)
                        <option value="{{ $poste->IDPoste }}">{{ $poste->TitrePoste }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
                </div>
            </div>

        <!-- Colonne secondaire -->
        <!-- <div class="col-12 col-lg-4">
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
        </div> -->
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
