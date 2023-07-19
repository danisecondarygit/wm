<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Contracts\DeleteableModelInterface;

class CategoryAttributeGroup extends Model implements DeleteableModelInterface
{
    use HasFactory;

    public function getDeleteUrlAttribute(){
        return route('panel.categories.attribute-groups.detachment', [
            'category'=>$this->category_id, 'attribute_group'=>$this->attribute_group_id, 
        ]);
    }
}
