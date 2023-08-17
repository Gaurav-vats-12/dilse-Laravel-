<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-xs-4 thumb">
                        <a class="thumbnail" href="javascript:void(0)" type="take_out" current_url="{{Route::current()->getName()}}" AjaxForm ="{{ route('menu') }}">
                            <img class="img-responsive" src="{{asset('frontend/img/image-400x300.jpg') }}" alt="">
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-4 col-xs-4 thumb">
                        <a class="thumbnail" href="javascript:void(0)" type="delivery" current_url="{{Route::current()->getName()}}" AjaxForm ="{{ route('menu') }}">
                            <img class="img-responsive" src="{{asset('frontend/img/delivery-vector-26062408.jpg') }}" alt="">
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-4 col-xs-4 thumb">
                        <a class="thumbnail" href="javascript:void(0)" type="dinein" current_url="{{Route::current()->getName()}}" AjaxForm ="{{ route('menu') }}"  >
                            <img class="img-responsive" src="{{asset('frontend/img/dine-vector-26062408.jpg') }}" alt="">
                        </a>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
