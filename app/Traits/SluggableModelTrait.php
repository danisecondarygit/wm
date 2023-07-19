<?php
namespace App\Traits;
trait SluggableModelTrait{
    public function update_slug(){
        $this->slug = create_text_slug($this->title);
    }
}