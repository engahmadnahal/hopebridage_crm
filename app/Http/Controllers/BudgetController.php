<?php

namespace App\Http\Controllers;

use App\Budget;
use Illuminate\Http\Request;
use AmrShawky\LaravelCurrency\Facade\Currency;


class BudgetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $budgets = Budget::get();
        $converted=Currency::convert()
            ->from('EUR') //currncy you are converting
            ->to('USD')     // currency you are converting to
            ->amount(1) // amount in USD you converting to EUR
            ->get();

       return view('projects.budget'  ,[
              'budgets' => $budgets,
              'converted' =>  $converted ,

       ]
       );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


//    public function ConvertCurrency(){
//
//        $converted=Currency::convert()
//            ->from('EUR') //currncy you are converting
//            ->to('USD')     // currency you are converting to
//            ->amount(1200) // amount in USD you converting to EUR
//            ->get();
//
//        return view('projects.budget'  ,[
//                'converted' =>  $converted ,
//            ]
//        );
//    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'item_line' => 'required',
                'unit' => 'required',
                'number_unit' => 'required',
                'unit_price' => 'required',
                'project_id' => 'required',
            ]);
        $budgets = Budget::create([
            'item_line' => $request->input('item_line'),
            'unit' => $request->input('unit'),
            'number_unit' => $request->input('number_unit'),
            'unit_price' => $request->input('unit_price'),
            'project_id' => $request->input('project_id'),

        ]);

        return redirect()->route('projects.budget' );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Budget  $budget
     * @return \Illuminate\Http\Response
     */
    public function show(Budget $budget)
    {

        //$budgets = Budget::all()->get()->latest();
        //$budgets = Budget::latest();


        //return view('projects.budget', [
            //'budgets' => $budgets,
        //]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Budget  $budget
     * @return \Illuminate\Http\Response
     */
    public function edit(Budget $budget)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Budget  $budget
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Budget $budget)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Budget  $budget
     * @return \Illuminate\Http\Response
     */
    public function destroy(Budget $budget)
    {
        //
    }
}
