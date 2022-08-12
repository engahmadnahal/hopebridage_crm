<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item = Item::all();
        return response()->view('items.index', ['item' => $item]);
    }
    public function getData()
    {
        $items = Item::all();
        return Datatables::of($items)
            ->addColumn(
                'titlelink',
                '<a href="{{ route("vouchers.show",[$external_id]) }}">{{$title}}</a>'
            )
            ->editColumn('item_code', function ($items) {
                return $items->item_code;
            })
            ->editColumn('quantity', function ($items) {
                return $items->quantity;
            })
            ->editColumn('unit', function ($items) {
                return $items->unit;
            })
            ->editColumn('notes', function ($items) {
                return $items->notes;
            })
            
            ->rawColumns(['titlelink', 'view', 'status_id'])
            ->make(true);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = Item::all();
        return response()->view('items.create', ['items' => $items]);
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
                'item_code' => 'required',
                'unit' => 'required',
                'quantity' => 'required',
                'notes' => 'nullable',
            ],
            [
                'item_code' => 'item code.required',
                'unit' => 'unit.required',
                'quantity' => 'quantity.required',
            ]
        );
        $item = Item::create([
            'item_code' => $request->input('item_code'),
            'unit' => $request->input('unit'),
            'quantity' => $request->input('quantity'),
            'notes' => $request->input('notes'),
        ]);

        return redirect()->route('vouchers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        return response()->view('items.edit', ['items' => $item]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        //
        $request->validate(
            [
                'item_code' => 'required',
                'unit' => 'required',
                'quantity' => 'required',
                'notes' => 'nullable',
            ],
            [
                'item_code' => 'item code.required',
                'unit' => 'unit.required',
                'quantity' => 'quantity.required',
            ]
        );
        $item = Item::create([
            'item_code' => $request->input('item_code'),
            'unit' => $request->input('unit'),
            'quantity' => $request->input('quantity'),
            'notes' => $request->input('notes'),
        ]);
        $item->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        //
    }
}
