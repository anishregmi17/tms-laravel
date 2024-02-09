<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Title</title>
</head>

<body>

    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Dropdown
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
    </div>

    <section class="py-5">
        <div class="container">
            <form class="row g-3" method="POST" action="{{route('about-feature.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="col-6">
                    <label for="icon" class="form-label">Icon</label>
                    <input type="file" name="icon" class="form-control" id="icon">
                    @error('icon')
                     <p class="text-danger"> {{$message}}</p>
                    @enderror
                  </div>
                  <div class="col-6">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" id="title">
                    @error('title')
                   <p class="text-danger"> {{$message}}</p>
                  @enderror
                  </div>
                  <div class="col-6">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" name="description" class="form-control" id="description">
                    @error('description')
                   <p class="text-danger"> {{$message}}</p>
                  @enderror
                  </div>
                    <div class="col-6 ">
                      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </div>
            </form>
        </div>
    </section>
    <script>
        function selectImage() {
          let x = document.querySelector('input[name=img_link]:checked').value;
          //var selectedOption = $("input:radio[name=filename]:checked").val()
          document.getElementById('sliderbox').value = x; // use .innerHTML if we want data on label
        }
      </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
</body>

</html>
