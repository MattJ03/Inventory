@extends('layouts.app');

@section('content')
    <div class="container">
        <h1>Product's List</h1>
        <div class="mb-4">
            <a href="{{ route('products.create') }}" class="btn btn-primary">Create New Product</a>
        </div>
        <table class="table">
            <thead>
            <tr>
            <th>Name</th>
            <th>Category</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody id="product-list">
            @foreach($prodcucts as $product)
                <tr data-id="{{ $product->id }}">
                    <td>$product->Name</td>
                    <td>$product->Category</td>
                    <td>$product->Price</td>
                    <td>
                        <a href="{{ route('products.edit') }}" class="btn btn-secondary">Edit Product</a>
                        <a href ="{{ route('products.destroy') }}" class="btn btn-secondary">Delete Product</a>
                    </td>
                </tr>
            @endforeach
                </tbody>
        </table>
    </div>
@endsection

@section('scripts')
    <script>
        document.getElementById('search-input').addEventListener('input', function() {
            const searchTerm = this.value;

            //make the request to the search input
        })
    </script>

