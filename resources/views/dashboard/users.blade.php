@extends('dashboard.partials.main')

<style>
    tr th{
        text-align: center;
    }
    tr td{
        text-align: center;
    }
</style>
@section('container')
       <!--  Header End -->
   <div class="container-fluid">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Data User</h5>

        <div class="container">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">No Badge</th>
                    <th scope="col">Email</th>
                    <th colspan="2">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                    $i = ($users->currentpage() - 1) * $users->perpage() + 1;
                @endphp
                        @foreach ($users as $datas => $data)
                  <tr>
                    <th scope="row">{{$i++}}</th>
                    <td>{{$data->name}}</td>
                    <td>{{$data->no_badge}}</td>
                    <td>{{$data->email}}</td>
                    <td><a href="" class="btn btn-success"><i class="ti ti-pencil"></i></a></td>
                    <td>
<!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapus{{$data->id}}">
    <i class="ti ti-trash"></i>
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="modalHapus{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Apakah ingin menghapus data ini?
        </div>
        <form action="">
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Hapus</button>
            </div>
        </form>
      </div>
    </div>
  </div>

                    </td>
                  </tr>
                  @endforeach
                 
                </tbody>
              </table>
        </div>

      </div>
    </div>
  </div>
@endsection