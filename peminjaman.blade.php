@extends('template')
@section('content')
    <section class="main-section">
        <div class="content">
            <h1>Data Peminjaman</h1>
            <a href="{{ route('peminjaman.create') }}" class=" btn btn-sm btn-dark">Create Data Peminjaman</a>
            @if(Session::has('alert_message'))
                <div class="alert alert-success">
                    <strong>{{ Session::get('alert_message')}}</strong>
                </div>
            @endif
        <br>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>No.</th>
                    <th>Kode Mobil</th>
                    <th>Jumlah</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @php $no = 1; @endphp
                @foreach($data as $datas)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $datas->kode_mobil }}</td>
                        <td>{{ $datas->jml }}</td>
                        <td>
                            <form action="{{ route('peminjaman.destroy', $datas->id) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <a href="{{ route('peminjaman.edit',$datas->id) }}" class=" btn btn-sm btn-primary">Edit</a>

                                <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm
                                ('Yakin ingin menghapus data?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
