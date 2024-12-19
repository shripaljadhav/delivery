{{ Form::open(['route' => ['deliverymandocument.store', 'id' => $id], 'method' => 'post', 'id' => 'yourFormId_' . $id, 'data--submit' => 'deliverymandocument' . $id]) }}
{!! Form::hidden('delivery_man_id', $data->delivery_man_id) !!}
{!! Form::hidden('document_id', $data->document_id) !!}
    <div class="form-group">
        {{ Form::select('is_verified', ['0' => __('message.pending'),'1' => __('message.approved'), '2' => __('message.rejected')], isset($data) ? $data['is_verified'] : '2', ['class' => 'form-control select2js', 'required', 'id' => 'statusDropdown_' . $id, 'onchange' => 'submitForm(' . $id . ')']) }}
    </div>
{{ Form::close() }}

<script>
    function submitForm(id) {
        var statusDropdown = document.getElementById('statusDropdown_' + id);
        var form = document.getElementById('yourFormId_' + id);
        var isVerified = statusDropdown.value
        var confirmationMessage;

        if (isVerified == 1) {
            confirmationMessage = '{{ __("message.approve_document") }}';
        } else if (isVerified == 2) {
            confirmationMessage = '{{ __("message.reject_document") }}';
        } else if (isVerified == 0) {
            confirmationMessage = '{{ __("message.are_you_sure") }}';
        }

        if (confirm(confirmationMessage)) {
            var url = "{{ route('deliverymandocument.action', ':id') }}";
            url = url.replace(':id', id);
            form.submit();
        } else {
            statusDropdown.value = '{{  $data["is_verified"] }}';
        }
    }
</script>

