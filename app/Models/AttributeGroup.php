<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Contracts\DeleteableModelInterface;
use App\Models\Attribute;
use App\Models\Category;

class AttributeGroup extends Model implements DeleteableModelInterface
{
    use HasFactory, SoftDeletes;
    protected $guarded = ['id'];
    public function categories(){
        return $this->belongsToMany(Category::class, 'category_attribute_groups', 
         'attribute_group_id', 'category_id');
    }    
    public function getDeleteUrlAttribute(){
        return route('panel.attribute-groups.delete', ['attribute_group'=>$this->getKey()]);
    }
    public function scopeFilter_category_attribute_groups($query, Category $category){
        return $query->whereHas('categories', function($query) use($category){
            $query->where('categories.id', $category->getKey());
        });
    }
    public function getAttributesManagementUrlAttribute(){
        return route('panel.attribute-groups.attributes.management', ['attribute_group'=>$this->getKey()]);
    }
    public function getNewAttributeUrlAttribute(){
        return route('panel.attribute-groups.new-attribute', ['attribute_group'=>$this->getKey()]);
    }
    public function attributes(){
        return $this->hasMany(Attribute::class, 'attribute_group_id');
    }
    public function getDisplayTypeDataAttribute(){
       return array_find(config('attributes.attribute-group-display-types'), function($d){
        return $d['value'] == $this->display_type;
       });
    }
    public function getDisplayTypeViewNameAttribute(){
        return $this->display_type_data['view-name'];
    }
    public function getDisplayTypeTitleAttribute(){
        return $this->display_type_data['title'];
    }
}
