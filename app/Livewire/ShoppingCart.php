<?php

namespace App\Livewire;

use App\Models\ShoppingCart as Cart;
use Livewire\Component;

class ShoppingCart extends Component
{
    public $cartItems, $subTotal=0,$total=0, $tax=0,$totalCartItem=0;

    
    public function render()
    {
        $this->cartItems = Cart::with('product')->
        where(['user_id'=>auth()->user()->id])->get();
        $this->subTotal=0; $this->total=0; $this->tax=0;$this->totalCartItem=0;
        foreach($this->cartItems as $cartItem) {
            $this->subTotal += $cartItem->product->price * $cartItem->quantity;
            $this->total = $this->subTotal - $this->tax;
            $this->totalCartItem = $cartItem->quantity;
        }
 
        return view('livewire.shopping-cart');
    }
    //for cart count
    public function increaseQuantity($id){
        $cart = Cart::whereId($id)->first();
        $cart->quantity += 1;
        $cart->save();
        session()->flash('success','Product Quantity Updated!');
    }
   public function decreaseQuantity($id){
    $cart = Cart::whereId($id)->first();
     if($cart->quantity > 1){
         $cart->quantity -= 1;
         $cart->save();
         session()->flash('success','Product Quantity Updated!');
     }else{
        session()->flash('info','You Can not have less than 1 quantity ');
     }
 
   }

   public function removeItem($id){
        $cart = Cart::whereId($id)->first();
        if($cart){
            $cart->delete();
        }
        session()->flash('success','product remove successfully from cart');
   }

}
