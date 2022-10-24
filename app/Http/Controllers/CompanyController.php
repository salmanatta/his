<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Pharmacy\LogController as LogTable;
use App\Models\Company;
use http\Client\Curl\User;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['companies'] = Company::all();
        return view('pages.company.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $data['suppliers']=Supplier::all();
        return view('pages.company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCompanyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $company = new Company();
        $company->logo = $request->logo->store('/', ['disk' => 'company']);
        $company->name = $request->name;
        $company->email = $request->email;
        $company->phone = $request->phone;
        $company->fax = $request->fax;
        $company->address = $request->address;
        $company->isActive = $request->isActive;
        $company->save();
//        $this->logsAction(["action" => "Store", "remarks" => "Company id " . auth()-User()->id]);

        return redirect()->route('companies.index')
            ->with('success', 'Data Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['company'] = Company::find($id);
        // dd($data);
        return view('pages.company.create', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCompanyRequest  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//        $company = Company::find($id);
//        $company->update($request->all());
//        $this->logsAction(["action" => "Update", "remarks" => "Company id " . $id]);

        $company = Company::find($id);
//        $company->logo = $request->logo->store('/', ['disk' => 'company']);
        $company->name = $request->name;
        $company->email = $request->email;
        $company->phone = $request->phone;
        $company->fax = $request->fax;
        $company->address = $request->address;
        $company->isActive = $request->isActive;
        $company->save();



        return redirect()->route('companies.index')->with('info', 'Data Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Company::find($id)->delete();
        $this->logsAction(["action" => "Destroy", "remarks" => "Company id " . $id]);
        return redirect()->route('companies.index')->with('success', 'Data Deleted Successfully!');
    }
    public function logsAction($data)
    {
        LogTable::store(["action" => $data["action"], "remarks" => $data['remarks'], "action_date" => date("Y-m-d"), "action_time" => date("H:i:s"), "user_id" => auth()->user()->id]);
    }
}
