<?php

namespace App\Livewire\Frontend\Checkout;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Str;
use Illuminate\Contracts\Support\ValidatedData;
use Livewire\Component;

class CheckoutShow extends Component
{
    public $totalProductAmount = 0;

    public $fullname, $email, $phone, $pincode, $address, $payment_mode = NULL, $payment_id = NULL;

    public function rules()
    {
        return[
            'fullname' => 'required|string|max:121',
            'email' => 'required|string|max:121',
            'phone' => 'required|string|max:11|min:10',
            'pincode' => 'required|integer|max:6|min:6',
            'address' => 'required|string|max:500',
        ];
    }
    
    public function placeOrder()
    {
        $this ->validate();

        $cartItems = Cart::where('user_id', auth()->user()->id)->get();

        $order = Order::create([
            'user_id' => auth()->user()->id,
            'tracking_no' => 'funda-'.Str::randon(10),
            'fullname' => $this->fullname,
            'email' => $this->email,
            'phone' => $this->phone,
            'pincode' => $this->pincode,
            'address' => $this->address,
            'status_message' => 'in progress',
            'payment_mode' => $this->payment_mode,
            'payment_id' => $this->payment_id,
        ]);

        foreach ($cartItems as $cartItem) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product_id,
                'quantity' => $cartItem->quantity,
                'price' => $cartItem->price,
            ]);
            $this->totalProductAmount = $cartItems->sum(function ($cartItem) {
                return $cartItem->product->price * $cartItem->quantity;
            });

        }
    }

    public function codOrder()
    {
        $this->payment_mode = 'Cash on Delivery';
        $codOrder = $this->placeOrder();
        if ($codOrder) {
            session()->flash('message', 'Order Placed Successfully');
        } else {
            session()->flash('message', 'Something went wrong');
        }
    }

    public function mount()
    {
        $this->calculateTotalProductAmount();
    }

    public function calculateTotalProductAmount()
    {
        $cartItems = Cart::where('user_id', auth()->user()->id)->get();

        $this->totalProductAmount = $cartItems->sum(function ($cartItem) {
            return $cartItem->product->price * $cartItem->quantity;
        });
    }

    public function render()
    {
        $this->fullname = auth()->user()->name;
        $this->email = auth()->user()->name;

        return view('livewire.frontend.checkout.checkout-show', [
            'totalProductAmount' => $this->totalProductAmount
        ]);
    }
}

