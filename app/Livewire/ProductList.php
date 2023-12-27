<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\ShoppingCart;
use Livewire\Component;

class ProductList extends Component
{
    public $products;

    public function addToCart($id){
       if(auth()->user()){
         $data = [
            'user_id'=>auth()->user()->id,
            'product_id' =>$id
         ];
         ShoppingCart::updateOrCreate($data);
         //for cart count
         $this->dispatch('updateCartCount');
         session()->flash('success','Product Added Successfully');
       }else{
        return redirect()->route('login');
       }
    }
    public function render()
    {
        $this->products = Product::get();
        return view('livewire.product-list');
    }
}
