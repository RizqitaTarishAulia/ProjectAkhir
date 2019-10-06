@extends('template')
@section('content')
    <section class="main-section">
        <div class="content">
            <h1>Tambah Barang</h1>
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <li><strong>{{ $error }}</strong></li>
                    @endforeach
                </div>
            @endif
            
            <form action="{{ route('admin.store') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="nama">Nama : </label>
                    <input type="string" class="form-control" id="nama" name="nama">
                </div>
                <div class="form-group">
                    <label for="email">Email : </label>
                    <input type="string" class="form-control" id="email" name="email">
                </div>
                <div class="form-group">
                    <label for="nohp">No. HP : </label>
                    <input type="string" class="form-control" id="nohp" name="nohp">
                </div>
                <div class="form-group">
                    <label for="password">Password : </label>
                    <input type="string" class="form-control" id="password" name="password">
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