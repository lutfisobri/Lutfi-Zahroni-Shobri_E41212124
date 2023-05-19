<?php

namespace App\Http\Controllers;

use App\Models\Trash;
use Illuminate\Http\Request;

class TrashController extends Controller
{
    public function index()
    {
        return view('index', [
            'trashs' => $this->getList(),
        ]);
    }

    public function add(Request $request)
    {

    }

    public function get($id)
    {
        $trash = Trash::find($id);
        return view('edit', [
            'trash' => $trash,
        ]);
    }

    public function store(Request $request)
    {
        Trash::create($request->all());
        return redirect()->route('dashboard');
    }

    public function restore($id)
    {
        $trash = Trash::find($id);
        $trash->restore();
        return redirect()->route('dashboard');
    }

    public function delete($id)
    {
        $trash = Trash::find($id);
        $trash->forceDelete();
        return redirect()->route('dashboard');
    }
}
