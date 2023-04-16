<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index(User $user)
    {
// dd(Auth::user()->loc_name);
        return view('user.contact', compact('user'));
    }

    public function submitMessage(Request $request)
    {
        $this->validate($request, [
            'loc_name' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'msg' => 'required|min:5',
            'type' => 'required',
        ]);

        Mail::send(
            'user.contact-email',
            [
                'loc_name' => $request->get('loc_name'),
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'msg' => $request->get('msg'),
                'type' => $request->get('type'),
            ],
            function ($message) {
                $message->from('support@g-d.com');
                $message->to(Request()->email, Request()->name)
                ->subject('Your Website Contact Form');
            }
        );

        return back()->with('message', 'The message has been successfully submitted! <br> You may now log out or <a href="' . route('categories') . '"> <span class="font-medium text-hkcolor hover:text-white ">Return to Categories</span></a>' );
    }
}