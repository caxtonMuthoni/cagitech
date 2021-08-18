<?php

namespace App\Http\Controllers;

use App\Models\Testimony;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonyController extends Controller
{
    //    Get all testmoniews
    public function index()
    {
        return Testimony::latest()->get();
    }


    public function store(Request $request)
    {
        //validation
        $this->validate($request, [
            'testimony' => 'required | string | min:100 | max:1000',
            'avatar' => 'required | mimes:png,jpg,jpeg,webp,svg',
            'name' => 'string | required | min:5 | max:20',
            'occupation' => 'string | required'
        ]);

        try {
            // Prepare data
            $avatar =  $request->file('avatar');
            $name =  $request->name;
            $fileName = $name . '.' . $avatar->getClientOriginalExtension();

            // Storing the file to get the path

            $path =  $avatar->storeAs('avatars', $fileName, 'public');

            $testimony = new Testimony;
            $testimony->testimony = $request->testimony;
            $testimony->name =  $name;
            $testimony->occupation = $request->occupation;
            $testimony->avatar = $path;

            if ($testimony->save()) {
                return response()->json([
                    'status' => true,
                    'message' => "Testimony created successfully !"
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => "Testimony could no be saved into the database !"
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => "An error occured during the operation !"
            ]);
        }
    }

    // Updating testimony
    public function update(Request $request, $id)
    {
        //validation
        $this->validate($request, [
            'testimony' => 'required | string | min:100 | max:1000',
            'avatar' => 'mimes:png,jpg,jpeg,webp,svg',
            'name' => 'string | required | min:5 | max:20',
            'occupation' => 'string | required'
        ]);

        try {
            $testimony = Testimony::find($id);

            $path = $testimony->avatar;
            $name =  $request->name;

            if ($request->file('avatar')) {

                $isDelete = Storage::disk('public')->delete($testimony->avatar);

                // Prepare data
                $avatar =  $request->file('avatar');
                $fileName = $name . '.' . $avatar->getClientOriginalExtension();

                // Storing the file to get the path
                $path =  $avatar->storeAs('avatars', $fileName, 'public');
            }

            $testimony->testimony = $request->testimony;
            $testimony->name =  $name;
            $testimony->occupation = $request->occupation;
            $testimony->avatar = $path;

            if ($testimony->save()) {
                return response()->json([
                    'status' => true,
                    'message' => "Testimony updated successfully !"
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => "Testimony could no be updated !"
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => "An error occured during the operation !"
            ]);
        }
    }


    public function destroy($id)
    {
        try {
            $deleteTest =  Testimony::find($id);
            $hasDeletedFile =  Storage::disk("public")->delete($deleteTest->avatar);

            if ($hasDeletedFile) {
                if ($deleteTest->delete()) {
                    return response()->json([
                        'status' => true,
                        'message' => "Testimony deleted successfully !"
                    ]);
                } else {
                    return response()->json([
                        'status' => false,
                        'message' => "Could not delete the testimony!"
                    ]);
                }
            } else {
                return response()->json([
                    'status' => false,
                    'message' => "Could not delete the testimony!"
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
