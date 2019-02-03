<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use DB;
use Session;
use Redirect;
use Illuminate\Support\Facades\Input;   //for get sub category

class MovieController extends Controller
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

    /* ------------- Add Movie --------------------- */

    public function addMovie() {
        $this->AuthCheck();
        $add_movie = view('backend.movie.add_movie');
        return view('backend.admin_master')
                    ->with('admin_main_content', $add_movie);
    }


    /* ------------- Add Movie --------------------- */
    
    public function saveMovie(Request $request) {

        try {
//            echo '<pre>';
//            print_r($_POST);
//            exit();
            $data = array();
            $data['movie_title'] = $request->movie_title;
            $data['movie_long_description'] = $request->movie_long_description;
            $data['movie_release_date'] = $request->movie_release_date;
            $data['movie_rating'] = $request->movie_rating;
            $data['movie_ticket_price'] = $request->movie_ticket_price;
            $data['movie_country'] = $request->movie_country;
            $data['movie_genre'] = $request->movie_genre;

//            $data['movie_image'] = $request->movie_image;

            $data['status'] = $request->status;
            $data['created_by'] = $request->admin_id;
            $data['created_at'] = date('Y-m-d h:i:s', ((time() - 6 * 3600)));
            
//            echo '<pre>';
//            print_r($data);
//            exit();
            
            
            //------------- Start Image Upload Section -------------- //
            $image = $request->file('movie_image');
            if ($image) {
                $file_size = $image->getClientSize();
                $name = str_random(20);
                $extension = $image->getClientOriginalExtension();
                $image_name = $name . '.' . $extension;
                $upload_path = 'public/movie_images/';
                //-------- Check image format ----------//
                if ($extension == 'JPG' || $extension == 'jpg' || $extension == 'png' || $extension == 'PNG' || $extension == 'JPEG' || $extension == 'jpeg') {
                    //------ Check file size --------//
                    if ($file_size < 5120000) {
                        $success = $image->move($upload_path, $image_name);
                        $data['movie_image'] = $image_name;
                    } else {
                        return Redirect::to('/add-movie')->with('error', 'Maximum file size is 5MB');
                    }
                } else {
                    return Redirect::to('/add-movie')->with('error', 'Image File type not supported...!');
                }
            } else {
                return Redirect::to('add-movie')->with('error', 'No Image file selected...!!');
            }
            //------------- End Image Upload Section -------------- //
                    

            $result = DB::table('tbl_movie')->insert($data);
            if ($result) {
                return Redirect::to('add-movie')->with('success', 'Movie Added Successfully!!');
            } else {
                return Redirect::to('add-movie')->with('error', 'There is a error Saving Data!!');
            }
        } catch (\Exception $e) {
            $err_message = \Lang::get($e->getMessage());
            return Redirect::to('add-movie')->with('error', $err_message);
        }
    }

    
    /* ------------- Manage Movie --------------------- */

    public function manageMovie() {
        $this->AuthCheck();
//        $movie = DB::table('tbl_movie')->get();
        $movie = DB::table('tbl_movie')->get();
        $manage_movie = view('backend.movie.manage_movie')->with('movie', $movie);
        return view('backend.admin_master')
                        ->with('admin_content', $manage_movie);
    }
    
    
    /* -------------- Unpublish Movie ------------------- */

    public function unpublishMovie($id) {
        $unpublish = DB::table('tbl_movie')->where('movie_id', $id)->update(['status' => '0']);
        if($unpublish){
            return Redirect::to('manage-movie')->with('success', 'Status Changed Successfully!!');
        }else{
            return Redirect::to('manage-movie')->with('success', 'There is an error Changing status!!');
        }
    }

    /* -------------- Publish Movie ------------------- */

    public function publishMovie($id) {
        $publish = DB::table('tbl_movie')->where('movie_id', $id)->update(['status' => '1']);
        if($publish){
            return Redirect::to('manage-movie')->with('success', 'Status Changed Successfully!!');
        }else{
            return Redirect::to('manage-movie')->with('success', 'There is an error Changing status!!');
        }
    }

    /* ------------ Delete Movie ----------------- */

    public function deleteMovie($id) {
        $delete = DB::table('tbl_movie')->where('movie_id', $id)->first();
        if($delete){
            unlink('public/movie_images/' . $delete->movie_image);
        }   
        $result = DB::table('tbl_movie')->where('movie_id', $id)->delete();
        if ($result) {
            return Redirect::to('manage-movie')->with('success', 'Movie Deleted Successfully!!');
        } else {
            return Redirect::to('manage-movie')->with('error', 'There is an error Deleting Data!!');
        }
    }
    
    /* ------------ Edit Movie ----------------- */

    public function editMovie($id) {
        $this->AuthCheck();
        $result = DB::table('tbl_movie')->where('movie_id', $id)->first();
        return view('backend.movie.edit_movie')->with('result', $result);
    }
    
    
        /* ---------------- Update Movie -------------------- */

    public function updateMovie(Request $request) {
        try {
            $data = array();
            $data['movie_title'] = $request->movie_title;
            $data['movie_long_description'] = $request->movie_long_description;
            $data['movie_release_date'] = $request->movie_release_date;
            $data['movie_rating'] = $request->movie_rating;
            $data['movie_ticket_price'] = $request->movie_ticket_price;
            $data['movie_country'] = $request->movie_country;
            $data['movie_genre'] = $request->movie_genre;
            
            $data['status'] = $request->status;
            $data['created_by'] = $request->admin_id;
            $data['updated_at'] = date('Y-m-d h:i:s', ((time() - 6 * 3600)));
            
            
            //------------- Start Image Upload Section -------------- //
            $image = $request->file('movie_image');
            if ($image) {
                $file_size = $image->getClientSize();
                $name = str_random(20);
                $extension = $image->getClientOriginalExtension();
                $image_name = $name . '.' . $extension;
                $upload_path = 'public/movie_images/';
                //-------- Check image format ----------//
                if ($extension == 'jpg' || $extension == 'png' || $extension == 'jpeg') {
                    //------ Check file size --------//
                    if ($file_size < 5120000) {
                        $success = $image->move($upload_path, $image_name);
                        if ($request->last_image_path) {
                            if($request->last_image_path != 'empty'){
                                $old_image_path = $request->last_image_path;
                                unlink('public/movie_images/' . $old_image_path);
                            }
                        }
                        $data['movie_image'] = $image_name;

                    } else {
                        return Redirect::to('/edit-movie'.$request->movie_id)->with('error', 'Maximum file size is 5MB');
                    }
                } else {
                    return Redirect::to('/edit-movie'.$request->movie_id)->with('error', 'Image File type not supported...!');
                }
            } else {
                $data['movie_image'] = $request->last_image_path;

            }
            //------------- End Image Upload Section -------------- //
            

            $result = DB::table('tbl_movie')->where('movie_id', $request->movie_id)->update($data);
            if ($result) {
                return Redirect::to('manage-movie')->with('success', 'Movie Updated Successfully!!');
            } else {
                return Redirect::to('/edit-movie/'.$request->movie_id)->with('error', 'There is a error Updating Data!!');
            }
        } catch (\Exception $e) {
            $err_message = \Lang::get($e->getMessage());
            return Redirect::to('/edit-movie/'.$request->movie_id)->with('error', $err_message);
        }
    }
    
    /* ------------ View Single Movie ----------------- */

    public function movieDetails($id) {
        $view_single_movie = DB::table('tbl_movie')
                ->where('movie_id',$id)
                ->first();
        
        $home_content = view('frontend.pages.movie_detail')
                ->with('view_single_movie', $view_single_movie);
        
        return view('frontend.home_master')
                        ->with('home_content', $home_content);
    }
    
    
    
}
