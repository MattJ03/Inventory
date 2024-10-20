@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold mb-6">Product's List</h1>
        <div class="mb-4">
            <a href="{{ route('products.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Create New Product</a>
        </div>
        <table class="min-w-full bg-white border border-gray-200">
            <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2 border-b">Name</th>
                <th class="px-4 py-2 border-b">Category</th>
                <th class="px-4 py-2 border-b">Price</th>
                <th class="px-4 py-2 border-b">Actions</th>
            </tr>
            </thead>
            <tbody id="product-list">
            @foreach($products as $product)
                <tr data-id="{{ $product->id }}" class="hover:bg-gray-100">
                    <td class="px-4 py-2 border-b">{{ $product->name }}</td>
                    <td class="px-4 py-2 border-b">{{ $product->category }}</td>
                    <td class="px-4 py-2 border-b">${{ $product->price }}</td>
                    <td class="px-4 py-2 border-b">
                        <a href="{{ route('products.edit', $product->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white py-1 px-2 rounded">Edit</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white py-1 px-2 rounded">Delete</button>
                        </form>
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
