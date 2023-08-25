<div class="modal fade" id="Order_model-{{ $orders->id }}"  tabindex="-1"  aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('admin.order.orderStatus')}}" accept-charset="UTF-8" enctype="multipart/form-data" id="update_order_status">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="order_time_taken" class="col-form-label">Time Taken: (In Minute's)</label>
                        <input type="hidden" name="order_id" id="order_id" value="{{ $orders->id }}">
                        <input min="0" max="3"   type="number" class="form-control"  id="order_time_taken-{{ $orders->id }}" name="order_time_taken" >
                        <span id="errorMessage" style="color: red;"></span>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-primary" id="formSubmit">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
