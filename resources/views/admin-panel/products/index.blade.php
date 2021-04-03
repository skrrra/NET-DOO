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

          @foreach ($products as $product)

              <div class="bg-white border border-gray-200 mb-8">

                <div class="flex justify-between px-4 py-4">

                  <div class="flex items-center">
                    @switch($product)

                        @case($product->amount == 0)
                            <div class="bg-red-600 rounded-full h-2.5 w-2.5 mr-1.5"></div>
                            <p class="text-sm">{{ $product->amount }} na stanju</p>
                            @break

                        @case($product->amount > 0 && $product->amount < 10)
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

                <div class="border-t border-b">
                  <img src="{{ $product->image_url }}">
                </div>

                <div class="px-4 py-4 w-full text-center">
                  <h3 class="font-semibold text-lg">asjdasjdjasjdjasjd jasdjas jsadasd asdasdasdas</h3>
                </div>

                <div class="px-4 py-4 flex justify-between text-sm">

                  <div class="self-center">
                    <p>{{ $product->price }} BAM</p>
                  </div>

                  @switch($product->state)
                      @case(0)
                          <div class="bg-green-600 rounded-md text-white px-4 py-1 font-medium">
                            <p>Novo</p>
                          </div>
                          @break
                      @case(1)
                          <div class="bg-yellow-600 rounded-md text-white px-4 py-1 font-medium">
                            <p>Polovno</p>
                          </div>
                          @break
                      @case(2)
                          <div class="bg-blue-600 rounded-md text-white px-4 py-1 font-medium">
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
                {{ $products->links() }}
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
                <x-icons.tv size="20"></x-icons.tv>
            </div>
            
            <div>
                <x-icons.list size="20"></x-icons.list>
            </div>
            
        </div>

        {{-- Mobile user action menu end --}}
    </div>
    @endsection