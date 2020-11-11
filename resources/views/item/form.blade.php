<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Maxibin - Tambah Item</title>
        <link href="{{ asset('/css/styles.css') }}" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                  <div class="card-header"><h3 class="text-center font-weight-light my-4">Tambah Item</h3></div>
                                    <div class="card-body">
                                    <form action="{{ url('home', @$item->id_item) }}" method="POST">
                                        @csrf

                                        @if(!empty($item))
                                        @method('PATCH')
                                        @endif
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="namaBarang">Nama Barang</label>
                                                        <input class="form-control py-4" name="name_item" value="{{ old('name_item', @$items->name_item) }}" type="text" placeholder="Masukan Nama" />
                                                    </div>
                                                </div>
                                                <!-- <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputLastName">Username</label>
                                                        <input type="text" class="form-control py-4" name="id" value="" >
                                                    </div>
                                                </div> -->
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputBox">Nama Kotak</label>
                                                        <select name="id_box" class="form-control">
                                                    @foreach (\App\Box::all() as $box)
                                                          <option value="{{ $box->id_box }}" {{ old('id_box', @$item->id_box) == $box->id_box ? 'selected' : '' }}>
                                                          {{ $box->name_box }}</option>
                                                          @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputLokasi">Nama Lokasi</label>
                                                        <select name="id_location" class="form-control">
                                                    @foreach (\App\Location::all() as $location)
                                                          <option value="{{ $location->id_location }}" {{ old('id_location', @$item->id_location) == $location->id_location ? 'selected' : '' }}>
                                                          {{ $location->name_location }}</option>
                                                          @endforeach
                                                          </select>
                                                    </div>
                                                </div>
                                            
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputProject">Nama Project</label>
                                                        <select name="id_project" class="form-control">
                                                    @foreach (\App\Project::all() as $project)
                                                          <option value="{{ $project->id_project }}" {{ old('id_project', @$item->id_project) == $project->id_project ? 'selected' : '' }}>
                                                          {{ $project->name_project }}</option>
                                                          @endforeach
                                                          </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                            @if(session('error'))
                                            <div class="alert alert-error">
                                                {{ session('error') }}
                                            </div>
                                            @endif  

                                            @if (count($errors) > 0)
                                            <div class="alert alert-danger">
                                                <strong>Perhatian</strong><br/>
                                            <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                            </ul>
                                            </div>
                                            @endif
                                            </div>
                                            <div class="col-md"></div>
                                            <div class="form-group mt-4 mb-0">
                                                <a href="{{ url('/home') }}" class="btn btn-primary">Batal</a>
                                                <input type="submit" class="btn btn-primary" value="Simpan">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
