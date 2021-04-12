@extends('layouts.app')

@section('content')    

    <x-admin-panel.layout>
        <div class="w-full">

            <div class="px-8 py-8 rounded-md border border-gray-200 shadow-sm bg-white dark:bg-gray-900 dark:border-gray-700">
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
                        <img src="{{ $product->image }}" alt="" class="rounded-md border border-white dark:border-gray-700">
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
                                <p class="bg-white dark:bg-gray-900 dark:text-blue-300 dark:border-blue-300 border text-sm border-gray-300 rounded-md py-1 px-2 mr-2">{{ $category->name }}</p>
                            @endforeach
                        </div>
                        <div>
        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-admin-panel.layout>

@endsection