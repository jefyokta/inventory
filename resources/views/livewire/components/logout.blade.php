<li class="rounded-xl ">
    <dialog id="logout_modal" class="modal">
        <div class="modal-box">
          <h3 class="text-lg font-bold">Logout</h3>
          <p class="py-4">Akhiri Sesi?</p>
          <div class="modal-action">
            <form method="dialog">
              <button class=" btn btn-error px-8"  wire:click="logout" type="button">iya</button>
              <button class="btn">batal</button>
            </form>
          </div>
        </div>
      </dialog>
</li>
