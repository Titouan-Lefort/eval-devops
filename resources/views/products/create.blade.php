@extends('layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-white py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0 fw-bold text-primary"><i class="fas fa-plus-circle me-2"></i>Ajouter un Nouveau Produit</h4>
                    <a class="btn btn-outline-secondary btn-sm" href="{{ route('products.index') }}"> <i class="fas fa-arrow-left me-1"></i> Retour</a>
                </div>
            </div>
            <div class="card-body p-4">
                @if ($errors->any())
                    <div class="alert alert-danger shadow-sm">
                        <strong><i class="fas fa-exclamation-triangle me-2"></i>Oups !</strong> Il y a eu des problèmes avec votre saisie.<br><br>
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('products.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold">Nom</label>
                        <input type="text" name="name" class="form-control form-control-lg" placeholder="Entrez le nom du produit">
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label fw-bold">Prix</label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="number" name="price" class="form-control form-control-lg" placeholder="0.00" step="0.01">
                        </div>
                        <small class="text-muted">Le prix maximum est de 999999.99</small>
                    </div>

                    <div class="mb-4">
                        <label for="description" class="form-label fw-bold">Description</label>
                        <textarea class="form-control" style="height:150px" name="description" placeholder="Entrez la description du produit"></textarea>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary btn-lg shadow-sm"><i class="fas fa-save me-2"></i>Soumettre le Produit</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
