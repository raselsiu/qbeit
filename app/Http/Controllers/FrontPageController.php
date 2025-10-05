<?php

namespace App\Http\Controllers;

use App\Models\TopHeader;
use Illuminate\Http\Request;

class FrontPageController extends Controller
{
    public function getTopHeader()
    {
        $data['top_header'] = TopHeader::latest()->first();
        return view('welcome', $data);
    }
}
