@extends('layouts.app')


@section('content')

    <div class="container mx-auto">
        <h1 class="mb-4 text-3xl font-bold"> {{ $product->name }}</h1>

        <div class="mx-auto">
            <h2 class="mb-4 text-2xl font-bold">Product Details</h2>

        </div>

    <!--Category details-->
        <div class="mx-auto">
            <span class="font-bold text-2xl text-gray-700">Category</span>
            <span class="font-bold text-2xl text-gray-700"> {{ $category->name }}</span>
        </div>

        <div class="mx-auto">
            <span class="font-bold text-2xl text-gray-700">Supplier</span>
            <span class="font-bold text-2xl text-gray-700"> {{ $supplier->name }}</span>
        </div>

        <div class="mx-auto">
            <span class="font-bold text-2xl text-gray-700">Price</span>
            <span class="font-bold text-gray-700 text-2xl"> {{$price->name}}</span>
        </div>

        <div class="mx-auto text-2xl">
            <a href="{{ route('product.index') }}" class="bg-amber-800 hover:bg-red-500">
                Back to Product List
            </a>
        </div>

    </div>
@endsection
