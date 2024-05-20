<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Persuratan</title>
  </head>
  <body>
    <h1 class="text-center mb-4">Data Surat</h1>
    <div class="container">
      <a href="/tambahsurat" class="btn btn-success">Tambah Surat +</a>
      <div class="row">
        @if($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
            {{ $message }}
        </div>
         @endif
        <table class="table">
          <thead>
            <tr>
              <th scope="col">id</th>
              <th scope="col">Nomor Surat</th>
              <th scope="col">Perihal Surat</th>
              <th scope="col">Nama Pemohon</th>
              <th scope="col">Nomor Telepon Pemohon</th>
              <th scope="col">Status Surat</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @php
            $no = 1;
            @endphp
            @foreach ($data as $row)
            <tr>
              <th scope="row">{{ $no++ }}</th>
              <td>{{ $row->no_surat }}</td>
              <td>{{ $row->perihal_surat }}</td>
              <td>{{ $row->nama_pemohon }}</td>
              <td>{{ $row->notelp_pemohon }}</td>
              <td>{{ $row->status }}</td>
              <td>
                <a href="/tampilkandata/{{$row->id}}" class="btn btn-info">Edit</a>
                <a href="/delete/{{$row->id}}" class="btn btn-danger">Delete</a>
              </td>
            </tr>
            @endforeach
            
          </tbody>
        </table>
      </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    
  </body>
</html>