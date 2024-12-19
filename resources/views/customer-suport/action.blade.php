<?php
    $auth_user= authSession();
?>
<div class="d-flex justify-content-end align-items-center">

    @if($auth_user->can('customersupport-show'))
    <a class="mr-2" href="{{ route('customersupport.show',$id) }}"><i class="fa-solid fa-message"></i></a>
    @endif

    @if($auth_user->can('customersupport-delete'))
        {{ Form::open(['route' => ['customersupport.destroy', $id], 'method' => 'delete','data--submit'=>'customer_support'.$id]) }}
                <a class="mr-2 text-danger" href="javascript:void(0)" data--submit="customer_support{{$id}}"
                    data--confirmation='true' data-title="{{ __('message.delete_form_title',['form'=> __('message.customer_support') ]) }}"
                    title="{{ __('message.delete_form_title',['form'=>  __('message.customer_support') ]) }}"
                    data-message='{{ __("message.delete_msg") }}'>
                    <i class="fas fa-trash-alt"></i>
                </a>
        {{ Form::close() }}
    @endif
</div>