
<?php $id = $id ?? null;?>
@if(isset($id))
    {{ Form::model($data, ['route' => ['document.update', $id], 'method' => 'patch','id' => 'document_form' ]) }}
@else
    {{ Form::open(['route' => ['document.store'], 'method' => 'post','data-toggle'=>"validator" , 'id' => 'document_form']) }}
@endif
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{$pageTitle}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12 form-group">
                    {{ Form::label('name',__('message.name').' <span class="text-danger">*</span>', ['class' => 'form-control-label'],false) }}
                    {{ Form::text('name', null, [ 'placeholder' => __('message.name') ,'class' => 'form-control']) }}
                 </div>
                <div class="form-group col-md-6">
                    <div class="custom-control custom-checkbox m-2">
                        {{ Form::checkbox('is_required', 1, isset($is_required) ? $is_required : false, ['class' => 'custom-control-input', 'id' => 'is_required'],false) }}
                        {{ Form::label('is_required', __('message.required'), ['class' => 'custom-control-label', 'for' => 'is_required']) }}
                    </div>
                </div>  
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-md btn-secondary" data-dismiss="modal">{{ __('message.close') }}</button>
                    <button type="submit" class="btn btn-md btn-primary"id="btn_submit">{{ isset($id) ?  __('message.update') : __('message.save') }}</button>
                </div>
        </div>
        {{ Form::close() }}
    </div>
</div>
<script>
    $(document).ready(function(){
        $("#document_form").validate({
            rules: {
                name: {required: true },
            },
            messages: {
                name: {
                    required: "{{ __('message.please_enter_name') }}.",
                }
            },
            errorElement: "div",
            errorPlacement: function(error, element) {
                error.addClass("invalid-feedback");
                element.closest(".form-group").append(error);
            },
            highlight: function(element) {
                $(element).addClass("is-invalid");
            },
            unhighlight: function(element) {
                $(element).removeClass("is-invalid");
            }
        });
    });
</script>
