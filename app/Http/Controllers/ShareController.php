<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Share;

class ShareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $shares = Share::all();

        return response()->json(['shares'=>$shares,'status'=>'success']);
        //return view('shares.index',compact('shares'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('shares.create');
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
            'share_name' => 'required|min:5|max:191',
            'share_price' => 'required|integer',
            'share_qty' => 'required|integer'
        ]);

        $share= new Share();
        $share->share_name= $request->get('share_name');
        $share->share_price= $request->get('share_price');
        $share->share_qty= $request->get('share_qty');
        $share->save();
        return redirect('/shares')->with('success','Stock has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $share=Share::find($id);
        abort_if(!$share,403);
        return view('shares.edit',compact('share'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $share=Share::find($id);
        abort_if(!$share,403);

        $request->validate([
            'share_name'=> 'required|min:5',
            'share_price'=> 'required',
            'share_qty'=> 'required',
        ]);

        $share->share_name=$request->get('share_name');
        $share->share_price=$request->get('share_price');
        $share->share_qty=$request->get('share_qty');
        $share->save();
        return redirect('/shares')->with('success','Stock has been updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $share = Share::find($id);
        $share->delete();

        return redirect('/shares')->with('success', 'Stock has been deleted Successfully');
    }
}
