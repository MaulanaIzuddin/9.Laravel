<?php

namespace App\Http\Controllers;

use App\Models\Authors;
use Illuminate\Http\Request;

class AuthorsController extends Controller
{
    public function index() {
        $data = new Authors();
        $authors = $data->getAuthors();

        return view('authors',['authors' => $authors]);
    }
}
