<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Redirect;
use Illuminate\Support\Facades\Input;

class CommentController extends Controller
{
    /**
     * for authentication
     */
    public function AuthCheck() {
        $admin_id = Session::get('admin_id');
        if ($admin_id) {
            return;
        } else {
            return Redirect::to('/admin')->send();
        }
    }
    
    public function addComment(Request $request) {

        $data = array();
        $data['movie_id'] = $request->movie_id;
        $data['comment_person_name'] = $request->comment_person_name;
        $data['comment_person_email'] = $request->comment_person_email;
        $data['comment_person_comment'] = $request->comment_person_comment;
        $data['comment_created_at'] = date('Y-m-d h:i:s',((time()-6*3600)));
        
//        $comment_data = DB::table('tbl_comment')
//                ->insertGetId($data);
        $result = DB::table('tbl_comment')->insert($data);
        if($result){
            return Redirect::to('movie-details/'.$request->movie_id)->with('success', 'Successfully Commented..!!');
        } else {
            return Redirect::to('movie-details/'.$request->movie_id)->with('error', 'There is a error Commenting..!!');
        }


    }
    
    /* ------------- Manage Comment --------------------- */

    public function manageComment() {
        $this->AuthCheck();
        $comments = DB::table('tbl_comment')->get();
        $manage_comments = view('backend.comment.manage_comment')->with('comments', $comments);
        return view('backend.admin_master')
                        ->with('admin_content', $manage_comments);
    }
    
    /* ------------ Delete Comment ----------------- */

    public function deleteComment($id) {

        $result = DB::table('tbl_comment')->where('comment_id', $id)->delete();
        if ($result) {
            return Redirect::to('manage-comment')->with('success', 'Comment Deleted Successfully!!');
        } else {
            return Redirect::to('manage-comment')->with('error', 'There is a error Deleting Data!!');
        }
    }

}
