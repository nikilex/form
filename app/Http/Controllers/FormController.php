<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Mail;

class FormController extends Controller
{
    public function index(){
        return view('form');
    }
}
