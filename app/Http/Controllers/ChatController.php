<?php

namespace App\Http\Controllers;

use App\Http\Resources\ChatResource;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
    public function store(Request $request,$homework_id)
    {
        DB::table('Chats')->insert([
            'messsage' => $request->message,
            'user_id' => Auth::id(),
            'homework_id' => $homework_id,
            'created_at' => Carbon::now()
        ]);
    }

    public function getMessages(Request $request,$homework_id)
    {
        $messages = DB::table('Chats')->where('homework_id', $homework_id)->get();
        return ChatResource::collection($messages);
    }
}
