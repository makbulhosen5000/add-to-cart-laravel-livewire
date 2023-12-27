<div class="text-center">
    @if(session()->has('success'))
     <button class="bg-green-600 rounded mb-5 p-5">
         {{ session('success') }}
     </button>
    @endif
    @if(session()->has('info'))
    <button class="bg-blue-600 rounded mb-5 p-5">
        {{ session('info') }}
    </button>
   @endif
   
 </div>
 