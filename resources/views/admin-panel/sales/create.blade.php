@extends('layouts.app')

@section('content')
    <x-admin-panel.layout>

        <div class="px-8 py-8 rounded-md border border-gray-200 shadow-sm bg-white dark:bg-gray-800 dark:border-gray-700">
            <div class="mb-10">
                <p class="font-semibold text-2xl">Napravi popust</p>
            </div>


            <form action="/admin-panel/sales/create/{{ $product->id }}" x-data="priceApp({{ $product->price }})" x-init="calculateFinalPrice()" method="POST">
                @csrf

                <div class="my-5">
                    <p class="font-semibold text-lg">{{ $product->name }}</p>
                </div>

                <div class="flex flex-col mt-4 lg:mt-0 my-2" x-data="{ price:{{ $product->price }} }">
                    <label class="mb-2 text-sm font-semibold">Puna cena (BAM)<span class="text-blue-600 dark:text-blue-300">*</span></label>
                    <x-forms.input
                        type="number"
                        id="price"
                        {{-- value="{{ $product->price }}" --}}
                        x-bind:value="price"
                        x-model="price"
                        step="0.01"
                        class="dark:bg-gray-700 dark:border-gray-700 dark:focus:border-blue-300"
                        disabled
                    ></x-forms.input>
                </div>
                <div class="flex flex-col mt-4 lg:mt-0 my-2" >
                    <label class="mb-2 text-sm font-semibold">Nova cena (BAM)<span class="text-blue-600 dark:text-blue-300">*</span></label>
                    <x-forms.input
                        type="number"
                        x-bind:value="finalPrice"
                        x-model="finalPrice"
                        x-on:input="calculateFinalPrice()"
                        step="0.01"
                        class="dark:bg-gray-700 dark:border-gray-700 dark:focus:border-blue-300"
                        disabled
                    ></x-forms.input>
                </div>
                <div class="flex flex-col mt-4 lg:mt-0 my-2">
                    <label class="mb-2 text-sm font-semibold">Popust (%) <span class="text-blue-600 dark:text-blue-300">*</span></label>

                    <x-forms.input
                        type="number"
                        x-model="discount"
                        name="percent_off"
                        x-on:input="calculateFinalPrice()"
                        placeholder="Example: 30"
                        step="0.01"
                        class="dark:bg-gray-700 dark:border-gray-700 dark:focus:border-blue-300"
                    ></x-forms.input>

                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="hidden" name="on_sale" value="1">
                </div>

                <button type="submit" class="bg-blue-600 border flex border-gray-600 py-2 px-2 rounded-md text-white font-semibold hover:bg-blue-700  hover:border-blue-700 dark:bg-blue-300 dark:text-gray-900 dark:hover:bg-blue-400">
                    <div class="flex mx-auto">
                        <p class="mr-1">Napravi popust</p>
                        <x-icons.add size="18"></x-icons.add>
                    </div>
                </button>
            </form>
        </div>
    </x-admin-panel.layout>

    <script>

        window.priceApp = (initialPrice) => {
            return {
                price: initialPrice || 0,
                discount: 0,
                finalPrice: 0,

                calculateFinalPrice() {
                this.finalPrice = this.price * (1 - this.discount / 100);
                }
            };
        };

    </script>
@endsection