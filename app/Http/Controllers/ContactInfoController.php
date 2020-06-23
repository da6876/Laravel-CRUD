<?php

namespace App\Http\Controllers;

use App\ContactData;
use App\ContactInfo;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\DataTables;

class ContactInfoController extends Controller
{

    public function index()
    {
        Alert::info('Contact List',"Welcome Here");
        return view('allcontact');
    }

    public function store(Request $request){
        $data=[
            'name'=>$request['name'],
            'number'=>$request['phone'],
            'email'=>$request['email'],
            'religion'=>$request['religion'],
        ];
        ContactInfo::create($data);
        return $data;
    }

    public function show($id)
    {
        $contactInfo=ContactInfo::find($id);
        return $contactInfo;
    }

    public function edit($id)
    {
        $contactInfo=ContactInfo::find($id);
        return $contactInfo;
    }

    public function update(Request $request)
    {
        $contactInfo=ContactInfo::find($request['idss']);
        $contactInfo->name=$request['name'];
        $contactInfo->number=$request['phone'];
        $contactInfo->email=$request['email'];
        $contactInfo->religion=$request['religion'];
        $contactInfo->update();

        return $contactInfo;

        //return view('allcontact');
    }

    public function destroy( $id)
    {
        ContactInfo::destroy($id);

    }

    public function ALLContact()
    {
        //$select = DB::select('select * from student');
        $contactList = ContactInfo::all();
        /*return DataTables::of($contactList)
            ->addColumn('actions',function ($contactList){
                '<a onclick="showData('.$contactList->id.')" class="btn btn-success" >Show</a>'.' '.'
                <a onclick="editData('.$contactList->id.')" class="btn btn-info" >Show</a>'.' '.'
                <a onclick="deleteData('.$contactList->id.')" class="btn btn-danger" >Show</a>';
            })->make(true);*/

        return DataTables::of($contactList)
            ->addColumn('link', function ($contactList){
                $buttton='<a onclick="showDataFrom('.$contactList->id.')" id="'.$contactList->id.'" class="btn btn-success btn-sm" >Show</a> 
                <a onclick="editDataFrom('.$contactList->id.')" class="btn btn-info btn-sm" id="'.$contactList->id.'" >Edit</a> 
                <a onclick="deleteData('.$contactList->id.')" class="btn btn-danger btn-sm" id="'.$contactList->id.'" >Delete</a>';
            return $buttton;})
            ->rawColumns(['link'])
            ->toJson();

        /*print "<pre>";
        print_r($contactList);
        exit();*/
    }
}
