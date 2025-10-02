@extends('layouts.master')

@section('content')
<div style="margin-bottom:20px;">
    <a href="{{ url('/buku/create') }}">
        <button style="padding:10px; cursor:pointer; background-color: #28a745; color: white; border: none; border-radius: 4px;">
            Tambah Buku
        </button>
    </a>
</div>

<div>
    <table border="1" cellpadding="5" cellspacing="1" width="max-content">
        <thead>
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Harga</th>
            <th>Tanggal Terbit</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($data_buku as $buku)
        <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$buku->judul}}</td>
        <td>{{$buku->penulis}}</td>
        <td>{{$buku->harga}}</td>
        <td>{{$buku->tgl_terbit}}</td>
        <td style="display: flex; gap: 15px; align-items: center;">
            <a href="{{ url('/buku/' . $buku->id) }}" style="padding:6px; cursor:pointer; background-color: #28a745; color: white; border: none; border-radius: 7px; text-decoration:none;">Lihat</a>
            <a href="{{ url('/buku/' . $buku->id . '/edit') }}" class="btn btn-warning btn-sm" style="padding:6px; cursor:pointer; background-color: #d2a419ff; color: white; border: none; border-radius: 7px; text-decoration:none;">Edit</a>
            <form action="{{ url('/buku/' . $buku->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')" style="padding:6px; cursor:pointer; background-color: red; color: white; border: none; border-radius: 5px">Hapus</button>
            </form>
        </td>
        </tr>
        @empty
        <tr>
            <td colspan="6" style="text-align: center;">Data tidak ditemukan</td>
        </tr>
        @endforelse
    </tbody>
    </table>
</div>

@endsection('')