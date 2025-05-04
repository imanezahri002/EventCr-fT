<?php
namespace App\Repository\implements;

use App\Models\Categorie;
use App\Repository\ICategory;

class CategoryRepository implements ICategory
{


    public function getAllCategories()
    {
        return Categorie::paginate(10);
    }

    public function getCategoryById($id)
    {
        return Categorie::find($id);
    }

    public function createCategory(array $data)
    {
        return Categorie::create([
            'nom'=>$data['category_name'],
        ]);
    }

    public function updateCategory($id, array $data)
    {
        
        $category = Categorie::find($id);
        $category->update([
            'nom' => $data['category_name'],
        ]);
        return $category;
    }

    public function deleteCategory($id)
    {
        $category = Categorie::find($id);
        return $category->delete();
    }
}
