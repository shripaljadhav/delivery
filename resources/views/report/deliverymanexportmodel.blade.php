<div class="modal fade" id="exportModal" tabindex="-1" role="dialog" aria-labelledby="exportModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exportModalLabel">{{ __('message.export') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
            </div>
            <div class="modal-body">
                <form id="exportForm" method="get">
                    <div class="form-group">
                        <label for="date_range" class="d-flex mb-3">{{ __('message.select_date') }}</label>
                        <input type="text" class="form-control" id="date_range" name="date_range" placeholder="Select Date Range">
                        
                        <input type="hidden" id="from_date" name="from_date">
                        <input type="hidden" id="to_date" name="to_date">
                    </div>
                    <div class="d-flex justify-content-center mb-3">
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-secondary active">
                                <input type="radio" name="options" id="option1" value="xlsx" checked> XLSX
                            </label>
                            <label class="btn btn-secondary">
                                <input type="radio" name="options" id="option2" value="xls"> XLS
                            </label>
                            <label class="btn btn-secondary">
                                <input type="radio" name="options" id="option3" value="ods"> ODS
                            </label>
                            <label class="btn btn-secondary">
                                <input type="radio" name="options" id="option4" value="csv"> CSV
                            </label>
                            <label class="btn btn-secondary">
                                <input type="radio" name="options" id="option5" value="pdf"> PDF
                            </label>
                            <label class="btn btn-secondary">
                                <input type="radio" name="options" id="option6" value="html"> HTML
                            </label>
                        </div>
                    </div>
                    <hr>
                    <h6 class="d-flex mb-3">{{ __('Select Columns') }}</h6>
                    <div class="row">
                        <div class="col-md-6 mr-4">
                            @foreach(['traking_id','order_id', 'user', 'delivery_man_excel', 'pickup_date_time_excel', 'delivery_date_time_excel', 'total_amount_excel', 'commission_type_excel', 'admin_commission_excel', 'delivery_man_commission_excel'] as $column)
                                <div class="d-flex">
                                    <input type="checkbox" name="columns[]" value="{{ $column }}" checked>
                                    <label class="form-check-label ml-2">{{ __('message.' . $column) }}</label>
                                </div>
                            @endforeach
                        </div>
                        <div class="col-md-6">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Cancel') }}</button>
                <button type="button" class="btn btn-primary" id="downloadBtn">{{ __('Download') }}</button>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
    $(document).ready(function() {
        $('.select2js').select2();
        flatpickr("#date_range", {
            mode: "range",
            dateFormat: "Y-m-d",
            onChange: function(selectedDates, dateStr, instance) {
                if (selectedDates.length === 2) {
                    var fromDate = selectedDates[0].toISOString().split('T')[0];
                    var toDate = selectedDates[1].toISOString().split('T')[0];
                    
                    $('#from_date').val(fromDate);
                    $('#to_date').val(toDate);
                }
            }
        });

        $('#downloadBtn').on('click', function() {
            var fileType = $('input[name="options"]:checked').val();
            var columns = $('input[name="columns[]"]:checked').map(function() {
                return $(this).val();
            }).get();

            var baseUrl = '{{ url('/') }}';
            var route = fileType === 'pdf' ? 'download-deliverymanearningpdf' : 'download-deliveryman-earning/' + fileType;
            var url = baseUrl + '/' + route;

            var fromDate = $('#from_date').val();
            var toDate = $('#to_date').val();

            // if (!fromDate || !toDate) {
            //     alert('Please select both From Date and To Date.');
            //     return;
            // }

            var queryString = $.param({
                columns: columns,
                from_date: fromDate,
                to_date: toDate
            });

            window.location.href = url + '?' + queryString;
        });
    });
</script>
