<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use DB;
use Illuminate\Http\Request;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct()
    {
        //
    }

    public function build(Request $request)
    {
        return $this->from($request->email)->view('frontEnd.pages.email',['email'=>$request->email]+['name'=>$request->name]+['x'=>$request->message]);
    }
}
