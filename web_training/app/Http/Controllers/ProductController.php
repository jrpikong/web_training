<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    //
    public function __construct(Product $product,ProductCategory $productCategory)
    {
        $this->product_model = $product;
        $this->product_category_model = $productCategory;
    }


    public function index()
    {
        $products = $this->product_model->with('product_category')->get();
        return view('admin.products.index',compact('products'));
    }

    public function add()
    {
        return view('admin.products.form_add');
    }

    public function store(Request $request)
    {
        Log::info($request);
        $product = new Product();
        $product->product_name = $request->input('product_name');
        $product->category_id = $request->input('product_category');
        $product->price = $request->input('price');
        $product->sort_descriptions = $request->input('sort_descriptions');
        $product->descriptions = $request->input('descriptions');
        $product->spesifications =$request->input('spesifications');
        $product->save();

        $productImages = $request->file('productImages');
        foreach ($productImages as $key => $productImage) {
            $product->addMedia($productImage)->toMediaCollection('product_images');
        }

        $productTecnologyImages = $request->file('productTecnologyImages');
        foreach ($productTecnologyImages as $key => $productTecnologyImage) {
            $product->addMedia($productTecnologyImage)->toMediaCollection('product_tecnology_images');
        }

        if(!$product){
            return response()->json([
                'status' => '04',
                'message' => 'Insert Failed',
                'data' => $product,
            ]);
        }
        return response()->json([
            'status' => '00',
            'message' => 'Insert Success',
            'data' => $product,
        ]);
    }

    public function getCategories()
    {
        $categories = $this->product_category_model->all();

        return response()->json([
            'status' => '00',
            'message' => 'All Categories',
            'data' => $categories,
        ],200);
    }


    /*FRONT END =================*/

    public function getAll()
    {
        $products = $this->product_model->with('product_category')->paginate(12);
        return view('products', compact('products'));
    }

    public function getDetailProduct($id)
    {
        $product = $this->product_model->with('product_category')->findOrFail($id);
        $product_images = $product->getMedia('product_images');
        $product_tecnology_images = $product->getMedia('product_tecnology_images');
        return view('product_detail', compact('product','product_images','product_tecnology_images'));
    }

}
