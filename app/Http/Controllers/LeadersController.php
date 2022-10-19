<?php

namespace App\Http\Controllers;

use App\Models\Leader;
use Illuminate\Http\Request;

class LeadersController extends Controller
{
    //
    public function index()
    {
        return Leader::orderBy('id', 'DESC')->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'leader_name' => 'required|string',
            'position' => 'required|string',
            'bio' => 'required',
        ]);

        if ($data) {
            return Leader::UpdateorCreate($request->all());
        }
    }
}
