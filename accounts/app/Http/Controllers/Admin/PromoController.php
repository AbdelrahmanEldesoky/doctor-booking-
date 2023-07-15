<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\PromoDataTable;
use App\Http\Controllers\Controller;
use App\Models\Promocode;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class PromoController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param SpecialityDataTable $dataTable
     * @return Renderable
     */
    public function index(PromoDataTable $dataTable)
    {
        $assets = ['data-table'];
        return $dataTable->render('admin.promocodes.index', get_defined_vars());
    }

    /**
     * Display a listing of the resource.
     * @param Request $request
     * @param null $id
     */
    public function create(Request $request, $id = null)
    {
        
        if ($id) {
            $message = 'Successfully Updated';
            $item = Promocode::findOrFail($id);
        } else {
            $message = 'Successfully Created';
            $item = new Promocode();
        }
       
        $item->code = $request->code;
        $item->discount = $request->discount;
        $item->expiry = $request->expiry;
        $item->total_user = $request->total_user;
        $item->per_user = $request->per_user;
        $item->save();
        
        return redirect()->back()->with('message', $message);
    }

    public function delete($id)
    {
        Promocode::findOrFail($id)->delete();
        return redirect()->back()->with('message', 'Deleted Successfully');
    }
}
