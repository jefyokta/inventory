@props(['href' => $href ?? '', 'class' => $class ?? '', 'active' => $active ?? false])
<li class="rounded-xl {{ $active ? 'bg-neutral text-neutral-content' : '' }}">
    <a href="{{ $href }}" class="{{ $class }} " wire:navigate>
        {{ $slot }}
    </a>
</li>
