<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class MessageController extends Controller
{
    public function index()
    {
        // Tüm mesajları getir
        $messages = Contact::latest()->get();

        // Tek view dosyasına gönder
       return view('admin.messages', compact('messages'));
    }
}
