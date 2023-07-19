<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\AttributeGroupSaveRequest;
use App\Repositories\AttributeGroupRepository;
use App\Models\AttributeGroup;

class AttributeGroupController extends Controller
{
    public function create_attribute_group(Category $cmodel){
        return view('attribute-groups.new-attribute-group', [
            'categories'=>$cmodel->get()
        ]);
    }
    public function manage(AttributeGroup $agmodel){
        return view('attribute-groups.management', ['data'=>$agmodel->get()]);
    }
    public function save_attribute_group(AttributeGroupSaveRequest $req, 
     AttributeGroupRepository $agrepo){
        $data = $req->validated();
        $res = $agrepo->create_attribute_group($data);
        if($res){
           return redirect()->route('panel.attribute-groups.management')->
            with('success_msg', 'Attribute group created'); 
        }
        return abort(500);
    }
    public function delete_attribute_group(AttributeGroup $attribute_group, AttributeGroupRepository $agrepo){
        $res = $agrepo->delete_attribute_group($attribute_group);
        return redirect()->back()->with('success_msg', 'Attribute group deleted');
    }
}
