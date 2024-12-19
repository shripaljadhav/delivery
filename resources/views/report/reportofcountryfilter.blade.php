<div class="card-body">
    {{ Form::open(['method' => 'GET', 'url' => route('report-of-country'),'id' => 'filter-form']) }}
        <div class="row justify-content-end align-items-end">
            <div class="form-group col-md-3">
                {{ Form::label('country_id', __('message.country').' <span class="text-danger">*</span>', ['class' => 'form-control-label'], false) }}
                <span class="text-danger" id="form_validation_country_id"></span>
                {{ Form::select('country_id',  $selectedCountry ,request('country_id'), [
                    'class' => 'select2js form-group country',
                    'data-placeholder' => __('message.country'),
                    'data-ajax--url' => route('ajax-list', ['type' => 'country-list']),
                ]) }}
            </div>
            <div class="form-group col-auto">
                {{ Form::label('from_date', __('message.from').' <span class="text-danger">*</span>', ['class' => 'form-control-label'], false) }}
                <span class="text-danger" id = "form_validation_from_date"></span>
                {{ Form::date('from_date', $params['from_date'] ?? old('from_date'), ['placeholder' => __('message.date'), 'class' => 'form-control datepicker select2Clear','id' => 'from_date_main']) }}
            </div>
            <div class="form-group col-auto">
                {{ Form::label('to_date', __('message.to').' <span class="text-danger">*</span>', ['class' => 'form-control-label'], false) }}
                <span class="text-danger" id = "form_validation_to_date"></span>
                {{ Form::date('to_date', $params['to_date'] ?? old('to_date'), ['placeholder' => __('message.date'), 'class' => 'form-control datepicker select2Clear','id' => 'to_date_main']) }}
            </div>
            <div class="form-group col-sm-0">
                <button class="btn btn-sm btn-primary text-dark pt-2 pb-2 clearListPropertynumber filter-property-form">{{ __('message.apply_filter') }}</button>
            </div>
            <div class="form-group col-sm-auto text-right">
                <a href="{{ route('report-of-country') }}" class="btn btn-light text-dark pt-2 pb-2">
                    <i class="ri-repeat-line" style="font-size:12px"></i> {{ __('message.reset_filter') }}
                </a>
                <button type="button" class="btn btn-info text-black pt-2 pb-2" id="export-button" data-toggle="modal" data-target="#exportModal">
                    <i class="ri-download-line" style="font-size:12px"></i> {{ __('message.export') }}
                </button>
            </div>
        </div>
    {{ Form::close() }}
    @include('report.reportofcountryexportmodel')
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
                    // required: true
                },
                to_date: {
                    greaterThanEqual: '#from_date_main'
                }
            },
            messages: {
                from_date: {
                    required: "{{ __('message.from_date_required') }}"
                },
                to_date: {
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
            var countryId = $('#filter-form select[name="country_id"]').val();
            if (!countryId) {
                e.preventDefault();
                var message = "{{ __('message.country_required') }}";
                $('#form_validation_country_id').text(message).addClass('text-danger');
                return false;
            } else {
                $('#form_validation_country_id').text('').removeClass('text-danger');
            }
        });
    });
</script>