<div x-data="{ open: @entangle('showModal') }">
    <dialog id="confirm_modal" class="modal" x-show="open" x-cloak>
        <div class="modal-box">
            <h3 class="text-lg font-bold">Konfirmasi</h3>
            <p class="py-4">{{ $message }}</p>
            <div class="modal-action">
                <button class="btn btn-error px-8" @click="open = false; @this.call('runAction')">Iya</button>
                <button class="btn" @click="open = false">Batal</button>
            </div>
        </div>
    </dialog>
</div>
