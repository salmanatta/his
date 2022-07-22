<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\ExpenseCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Pharmacy\LogController as LogTable;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['expenses']=Expense::all();
       return view('pages.pre_configuration.expense.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['expense_categories']=ExpenseCategory::all();
        return view('pages.pre_configuration.expense.create',$data);
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
        
        $create = Expense::create($inputs);
        $this->logsAction(["action" => "Store", "remarks" => "Company id " . $create->id]);

        return redirect()->route('expenses.index')
            ->with('success', 'Data Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['expense']=Expense::find($id);
        $data['expense_categories']=ExpenseCategory::all();
        return view('pages.pre_configuration.expense.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $expense=Expense::find($id);
        $expense->name=$request->name;
        $expense->note=$request->note;
        $expense->date=$request->date;
        $expense->amount=$request->amount;
        $expense->save();
        return redirect()->route('expenses.index')->with('success', 'Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         Expense::find($id)->delete();
        $this->logsAction(["action" => "Destroy", "remarks" => "expense id " . $id]);
        return redirect()->route('expenses.index')->with('success', 'Data Deleted Successfully!');
    }
     public function logsAction($data)
    {
        LogTable::store(["action" => $data["action"], "remarks" => $data['remarks'], "action_date" => date("Y-m-d"), "action_time" => date("H:i:s"), "user_id" => auth()->user()->id]);
    }
}
