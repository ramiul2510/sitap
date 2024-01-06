@extends('dashboard.partials.main')

@section('container')
       <!--  Header End -->
   <div class="container-fluid">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Data Target Produksi</h5>

        <div class="container">
          <form class="row" action="{{ route('data-target.index') }}" method="GET">
            <div class="col-md-3 mb-3">
                <label for="year">Filter Tahun</label>
                <select class="form-control" id="year" name="year">
                    @foreach($years as $year)
                        <option value="{{ $year }}" {{ $selectedYear == $year ? 'selected' : '' }}>{{ $year }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3 mb-3">
                <label for="month">Filter Bulan</label>
                <select class="form-control" id="month" name="month">
                    @foreach($months as $month)
                        <option value="{{ $month }}" {{ $selectedMonth == $month ? 'selected' : '' }}>{{ \Carbon\Carbon::createFromFormat('m', $month)->format('F') }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3 mb-3">
                <label for="process">Filter Proses</label>
                <select class="form-control" id="process" name="process">
                    <option value="">-- Pilih Proses --</option>
                    @foreach($processes as $process)
                        <option value="{{ $process }}" {{ $selectedProcess == $process ? 'selected' : '' }}>{{ $process }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3 mb-3">
                <label for="search">Pencarian</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="search" name="search" value="{{ request('search') }}">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Cari</button>
                    </div>
                </div>
            </div>
        </form>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Date</th>
                    <th scope="col">Proccess</th>
                    <th scope="col">Employee</th>
                    <th scope="col">Machine</th>
                    <th scope="col">Start</th>
                    <th scope="col">Stop</th>
                    <th scope="col">Target</th>
                    <th scope="col">P.Out M/C</th>
                    <th scope="col">P.Out Inspect</th>
                    <th scope="col">Scrap</th>
                    <th scope="col">Remarks</th>
                    <th scope="col" colspan="2">Action</th>
                  </tr>
                </thead>
                @php
                $i = ($dataTargets->currentpage() - 1) * $dataTargets->perpage() + 1;
            @endphp
                <tbody>
                  @foreach ($dataTargets as $datas => $data)
                  <tr>
                    <th scope="row" class="fs-2 text-center">{{$i++}}</th>
                    <th scope="row" class="fs-2 text-center">{{$data->date}}</th>
                    <th scope="row" class="fs-2 text-center">{{$data->proccess}}</th>
                    <th scope="row" class="fs-2 text-center">{{$data->employee}}</th>
                    <th scope="row" class="fs-2 text-center">{{$data->machine}}</th>
                    <th scope="row" class="fs-2 text-center">{{$data->start}}</th>
                    <th scope="row" class="fs-2 text-center">{{$data->stop}}</th>
                    <th scope="row" class="fs-2 text-center">{{$data->target}}</th>
                    <th scope="row" class="fs-2 text-center">{{$data->pieces_out_mc}}</th>
                    <th scope="row" class="fs-2 text-center">{{$data->pieces_out_inspect}}</th>
                    <th scope="row" class="fs-2 text-center">{{$data->scrap}}</th>
                    <th scope="row" class="fs-2 text-center">{{$data->remarks}}</th>
                    <th scope="row" class="fs-2 text-center">{{$data->remarks}}</th>
                  </tr>
                  @endforeach
                 
                </tbody>
              </table>
              {{$dataTargets->links()}}
        </div>

      </div>
    </div>
  </div>
@endsection