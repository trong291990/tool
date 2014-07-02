<?php 

Form::macro('delete',function($url, $button_label='Delete',$message='Are you sure ?',$form_parameters = array(),$button_options=array()){

    if(empty($form_parameters)){
        $form_parameters = array(
            'method'=>'DELETE',
            'class' =>'delete-form',
            'url'   =>$url,
            'onsubmit'=>"return confirm('{$message}')"
            );
    }else{
        $form_parameters['url'] = $url;
        $form_parameters['method'] = 'DELETE';
        $form_parameters['onsubmit'] = "return confirm('{$message}')";
    };
    if(empty($button_options)){
        $button_options['class']='';
    }
    return Form::open($form_parameters)
            . Form::submit($button_label, $button_options)
            . Form::close();
});

HTML::macro('alert', function($type, $message, $head = null) {
    switch ($type) {
        case 'danger': //red
            $head = $head ? $head : 'Error';
            break;
        case 'warning': //yellow
            $head = $head ? $head : 'Warning';
            break;
        case 'info': //blue
            $head = $head ? $head : 'Info';
            break;
        case 'success': //green
            $head = $head ? $head : 'Success';
            break;
    }
    return '<div class="alert alert-'. $type .'"><button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button><strong>'. $head .'! </strong>' . $message . '</div>';
});