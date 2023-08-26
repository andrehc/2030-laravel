<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{
    public function index()
    {
        $series = Serie::orderBy('nome')->paginate('10');

        return view('series.index')->with('series', $series);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request)
    {
        $serie = Serie::create($request->all());
        $serie->save();

        return to_route('series.index');
    }

    public function destroy(Request $request)
    {

        Serie::where('id', $request->series)->delete();

        return to_route('series.index');
    }

    public function seriesApagadas()
    {
        $series = collect(Serie::where('deleted_at', '!=', null)->toSql());

        return view('series.deletados')->with('series', $series);
    }
}
