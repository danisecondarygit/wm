<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use App\Repositories\AttributeGroupRepository;

class AttributeGroupSaveRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return 1;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $attribute_group_display_type_values = array_map(function($d){
            return $d['value'];
        }, config('attributes.attribute-group-display-types'));
        return [
            'title'=>['required', 'max:255'],
            'display_text'=>['required', 'max:255'],
            AttributeGroupRepository::DATA_CATEGORIES_FIELD=>['nullable', 'array',],
            'display_type'=>['required', 'in:'.implode(',', $attribute_group_display_type_values)]
        ];
    }
}
