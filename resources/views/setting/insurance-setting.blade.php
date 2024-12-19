{{ Form::model($setting_value, ['method' => 'POST', 'route' => ['settingUpdate']]) }}
    {{ Form::hidden('id', null, ['class' => 'form-control']) }}
    {{ Form::hidden('page', $page, ['class' => 'form-control']) }}
    {!! Form::hidden('insurance_setting', 'insurance_setting') !!}

    <div class="card shadow mb-10">
        <div class="card-body">
            <div class="row">
                @foreach($setting as $key => $value)
                    @foreach($value as $sub_key => $sub_value)
                        @php
                            $data = null;
                            foreach($setting_value as $v) {
                                if ($v->key == $sub_key) {
                                    $data = $v;
                                }
                            }
                            $type = 'number';
                        @endphp
                            <div class="col-sm-12">
                                <div class="form-group">
                                    {{ Form::hidden('type[]', $sub_key , ['class' => 'form-control']) }}
                                    {{ Form::hidden('key[]', $sub_key) }}

                                    @if($key == 'insurance')
                                    <div class="custom-switch custom-switch-color custom-control-inline">
                                        {!! Form::hidden('value['.$loop->index.']', 0) !!}
                                        {!! Form::checkbox('value['.$loop->index.']', 1, isset($data) && $data->value == 1, ['class' => 'custom-control-input bg-success float-right', 'id' => $sub_key]) !!}
                                        {!! Form::label($sub_key, __('message.' . $sub_key), ['class' => 'custom-control-label']) !!}
                                    </div>
                                    @elseif($key == 'insurance_percentage')
                                    <div id="insurance_amount_input">
                                        {!! Form::label($sub_key, __('message.' . $sub_key).' <span class="text-danger">*</span>', ['class' => 'control-label'],false) !!}
                                        <input type="{{ $type }}" name="value[]" value="{{ isset($data) ? $data->value : null }}"  {{ $type == 'number' ? "min=0 max=100  step='any'" : '' }} class="form-control form-control-lg" placeholder="{{ str_replace('_',' ',$sub_key) }}"
                                        oninput="checkValue(this)" required>
                                    </div>
                                    @elseif($key == 'insurance_description')
                                    <div id="insurance_description_select">
                                        @php
                                            $description = isset($data) ? App\Models\Pages::find($data->value) : null;
                                        @endphp
                                        {{ Form::label('insurance_page', __('message.insurance_page') , ['class' => 'control-label']) }}
                                        {{ Form::select('value[]', isset($description) ? [$description->id => $description->title] : [], null, [
                                            'class' => 'select2js form-group insurance_page',
                                            'data-placeholder' => __('message.insurance_page'),
                                            'data-ajax--url' => route('ajax-list', ['type' => 'page-list']),
                                            'required' => 'required' 
                                        ]) }}
                                    </div>                                    
                                    @elseif($key == 'claim_duration')
                                        <div>
                                            {!! Form::label($sub_key, __('message.' . $sub_key), ['class' => 'control-label']) !!}
                                            <input type="{{ $type }}" name="value[]" value="{{ isset($data) ? $data->value : null }}"  
                                            {{ $type == 'number' ? "min=0 max=100  step='any'" : '' }} 
                                            class="form-control form-control-lg" placeholder="{{ str_replace('_',' ',$sub_key) }}"
                                            oninput="checkValue(this)">
                                        </div>                                    
                                    @endif
                                </div>
                            </div>
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>
{{ Form::submit(__('message.save'), ['class'=>"btn btn-md btn-primary float-md-right"]) }}
{{ Form::close() }}

<script>
    $(document).ready(function() {
        $(".select2js").select2({
            width: "100%",
        });
        function checkValue(input) {
            if (input.value < 100) {
                input.setCustomValidity('The value must be greater than or equal to 100.');
            } else {
                input.setCustomValidity('');
            }
        }
        toggleFields($('#insurance_allow').is(':checked'));

            $('#insurance_allow').change(function() {
                toggleFields($(this).is(':checked'));
            });

            function toggleFields(isChecked) {
                if (isChecked) {
                    $('#insurance_description_select').show();
                    $('#insurance_amount_input').show();
                } else {
                    $('#insurance_description_select').hide();
                    $('#insurance_amount_input').hide();
                }
            }
    });
</script>
