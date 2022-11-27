<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmloyeeController extends Controller
{
    public function store(Request $request) {
        $emp = Employee::create($request->all());

        return response()->json([
            'success' => true,
            'message' => $emp
        ]);
    }

    public function index() {
        $emps = Employee::all();

        return response()->json([
            'success' => true,
            'message' => $emps
        ]);
    }
}
