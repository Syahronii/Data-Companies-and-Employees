<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = Company::paginate();
        // dd($company);

        return view('company.index', compact('company'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:50',
            'email' => 'required|email',
            'logo' => 'required|image|dimensions:min_width=100,min_height=100|max:2000',
            'website' => 'required|url'
        ]);

        $company = Company::create($request->all());

        return redirect()->route('company.index')->with('success', 'Data berhasil disimpan ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        $employees = $company->employees()->paginate();
        return view('company.show', compact('company', 'employees'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        // dd($company);
        return view('company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $request->validate([
            'nama' => 'required|max:50',
            'email' => 'required|email',
            'logo' => 'nullable|image|dimensions:min_width=100,min_height=100|max:2000',
            'website' => 'required|url'
        ]);
        
        $company->fill($request->except('logo'));
        if($request->logo){
            $company->logo=$request->logo;
        }

        $company->save();

        session()->flash('success', 'Data Berhasil Ubah');
        return redirect()->route('company.edit', compact('company'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        if(!empty($company->logo)) {
            Storage::delete($company->logo);
        }

        $company->delete();

        session()->flash('success', 'Data Berhasil Dihapus');

        return redirect()->route('company.index');
    }

    public function logo(Company $company)
    {
        return Storage::get($company->logo);
    }
}
