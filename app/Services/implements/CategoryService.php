<?php
namespace App\Services\implements;

use App\Repository\ICategoryService;
use App\Repository\ICategory;

class CategoryService implements ICategoryService
{
    protected ICategory $categoryRepository;

    public function __construct( ICategory $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getAllCategories()
    {
        return $this->categoryRepository->getAllCategories();
    }

    public function getCategoryById($id)
    {
        return $this->categoryRepository->getCategoryById($id);
    }

    public function createCategory(array $data)
    {
        return $this->categoryRepository->createCategory($data);
    }

    public function updateCategory($id, array $data)
    {
        return $this->categoryRepository->updateCategory($id, $data);
    }

    public function deleteCategory($id)
    {
        return $this->categoryRepository->deleteCategory($id);
    }

}
