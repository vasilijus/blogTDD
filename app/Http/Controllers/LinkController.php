<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Link;

class LinkController extends Controller
{
    //
    public function index() {
        return view('submit');
    }

    public function post(Request $request) {
        $json = file_get_contents('php://input');
        $data = $request->validate([
            'title' => 'required|max:255',
            'url' => 'required|url|max:255',
            'description' => 'required|max:255',
        ]);

        $link = tap( new Link($data))->save();

        return redirect('/');
    }

}
