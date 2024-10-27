<?php

namespace App\Http\Controllers;

use App\Models\products;
use App\Models\ProductDetails;
use App\Models\category;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products=Products::get();
        return view('admin.product.index', compact('products'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        $categories=Category::whereNotNull('category_id')->get();
        return view('admin.product.add',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'name' => $request->name,
            'category_id' => $request->category_id,
            'price' => $request->price,
        ];
    
        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = date('dmY').time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('/uploads'), $fileName);
            $data['image'] = $fileName;
        }
    
        // Create new product
        $create = Products::create($data);
        return redirect()->route('product.create')->with('success', 'Product created successfully!');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Category $category)
    {
        $id = $request->id;
        $product = Products::findOrFail($id);
        $categories = Category::whereNotNull('category_id')->get();
        return view('admin.product.edit', compact('product', 'categories'));
    }
    

    /**
     * Update the specified resource in storage.
     */
public function update(Request $request, Products $product)
{
    // Validate the incoming request
    $request->validate([
        'name' => 'required|string|max:255',
        'category_id' => 'required|exists:categories,id',
        'price' => 'required|numeric',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    // Prepare the data for updating the product
    $data = [
        'name' => $request->name,
        'category_id' => $request->category_id,
        'price' => $request->price,
    ];

    // Handle image upload if an image is provided
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $fileName = date('dmY') . time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('/uploads'), $fileName);
        $data['image'] = $fileName;
    }

    // Update the product with the provided data
    $product->update($data);

    // Redirect to the product list page with a success message
    return redirect()->route('product.list')->with('success', 'Product updated successfully!');
}

public function destroy(Request $request, Products $product)
{
    // Check if the product exists and delete it
    if ($product) {
        $product->delete();
        return response()->json('success');
    } else {
        return response()->json(['error' => 'Product not found'], 404);
    }
}
public function extraDetails(Request $request)
{
    $id = $request->id;
    // Retrieve the product with its related details
    $product = Products::where('id', $id)->with('productDetails')->first();
    
    return view('admin.product.extraDetails', compact('id', 'product'));
}

public function extraDetailsStore(Request $request)//, Products $product)
{
    $id = $request->id;
    $data = array(
        'title' => $request->title,
        'product_id' => $id,
        'total_items' => $request->total_items,
        'description' => $request->description
    );
    $details = ProductDetails::updateOrCreate(
        ['product_id' => $id],
        $data
        );
    return redirect()->route('product.list');
}

}