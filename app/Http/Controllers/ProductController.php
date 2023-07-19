<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\ProductSaveRequest;

class ProductController extends Controller
{
    public function create_product(Category $cmodel){
     return view('products.new-product', [
        'categories'=>$cmodel->get(), 
     ]);
    }
    public function search_products(Product $pmodel){
        return view('products.products-search', [
            'data'=>$pmodel->with($pmodel->eager_loadable_relation_names)->latest()->get()
        ]);
    }
    public function manage_products(Product $pmodel){
        return view('products.management', ['data'=>$pmodel->
         with($pmodel->eager_loadable_relation_names)->get()]);
    }
    public function save_product(ProductSaveRequest $req, Product $pmodel){
     $data = $req->validated();
     $res = $pmodel->create($data);
     if($res){
        return redirect()->route('panel.products.management')->
         with('success_msg', 'Product created');
     }
     abort(500);
    }
    public function show_product_details($product_id, $product_slug, Product $pmodel){
        /* Get products */
        $product = $pmodel->with($pmodel->eager_loadable_relation_names)
         ->whereId($product_id)->whereSlug($product_slug)->firstOrFail();
        /* Get similar products or variations */
        $similars_or_variations_query = $product->filter_product_similars_or_variations($product);
        $similars_or_variations = $similars_or_variations_query->
         with($product->eager_loadable_relation_names)->latest()->get();
        return view('products.product-details', ['product'=>$product, 
         'similars_or_variations'=>$similars_or_variations, ]);
    }
    public function delete_product(Product $product){
        $res = $product->delete();
        if($res){
         return redirect()->back()->with('success_msg', 'Product deleted');
        }
        return abort(500);
    }
}