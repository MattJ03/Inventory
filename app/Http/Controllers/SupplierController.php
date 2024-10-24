<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers = Supplier::all();
        return view('supplier.index.blade.php', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Supplier $supplier)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'contact_name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255|unique:suppliers|email',
            'phone' => 'nullable|string|max:255',
            'address' => 'nullable|text|max:255',
        ]);
         \App\Models\Supplier::create($validated);
        return redirect()->route('supplier.index.blade.php')->with('success Supplier created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier, string $id)
    {
        $supplier = \App\Models\Supplier::findOrFail($id);
        return view('supplier.show', compact('supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier, string $id)
    {
        $supplier = \App\Models\Supplier::findOrFail($id);
        return view('supplier.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supplier $supplier)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'contact_name' => 'required|string|max:255',
            'email' => 'nullable|unique:suppliers|email|max:255',
            'phone' => 'nullable|integer|digits_between:10:12',
            'address' => 'nullable|text|max:255',
        ]);

        $supplier->update($validated);
        return redirect()->route('supplier.index.blade.php')->with('success Supplier updated');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $supplier = \App\Models\Supplier::findOrFail($id);
       $supplier->delete();
       return redirect()->route('supplier.index.blade.php')->with('success Supplier deleted');
    }
}
