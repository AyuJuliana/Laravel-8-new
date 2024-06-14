<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Data Surat</title>
</head>
<body>
    <h1 class="text-center mb-4">Data Surat</h1>
  
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No Surat</th>
                                    <th scope="col">Perihal Surat</th>
                                    <th scope="col">Nama Pemohon</th>
                                    <th scope="col">No Telp Pemohon</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dataSurat as $surat)
                                <tr>
                                    <td>{{ $surat->no_surat }}</td>
                                    <td>{{ $surat->perihal_surat }}</td>
                                    <td>{{ $surat->nama_pemohon }}</td>
                                    <td>{{ $surat->notelp_pemohon }}</td>
                                    <td>
                                        <form action="/updatedata/{{ $surat->id }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <select class="form-select" name="status" aria-label="Status" onchange="this.form.submit()">
                                                <option value="pending" {{ $surat->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                <option value="validated" {{ $surat->status == 'validated' ? 'selected' : '' }}>Validated</option>
                                            </select>
                                        </form>
                                    </td>
                                    <td>
                                        <a href="/updatedata/{{ $surat->id }}" class="btn btn-primary">Edit</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
