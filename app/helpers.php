<?php
/**
 * Created by PhpStorm.
 * User: navid
 * Date: 8/8/2016
 * Time: 6:41 PM
 */
use Intervention\Image\Facades\Image;
function get_excerpt($text, $numb = 20) {
    if (mb_strlen($text) > $numb) {
        $text = strip_tags($text);
        $text = substr($text, 0, $numb);
        $text = mb_substr($text, 0, mb_strrpos($text, " "));
        $etc = " ...";
        $text = $text . $etc;
    }
    return $text;
}
function counter($mails){
    $c=0;
    foreach ($mails as $mail){
        if ($mail->read==0){
            $c++;
        }
    }
        return $c;
}
function mailType($type){
    switch ($type){
        case 1 : return "fa fa-envelope-o";
            break;
        case 2 : echo "fa fa-bullhorn";
            break;
        case 3 : return "fa fa-exclamation-triangle";
            break;

    }
   
}
function likeCount(){
    $c=0;
    $posts=\App\model\Post::all();
    foreach ($posts as $post){
        $c+=$post->like;
    }
    return $c;
}
function mailc($mails){
    
    $c=0;
    foreach ($mails as $mail){
        
        if ($mail->read==0&&$mail->type==1){
            $c++;
        }
    }
    return $c;
}
function notifyc($mails){
    $c=0;
    foreach ($mails as $mail){

        if ($mail->read==0&&$mail->type==2){
            $c++;
        }
    }
    return $c;
}
function warningc($mails){
    $c=0;
    foreach ($mails as $mail){

        if ($mail->read==0&&$mail->type==3){
            $c++;
        }
    }
    return $c;
}
function flash($message,$type='info'){

    session()->flash('sam',$message);
    session()->flash('session_admin_type',$type);
}
function userc(){
    $user=\App\User::all()->count();
    return $user;
}
function commentCount($level){
    if ($level=='seen'){
        $comments=\App\Comment::where('seen',1)->count();
    }else {
        $comments=\App\Comment::where('seen',0)->count();
    }
    return $comments
;}
function AdminUpload($request){
    $file = array('image' => $request->file('pic'));

    $rules = array('image' => 'required', 'mimes:jpeg,bmp,png', 'max:10000');

    $validator = Validator::make($file, $rules);
    if ($validator->fails()) {

        return $validator->messages();
    } else {

        if ($request->file('pic')->isValid()) {
            $destinationPath = 'uploads/AdminPic';

            $fileName = $request->user('admin')->username . '.jpg' ;

            $request->file('pic')->move($destinationPath, $fileName);




            flash('Upload successfully', 'success');
            
        } else {

            flash('uploaded file is not valid', 'danger');
            
        }


    }
    return 0;
}
