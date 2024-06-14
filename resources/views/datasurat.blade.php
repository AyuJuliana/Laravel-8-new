<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Persuratan</title>
  </head>
  <body>
    <h1 class="text-center mb-4">Data Surat</h1>
    <div class="container">
      <a href="/tambahsurat" class="btn btn-success">Tambah Surat +</a>
      <div class="mt-4">
        <form action="/surat" method="GET">
        <input type="search" id="inputPassword5" name="search" class="form-control" aria-describedby="passwordHelpBlock">
        </form>
        <div class="mt-3">
      <div class="row">
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
                <a href="#" class="btn btn-danger delete" data-id="{{$row->id}}"  data-nomor="{{ $row->no_surat }}">Delete</a>
              </td>
            </tr>
            @endforeach
            
          </tbody>
        </table>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Konfirmasi JS dengan jquery, sweet allert, dan toastr -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
  </body>
  <script>
   $('.delete').click(function(){
    var idsurat = $(this).attr('data-id');
    var nomorsurat = $(this).attr('data-nomor');
    swal({
        title: "Yakin?",
        text: "Kamu akan menghapus data surat dengan nomor surat "+nomorsurat+" ",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            window.location = "/delete/"+idsurat+"";
            swal("Data berhasil dihapus!", {
                icon: "success",
            });
        } else {
            swal("Data tidak jadi dihapus!");
        }
    });
  });
  </script>

  <script>
    @if (Session::has('success'))

    toastr.success("{{ Session::get('success') }}")

    @endif
  </script>

</html>