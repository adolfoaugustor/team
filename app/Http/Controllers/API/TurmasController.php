<?php

namespace App\Http\Controllers\API;

use App\Models\Turma;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TurmasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $turmas = Turma::all();
        return response()->json($turmas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $turmas = new Turma();
        $turmas->fill($request->all());
        $turmas->save();

        return response()->json($turmas, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $turmas = Turma::find($id);
        
        if(!$turmas) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }

        return response()->json($turmas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $turma = Turma::findOrFail($id);

        if(!$turma) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }

        $turma->fill($request->all());
        $turma->save();

        return response()->json($turma);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $turma = Turma::findOrFail($id);

        if(!$turma) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }

        $turma->delete();
    }
}
