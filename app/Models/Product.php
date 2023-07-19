<?php
namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\CastableModelTrait;
use App\Contracts\CastableModelInterface;
use App\Contracts\DeleteableModelInterface;
use App\Traits\SluggableModelTrait;
use App\Models\Category;
use App\Models\ProductAttribute;
use App\Models\Attribute;

class Product extends Model implements CastableModelInterface, DeleteableModelInterface
{
    use HasFactory, SoftDeletes, CastableModelTrait;
    use SluggableModelTrait;
    protected $guarded = ['id'];
    protected static function boot(){
        parent::boot();
        static::creating(function($model){
            $model->update_slug();
            static::perform_model_castings($model);
        });
        static::updating(function($model){
            $model->update_slug();
            static::perform_model_castings($model);
        });
    }   
    /* `attributes` has conflict with attributes property of each model class */
    public function attributes_relation(){
        return $this->belongsToMany(Attribute::class, 'product_attributes', 
         'product_id', 'attribute_id');
    }
    public function getDetailsUrlAttribute(){
      return route('products.details', ['product_id'=>$this->getKey(), 'product_slug'=>$this->slug, ]);
    }
    public function scopeFilter_product_similars_or_variations($query, Product $product){
     $query->where('products.id', '<>', $product->getKey());
     if($product->can_have_similars){
      $query->whereCategoryId($product->category->getKey());
     }
     if($product->can_have_variations){
      $query->where(function($query) use($product){
       foreach($product->attributes_relation as $product_attribute){
        $query->orWhereHas('attributes_relation', function($query) use($product_attribute){
         $query->whereAttributeGroupId($product_attribute->attribute_group_id)->
          where('attributes.id', '<>', $product_attribute->getKey());
        });
       } 
      });  
     }
     return $query;
    }
    public function getCanHaveSimilarsAttribute(){
      return !is_null($this->category);
    }
    public function getCanHaveVariationsAttribute(){
      return !$this->attributes_relation->isEmpty();  
    }
    public function attributes_pivot(){
     return $this->hasMany(ProductAttribute::class, 'product_id');   
    }
    public function getEagerLoadableRelationNamesAttribute(){
      return [
        'category', 'attributes_relation.attribute_group',
      ];  
    } 
    public function getAttributesManagementUrlAttribute(){
        return route('panel.products.attributes.management', ['product'=>$this->getKey()]);
    }
    public function get_field_castings() : array {
        return [
            'price'=>0, 
            'description'=>'',
        ];
    }
    public function getDeleteUrlAttribute(){
        return route('panel.products.delete', ['product'=>$this->getKey(),]);
    }
    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
}
