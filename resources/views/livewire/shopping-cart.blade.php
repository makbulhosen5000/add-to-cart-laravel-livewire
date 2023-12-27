<div class="container mx-auto py-6">
    @include('layouts.flash-message')
    <div class="flex flex-col">
      <!-- Cart Items -->
      <div class="-my-2 overflow-x-auto">
        <div class="py-2 align-middle inline-block min-w-full">
          <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200 text-center">
              <thead class="bg-gray-50">
                <tr>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Product Image
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Product Name
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Quantity
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                   Unit Price
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Total Price
                   </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Action
                  </th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200  text-center">
                <!-- Cart items dynamically added here -->
                <!-- Example cart item -->
                @foreach ($cartItems as $item)
                <tr class="text-center">
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                      <div class="flex-shrink-0 h-10 w-10">
                        <img class="h-10 w-10 rounded-lg" src="{{ $item->product->image }}" alt="Product Image">
                      </div>

                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                      <div class="ml-4">
                        <div class="text-sm font-medium text-gray-900">{{ $item->product->name }}</div>
                      </div>
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                      <button class="text-gray-600 focus:outline-none focus:text-gray-700" wire:click="decreaseQuantity({{ $item->id }})">-</button>
                      <span class="w-10 text-center border-gray-300 focus:border-blue-500 focus:ring-blue-500 focus:outline-none" >{{$item->quantity }}</span>
                      <button class="text-gray-600 focus:outline-none focus:text-gray-700" wire:click="increaseQuantity({{ $item->id }})">+</button>
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    ${{ $item->product->price}}
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    ${{ $item->product->price * $item->quantity}}
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <button wire:click="removeItem({{ $item->id }})" class="text-red-500 hover:text-red-700 focus:outline-none">Remove</button>
                  </td>
                </tr>               
                @endforeach
                <!-- Add more cart items dynamically -->
              </tbody>
            </table>
          </div>
        </div>
      </div>
  
      <!-- Cart Summary -->
      <div class="mt-6">
        <div class="bg-white p-6 shadow-md rounded-lg">
          <h2 class="text-lg font-semibold">Cart Summary</h2>
          <div class="flex justify-between mt-4">
            <p class="text-gray-600">Total Items: <span class="font-semibold">{{ $totalCartItem }}</span></p>
            <p class="text-gray-600">Sub Total: <span class="font-semibold">${{ $subTotal }}</span></p>
            <p class="text-gray-600">Tax: <span class="font-semibold">${{ $tax }}</span></p>
            <p class="text-gray-600">Total: <span class="font-semibold">${{ $total }}</span></p>
          </div>
          <div class="mt-6">
            <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
              Checkout
            </button>
            <button wire:navigate href="{{ url('/') }}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
              Continue Shopping
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
  
