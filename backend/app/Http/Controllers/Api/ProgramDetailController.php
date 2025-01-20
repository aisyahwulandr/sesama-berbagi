<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ProgramDetail;

class ProgramDetailController extends Controller
{
    public function index()
    {
        $programs = ProgramDetail::all();
        return response()->json($programs, 200);
    }
}
