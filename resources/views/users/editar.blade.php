<div class="container">
    <h2>Editar Usuario</h2>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Cambio de cursor e icono de ojo al final -->
    <style>
        .eye-icon {
            cursor: pointer;
        }
    </style>

    <form action="{{ route('user.update', $users->id) }}" method= "POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="imagen" class="form-label">Imagen</label>
            <input value= "{{$users->imagen ? $users->imagen : '' }} "type="text" class="form-control" id="imagen" name="imagen" required>
        </div>
        <div class="mb-3">
            
            <label for="perfil" class="form-label">Tipo perfil</label>
            <input value= "{{$users->perfil ? $users->perfil : '' }} " type="text" class="form-control" id="perfil" name="perfil" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <input value= "{{$users->email ? $users->email : '' }} " type="text" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Nombre de Usuario</label>
            <input value= "{{$users->username ? $users->username : '' }} " type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña (dejar en blanco si no deseas cambiarla)</label>
            <div class="input-group">
                <input type="password" class="form-control" id="password" name="password" placeholder="Nueva contraseña (opcional)">
                <span class="input-group-text eye-icon" id="togglePassword">
                    <i class="fas fa-eye"></i>
                </span>
            </div>
        </div>
        <div class="mb-3">
            <label for="estado" class="form-label">Tipo de estado</label>
            <select id="estado" name="estado" required>
            <option value="1">Activo</option>
            <option value="0">Inactivo</option>
        </select><br>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input value= "{{$users->name ? $users->name : '' }} " type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="apellido_paterno" class="form-label">Apellido Paterno</label>
            <input value= "{{$users->apellido_paterno ? $users->apellido_paterno : '' }} " type="text" class="form-control" id="apellido_paterno" name="apellido_paterno" required>
        </div>
        <div class="mb-3">
            <label for="apellido_materno" class="form-label">Apellido Materno</label>
            <input value= "{{$users->apellido_materno ? $users->apellido_materno : '' }} " type="text" class="form-control" id="apellido_materno" name="apellido_materno" required>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <input value= "{{$users->descripcion ? $users->descripcion : '' }} " type="text" class="form-control" id="descripcion" name="descripcion" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="/" class="btn btn-danger">Cancelar</a>
    </form>
</div>   
<script>
    document.getElementById('togglePassword').addEventListener('click', function () {
        const passwordField = document.getElementById('password');
        const eyeIcon = this.querySelector('i');
        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            eyeIcon.classList.remove('fa-eye');
            eyeIcon.classList.add('fa-eye-slash');
        } else {
            passwordField.type = 'password';
            eyeIcon.classList.remove('fa-eye-slash');
            eyeIcon.classList.add('fa-eye');
        }
    });
</script>