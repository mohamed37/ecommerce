<?php

use App\Models\Languages;
use Illuminate\Support\Facades\Config;

function get_languages()
{
   return Languages::active()->selection()->get();
}

 function get_default_lang()
{
    return $default = Config::get('app.locale');
}
 
function uploadImage($folder, $image)
{
    $image->store('/', $folder);
    $filename = $image->hashName();
    $path = 'images/' . $folder . '/' . $filename;
    return $path;
}


function is_active($routeName)
 {
    return  request()->segment(2) && request()->segment(2) == $routeName ? 'active' : ' ' ;
 }

?>