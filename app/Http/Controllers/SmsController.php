<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Sms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Mail;

class SmsController extends Controller{

    public function index(){
       $contacts = Sms::all();
       return view('sms.index', compact('contacts'));
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

    public function download(){
        $path= public_path(). "/download/contact_format_sample.xlsx";
        $headers = array(
            'Content-Type: application/xlsx',
        );
        return Response::download($path, 'contact_format_sample.xlsx', $headers);
        return back()->with('message','Download Successfully');
    }



}
