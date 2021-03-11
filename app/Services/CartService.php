<?php

namespace App\Services;

use App\Models\Cart;
use Illuminate\Support\Facades\Cookie;

class CartService
{
    protected $cookieName = 'cart';

    public function getFromCookie()
    {
        $cartId = Cookie::get($this->cookieName);

        return Cart::with(['products.images'])->find($cartId);
    }

    public function getFromCookieOrCreate()
    {
        $cart = $this->getFromCookie();
        
        return $cart ?? Cart::create();
    }

    public function makeCookie(Cart $cart)
    {
        return Cookie::make($this->cookieName, $cart->id, 7 * 24 * 60);
    }

    public function countProducts()
    {
        $cartId = Cookie::get($this->cookieName);
        
        $cart = Cart::with(['products.images'])->find($cartId);
        
        if (!$cart) {
            return 0;
        }
        
        return $cart->products->pluck('pivot.quantity')->sum();
        
        // $cart = $this->getFromCookie();
    }
}