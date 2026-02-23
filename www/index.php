<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Hello, world !</title>
  </head>
  <body>
    <h1 class="text-center">CRUD Personas</h1>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <form>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control validar" id="nombre">
                            </div>
                            <div class="form-group">
                                <label for="apellido">Apellido</label>
                                <input type="text" class="form-control validar" id="apellido">
                            </div>
                            <div class="form-group">
                                <label for="direccion">Dirección</label>
                                <input type="text" class="form-control validar" id="direccion">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="nit">Nit</label>
                                <input type="text" class="form-control validar" id="nit">
                            </div>
                            <div class="form-group">
                                <label for="dui">Dui</label>
                                <input type="text" class="form-control validar" id="dui">
                            </div>
                            <div class="form-group">
                                <label for="telefono">Teléfono</label>
                                <input type="tel" class="form-control validar" id="telefono">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control validar" id="email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control validar" id="password">
                            </div>
                            <div class="form-group">
                                <label for="fecha">Fecha de nacimiento</label>
                                <input type="date" class="form-control validar" id="fecha">
                            </div>
                        </div>
                    </div>

                        <button type="button" class="btn btn-primary" id="btnGuardar">Guardar</button>
                        <button type="button" class="btn btn-danger" id="btnLimpiar">Limpiar</button>

                    <input type="hidden" value="" id="codigo_persona">
                    <input type="hidden" value="" id="codigo_usuario">
                </form>
            </div>

            <div class="col-md-12 pt-12" style="margin-top:50px">
                    <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Nombre completo</th>
                    <th scope="col">Dui</th>
                    <th scope="col">Nit</th>
                    <th scope="col">Email</th>
                    <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody id="tabla-contenido">
                </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
    <script src="src/js/persona.js"></script>
  </body>
</html>