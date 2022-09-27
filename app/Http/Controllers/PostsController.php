<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    //
    public function index()
    {
        return Posts::orderBy('id', 'DESC')->get();
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string'
        ]);

        if ($data) {
            return Posts::UpdateorCreate($request->all());
        };
    }
}
