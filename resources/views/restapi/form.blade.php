<?php $id = $id ?? null; ?>
{{ Form::open(['route' => ['rest-api.store'], 'method' => 'post', 'id' => 'restapi_form']) }}

<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">{{$pageTitle}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12 form-group">
                    {{ Form::label('name', __('message.name').' <span class="text-danger">*</span>', ['class' => 'form-control-label'], false) }}
                    {{ Form::text('name', null, ['placeholder' => __('message.name'), 'class' => 'form-control']) }}
                </div>
                <div class="col-md-12 form-group">
                    {{ Form::label('description', __('message.description').' <span class="text-danger">*</span>', ['class' => 'form-control-label'], false) }}
                    {{ Form::textarea('description', $data->description ?? null, ['class' => 'form-control textarea', 'rows' => 2, 'placeholder' => __('message.description')]) }}
                </div>
                <div class="form-group col-md-12">
                    {{ Form::label('country_id', __('message.country').' <span class="text-danger">*</span>', [ 'class' => 'form-control-label' ],false) }}
                    {{ Form::select('country_id', isset($data) ? [$data->country->id =>  $data->country->name ] : [], old('country_id'), [
                        'class' => 'form-control select2js  medium','required',
                        'data-placeholder' => __('message.country'),
                        'data-ajax--url' => route('ajax-list', ['type' => 'country-list']),
                    ]) }}
                </div>

                <div class="form-group col-md-12">
                    {{ Form::label('city_id', __('message.city').' <span class="text-danger">*</span>', [ 'class' => 'form-control-label' ],false) }}
                    {{ Form::select('city_id', isset($data) ? [$data->city->id =>  $data->city->name ] : [], old('city_id'), [
                        'class' => 'select2js form-group city_id',
                        'data-placeholder' => __('message.city'),
                    ]) }}
                </div>
                <div class="col-md-12 form-group">
                    {{ Form::label('rest_key', __('message.key') , ['class' => 'form-control-label']) }}
                    <div class="input-group">
                        <?php $randome = $randome ?? str_random(10); ?>
                        {{ Form::select('rest_key', ['rest_'.$randome => 'rest_'.$randome], 'rest_'.$randome, ['class' => 'form-control select2', 'id' => 'rest_key']) }}
                        <div class="input-group-append">
                            <button type="button" class="btn btn-sm btn-outline-primary" id="copyButton">Copy</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-md btn-secondary" data-dismiss="modal">{{ __('message.close') }}</button>
            <button type="submit" class="btn btn-md btn-primary" id="btn_submit">{{ isset($id) ? __('message.update') : __('message.save') }}</button>
        </div>
    </div>
    {{ Form::close() }}
</div>

<script>
    $(document).ready(function () {
        $(".select2js").select2({
            width: "100%",
            tags: true
        });

        $(document).on('change', '#country_id', function () {
            var country_id = $(this).val();
            $('#city_id').empty(); 
            cityList(country_id); 
        });

        formValidation("#restapi_form", {
            name: { required: true },
            description: { required: true },
            'city_id': { required: true },
            'country_id': { required: true }
        }, {
            name: { required: "{{__('message.please_enter_name')}}" },
            description: { required: "{{__('message.please_enter_description')}}" },
            'city_id': { required: "{{__('message.please_select_city')}}" },
            'country_id': { required: "{{__('message.please_select_country')}}" }
        });
    });

    function cityList(country_id) {
        var section_class_route = "{{ route('ajax-list', ['type' => 'extra_charge_city', 'country_id' => '']) }}" + country_id;
        section_class_route = section_class_route.replace('amp;', '');

        $.ajax({
            url: section_class_route,
            success: function(result) {
                $('#city_id').select2({
                    width: '100%',
                    placeholder: "{{ __('message.select_name', ['select' => __('message.city')]) }}",
                    data: result.results
                });

                if (typeof state !== 'undefined' && state !== null) {
                    $("#city_id").val(state).trigger('change');
                }
            }
        });
    }

    $('#copyButton').click(function() {
    var selectedOption = $('#rest_key').val();
    navigator.clipboard.writeText(selectedOption).then(() => {
        Swal.fire({
            position: 'top-end', 
            icon: 'success', 
            title: 'Copied!', 
            showConfirmButton: false, 
            timer: 1500, 
            toast: true, 
            background: '{{ $themeColor }}', 
            color: '#fff', 
            iconColor: '#fff', 
            customClass: {
                popup: 'custom-toast' 
            }
        });
    }).catch(() => {
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Failed!',
            showConfirmButton: false,
            timer: 1500,
            toast: true,
            background: '#dc3545', // Red background for error
            color: '#fff',
            iconColor: '#fff'
        });
    });
});


</script>
