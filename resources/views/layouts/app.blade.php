<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory app</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-amber-50">
<div class="container mx-auto px-4">
    <header class="py-6">
        <h1 class="text-2xl font-bold">Inventory Management app</h1>
        <nav>
            <a href="{{ route('products.index') }}" class="mr-4">Products</a>
            <a href="{{ route('categories.index') }}" class="mr-4">Categories</a>
            <a href="{{ route('suppliers.index') }}" class="mr-4">Suppliers</a>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

</div>
</body>

</html>
