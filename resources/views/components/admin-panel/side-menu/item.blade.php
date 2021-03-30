@props([
    'active' => false,
    'href' => '#',
    'text' => ''
])

<div>
    @if ($active == true)
    <a href="{{ $href }}" class="bg-blue-600 flex text-gray-50 font-semibold py-3 px-6 xl:mb-2">
        <div class="mr-2">
            {{ $slot }}
        </div>
        {{ $text }}
    </a>
    @else
        <a href="{{ $href }}" class="bg-gray-50 flex border-r-4 border-gray-50 font-semibold py-3 px-6 xl:mb-2 hover:text-blue-600 hover:border-blue-600 hover:bg-white hover:shadow-sm">
            <div class="mr-2">
                {{ $slot }}
            </div>
            {{ $text }}
        </a>
    @endif
</div>