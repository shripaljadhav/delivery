{{ Form::model($settings, ['method' => 'POST','route' => ['settingsUpdates'],'enctype'=>'multipart/form-data','data-toggle'=>'validator']) }}

{{ Form::hidden('id', null, array('placeholder' => 'id','class' => 'form-control')) }}
{{ Form::hidden('page', $page, array('placeholder' => 'id','class' => 'form-control')) }}
<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
            <label for="avatar" class="col-sm-3 form-control-label">{{ __('message.logo') }}</label>
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-4">
                        <img src="{{ getSingleMedia($settings,'site_logo') }}" width="100"  id="site_logo_preview" alt="site_logo" class="image site_logo site_logo_preview">
                        @if(getMediaFileExit($settings, 'site_logo'))
                            <a class="text-danger remove-file" href="{{ route('remove.file', ['id' => $settings->id, 'type' => 'site_logo']) }}"
                                data--submit="confirm_form"
                                data--confirmation='true'
                                data--ajax="true"
                                title='{{ __("message.remove_file_title" , ["name" =>  __("message.image") ]) }}'
                                data-title='{{ __("message.remove_file_title" , ["name" =>  __("message.image") ]) }}'
                                data-message='{{ __("message.remove_file_msg") }}'>
                                <i class="ri-close-circle-line"></i>
                            </a>
                        @endif
                    </div>
                    <div class="col-sm-8">
                        @if(env('APP_DEMO') == true)
                            <div class="alert alert-danger">
                                {{ __('message.demo_permission_denied') }}
                            </div>
                        @else
                            <div class="custom-file col-md-12">
                                {{ Form::file('site_logo', [ 'class'=> 'custom-file-input custom-file-input-sm detail', 'id' => 'site_logo', 'lang' => 'en' , 'accept' => 'image/*' ]) }}
                                <label class="custom-file-label" for="site_logo">{{ __('message.logo') }}</label>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="avatar" class="col-sm-3 form-control-label">{{ __('message.dark_logo') }}</label>
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-4">
                        <img src="{{ getSingleMedia($settings,'site_dark_logo') }}" width="100"  id="site_dark_logo_preview" alt="site_dark_logo" class="image site_dark_logo site_dark_logo_preview border">
                        @if(getMediaFileExit($settings, 'site_dark_logo'))
                            <a class="text-danger remove-file" href="{{ route('remove.file', ['id' => $settings->id, 'type' => 'site_dark_logo']) }}"
                                data--submit="confirm_form"
                                data--confirmation='true'
                                data--ajax="true"
                                title='{{ __("message.remove_file_title" , ["name" =>  __("message.image") ]) }}'
                                data-title='{{ __("message.remove_file_title" , ["name" =>  __("message.image") ]) }}'
                                data-message='{{ __("message.remove_file_msg") }}'>
                                <i class="ri-close-circle-line"></i>
                            </a>
                        @endif
                    </div>
                    <div class="col-sm-8">
                        @if(env('APP_DEMO') == true)
                            <div class="alert alert-danger">
                                {{ __('message.demo_permission_denied') }}
                            </div>
                        @else
                            <div class="custom-file col-md-12">
                                {{ Form::file('site_dark_logo', [ 'class'=> 'custom-file-input custom-file-input-sm detail', 'id' => 'site_dark_logo', 'lang' => 'en' , 'accept' => 'image/*' ]) }}
                                <label class="custom-file-label" for="site_dark_logo">{{ __('message.dark_logo') }}</label>
                            </div>
                         @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="avatar" class="col-sm-6 form-control-label">{{ __('message.favicon') }}</label>
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-4">
                        <img src="{{ getSingleMedia($settings,'site_favicon') }}" height="30"  id="site_favicon_preview" alt="site_favicon" class="image site_favicon site_favicon_preview">
                        @if(getMediaFileExit($settings, 'site_favicon'))
                            <a class="text-danger remove-file" href="{{ route('remove.file', ['id' => $settings->id, 'type' => 'site_favicon']) }}"
                                data--submit="confirm_form"
                                data--confirmation='true'
                                data--ajax="true"
                                title='{{ __("message.remove_file_title" , ["name" =>  __("message.image") ]) }}'
                                data-title='{{ __("message.remove_file_title" , ["name" =>  __("message.image") ]) }}'
                                data-message='{{ __("message.remove_file_msg") }}'>
                                <i class="ri-close-circle-line"></i>
                            </a>
                        @endif
                    </div>
                    <div class="col-sm-8">
                        @if(env('APP_DEMO') == true)
                            <div class="alert alert-danger">
                                {{ __('message.demo_permission_denied') }}
                            </div>
                        @else
                            <div class="custom-file col-md-12">
                                {{ Form::file('site_favicon', ['class'=>"custom-file-input custom-file-input-sm detail" , 'id'=>"site_favicon" , 'lang'=>"en" , 'accept'=>"image/*"]) }}
                                {{ Form::label('site_favicon',__('message.site_favicon'), ['class' => 'custom-file-label']) }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('site_name',__('message.site_name'), ['class' => 'col-sm-6  form-control-label']) }}
            <div class="col-sm-12">
                {{ Form::text('site_name', null, ['class'=>"form-control" ,'placeholder'=> __('message.site_name') ]) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('site_description',__('message.site_description'), ['class' => 'col-sm-6  form-control-label']) }}
            <div class="col-sm-12">
                {{ Form::textarea('site_description', null, ['class'=>"form-control textarea" , 'rows'=>3  , 'placeholder'=> __('message.site_description')]) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('contact_email',__('message.contact_email'), ['class' => 'col-sm-6  form-control-label']) }}
            <div class="col-sm-12">
                {{ Form::text('support_email', null, ['class'=>"form-control" ,'placeholder'=> __('message.contact_email') ]) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('contact_number',__('message.contact_number'), ['class' => 'col-sm-6  form-control-label']) }}
            <div class="col-sm-12">
                {{ Form::text('support_number', null, ['class'=>"form-control" ,'placeholder'=> __('message.contact_number') ]) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('site_email', __('message.site_email'), ['class' => 'col-sm-6  form-control-label']) }}
            <div class="col-sm-12">
                {{ Form::text('site_email', null , ['class' => 'form-control', 'placeholder' => __('message.site_email'), ]) }}
            </div>
        </div>

    </div>
    <div class="col-lg-6">
        <div class="form-group">
            {{ Form::label('default_language',__('message.default_language'), ['class' => 'col-sm-12  form-control-label']) }}
            <div class="col-sm-12">
                <select class="form-control select2js default_language" name="env[DEFAULT_LANGUAGE]" id="default_language">
                    @foreach(languagesArray() as $language)
                        <option value="{{ $language['id'] }}" {{ config('app.locale') == $language['id']  ? 'selected' : '' }}  >{{ $language['title'] }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('language_option',__('message.language_option'), ['class' => 'col-sm-12  form-control-label']) }}
            <div class="col-sm-12">
                <select class="form-control select2js language_option" name="language_option[]" id="language_option" multiple>
                    @foreach(languagesArray() as $language)
                        @if(config('app.locale') == $language['id']  )
                            <option value="{{ $language['id'] }}"  disabled="">{{ $language['title'] }}</option>
                        @else
                            <option value="{{ $language['id'] }}" {{in_array($language['id'], $settings->language_option) ? 'selected' : '' }}  >{{ $language['title'] }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('currency', __('message.currency'), ['class' => 'col-sm-12 form-control-label']) }}
            <div class="col-sm-12">
                @php
                    $currency_code = $settings->currency_code  ?? 'USD';
                    $currency = currencyArray($currency_code);
                @endphp
                <select class="form-control select2js" name="currency_code" id="currency_code">
                    @foreach(currencyArray() as $array)
                        <option value="{{ $array['code'] }}" {{ $array['code'] == $currency_code  ? 'selected' : '' }}>
                            ( {{ $array['symbol'] }} ) {{ $array['name'] }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('currency_position', __('message.currency_position'), ['class' => 'col-sm-12 form-control-label']) }}
            <div class="col-sm-12">
                {{ Form::select('currency_position',['left' => __('message.left') , 'right' => __('message.right') ], isset($settings) ? $settings->currency_position : 'left',[ 'class' =>'form-control select2js']) }}
            </div>
        </div>

        <div class="form-group col-md-12">
            {{ Form::label('bg_color_code', __('message.theme_color'), ['class' => 'form-control-label']) }}
            <div class="input-group">
                {{ Form::color('bg_color', isset($settings) ? $settings->color : '#5e3c9e', ['class' => 'form-control form-control-color', 'required', 'id' => 'bg_color_picker', 'title' => __('message.theme_color')]) }}
                {{ Form::text('color', isset($settings) ? $settings->color : '#5e3c9e', ['placeholder' => __('message.bg_color'), 'class' => 'form-control', 'required', 'id' => 'bg_color_code']) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('timezone', __('message.timezone'), ['class' => 'col-sm-12 form-control-label']) }}
            <div class="col-sm-12">
                {{ Form::select('timezone', [ auth()->user()->timezone => timeZoneList()[ auth()->user()->timezone ] ] , old('timezone') , [
                    'data-ajax--url' => route('ajax-list', [ 'type' => 'timezone' ]),
                    'data-placeholder' => __('message.select_field', [ 'name' => __('message.timezone') ]),
                    'class' =>'form-control select2js', 'required'
                    ])
                }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('facebook_url', __('message.facebook_url'), ['class' => 'col-sm-6  form-control-label']) }}
            <div class="col-sm-12">
                {{ Form::text('facebook_url', null, ['class'=>"form-control", 'placeholder' => __('message.enter_name', [ 'name' => __('message.facebook_url') ]) ]) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('twitter_url',__('message.twitter_url'), ['class' => 'col-sm-6  form-control-label']) }}
            <div class="col-sm-12">
                {{ Form::text('twitter_url', null, ['class'=>"form-control", 'placeholder' => __('message.enter_name',[ 'name' => __('message.twitter_url') ]) ]) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('linkedin_url',__('message.linkedin_url'), ['class' => 'col-sm-6  form-control-label']) }}
            <div class="col-sm-12">
                {{ Form::text('linkedin_url', null, ['class'=>"form-control", 'placeholder' => __('message.enter_name',[ 'name' => __('message.linkedin_url') ]) ]) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('instagram_url',__('message.instagram_url'), ['class' => 'col-sm-6  form-control-label']) }}
            <div class="col-sm-12">
                {{ Form::text('instagram_url', null, ['class'=>"form-control", 'placeholder' => __('message.enter_name',[ 'name' => __('message.instagram_url') ]) ]) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('copyright_text',__('message.copyright_text'), ['class' => 'col-sm-6  form-control-label']) }}
            <div class="col-sm-12">
                {{ Form::text('site_copyright', null, ['class'=>"form-control", 'placeholder' =>__('message.copyright_text')]) }}
            </div>
        </div>
        {{-- <div class="form-group">
            {{ Form::label('help_support_url', __('message.help_support_url'), ['class' => 'col-sm-6  form-control-label']) }}
            <div class="col-sm-12">
                {{ Form::text('help_support_url', null, ['class'=>"form-control", 'placeholder' => __('message.enter_name', [ 'name' => __('message.help_support_url') ]) ]) }}
            </div>
        </div> --}}
    </div>
    <hr>
     <div class="col-lg-12">
        <div class="form-group">
            <div class="col-md-offset-3 col-sm-12 ">
                {{ Form::submit(__('message.save'), ['class'=>"btn btn-md btn-primary float-md-right"]) }}
            </div>
        </div>
     </div>
