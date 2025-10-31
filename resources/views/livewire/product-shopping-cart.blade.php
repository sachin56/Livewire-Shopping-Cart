<div class="container my-5">
    <h1 class="text-center mb-4 pb-2 border-bottom border-primary text-primary fw-bold">
        Shopping Cart
    </h1>

    @if (session()->has('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row g-4">
        <div class="col-lg-8">
            <h2 class="h4 mb-3 pb-2 border-bottom">Available Products</h2>

            <div class="row row-cols-1 row-cols-md-2 g-4">
                @if(isset($this->products) && count($this->products) > 0)
                    @foreach ($this->products as $product)
                        <div class="col">
                            <div class="card shadow-sm h-100">
                                <div class="card-img-top overflow-hidden" style="height: 200px;">
                                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-100 h-100 object-fit-cover" loading="lazy">
                                </div>
                                
                                <div class="card-body d-flex flex-column text-center">
                                    <h5 class="card-title fw-bold text-truncate">{{ $product->name }}</h5>
                                    <p class="card-text fs-3 fw-light text-success mb-3">Rs {{ number_format($product->price, 2) }}</p>
                                    
                                    <button 
                                        wire:click="addToCart({{ $product->id }})" 
                                        class="btn btn-primary fw-bold mt-auto"
                                    >
                                        <i class="bi bi-cart-plus-fill"></i> Add to Cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow-lg sticky-top" style="top: 20px;">
                <div class="card-header bg-primary text-white">
                    <h2 class="h5 mb-0">Shopping Cart</h2>
                </div>
                <div class="card-body">
                    @if (empty($this->cart))
                        <div class="text-center py-5 text-muted">
                            <i class="bi bi-basket h1 d-block mb-3"></i>
                            <p class="mb-0 fst-italic">Your cart is empty.</p>
                        </div>
                    @else
                        <ul class="list-group list-group-flush mb-4">
                            @foreach ($this->cart as $item)
                                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                    <div class="me-2">
                                        <h6 class="mb-0 text-truncate">{{ $item['name'] }}</h6>
                                        <small class="text-muted">Rs {{ number_format($item['price'], 2) }} each</small>
                                    </div>
                                    
                                    <div class="d-flex align-items-center">
                                        <button wire:click="decrementQuantity({{ $item['id'] }})" class="btn btn-sm btn-outline-secondary rounded-circle me-1" style="width: 30px; height: 30px;">
                                            &minus;
                                        </button>
                                        <span class="px-2">{{ $item['quantity'] }}</span>
                                        <button wire:click="incrementQuantity({{ $item['id'] }})" class="btn btn-sm btn-outline-secondary rounded-circle ms-1" style="width: 30px; height: 30px;">
                                            +
                                        </button>
                                        
                                        <div class="text-end ms-3">
                                            <div class="fw-bold text-success">Rs {{ number_format($item['price'] * $item['quantity'], 2) }}</div>
                                            <button wire:click="removeItem({{ $item['id'] }})" class="btn btn-sm btn-link text-danger p-0 mt-1" title="Remove Item">
                                                <i class="bi bi-x-lg"></i>
                                            </button>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>

                        <div class="border-top pt-3">
                            <p class="fs-5 fw-bold d-flex justify-content-between">
                                <span>Total Price:</span>
                                <span class="text-danger">Rs {{ $this->cartTotal }}</span>
                            </p>
                        </div>

                        <button wire:click="emptyCart" class="btn btn-outline-danger w-100 mt-3">
                            Clear Cart
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>