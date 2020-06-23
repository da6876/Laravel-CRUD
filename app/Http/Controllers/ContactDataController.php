<?php

namespace App\Http\Controllers;

use App\ContactData;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\DataTables;

class ContactDataController extends Controller
{

    public function index(Request $request)
    {

        if ($request->ajax()){
            $data=ContactData::latest()->get();
            return DataTables::of($data)
                ->addColumn('action',function ($data){
                    $button='<button type="button" name="edit" id="'.$data->ID.'" class="btn btn-primary btn-sm">Edit</button> 
                                <button type="button" name="delete" id="'.$data->ID.'" class="btn btn-danger btn-sm">Delete</button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('contactList');
    }

    public function getAllContact(Request $request){
        if ($request->ajax()){
            $data=ContactData::latest()->get();
            return DataTables::of($data)
                ->addColumn('action',function ($data){
                    $button='<button type="button" name="edit" id="'.$data->ID.'" class="btn btn-primary btn-sm">Edit</button> 
                                <button type="button" name="delete" id="'.$data->ID.'" class="btn btn-danger btn-sm">Delete</button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('contactList');
    }
}
