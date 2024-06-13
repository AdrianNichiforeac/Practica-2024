
<div class="modal fade show" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="customModalLabel" aria-modal="true" >
    <form action="" method="post" id="delete_form">
        @csrf
        @method('DELETE')
    <div class="modal-dialog" role="document">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="customModalLabel">Ștergere</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="text-center">
                    <p class="mb-3">Sigur ștergem acest element?</p>
                    </div>
            </div>

            <div class="modal-footer custom">

                <div class="left-side">
                    <button type="button" class="btn btn-link danger" aria-hidden="true"  onclick="$('#deleteModal').modal('hide')" style="color: #108c2a !important;">Refuză</button>
                </div>
                <div class="divider"></div>
                <div class="right-side">
                    <button type="submit" id="modal-delete-btn" class="btn btn-link success" onclick="$('#delete_form').submit();" style="color: #ea490b !important;">Șterge</button>
                </div>
            </div>
        </div>

    </div>
    </form>
</div>

