<?php

namespace App\Http\Controllers\GlobalParameter;

use App\Http\Controllers\Controller;
use App\Http\Resources\GlobalParameterTypeResource;
use App\Models\GlobalParameterType;
use App\Traits\HttpResponses;

class GlobalParameterTypeController extends Controller
{
    use HttpResponses;
    public function index()
    {
        $global_parameter_type = GlobalParameterTypeResource::collection(
            GlobalParameterType::all()
        );

        return $this->success([
            'global_parameter_type' => $global_parameter_type
        ]);
    }
}
