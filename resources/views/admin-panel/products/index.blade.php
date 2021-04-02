@extends('layouts.app')

@section('content')    
    <div class="w-full min-h-full flex flex-col">

        <div class="bg-gray-300 h-screen fixed top-0 left-0 xl:w-3/12 xl:bg-gray-50 2xl:w-2/12 border-r-2 border-gray-200 ">

            <div class="xl:py-12 xl:px-10 font-semibold">
                <h3 class="text-2xl">Admin panel</h3>
            </div>

            <div class="text-base">

                <x-admin-panel.side-menu.item href="/" text="Narudžbe">
                    <x-icons.truck size="20"></x-icons.truck>
                </x-admin-panel.side-menu.item>

                <x-admin-panel.side-menu.item href="/admin-panel/products" text="Proizvodi" active="true">
                    <x-icons.tv size="20"></x-icons.tv>
                </x-admin-panel.side-menu.item>

                <x-admin-panel.side-menu.item href="/" text="Akcije u toku">
                    <x-icons.precent size="20"></x-icons.precent>
                </x-admin-panel.side-menu.item>

                <x-admin-panel.side-menu.item href="/" text="Logout">
                    <x-icons.logout size="20"></x-icons.logout>
                </x-admin-panel.side-menu.item>
                
            </div>
            
        </div>
        
        <div class="bg-gray-100 min-h-screen xl:w-9/12 xl:px-10 2xl:w-10/12 self-end">

            <div class="min-h-screen bg-gray-100 w-full">
                
                <div class="xl:py-10">
                    <a href="/admin-panel/products/create" class="text-base w-40 border flex border-gray-200 shadow-sm  py-2 px-2 bg-gray-50 rounded-md hover:bg-blue-600 hover:text-gray-50 justify-center">
                        <div class="mr-1.5 flex">
                            <x-icons.add size="16"></x-icons.add>
                        </div>
                        Dodaj proizvod
                    </a>
                </div>

                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
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
                                      <div class="flex-shrink-0 h-14 w-14">
                                        <img class="h-14 w-14 rounded-md" src="{{ $product->image_url }}" alt="">
                                      </div>
                                      <div class="ml-4">
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
                                  <td class="px-6 py-4 whitespace-nowrap">
                                    @foreach ($product->categories as $category)
                                      <div class="text-sm text-gray-900">{{ $category->name }}</div>  
                                    @endforeach
                                  </td>
                                  <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                      Aktivan
                                    </span>
                                  </td>
                                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $product->price }} BAM
                                  </td>
                                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $product->amount }}
                                  </td>
                                  <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="/admin-panel/products/{{ $product->id }}/edit" class="text-blue-600 hover:text-indigo-900">Uredi</a>
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

                  {{-- END OF ITEMS --}}

                  @if (count($products) > 0)
                    @if ($products->links())
                      <div class="mt-10 pb-10">
                        {{ $products->links() }}
                      </div>
                    @endif
                  @endif

            </div>

        </div>
    </div>
@endsection