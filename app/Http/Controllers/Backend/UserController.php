<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\UserInfo;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('created_at','desc')->paginate(10);
        return view('backend.users.index')->with(['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $user = User::all();
        $this->authorize('create',User::class);    
        return view('backend.users.create')->with(['user'=> $user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $user = new User();
        $user->name = $request->get('name'); 
        $user->email = $request->get('email'); 
        $user->password = bcrypt($request->get('password')); 
        $user->role = $request->get('role'); 
        $user->save();
        $user_info = new UserInfo();

        $user_info->address = $request->get('address');
        $user_info->phone = $request->get('phone');
        if($request->hasFile('image')){
            $files = $request->file('image');
            foreach($files as $file){
                
                $name = $file->getClientOriginalName();
                // dd($file->getClientOriginalName());
                $disk_name = 'public';
                
                $path = Storage::disk($disk_name)->putFileAs('images',$file,$name);
                
                // if(!$user_info){
                //     $user_info = new UserInfo();
                // }
                
                $user_info->disk = $disk_name;
                $user_info->path = $path;
                $user_info->user_id = $user->id;

                $user_info->save();
            }
        }else{
            dd('khong co file');
        }
        if($user->save() &&  $user_info->save()){
            return redirect()->route('backend.user.index')->with("success",'Thêm mới người dùng thành công');  
       }else{
           return redirect()->route('backend.user.index')->with("error",'Thêm mới người dùng thất bại');  
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function showProducts($user_id)
    {
        $users = User::find($user_id)->products()->paginate(10);
        return view('backend.users.showProduct')->with(['users' => $users ]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($user_id)
    {
        $users = User::find($user_id);
        
        return view('backend.users.edit')->with(['users'=> $users]);
    }

    public function editprofile($id)
    {
        $users = User::find($id);
        
        return view('backend.users.editprofile')->with(['users'=> $users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $users = User::find($id);

        $users->name = $request->get('name');
        $users->email = $request->get('email');

        if($request->get('password') == null){
            $users->password  =  $users->password;
        }else{
            $users->password = bcrypt($request->get('password'));
        }
        
        // dd($users);
        $users->save();

        $user_info = UserInfo::where('user_id',$users->id)->first();

        $user_info->address = $request->get('address');
        $user_info->phone = $request->get('phone');
        if($request->hasFile('image')){
            $files = $request->file('image');
            foreach($files as $file){
                
                $name = $file->getClientOriginalName();
                // dd($file->getClientOriginalName());
                $disk_name = 'public';
                
                $path = Storage::disk($disk_name)->putFileAs('images',$file,$name);
                
                if(!$user_info){
                    $user_info = new UserInfo();
                }
                
                // dd($image);
                $user_info->disk = $disk_name;
                $user_info->path = $path;
                $user_info->user_id = $users->id;

                $user_info->save();
                // dd($image);
            }
        }
        if($users->save() &&  $user_info->save()){
            return redirect()->route('backend.user.index')->with("updatesuccess",'Chỉnh sửa người dùng thành công');  
       }else{
           return redirect()->route('backend.user.index')->with("updateerror",'Chỉnh sửa người dùng thất bại');  
       }


    }
    public function updateprofile(UpdateUserRequest $request, $id)
    {
        $users = User::find($id);

        $users->name = $request->get('name');
        $users->email = $request->get('email');

        if($request->get('password') == null){
            $users->password  =  $users->password;
        }else{
            $users->password = bcrypt($request->get('password'));
        }
        
        // dd($users);
        $users->save();

        $user_info = UserInfo::where('user_id',$users->id)->first();

        $user_info->address = $request->get('address');
        $user_info->phone = $request->get('phone');
        if($request->hasFile('image')){
            $files = $request->file('image');
            foreach($files as $file){
                
                $name = $file->getClientOriginalName();
                // dd($file->getClientOriginalName());
                $disk_name = 'public';
                
                $path = Storage::disk($disk_name)->putFileAs('images',$file,$name);
                
                if(!$user_info){
                    $user_info = new UserInfo();
                }
                
                // dd($image);
                $user_info->disk = $disk_name;
                $user_info->path = $path;
                $user_info->user_id = $users->id;

                $user_info->save();
                // dd($image);
            }
        }
        if($users->save() &&  $user_info->save()){
            return redirect()->route('backend.dashboard')->with("updatesuccess",'Cập nhật thông tin thành công');  
       }else{
           return redirect()->route('backend.dashboard')->with("updateerror",'Cập nhật thông tin thất bại');  
       }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        // $user = User::find($id);
        // $user->delete();
        $user_info = UserInfo::where('user_id',$user->id)->delete();
        Product::where('user_id',$user->id)->update(['user_id' => User::ADMIN]);
        Category::where('user_id',$user->id)->update(['user_id' => NULL]);
        Brand::where('user_id',$user->id)->update(['user_id' => NULL]);

        if( $user->delete() &&  $user_info){
            return redirect()->route('backend.user.index')->with("deletesuccess",'Xóa người dùng thành công');      
        }else{
           return redirect()->route('backend.user.index')->with("deleteerror",'Xóa người dùng thất bại');  
        }
    }
}
