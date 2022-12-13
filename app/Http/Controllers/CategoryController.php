<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create(){
        return view('categories.create');
    }

    /**
     * Store function
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2|max:30',
            'type' => 'required',
        ]);

        return 'success';
    }

}
