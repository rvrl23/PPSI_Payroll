<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use Image;
use Session;
use App\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function login(Request $request){
        if($request->isMethod('post')){
            $data = $request->input();
             if (Auth::attempt(['email' => $data['email'], 'password' => $data['password'],'admin' => '1'])) {
                //echo "Success"; die;
                /*Session::put('adminSession',$data['email']);*/
                return redirect('/admin/dashboard');
            }else{
                //echo "failed"; die;
                return redirect('/admin')->with('flash_message_error','Invalid Username or Password');
            }
        }
        return view('admin.admin_login');
    }
    public function dashboard(){
        /*if(Session::has('adminSession')){
            //Perform all dashboard tasks
        }else{
            return redirect('/admin')->with('flash_message_error','Please login to access');
        }*/
        return view('admin.dashboard');
    }
    public function setting(){
        return view('admin.setting');
    }
    public function chkPassword(Request $request){
        $data = $request->all();
        $current_password = $data['current_pwd'];
        $check_password = User::where(['admin'=>'1'])->first();
        if(Hash::check($current_password,$check_password->password)){
            echo "true"; die;
        }else {
            echo "false"; die;
        }
    }
    // public function updatePassword(Request $request){
    //     if($request->isMethod('post')){
    //         $data = $request->all();
    //         //echo "pre"; print_r($data); die;
    //         $check_password = User::where(['email' => Auth::user()->email])->first();
    //         $current_password = $data['current_pwd'];
    //         if(Hash::check($current_password,$check_password->password)){
    //             $password = bcrypt($data['new_pwd']);
    //             User::where('id','1')->update(['password'=>$password]);
    //             return redirect('/admin/setting')->with('flash_message_success','Password updated Successfully!');
    //         }else {
    //             return redirect('/admin/setting')->with('flash_message_error','Incorrect Current Password!');
    //         }
    //     }
    // }
    // public function logout(){
    //     Session::flush();
    //     return redirect('/admin')->with('flash_message_success','Logged out Successfully'); 
    // }

    public function adminavatar(Request $request){
        if($request->hasFile('avatar')){
        $avatar = $request->file('avatar');
        $filename = time() . '.' . $avatar->getClientOriginalExtension();
        Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename));

        $user = Auth::user();
        $user->avatar = $filename;
        $user->save();
        return redirect('/admin/setting');
      }
    }

    public function updatePassword(Request $request){
        try {
                $valid = validator($request->only('current_pwd', 'new_pwd', 'confirm_pwd'), [
                    'current_pwd' => 'required|string|min:6',
                    'new_pwd' => 'required|string|min:6|different:current_pwd',
                    'confirm_pwd' => 'required_with:new_pwd|same:new_pwd|string|min:6',
                        ], 
                        [
                    'confirm_pwd.required_with' => 'Confirm password is required.'
                ]);

                if ($valid->fails()) {
                    return redirect('/admin/setting')->with('flash_message_failed','Failed to update password');
                   
                }
                if (Hash::check($request->get('current_pwd'), Auth::user()->password)) {
                    $user = User::find(Auth::user()->id);
                    $user->password = (new BcryptHasher)->make($request->get('new_pwd'));
                    if ($user->save()) {

                        return redirect('/admin/setting')->with('flash_message_success','Your password has been updated!');
                    }
                } else {
                    return redirect('/admin/setting')->with('flash_message_wrong','Wrong password entered!');
                }
            } catch (Exception $e) {
                return redirect('/admin/setting')->with('flash_message_try','Please try again');
            }

          
        
    }
}