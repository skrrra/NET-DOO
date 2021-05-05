@extends('layouts.app')

@section('content')    

    <x-admin-panel.layout>
        <div class="w-full bg-white rounded-md border border-gray-200 py-4 px-4 dark:bg-gray-800 dark:border-gray-700">

            {{-- <div class="pb-4">
                <h1 class="text-base font-semibold uppercase 2xl:text-lg">{{ $product->name }}</h1>
                <div class="flex">
                    <div class="flex items-center">
                        @switch($product)
                            @case($product->amount == 0)
                                <div class="bg-red-600 rounded-full h-2.5 w-2.5 mr-1.5"></div>
                                <p class="text-xs lg:text-sm">{{ $product->amount }} na stanju</p>
                                @break
                            @case($product->amount > 0 && $product->amount <= 3)
                                <div class="bg-yellow-600 rounded-full h-2.5 w-2.5 mr-1.5"></div>
                                <p class="text-xs lg:text-sm">{{ $product->amount }} na stanju</p>                        
                                @break
                            @case($product->amount > 3)
                                <div class="bg-green-600 rounded-full h-2.5 w-2.5 mr-1.5"></div>
                                <p class="text-xs lg:text-sm">{{ $product->amount }} na stanju</p> 
                                @break  
                            @default
                        @endswitch
                    </div>
                    <div class="ml-4">
                        @switch($product->state)
                        @case(0)
                            <div>
                            <p class="text-green-400 font-semibold">Novo</p>
                            </div>
                            @break
                        @case(1)
                            <div class="text-yellow-400">
                            <p>Polovno</p>
                            </div>
                            @break
                        @case(2)
                            <div class="text-blue-400">
                            <p>Refurbished</p>
                            </div>
                            @break
                        @default
                            
                    @endswitch
                    </div>
                </div>
            </div> --}}

            <div class="lg:grid lg:grid-cols-2 lg:gap-8">
                <div x-data="imageGallery({{ $product->images }})" x-init="loadImages()" class="">
                    <div x-show="activeImage" class="relative border border-gray-200 dark:border-gray-700 rounded-md">
                        <div @click="previous()" class="bg-white dark:bg-gray-700 absolute top-28 lg:top-44 -left-4 py-2 px-2 rounded-full shadow-sm border border-gray-200 dark:border-gray-700">
                            <x-icons.arrow-left size="26"></x-icons.arrow-left>
                        </div>
                        <div @click="next()" class="bg-white dark:bg-gray-700 absolute top-28 lg:top-44 -right-4 py-2 px-2 rounded-full shadow-sm border border-gray-200 dark:border-gray-700">
                            <x-icons.arrow-right size="26"></x-icons.arrow-right>
                        </div>
                        <img x-bind:src="activeImage.image_url" alt="" class="block h-64 lg:h-96 mx-auto select-none">
                    </div>
                </div>

                <div>
                    <div class="">
                        <h1 class="text-base font-semibold uppercase 2xl:text-lg">{{ $product->name }}</h1>
                        <div class="flex mt-2">
                            <div class="flex items-center">
                                @switch($product)
                                    @case($product->amount == 0)
                                        <div class="bg-red-600 rounded-full h-2.5 w-2.5 mr-1.5"></div>
                                        <p class="text-xs lg:text-sm">{{ $product->amount }} na stanju</p>
                                        @break
                                    @case($product->amount > 0 && $product->amount <= 3)
                                        <div class="bg-yellow-600 rounded-full h-2.5 w-2.5 mr-1.5"></div>
                                        <p class="text-xs lg:text-sm">{{ $product->amount }} na stanju</p>                        
                                        @break
                                    @case($product->amount > 3)
                                        <div class="bg-green-600 rounded-full h-2.5 w-2.5 mr-1.5"></div>
                                        <p class="text-xs lg:text-sm">{{ $product->amount }} na stanju</p> 
                                        @break  
                                    @default
                                @endswitch
                            </div>
                            <div class="ml-4">
                                @switch($product->state)
                                @case(0)
                                    <div>
                                    <p class="text-green-400 font-semibold">Novo</p>
                                    </div>
                                    @break
                                @case(1)
                                    <div class="text-yellow-400">
                                    <p>Polovno</p>
                                    </div>
                                    @break
                                @case(2)
                                    <div class="text-blue-400">
                                    <p>Refurbished</p>
                                    </div>
                                    @break
                                @default
                                    
                            @endswitch
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-between py-2 mt-4 lg:py-0 lg:mt-2">
                        <div class="flex items-center lg:text-2xl">
                            <h3 class="font-semibold">{{ $product->price }} BAM</h3>
                        </div>
                    </div>
        
                    <div class="mt-4 lg:grid lg:grid-flow-cols lg:grid-cols-2">
                        @foreach ($product->categories as $category)
                            <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 px-2 py-2 rounded-md text-xs mb-2 text-center lg:mr-2 dark:hover:text-blue-300 dark:hover:border-blue-300">
                                {{ $category->name }}
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-4 text-base">
                        <p>{{ $product->long_details }}</p>
                    </div>
                </div>
            </div>

            <script>
                function imageGallery(images){
                    return{
                        images,
                        activeImage: '',
                        loadImages(){
                            this.activeImage = this.images[0];
                        },
                        next(){
                            if((this.images.indexOf(this.activeImage) + 1) == this.images.length){
                                this.activeImage = this.images[0];
                            }else{
                            this.activeImage = this.images[this.images.indexOf(this.activeImage) + 1];
                            }
                        },
                        previous(){
                            if(this.images.indexOf(this.activeImage) == 0){
                                this.activeImage = this.images[this.images.length - 1];
                            }else{
                                this.activeImage = this.images[this.images.indexOf(this.activeImage) - 1];
                            }
                        },
                    }
                }
            </script>

        </div>
    </x-admin-panel.layout>

@endsection