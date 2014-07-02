<?php

class SiteHelper {
    public static function adminUserLink($user){
        if($user->avatar){
            return '<a title="'.$user->name.'" class="link-user-avatar" href="'.route('user.edit',array('id'=>$user->id)).'"><img src="'.$user->avatar.'" class="img-responsive img-circle"/></a>';
        }else {
            $color = array(
                '#CECECE','#F2EAFF','#FEDDFF','#EEFFED','#fff','#9E9E9E','#FAFFDB','#FFDFD6','#1bef63',
                '#1bef63','#d2d883','#5b22fd','#c9991c','#edd278','#dd7d22','#cfdfda','#b92782','#5890a8','#df1b0b','#3d9b6e','#8a9051',
            );
            $bg = $color[rand(1,  count($color)-1)];
            $fullName = $user->name;
            $arr = explode(' ',$fullName);
            $name = strlen($arr[0]<7) ? $arr[0] : substr($arr[0],0,5).'...';
            return '<a  title="'.$user->name.'" style="background:'.$bg.'" class="link-user-name" href="'.route('user.edit',array('id'=>$user->id)).'">'.$name.'</a>';
        }
    }
}

