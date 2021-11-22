<?php

namespace App\Http\Controllers;

use App\Models;
use Illuminate\Http\Response;

class IndexController extends Controller
{
    public function index(): Response
    {
        $items = Models\Item::paginate(20);

        return response()
            ->view('index', [
                'items' => $items,
            ])
            ->header('Cache-Control', 'no-store');
    }
}
