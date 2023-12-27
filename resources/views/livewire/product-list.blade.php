<div class="container mx-auto py-8">
    @include('layouts.flash-message')
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
      <!-- Product 1 -->
      @foreach ($products as $product)
      <div class="bg-white rounded-lg shadow-md p-6">
        <img src="{{ $product->image }}" alt="Product 1" class="w-full mb-4 rounded-md">
        <h2 class="text-lg font-semibold mb-2">Name: {{ $product->name }}</h2>
        <p class="text-gray-900 font-semibold mb-2">Price: ${{ $product->price }}</p>
        <p class="text-gray-700 mb-4">Description: {{ $product->description }}</p>
        <button wire:click='addToCart({{ $product->id }})' class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
          Add to Cart
        </button>
      </div>      
      @endforeach
      <!-- Add more product divs as needed -->
    </div>
</div>
  