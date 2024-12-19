<div class="card-body">
    {{ Form::open(['method' => 'GET', 'url' => route('report-of-user'),'id' => 'filter-form']) }}
        <div class="row justify-content-end align-items-end">
            <div class="form-group col-md-2">
                {{ Form::label('client_id', __('message.user').' <span class="text-danger">*</span>', [ 'class' => 'form-control-label' ],false) }}
                <span class="text-danger" id="form_validation_client_id"></span>
                {{ Form::select('client_id',$selectedClients ,request('client_id'), [
                    'class' => 'select2js form-group client_id',
                    'data-placeholder' => __('message.user'),
                    'data-ajax--url' => route('ajax-list', [ 'type' => 'client_name']),
                ]) }}
            </div>
            <div class="form-group col-auto">
                {{ Form::label('from_date',__('message.from_date').' <span class="text-danger">*</span>',['class'=>'form-control-label'],false) }}
                <span class="text-danger" id = "form_validation_from_date"></span>
                {{ Form::date('from_date',$params['from_date'] ?? old('from_date'),[ 'placeholder' => __('message.date'),'class' =>'form-control datepicker select2Clear','id' => 'from_date_main']) }}
            </div>
            <div class="form-group col-auto">
                {{ Form::label('to_date',__('message.to').' <span class="text-danger">*</span>',['class'=>'form-control-label'],false) }}
                <span class="text-danger" id = "form_validation_to_date"></span>
                {{ Form::date('to_date', $params['to_date'] ?? old('to_date'),[ 'placeholder' => __('message.date'), 'class' =>'form-control datepicker select2Clear','id' => 'to_date_main']) }}
            </div>
            <div class="form-group col-sm-0">
                <button class="btn btn-sm btn-primary text-white pt-2 pb-2 clearListPropertynumber">{{ __('message.apply_filter') }}</button>
            </div>
            <div class="form-group col-md-auto text-right">
                <a href="{{ route('report-of-user') }}" class="btn btn-light text-dark pt-2 pb-2">
                    <i class="ri-repeat-line" style="font-size:12px"></i> {{ __('message.reset_filter') }}
                </a>        
                <button type="button" class="btn btn-info text-black pt-2 pb-2" id="export-button" data-toggle="modal" data-target="#exportModal">
                    <i class="ri-download-line" style="font-size:12px"></i> {{ __('message.export') }}
                </button>
            </div>
        </div>
    {{ Form::close() }}
    @include('report.reportofuserexportmodel')
</div>
<script src="{{ asset('frontend-website/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('js/jquery.validate.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $.validator.addMethod('greaterThanEqual', function (value, element, param) {
            var fromDateValue = $(param).val();
            if (!value || !fromDateValue) {
                return true;
            }
            return new Date(value) >= new Date(fromDateValue);
        });

        $('#filter-form').validate({
            rules: {
                from_date: {
                    // required: true,
                },
                to_date: {
                    // required: true,
                    greaterThanEqual: '#from_date_main'
                }
            },
            messages: {
                from_date: {
                     required: "{{ __('message.from_date_required') }}"
                },
                to_date: {
                    required: "{{ __('message.to_date_required') }}",
                    greaterThanEqual: "{{ __('message.to_date_must_be_greater_than_from_date') }}"
                }
            },
            errorPlacement: function (error, element) {
                error.addClass('text-danger');
                    if (element.attr("name") == "from_date") {
                        $('#form_validation_from_date').prepend(error);
                       
                    } else if (element.attr("name") == "to_date") {
                        $('#form_validation_to_date').prepend(error);
                    } else {
                        error.insertAfter(element);
                    }
            },
            highlight: function (element) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element) {
                $(element).removeClass('is-invalid');
            }
        });
        $('#export-button').on('click', function (e) {
            var clientId = $('#filter-form select[name="client_id"]').val();
            if (!clientId) {
                e.preventDefault();
                var message = "{{ __('message.user_required') }}";
                $('#form_validation_client_id').text(message).addClass('text-danger');
                return false;
            } else {
                $('#form_validation_client_id').text('').removeClass('text-danger');
            }
        });
    });
</script>


