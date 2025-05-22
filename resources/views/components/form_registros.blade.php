<section class="form-section">
    <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre"
            class="form-control-custom @error('nombre') is-invalid @enderror"
            placeholder="Ingresa tu nombre"
            value="{{ old('nombre') ? old('nombre') : (isset($registro) ? $registro->nombre : '') }}">
        @error('nombre')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="apellido">Apellido</label>
        <input type="text" id="apellido" name="apellido"
            class="form-control-custom @error('apellido') is-invalid @enderror"
            placeholder="Ingresa tu apellido"
            value="{{ old('apellido') ? old('apellido') : (isset($registro) ? $registro->apellido : '') }}">
        @error('apellido')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="rut">RUT</label>
        <input type="text" id="rut" name="rut"
            data-mask="99999999-K"
            class="form-control-custom @error('rut') is-invalid @enderror"
            placeholder="Ej: 12345678-9"
            value="{{ old('rut') ? old('rut') : (isset($registro) ? $registro->rut : '') }}">
        @error('rut')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="fecha_nacimiento">Fecha de nacimiento</label>
        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento"
            class="form-control-custom @error('fecha_nacimiento') is-invalid @enderror"
            value="{{ old('fecha_nacimiento') ? old('fecha_nacimiento') : (isset($registro) ? $registro->fecha_nacimiento : '') }}">
        @error('fecha_nacimiento')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

</section>


@section('scripts')
<!-- Tu script que usa Inputmask -->
<script>
document.addEventListener("DOMContentLoaded", function () {
  Inputmask.extendDefinitions({
    'K': {
      validator: "[0-9kK]",
      casing: "lower"
    }
  });

  const input = document.getElementById('rut');
  Inputmask(input.getAttribute('data-mask')).mask(input);
});
</script>
@endsection


