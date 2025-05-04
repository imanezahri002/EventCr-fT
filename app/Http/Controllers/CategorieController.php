<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Http\Requests\StoreCategorieRequest;
use App\Http\Requests\UpdateCategorieRequest;
use App\Repository\ICategory;

use App\Repository\ICategoryService;
use Illuminate\Contracts\Cache\Store;

class CategorieController extends Controller
{
   private ICategory $categoryService;


    public function __construct(ICategory $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $categories=$this->categoryService->getAllCategories();

        return view('Admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategorieRequest $request)
    {

        $validate = $request->validated();
        $this->categoryService->createCategory($validate);
        return redirect()->back()->with('success', 'Catégorie ajoutée avec succès !');

        // Categorie::create([
        //     'nom' => $request->category_name,
        // ]);
        // return redirect()->back()->with('success', 'Catégorie ajoutée avec succès !');
    }




    /**
     * Display the specified resource.
     */
    public function show(Categorie $categorie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categorie $categorie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategorieRequest $request, Categorie $categorie)
    {

        $validate = $request->validated();
        $this->categoryService->updateCategory($categorie->id,$validate);
        return redirect()->back()->with('success', 'Catégorie modifiée avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categorie $categorie)
    {
        $this->categoryService->deleteCategory($categorie->id);
        return redirect()->back()->with('success', 'Catégorie supprimée avec succès !');
    }
}
