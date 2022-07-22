<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LicenseType;
class LicenseTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd('okk');
        $data['license_types']=LicenseType::all();
        // dd($data);
        return view('pages.License.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('pages.License.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLicenseTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input=$request->all();
      $createLice=LicenseType::create($input);
       return redirect()->route('license_types.index')->with('success','Data Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LicenseType  $licenseType
     * @return \Illuminate\Http\Response
     */
    public function show(LicenseType $licenseType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LicenseType  $licenseType
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['license']=LicenseType::find($id);
          return view('pages.License.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLicenseTypeRequest  $request
     * @param  \App\Models\LicenseType  $licenseType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $LicenseType=LicenseType::find($id);
       $LicenseType->name=$request->input('name');
       $LicenseType->save();
       return redirect()->route('license_types.index')->with('info','Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LicenseType  $licenseType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         LicenseType::find($id)->delete();
        return redirect()->route('license_types.index')->with('success','Data Deleted Successfully');
    }
}
