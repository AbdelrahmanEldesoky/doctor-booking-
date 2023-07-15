<?php

namespace App\Traits\Admin;


use Illuminate\Support\Facades\Auth;

trait SearchModelTrait
{
    public static function SearchModel($model, $columns, $table_filter_search = '', $type = null)
    {
        $modelC = '\\App\\Models\\' . $model;
        $builder = $modelC::query();
        if ($model == 'User' && $type) {
            $builder = $builder->where('role', $type);
        }

        $builder = $builder->where(function ($q) use ($columns, $table_filter_search) {
            foreach ($columns as $value) {
                $q->orWhere($value, 'LIKE', "%" . $table_filter_search . "%");
            }
        });

        return $builder;
    }
}
