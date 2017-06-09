<?php
/**
 * Created by PhpStorm.
 * User: tapos
 * Date: 6/9/2017
 * Time: 5:05 PM
 */

namespace App\Transformers;


use App\Category;
use League\Fractal\TransformerAbstract;

class CategoryTransformer extends TransformerAbstract
{
    public function transform(Category $category)
    {

        return [
            'id' => (int)$category->id,
            'title' => (string)$category->name,
            'details' => (string)$category->description,
            'createdDate' => (string) $category->created_at,
            'lastChangeDate' => (string) $category->updated_at,
            'deletedDate' => isset($category->deleted_at) ? (string)$category->deleted_at :null ,

        ];
    }
}