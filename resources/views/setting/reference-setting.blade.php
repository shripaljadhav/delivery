{{ Form::model($setting_value, ['method' => 'POST', 'route' => ['settingUpdate']]) }}
    {{ Form::hidden('id', null, ['class' => 'form-control']) }}
    {{ Form::hidden('page', $page, ['class' => 'form-control']) }}
    
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

                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::hidden('type[]', $sub_key , ['class' => 'form-control']) }}
                                {{ Form::hidden('key[]', $sub_key) }}
                                @if($key == 'reference')
                                    {{ Form::label('km_one', __('message.' . $sub_key), ['class' => 'control-label']) }}
                                    {{ Form::select('value[]',['fixed' => __('message.fixed') , 'percentage' => __('message.percentage') ], isset($data) ? $data->value : 'fixed',[ 'class' =>'form-control select2js']) }}
                                @elseif($key == 'reference_amount')
                                    {{ Form::label('km_one', __('message.' . $sub_key), ['class' => 'control-label']) }}
                                    <input type="{{ $type }}" name="value[]" value="{{ isset($data) ? $data->value : null }}" id="{{ $key.'_'.$sub_key }}" {{ $type == 'number' ? "min=0 step='any'" : '' }} class="form-control form-control-lg" placeholder="{{ str_replace('_',' ',$sub_key) }}">
                                @endif
                            </div>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>

{{ Form::submit(__('message.save'), ['class'=>"btn btn-md btn-primary float-md-right"]) }}
<script>
    $(document).ready(function() {
        $('.select2js').select2();
    });
</script>
{{ Form::close() }}
