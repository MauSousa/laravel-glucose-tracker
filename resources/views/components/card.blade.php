{{-- resources/views/components/card.blade.php --}}
@props([
    'header' => null,
    'footer' => null,
    'padding' => true,
])

<div
    {{ $attributes->merge(['class' => 'bg-white dark:bg-gray-600 rounded-lg shadow border border-gray-200 dark:border-gray-700 overflow-hidden']) }}>
    @if ($header)
        <div class="p-4 border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-800">
            {{ $header }}
        </div>
    @endif

    <div @class(['p-4' => $padding])>
        {{ $slot }}
    </div>

    @if ($footer)
        <div class="p-4 border-t border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-800">
            {{ $footer }}
        </div>
    @endif
</div>
