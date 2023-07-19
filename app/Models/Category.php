<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\SluggableModelTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Contracts\DeleteableModelInterface;
use App\Traits\CastableModelTrait;
use App\Contracts\CastableModelInterface;

class Category extends Model implements DeleteableModelInterface, CastableModelInterface
{
    use CastableModelTrait;
    use SluggableModelTrait;
    use SoftDeletes;
    use HasFactory;
    protected $guarded = ['id'];
    public function getDeleteUrlAttribute(){
        return route('panel.categories.delete', ['category'=>$this->getKey(), ]);
    }
    public function get_field_castings() : array {
        return [
          'parent_id'=>null, 
        ];
    }
    public function attribute_groups(){
        return $this->belongsToMany(AttributeGroup::class, 'category_attribute_groups', 'category_id', 'attribute_group_id');
    }
    public function attribute_groups_pivot(){
        return $this->hasMany(CategoryAttributeGroup::class, 'category_id');
    }
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
    public function getIdentifierTextAttribute(){
        return 'Category '.$this->title.' with ID '.$this->getKey();
    }
    public function getAttributeGroupsManagementUrlAttribute(){
        return route('panel.categories.attribute-groups.management', ['category'=>$this->getKey()]);
    }
    
}
