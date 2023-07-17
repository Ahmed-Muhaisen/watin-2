<?php

namespace Database\Seeders;



use App\Models\permission;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $data= [
            ['code'=>'User.index'  ,'name'=>'Show all Users'],
            ['code'=>'User.create'  ,'name'=>'Create New User'],
            ['code'=>'User.Update'  ,'name'=>'Update User'],
            ['code'=>'User.delete'  ,'name'=>'Delete User'],
            ['code'=>'User.restore'  ,'name'=>'Restore User'],
            ['code'=>'User.forceDelete'  ,'name'=>'ForceDelete User'],


            ['code'=>'Employee.index'  ,'name'=>'Show all Employees'],
            ['code'=>'Employee.create'  ,'name'=>'Create New Employee'],
            ['code'=>'Employee.Update'  ,'name'=>'Update Employee'],
            ['code'=>'Employee.delete'  ,'name'=>'Delete Employee'],
            ['code'=>'Employee.restore'  ,'name'=>'Restore Employee'],
            ['code'=>'Employee.forceDelete'  ,'name'=>'ForceDelete Employee'],


            ['code'=>'Restaurant.index'  ,'name'=>'Show all Restaurants'],
            ['code'=>'Restaurant.create'  ,'name'=>'Create New Restaurant'],
            ['code'=>'Restaurant.Update'  ,'name'=>'Update Restaurant'],
            ['code'=>'Restaurant.delete'  ,'name'=>'Delete Restaurant'],
            ['code'=>'Restaurant.restore'  ,'name'=>'Restore Restaurant'],
            ['code'=>'Restaurant.forceDelete'  ,'name'=>'ForceDelete Restaurant'],



            ['code'=>'Product.index'  ,'name'=>'Show all Products'],
            ['code'=>'Product.create'  ,'name'=>'Create New Product'],
            ['code'=>'Product.Update'  ,'name'=>'Update Product'],
            ['code'=>'Product.delete'  ,'name'=>'Delete Product'],
            ['code'=>'Product.restore'  ,'name'=>'Restore Product'],
            ['code'=>'Product.forceDelete'  ,'name'=>'ForceDelete Product'],


            ['code'=>'Order.index'  ,'name'=>'Show all Orders'],
            ['code'=>'Order.create'  ,'name'=>'Create New Order'],
            ['code'=>'Order.Update'  ,'name'=>'Update Order'],
            ['code'=>'Order.delete'  ,'name'=>'Delete Order'],
            ['code'=>'Order.restore'  ,'name'=>'Restore Order'],
            ['code'=>'Order.forceDelete'  ,'name'=>'ForceDelete Order'],


            ['code'=>'Category.index'  ,'name'=>'Show all Categories'],
            ['code'=>'Category.create'  ,'name'=>'Create New Category'],
            ['code'=>'Category.Update'  ,'name'=>'Update Category'],
            ['code'=>'Category.delete'  ,'name'=>'Delete Category'],
            ['code'=>'Category.restore'  ,'name'=>'Restore Category'],
            ['code'=>'Category.forceDelete'  ,'name'=>'ForceDelete Category'],



        ];
        Permission::insert($data);
    }
}
