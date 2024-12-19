<?php $id = $id ?? null; ?>
@if (isset($id))
    {{ Form::model($data, ['route' => ['walkthrough.update', $id], 'method' => 'patch','enctype' => 'multipart/form-data']) }}
@else
    {{ Form::open(['route' => ['walkthrough.store'], 'method' => 'post','enctype' => 'multipart/form-data']) }}
@endif
{!! Form::hidden('type', 'walkthrough') !!}
<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">{{ __($pageTitle) }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="form-group col-md-12">
                {{ Form::label('title', __('message.title') . ' <span class="text-danger">*</span>', ['class' => 'form-control-label'], false) }}
                {{ Form::text('title', old('title'), ['placeholder' => __('message.title'), 'class' => 'form-control', 'required']) }}
                <span class="text-danger" id = "ajax_form_validation_title"></span>
            </div>
            <div class="form-group col-md-12">
                {{ Form::label('description', __('message.review'). ' <span class="text-danger">*</span>',['class' => 'form-control-label'],false) }}
                {{ Form::textarea('description',old('description'), ['class' => 'form-control textaraea', 'rows' => 2, 'placeholder' => __('message.review')]) }}
                <span class="text-danger" id = "ajax_form_validation_description"></span>
            </div>
            <div class="row ml-1">
                <div class="form-group col-md-4">
                    {{ Form::label('frontend_data_image', __('message.image'), ['class' => 'form-control-label']) }}
                    <div class="custom-file">
                        {{ Form::file('frontend_data_image', ['class' => 'custom-file-input', 'id' => 'frontend_data_image', 'lang' => 'en', 'accept' => 'image/*']) }}
                        <span class="text-danger" id = "ajax_form_validation_frontend_data_image"></span>
                        <label class="custom-file-label"for="frontend_data_image">{{ __('message.choose_file', ['file' => __('message.image')]) }}</label>
                    </div>
                </div>
                <div class="col-md-2 mb-2">
                    {{-- @if (isset($id) && getMediaFileExit($data, 'frontend_data_image')) --}}
                    {{-- <img src="{{ getSingleMedia($data, 'frontend_data_image' ?? 'images/default.png') }}" alt="image" class="attachment-image mt-1"> --}}
                    {{-- @endif --}}
                    @if(isset($id) && getMediaFileExit($data, 'frontend_data_image'))
                        <div class="col-md-2 mb-2 position-relative">
                            <img id="frontend_data_image_preview" src="{{ getSingleMedia($data,'frontend_data_image') }}" alt="frontend-image" class="avatar-100 mt-1">
                            <a class="text-danger remove-file" href="{{ route('remove.file', ['id' => $data->id, 'type' => 'frontend_data_image']) }}"
                                data--submit='confirm_form'
                                data--confirmation='true'
                                data--ajax='true'
                                data-toggle='tooltip'
                                title='{{ __("message.remove_file_title" , ["name" =>  __("message.image") ]) }}'
                                data-title='{{ __("message.remove_file_title" , ["name" =>  __("message.image") ]) }}'
                                data-message='{{ __("message.remove_file_msg") }}'
                                >
                                <i class="ri-close-circle-line" id ="iconremove"></i></i>
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-md btn-secondary" data-dismiss="modal">{{ __('message.close') }}</button>
                <button type="submit" class="btn btn-md btn-primary" id="btn_submit" data-form="ajax-submite-jquery-validation">{{ isset($id) ? __('message.update') : __('message.save') }}</button>
            </div>
        </div>
    </div>
{{ Form::close() }}

