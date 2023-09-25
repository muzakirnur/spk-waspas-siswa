<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AttributeController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $attributes = Attribute::query();
            return DataTables::eloquent($attributes)
                ->addColumn('edit', '<a href="{{route("attribute.edit", $id)}}" class="btn bg-indigo-500 hover:bg-indigo-600 text-white">
                <i class="fa-solid fa-edit"></i></a>')
                ->rawColumns(['edit'])
                ->make();
        }
        return view('pages.attribute.index');
    }

    function create()
    {
        return view('pages.attribute.create');
    }

    function save(Request $request)
    {
        $validated = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'kode' => ['required', 'unique:attributes'],
            'bobot' => ['required', 'digits_between:1,100'],
        ]);

        Attribute::create($validated);

        return redirect()->route('attribute.index')->with('success', 'Attribute Berhasil ditambahkan!');
    }

    function edit($id) 
    {
        $attribute = Attribute::findOrFail($id);
        return view('pages.attribute.edit', compact('attribute'));
    }

    function update($id, Request $request)
    {
        $attribute = Attribute::findOrFail($id);
        $validated = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'kode' => ['required', 'unique:attributes,kode,' . $attribute->id],
            'bobot' => ['required', 'digits_between:1,100'],
        ]);
        $attribute->update($validated);
        return redirect()->route('attribute.index')->with('success', 'Attribute berhasil diupdate!');
    }
}
