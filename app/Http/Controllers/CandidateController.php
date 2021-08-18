<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Traits\ResponseAPI;

class CandidateController extends Controller
{
    use ResponseAPI;

    public function index() : JsonResponse {
       $all = Candidate::all();
       return $this->error('Deu ruim', ['nome' => 'Esse nome já existe' ]);
    }
}
