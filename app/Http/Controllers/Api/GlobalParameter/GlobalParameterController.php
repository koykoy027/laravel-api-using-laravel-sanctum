<?php

namespace App\Http\Controllers\Api\GlobalParameter;

use App\Http\Controllers\Controller;
use App\Http\Resources\GlobalParameterResource;
use App\Models\GlobalParameter;
use Illuminate\Http\Request;

class GlobalParameterController extends Controller
{
    public function index()
    {
        return(
            GlobalParameterResource::collection(
                GlobalParameter::all()
            )
        );
    }
}
