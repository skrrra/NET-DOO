@extends('layouts.app')

@section('content')
    <x-admin-panel.layout>

      {{-- ADMIN PANEL ACTION BAR START --}}
      <div class="md:flex md:flex-row-reverse md:justify-between">
        <a href="/admin-panel/product/create" class="border font-semibold flex border-gray-200 shadow-sm py-2 px-4 bg-gray-600 text-white rounded-md hover:bg-gray-700 justify-center">
          Dodaj proizvod
          <div class="ml-2 flex">
            <x-icons.add size="18"></x-icons.add>
          </div>
        </a>

        <form action="/admin-panel/product/search" method="POST" class="flex flex-col md:flex-row mt-4 md:mt-0">
          @csrf
          @method('GET')

          <div class="flex flex-col md:flex-row">
            <select name="category" id="" class="rounded-md border border-gray-200 focus:ring-2 focus:ring-blue-600 outline-none focus:outline-none focus:border-transparent mb-2 md:mb-0 md:mr-2">
              @isset($currentCategory)
                <option value="{{ $currentCategory->id }}">{{ $currentCategory->name }}</option>
              @endisset
                <option value="0">Sve kategorije</option>  
              @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>                      
              @endforeach
            </select>

            <select name="order" id="" class="rounded-md border-gray-200 border focus:ring-2 focus:ring-blue-600 outline-none focus:outline-none focus:border-transparent mb-2 md:mb-0 md:mr-2">
              <option value="created_at,DESC">Najnovije</option>
              <option value="created_at,ASC">Najstarije</option>
              <option value="price,DESC">Cijena najvisa</option>
              <option value="price,ASC">Cijena najniza</option>
            </select>
                
            <select name="perPage" id="" class="rounded-md border border-gray-200 focus:ring-2 focus:ring-blue-600 outline-none focus:outline-none focus:border-transparent mb-4 md:mb-0 md:mr-2">
              <option value="10">Po 10</option>
              <option value="60">Po 60</option>
              <option value="90">Po 90</option>
            </select>
          </div>

          <button type="submit" class="bg-blue-600 text-white py-2 font-semibold border border-gray-200 rounded-md w-full flex flex-1 md:max-w-xs md:px-4 hover:bg-blue-700">
            <div class="mx-auto flex items-center">
              <p class="mr-1">Traži</p>
              <x-icons.search size="18"></x-icons.search>
            </div>
          </button>
        </form>
      </div>

      <div class="w-full mt-8 lg:mt-6">
        <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 sm:gap-4 md:grid-cols-2 lg:grid-cols-3 lg:mb-8 xl:grid-cols-4 xl:gap-6 xl:mb-0 2xl:grid-cols-5">  
          @foreach ($products as $product)
            <div class="bg-white border border-gray-200  rounded-md shadow-sm">
              <div class="flex justify-between px-4 py-4">
                <div class="flex items-center">
                  @switch($product)
                    @case($product->amount == 0)
                      <div class="bg-red-600 rounded-full h-2.5 w-2.5 mr-1.5"></div>
                      <p class="text-xs">{{ $product->amount }} na stanju</p>
                      @break
                    @case($product->amount > 0 && $product->amount <= 3)
                      <div class="bg-yellow-600 rounded-full h-2.5 w-2.5 mr-1.5"></div>
                      <p class="text-xs">{{ $product->amount }} na stanju</p>                        
                      @break
                    @case($product->amount > 3)
                      <div class="bg-green-600 rounded-full h-2.5 w-2.5 mr-1.5"></div>
                      <p class="text-xs">{{ $product->amount }} na stanju</p> 
                      @break  
                    @default
                  @endswitch
                </div>

                <div class="flex">
                  <a href="/admin-panel/product/{{ $product->id }}/edit" class="hover:text-blue-600" target="_blank">
                    <x-icons.edit size="18"></x-icons.edit>
                  </a>
                </div>
              </div>

              <div class="flex px-4">
                <img src="{{ $product->image }}" class="inline-block h-52 bg-green-300 mx-auto rounded-md">
              </div>

              <div class="px-4 pt-4 pb-2 w-full">
                <a href="/admin-panel/product/{{ $product->id }}" class="font-semibold text-xl block truncate hover:text-blue-600">{{ ucwords($product->name) }}</a>
              </div>

              <div class="px-4 pb-4 pt-2 flex justify-between text-sm">
                <div>
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
              <div class="sm:mb-4">
              </div>
            @endif
          @endforeach
        </div>

        @if ($products->links())
          <div class="md:mt-4 md:mb-4">
            {{ $products->appends(['category' => request()->category, 'order' => request()->order, 'perPage' => request()->perPage])->links() }}
          </div>
        @endif              
      </div>

    </x-admin-panel.layout>
@endsection