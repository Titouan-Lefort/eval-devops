@extends('layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-white py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0 fw-bold text-primary"><i class="fas fa-info-circle me-2"></i>Détails du Produit</h4>
                    <a class="btn btn-outline-secondary btn-sm" href="{{ route('products.index') }}"> <i class="fas fa-arrow-left me-1"></i> Retour</a>
                </div>
            </div>
            <div class="card-body p-5">
                <div class="text-center mb-4">
                    <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 100px; height: 100px;">
                        <i class="fas fa-box fa-3x text-secondary"></i>
                    </div>
                </div>

                <h2 class="text-center fw-bold mb-2">{{ $product->name }}</h2>
                <p class="text-center text-muted mb-4">ID Produit si tu vois ca que le test a bien tiester : #{{ $product->id }}</p>

                <hr>

                <div class="row mt-4">
                    <div class="col-md-6 mb-3">
                        <label class="fw-bold text-muted text-uppercase small">Prix</label>
                        <h3 class="text-success">${{ number_format($product->price, 2) }}</h3>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="fw-bold text-muted text-uppercase small">Créé le</label>
                    </div>
                    <div class="col-12">
                        <label class="fw-bold text-muted text-uppercase small">Description</label>
                        <p class="lead">{{ $product->description }}</p>
                    </div>
                </div>

                <div class="d-flex justify-content-center mt-4 gap-2">
                    <a class="btn btn-primary shadow-sm" href="{{ route('products.edit',$product->id) }}"><i class="fas fa-edit me-2"></i>Edit</a>
                    <form action="{{ route('products.destroy',$product->id) }}" method="POST" class="d-inline">Éditer</a>
                    <form action="{{ route('products.destroy',$product->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger shadow-sm" onclick="return confirm('Êtes-vous sûr ?')"><i class="fas fa-trash me-2"></i>Supprimer
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
