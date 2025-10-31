<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Session;

class ProductShoppingCart extends Component
{
    /*
     Store Cart Product in Session
    */
    #[Session]
    public array $cart = []; 

    /*
        Fetch All data in Products
    */
    #[Computed] 
    public function products()
    {
        return Product::all();
    }

     /* 
        Add to Cart logic
     */
    public function addToCart(int $productId)
    {
        $product = $this->products()->firstWhere('id', $productId);
        if (!$product) {
            return;
        }

        if (isset($this->cart[$productId])) {
            $this->cart[$productId]['quantity']++;
        } else {
            $this->cart[$productId] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
            ];
        }
    }

    /*
        Update Quantity One By One
    */
    public function incrementQuantity(int $productId)
    {
        if (isset($this->cart[$productId])) {
            $this->cart[$productId]['quantity']++; 
        }
    }

    /*
        Decrement Quantity in Cart Product item
    */
    public function decrementQuantity(int $productId)
    {
        if (isset($this->cart[$productId])) {
            if ($this->cart[$productId]['quantity'] > 1) {
                $this->cart[$productId]['quantity']--; 
            } else {
                $this->removeItem($productId);  // this does if product count less than on remove product from cart
            }
        }
    }

    /*
        Remove Cart Item
    */
    public function removeItem(int $productId)
    {
        unset($this->cart[$productId]);
    }

    /*
        Empty Cart Item
    */
    public function emptyCart()
    {
        $this->cart = [];
        session()->flash('status', 'Your cart has been emptied!');
    }

    /*
        Get Total in Cart
    */
    #[Computed]
    public function cartTotal()
    {
        $total = 0;
        foreach ($this->cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return number_format($total, 2); 
    }

    /*
        Render View
    */
    public function render()
    {
        return view('livewire.product-shopping-cart');
    }
}
