<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Tambah Data Surat</title>
</head>
<body>
    <h1 class="text-center mb-4">Tambah Data Surat</h1>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <form action="insertdata" method="POST" entype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="noSurat" class="form-label">No Surat</label>
                                <input type="text" class="form-control" id="noSurat" name="no_surat" required>
                            </div>
                            <div class="mb-3">
                                <label for="perihalSurat" class="form-label">Perihal Surat</label>
                                <input type="text" class="form-control" id="perihalSurat" name="perihal_surat" required>
                            </div>
                            <div class="mb-3">
                                <label for="namaPemohon" class="form-label">Nama Pemohon</label>
                                <input type="text" class="form-control" id="namaPemohon" name="nama_pemohon" required>
                            </div>
                            <div class="mb-3">
                                <label for="notelpPemohon" class="form-label">No Telp Pemohon</label>
                                <input type="tel" class="form-control" id="notelpPemohon" name="notelp_pemohon" required pattern="[0-9]{10,15}">
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-control" id="status" name="status" required>
                                    <option value="pending">Pending</option>
                                    <option value="validated">Validated</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="created_at" class="form-label">Tanggal Dibuat</label>
                                <input type="date" class="form-control" id="created_at" name="created_at" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
