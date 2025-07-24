<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\MessageSent;

class ChatController extends Controller
{
    public function index(Request $request)
    {
        if($request->message){
             $message = $request->message;
            broadcast(new MessageSent($message))->toOthers(); // Avoid sending back to same user
            return response()->json(['status' => 'sent']);
        }
        return view('chat');
    }

    public function sendMessage(Request $request)
    {
        $message = $request->message;
        broadcast(new MessageSent($message))->toOthers(); // Avoid sending back to same user
        return response()->json(['status' => 'sent']);
    }
}
