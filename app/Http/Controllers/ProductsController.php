<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Http\Requests\AdminProductRequest;
use CodeDelivery\Repositories\CategoryRepository;
use CodeDelivery\Repositories\ProductRepository;
use CodeDelivery\Http\Requests;

class ProductsController extends Controller
{

    private $productRepository;
    private $categoryRepository;

    public function __construct(ProductRepository $productRepository, CategoryRepository $categoryRepository)
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $products = $this->productRepository->paginate(5);

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = $this->categoryRepository->lists('name', 'id');
        return view('admin.products.create', compact('categories'));
    }

    public function store(AdminProductRequest $request)
    {
        $input = $request->all();
        
        $this->productRepository->create($input);

        return redirect()->route('admin.products.index');
    }
    
    public function edit($id){
        $product = $this->productRepository->find($id);
        $categories = $this->categoryRepository->lists('name', 'id');
        
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(AdminProductRequest $request, $id){
        $input = $request->all();
        $this->productRepository->update($input, $id);
        return redirect()->route('admin.products.index');
    }

    public function destroy($id){
        $this->productRepository->delete($id);
        return redirect()->route('admin.products.index');
    }
}