</div>
{{ Form::close() }}
<script>
    function getExtension(filename) {
            var parts = filename.split('.');
            return parts[parts.length - 1];
        }
        function isImage(filename) {
            var ext = getExtension(filename);
            switch (ext.toLowerCase()) {
                case 'jpg':
                case 'jpeg':
                case 'png':
                case 'gif':
                case 'ico':
                    return true;
            }
            return false;
        }
    function readURL(input,className) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            var res = isImage(input.files[0].name);
            if(res == false){
                var msg = 'Image should be png/PNG, jpg/JPG & jpeg/JPG.';
                Snackbar.show({text: msg ,pos: 'bottom-right',backgroundColor:'#d32f2f',actionTextColor:'#fff'});
                $(input).val("");
                return false;
            }
            reader.onload = function(e){
                $(document).find('img.'+className).attr('src', e.target.result);
                $(document).find("label."+className).text((input.files[0].name));
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    $(document).ready(function (){
        $('.select2js').select2();
        $(document).on('change','#site_logo',function(){
            readURL(this,'site_logo');
        });
        $(document).on('change','#site_favicon',function(){
            readURL(this,'site_favicon');
        });

        $('.default_language').on('change', function (e) {
            var id= $(this).val();
            $('.language_option option:disabled').prop('selected',true);
            $('.language_option option').prop('disabled',false);

            $('.language_option option').each(function(index, val){
                var $this = $(this);
                if(id == $this.val()){
                $this.prop('disabled',true);
                $this.prop('selected',false);
                }
            });
            $('.language_option').select2("destroy").select2();
        });
        function colorCodeInput() {
                    var colorCode = $('#bg_color_code').val();
                    if (colorCode[0] !== '#') {
                        colorCode = '#' + colorCode;
                    }
                    $('#bg_color_code').val(colorCode);
                }

        $('#bg_color_code').on('input', function() {
            colorCodeInput();
            var colorCode = $(this).val();
            $('#bg_color_picker').val(colorCode);
        });

        $('#bg_color_picker').on('input', function() {
            var selectedColor = $(this).val();
            $('#bg_color_code').val(selectedColor);
        });

        colorCodeInput();
    })
</script>
