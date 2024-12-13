@props([
    'type' => 'submit',
])
<button
    {{ $attributes->merge(['type' =>  $type, 'class' => 'inline-flex items-center btn-sm btn btn-info font-semibold text-xs text-white uppercase tracking-widest transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
