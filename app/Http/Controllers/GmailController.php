<?php

namespace App\Http\Controllers;

use App\Models\Email;
use Google\Service\Gmail;
use Google_Client;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class GmailController extends Controller
{
    public function index()
    {
        $emails = Email::with(['order' => function ($query) {
            $query->with('products');
        }])->orderBy('id','desc')->get();
        $count =  $emails->where('reader_status',false)->count();
        return view('backend.gmail.index',compact('emails','count'));
    }
    public function markAsRead($id)
    {
        
        $email = Email::find($id);
        if (isset($email)){
            $email->update(['reader_status' => true]);
        }
        
        return redirect()->back();
    }
    public function show($id)
    {
        $email = Email::with(['order' => function ($query) {
            $query->with('products');
        }])->where('id',$id)->first();
        return view('backend.gmail.details',compact('email')); 
    }
}
