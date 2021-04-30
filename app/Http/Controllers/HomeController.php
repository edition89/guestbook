<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Guestbooks;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Гостевая книга',
            'page_title' => 'Гостевая книга',
            'messages' => Guestbooks::latest()->simplePaginate(5),
            'count' => Guestbooks::count(),
        ];
        return view('pages.messages.index', $data);
    }

    public function store(Request $request) 
    { 
        $guestbook = new Guestbooks;
        $guestbook->username = $request->username;
        $guestbook->message = $request->message;

        $guestbook->save();

        return response()->json(['success'=>'Form is successfully submitted!']);
    }
}
