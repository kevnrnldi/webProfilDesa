@extends('layouts.mainAdmin')

@section('content')
<div class="container">
    <h1 class="mb-3 text-primary">Edit Data Demografi: {{ $kategori }}</h1>

    <form action="{{ route('admin.demografi.update.kategori', $kategori) }}" method="POST">
        @csrf
        @method('PUT')

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Subkategori</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $index => $item)
                <tr>
                    <td>
                        {{ $item->subkategori }}
                        <input type="hidden" name="id[]" value="{{ $item->id }}">
                    </td>
                    <td>
                        <input type="number" name="jumlah[]" class="form-control" value="{{ $item->jumlah }}" required>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-between">
            <a href="{{ route('admin.demografi.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left-circle"></i> Kembali
            </a>
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save"></i> Update Semua
            </button>
        </div>
    </form>
</div>
@endsection
