<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body style="background: lightgray">
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('vendor.update', $vendor->id) }}" method="POST"">
                            @csrf
                            @method('PUT')
                    <div class=" form-group">
                            <label class="font-weight-bold">Nama Vendor</label>
                            <input type="text" class="form-control @error('nama_vendor') is-invalid @enderror" name="nama_vendor" value="{{ old('nama_vendor', $vendor->nama_vendor) }}" placeholder="Masukkan nama vendor">
                            <!-- error message untuk nama_vendor -->
                            @error('nama_vendor')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                    </div>
                    <div class=" form-group">
                        <label class="font-weight-bold">Nama Vendor</label>
                        <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat', $vendor->alamat) }}" placeholder="Masukkan alamat vendor">
                        <!-- error message untuk alamat -->
                        @error('alamat')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class=" form-group">
                        <label class="font-weight-bold">Kota</label>
                        <input type="text" class="form-control @error('kota') is-invalid @enderror" name="kota" value="{{ old('kota', $vendor->kota) }}" placeholder="Masukkan kota vendor">
                        <!-- error message untuk kota -->
                        @error('kota')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class=" form-group">
                        <label class="font-weight-bold">Provinsi</label>
                        <input type="text" class="form-control @error('provinsi') is-invalid @enderror" name="provinsi" value="{{ old('provinsi', $vendor->provinsi) }}" placeholder="Masukkan provinsi vendor">
                        <!-- error message untuk provinsi -->
                        @error('provinsi')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class=" form-group">
                        <label class="font-weight-bold">Kode Pos</label>
                        <input type="text" class="form-control @error('kode_pos') is-invalid @enderror" name="kode_pos" value="{{ old('kode_pos', $vendor->kode_pos) }}" placeholder="Masukkan kode_pos vendor">
                        <!-- error message untuk kode_pos -->
                        @error('kode_pos')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-md btn-primary">Update</button>
                    <button type="reset" class="btn btn-md btn-warning">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('content');
    </script>
</body>

</html>