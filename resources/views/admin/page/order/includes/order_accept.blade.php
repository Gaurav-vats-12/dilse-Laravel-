<div class="modal fade" id="Order_model"  tabindex="-1"  aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('admin.order.update' ,$order->id)}}" accept-charset="UTF-8" enctype="multipart/form-data" id="update_order_status">@csrf @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="order_time_taken" class="col-form-label">Time Taken:</label>
                        <input type="text" class="form-control" minlength="1" maxlength="25" id="order_time_taken" name="order_time_taken" >
                        <span id="order_time_taken-error" class="text-danger error"></span>
                    </div>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-primary" id="formSubmit">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
