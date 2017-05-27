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

    protected function showAll(Collection $collection,$code){


//        if($collection->isEmpty()){
//            return response
//        }
        return response()->json(["data"=>$collection,"code"=>$code],$code);
    }

    protected function showOne(Model $model,$code){
        return response()->json(["data"=>$model,"code"=>$code],$code);
    }

    protected function showError($msg,$code){
        return response()->json(["error"=>$msg,"code"=>$code],$code);
    }

    protected function showSucess($msg,$code){
        return response()->json(["data"=>$msg,"code"=>$code],$code);
    }



}