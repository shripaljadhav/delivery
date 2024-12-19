<x-master-layout>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-block card-stretch">
                    <div class="card-body p-0">
                        <div class="d-flex justify-content-between align-items-center p-3">
                            <h5 class="font-weight-bold">{{ $pageTitle ?? __('message.list') }}</h5>
                            <a href="{{ route('deliverypartner.create') }}"class=" btn btn-sm btn-primary jqueryvalidationLoadRemoteModel" style="margin-left: 996px;">{{ __('message.add_form_title', ['form' => __('message.delivery_partner_benefit')]) }}</a>
                            <a href="{{ route('help-deliverypartner') }}" class="float-right btn btn-xs loadRemoteModel mr-3 help pt-1 pb-1 mt-2 mb-2" role="button">{{ __('message.help') }}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        {{ Form::open(['method' => 'POST', 'route' => ['frontend.website.information.update', 'delivery_partner'], 'id' => 'deliverypartner', 'enctype' => 'multipart/form-data']) }}
                        <div class="row">
                            @foreach ($deliverypartner as $key => $value)
                                @if (in_array($key, ['title','subtitle']))
                                    <div class="col-md-6 form-group">
                                            @php
                                                $label_message = '';
                                                switch ($key) {
                                                    case 'title':
                                                        $label_message = __('message.max_100_character');
                                                        break;
                                                    case 'subtitle':
                                                        $label_message = __('message.max_100_character');
                                                        break;
                                                    default:
                                                        break;
                                                }
                                            @endphp
                                        {{ Form::label($key, __('message.' . $key) .' <span class="text-danger">* '.$label_message . '</span>',['class' => 'form-control-label'], false) }}
                                        {{ Form::text($key, $value ?? null, ['placeholder' => __('message.' . $key), 'class' => 'form-control', 'required' => true]) }}
                                    </div>
                                @else
                                    <div class="form-group col-md-4">
                                        <label class="form-control-label" for="{{ $key }}">{{ __('message.'.$key) }} </label>
                                        <div class="custom-file mb-1">
                                            <input type="file" name="{{ $key }}" class="custom-file-input" accept="image/*" data--target="{{$key}}_image_preview">
                                            <label class="custom-file-label">{{  __('message.choose_file',['file' =>  __('message.image') ]) }}</label>
                                        </div>
                                        <span class="text-danger">* {{ __('message.' . $key . '_desc') }}</span>
                                    </div>

                                    <div class="col-md-2 mb-2">
                                        <img id="{{$key}}_image_preview" src="{{ getSingleMedia($value, $key) }}" alt="{{$key}}" class="attachment-image mt-1 {{$key}}_image_preview">
                                        @if( isset($value->id) && getMediaFileExit($value, $key))
                                            <a class="text-danger remove-file" href="{{ route('remove.file', ['id' => $value->id, 'type' => 'frontend_images','sub_type' => $key ]) }}"
                                                data--submit='confirm_form'
                                                data--confirmation='true'
                                                data--ajax='true'
                                                data-toggle='tooltip'
                                                title='{{ __("message.remove_file_title" , ["name" =>  __("message.image") ]) }}'
                                                data-title='{{ __("message.remove_file_title" , ["name" =>  __("message.image") ]) }}'
                                                data-message='{{ __("message.remove_file_msg") }}'>
                                                <i class="ri-close-circle-line"></i>
                                            </a>
                                        @endif
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <hr>
                        <div class="col-md-12 mt-1 mb-4">
                            <button class="btn btn-md btn-primary float-md-right" id="saveButton">{{ __('message.save') }}</button>
                        </div>
                        {{ Form::close() }}
                    </div>
                    @if(count($data) > 0)
                        @include('deliverypartner.list')
                    @endif
                    <br>
                </div>
            </div>
        </div>
    </div>
    @section('bottom_script')
    <script>
        $(document).ready(function() {
            $("#deliverypartner").validate({
                rules: {
                    'value[]': {
                        required: true
                    }
                },
                messages: {
                    'value[]': {
                        required: "{{ __('message.please_enter_value') }}"
                    }
                },
                errorPlacement: function(error, element) {
                    error.addClass('text-danger');
                    error.insertAfter(element);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                    $(element).removeClass('is-valid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                    $(element).addClass('is-valid');
                }
            });
        });
    </script>
@endsection
</x-master-layout>
