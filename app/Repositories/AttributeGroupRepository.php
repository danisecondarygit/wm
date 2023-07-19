<?php
namespace App\Repositories;
use App\Repositories\Repository;
use App\Models\AttributeGroup;
use DB;

class AttributeGroupRepository extends Repository{
    public const DATA_CATEGORIES_FIELD = 'category_ids';
    public function __construct(AttributeGroup $agmodel){
        parent::__construct($agmodel);
    }
    public function create_attribute_group(array $data){
     try{
      DB::beginTransaction();
      $res = parent::create_model($data);
      if(!$res)
       te('Could not create attribute group');
      if(isset($data[static::DATA_CATEGORIES_FIELD])){
       if(!empty($data[static::DATA_CATEGORIES_FIELD])){
        $second_res = $this->sync_model_relational_data($res, 'categories', $data[static::DATA_CATEGORIES_FIELD]);
        if(!$second_res)
         tr('Could not attach categories of new attribute group');
       }
      }
      DB::commit();
      return $res; 
     }catch(\Exception $ex){
       DB::rollBack();
       log_throwable($ex);
       return false; 
     }              
    }
    public function delete_attribute_group(AttributeGroup $instance){
      $instance->categories()->detach();
      return $instance->delete(); 
    }
}