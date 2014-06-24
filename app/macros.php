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
        $button_options['class']='btn btn-danger';
    }
    return Form::open($form_parameters)
            . Form::submit($button_label, $button_options)
            . Form::close();
});