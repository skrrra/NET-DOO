@props([
    'active' => false,
    'href' => '#',
    'text' => ''
])

<div>
    @if ($active == true)
    <a href="{{ $href }}" class="bg-white font-semibold flex flex-row text-blue-600 py-4 lg:pl-8 xl:pl-10 2xl:pl-12">
        <div class="mr-2 flex">
            {{ $slot }}
        </div>
        {{ $text }}
    </a>
    @else
        <a href="{{ $href }}" class="bg-white font-semibold flex flex-row py-4 lg:pl-8 xl:pl-10 2xl:pl-12 hover:text-blue-600">
            <div class="mr-2 flex">
                {{ $slot }}
            </div>
            {{ $text }}
        </a>
    @endif
</div>