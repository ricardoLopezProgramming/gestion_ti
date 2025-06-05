<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sign in</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="shortcut icon" href="../public/assets/images/web/favicon.ico" type="image/x-icon">
</head>

<body class="bg-light">
    <div class="container vh-100 d-flex align-items-center justify-content-center">
        <div class="col-12 col-sm-8 col-md-6 col-lg-4 bg-white p-4 rounded shadow">
            <form action="../app/controllers/SignInController.php" method="post">
                <div class="mb-3">
                    <label for="emailName" class="form-label">Correo</label>
                    <input type="email" class="form-control" id="emailName" name="correo" aria-describedby="emailHelp" required>
                    <div id="emailHelp" class="form-text">
                        Ingresa tu correo.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="inputPassword" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="inputPassword" aria-describedby="passwordHelp" name="contraseña" required>
                    <div id="passwordHelp" class="form-text">
                        Nunca compartas tu contraseña.
                    </div>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Recordar</label>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <a href="#" class="small">Olvidaste tu contraseña?</a>
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-success">Iniciar sesion</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>