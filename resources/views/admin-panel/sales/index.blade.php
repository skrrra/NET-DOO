@extends('layouts.app')

@section('content')

    <x-admin-panel.layout>
        {{-- @foreach ($products as $product)
            <p class="my-10">{{ $product->onsale }}</p>
        @endforeach --}}
        <div class="w-full mt-8 lg:mt-6">
            <div class="grid grid-cols-1 gap-y-4 md:grid-cols-2 md:gap-x-4 md:gap-y-4 lg:grid-cols-3 lg:gap-x-4 lg:gap-y-4 xl:grid-cols-4 2xl:grid-cols-5">  
              @foreach ($products as $product)
                <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700  rounded-md shadow-sm px-4 py-4">
                  <div class="flex justify-between mb-4">
                    <div class="flex items-center text-xs">
                      @switch($product)
                        @case($product->onsale->amount == 0)
                          <div class="bg-red-600 rounded-full h-2.5 w-2.5 mr-1.5"></div>
                          <p>{{ $product->onsale->amount }} na stanju</p>
                          @break
                        @case($product->onsale->amount > 0 && $product->onsale->amount <= 3)
                          <div class="bg-yellow-600 rounded-full h-2.5 w-2.5 mr-1.5"></div>
                          <p>{{ $product->onsale->amount }} na stanju</p>                        
                          @break
                        @case($product->onsale->amount > 3)
                          <div class="bg-green-600 rounded-full h-2.5 w-2.5 mr-1.5"></div>
                          <p>{{ $product->onsale->amount }} na stanju</p> 
                          @break  
                        @default
                      @endswitch
                    </div>
    
                    <div class="flex flex-row">
                      <div class="hover:bg-gray-200 rounded-md py-1 px-1">
                        <a href="/admin-panel/sales/{{ $product->id }}/edit" class="hover:text-blue-600 dark:hover:text-blue-300">
                          <x-icons.edit size="18"></x-icons.edit>
                        </a>
                      </div>
                      <div class="mr-2 hover:bg-gray-200 rounded-md py-1 px-1">
                        <a href="/admin-panel/sales/{{ $product->id }}/delete" class="hover:text-blue-600 dark:hover:text-blue-300">
                          <x-icons.trash size="18"></x-icons.trash>
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="mb-5">
                    @if (strlen($product->onsale->name) > 35)
                        <p>{{ substr($product->onsale->name, 0, 35).' [...]' }}</p>
                    @else
                        <p>{{ $product->onsale->name }}</p>
                    @endif
                  </div>
                  <div class="flex mb-4 cursor-pointer"> 
                    @if ($product->first_image != null) 
                        <img src="{{ $product->image_url }}" class="w-full rounded-md object-contain h-40">
                    @else  
                      <p>Nema slike na piku</p>
                    @endif
                  </div>
    
                  <div class="w-full mb-2">
                    <a href="/admin-panel/product/{{ $product->onsale->id }}" class="font-semibold text-base block truncate hover:text-blue-600 dark:hover:text-blue-300">{{ ucwords($product->name) }}</a>
                  </div>
                  <div class="mb-1">
                      <p class="font-bold">Proizvod snižen {{ $product->percent_off }}%</p>
                  </div>
                  <div class="text-sm">
                      <p><span class="line-through">{{ $product->onsale->price }}</span> BAM</p>

                    <div class="flex justify-between text-sm">
                      <p class="font-semibold"><span>{{ $product->onsale->price - (($product->percent_off / 100) * $product->onsale->price) }}</span> BAM</p>
                      @switch($product->onsale->state)
                        @case(0)
                          <div>
                            <p>Novo</p>
                          </div>
                          @break
                        @case(1)
                          <div>
                            <p>Polovno</p>
                          </div>
                          @break
                        @case(2)
                          <div>
                            <p>Refurbished</p>
                          </div>
                          @break
                        @default  
                      @endswitch
                    </div>
                  </div>
                </div>
    
                @if ($loop->last)
                  <div class="sm:mb-4 md: mb-0">
                  </div>
                @endif
              @endforeach
            </div>              
          </div>
    </x-admin-panel.layout>

@endsection