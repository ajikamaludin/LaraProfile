<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function setting()
    {
        $setting = DB::table('setting')->first();
        $data = json_decode($setting->link)->link;
        $setting->fb = $data->fb;
        $setting->ig = $data->ig;
        $setting->yt = $data->yt;
        return view('admin.setting',['setting' => $setting]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        return view('admin.profile');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeSetting(Request $request)
    {
        if($request->hasFile('logoImg')){
            $logo = $request->file('logoImg');
            if($logo = $logo->move('storage/upload/', str_random(40).'.'.$logo->getClientOriginalExtension())){
                $logoName = $logo->getPathname();
            }
            $update = DB::table('setting')->update(['logo' => $logoName]);
        }
        

        $update = DB::table('setting')->update([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'link' => json_encode(['link' => [
                'fb' => $request->link[0],
                'ig' => $request->link[1],
                'yt' => $request->link[2]
                ]])
            ]);
        if($update){
            return redirect()->route('admin.settings')->with('success','Saved');
        }else{
            return redirect()->route('admin.settings')->with('error','Something went wrong');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeProfile(Request $request)
    {
        $user = User::find(Auth::user()->id);
        if($request->hasFile('picture')){
            $picture = $request->file('picture');
            if($picture = $picture->move('storage/profile/', str_random(40).'.'.$picture->getClientOriginalExtension())){
                $user->picture = $picture->getPathname();
            }
        }
        if(!empty($request->password)){
            $user->password = $request->password;
        }
        $user->name = $request->name;
        $user->email = $request->email;
        if($user->update()){
            return redirect()->route('admin.profile')->with('success','Saved');
        }else{
            return redirect()->route('admin.profile')->with('error','Something went wrong');
        }
    }
}
