<?php

namespace App\Http\Controllers;

use App\users;
use Illuminate\Http\Request;
use DB;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
    $chkbox = $req->input('chk');
	$txtbox = $req->input('txt');
	$doc_type = $req->input("doc_type");
	$file_names = $req->file('import_file');
	$return_result=array();
	
	try {
		DB::connection()->getPdo();
	}catch (Exception $e) {
		die("Could not connect to the database.  Please check your configuration. error:\n" . $e );
	}
	foreach($doc_type as $a => $b)
		{
		//echo count($file_names->attachments);
			if (isset($file_names[$a])) {
				$file_name=date('YmdHis').$file_names[$a]->getClientOriginalName();
				$file_names[$a]->move('uploads',$file_name);
			} else
			{
				$file_name='';
			}
			try
			{
				$DB_data=array('name'=>$txtbox[$a],"data_type"=>$doc_type[$a],"file_path"=>$file_name,"created_at"=>date('Y-m-d H:i:s'));
				DB::table('users')->insert($DB_data);
				array_push($return_result,"با موفقیت انتقال یافت : " . $file_name);
			}catch (Exception $e){
				array_push($return_result,"مشکلی ره داد : " . $file_name);
			}
		}
		//$compactData=array('students', 'instructors', 'instituitions');
		return View('show_output', ['return_result' => $return_result]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\users  $users
     * @return \Illuminate\Http\Response
     */
    public function show(users $users,request $req)
    {
    	$txtbox = $req->input('txt');
		$doc_type = $req->input("doc_type");
		$file_names = $req->input('file_name');
		//$query=$users::all();
        $query=$users::select();
        //
        if (!is_null($txtbox))
        {
        	$query ->where('name', '=', $txtbox);
        	//echo $txtbox;
        }
        //
        if (!is_null($doc_type))
        {
        	$query ->where('data_type', '=', $doc_type);
        	//echo $doc_type;
        }
        //
        if (!is_null($file_names))
        {
        	$query ->where('file_path', '=', $file_names);
        	//echo $file_names;
        }
        $stationes = $query->get();

        //foreach ($stationes as $key => $value) {
        //	echo $value->name  . "--" . $value->data_type  . "--" . $value->file_path  . "--\n" ;
        	# code...
        //}
        return View('show_output2', ['return_result' => $stationes]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\users  $users
     * @return \Illuminate\Http\Response
     */
    public function edit(users $users)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\users  $users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, users $users)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\users  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy(users $users)
    {
        //
    }
}
