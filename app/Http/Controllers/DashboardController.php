<?php

namespace App\Http\Controllers;

use App\Models\Trash;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('index', [
            'trashs' => $this->getList(),
        ]);
    }

    public function getList()
    {
        return Trash::paginate(10);
    }
}
