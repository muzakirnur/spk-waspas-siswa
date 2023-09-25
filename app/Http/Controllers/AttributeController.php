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
                ->make();
        }
        return view('pages.attribute.index');
    }
}
