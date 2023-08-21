<div class="modal fade" id="Order_model-{{ $order->id }}"  tabindex="-1"  aria-hidden="true">

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
                        <label for="order_time_taken" class="col-form-label">Time Taken: (In Minute)</label>
                        <input type="hidden" name="order_id" id="order_id" value="{{ $order->id }}">
                        <input min="0" max="3"   type="number" class="form-control"  id="order_time_taken-{{ $order->id }}" name="order_time_taken" >

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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    jQuery(document).ready(function() {
    jQuery('input[name="order_time_taken"]').on('keypress', function() {
        console.log("Keypress detected!");
        if (jQuery(this).val().length >= 3) {
            console.log("Length exceeded!");
            jQuery('#errorMessage').text('You can only enter a maximum of 3 characters.');
            return false;
        } else {
            jQuery('#errorMessage').text('');
        }
    });
});

    </script>
