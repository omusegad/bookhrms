<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SmsController extends Controller{


    public function index(){
       return view('sms.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
       return view('sms.create');
    }

    public function store(Request $request){
        dd($request->all());
        // $email = "omusegad@gmail.com";
        // $data = array('name'=>"Virat Gandhi");

        // Mail::send(['text'=>'mail'], $data, function($message) {
        //    $message->to("ommusegad@gmail.com", 'Tutorials Point')->subject
        //       ('Laravel Basic Testing Mail');
        //    $message->from("omusegad@gmail.com",'Virat Gandhi');
        // });
        // echo "Basic Email Sent. Check your inbox.";

    }

    public function upload(Request $request){

    }



}
