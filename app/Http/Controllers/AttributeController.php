<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\AttributeGroup;
use App\Models\Attribute;
use App\Http\Requests\AttributeSaveRequest;

class AttributeController extends Controller
{
    public function save_attribute(AttributeSaveRequest $req, Attribute $atmodel){
        $data = $req->validated();
        $res = $atmodel->create($data);
        if($res){
         return redirect()->to($res->attribute_group->attributes_management_url)
          ->with('success_msg', 'Attribute created');
        }
        abort(500);
    }
    public function create_attribute(AttributeGroup $attribute_group){
        return view('attributes.new-attribute', ['attribute_group'=>$attribute_group, ]);
    }
    public function manage_attributes_of_attribute_group(AttributeGroup $attribute_group){
     return view('attributes.attributes-management-of-attribute-group', [
        'attribute_group'=>$attribute_group, 'data'=>$attribute_group->attributes()->get(), 
     ]);   
    }
}
