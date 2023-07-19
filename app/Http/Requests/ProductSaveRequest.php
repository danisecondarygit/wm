<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use App\Rules\TomanCurrencyRule;

class ProductSaveRequest extends FormRequest
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
        return [
            'title'=>['required', 'max:255'],
            'price'=>['nullable', new TomanCurrencyRule(0, config('app.max-acceptable-toman-currency'))],
            'category_id'=>['nullable', 'exists:categories,id'],
            'description'=>['nullable'], 
        ];
    }
}
