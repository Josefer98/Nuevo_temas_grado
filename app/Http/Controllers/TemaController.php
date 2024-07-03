<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Temas;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
class TemaController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-temas|crear-temas|editar-temas|borrar-temas', ['only'=>['index', 'store']]);
        $this->middleware('permission:crear-temas', ['only'=>['create','store']]);
        $this->middleware('permission:editar-temas', ['only'=>['edit','update']]);
        $this->middleware('permission:borrar-temas', ['only'=>['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        //
        $temas=Temas::latest()->paginate(5);
        return view('temas.index', compact('temas'))
            ->with('i', (request()->input('page', 1) -1) *5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return view('temas.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        request()->validate([
            'titulo'=>'required|string',
            'area'=>'required|string',
            'palabras_clave'=>'string',
            'estado'=>'required|in:libre,asignado,terminado',
            'descripcion'=>'string'
        ]);
        Temas::create($request->all());
        return redirect()->route('temas.index')
                        ->with('sucess','Tema Creado Exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Temas $temas): View
    {
        return view('temas.show', compact('temas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Temas $temas): View
    {
        return view('temas.editar',compact('temas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Temas $temas): RedirectResponse
    {
        request()->validate([
            'titulo'=>'required|string',
            'area'=>'required|string',
            'palabras_clave'=>'string',
            'estado'=>'required|in:libre,asignado,terminado',
            'descripcion'=>'string'
        ]); 
        $temas->update($request->all());
        return redirect()->route('temas.index')
                        ->with('success', 'temas actulizados correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Temas $temas): RedirectResponse
    {
        $temas->delete();
        return redirect()->route('temas.index')
                       ->with('success', 'temas eliminados correctamente');
    }
}
