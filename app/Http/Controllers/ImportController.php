<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImportController extends Controller
{
    public function index()
    {
        return view('import');
    }
    public function store(Request $request)
    {
        $validData = $request->validate(['data_file' => 'required|file']);
        if ($_FILES['data_file']['type'] == 'application/json') {
            //if file type == json then do below
        } else {
            // if file type is not json do below
            return back()->withErrors(['badFile' => 'Please upload JSON file']);
        }

    }
}
