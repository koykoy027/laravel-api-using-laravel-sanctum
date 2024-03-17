<?php

namespace App\Http\Controllers\GlobalParameter;

use App\Http\Controllers\Controller;
use App\Http\Resources\GlobalParameterResource;
use App\Models\GlobalParameter;

class GlobalParameterController extends Controller
{
    public function index()
    {
        $data = GlobalParameterResource::collection(
            GlobalParameter::all()
        );

        return response()->json([
            'data' => $data,
        ]);
    }
}
