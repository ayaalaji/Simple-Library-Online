<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
           'تصفح الكتب ضمن الواجهة الرئيسية', //role-list
           'تصفح الكتب ضمن الواجهة الفرعية', //role-create
           'فلترة الكتب حسب التصنيف الأساسي',//role-edit
           'فلترة الكتب حسب التصنيف الفرعي',//role-edit
           'انشاء أنواع التصنيفات الرئيسية',//product-list
           'انشاء أنواع التصنيفات الفرعية',//product-create
           'إضافة كتب مع تحدد تصنيفها',//product-edit
           'إضافة ال كتاب الى المفضلة',//product-delete
           'وضع تقييم للكتاب',
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',
           'book-list',
           'book-create',
           'book-edit',
           'book-delete',
           'main-category-list',
           'main-category-create',
           'main-category-edit',
           'main-category-delete',
           'sub-category-list',
           'sub-category-create',
           'sub-category-edit',
           'sub-category-delete',
        ];
     
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}
