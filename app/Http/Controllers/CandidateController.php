<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    public function index() : JsonResponse {
       $all = Candidate::all();
       return response()->json($all, 200);
    }
}
