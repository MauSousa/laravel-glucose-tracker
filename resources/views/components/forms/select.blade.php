@props(['label', 'name', 'error' => false, 'class' => '', 'labelClass' => '', 'data' => []])

@if ($label)
    <label for="{{ $name }}"
        {{ $attributes->merge(['class' => 'block mb-2.5 text-sm font-medium text-heading ' . $labelClass]) }}>
        {{ $label }}
    </label>
@endif

<select name="{{ $name }}" id="{{ $name }}"
    {{ $attributes->merge(['class' => 'block w-full px-3 py-2.5 bg-neutral-secondary-medium border border-default-medium rounded-lg text-heading text-sm rounded-base focus:ring-brand focus:border-brand shadow-xs ' . $labelClass]) }}>
    <option value="" selected>--Please choose an option--</option>
    @forelse ($data as $option)
        <option value="{{ $option }}">{{ $option }}</option>
    @empty
        <option value="" selected>--Please choose an option--</option>
        <option value="dog">Dog</option>
        <option value="cat">Cat</option>
        <option value="hamster">Hamster</option>
        <option value="parrot">Parrot</option>
        <option value="spider">Spider</option>
        <option value="goldfish">Goldfish</option>
    @endforelse
</select>

@error($name)
    <span class="text-red-500">{{ $message }}</span>
@enderror
