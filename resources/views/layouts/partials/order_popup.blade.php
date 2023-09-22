<!-- Modal -->
<div class="modal fade {{ Route::current()->getName() ==='home' ? 'Home_modal' : 'Cart_modal' }}" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Order Type</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row take_pop">
                    <div class="col-6 col-lg-6 col-md-6 col-xs-6 thumb">
                        <a class="thumbnail" href="javascript:void(0)"  type="take_out" current_url="{{Route::current()->getName()}}" AjaxForm ="{{ route('menu','appetizers') }}">
                            <img class="img-responsive" src="{{asset('frontend/img/take-out.png') }}" alt="">
                            <p>Take Out</p>
                        </a>
                    </div>
                    <div class="col-6 col-lg-6 col-md-6 col-xs-6 thumb">
                        <a class="thumbnail" href="javascript:void(0)" type="delivery" current_url="{{Route::current()->getName()}}" AjaxForm ="{{ route('menu','appetizers') }}">
                            <img class="img-responsive" src="{{asset('frontend/img/Delivery-1.png') }}" alt="">
                            <p>Delivery</p>
                        </a>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
