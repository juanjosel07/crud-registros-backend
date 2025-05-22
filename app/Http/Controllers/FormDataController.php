<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormDataRequest;
use App\Models\FormData;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FormDataController extends Controller
{

    public function index(Request $request){

        $registros = FormData::all();
        if(request()->ajax()){
            return response()->json(['registros' => $registros], 200);
        }

        return view('form_data.index', compact('registros'));

    }

    public function create(){

        return view('form_data.create');
    }

    public function store(FormDataRequest $request){

        DB::beginTransaction();
        

        try {
            $data = $request->validated();
            FormData::create($data);

            DB::commit();

            if($request->ajax()){
                return response()->json(['status' => 'Registro creado correctamente', 'register' => $data], 201);
            }
            return redirect()->route('formdata.index')->with('success', 'Registro creado correctamente');
        } catch (\Exception $e) {
            DB::rollBack();
            
            return redirect()->route('formdata.create')
                    ->withInput()
                    ->with('error', 'Ocurrió un problema al crear el registro.');
        }


    }

    public function edit(formData $formData){
        $registro = $formData;
        return view('form_data.edit', compact('registro'));

    }

    public function update(FormDataRequest $request){

        $formData = $request->get('formData');
        DB::beginTransaction();

        try {
            $data = $request->validated();
            $formData->update($data);

            DB::commit();

            if($request->ajax()){
                return response()->json(['status' => 'Registro actualizado correctamente', 'register' => $data], 200);
            }
            return redirect()->route('formdata.index')->with('success', 'Registro actualizado correctamente');

        } catch (\Throwable $th) {
            DB::rollBack();
            
            return redirect()->route('formdata.index')
                    ->withInput()
                    ->with('error', 'Ocurrió un problema al actualizar el registro.');
        }



    }

    public function destroy(Request $request){

        $formData = $request->get('formData');
        DB::beginTransaction();
        try {
            $formData->delete();

            DB::commit();

            if($request->ajax()){
                return response()->json(['status' => 'Registro eliminado correctamente'], 200);
            }
            return redirect()->route('formdata.index')->with('success', 'Registro eliminado correctamente');

        } catch (\Throwable $th) {
            DB::rollBack();
            
            return redirect()->route('formdata.index')
                    ->withInput()
                    ->with('error', 'Ocurrió un problema al eliminar el registro.');
        }

    }
}
