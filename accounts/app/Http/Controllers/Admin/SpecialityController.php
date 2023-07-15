<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\SpecialityDataTable;
use App\Http\Controllers\Controller;
use App\Models\Speciality;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class SpecialityController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param SpecialityDataTable $dataTable
     * @return Renderable
     */
    public function index(SpecialityDataTable $dataTable)
    {
        $assets = ['data-table'];
        return $dataTable->render('admin.specialities.index', get_defined_vars());
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
            $item = Speciality::findOrFail($id);
        } else {
            $message = 'Successfully Created';
            $item = new Speciality();
        }
        if ($request->file) {
            $image = media($request->file, 'hospitals');
            $item->image = 'hospitals/'.$image;
        }
        $item->name_en = $request->name_en;
        $item->name_ar = $request->name_ar;
        $item->save();

        return redirect()->back()->with('message', $message);
    }

    public function delete($id)
    {
        Speciality::findOrFail($id)->delete();
        return redirect()->back()->with('message', 'Deleted Successfully');
    }
}
