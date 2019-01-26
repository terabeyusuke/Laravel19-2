<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

use App\Profile;
use Carbon\Carbon;
use App\ProfileHistory;

class ProfileController extends Controller
{



  // 以下を追記

  public function edit(Request $request)
  {
    $profile = Profile::find($request->id);


    return view('admin.profile.edit', ['profile_form' => $profile]);
  }


  public function update(Request $request)
  {
    $this->validate($request, Profile::$rules);
    // News Modelからデータを取得する
    $profiles = Profile::find($request->id);
    // 送信されてきたフォームデータを格納する
    $profiles_form = $request->all();

    unset($profiles_form['_token']);
    unset($profiles_form['_remove']);
    // 該当するデータを上書きして保存する
    $profiles->fill($profiles_form)->save();

    //18章編集履歴
    $history = new Profilehistory;
    $history->profile_id = $profiles->id;
    $history->edited_at = Carbon::now();
    $history->save();

    return redirect('admin/profile/create');


    }




  public function create(Request $request)
  {

      // // Varidationを行う
      $this->validate($request, Profile::$rules);

      $profile = new Profile;
      $profile_form = $request->all();



      unset($profile_form['_token']);
      // データベースに保存する
      $profile->fill($profile_form);
      $profile->save();

      return redirect('admin/profile/create');


    }



    public function add()
    {
        $profiles = Profile::all();
        return view('admin.profile.create',["profiels" => $profiles]);
    }


    public function delete(Request $request)
    {
        // 該当するNews Modelを取得
        $profile = Profile::find($request->id);
        // 削除する
        $profile->delete();
        return redirect('admin/profile/create/');
    }


}
