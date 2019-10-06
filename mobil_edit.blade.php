@extends('template')
@section('content')
    <section class="main-content">
        <div class="content">
            <h1>Ubah Data Mobil</h1>
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @foreach($data as $datas)
            <form action="{{ route('mobil.update', $datas->id) }}" method="post">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="form-group">
                    <label for="kode_mobil">Kode Mobil : </label>
                    <input type="string" class="form-control" id="kode_mobil" name="kode_mobil" value="{{ $datas->kode_mobil }}">
                </div>
                <div class="form-group">
                    <label for="plat_mobil">Plat Mobil : </label>
                    <input type="string" class="form-control" id="plat_mobil" name="plat_mobil" value="{{ $datas->plat_mobil }}">
                </div>
                <div class="form-group">
                    <label for="nama_mobil">Nama Mobil : </label>
                    <input type="string" class="form-control" id="nama_mobil" name="nama_mobil" value="{{ $datas->nama_mobil }}">
                </div>
                <div class="form-group">
                    <label for="jml">Jumlah : </label>
                    <input type="string" class="form-control" id="pjml" name="jml" value="{{ $datas->jml }}">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-md btn-primary">Submit</button>
                    <button type="reset" class="btn btn-md btn-danger">Cancel</button>
                </div>
            </form>
            @endforeach
        </div>
    </section>
    @endsection