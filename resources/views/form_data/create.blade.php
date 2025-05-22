@extends('layouts.app')

@section('content')
    <section class="section-form">
            <h2>Crear Registro</h2>
            <form action="{{ route('formdata.store') }}" method="POST" class="form">
                    @csrf
                    <x-form_registros  />
                    <div class="form-buttons">
                        <button type="submit" class="btn btn-register">Crear</button>
                        <a href="{{ route('formdata.index') }}" class="btn btn-cancel">Cancelar</a>
                    </div>
            </form>
    </section>
@endsection



