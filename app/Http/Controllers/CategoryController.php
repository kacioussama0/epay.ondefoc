<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::select('id','name','slug','created_at')->orderBy('created_at',"DESC")->get();

        $headers = ['#','الإسم','الإسم اللطيف','التاريخ'];

        $rows = $categories->map(function ($category) {
            return [
                $category['id'],
                $category['name'],
                $category['slug'],
                $category['created_at'],
            ];

        })->toArray();


        $actions = function ($row) {
            return '
            <a href=' . route('categories.edit',$row[0]) . ' class="btn btn-outline-primary">تعديل</a>
            <a href="/delete/' . $row[0] . '" class="btn btn-primary mx-2">حذف</a>
        ';
        };


        return view('categories.index', compact('rows','headers','actions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:categories,slug',
        ]);

        if(empty($validatedData['slug']))  $validatedData['slug'] = \Illuminate\Support\Str::slug($validatedData['name']);
        $validatedData['user_id'] = auth()->id();


        if(Category::create($validatedData)){
            return redirect()->route('categories.index')->with('success', 'تم إنشاء التصنيف بنجاح');
        }


        return redirect()->route('categories.index')->with('failed', 'خطأ في إنشاء التصنيف');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:categories,slug',
        ]);

        if(empty($validatedData['slug'])) $validatedData['slug'] = \Illuminate\Support\Str::slug($validatedData['name']);
        $validatedData['user_id'] = auth()->id();

        if($category->update($validatedData)){
            return redirect()->route('categories.index')->with('success', 'تم تعديل التصنيف بنجاح');
        }


        return redirect()->route('categories.index')->with('failed', 'خطأ في تعديل التصنيف');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
