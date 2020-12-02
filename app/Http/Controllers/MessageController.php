<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function create(Request $request) {

        $message = new Message();
        $message->title = $request->title;
        $message->content = $request->content;

        if (strlen($message->title) >= 255) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['titLength' => 'Title is too long! 255 characters max!']);
        }
        elseif (strlen($message->content) >= 255) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['conLength' => "Content is too long! 255 characters max!"]);
        }
        else {
            $message->save();

            return redirect('/');
        }


    }
}
