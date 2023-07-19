<?php
namespace App\Repositories;
use App\Models\Category;
use App\Repositories\Repository;
class CategoryRepository extends Repository{
 public function __construct(){
    parent::__construct(null);
 }
 public function delete_category(Category $category){
  $category->attribute_groups()->detach();
  $res = $this->delete_model($category);
  return $res;
 } 
}