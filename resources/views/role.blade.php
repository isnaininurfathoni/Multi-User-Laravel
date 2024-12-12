@extends('layout.template')

@section('title','Role Management')
@section('content')
    <div class="mb-3">
        <a href="{{ url('featurs') }}" class="btn btn-primary">Back</a>
    </div>
  <!--FORM TAMBAH DATA-->
  <form action='{{ url('role-management') }}' method='post'>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $item)
                <li>{{ $item }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if (session('success'))
    <div id="successMessage" class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <script>
        document.addEventListener('DOMContentLoaded', function() {
        var successMessage = document.getElementById('successMessage');
        if (successMessage) {
            setTimeout(function() {
                successMessage.style.display = 'none';
            }, 2000);
        }
        });
    </script>
    @csrf
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h3>Tambah User</h3>
        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">Name :</label>
            <div class="col-sm-10">
                <input type="string" class="form-control" name='name' id="name">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="email" class="col-sm-2 col-form-label">Email :</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" name='email' id="email">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="password" class="col-sm-2 col-form-label">Password :</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" name='password' id="password">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="role" class="col-sm-2 col-form-label">Role :</label>
            <div class="col-sm-10">
                <select class="form-select" name="role" id="role">
                    <option value="teknisi">Teknisi</option>
                    <option value="administrator">Administrator</option>
                    <option value="superuser">Superuser</option>
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="role" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">BUAT</button></div>
        </div>
      </form>
    </div>
    <!--AKHIR FORM TAMBAH DATA-->
    <!--FORM PENCARIAN-->
    <div class="my-3 p-3 bg-body rounded shadow-sm">
         <div class="pb-3">
           <form class="d-flex" action="{{ url('role-management') }}" method="get">
               <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
               <button class="btn btn-secondary" type="submit">Cari</button>
           </form>
         </div>
         <!--AKHIR FORM PENCARIAN-->
         <!--TABEL-->
         <h3>Tabel User</h3>
         <table class="table table-striped">
             <thead>
                 <tr>
                     <th class="col-md-1">No</th>
                     <th class="col-md-3">Nama</th>
                     <th class="col-md-4">Email</th>
                     <th class="col-md-2">Role</th>
                     <th class="col-md-2">Aksi</th>
                 </tr>
             </thead>
             <tbody>
               
                @foreach ($data as $key => $item)     
                <tr>
                    <td>{{ $key+ 1 }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->role }}</td>
                    <td class="d-flex justify-content-start">
                        <a href='{{ url('role-management/'.$item->name.'/edit') }}' class="btn btn-warning btn-sm me-2">Edit</a>
                        <form onsubmit="return confirm('Apakah yakin untuk menghapus data?')" class="d-inline" action="{{ url('role-management/'.$item->name) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
                        </form>
                    </td>                    
                </tr>
                @endforeach
             </tbody>
         </table>
         <!--AKHIR TABEL-->
         {{ $data->links() }}
   </div>
@endsection
    