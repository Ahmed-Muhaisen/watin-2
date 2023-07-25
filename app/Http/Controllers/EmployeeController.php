<?php

namespace App\Http\Controllers;

use App\Models\base;

use App\Models\User;
use App\Models\Employee;
use App\Models\restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public $base;
     function __construct()
     {
         $this->base=new base();
        $this->base->model=User::class;
        $this->base->array_input=[
            "user"=>"required|exists:users,id",
            "restaurant_id"=>"required|exists:restaurants,id",

        ];

     }
    public function index()
    {
         Gate::authorize('Employee.index');
        $employee=User::where('restaurant_id',Auth::user()->restaurant_id)->where('type','2')->get();
        $page='index';
        return view('employee.index',compact('employee','page'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
          Gate::authorize('Employee.create');
        $page='Create';
        $employees=User::where('type',1)->where('restaurant_id',null)->get();
        $restaurants=[Auth::user()->restaurant];
        $employee=new User();
        return view('employee.form',compact('page','employees','restaurants','employee'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          Gate::authorize('Employee.create');
        $validate_array= $this->base->validation($request,$action='store',$id='');
        $validate=$request->validate($validate_array);
        $user=User::find($request->user);
        $user->update([
            'type'=>2,
            'restaurant_id'=>$request->restaurant_id
        ]);
         return redirect()->route('admin.employee.index')
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
        Gate::authorize('Employee.Update');
        $page='Edit';

        $employee=User::find($id);
        $employees=[User::find($id)];
        $restaurants=[Auth::user()->restaurant];
        return view('employee.form',compact('page','employee','employees','restaurants'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Gate::authorize('Employee.Update');

        $validate_array= $this->base->validation($request,$action='update',$id);
        $validate=$request->validate($validate_array);
        $user=User::find($request->user);
        $user->update([
            'type'=>2,
            'restaurant_id'=>$request->restaurant_id
        ]);
         return redirect()->route('admin.employee.index')
         ->with('msg','تم تحديث بيانات المطعم بنجاح')->with('type','success')
        ;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Gate::authorize('Employee.delete');

        User::where('restaurant_id',Auth::user()->restaurant_id)->where('type','2')->findorfail($id)->update([
            "type"=>1

        ]);
        return redirect()->route('admin.employee.index')
         ->with('msg','تم نقل المطعم إلى سلة المحذوفات')->with('type','danger')
        ;
    }

       public function trash()
    {
        $employee=User::where('restaurant_id',Auth::user()->restaurant_id)->where('type','1')->where('restaurant_id','!=',null)->get();
        $page='trash';
        return view('employee.index',compact('employee','page'));

    }

    public function restore(string $id)
    {
         Gate::authorize('Employee.restore');
        User::where('restaurant_id',Auth::user()->restaurant_id)->where('type','1')->findorfail($id)->update([
            "type"=>2
        ]);
        return redirect()->route('admin.employee.trash')->with('msg','تمت إستعادة المطعم من سلة المحذوفات بنجاح')->with('type','info');
    }


   public function forceDelete(string $id)
    {
        Gate::authorize('Employee.forceDelete');
        User::findorfail($id)->update([
            "type"=>1,
            "restaurant_id"=>null
        ]);
        return redirect()->route('admin.employee.trash')->with('msg','تم حذف المطعم بشكل نهائي')->with('type','danger');
    }

}
