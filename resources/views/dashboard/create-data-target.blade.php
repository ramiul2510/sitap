@extends('dashboard.partials.main')

@section('container')
       <!--  Header End -->
   <div class="container-fluid">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Form Data Target Produksi</h5>

        <div class="container">
        
           
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ route('data-target.store') }}" enctype="multipart/form-data">
                                @csrf
                                
                                <div class="mb-3">
                                    <label for="namaDokumen" class="form-label">Date</label>
                                    <input type="date" class="form-control" required name="date" id="namaDokumen"
                                        aria-describedby="emailHelp">
                                </div>
                            
                                <div class="mb-3">
                                    <label for="namaDokumen" class="form-label">Machine</label>
                                    <input type="text" class="form-control" required name="machine" id="namaDokumen"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Proccess</label>

                                    <select name="proccess" class="form-select mt-2" id="tag-input" required>
                                            <option value="Double Side Lapping">Double Side Lapping</option>
                                            <option value="Double Side Polishing">Double Side Polishing</option>
                                            <option value="Radius Griding">Radius Griding</option>
                                            <option value="Radius Lapping">Radius Lapping</option>
                                            <option value="Radius Polishing">Radius Polishing</option>
                                            <option value="Edging/Shonan">Edging/Shonan</option>
                                            <option value="Final Polishing">Final Polishing</option>
                                    </select>

                                </div>

                                <div class="mb-3">
                                    <label for="namaDokumen" class="form-label">Employee</label>
                                    <input type="text" class="form-control" required name="employee" id="namaDokumen"
                                        aria-describedby="emailHelp">
                                </div>
                                
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label for="namaDokumen" class="form-label">Start</label>
                                            <input type="number" class="form-control" required name="start" id="namaDokumen"
                                                aria-describedby="emailHelp">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label for="namaDokumen" class="form-label">Stop</label>
                                            <input type="number" class="form-control" required name="stop" id="namaDokumen"
                                                aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="namaDokumen" class="form-label">Pieces Out M/C</label>
                                    <input type="text" class="form-control" name="pieces_out_mc" id="namaDokumen"
                                        aria-describedby="emailHelp">
                                </div>
                                    </div>
                                    <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="namaDokumen" class="form-label">Pieces Out Inspect</label>
                                    <input type="text" class="form-control" name="pieces_out_inspect" id="namaDokumen"
                                        aria-describedby="emailHelp">
                                </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="namaDokumen" class="form-label">Scrap</label>
                                    <input type="number" class="form-control" name="scrap" id="namaDokumen"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="form-floating">
                                    <textarea class="form-control" required placeholder="Remarks" name="remarks" id="floatingTextarea2" style="height: 100px"></textarea>
                                    <label for="floatingTextarea2">Remarks</label>
                                </div>


                                <button type="reset" class="btn btn-danger mt-4">Reset</button>
                                <button type="submit" class="btn btn-primary mt-4">Save</button>
                            </form>
                        </div>
                    </div>


        
        </div>

      </div>
    </div>
  </div>
@endsection