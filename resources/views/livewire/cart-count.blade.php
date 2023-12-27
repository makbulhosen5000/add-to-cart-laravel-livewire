<x-nav-link :href="route('shopping.cart')" :active="request()->routeIs('shopping.cart')">
<div class="flex items-center gap-2">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <circle cx="6" cy="19" r="2"></circle>
        <circle cx="16" cy="19" r="2"></circle>
        <path d="M1 1h4l3.5 12h8l3.5-9"></path>
      </svg>
      
    <span class="bg-blue-500 text-white w-6 h-6 flex items-center justify-center rounded-full text-xs font-semibold">{{ $totalItem }}</span>

</div>
</x-nav-link>
