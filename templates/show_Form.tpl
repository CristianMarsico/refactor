{include 'templates/header.tpl'}

<div class="container">
    <div class="row">
        <div class="col-12">
            <nav class="navbar navbar-light bg-light">
                <a class="navbar-brand">Usuarios</a>
                <a class="btn btn-dark" href="home">back</a>
            </nav>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h3 class="text-center bg-danger text-white">Acceso</h3>
            <form action="verify" method="POST">
                <div class="form-group">
                    <label><b>Nombre/Usuario/correo</b></label>
                    <input type="text" class="form-control" name="username" placeholder="Name/User/email">
                </div>
                <div class="form-group">
                    <label><b>Contraseña</b></label>
                    <input type="password" class="form-control" name="pass" placeholder="Password">
                </div>
                {if $error}
                    <div class="alert alert-danger">
                        {$error}
                    </div>
                {/if}
                <button type="submit" class="btn btn-primary">Cargar</button>
            </form>
        </div>
    </div>
</div>