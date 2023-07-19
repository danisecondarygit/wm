<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\AttributeGroup;
use App\Models\CategoryAttributeGroup;

class CategoryAttributeGroupController extends Controller
{
    public function manage_attribute_groups_of_category(Category $category, AttributeGroup $agmodel){
        return view('attribute-groups.attribute-groups-management-of-category', [
            'data'=>$category->attribute_groups_pivot, 'attribute_groups'=>$agmodel->get(),
            'category'=>$category, 
        ]);
    }
    public function attach_attribute_group_to_category(Category $category, AttributeGroup $attribute_group){
        $category->attribute_groups()->attach($attribute_group->getKey());
        return redirect()->back()->with('success_msg', 'Attribute group attached to category');
    }
    public function detach_attribute_group_from_category($category_id, $attribute_group_id){
        $pivot_instance = CategoryAttributeGroup::whereCategoryId($category_id)->whereAttributeGroupId($attribute_group_id)
         ->firstOrFail();
        $pivot_instance->delete();
        return redirect()->back()->with('success_msg', 'Attribute group detached from category');
    }
}
