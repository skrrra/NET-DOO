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
            @foreach ($categories as $category)
                <div>
                    <h3 class="text-2xl">{{ $category->name }}</h3>
                    <div>
                        @foreach ($category->categories as $childCategories)
                            <h4 class="ml-6 text-lg">{{ $childCategories->name }}</h4>
                            <div class="ml-12">
                                @foreach ($childCategories->products as $product)
                                    <div class="text-sm flex">
                                        <p>{{ $product->id }}</p>
                                        <p class="ml-2">{{ $product->name }}</p>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>

    </div>

@endsection