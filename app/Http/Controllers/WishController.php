<?php

namespace App\Http\Controllers;

use App\Models\Wish;
use Illuminate\Http\Request;

class WishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return request()->user()->wishes;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $wish = request()->user()->wishes()->create($this->validateData());
        // Wish::create([
        //     'name' => request('name'),
        //     'wish'  => request('wish'),
            
        // ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Wish  $wish
     * @return \Illuminate\Http\Response
     */
    public function show(Wish $wish)
    {
        if(request()->user()->isNot($wish->user)){
            return \response([],403);
        }
        return $wish;
    //    return response()->json($wish,Response::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Wish  $wish
     * @return \Illuminate\Http\Response
     */
    public function edit(Wish $wish)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Wish  $wish
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wish $wish)
    {
        if(request()->user()->isNot($wish->user)){
            return \response([],403);
        }

        $wish->update($this->validateData());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wish  $wish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wish $wish)
    {
        if(request()->user()->isNot($wish->user)){
            return \response([],403);
        }
        $wish->delete();
    }

    private function validateData(){
        return \request()->validate([
            'name' => 'required|max:255',
            'wish' => 'required|max:255',
        ]);

    }
}
