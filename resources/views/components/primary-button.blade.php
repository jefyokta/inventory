<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center btn-sm btn btn-success font-semibold text-xs text-white uppercase tracking-widest transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
