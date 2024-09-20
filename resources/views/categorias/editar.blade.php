<div class="container">
    <h2>Crear Nueva Categoría</h2>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <form action="{{ route('categoria.update', $categorias->id) }}" method= "POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre Categoría</label>
            <input value= "{{$categorias->nombre ? $categorias->nombre : '' }} "type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción de la Categoría</label>
            <input value= "{{$categorias->descripcion ? $categorias->descripcion : '' }} " type="text" class="form-control" id="descripcion" name="descripcion" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="/categoria" class="btn btn-danger">Cancelar</a>
    </form>
</div>        