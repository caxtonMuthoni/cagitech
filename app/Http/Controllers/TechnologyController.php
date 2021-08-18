<?php

namespace App\Http\Controllers;

use App\Models\Technology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TechnologyController extends Controller
{

    // Getting all the  technologies
    public function index()
    {
        return Technology::latest()->get();
    }


    public function store(Request $request)
    {
        //validation

        $this->validate($request, [
            'icon' => 'required | mimes:png,jpg,jpeg,webp,svg',
            'technology' => 'required | string | unique:technologies',
            'category' => 'required | string'
        ]);

        try {
            // prepare data

            $file = $request->file('icon');
            $technologyName = $request->technology;
            $fileName = $technologyName . '.' . $file->getClientOriginalExtension();

            $path = $file->storeAs('technologies', $fileName, 'public');

            $technology = new Technology;

            $technology->icon = $path;
            $technology->category = $request->category;
            $technology->technology = $technologyName;

            if ($technology->save()) {
                return response()->json([
                    'status' => true,
                    'message' => "Technology created successfully !"
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => "Could not save the data to the database!"
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => "An error occured during the operation !"
            ]);
        }
    }


    //  Update technology
    public function update(Request $request, $id)
    {
        //validation

        $this->validate($request, [
            'icon' => 'mimes:png,jpg,jpeg,webp,svg',
            'technology' => 'required | string | unique:technologies,technology,' . $id,
            'category' => 'required | string'
        ]);

        try {
            // prepare data
            $technologyName = $request->technology;
            $technology = Technology::find($id);

            if ($request->file('icon')) {
                $hasDeleted = Storage::disk('public')->delete($technology->icon);

                if ($hasDeleted) {
                    $file = $request->file('icon');
                    $fileName = $technologyName . '.' . $file->getClientOriginalExtension();
                    $path = $file->storeAs('technologies', $fileName, 'public');
                } else {
                    $path = $technology->icon;
                }
            } else {
                $path = $technology->icon;
            }

            $technology->icon = $path;
            $technology->category = $request->category;
            $technology->technology = $technologyName;

            if ($technology->save()) {
                return response()->json([
                    'status' => true,
                    'message' => "Technology updated successfully !"
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => "Could not update the technology!"
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => "An error occured during the operation !"
            ]);
        }
    }

    // Delete technology
    public function destroy($id)
    {
        try {
            $deleteTech =  Technology::find($id);
            $hasDeletedFile =  Storage::disk("public")->delete($deleteTech->icon);

            if ($hasDeletedFile) {
                if ($deleteTech->delete()) {
                    return response()->json([
                        'status' => true,
                        'message' => "Technology deleted successfully !"
                    ]);
                } else {
                    return response()->json([
                        'status' => false,
                        'message' => "Could not delete the technology!"
                    ]);
                }
            } else {
                return response()->json([
                    'status' => false,
                    'message' => "Could not delete the technology!"
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => "An error occured during the operation !"
            ]);
        }
    }
}
