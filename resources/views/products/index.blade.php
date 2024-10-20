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

            // Make a request to the search endpoint
            fetch(`/products/search?query=${searchTerm}`)
                .then(response => response.json())
                .then(data => {
                    const productTable = document.getElementById('product-table').getElementsByTagName('tbody')[0];
                    productTable.innerHTML = ''; // Clear existing rows

                    data.forEach(product => {
                        const row = `<tr>
                                        <td class="border border-gray-200">${product.name}</td>
                                        <td class="border border-gray-200">$${product.price}</td>
                                        <td class="border border-gray-200">
                                            <a href="{{ route('products.edit', '${product.id}') }}" class="mr-2">Edit</a>
                                            <form action="{{ route('products.destroy', '${product.id}') }}" method="POST" style="display:inline;">
                                                @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>`;
                        productTable.innerHTML += row; // Append new row
                    });
                })
                .catch(error => console.error('Error fetching products:', error));
        });
    </script>
@endsection
