<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorecategoryRequest;
use App\Http\Requests\UpdatecategoryRequest;

use App\Models\category;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          $categories=category::orderby('id','desc')->paginate(2);
          return view('back.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        
        return view('back.category.create');
    }
 

    /**
     * Store a newly created res storage.
     */
    public function store(Request $request)
    {
        //insérer la categorie dans la table categorie

        $validateData=$request->validate([
            'name'=>'required|string|max:255',
             'description'=>'string|nullable',
             'isActive'=>'required|boolean'
        ]);
          
         category::create($validateData);
          return  redirect()->route('category.index')->with('success','la catégorie a été ajoutée avec succès');

    }

    /**
     * Display the specified resource.
     */
    public function show(category $category)
    {
        //
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(category $category)
    {
         return view('back.category.create', compact('category'));

    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, category $category)
    {
         $request->validate([
             'name'=>'required|string|max:255',
              'description'=>'string|nullable',
              'isActive'=>'required|boolean'
         ]);
         
        $category->update($request->all());
        return redirect()->route('category.index')->with('success','catégorie modifiée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(category $category)
    { 
          $category->delete();
          return back()->with('success','categorie supprimée avec succès');
    }
}

