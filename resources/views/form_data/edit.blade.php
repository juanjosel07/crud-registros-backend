@extends('layouts.app')

@section('content')
    <section class="section-form">
            <h2>Actualizar Registro</h2>
                <form action="{{ route('formdata.update', $registro->id) }}" method="POST" class="form">
                    @csrf
                    @method('PUT')
                    <x-form_registros :registro="$registro" />
                    <div class="form-buttons">
                        <button type="submit" class="btn btn-register">Actualizar</button>
                        <a href="{{ route('formdata.index') }}" class="btn btn-cancel">Cancelar</a>
                    </div>
            </form>
    </section>
@endsection

@section('scripts')
    <script>



    </script>
@endsection