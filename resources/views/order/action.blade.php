<?php
    $auth_user = authSession();
?>
@if($delete_at != null)
    <div class="d-flex justify-content-end align-items-center">
        @if($auth_user->can('order-edit'))
            <a class="mr-2" href="{{ route('order.restore', ['id' => $id ,'type'=>'restore']) }}" data--confirmation--restore="true" title="{{ __('message.restore_title') }}"><i class="ri-refresh-line" style="font-size:18px"></i></a>
        @endif
        {{ Form::open(['route' => ['order.force.delete', $id, 'type'=>'forcedelete'], 'method' => 'delete','data--submit'=>'order'.$id]) }}
            @if($auth_user->can('order-delete'))
                <a class="mr-2 text-danger" href="javascript:void(0)" data--submit="order{{$id}}"
                    data--confirmation='true' data-title="{{ __('message.delete_form_title',['form'=> __('message.order') ]) }}"
                    title="{{ __('message.force_delete_form_title',['form'=>  __('message.order') ]) }}"
                    data-message='{{ __("message.force_delete_msg") }}'>
                    <i class="ri-delete-bin-2-fill" style="font-size:18px"></i>
                </a>
            @endif
        {{ Form::close() }}
    </div>
@else
    <div class="d-flex justify-content-end align-items-center">
        {{ Form::open(['route' => ['order.destroy', $id], 'method' => 'delete', 'data--submit' => 'order'.$id]) }}
            @if($auth_user->can('order-delete'))
                <a class="mr-2 text-danger" href="javascript:void(0)" data--submit="order{{$id}}"
                data--confirmation='true' data-title="{{ __('message.delete_form_title',['form'=> __('message.order') ]) }}"
                title="{{ __('message.delete_form_title',['form'=>  __('message.order') ]) }}"
                data-message='{{ __("message.delete_msg") }}'>
                <i class="fas fa-trash-alt"></i>
                </a>
            @endif
        {{ Form::close() }}
        @if( auth()->user()->hasRole(['admin','client']) && $order->status != 'draft' )

            @if($auth_user->can('order-show'))
            <a class="mr-2" href="{{ route('order.show',$id) }}"><i class="fas fa-eye text-secondary"></i></a>
            @endif
        @endif
    </div>
@endif

