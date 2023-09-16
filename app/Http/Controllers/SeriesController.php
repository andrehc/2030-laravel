<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{
    public function index()
    {
        $series = Serie::orderBy('nome')->paginate('10');
        $mensagemSucesso = session('mensagem.sucesso');

        return view('series.index')->with('series', $series)
            ->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request)
    {
        $serie = Serie::create($request->all());
        $serie->save();

        $request->session()->flash('mensagem.sucesso', "Serie, '$serie->nome' foi adicionada.");

        return to_route('series.index');
    }

    public function destroy(Serie $series, Request $request)
    {

        $series->delete();

        $request->session()->flash('mensagem.sucesso', "Serie, '$series->nome' foi removida.");

        return to_route('series.index');
    }

    public function edit(Serie $series)
    {
        return view('series.update')->with('series', $series);
    }
    public function update(Serie $series, Request $request)
    {
        $series->nome = $request->input('nome');
        $series->update();

        return to_route('series.index');
    }

    public function seriesApagadas()
    {
        $series = collect(Serie::where('deleted_at', '!=', null)->toSql());

        return view('series.deletados')->with('series', $series);
    }
}
