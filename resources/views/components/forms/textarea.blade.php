@props([
    'name' => '',
    'value' => '',
    'placeholder' => '',
    'cols' => '30',
    'rows' => '8'
])

@if (old($name) != 0)
    <textarea name="{{ $name }}" value="{{ old($name) }}" placeholder="{{ $placeholder }}" cols="{{ $cols }}" rows="{{ $rows }}" {{ $attributes->merge (['class' => 'mt-2 resize-none w-full rounded-md border-2 border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-700 focus:border-blue-600 dark:focus:border-blue-300'])}}></textarea>
@else
    <textarea name="{{ $name }}" placeholder="{{ $placeholder }}" cols="{{ $cols }}" rows="{{ $rows }}" {{ $attributes->merge (['class' => 'mt-2 resize-none w-full rounded-md border-2 border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-700 focus:border-blue-600 dark:focus:border-blue-300'])}}>{{ $value }}</textarea>
@endif

@error($name)
    <div class="mt-2">
        <p class="text-sm text-red-400">{{ $message }}</p>
    </div>
@enderror