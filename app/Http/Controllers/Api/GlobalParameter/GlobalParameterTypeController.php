<?php

namespace App\Http\Controllers\Api\GlobalParameter;

use App\Http\Controllers\Controller;
use App\Http\Resources\GlobalParameterTypeResource;
use App\Models\GlobalParameterType;

class GlobalParameterTypeController extends Controller
{
    public function index(){
        return([
            GlobalParameterTypeResource::collection(
                GlobalParameterType::all()
            )
        ]);
    }
}
