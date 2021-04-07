@props([
    'active' => false,
    'href' => '#',
    'text' => ''
])

<div>
    @if ($active == true)
    <a href="{{ $href }}" class="flex text-blue-600 font-semibold py-3 px-10">
        <div class="mr-2 flex">
            {{ $slot }}
        </div>
        {{ $text }}
    </a>
    @else
        <a href="{{ $href }}" class="flex font-semibold py-3 px-10 border-t border-b border-white hover:text-blue-600 hover:bg-gray-50">
            <div class="mr-2 flex">
                {{ $slot }}
            </div>
            {{ $text }}
        </a>
    @endif
</div>