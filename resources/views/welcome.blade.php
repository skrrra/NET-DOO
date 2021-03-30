@extends('layouts.app')

@section('content')

    <div class="min-h-full bg-blue-200 xl:bg-blue-400 lg:flex xl:flex">

        <div class="bg-blue-600 min-h-full lg:w-3/12 xl:w-2/12">

            @foreach ($categories as $category)
                <h3 class="mb-2 text-xl">{{ $category->name }}</h3>
                <div>
                    @foreach ($category->categories as $childCategory)
                        <p class="ml-8 mb-2">{{ $childCategory->name }}</p>
                    @endforeach
                </div>
            @endforeach

        </div>

        <div class="bg-blue-100 min-h-full lg:w-9/12 xl:w-10/12">
            {{-- @foreach ($categories as $category)
                <div>
                    <h3 class="mb-4">Category name: {{ $category->name }}</h3>
                    @foreach ($category->products as $product)
                        <div class="ml-6 mb-2">
                            <p>Product ID: {{ $product->id }}</p>
                            <p>Product Name: {{ $product->name }}</p>
                        </div>
                    @endforeach
                </div>
            @endforeach --}}
        </div>

    </div>

@endsection