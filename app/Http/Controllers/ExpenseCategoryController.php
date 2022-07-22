<?php

namespace App\Http\Controllers;

use App\Models\ExpenseCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Pharmacy\LogController as LogTable;

class ExpenseCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['expense_categories']=ExpenseCategory::all();
        return view('pages.pre_configuration.expense-category.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd('okk');
         return view('pages.pre_configuration.expense-category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->all();
        
        $create = ExpenseCategory::create($inputs);
        $this->logsAction(["action" => "Store", "remarks" => " id " . $create->id]);

        return redirect()->route('expense_categories.index')
            ->with('success', 'Data Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExpenseCategory  $expenseCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ExpenseCategory $expenseCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExpenseCategory  $expenseCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['expense_category'] = ExpenseCategory::find($id);
    return view('pages.pre_configuration.expense-category.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ExpenseCategory  $expenseCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $expense=ExpenseCategory::find($id);
        $expense->name=$request->name;
        $expense->save();
        return redirect()->route('expense_categories.index')->with('success', 'Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExpenseCategory  $expenseCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         ExpenseCategory::find($id)->delete();
        $this->logsAction(["action" => "Destroy", "remarks" => "expense id " . $id]);
        return redirect()->route('expense_categories.index')->with('success', 'Data Deleted Successfully!');
    }
    public function logsAction($data)
    {
        LogTable::store(["action" => $data["action"], "remarks" => $data['remarks'], "action_date" => date("Y-m-d"), "action_time" => date("H:i:s"), "user_id" => auth()->user()->id]);
    }
}
