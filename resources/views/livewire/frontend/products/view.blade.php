<div>
    <div class="py-3 py-md-5">
        <div class="container">
            @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif

            <div class="row">
                <div class="col-md-5 mt-3">
                    <div class="bg-white border">
                        <img src="{{ asset('uploads/products/' . $product->image) }}" class="w-100" alt="Img">
                    </div>
                </div>
                <div class="col-md-7 mt-3">
                    <div class="product-view">
                        <h4 class="product-name">
                            {{ $product->product_name }}
                        </h4>
                        <hr>
                        <div>
                            <span class="selling-price">Rp{{ $product->price }}</span>
                        </div>
                        <div>
                            @if($product->quantity>0)
                            <label class="btn-sm py-1 mt-2 text-white bg-success"> In Stock </label>
                            @else
                            <label class="btn-sm py-1 mt-2 text-white bg-danger"> Out of Stock </label>
                            @endif

                        </div>

                        <div class="mt-2">
                            <div class="input-group">
                                <span class="btn btn1" wire:click="decrementQuantity"><i class="fa fa-minus"></i></span>
                                <input type="text" wire:model="quantityCount" value="{{ $this->quantityCount }}" class="input-quantity" />
                                <span class="btn btn1" wire:click="incrementQuantity"><i class="fa fa-minus"></i></span>
                                <span class="btn btn1"><i class="fa fa-plus"></i></span>
                            </div>
                        </div>
                        <div class="mt-2">

                            <button type="button" wire:click="addToCart({{ $product->id }})" class="btn btn1"> 
                                <i class="fa fa-shopping-cart"></i> Add To Cart
                            </button>

                            <button type="button" wire:click="addToWishlist({{ $product->id }})" class="btn btn1">
                                <span wire:loading.remove wire:target="addToWishlist">
                                    <i class="fa fa-heart"></i> Add To Wishlist
                                </span>
                                <span wire:loading wire:target="addToWishlist"> Adding...</span>
                            </button>
                        </div>
                        <div class="mt-3">
                            <h5 class="mb-0">Description</h5>
                            <p>
                                {!! $product->description !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>