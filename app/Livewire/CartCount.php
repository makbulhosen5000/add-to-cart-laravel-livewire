<?php

namespace App\Livewire;

use App\Models\ShoppingCart;
use Livewire\Component;

class CartCount extends Component
{
    //for cart count
    public $totalItem = 0;
    protected $listeners = ["updateCartCount"=> "getCartItemCount"];
    public function render()
    {
        $this->getCartItemCount();
        return view('livewire.cart-count');
    }
    //for cart count
    public function getCartItemCount(){
        $this->totalItem= ShoppingCart::whereUserId(auth()->user()->id)->count();
    }
}
