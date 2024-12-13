@props(['href' => $href ?? '', 'class' => $class ?? ''])

<a href="{{ $href }}" class="{{ $class }}" wire:navigate>
    {{ $slot }}
</a>
