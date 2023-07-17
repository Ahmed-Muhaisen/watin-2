<?php

namespace App\Http\Controllers;
use App\Models\base;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $base;

     public function __construct()
     {
        $this->base=new base();
        $this->base->model=User::class;
        $this->base->array_input=[
            "name"=>'required |String |max:100',
            "email"=>'required |email',
            "phone"=>'required|max:12',
            "password"=>'required |min:8|',
             "address"=>'required|string|max:160',
            "type"=>'required',
            "email_verified_at"=>''
        ];
     }
    public function index()
    {
        $user=User::get();
        $page='index';
        return view('user.index',compact('user','page'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $page='Create';
        $user=new User();
        return view('user.form',compact('page','user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate_array= $this->base->validation($request,$action='store',$id='');
        $validate=$request->validate($validate_array);
         $this->base->create_data($image='',$validate);
         return redirect()->route('admin.user.index')
         ->with('msg','تم إضافة المطعم بنجاح')->with('type','success')
        ;

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $page='Edit';
        $user=User::find($id);
        return view('user.form',compact('page','user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate_array= $this->base->validation($request,$action='update',$id);
        $validate=$request->validate($validate_array);
        if(in_array('email_verified_at',$validate)){
            $validate['email_verified_at']=date('Y-m-d H:i:s');
        }else{
            $validate['email_verified_at']=null;
        }
        $this->base->update_data($image='',$validate,$id);
         return redirect()->route('admin.user.index')
         ->with('msg','تم تحديث بيانات المطعم بنجاح')->with('type','success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::findorfail($id)->delete();
        return redirect()->route('admin.user.index')
         ->with('msg','تم نقل المطعم إلى سلة المحذوفات')->with('type','danger')
        ;
    }

       public function trash()
    {
        $user=User::onlyTrashed()->get();
        $page='trash';
        return view('user.index',compact('user','page'));

    }

    public function restore(string $id)
    {
        User::withTrashed()->findorfail($id)->restore();
        return redirect()->route('admin.user.trash')->with('msg','تمت إستعادة المطعم من سلة المحذوفات بنجاح')->with('type','info');
    }


   public function forceDelete(string $id)
    {
        User::withTrashed()->findorfail($id)->forceDelete();
        return redirect()->route('admin.user.trash')->with('msg','تم حذف المطعم بشكل نهائي')->with('type','danger');
    }

}
