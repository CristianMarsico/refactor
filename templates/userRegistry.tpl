{include 'templates/header.tpl'}
<div class="container">
    <div class="row">
        <div class="col-12">
            <h3 class="text-center bg-danger text-white">Registrarse aqui!</h3>
            <form  action="newUser" method="POST">
                <div class="form-group">
                    <label for="exampleInputEmail1">Usuario</label>
                    <input type="text" name="usuario" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Usuario">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Contraseña</label>
                    <input type="password" name="contraseña1" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Reescriba su contraseña</label>
                    <input type="password" name="contraseña2" class="form-control" id="exampleInputPassword1" placeholder="Verifique Password">
                </div>
                {if $error}
                    <div class="alert alert-danger">
                        {$error}
                    </div>
                {/if}

                <button type="submit" class="btn btn-dark">Confirmar</button>
            </form> 
        </div>
    </div>
</div>