<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">



<h1 class="mb-5 bg-light p-3">Catalogo de Usuarios</h1>
 <!-- Toast para mostrar mensaje de éxito -->
@if (session('success'))
        <div class="toast-container position-fixed top-0 end-0 p-3">
            <div id="toast-success" class="toast align-items-center text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        {{ session('success') }}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        </div>
    @endif
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Mensaje de éxito si existe
    @if (session('success'))
        var toastSuccess = new bootstrap.Toast(document.getElementById('toast-success'));
        toastSuccess.show();
    @endif
</script>
<div>
    <a class= "btn btn-primary mb-4" href= "{{ route('user.crear') }}">Nuevo Usuario</a>
    <a class="btn btn-outline-secondary mb-4" href="{{ route('categoria.index') }}">Ver Categorías</a>
</div>
@if($usuarios->isEmpty())
    <p> No hay usuarios.</p>
@else
    <div class="row">
        @foreach($usuarios as $user)
            <div class=" col-md-3 mr-2 ml-2 mb-5">
                <div class="card">
                    <div class= "card-body">
                        {{ $user->name}}
                        <p>{{ $user->apellido_paterno}}</p>
                        <a href="{{ route('user.editar', $user->id) }}" title="Editar">
                        <i class="bi bi-pencil" style="color: blue; "></i></a>
                        <a href="#" onclick="event.preventDefault(); eliminar('{{ route('user.delete', $user->id) }}')" title="Eliminar"> <i class="bi bi-trash" style="color: black;"></i></a>
                    </div>
                </div>
            </div>
        @endforeach
        <script>
            function eliminar(url){
            if(confirm('Estas seguro que deseas eliminar?.')){
            fetch(url, {
                method:'DELETE',
                headers:{
                'X-CSRF-TOKEN':'{{csrf_token()}}'
                }
            }).then(function(response){
                if(response.ok){
                location.reload();
                }else{
                alert('Hubo un error al eliminar. ')
                }
            })}
            }
        </script>
    </div>
@endif
