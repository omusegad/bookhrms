<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Sms;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use AfricasTalking\SDK\AfricasTalking;
use Illuminate\Support\Facades\Response;

class SmsController extends Controller{

    public function index(){
       $contacts = Sms::all();
       $users =  User::all();

       return view('sms.index', compact('contacts','users'));
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
        $data = $request->all();
        $username = 'grubkenya'; // use 'sandbox' for development in the test environment
        $apiKey   = '02fdb18693fd102893f1d2e5e13343864c61163f1b93d693bfda6a06faae749a'; // use your sandbox app API key for development in the test environment
        $AT       = new AfricasTalking($username, $apiKey);

        // Get one of the services
        $sms      = $AT->sms();

        // Use the service
        $result   = $sms->send([
            'to'      => $data['phoneNumber'],
            'message' => $data['message']
        ]);

        return back()->with('message','Text message sent successfully');

    }

    public function download(){
        $path= public_path(). "/download/contact_format_sample.xlsx";
        $headers = array(
            'Content-Type: application/xlsx',
        );
        return Response::download($path, 'contact_format_sample.xlsx', $headers);
        return back()->with('message','Download Successfully');
    }

    public function senttoall(Request $request){
        $data = $request->all();


        $username = 'grubkenya'; // use 'sandbox' for development in the test environment
        $apiKey   = '02fdb18693fd102893f1d2e5e13343864c61163f1b93d693bfda6a06faae749a'; // use your sandbox app API key for development in the test environment
        $AT       = new AfricasTalking($username, $apiKey);

        // Get one of the services
        $sms      = $AT->sms();

        // Use the service
        $result   = $sms->send([
            'to'      => $data['phoneNumber'],
            'message' => $data['message']
        ]);

        return back()->with('message','Text message sent successfully');

    }



}
