<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profile;

class ProfileController extends Controller
{



  // 以下を追記

  public function edit(Request $request)
  {
      // News Modelからデータを取得する
      $news = Profile::find($request->id);

      return view('admin.profile.edit', ['news_form' => $news]);
  }


  public function update(Request $request)
  {
      // Validationをかける
      $this->validate($request, Profile::$rules);
      // News Modelからデータを取得する
      $news = Profile::find($request->id);
      // 送信されてきたフォームデータを格納する
      $news_form = $request->all();
      if (isset($news_form['image'])) {
        $path = $request->file('image')->store('public/image');
        $news->image_path = basename($path);
      } else {
          $news->image_path = null;
      }
      // \Debugbar::info(isset($news_form['image']));
      unset($news_form['_token']);
      unset($news_form['image']);
      // 該当するデータを上書きして保存する
      $news->fill($news_form)->save();
      return redirect('/admin/profile/');
  }

  public function delete(Request $request)
{
    // 該当するNews Modelを取得
    $news = Profile::find($request->id);
    // 削除する
    $news->delete();
    return redirect('admin/profile/');
}


}
