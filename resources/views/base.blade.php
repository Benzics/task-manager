<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <!-- Bootsrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <header class="d-flex flex-wrap justify-content-center py-3 px-2 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
          <span class="fs-4">Task Manager</span>
        </a>
  
        <ul class="nav nav-pills">
          <li class="nav-item"><a href="{{ url('/') }}" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="{{ url('/projects') }}" class="nav-link">Projects</a></li>
        </ul>
      </header>

      <main>
        @yield('content')
      </main>

      <footer class="container my-4 p-3 text-center">
        <span>&copy; 2023, All rights reserved, simple task manager by <a href="https://github.com/benzics">Benzics</a></span>
      </footer>
      <!-- Bootstrap Bundle with Popper -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>