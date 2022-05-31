<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!-- CSS -->
  <link rel="stylesheet" href="/css/styles.css" />

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

  <title>Login</title>
</head>

<body>
  <main>
    <section class="vh-100">
      <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <section class="col-12 text-center">
            <h1>Help Desk</h1>
          </section>
          <div class="col-md-9 col-lg-6 col-xl-5">
            <img width="100%" src="/img/draw2.webp" class="img-fluid" alt="Logo ARSESP" />
          </div>
          <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
            <form>
              <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="email" id="form3Example3" class="form-control form-control-lg"
                  placeholder="Digite seu e-mail" />
                <label class="form-label" for="form3Example3">Email</label>
              </div>

              <!-- Password input -->
              <div class="form-outline mb-3">
                <input type="password" id="form3Example4" class="form-control form-control-lg"
                  placeholder="Digite sua senha" />
                <label class="form-label" for="form3Example4">Senha</label>
              </div>

              <div class="d-flex justify-content-between align-items-center">
                <!-- Checkbox -->
                <div class="form-check mb-0">
                  <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                  <label class="form-check-label" for="form2Example3">
                    Lembrar
                  </label>
                </div>
                <a href="#!" class="text-body">Esqueceu a senha?</a>
              </div>

              <div class="text-center text-lg-start mt-4 pt-2">
                <button type="button" class="btn btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem">
                  Login
                </button>
                <p class="small fw-bold mt-2 pt-1 mb-0">
                  Não tem uma conta?
                  <a href="/cadastro" class="link-danger">Cadastre-se</a>
                </p>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </main>
  <footer>
    <!-- Copyright -->
    <div class="text-center text-light p-5 mb-0 footer">
      Ronaldo Carvalho © 2022. All rights reserved.
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>