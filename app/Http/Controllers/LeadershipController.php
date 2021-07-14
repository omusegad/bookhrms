<?php

namespace App\Http\Controllers;

use App\Models\Leadership;
use Illuminate\Http\Request;

class LeadershipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('officials.index');
    }


}
