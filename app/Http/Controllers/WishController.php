<?php

namespace App\Http\Controllers;

use App\Models\Wish;
use Illuminate\Http\Request;
use \Illuminate\Http\Response;


class WishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny',Wish::class);
        
        $wishes =  request()->user()->wishes;

        return \response()->json(['data' => $wish],Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     return view('ceate');
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create',Wish::class);
        $wish = request()->user()->wishes()->create($this->validateData());

       return \response()->json(['data' => $wish],Response::HTTP_OK);
 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Wish  $wish
     * @return \Illuminate\Http\Response
     */
    public function show(Wish $wish)
    {
       $this->authorize('view',$wish);
        // return $wish;
       return response()->json(['data'=>$wish],Response::HTTP_OK);
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
        $this->authorize('update',$wish);
       $wish =  $wish->update($this->validateData());
        return \response()->json(['data' => $wish],Response::HTTP_OK);
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
        return \response()->json(['data' => $wish],Response::HTTP_OK);
    }

    private function validateData(){
        return \request()->validate([
            'name' => 'required|max:255',
            'wish' => 'required|max:255',
        ]);

    }
}
