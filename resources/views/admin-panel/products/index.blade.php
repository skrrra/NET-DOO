@extends('layouts.app')

@section('content')
    <x-admin-panel.layout>

      {{-- ADMIN PANEL ACTION BAR START --}}
      <div class="md:flex md:flex-row-reverse md:justify-between">
        <a href="/admin-panel/product/create" class="text-sm border font-semibold flex border-gray-200 shadow-sm py-2 px-4 bg-blue-600 text-white dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800 dark:hover:text-blue-300 dark:hover:border-blue-300 rounded-md hover:bg-blue-700 justify-center">
          Dodaj proizvod
          <div class="ml-2 flex">
            <x-icons.add size="18"></x-icons.add>
          </div>
        </a>

        <form action="/admin-panel/product/search" method="POST" class="flex flex-col md:flex-row mt-4 md:mt-0">
          @csrf
          @method('GET')

          <div class="flex flex-col md:flex-row">
            <select name="category" id="" class="text-sm rounded-md border border-gray-200 focus:ring-2 focus:ring-blue-600 outline-none focus:outline-none focus:border-transparent mb-2 md:mb-0 md:mr-2 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-700 dark:focus:ring-blue-300">
              @isset($currentCategory)
                <option value="{{ $currentCategory->id }}">{{ $currentCategory->name }}</option>
              @endisset
                <option value="0">Sve kategorije</option>  
              @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }} ({{ $category->products_count}})</option>                      
              @endforeach
            </select>

            <select name="order" id="" class="text-sm rounded-md border-gray-200 border focus:ring-2 focus:ring-blue-600 outline-none focus:outline-none focus:border-transparent mb-2 md:mb-0 md:mr-2 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-700 dark:focus:ring-blue-300">
              <option value="created_at,DESC">Najnovije</option>
              <option value="created_at,ASC">Najstarije</option>
              <option value="price,DESC">Cijena najvisa</option>
              <option value="price,ASC">Cijena najniza</option>
            </select>
                
            <select name="perPage" id="" class="text-sm rounded-md border border-gray-200 focus:ring-2 focus:ring-blue-600 outline-none focus:outline-none focus:border-transparent mb-4 md:mb-0 md:mr-2 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-700 dark:focus:ring-blue-300">
              <option value="10">Po 10</option>
              <option value="20">Po 20</option>
              <option value="30">Po 30</option>
              <option value="40">Po 40</option>
              <option value="50">Po 50</option>
              <option value="60">Po 60</option>
              <option value="70">Po 70</option>
              <option value="80">Po 80</option>
              <option value="90">Po 90</option>
            </select>
          </div>

          <button type="submit" class="text-sm bg-gray-600 text-white py-2 font-semibold border border-gray-200 rounded-md w-full flex justify-center md:max-w-xs md:px-4 hover:bg-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-700 dark:hover:text-blue-300 dark:hover:border-blue-300">
            <div class="flex">
              <p class="mr-2 self-center">Traži</p>
              <x-icons.search size="16"></x-icons.search>
            </div>
          </button>
        </form>
      </div>

      {{-- grid-cols-1 gap-8 sm:grid-cols-2 sm:gap-4 md:grid-cols-2 lg:grid-cols-3 lg:mb-8 xl:grid-cols-4 xl:gap-6 xl:mb-0  2xl:grid-flow-row --}}
      <div class="w-full mt-8 lg:mt-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 lg:gap-x-4 lg:gap-y-4 xl:grid-cols-4 2xl:grid-cols-5">  
          @foreach ($products as $product)
            <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700  rounded-md shadow-sm px-4 py-4">
              <div class="flex justify-between mb-4">
                <div class="flex items-center text-xs">
                  @switch($product)
                    @case($product->amount == 0)
                      <div class="bg-red-600 rounded-full h-2.5 w-2.5 mr-1.5"></div>
                      <p>{{ $product->amount }} na stanju</p>
                      @break
                    @case($product->amount > 0 && $product->amount <= 3)
                      <div class="bg-yellow-600 rounded-full h-2.5 w-2.5 mr-1.5"></div>
                      <p>{{ $product->amount }} na stanju</p>                        
                      @break
                    @case($product->amount > 3)
                      <div class="bg-green-600 rounded-full h-2.5 w-2.5 mr-1.5"></div>
                      <p>{{ $product->amount }} na stanju</p> 
                      @break  
                    @default
                  @endswitch
                </div>

                <div class="flex">
                  <a href="/admin-panel/product/{{ $product->id }}/edit" class="hover:text-blue-600 dark:hover:text-blue-300">
                    <x-icons.edit size="18"></x-icons.edit>
                  </a>
                </div>
              </div>

              <div class="flex mb-4">
                <img src="{{ $product->images[0]->image_url }}" class="w-full rounded-md object-contain h-40">
              </div>

              <div class="w-full mb-2">
                <a href="/admin-panel/product/{{ $product->id }}" class="font-semibold text-base block truncate hover:text-blue-600 dark:hover:text-blue-300">{{ ucwords($product->name) }}</a>
              </div>

              <div class="flex justify-between text-sm">
                <div>
                  <p class="font-semibold">{{ $product->price }} BAM</p>
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
          <div class="mt-6 md:mt-4 md:mb-4">
            {{ $products->appends(['category' => request()->category, 'order' => request()->order, 'perPage' => request()->perPage])->links() }}
          </div>
        @endif              
      </div>

    </x-admin-panel.layout>
@endsection