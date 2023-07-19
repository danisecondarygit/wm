<?php
namespace App\Repositories;
use Illuminate\Database\Eloquent\Model;

abstract class Repository {
 protected ?Model $model = null;

 public function __construct(Model $model = null){
    $this->model = $model;
 }
 public function delete_model(Model $model){
  return $model->delete();
 } 
 public function create_model(array $data){
    return $this->model->create($data);
 } 
 public function sync_model_relational_data(Model $instance, $belongs_to_many_relation_name, 
  array $syncable_data){
   $relation = $instance->$belongs_to_many_relation_name();
   $result = $relation->sync($syncable_data);
   return $result['attached'] || $result['detached'];
 } 
}