<?php

namespace App\Http\Controllers;
use App\Lovelist;
use Auth;
use Cart;
use App\Order;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __contruct()
    {
    	$this->middleware('auth');
    }



    public function lovelist()
    {
      $lovelists=Lovelist::where('uid',Auth::user()->id)->get();	
      return view('front.profile.lovelist',compact('lovelists')); 
    }
    public function addtolist($pid)
    {
      $add=new Lovelist();
      $add->pid=$pid;
      $add->uid=Auth::user()->id;
      $add->save();
      return 'success';
    }

    public function success()
    {
        
       foreach (Cart::getContent()  as $item) {

          $order=new Order();
          $order->uid=Auth::user()->id;
          $order->pid=$item->id;
          $order->quantity=$item->quantity;
          $order->subtotal=$item->attributes->subtotal;
          $order->status=0;
          $order->save();
       }

        Cart::clear();

       return 'success';

    }
}
