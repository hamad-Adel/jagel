<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Mockery\Exception;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

   public function validate($request, $rules)
   {
       $validation = \Validator::make($request,  $rules);
       if ($validation->fails()){
           throw new HttpResponseException(response()->json(['errors'=>$validation->errors()->messages()]));
           return response()->json(['errors'=>$validation->errors()->messages()]);
       }
   }
}
