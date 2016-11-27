<?php

namespace App\Policies;
use App\model\Post;
use App\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {

    }
    public function before(Admin $admin)
    {
        if ($admin->SuperAdmin==1) {
            return true;
        }
    }
    public function Update(Admin $admin, Post $post)
    {
        return $admin->id === $post->admin_id;
    }

    public function Delete(Admin $admin,Post $post)
    {
       
        if ($admin->id == $post->admin_id){
            return true;
        }else {
            $feature=\App\model\feature::where('admin_id',$admin->id)->where('type','DeletePost')->firstOrFail();
            return true;
        }

    }

    public function Add(Admin $admin)
    {
        $feature=\App\model\feature::where('admin_id',$admin->id)->where('type','AddPost')->firstOrFail();
        return true;
    }
}
