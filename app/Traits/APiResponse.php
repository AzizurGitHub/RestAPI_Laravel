<?php
/**
 * Created by PhpStorm.
 * User: jibon
 * Date: 5/26/17
 * Time: 4:39 PM
 */

namespace App\Traits;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

trait APiResponse
{

    protected function showAll(Collection $collection,$code=200){


        if($collection->isEmpty()){
            return response()->json(["data"=>$collection,"code"=>$code],$code);
        }

        $transformer = $collection->first()->transformer;
        $collection =  $this->filterData($collection,$transformer);
        $collection =  $this->sortBy($collection,$transformer);
        $instance = $this->transformData($collection,$transformer);
        return response()->json($instance,$code);



    }

    protected function showOne(Model $model,$code=200){
        $transformer = $model->transformer;
        $instance = $this->transformData($model,$transformer);
        return response()->json($instance,$code);
    }

    protected function showError($msg,$code){
        return response()->json(["error"=>$msg,"code"=>$code],$code);
    }

    protected function showSucess($msg,$code){
        return response()->json(["data"=>$msg,"code"=>$code],$code);
    }

    public function transformData($model,$transformer)
    {
        $trnsformationInfo = fractal($model,new $transformer);
        return $trnsformationInfo->toArray();
    }

    public function filterData($collection,$transforer)
    {


        foreach (request()->query() as $query=>$values) {
            $attribute = $transforer::originalAttribute($query);
            if(isset($attribute,$values)){
               $collection =  $collection->where($attribute,$values);
            }
        }
        return $collection;
    }

    public function sortBy($collection,$transforer)
    {
        if(request()->has('sort_by')){
            $attribute = $transforer::originalAttribute(request()->sort_by);

            if(request()->has('order') && request()->order=='desc'){
                $collection = $collection->sortByDesc($attribute);
            }else{
                $collection = $collection->sortBy($attribute);
            }

        }
        return $collection;
    }



}