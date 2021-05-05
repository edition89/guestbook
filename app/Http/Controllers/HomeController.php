<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guestbooks;
use Illuminate\Support\Facades\Auth;


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

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function edit(Request $request)
    {
        echo $request->id;
        $guestbook = Guestbooks::find($request->id);
        $guestbook->username = $request->input('username');
        $guestbook->message = $request->input('message');

        $guestbook->save();
        
        response()->json(['success' => 'Form is successfully submitted!']);
    }

    public function deleted(Request $request)
    {   
        $guestbook = Guestbooks::find($request->id);
        $guestbook->delete();
        return response()->json(['success' => 'Form is successfully submitted!']);
    }

    public function capthcaFormValidate(Request $request)
    {
        $validate = $request->validate([
            'username' => 'required',
            'message' => 'required',
            'captcha' => 'required|captcha'
        ],
        ['captcha.captcha'=>'Неверный текст.']);

        $guestbook = new Guestbooks;
        $guestbook->username = $validate['username'];
        $guestbook->message = $validate['message'];

        $guestbook->save();

        return redirect('/');
    }

    public function reloadCaptcha()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }
}
