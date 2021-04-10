@props([
    'active' => false,
    'href' => '#',
    'text' => ''
])

<div>
    @if ($active == true)
    <a href="{{ $href }}" class="flex flex-row bg-white text-blue-600 font-semibold py-4 lg:pl-8 xl:pl-10 2xl:pl-12">
        <div class="mr-2 flex">
            {{ $slot }}
        </div>
        {{ $text }}
    </a>
    @else
        <a href="{{ $href }}" class="flex flex-row font-semibold py-4 lg:pl-8 xl:pl-10 2xl:pl-12 border-t border-b bg-white border-white hover:text-blue-600">
            <div class="mr-2 flex">
                {{ $slot }}
            </div>
            {{ $text }}
        </a>
    @endif
</div>