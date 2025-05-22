@extends('layouts.app')

@section('content')
    <div class="section-table">
        <h1>Registros</h1>
        <div class="table-container">
            <a href="{{ route('formdata.create') }}" class="btn btn-register">Nuevo Registro</a>     
            <table class="table table-custom" id="registros_table" style="margin-top: 40px">
                <thead class="thead">
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>RUT</th>
                        <th>Fecha de nacimiento</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($registros as $registro)
                        <tr class="tbody-row">
                            <td class="border-bl-lg">{{ $registro->nombre }}</td>
                            <td>{{ $registro->apellido }}</td>
                            <td>{{ $registro->rut }}</td>
                            <td>{{ $registro->fecha_nacimiento }}</td>
                            <td>
                                <div>
                                    <a class="btn btn-edit" href="{{ route('formdata.edit', $registro->id) }}"> 
                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                                    </a>

                                    <button class="btn btn-remove"
                                        onclick="deleteRegister({{ $registro->id }})">
                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                                    </button>

                                    <form id="form_delete_{{ $registro->id }}"
                                        action="{{ route('formdata.destroy', $registro->id) }}"
                                        method="POST"
                                        >
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            $('#registros_table').DataTable({
                dom: 'Bfrtip',
                autoWidth: true,
                processing: true,
                language: {
                    search: "",
                    searchPlaceholder: "🔍 Buscar ...",
                },
                buttons: [
                    {
                        extend: "csv",
                        text: "CSV",
                        className: "btn btn-csv",
                    },
                    {
                        extend: "excel",
                        text: "Excel",
                        className: "btn btn-excel",
                    },
                ],

            });
        });

        async function deleteRegister(register_id) {
                const response = await Swal.fire({
                    icon: 'warning',
                    title: 'Esta seguro de eliminar?',
                    showCancelButton: true
                })
                if (!response.isConfirmed) return
                document.getElementById(`form_delete_${register_id  }`).submit();
                Swal.fire('Eliminado', 'El registro ha sido eliminado', 'success')
            };

    </script>

@endsection    
