<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products =[
            [
                'product_id' => 1,
                'title'     => 'Product 1 ',
                'description' => 'Product 1 decription',
                'review'    => '4',
                'img'       => 'https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/13a.jpg',
                'price'     => '400',
                'quantity'  => '20',

            ],
            [
                'product_id' => 2,
                'title'     => 'Product 2 ',
                'description' => 'Product 2 decription',
                'review'    => '3',
                'img'       => 'https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/12a.jpg',
                'price'     => '300',
                'quantity'  => '60',
            ],
            [
                'product_id' => 3,
                'title'     => 'Product 3 ',
                'description' => 'Product 3 decription',
                'review'    => '4',
                'img'       => 'https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/14a.jpg',
                'price'     => '200',
                'quantity'  => '50',
            ]

        ];
        // dd(collect($products)->where('product_id','2'));
        return view('testing_wwo.index',compact('products'));
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
        //
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
        //
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
