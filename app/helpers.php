<?php
function setActiveCategories ($category , $output = 'active')
{
    return request()->category == $category ? $output : '';
}