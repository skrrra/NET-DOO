@props([
    'active' => false,
    'href' => '#',
    'text' => ''
])

<div>
    @if ($active == true)
    <a href="{{ $href }}" class="bg-white flex text-blue-600 font-semibold py-3 px-10">
        <div class="mr-2 flex">
            {{ $slot }}
        </div>
        {{ $text }}
    </a>
    @else
        <a href="{{ $href }}" class="bg-gray-50 flex border-gray-50 font-semibold py-3 px-10 hover:text-blue-600 hover:border-blue-600 hover:bg-white">
            <div class="mr-2 flex">
                {{ $slot }}
            </div>
            {{ $text }}
        </a>
    @endif
</div>