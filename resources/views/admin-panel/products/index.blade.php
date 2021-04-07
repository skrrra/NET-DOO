@extends('layouts.app')

@section('content')    
{{-- Able to extend itself  --}}
    <div class="w-full min-h-screen xl:flex xl:flex-col bg-gray-100">

      {{-- DESKTOP SECTION XL and further START --}}
      <div class="h-screen hidden fixed top-0 left-0 xl:block xl:w-3/12 xl:bg-gray-50 2xl:w-2/12 border-r-2 border-gray-200 ">

        <div class="xl:py-12 xl:px-10 font-semibold">
            <h3 class="text-2xl">Admin panel</h3>
        </div>

        <div class="text-base">

          <x-admin-panel.side-menu.item href="/" text="Narudžbe">
              <x-icons.truck size="20"></x-icons.truck>
          </x-admin-panel.side-menu.item>

          <x-admin-panel.side-menu.item href="/admin-panel/product" text="Proizvodi" active="true">
              <x-icons.tv size="20"></x-icons.tv>
          </x-admin-panel.side-menu.item>

          <x-admin-panel.side-menu.item href="/" text="Kategorije">
            <x-icons.list size="20"></x-icons.list>
          </x-admin-panel.side-menu.item>

          <x-admin-panel.side-menu.item href="/" text="Akcije u toku">
              <x-icons.precent size="20"></x-icons.precent>
          </x-admin-panel.side-menu.item>

          <x-admin-panel.side-menu.item href="/" text="Logout">
              <x-icons.logout size="20"></x-icons.logout>
          </x-admin-panel.side-menu.item>
          
        </div>
      
      </div>


      <div class="min-h-screen w-9/12 hidden xl:block xl:w-9/12 xl:px-10 xl:py-10 2xl:w-10/12 xl:self-end">

        @if (session()->has('delete-success'))
          <div class="bg-green-400 border border-gray-200 text-white absolute top-8 right-10 font-semibold py-2 px-4 rounded-md flex">
            <p class="mr-2">{{ session()->get('delete-success') }}</p>
            <x-icons.check size="18"></x-icons.check>
          </div>
        @endif

        <div class="flex justify-between">
          <form action="/admin-panel/product/search" method="POST" class="flex flex-col md:flex-row">
            @csrf
            @method('GET')

            <div class="flex flex-col md:flex-row">
              <select name="category" id="" class="rounded-md border-gray-300 focus:ring-2 focus:ring-blue-600 outline-none focus:outline-none focus:border-transparent mb-2 md:mb-0 md:mr-2">
                @isset($currentCategory)
                  <option value="{{ $currentCategory->id }}">{{ $currentCategory->name }}</option>
                @endisset
                  <option value="0">Sve kategorije</option>  
                @foreach ($categories as $category)
                  <option value="{{ $category->id }}">{{ $category->name }}</option>                      
                @endforeach
              </select>
  
              <select name="order" id="" class="rounded-md border-gray-300 focus:ring-2 focus:ring-blue-600 outline-none focus:outline-none focus:border-transparent mb-2 md:mb-0 md:mr-2">
                <option value="created_at,DESC">Najnovije</option>
                <option value="created_at,ASC">Najstarije</option>
                <option value="price,DESC">Cijena najvisa</option>
                <option value="price,ASC">Cijena najniza</option>
              </select>
                  
              <select name="perPage" id="" class="rounded-md border-gray-300 focus:ring-2 focus:ring-blue-600 outline-none focus:outline-none focus:border-transparent mb-4 md:mb-0 md:mr-4">
                <option value="30">Po 30</option>
                <option value="60">Po 60</option>
                <option value="90">Po 90</option>
              </select>
            </div>

            <button type="submit" class="bg-blue-600 py-2 text-white font-semibold rounded-md w-full flex flex-1 md:max-w-xs xl:px-6 hover:bg-blue-700">
              <div class="mx-auto flex items-center">
                <p class="mr-1">Traži</p>
                <x-icons.search size="16"></x-icons.search>
              </div>
            </button>
          </form>

          <a href="/admin-panel/product/create" class="text-base w-40 border flex border-gray-200 shadow-sm  py-2 px-2 bg-white rounded-md hover:text-blue-600 justify-center">
            <div class="mr-1.5 flex">
                <x-icons.add size="16"></x-icons.add>
            </div>
            Dodaj proizvod
          </a>
        </div>

        <div class="flex flex-col pt-12">
          <div class="overflow-x-auto">
            <div class="align-middle inline-block min-w-full">
              <div class="shadow overflow-hidden border-b border-gray-200 rounded-md">
                <table class="min-w-full divide-y divide-gray-200">
                  <thead class="bg-gray-50">
                    <tr>
                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Naziv proizvoda
                      </th>
                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Kategorije
                      </th>
                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Status
                      </th>
                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Cijena
                      </th>
                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Kolicina
                      </th>
                      <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Edit</span>
                      </th>
                    </tr>
                  </thead>
                  <tbody class="bg-white divide-y divide-gray-200">
                    
                    @foreach ($products as $product)
                      <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                          <div class="flex items-center">
                            <div class="flex-shrink-0 xl:h-14 xl:w-14 2xl:h-16 2xl:w-16">
                              <img class="xl:h-14 xl:w-14 2xl:h-16 2xl:w-16 rounded-md" src="{{ $product->image }}" alt="">
                            </div>
                            <div class="lg:ml-2 xl:ml-4">
                              <div class="text-sm font-medium text-gray-900">
                                {{ $product->name }}
                              </div>
                              <div class="text-sm text-gray-500">
                                @switch($product->state)
                                    @case(0)
                                      Novo
                                        @break
                                    @case(1)
                                      Polovno
                                        @break
                                    @case(2)
                                      Refurbished
                                        @break
                                    @default
                                        
                                @endswitch
                              </div>
                            </div>
                          </div>
                        </td>
                        <td class="px-4 py-2 xl:px-6 xl:py-4 whitespace-nowrap">
                          @foreach ($product->categories as $category)
                            <div class="text-sm text-gray-900">{{ $category->name }}</div>  
                          @endforeach
                        </td>
                        <td class="px-4 py-2 xl:px-6 xl:py-4 whitespace-nowrap">
                          @if ($product->active)
                            <span class="px-2 inline-flex text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                              Aktivan
                            </span>
                          @else
                            <span class="px-2 inline-flex text-sm leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                              Neaktivan
                            </span>
                          @endif
                        </td>
                        <td class="px-4 py-2 xl:px-6 xl:py-4 whitespace-nowrap text-sm text-gray-500">
                          {{ $product->price }} BAM
                        </td>
                        <td class="px-4 py-2 xl:px-6 xl:py-4 whitespace-nowrap text-sm text-gray-500">
                          {{ $product->amount }}
                        </td>
                        <td class="px-4 py-2 xl:px-6 xl:py-4 whitespace-nowrap text-right text-sm font-medium">
                          <a href="/admin-panel/products/{{ $product->id }}/edit" class="text-blue-600 flex hover:text-indigo-900">
                            <div class="flex mx-auto">
                              <x-icons.edit size="14"></x-icons.edit>
                              <p class="ml-1">Uredi</p>
                            </div>
                          </a>
                        </td>
                      </tr>
                    @endforeach
        
                    <!-- More items... -->
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

        @if ($products->links())
          <div class="pt-10">
            {{ $products->appends(['category' => request()->category, 'order' => request()->order, 'perPage' => request()->perPage])->links() }}
          </div>
        @endif
      </div>
      {{-- DESKTOP SECTION XL and further END --}}


      {{-- MOBILE - TABLET LAYOUT START --}}
      {{-- Mobile navigation with hamburger start --}}
      <div class="w-full bg-white py-4 px-4 fixed top-0 left-0 flex justify-between items-center border-b border-gray-200 xl:hidden">
        <div>
          <a href="/admin-panel" class="font-medium">Admin panel</a>
        </div>
        <div>
          <x-icons.hamburger size="20"></x-icons.hamburger>
        </div>
      </div>
      {{-- Mobile navigation with hamburger end --}}


      {{-- PRE INSERT DIV START --}}
      <div class="min-h-screen w-full px-4 py-20 xl:hidden">
        {{-- SEARCH FORM START --}}
        <div class="mb-8 md:mt-2">
          <form action="/admin-panel/product/search" method="POST" class="flex flex-col md:flex-row">
            @csrf
            @method('GET')

            <div class="flex flex-col md:flex-row">
              <select name="category" id="" class="rounded-md border-gray-300 focus:ring-2 focus:ring-blue-600 outline-none focus:outline-none focus:border-transparent mb-2 md:mb-0 md:mr-2">
                @isset($currentCategory)
                  <option value="{{ $currentCategory->id }}">{{ $currentCategory->name }}</option>
                @endisset
                  <option value="0">Sve kategorije</option>  
                @foreach ($categories as $category)
                  <option value="{{ $category->id }}">{{ $category->name }}</option>                      
                @endforeach
              </select>
  
              <select name="order" id="" class="rounded-md border-gray-300 focus:ring-2 focus:ring-blue-600 outline-none focus:outline-none focus:border-transparent mb-2 md:mb-0 md:mr-2">
                <option value="created_at,DESC">Najnovije</option>
                <option value="created_at,ASC">Najstarije</option>
                <option value="price,DESC">Cijena najvisa</option>
                <option value="price,ASC">Cijena najniza</option>
              </select>
                  
              <select name="perPage" id="" class="rounded-md border-gray-300 focus:ring-2 focus:ring-blue-600 outline-none focus:outline-none focus:border-transparent mb-4 md:mb-0 md:mr-4">
                <option value="30">Po 30</option>
                <option value="60">Po 60</option>
                <option value="90">Po 90</option>
              </select>
            </div>

            <button type="submit" class="bg-blue-600 py-2 text-white font-semibold rounded-md w-full flex flex-1 md:max-w-xs">
              <div class="mx-auto flex items-center">
                <p class="mr-1">Traži</p>
                <x-icons.search size="16"></x-icons.search>
              </div>
            </button>
          </form>
        </div>
        {{-- SEARCH FORM END --}}

        {{-- PRODUCTS LISTING START --}}
        <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 sm:gap-4 md:grid-cols-3 lg:grid-cols-4 lg:mb-8 xl:grid-cols-5 xl:gap-6 xl:mb-0 2xl:grid-cols-6">  
          {{-- PRODUCT COMPONENT START --}}
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
                  <x-icons.edit size="18"></x-icons.edit>
                </div>
              </div>

              <div class="flex px-4">
                <img src="{{ $product->image }}" class="inline-block h-52 bg-green-300 mx-auto rounded-md">
              </div>

              <div class="px-4 pt-4 pb-2 w-full">
                <h3 class="font-semibold text-xl">{{ ucwords($product->name) }}</h3>
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
          {{-- PRODUCT COMPONENT END --}}

        </div>
        {{-- PRODUCTS LISTING START --}}


        {{-- PAGINATION LINKS START --}}
        @if ($products->links())
          <div class="md:mt-8">
            {{ $products->appends(['category' => request()->category, 'order' => request()->order, 'perPage' => request()->perPage])->links() }}
          </div>
        @endif
        {{-- PAGINATION LINKS START --}}
              
      </div>
      {{-- PRE INSERT DIV START --}}
        
      {{-- Mobile user action menu start --}}
      <div class="w-full bg-white py-4 px-4 fixed bottom-0 left-0 flex items-center justify-between border-t border-gray-200 xl:hidden">      
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
      {{-- MOBILE - TABLET LAYOUT START --}}

    </div>
@endsection