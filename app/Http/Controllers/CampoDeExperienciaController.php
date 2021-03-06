<?php

namespace App\Http\Controllers;

use App\Models\CampoDeExperiencia;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CampoDeExperienciaController extends Controller
{

    public function showSimple()
    {

        $campos  =CampoDeExperiencia::get();
        return response()->json($campos);
    }


    /**
     * @return \Illuminate\Http\JsonResponse
     * Show All Campos de Experiencia
     */

    public function showAll()
    {
        $campo = CampoDeExperiencia::get();
        $campo->load(['AreaDeExperiencia.ExperienciaEspecifica'=>function($q) use (&$ExperienciaEspecifica){
            $ExperienciaEspecifica = $q->get()->unique();
        }]);
        return response()->json(
            [
                "msg"=>"success",
                "campo_de_experiencia"=>$campo->toArray()
            ],200);
    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $campo = CampoDeExperiencia::find($id);
        $campo->load(['AreaDeExperiencia.ExperienciaEspecifica'=>function($q) use (&$ExperienciaEspecifica){
            $ExperienciaEspecifica = $q->get()->unique();
        }]);
        return response()->json(
            [
                "msg"=>"success",
                "campo_de_experiencia"=>$campo->toArray()
            ],200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
