<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Order;
use App\Models\Product;
class BoSungController extends Controller
{
    public function xemdonhang(){
    	$transaction = Transaction::orderBy('id','DESC')->paginate(10);
    	return view('admin.order.list_order')->with(compact('transaction'));
    }
    public function chitietdonhang($id){
    	$order = Order::with('product')->where('od_transaction_id',$id)->get();

    	return view('admin.order.detail_order')->with(compact('order'));
    }
    public function autocomplete_ajax(Request $request){
    	if(isset($_GET['query'])){
    		$data = $_GET['query'];
    	}else{
    		$data = '';
    	}
       
       	$output = '';
	        if($data){

	            $product = Product::where('pro_name','LIKE','%'.$data.'%')->get();

	            $output.= '
	            <ul class="dropdown-menu" style="position:ralative; display:block;">'
	            ;

	            foreach($product as $key => $val){
	             $output.= '
	             <li class="li_search_ajax"><a href="#">'.$val->pro_name.'</a></li>
	             ';
	         	}

	        $output.= '</ul>';
	     
     	}

     	   echo $output;
 	}
}
