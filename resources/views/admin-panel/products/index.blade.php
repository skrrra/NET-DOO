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
              <div class="bg-white border border-gray-200 pb-6">

                <div class="flex justify-end py-2 px-4">
                  <x-icons.edit size="22"></x-icons.edit>
                </div>

                <div class="border-t border-b">
                  <img src="{{ $product->image_url }}">
                </div>

                <div class="py-2 px-4 flex justify-between items-center">
                  <h3 class="font-medium text-lg">
                    {{ ucfirst($product->name) }}
                  </h3>
                  <h3 class="font-medium">
                    {{ $product->price }}
                    BAM
                  </h3>
                </div>

                <div class="flex justify-between">
                  <div>

                    @foreach ($product->categories as $category)
                    <div class="w-10/12">
                      <p class="px-4 text-sm">
                        {{ $category->name }} 
                      </p>
                    </div>
                    @endforeach
                  </div>
                    <div class="">
                    <p class="">
                      @switch($product->state)
                          @case(0)
                            <div class="">
                              {{ $product->state }}
                            </div>
                            @break
                          @case(1)
                              <div class="bg-yellow-400 mr-4 text-white py-1 px-2 rounded-md">
                                <p>Polovno</p>
                              </div>
                              @break
                              @case(2)
                              <div>
                                {{ $product->state }}

                              </div>
                              @break
                          @default
                              
                      @endswitch
                    </p>
                  </div>
                </div>

                <div>

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