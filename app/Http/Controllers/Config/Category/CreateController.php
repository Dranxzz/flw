<?php

namespace App\Http\Controllers\Config\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class CreateController extends Controller
{
    public function create(Request $request)
    {
        try {
            DB::beginTransaction();

            $this->createCategory($request);

            DB::commit();

            return response()->json(Response::HTTP_OK);

        } catch (ValidationException $ex) {
            return response()->json(
                [
                'data' => [
                    'title'  => $ex->getMessage(),
                    'errors' => collect($ex->errors())->flatten()
                ]
                ], Response::HTTP_UNPROCESSABLE_ENTITY
            );
        } catch (\Exception $ex) {
            DB::rollBack();
            return response()->json(
                [
                'data' => [
                    'code'        => $ex->getCode(),
                    'title'       => __('errors.server.title'),
                    'description' => __('errors.server.description'),
                ]
                ], Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }

    protected function createCategory($request)
    {
        $role              = new Category();
        $role->name        = $request->name;
        $role->description = $request->description;
        $role->save();
        return $role->id;
    }
}
