<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function index(){

        return view('leads.index');
    }

    public function create(){

        return view('leads.create');
    }
}
