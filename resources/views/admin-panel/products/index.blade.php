@extends('layouts.app')

@section('content')    
{{-- Able to extend itself  --}}
    <div class="w-full min-h-screen">
        {{-- Able to extend itself  --}}

        {{-- Mobile navigation with hamburger start --}}
        
        <div class="w-full bg-white py-4 px-4 fixed top-0 left-0 flex justify-between items-center border-b border-gray-200">

            <div>
                <a href="/admin-panel" class="font-medium">Admin panel</a>
            </div>
            
            <div>
                <x-icons.hamburger size="20"></x-icons.hamburger>
            </div>
            
        </div>

        {{-- Mobile navigation with hamburger end --}}

        <div class="min-h-screen w-full mt-14 px-4 py-8">

          <div class="mb-8">
            <form action="/admin-panel/products/search" method="POST">
                @csrf
                @method('GET')

                <select name="category" id="" class="w-full rounded-md border-gray-300 focus:ring-2 focus:ring-blue-600 outline-none focus:outline-none focus:border-transparent">

                  @isset($currentCategory)
                    <option value="{{ $currentCategory }}">{{ $currentCategory->name }}</option>
                  @endisset

                    <option value="0">Svi</option>  

                  @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>                      
                  @endforeach

                </select>
                  
                <button type="submit" class="bg-blue-600 py-2 px-4 text-white rounded-md w-full mt-4">Trazi</button>
            </form>
          </div>

          @foreach ($products as $product)

          
          @foreach ($product->categories as $productCategory)
            <div>
              {{ $productCategory->name }}
            </div>
          @endforeach

              <div class="bg-white border border-gray-200 mb-8 rounded-md shadow-sm">

                <div class="flex justify-between px-4 py-4">

                  <div class="flex items-center">
                    @switch($product)

                        @case($product->amount == 0)
                            <div class="bg-red-600 rounded-full h-2.5 w-2.5 mr-1.5"></div>
                            <p class="text-sm">{{ $product->amount }} na stanju</p>
                            @break

                        @case($product->amount > 0 && $product->amount <= 10)
                            <div class="bg-yellow-600 rounded-full h-2.5 w-2.5 mr-1.5"></div>
                            <p class="text-sm">{{ $product->amount }} na stanju</p>                        
                            @break
                            
                        @case($product->amount > 10)
                            <div class="bg-green-600 rounded-full h-2.5 w-2.5 mr-1.5"></div>
                            <p class="text-xs">{{ $product->amount }} na stanju</p> 
                            @break  
                        @default

                    @endswitch
                  </div>

                  <div class="flex">
                    <x-icons.edit size="18"></x-icons.edit>
                  </div>
                </div>

                <div>
                  <img src="{{ $product->image_url }}">
                </div>

                <div class="px-4 py-4 w-full">
                  <h3 class="font-semibold text-xl">{{ ucwords($product->name) }}</h3>
                </div>

                <div class="px-4 pb-4 flex justify-between text-sm">

                  <div class="self-center">
                    <p>{{ $product->price }} BAM</p>
                  </div>

                  @switch($product->state)
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

              @if ($loop->last)
                  <div class="mb-8">
                  </div>
              @endif
          @endforeach

          @if ($products->links())
              <div class="mb-12">
                {{ $products->appends(['category' => request()->category])->links() }}
              </div>
          @endif

        </div>
        
        {{-- Mobile user action menu start --}}
        
        <div class="w-full bg-white py-4 px-4 fixed bottom-0 left-0 flex items-center justify-between border-t border-gray-200">
            
            <div>
                <x-icons.bell size="20"></x-icons.bell>
            </div>
            
            <div>
                <x-icons.truck size="20"></x-icons.truck>
            </div>
            
            <div>
                <x-icons.precent size="20"></x-icons.precent>
            </div>
            
            <div>
              <a href="/admin-panel/products" class="text-blue-600">
                <x-icons.tv size="20"></x-icons.tv>
              </a>
            </div>
            
            <div>
                <x-icons.list size="20"></x-icons.list>
            </div>
            
        </div>

        {{-- Mobile user action menu end --}}
    </div>
    @endsection