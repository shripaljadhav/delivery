{{ Form::open(['method' => 'POST', 'route' => ['order-setting-save']]) }}
{!! Form::hidden('id',isset($setting_value[0]) ? $setting_value[0]['id'] : NULL ) !!}
{!! Form::hidden('database_backup', 'database_backup') !!}
<div class="card shadow mb-10">
    <div class="card-body">
        <div class="row"> 
            <div class="col-md-12">
                 @php
                    $data = null;
                    foreach($setting_value as $v){
                        
                    }
                @endphp
                <div class="row">
                    <div class="form-group col-md-4">
                        {{ Form::label('database_backup', __('message.database_backup') . ' <span class="text-danger">*</span>', ['class'=>'form-control-label'], false) }}
                        {{ Form::select('backup_type', ['daily' => __('message.daily'), 'monthly' => __('message.monthly'), 'weekly' => __('message.weekly'),'none' => __('message.none')], isset($v) ? $v->backup_type : 'daily', ['class' => 'form-control select2js']) }}
                    </div>
                    @if(env('APP_DEMO'))
                        <div class="form-group col-md-4">
                            {{ Form::label('backup_email', __('message.email').' <span class="text-danger">*</span>', ['class' => 'form-control-label'], false) }}
                            {{ Form::email('backup_email', isset($v) ? optional($v)->backup_email : old('backup_email'), ['placeholder' => __('message.email'), 'class' => 'form-control', 'required', 'readonly']) }}
                        </div>
                    @else
                        <div class="form-group col-md-4">
                            {{ Form::label('backup_email', __('message.email').' <span class="text-danger">*</span>', ['class' => 'form-control-label'], false) }}
                            {{ Form::email('backup_email', isset($v) ? optional($v)->backup_email : old('backup_email'), ['placeholder' => __('message.email'), 'class' => 'form-control', 'required']) }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
{{ Form::submit(__('message.save'), ['class'=>"btn btn-md btn-primary float-md-right"]) }}
{{ Form::close() }}
<script>
        $(document).ready(function() {

        $('.select2js').select2();
        });
</script>



