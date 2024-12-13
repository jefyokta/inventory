@props(['message' => 'Are you sure?', 'action' => null, 'on' => 'confirm'])

<div>
    <dialog id="confirm_modal" class="modal">
        <div class="modal-box">
            <h3 class="text-lg font-bold">Confirm</h3>
            <p class="py-4">{{ $message }}</p>
            <div class="modal-action">
                <button class="btn btn-error px-8" onclick="@this.call('{{ $action }}'); document.getElementById('confirm_modal').close()">Iya</button>
                <button class="btn" onclick="document.getElementById('confirm_modal').close()">Batal</button>
            </div>
        </div>
    </dialog>

    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('{{ $on }}', () => {
                document.getElementById('confirm_modal').showModal();
            });
        });
    </script>
</div>
