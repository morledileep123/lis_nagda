<?php

namespace App\Http\Controllers\Admin\fees;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Helpers;
use App\Models\fees\FeesHeadMast;
use App\Models\fees\FineType;

class HeadsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $fees_heads = FeesHeadMast::where('batch_id',session('current_batch'))->with(['fine_type','batch'])->orderBy('head_sequence_order','ASC')->get();
        // return $fees_heads;

        return view ('admin.fees.heads.index',compact('fees_heads'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){   
        return view ('admin.fees.heads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
         // return $request->all();

        $data = [
            'head_name'             => $request->head_name,
            'head_amnt'             => $request->head_amnt,
            'headtype'              => $request->headtype,
            'batch_id'              => $request->batch_id,
            'head_sequence_order'   => $request->head_sequence_order,
            'refundable'            => $request->refundable !=null ? $request->refundable :'0',
            'is_installable'        => $request->is_installable !=null ? $request->is_installable :'0',
            'applicable_on'         => $request->applicable_on,
            'status'                => $request->status,

        ];
// return  $data;



        // $data['name'] = $request->head_name;
        // $data['amount'] = $request->head_amnt;
        // $data['head_type'] = $request->headtype;
        // $data['head_sq_no'] = $request->head_sequence_order;
        // $data['refundable_status'] = $request->refundable;
        // $data['type'] = $request->applicable_on;
        // $data['instalment_applicable_status'] = $request->is_installable;
        $fees_head = FeesHeadMast::create($data);

        foreach ($request->fine_type as $key => $fine_type) {
            if($request->fine_type !=null){
                $fineTypeData = [
                    'fees_head_id'  => $fees_head->fees_head_id,
                    'fine_type'     => $fine_type,
                    'fine'          => $request->fine[$key],
                    'fine_day'      => $request->fine_day[$key],
                    'fine_amt'      => $request->fine_amount[$key],
                    'status'        => $request->status,
                ]; 
                FineType::create($fineTypeData);
            }
        }


        // for ($i=0; $i < count($request->fine_type); $i++) { 
            
        //     $data2 = array(
        //         'fees_head_mast_id'=>$lastId,
        //         'fine_type'=>$request->fine_type[$i],
        //         'fine_amount_status'=>$request->fine[$i],
        //         'no_of_days'=>$request->fine_day[$i],
        //         'fine_amount'=>$request->fine_amount[$i]
        //     );
            
        //     FineType::create($data2);
        // }
        return redirect()->back()->with('success','Fees Head created successfully');
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
        $data['name'] = $request->head_name;
       
        $lastId = FeesHeadMast::find($id)->update($data);
        return redirect()->back()->with('success','Heads updated successfully');

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
    }
}
