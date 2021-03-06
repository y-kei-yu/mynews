<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Profile;
use App\Profile_History;
use Carbon\Carbon;

class ProfileController extends Controller
{
    //
    public function add()
    {
        return  view('admin.profile.create');
    }
    
    public function create(Request $request)
    {
        
      $this->validate($request, Profile::$rules);
      
      $profile = new Profile;
      $form = $request->all();
      
      unset($form['_token']);
      unset($form['image']);
      
      $profile -> fill($form);
      $profile -> save();
      
      return  redirect('admin/profile/create');
    }
    
    public function index (Request $request)
    {
        $cond_title = $request->cond_title;
        if($cond_title !='') {
            $post = Profile::where('title', $cond_title)->get();
        } else {
            $posts = Profile::all();
        }
        return view ('admin.profile.index', ['posts' => $posts, 'cond_title' =>$cond_title]);
    }
    
    public function edit(Request $request)
    {
        $profile = profile::find($request->id);
        if (empty($profile)) {
            abort(404);
        }
        return view('admin.profile.edit',['profile_form' => $profile]);
    }
    
    public function update(Request $request)
    {
         // Validationをかける
      $this->validate($request, Profile::$rules);
      
      // News Modelからデータを取得する
      $profile = Profile::find($request->id);
      
      // 送信されてきたフォームデータを格納する
      $profile_form = $request->all();
     
      unset($profile_form['_token']);
      
      // 該当するデータを上書きして保存する
      $profile->fill($profile_form)->save();
      
       $profile_history = new Profile_History;
       $profile_history->profile_id = $profile->id;
       $profile_history->edited_at = Carbon::now();
       $profile_history->save();

        return redirect('admin/profile');
    }
    
    public function delete(Request $request)
    {
      $profile= Profile::find($request->id);
      // 削除する
      $profile->delete();
      return redirect('admin/profile/');
    }
}
