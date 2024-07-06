<?php
namespace App\Repostories;

use Illuminate\Http\Request;



abstract class BaseRepostories{
abstract function create($attrs);
abstract function update($model,$attrs);
abstract function delete($model);
}