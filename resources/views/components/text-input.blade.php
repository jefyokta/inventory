@props(['disabled' => false, 'error' => false])

<input @disabled($disabled)
    {{ $attributes->merge(['class' => 'input input-bordered ' . ($error ? 'input-error' : '')]) }}>
