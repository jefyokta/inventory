<div class="">
    <script>
        document.addEventListener("livewire:init", () => {
            Livewire.on('confirmation', async (data) => {
                const {
                    message,
                    className,
                    event,
                    param
                } = JSON.parse(data);

                const result = await Swal.fire({
                    title: message || 'Apakah Anda yakin?',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Lanjutkan',
                    cancelButtonText: 'Batal',
                    customClass: {
                        confirmButton: 'btn btn-error text-error-content px-4',
                        cancelButton: 'btn  px-4',
                        title: "font-bold text-sm"
                    },
                    icon: 'warning'
                });

                if (result.isConfirmed) {
                    Livewire.dispatch('confirmed',
                        [
                            className,
                            event,
                            param
                        ]
                    )

                }
            });
        });
    </script>
</div>
