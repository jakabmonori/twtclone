<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $messages = Message::orderBy('created_at', 'DESC') -> get();

        return view('home', [
            'messages' => $messages
        ]);
    }
}
