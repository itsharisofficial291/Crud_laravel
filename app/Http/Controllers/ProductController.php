<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\c_products;

class ProductController extends Controller
{
    public function index()
{
    $products = c_products::paginate(); // Paginate with 10 items per page
    return view('product.index', compact('products'));
}

    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        // Validate the request data if needed
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        
        // Upload Image
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('assets/img/'), $imageName);
    
        // Create new instance of Product model
        $product = new c_products;
    
        // Fill product details
        $product->name = $request->name;
        $product->description = $request->description;
        $product->image = $imageName; // Assign the image name, not $request->$imageName
    
        // Handle image upload if necessary
        // $product->image = $request->file('image')->store('assets/img/');
    
        // Save the product
        $product->save();
    
        // Redirect back or to any other route as needed
        return back()->withSuccess('Product Successfully Created!');
    }
    public function update(Request $request, $id)
{
    // Validate the request data if needed
    $request->validate([
        'name' => 'required',
        'description' => 'required',
        'image' => 'nullable|mimes:png,jpeg,jpg,webp,gif|max:2000', // Allow null or valid image types
    ]);

    // Find the product by ID
    $product = c_products::findOrFail($id);

    // Update product details
    $product->name = $request->name;
    $product->description = $request->description;

    // Check if a new image is uploaded
    if ($request->hasFile('image')) {
        // Upload Image
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('assets/img/'), $imageName);
        $product->image = $imageName;
    }

    // Save the product
    $product->save();

    // Redirect back or to any other route as needed
    return redirect()->route('product.index')->withSuccess('Product Successfully Updated!');
}


    public function edit($id)
    {
        $product = c_products::findOrFail($id); // Find the product by ID
        return view('product.edit', ['product' => $product]);
    }
    public function destroy($id)
    {
        $product = c_products::findOrFail($id); // Find the product by ID
        $product->delete(); // Delete the product

        return redirect()->route('product.index')->withSuccess('Product Successfully Deleted!');
    }
    
    public function show($id)
{
    $product = c_products::findOrFail($id); // Find the product by ID
    return view('product.show', ['product' => $product]);
}

    
}