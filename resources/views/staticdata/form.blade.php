
<?php $id = $id ?? null;?>
@if(isset($id))
    {{ Form::model($data, ['route' => ['staticdata.update', $id], 'method' => 'patch', 'id' => 'parceltype_form']) }}
@else
    {{ Form::open(['route' => ['staticdata.store'], 'method' => 'post' , 'id' => 'parceltype_form']) }}
@endif
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">{{__($pageTitle)}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="form-group col-md-12">
                {{ Form::label('label', __('message.label').' <span class="text-danger">*</span>',['class' => 'form-control-label'], false ) }}
                {{ Form::text('label', old('label'),[ 'placeholder' => __('message.label'),'class' =>'form-control']) }}
                <span class="text-danger" id = "ajax_form_validation_label"></span>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-md btn-secondary" data-dismiss="modal">{{ __('message.close') }}</button>
            <button type="submit" class="btn btn-md btn-primary" id="btn_submit" data-form="ajax-submite-jquery-validation" >{{ isset($id) ?  __('message.update') : __('message.save') }}</button>
        </div>
    </div>
</div>
{{ Form::close() }}
<script>
        $(document).ready(function () {
            $("form").on("submit", function () {
            $(this).find(":submit").prop("disabled", true);
        });
        formValidation("#parceltype_form", {
            label: { required: true },
        }, {
            label: { required: "{{__('message.please_enter_label')}}"},
        });
    });
</script>

