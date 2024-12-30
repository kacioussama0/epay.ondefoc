<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Psy\Util\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::select('name','sku','image','stock','price','category_id','created_at')->orderBy('created_at',"DESC")->get();

        $headers = ['الصورة','الإسم','SKU','المخزون','السعر','التصنيف','التاريخ'];

        $rows = $products->map(function ($product) {
            return [
                "<img src='" . ($product['image'] ? asset('storage/' . $product['image']) : "https://ondefoc.dz/wp-content/uploads/2023/10/LOGO-ONDEFOC-1-1.png.webp" ). "' alt='{$product['name']}' width='80'>",
                $product['name'],
                $product['sku'],
                $product['stock'] ? $product['stock'] : 'متوفر',
                ((!empty($product['sale_price'])) ?  $product['sale_price']  : $product['price'])  .  ' د.ج',
                $product['category']['name'],
                $product['created_at']
            ];

        })->toArray();


        $actions = function ($row) {
            return '
            <a href=' . route('products.edit',$row[0]) . ' class="btn btn-outline-primary">تعديل</a>
            <a href="/delete/' . $row[0] . '" class="btn btn-primary mx-2">حذف</a>
        ';
        };


        return view('products.index', compact('rows','headers','actions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id')->toArray();

        $status = [
            'draft' => 'مسودة',
            'published' => 'منشور',
            'archived' => 'مؤرشف',
        ];

        return view('products.create',compact('categories','status'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:products,slug',
            'sku' => 'nullable|string|max:255|unique:products,sku',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0|lt:price',
            'tax_rate' => 'nullable|numeric|min:0|max:100',
            'stock' => 'nullable|integer|min:0',
            'status' => 'required|in:draft,published,archived',
        ]);

        if(empty($validatedData['slug']))  $validatedData['slug'] = \Illuminate\Support\Str::slug($validatedData['name']);


        if($request->hasFile('image')){
            $validatedData['image'] = $request->file('image')->store('products', 'public');
        }

        if(Product::create($validatedData)){
            return redirect()->route('products.index')->with('success', 'تم إنشاء المنتج بنجاح');
        }


        return redirect()->route('products.index')->with('failed', 'خطأ في إنشاء المنتج');


    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::pluck('name', 'id')->toArray();

        $status = [
            'draft' => 'مسودة',
            'published' => 'منشور',
            'archived' => 'مؤرشف',
        ];

        return view('products.edit',compact('categories','status','product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:products,slug,' . $product->id,
            'sku' => 'nullable|string|max:255|unique:products,sku,' . $product->id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0|lt:price',
            'tax_rate' => 'nullable|numeric|min:0|max:100',
            'stock' => 'nullable|integer|min:0',
            'status' => 'required|in:draft,published,archived',
        ]);

        if(empty($validatedData['slug']))  $validatedData['slug'] = \Illuminate\Support\Str::slug($validatedData['name']);


        if($request->hasFile('image')){
            Storage::delete('storage/' . $product->image);
            $validatedData['image'] = $request->file('image')->store('products', 'public');
        }

        if($product->update($validatedData)){
            return redirect()->route('products.index')->with('success', 'تم تعديل المنتج بنجاح');
        }


        return redirect()->route('products.index')->with('failed', 'خطأ في تعديل المنتج');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if($product->delete()){
            return redirect()->route('products.index')->with('success', 'تم حذف المنتج بنجاح');
        }

        return redirect()->route('products.index')->with('failed', 'خطأ في حذف المنتج');

    }
}
