<?php

namespace App\Http\Controllers;

use App\Models\Tienda;
use Illuminate\Http\Request;

/**
 * Class TiendaController
 * @package App\Http\Controllers
 */
class TiendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tiendas = Tienda::paginate();

        return view('tienda.index', compact('tiendas'))
            ->with('i', (request()->input('page', 1) - 1) * $tiendas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tienda = new Tienda();
        return view('tienda.create', compact('tienda'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Tienda::$rules);

        $tienda = Tienda::create($request->all());

        return redirect()->route('tiendas.index')
            ->with('success', 'Tienda created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tienda = Tienda::find($id);

        return view('tienda.show', compact('tienda'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tienda = Tienda::find($id);

        return view('tienda.edit', compact('tienda'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Tienda $tienda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tienda $tienda)
    {
        request()->validate(Tienda::$rules);

        $tienda->update($request->all());

        return redirect()->route('tiendas.index')
            ->with('success', 'Tienda updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $tienda = Tienda::find($id)->delete();

        return redirect()->route('tiendas.index')
            ->with('success', 'Tienda deleted successfully');
    }
}
