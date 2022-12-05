<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendEmail()
    {
        $details = [
            'title' => 'The Title',
            'body' => 'The body should be fine',
        ];
        Mail::to("charmi.santoki@viitorcloud.com")->send(new TestMail($details));
        return "Email Sent";
    }
}
