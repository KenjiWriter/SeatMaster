<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $movies = [
            [
                'title' => 'Film 1',
                'description' => 'Opis filmu 1',
                'poster_url' => 'https://picsum.photos/200/300',
            ],
            [
                'title' => 'Film 2',
                'description' => 'Opis filmu 2',
                'poster_url' => 'https://picsum.photos/200/300',
            ],
            // Dodaj więcej filmów...
        ];

        return view('welcome', compact('movies'));
    }
}
