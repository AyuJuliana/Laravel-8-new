@extends('layouts.app')

@section('content')
<div class="container">
    @if (Request::is('letters/secretary'))
        <h2>Daftar Surat yang Perlu Divalidasi Oleh Sekretaris Desa</h2>
    @elseif (Request::is('letters/chief'))
        <h2>Daftar Surat yang Perlu Divalidasi Oleh Kepala Desa</h2>
    @else
        <h2>Daftar Surat yang Perlu Divalidasi Oleh Operator</h2>
    @endif
    
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif 
     
    @if (count($letters) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Nama Pengaju</th>
                    <th>Judul Surat</th>
                    <th>Perihal</th>
                    @if (!Request::is('letters/secretary') && !Request::is('letters/chief')) <!-- Hanya tampilkan kolom Lampiran jika bukan di halaman Sekretaris atau Kepala Desa -->
                        <th>Lampiran</th>
                    @endif
                    <th>Status</th>
                    @if (!Request::is('letters/secretary') && !Request::is('letters/chief')) <!-- Hanya tampilkan kolom Validasi jika bukan di halaman Sekretaris atau Kepala Desa -->
                        <th>Validasi</th>
                    @endif
                    @if (!Request::is('letters/secretary') && !Request::is('letters/chief')) <!-- Hanya tampilkan kolom Catatan Kekurangan jika bukan di halaman Sekretaris atau Kepala Desa -->
                        <th>Catatan Kekurangan</th>
                    @endif
                    @if (Request::is('letters/chief')) <!-- Tampilkan kolom validasi kepala desa hanya jika di halaman kepala desa -->
                        <th>Validasi Kepala Desa</th>
                        <th>Tanda Tangan Elektronik</th>
                    @endif
                    @if (Request::is('letters/secretary')) <!-- Tampilkan kolom validasi sekretaris hanya jika di halaman sekretaris -->
                        <th>Validasi Sekretaris</th>
                        <th>Nomor Surat</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($letters as $letter)
                    <tr>
                        <td>{{ $letter->user ? $letter->user->name : 'Unknown User' }}</td>
                        <td>{{ $letter->judul }}</td>
                        <td>{{ $letter->perihal }}</td>
                        @if (!Request::is('letters/secretary') && !Request::is('letters/chief')) <!-- Hanya tampilkan kolom Lampiran jika bukan di halaman Sekretaris atau Kepala Desa -->
                            <td>
                                @if ($letter->attachment)
                                    <a href="{{ asset('storage/' . $letter->attachment) }}" target="_blank">Lihat Lampiran</a>
                                @else
                                    Tidak ada lampiran
                                @endif
                            </td>
                        @endif
                        <td>{{ ucfirst($letter->status) }}</td>
                        @if (!Request::is('letters/secretary') && !Request::is('letters/chief')) <!-- Hanya tampilkan kolom Validasi jika bukan di halaman Sekretaris atau Kepala Desa -->
                            <td>
                                @if ($letter->status == 'pending')
                                    <form action="{{ route('letters.validate.operator', $letter->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Validasi Operator</button>
                                    </form>
                                @elseif ($letter->status == 'validated_operator' && Request::is('letters/secretary'))
                                    <form action="{{ route('letters.validate.secretary', $letter->id) }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="nomor_surat">Nomor Surat:</label>
                                            <input type="text" id="nomor_surat" name="nomor_surat" class="form-control" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Validasi Sekretaris Desa</button>
                                    </form>
                                @endif
                            </td>
                        @endif
                        @if (!Request::is('letters/secretary') && !Request::is('letters/chief')) <!-- Hanya tampilkan kolom Catatan Kekurangan jika bukan di halaman Sekretaris atau Kepala Desa -->
                            <td>
                                @if ($letter->status == 'pending')
                                    <form action="{{ route('letters.note', $letter->id) }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <textarea name="note" class="form-control" rows="3"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-secondary">Tambah Catatan</button>
                                    </form>
                                @endif
                            </td>
                        @endif

                        @if (Request::is('letters/chief')) <!-- Tampilkan validasi kepala desa hanya jika di halaman kepala desa -->
                        <td>
                            @if ($letter->status === 'validated_secretary')
                                @if (!$letter->signed_by_chief)
                                    <form action="{{ route('letters.validate.chief', $letter->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Validasi Kepala Desa</button>
                                    </form>
                                @else
                                    <span class="text-success">Sudah divalidasi</span>
                                @endif
                            @endif
                        </td>
                        <td>
                            @if ($letter->signed_by_chief)
                                <span class="text-success">Sudah ditandatangani</span>
                            @else
                                Belum ditandatangani
                            @endif
                        </td>
                    @endif

                        @if (Request::is('letters/secretary')) <!-- Tampilkan nomor surat hanya jika di halaman sekretaris -->
                            <td>
                                @if ($letter->status === 'validated_operator')
                                    {{ $letter->nomor_surat ?: '-' }}
                                @endif
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Tidak ada surat yang perlu divalidasi saat ini.</p>
    @endif

</div>
@endsection
