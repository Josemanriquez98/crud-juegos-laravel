<?php

namespace App\Http\Controllers;

use App\Models\Juego;
use App\Models\Tienda;
use Illuminate\Http\Request;

/**
 * Class JuegoController
 * @package App\Http\Controllers
 */
class JuegoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $juegos = Juego::paginate();

        return view('juego.index', compact('juegos'))
            ->with('i', (request()->input('page', 1) - 1) * $juegos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $juego = new Juego();

        // obteniendo lista de tiendas
        $tiendas = Tienda::pluck('nombre','id');
        return view('juego.create', compact('juego', 'tiendas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Juego::$rules);

        $juego = Juego::create($request->all());

        return redirect()->route('juegos.index')
            ->with('success', 'Juego creado con exito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $juego = Juego::find($id);

        // obteniendo lista de tiendas
        $tiendas = Tienda::pluck('nombre','id');
        return view('juego.show', compact('juego', 'tiendas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $juego = Juego::find($id);

        // obteniendo lista de tiendas
        $tiendas = Tienda::pluck('nombre','id');

        return view('juego.edit', compact('juego', 'tiendas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Juego $juego
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Juego $juego)
    {
        request()->validate(Juego::$rules);

        $juego->update($request->all());

        return redirect()->route('juegos.index')
            ->with('success', 'Juego editado con exito');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $juego = Juego::find($id)->delete();

        return redirect()->route('juegos.index')
            ->with('success', 'Juego eliminado con exito');
    }
}
