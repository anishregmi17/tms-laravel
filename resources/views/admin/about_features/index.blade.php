<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Title</title>
    @notifyCss
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
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

    <div class="table-responsive py-5">
        <a class="btn btn-primary btn-sm " href="{{route('about-feature.create')}}" role="button">Add </a>
        @include('notify::components.notify')
        <table class="table datatable">
            <div style="z-index: 1 !important;">
              @include('notify::components.notify')
            </div>
            <thead>
              <tr>
                <th>#</th>
                <th>Icon</th>
                <th>Title</th>
                <th>Description</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($aboutFeatures as $aboutFeature)
                
           
              <tr>
                <td>{{$loop->iteration}}</td>
                <td><img src="{{asset('uploads/'.$aboutFeature->icon)}}" alt="" width="100" height="100"></td>
                <td>{{$aboutFeature->title}}</td>
                <td>{{$aboutFeature->description}}</td>
                <td>
                  <a class="btn btn-outline-primary btn-sm text-dark" href="{{route('about-feature.edit', $aboutFeature->id)}}" role="button">Edit </a>
                  <a class="btn btn-outline-info btn-sm " href="{{route('about-feature.show', $aboutFeature->id)}}" role="button">View </a>
                 <!-- Button trigger modal -->
                 <button type="button" class="btn btn-sm btn-outline-danger text-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
                 Delete
                 </button>
                 
                 <!-- Modal -->
                 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog        ">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        Do you want to delete this data??
                      </div>
                      <div class="modal-footer">
                        <form action="{{route('about-feature.destroy', $aboutFeature->id)}}"  method="POST" enctype="multipart/form-data">
                          @csrf
                          @method('delete')
                          <button type="submit"  class="btn btn-outline-primary text-dark ">Save</button>
                        </form>
                        <button type="button" class="btn btn-outline-secondary text-dark" data-bs-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                 </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>

        {{-- for the pagination --}}
        <div>
            {{$aboutFeatures->links()}}
          </div>
    </div>


    <button type="button" class="btn btn-primary" id="liveToastBtn">Show live toast</button>

    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <img src="..." class="rounded me-2" alt="...">
                <strong class="me-auto">Bootstrap</strong>
                <small>11 mins ago</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Hello, world! This is a toast message.
            </div>
        </div>
    </div>

    @notifyJs

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
</body>

</html>
