<div>
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h4>Price</h4>
                </div>
                <div class="card-body">
                    <label class="d-block">
                        <input type="radio" name="priceSort" wire:model="priceInput" value="high-to-low" /> High to Low
                    </label>
                    <label class="d-block">
                        <input type="radio" name="priceSort" wire:model="priceInput" value="low-to-high" /> Low to High
                    </label>

                </div>
            </div>

        </div>
        <div class="col-md-9">


            <div class="row">
                @forelse ($products as $productItem)
                <div class="col-md-3">
                    <div class="product-card">
                        <div class="product-card-img">
                            @if ($productItem->quantity > 0)
                            <label class="stock bg-success">In Stock</label>
                            @else
                            <label class="stock bg-danger">Out of Stock</label>
                            @endif

                            <img src="{{ $productItem->image_url }}" alt="{{ $productItem->name }}">
                        </div>
                        <div class="product-card-body">
                            <h5 class="product-name">
                                <a href="{{ url('/collections/' . $category->id . '/' . $productItem->id) }}">
                                    {{ $productItem->product_name }}
                                </a>
                            </h5>
                            <div>
                                <span class="selling-price">Rp{{ $productItem->price }}</span>
                            </div>
                            <div class="mt-2">
                                <a href="" class="btn btn1">Add To Cart</a>
                                <a href="" class="btn btn1"> <i class="fa fa-heart"></i> </a>
                                <a href="{{ url('/collections/' . $category->id . '/' . $productItem->id) }}" class="btn btn1"> View </a>
                            </div>
                        </div>
                    </div>
                </div>

                @empty
                <div class="col-md-12">
                    <div class="p-2">
                        <h4>
                            @isset($category)
                            No Products Available for {{ $category->name }}
                            @else
                            No Products Available
                            @endisset
                        </h4>
                    </div>
                </div>
                @endforelse

            </div>
        </div>
    </div>
    <div>