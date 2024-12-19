<?php $data = $data ?? null; ?>

@if($data)
    {{ Form::model($data, ['route' => ['withdraw-history-edit', $data->id], 'method' => 'patch', 'files' => true]) }}
@else
    {{ Form::open(['route' => 'withdraw-deatils', 'method' => 'post', 'files' => true]) }}
    
@endif
{{ Form::hidden('withdrawrequest_id',$id)}}
<div class="modal-dialog modal-lg" id="modal" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">{{ $pageTitle }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="row col-md-12 p-2" id="clear-filter-list-data">
            <div class="form-group col-md-6">
                {{ Form::label('transaction_id', __('message.transaction').' <span class="text-danger">*</span>', ['class' => 'form-control-label'], false) }}
                {{ Form::text('transaction_id', $data->transaction_id ?? old('transaction_id'), ['placeholder' => __('message.transaction'), 'class' => 'form-control']) }}
                <span class="text-danger" id="ajax_form_validation_label"></span>
            </div>
            
            <div class="form-group col-md-6">
                {{ Form::label('via', __('message.via').' <span class="text-danger">*</span>', ['class' => 'form-control-label'], false) }}
                {{ Form::text('via', $data->via ?? old('via'), ['placeholder' => __('message.via'), 'class' => 'form-control']) }}
                <span class="text-danger" id="ajax_form_validation_label"></span>
            </div>

            <div class="form-group col-md-6">
                {{ Form::label('other_detail', __('message.other_detail').' <span class="text-danger">*</span>', ['class' => 'form-control-label'], false) }}
                {{ Form::text('other_detail', $data->other_detail ?? old('other_detail'), ['placeholder' => __('message.other_detail'), 'class' => 'form-control']) }}
                <span class="text-danger" id="ajax_form_validation_label"></span>
            </div>

            <div class="form-group col-md-4">
                <label class="form-control-label" for="image">{{ __('message.image') }}</label>
                <div class="custom-file">
                    {{ Form::file('withdrawimage', ['class' => 'custom-file-input', 'id' => 'withdrawimage', 'lang' => 'en', 'accept'=> 'image/*']) }}
                    <label class="custom-file-label">{{ __('message.choose_file', ['file' => __('message.image')]) }}</label>
                </div>
                <span class="selected_file"></span>
            </div>

            <div class="col-md-2 mb-2">
                @if($data && getMediaFileExit($data, 'withdrawimage'))
                    <img id="withdrawimage_preview" src="{{ getSingleMedia($data, 'withdrawimage' ?? 'images/default.png') }}" alt="image" class="attachment-image mt-1 withdrawimage_preview">
                @else
                    <img id="withdrawimage_preview" src="{{ asset('images/default.png') }}" alt="image" class="attachment-image mt-1 withdrawimage_preview">
                @endif
            </div>
        </div>

        <hr>
        <div class="modal-footer">
            {{ Form::submit(__('message.submit'), ['id' => 'apply-order-filter', 'class' => 'btn btn-md btn-primary float-right']) }}
        </div>
        {{ Form::close() }}
    </div>
</div>

<script>
    $(".select2js").select2({
        width: "100%",
    });
</script>
