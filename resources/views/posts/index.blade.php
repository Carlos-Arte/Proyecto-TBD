<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<div class= "container">

<a class= "btn btn-primary" href= "#">Nueva Publicación</a>

@if($post->isEmpty())
    <p> No hay publicaciones en las BD.</p>
@else
    <div class="row">
        @foreach($post as $posts)
            <div class=" col-md-3 mr-2 ml-2 mb-5">
                <div class="card">
                    <div class= "card-body">
                        <h3>{{ $posts->nombre}}</h3>
                        <p class= "text-primary">{{ $posts->resumen}}</p>
                        <p class= "lead">{{ $posts->contenido}}</p>
                        <p class="text-muted">Publicado en: {{ $posts->created_at }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif
</div>