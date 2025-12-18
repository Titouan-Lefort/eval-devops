@extends('layout')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-primary">Liste des Produits</h2>
            <p class="text-muted">Gérez vos produits efficacement</p>
        </div>
        <a class="btn btn-success btn-lg shadow-sm" href="{{ route('products.create') }}">
            <i class="fas fa-plus me-2"></i> Créer un Nouveau Produit
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            <i class="fas fa-check-circle me-2"></i> {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-striped mb-0 align-middle">
                    <thead class="bg-light">
                        <tr>
                            <th class="py-3 ps-4">N°</th>
                            <th class="py-3">Nom</th>
                            <th class="py-3">Description</th>
                            <th class="py-3">Prix</th>
                            <th class="py-3 text-end pe-4" width="280px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <td class="ps-4 fw-bold text-muted">#{{ $product->id }}</td>
                            <td class="fw-bold">{{ $product->name }}</td>
                            <td>{{ Str::limit($product->description, 50) }}</td>
                            <td><span class="badge bg-success rounded-pill">${{ number_format($product->price, 2) }}</span></td>
                            <td class="text-end pe-4">
                                <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                                    <a class="btn btn-info btn-sm text-white shadow-sm" href="{{ route('products.show',$product->id) }}" title="Voir"><i class="fas fa-eye"></i></a>
                                    <a class="btn btn-primary btn-sm shadow-sm" href="{{ route('products.edit',$product->id) }}" title="Éditer"><i class="fas fa-edit"></i></a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm shadow-sm" onclick="return confirm('Êtes-vous sûr ?')" title="Supprimer"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @if($products->isEmpty())
        <div class="text-center py-5">
            <img src="https://cdn-icons-png.flaticon.com/512/4076/4076432.png" alt="No data" style="width: 100px; opacity: 0.5;">
            <p class="mt-3 text-muted">Aucun produit trouvé. Commencez par en créer un !</p>
        </div>
    @endif
@endsection
