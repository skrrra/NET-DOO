@extends('layouts.app')

@section('content')    
    <div class="w-full min-h-full flex flex-col">

        <div class="bg-white h-screen fixed top-0 left-0 xl:w-3/12 2xl:w-2/12 border-r-2 border-gray-200 ">

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

                <x-admin-panel.side-menu.item href="/logout" text="Logout">
                    <x-icons.logout size="20"></x-icons.logout>
                </x-admin-panel.side-menu.item>
                
            </div>
            
        </div>
        
        <div class="min-h-screen xl:w-9/12 xl:px-12 2xl:w-10/12 self-end">

            <div class="min-h-screen w-full pt-12">

                <div class="px-8 py-8 rounded-md border-2 border-gray-200 shadow-sm bg-white">
                    <div class="flex pb-4">
                        <h1 class="mr-2 font-semibold text-2xl">{{ $product->name }}</h1>
                        @if ($product->active)
                            <span class="px-2 inline-flex items-center text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            Aktivan
                            </span>
                        @else
                            <span class="px-2 inline-flex text-sm leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                            Neaktivan
                            </span>
                        @endif
                    </div>
                    <div class="grid grid-cols-2">
                        <div>
                            <img src="{{ $product->image }}" alt="" class="rounded-md">
                        </div>
                        <div class="px-12">
                            <div class="flex">
                                <h2 class="font-semibold text-xl mr-2">
                                    Cijena: {{ $product->price }} BAM
                                </h2>

                                @switch($product->state)
                                @case(0)
                                    <h2 class="text-lg self-center text-green-600">Novo</h2>
                                    @break
                                @case(1)
                                    <h2 class="text-lg self-center text-yellow-600">Polovno</h2>
                                    @break
                                @case(2)
                                    <h2 class="text-lg self-center text-blue-600">Refurbished</h2>
                                    @break
                                @default
                                    
                            @endswitch
                            </div>
                            <div class="flex mt-2">
                                @foreach ($product->categories as $category)
                                    <p class="bg-white border text-sm border-gray-300 rounded-md py-1 px-2 mr-2">{{ $category->name }}</p>
                                @endforeach
                            </div>
                            <div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection