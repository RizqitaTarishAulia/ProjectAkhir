@extends('template')
@section('content')
    <section class="main-section">
        <div class="content">
            <h1>Tambah Data Peminjaman</h1>
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <li><strong>{{ $error }}</strong></li>
                    @endforeach
                </div>
            @endif
            
            <form action="{{ route('peminjaman.store') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="kode_mobil">Kode Mobil : </label>
                    <input type="string" class="form-control" id="kode_mobil" name="kode_mobil">
                </div>
                <div class="form-group">
                    <label for="jml">Jumlah : </label>
                    <input type="string" class="form-control" id="jml" name="jml">
                </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn=md btn-primary">Submit</button>
                    <button type="reset" class="btn btn-md btn-danger">Cancel</button>
                </div>
            </form>
        </div>
    </section>
@endsection