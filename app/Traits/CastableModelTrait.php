<?php
namespace App\Traits;
use Illuminate\Database\Eloquent\Model;

trait CastableModelTrait {
    public static function perform_model_castings(Model $model){
        foreach($model->get_field_castings() as $field=>$value){
            if(empty($model->$field) || is_null($model->$field)){
              $model->$field = $value;
            }
        }
        return $model;
    }
}