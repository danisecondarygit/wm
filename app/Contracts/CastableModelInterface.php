<?php
namespace App\Contracts;
interface CastableModelInterface{
    public function get_field_castings() : array;
}