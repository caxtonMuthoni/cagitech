<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    //    All messages
    public function index()
    {
        return Message::latest()->get();
    }

    //   Send message
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required | string |min:5 | max:50',
            'email' => 'email | string | required',
            'phone' => 'required | string | min:10 | max:13',
            'message' => 'required | string | min:100 | max:700'
        ]);

        try {
            $message =  new Message;
            $message->name =  $request->name;
            $message->email = $request->email;
            $message->phone = $request->phone;
            $message->message = $request->message;

            if ($message->save()) {
                return view('pages.sent');
            } else {
                return redirect()->back()->with("error", "Could not send the message at this moment");
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
            $deleteMessage =  Message::find($id);

            if ($deleteMessage->delete()) {
                return response()->json([
                    'status' => true,
                    'message' => "The message was deleted successfully"
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => "Message could not be deleted, try again later"
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
