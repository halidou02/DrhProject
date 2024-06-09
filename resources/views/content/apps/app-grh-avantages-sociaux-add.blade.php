@extends('layouts/layoutMaster')

@section('title', 'grh Avantage Social Add - Apps')

@section('vendor-style')
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
@endsection

@section('vendor-script')
<script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
@endsection

@section('page-script')
<script>
    $(document).ready(function() {
        $('.select2').select2();

        // Automatically set prime based on selected advantage type
        $('#IDTypeAvantage').change(function() {
            let prime = $(this).find(':selected').data('prime');
            $('#prime').val(prime);
        });
    });
</script>
@endsection

@section('content')
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">Avantage Social /</span> Ajouter
</h4>

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Ajouter Avantage Social</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('avantages_sociaux.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="IDTypeAvantage" class="form-label">Type d'Avantage Social</label>
                            <select class="form-control select2" id="IDTypeAvantage" name="IDTypeAvantage" required>
                                <option value="">Sélectionner un type d'avantage social</option>
                                @foreach ($typesAvantages as $type)
                                <option value="{{ $type->IDTypeAvantage }}" data-prime="{{ $type->Prime }}">{{ $type->NomTypeAvantage }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="DescriptionAvantageSocial" class="form-label">Description de l'Avantage Social</label>
                            <textarea class="form-control" id="DescriptionAvantageSocial" name="DescriptionAvantageSocial" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="IDEmploye" class="form-label">Employé</label>
                            <select class="form-control select2" id="IDEmploye" name="IDEmploye" required>
                                <option value="">Sélectionner un employé</option>
                                @foreach ($employes as $employe)
                                <option value="{{ $employe->IDEmploye }}">{{ $employe->Nom }} {{ $employe->Prenom }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="prime" class="form-label">Prime</label>
                            <input type="number" class="form-control" id="prime" name="prime" readonly>
                        </div>
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
