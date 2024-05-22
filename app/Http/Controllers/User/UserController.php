<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserUpdateRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Models\UserProfile;
use App\Traits\CreatedByAndUpdatedBy;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    use CreatedByAndUpdatedBy;

    public function index()
    {
        $data = UserResource::collection(
            UserProfile::allActive()
                ->get()
        );

        return response()->json([
            'data' => $data,
        ]);
    }

    public function show($id)
    {
        return new UserResource(UserProfile::find($id));
    }

    public function update(UserUpdateRequest $request, $id)
    {
        try {
            DB::beginTransaction();

            $user = User::find($id);
            $user->update(
                array_merge(
                    $request->only(['email']),
                    $this->updated_by()
                )
            );

            $user->userProfile->update($request->except(['email']));

            DB::commit();

            return new UserResource(User::find($id));
        } catch (\Exception $error) {
            DB::rollBack();
            return $error;
        }
    }
}
