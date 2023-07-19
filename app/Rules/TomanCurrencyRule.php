<?php
namespace App\Rules;
use Illuminate\Contracts\Validation\Rule;

class TomanCurrencyRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    private $min;
    private $max;

    public function __construct($min = 0, $max = 0)
    {
        if(!is_null($min)){
            $this->min = $min;
        }else{
            $this->min = config('app.min-acceptable-toman-currency-amount');
        }
        if(!is_null($max)){
            $this->max = $max;
        }else{
            $this->max = config('app.max-acceptable-toman-currency-amount');
        }
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $value = isint($value);
        if($value===false)
         return false;
        if(($value < $this->min) || ($value > $this->max)){
            return false;
        }
        return true; 
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        $min = $this->min; 
        $max = $this->max;
        return "Please enter numeric integer value between ${min} and ${max}";
    }
}
