<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    // Getting all the  service
    public function index()
    {
        return Service::latest()->get();
    }

    // Storing the services
    public function store(Request $request)
    {
        //validation

        $this->validate($request, [
            'service' => 'required | unique:services',
            'description' => 'required | string | min:100',
            'icon' => 'required | string'
        ]);


       try {
        $service = new Service;
        $service->service =$request->service;
        $service->icon = $request->icon;
        $service->description = $request->description;

        if($service->save()) {
            return response()->json([
                'status' => true,
                'message' => "Service created successfully !"
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => "Could not save the data to the database!"
        ]);
       } catch (\Throwable $th) {
        return response()->json([
            'status' => false,
            'message' => "An error occured during the operation !"
        ]);
       }


    }

    // Updating the service
    public function update(Request $request, $id)
    {
        //validation
        $this->validate($request, [
            'service' => 'required | unique:services,service,'.$id,
            'description' => 'required | string | min:100',
            'icon' => 'required | string'
        ]);

        // Update

        try {
            $service = Service::find($id);
            $service->service =$request->service;
            $service->icon = $request->icon;
            $service->description = $request->description;
    
            if($service->save()) {
                return response()->json([
                    'status' => true,
                    'message' => "Service updated successfully !"
                ]);
            }
    
            return response()->json([
                'status' => false,
                'message' => "Could not save the data to the database!"
            ]);
           } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => "An error occured during the operation !"
            ]);
           }
    }

    // Deleting the service
    public function destroy($id)
    {

        try {

            $service = Service::find($id);
            if($service->delete()) {
                return response()->json([
                    'status' => true,
                    'message' => "Service deleted successfully !"
                ]); 
            }else {
                return response()->json([
                    'status' => false,
                    'message' => "Failed to delete the service"
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
