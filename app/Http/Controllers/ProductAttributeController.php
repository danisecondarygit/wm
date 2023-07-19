<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Attribute;
use App\Models\ProductAttribute;

class ProductAttributeController extends Controller
{
    public function manage_attributes_of_product(Product $product, Attribute $atmodel){
        $view_data = ['product'=>$product];
        $view = 'attributes.attributes-management-of-product';
        if(is_null($product->category)){
            return view($view, $view_data);
        }
        $view_data['attributes'] = $atmodel->with($atmodel->eager_loadable_relation_names)
         ->filter_category_attributes($product->category)->get();
        $view_data['data'] = $product->attributes_pivot;
        return view(
            $view, $view_data, 
        );
    }
    public function attach_attribute_to_product($product_id, $attribute_id){
     $instance = ProductAttribute::whereProductId($product_id)->whereAttributeId($attribute_id)->first();
     if($instance)
      return ['flag'=>false, 'msg'=>'Resource already exists'];
     $res = ProductAttribute::create(['product_id'=>$product_id, 'attribute_id'=>$attribute_id]); 
     if($res){
        return redirect()->back()->with('success_msg', 'Attribute attached to product');
     }
     abort(500);
    }
    public function detach_attribute_from_product($product_id, $attribute_id){
        $res = ProductAttribute::whereProductId($product_id)->whereAttributeId($attribute_id)->delete();
        if($res == 1)
        {   
          return redirect()->back()->with('success_msg', 'Attribute detached from product');  
        }
        return [
            'flag'=>false, 'msg'=>'Resource doesnt exist',
        ];
    }   
}
