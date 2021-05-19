<?php
function setActiveCategories ($category , $output = 'active')
{
    return request()->category == $category ? $output : '';
}
function productImage($path)
{
    return $path && file_exists('storage/' . $path) ? asset('storage/' . $path) : asset('front-assets/images/not-found.jpg');
}