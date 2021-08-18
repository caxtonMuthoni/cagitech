<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Technology;
use App\Models\Testimony;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function home() {
         return view('layouts.dashboard');
    }

    public function index() {
        $services = Service::take(6)->get();
        $testimonies =  Testimony::latest()->get();
        return view('pages.home', compact('services', 'testimonies'));
    }


    public function contact() {
        $testimonies =  Testimony::latest()->get();
        return view('pages.contact', compact('testimonies'));
    }

    public function services() {
        $services = Service::all();
        return view('pages.services', compact('services'));
    }

    public function technologies() {
        $technologies = Technology::all();
        return view('pages.technologies',compact('technologies'));
    }

    public function company() {
        $services = Service::take(6)->get();
        return view("pages.company", compact('services'));
    }

    public function users() {
        return User::latest()->get();
    }

    public function updateUser(Request $request, $id) {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required | unique:users,email,'.$id
        ]);
        
        try {
            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;

            if($user->save()) {
                return response()->json([
                    'status' => true,
                    'message' => "User updated successfully !"
                ]);
            }else {
                return response()->json([
                    'status' => false,
                    'message' => "Could updated the user, try again later !"
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => "An error occured during the operation !"
            ]);
        }
    }

    public function destroyUser($id) {
        try {
            $deletesUser =  User::find($id);
            if($deletesUser->delete()) {
                return response()->json([
                    'status' => true,
                    'message' => "User was deleted succussfully !"
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => "User could not be  deleted !"
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
