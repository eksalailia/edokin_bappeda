@extends('layouts.admin.main')

@section('title', 'Dashboard E-DOKIN')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>BAB I</h1>
    </div>
    <a href="{{ route('bab1.create') }}">
        <button class="btn btn-primary">Tambah <i class="fas fa-plus-circle"></i></button>
    </a>
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>BAB 1</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Nama Bab</th>
                                    <th>Jenis</th>
                                    <th>Tahun</th> <!-- Kolom Tahun ditambahkan di sini -->
                                    <th>Kode OPD</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i=1 @endphp
                                @foreach($bab1 as $bab_1)
                                <tr>
                                    <td class="text-center">{{ $i++ }}</td>
                                    <td>{{ $bab_1->nama_bab }}</td>
                                    <td>{{ $bab_1->jenis->jenis ?? 'N/A' }}</td>
                                    <td>{{ $bab_1->tahun->tahun ?? 'N/A' }}</td> <!-- Menampilkan Tahun -->
                                    <td>
                                        @php
                                            $selectedOpd = null;
                                            foreach ($urusan_opd as $opd) {
                                                if ($opd['kode_opd'] == $bab_1->kode_opd) {
                                                    $selectedOpd = $opd;
                                                    break;
                                                }
                                            }
                                        @endphp
                                        {{ $selectedOpd['kode_opd'] ?? 'N/A' }}
                                    </td>
                                    <td>
                                        <a href="{{ route('bab1.show', $bab_1->id) }}" class="btn btn-info" data-id="{{ $bab_1->id }}"><i class="fa fa-eye"></i> Show</a>
                                        <a href="{{ route('bab1.edit', $bab_1->id) }}" class="btn btn-warning mx-2">Edit <i class="fas fa-edit"></i></a>
                                        <form action="{{ route('bab1.destroy', $bab_1->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger mx-2">Hapus <i class="fas fa-trash"></i></button>
                                        </form>
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
</section>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#table-1').DataTable();
    });
</script>
@endsection
