<div>
    <div class="py-3 py-md-5">
        <div class="container">
            <h4>My Cart</h4>
            <hr>

            <div class="row">
                <div class="col-md-12">
                    <div class="shopping-cart">

                        <div class="cart-header d-none d-sm-none d-mb-block d-lg-block">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Products</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Price</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Quantity</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Remove</h4>
                                </div>
                            </div>
                        </div>

                        @forelse ($cart as $cartItem)
                        @if ($cartItem->product)
                        <div class="cart-item">
                            <div class="row">
                                <div class="col-md-6 my-auto">
                                    <a href="#">
                                        <label class="product-name">
                                            <img src="{{ asset('uploads/products/' . $cartItem->product->image) }}" style="width: 50px; height: 50px" alt="">
                                            {{ $cartItem->product->product_name }}
                                        </label>
                                    </a>
                                </div>
                                <div class="col-md-2 my-auto">
                                    <label class="price">Rp{{ sprintf('%.3f', $cartItem->product->price * $cartItem->quantity) }}</label>
                                    @php $totalPrice += $cartItem->product->price * $cartItem->quantity @endphp
                                </div>
                                <div class="col-md-2 col-7 my-auto">
                                    <div class="quantity">
                                        <div class="input-group">
                                            <button type="button" wire:click="decrementQuantity({{ $cartItem->id }})" class="btn btn1"><i class="fa fa-minus"></i></button>
                                            <input type="text" value="{{ $cartItem->quantity }}" class="input-quantity" disabled>
                                            <button type="button" wire:click="incrementQuantity({{ $cartItem->id }})" class="btn btn1"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 col-5 my-auto">
                                    <div class="remove">
                                        <button type="button" wire:click="removeCartItem({{ $cartItem->id }})" class="btn btn-danger btn-sm">
                                            <span wire:loading.remove wire:target="removeCartItem({{ $cartItem->id }})">
                                                <i class="fa fa-trash"></i> Remove
                                            </span>
                                            <span wire:loading wire:target="removeCartItem({{ $cartItem->id }})">
                                                <i class="fa fa-trash"></i> Removing
                                            </span>
                                        </button>

                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @empty
                        <div>No Cart Items available</div>
                        @endforelse

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <h4>
                        Get the best deals & Offers <a href="{{ url('/collections') }}">shop now</a>
                    </h4>
                </div>
                <div class="col-md-4 mt-3">
                    <div class="shadow-sm bg-white p-3">
                        <h4>Total:
                            <span class="float-end">Rp{{ sprintf('%.3f', $totalPrice) }}</span>
                        </h4>
                        <hr>
                        <a href="{{ url('/checkout') }}" class="btn btn-warning w-100">Checkout</a>
                    </div>
                    
                </div>

            </div>

        </div>
    </div>
</div>