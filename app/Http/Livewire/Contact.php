<?php

namespace App\Http\Livewire;

use App\Mail\ContactMailConf;
use App\Models\User;
use Livewire\Livewire;
use Livewire\Component;
use Livewire\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

class Contact extends Component
{
    public $loc_name;
    public $name;
    public $email;
    public $msg;
    public $type;
    // public $contact = [];

    protected function rules() {
        return [
            'loc_name' => 'required|min:3',
            'name' => 'required|min:3|max:50',
            'email' => 'required|email',
            'type' => 'required',
            'msg' => 'required|max:255',
        ];
    }

    public function mount() {

        $this->loc_name = Auth::user()->loc_name;
        $this->name = Auth::user()->contact_a;
        $this->email = Auth::user()->email;
        Session::put('contactMessage', false);
    }

    public function submitForm(Request $request, User $user)
    {
        $this->validate();
        $request->loc_name = $this->loc_name;
        $request->name = $this->name;
        $request->email = $this->email;
        $request->type = $this->type;
        $request->msg = $this->msg;
        Session::put('loc_name', $request->loc_name);
        Session::put('name', $request->name);
        Session::put('email', $request->email);
        Session::put('type', $request->type);
        Session::put('msg', $request->msg);
        Session::put('contactMessage', true);

        // Mail::send(
        //     'user.contact-email',
        //     [
        //         'loc_name' => session('loc_name'),
        //         'name' => session('name'),
        //         'email' => session('email'),
        //         'msg' => session('msg'),
        //         'type' => session('type'),
        //     ],
        //     function ($message) {
        //         $message->from('support@g-d.com');
        //         $message->to(session('email'))
        //             ->subject('Your Website Contact Form')
        //             ->cc('azc666@gmail.com');
        //     }
        // );

        $cc = 'azc666@gmail.com';

        Mail::to($request->email)
            // ->cc($cc)
            ->bcc($cc)
            ->send(new ContactMailConf);


        // session()->flash('message', 'Your message has been successfully sent.');

        $this->loc_name = Auth::user()->loc_name;
        $this->name = Auth::user()->contact_a;
        $this->email = Auth::user()->email;
        $this->msg = '';
        $this->type = '';

        // Session::put('contactMessage', true);

        return back();
        // return redirect()->to('/categories');
    }

    public function render()
    {
        return view('livewire.contact');
    }
}