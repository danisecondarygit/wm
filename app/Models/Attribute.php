<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\AttributeGroup;
use App\Models\Category;

class Attribute extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = ['id'];
    
    public function attribute_group(){
        return $this->belongsTo(AttributeGroup::class, 'attribute_group_id');
    }
    public function getEagerLoadableRelationNamesAttribute(){
        return [
            'attribute_group', 
        ];
    }
    public function scopeFilter_category_attributes($query, Category $category){
        return $query->whereHas('attribute_group', function($query) use($category){
            $query->filter_category_attribute_groups($category);
        }); 
    }
}
