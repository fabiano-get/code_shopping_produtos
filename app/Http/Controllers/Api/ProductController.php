<?php

namespace CodeShopping\Http\Controllers\Api;

use CodeShopping\Http\Controllers\Controller;
use CodeShopping\Http\Requests\ProductRequest;
use CodeShopping\Http\Resources\ProductResource;
use CodeShopping\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);
        return ProductResource::collection($products);
    }


    public function store(ProductRequest $request)
    {
        $product = Product::create($request->all());
        $product->refresh();
        return new ProductResource($product);
    }

    public function show(Product $product)
    {
        return new ProductResource($product);

    }

    public function update(ProductRequest $request, Product $product)
    {
        //metodo fill recebe um array com as informações que queremos atualizar
        $product->fill($request->all());
        //salva
        $product->save();
        return new ProductResource($product);

    }

    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json([],204);

    }
}
