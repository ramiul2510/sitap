<?php

namespace App\Http\Controllers;

use App\Models\DataTarget;
use Illuminate\Http\Request;

class DataTargetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function dashboard(){
        return view('dashboard.dashboard',[
            'title' => 'Dashboard'
        ]);
    }
    public function index(Request $request)
    {
        $query = DataTarget::query();

        // Filter tahun
        $years = DataTarget::selectRaw('YEAR(date) as year')->distinct()->pluck('year');
        $selectedYear = $request->input('year', now()->year);

        // Filter bulan
        $months = DataTarget::selectRaw('MONTH(date) as month')->distinct()->pluck('month');
        $selectedMonth = $request->input('month', now()->month);

        // Filter nama proses
        $processes = DataTarget::select('proccess')->distinct()->pluck('proccess');
        $selectedProcess = $request->input('process');

        // Pencarian
        $searchTerm = $request->input('search');
        if ($searchTerm) {
            $query->where(function ($q) use ($searchTerm) {
                $q->where('date', 'like', '%' . $searchTerm . '%')
                    ->orWhere('proccess', 'like', '%' . $searchTerm . '%')
                    ->orWhere('employee', 'like', '%' . $searchTerm . '%')
                    ->orWhere('machine', 'like', '%' . $searchTerm . '%');
            });
        }

        // Filter tahun
        if ($selectedYear) {
            $query->whereYear('date', $selectedYear);
        }

        // Filter bulan
        if ($selectedMonth) {
            $query->whereMonth('date', $selectedMonth);
        }

        // Filter nama proses
        if ($selectedProcess) {
            $query->where('proccess', $selectedProcess);
        }

        // Pagination
        $dataTargets = $query->paginate(10); // Sesuaikan dengan jumlah item per halaman yang diinginkan

        return view('dashboard.data-target', compact('dataTargets', 'years', 'selectedYear', 'months', 'selectedMonth', 'processes', 'selectedProcess'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.create-data-target');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'date' => 'required',
            'proccess' => 'required',
            'employee' => 'required',
            'machine' => 'required',
            'start' => 'required',
            'stop' => 'required',
            'pieces_out_mc' => 'required',
            'pieces_out_inspect' => 'required',
            'scrap' => 'required',
        ]);

        $response = DataTarget::create($request->all());

        if($response){

        return redirect()->route('data-target.index')
            ->with('success', 'Data target berhasil ditambahkan');
        }
        else{
            return redirect()->route('data-target.index')
            ->with('error', 'Data target gagal ditambahkan');
        }

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DataTarget  $dataTarget
     * @return \Illuminate\Http\Response
     */
    public function show(DataTarget $dataTarget)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataTarget  $dataTarget
     * @return \Illuminate\Http\Response
     */
    public function edit(DataTarget $dataTarget)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataTarget  $dataTarget
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataTarget $dataTarget)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataTarget  $dataTarget
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataTarget $dataTarget)
    {
        //
    }
}
