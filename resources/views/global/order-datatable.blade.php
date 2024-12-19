<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">{{ $pageTitle }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        {{ Form::open(['method' => 'GET', 'route' => 'order.index','id' => 'filter-form' ]) }}
        <div class="row col-md-12 p-2" id="clear-filter-list-data">
            <div class="form-group col-md-6">
                {{ Form::label('country_id', __('message.select_name',[ 'select' => __('message.country') ]), [ 'class' => 'form-control-label' ]) }}
                {{ Form::select('country_id',$country,$selectedCountryId ,[
                    'class' => 'select2js form-control country',
                    'data-placeholder' => __('message.select_name',[ 'select' => __('message.country') ]),
                    'data-ajax--url' => route('ajax-list', [ 'type' => 'country-list' ]),
                    ]) }}
            </div>
            <div class="form-group col-md-6">
               {{ Form::label('city_id', __('message.select_name', ['select' => __('message.city')]), ['class' => 'form-control-label']) }}
               {{ Form::select('city_id',$cities,$selectedCityId,[
                   'class' => 'select2js form-control city',
                   'data-placeholder' => __('message.select_name', ['select' => __('message.city')]),
                   'data-ajax--url' => route('ajax-list', ['type' => 'city-list']),
               ]) }}
           </div>
            <div class="form-group col-md-4">
                {{ Form::label('status',__('message.status').' <span class="text-danger">*</span>',['class'=>'form-control-label'],false) }}
                {{ Form::select('status',[ '' => __('message.all'),'draft' => __('message.draft'), 'completed' => __('message.delivered'),
                'courier_departed' => __('message.departed'),'cancelled' => __('message.cancelled'),
                'courier_assigned' => __('message.assigned'),'active' => __('message.accepted'),
                'courier_arrived' => __('message.arrived'),'courier_picked_up' => __('message.picked_up'),'shipped' => __('message.shipped'),'reschedule' => __('message.reschedule'),
                'create' => __('message.created') ] ,$params['status'] ?? old($params['status']), [ 'class' => 'form-control select2js']) }}
            </div>
            <div class="form-group col-md-4">
                {{ Form::label('from_date',__('message.from_date').' <span class="text-danger">*</span>',['class'=>'form-control-label'],false) }}
                <span class="text-danger" id="form_validation_from_date"></span>
                {{ Form::date('from_date',$params['from_date'] ?? old('from_date'),[ 'placeholder' => __('message.date'),'class' =>'form-control min-datepicker select2Clear','id' => 'from_date_main']) }}
            </div>
            <div class="form-group col-md-4">
                {{ Form::label('to_date',__('message.to').' <span class="text-danger">*</span>',['class'=>'form-control-label'],false) }}
                <span class="text-danger" id="form_validation_to_date"></span>
                {{ Form::date('to_date', $params['to_date'] ?? old('to_date'),[ 'placeholder' => __('message.date'), 'class' =>'form-control min-datepicker select2Clear','id' => 'to_date_main']) }}
            </div>
        </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-md btn-danger float-right mr-1 clearListPropertynumber text-dark" id="clear-filter-list-data">{{ __('message.reset_filter') }}</button>
                {{ Form::submit( __('message.apply_filter'), [ 'id' => 'apply-order-filter', 'class' => 'btn btn-md btn-primary float-right' ]) }}
            </div>
        {{ Form::close() }}
    </div>
</div>
<script src="{{ asset('js/jquery.validate.min.js') }}"></script>
{{-- <script src="{{ asset('js/backend-bundle.min.js') }}"></script> --}}
<script>
    $(document).ready(function() {
        $(".select2js").select2({
        width: "100%",
    });

        $('.clearListPropertynumber').click(function() {
            $('#from_date_main').val('').trigger('change');
            $('#to_date_main').val('').trigger('change');
            $('#clear-filter-list-data').find('select.select2js').val(null).trigger('change');
        });

        $('#apply-order-filter').click(function() {
            $('#filter-form').submit(function() {
                $(this).find(':input').filter(function() {
                    return $.trim(this.value) === '';
                }).prop('disabled', true);

                return true;
            });
        });

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
    });
</script>