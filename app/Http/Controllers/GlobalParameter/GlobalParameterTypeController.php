<?php

namespace App\Http\Controllers\GlobalParameter;

use App\Http\Controllers\Controller;
use App\Http\Resources\GlobalParameterTypeResource;
use App\Models\GlobalParameterType;

class GlobalParameterTypeController extends Controller
{
    public function index()
    {
        $data = GlobalParameterTypeResource::collection(
            GlobalParameterType::all()
        );

        return response()->json([
            'data' => $data,
        ]);
    }
}
