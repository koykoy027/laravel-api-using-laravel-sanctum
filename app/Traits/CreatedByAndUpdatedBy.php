<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;

trait CreatedByAndUpdatedBy
{

    private function createdByAndUpdatedBy()
    {
        return [
            'created_by' => Auth::user()->id,
            'updated_by' => Auth::user()->id,
        ];
    }

    private function createdBy()
    {
        return ['created_by' => Auth::user()->id];
    }

    private function updatedBy()
    {
        return ['updated_by' => Auth::user()->id];
    }
}
