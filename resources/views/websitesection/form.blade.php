<x-master-layout>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-block card-stretch">
                    <div class="card-body p-0">
                        <div class="d-flex justify-content-between align-items-center p-3">
                            <h5 class="font-weight-bold">{{ $pageTitle ?? __('message.list') }}</h5>
                        </div>
                        {{-- @dd($type); --}}
                        @php
                            $routes = [
                                'app_content' => 'help-information',
                                'download_app' => 'help-downlaodapp',
                                'contact_us' => 'help-contact',
                                'about_us' => 'help-about',
                            ];
                        @endphp
                        {{-- <div class="card-header-toolbar float-right" style="margin-top: -50px;">
                            @if($type == 'app_content')
                                <a href="{{ route('help-information') }}" class="btn btn-xs loadRemoteModel mr-3 help" role="button">{{ __('message.help') }}</a>
                            @elseif($type == 'download_app')
                                <a href="{{ route('help-downlaodapp') }}" class="btn btn-xs loadRemoteModel mr-3 help" role="button">{{ __('message.help') }}</a>
                            @elseif($type == 'contact_us')
                                <a href="{{ route('help-contact') }}" class="btn btn-xs loadRemoteModel mr-3 help" role="button">{{ __('message.help') }}</a>
                            @elseif($type == 'about_us')  
                            <a href="{{ route('help-contact') }}" class="btn btn-xs loadRemoteModel mr-3 help" role="button">{{ __('message.help') }}</a>
                            @endif
                        </div> --}}
                        <div class="card-header-toolbar float-right" style="margin-top: -50px;">
                            @if(isset($routes[$type]))
                                <a href="{{ route($routes[$type]) }}" class="btn btn-xs loadRemoteModel mr-3 help pt-1 pb-1 mt-2" role="button">{{ __('message.help') }}</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        {{ Form::open(['method' => 'POST', 'route' => ['frontend.website.information.update', $type], 'enctype' => 'multipart/form-data', 'data-toggle'=>'validator']) }}
                            <div class="row">
                                @foreach($data as $key => $value)
                                    @if( in_array($key,['app_name','download_title','download_footer_content','play_store_link','app_store_link','contact_title','contact_subtitle','download_title','download_subtitle','track_order_title','track_order_subtitle','track_page_title'] ))
                                        <div class="col-md-6 form-group">
                                            @php
                                                $label_message = '';
                                                switch ($key) {
                                                    case 'download_footer_content':
                                                        $label_message = '* ' . __('message.max_100_character');
                                                        break;
                                                    case 'title':
                                                        $label_message = '* ' . __('message.max_100_character');
                                                        break;
                                                    case 'contact_subtitle':
                                                        $label_message = '* ' . __('message.max_100_character');
                                                        break;
                                                    case 'download_subtitle':
                                                        $label_message = '* ' . __('message.max_100_character');
                                                        break;

                                                    default:
                                                        break;
                                                }
                                            @endphp
                                            {{ Form::label($key, __('message.'.$key).' <span class="text-danger"> '.$label_message . '</span>',['class'=>'form-control-label'], false ) }}
                                            {{ Form::text($key, $value ?? null,[ 'placeholder' =>  __('message.'.$key), 'class' => 'form-control' ]) }}
                                        </div>
                                    @elseif (in_array($key,['create_order_description','download_description','long_des','track_page_description']))
                                        <div class="col-md-12 form-group">
                                            @php
                                                $label_message = '';
                                                switch ($key) {
                                                    case 'download_description':
                                                        $label_message = '* ' . __('message.max_250_character');
                                                        break;
                                                    default:
                                                        break;
                                                }
                                            @endphp
                                            {{ Form::label($key, __('message.'.$key).' <span class="text-danger"> '.$label_message . '</span>',['class'=>'form-control-label'],false ) }}
                                            {{ Form::textarea($key, $value ?? null, ['class' => 'form-control textarea', 'rows' => 3, 'placeholder' => __('message.'.$key)]) }}
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
                                        <div class="col-md-2 mb-2 position-relative">
                                            <img id="{{$key}}_preview" src="{{ getSingleMedia($value, $key) }}" alt="{{$key}}" class="attachment-image mt-1 {{$key}}_image_preview">
                                            @if( isset($value->id) && getMediaFileExit($value, $key))
                                                <a class="text-danger remove-file" href="{{ route('remove.file', ['id' => $value->id, 'type' => 'frontend_images','sub_type' => $key ]) }}"
                                                    data--submit='confirm_form'
                                                    data--confirmation='true'
                                                    data--ajax='true'
                                                    data-toggle='tooltip'
                                                    title='{{ __("message.remove_file_title" , ["name" =>  __("message.image") ]) }}'
                                                    data-title='{{ __("message.remove_file_title" , ["name" =>  __("message.image") ]) }}'
                                                    data-message='{{ __("message.remove_file_msg") }}'>
                                                    @if(env('APP_DEMO'))
                                                    @else
                                                    <i class="ri-close-circle-line"></i>
                                                    @endif
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
                </div>
            </div>
        </div>
    </div>
</x-master-layout>
