<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\students;
use App\Models\teachers;
use Illuminate\Http\Request;
use File;
use DB;
use Session;
class logincontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminhome()
    {
        
        $teacherrequests =  DB::select("SELECT * from teachers where approveflag=0");
        $studentrequests =  DB::select("SELECT * from students where approveflag=0");
        return view('adminhome')->with(compact('teacherrequests','studentrequests'));
        
        
    }
    public function studenthome()
    {
        
            return view('studenthome');
      
       
    }
    public function teacherhome()
    {
        
            return view('teacherhome');
        
        
        
       
    }
    public function logincheck(Request $request)
    {
        $roleflag = $request->roleflag;
        $username = $request->username;
        $password = $request->password;
        $foundflag=0;
        if($roleflag==1)
        {
           
            $admin = admin::all();
            foreach($admin as $key => $admin2){
                
                if($username==$admin2->name && $password==$admin2->password )
            {
                $foundflag=1;
                break;
            }
           
              
            }
            if($foundflag==1){
               
               //Session::set('id', '1');
               // session(['id' => '1']);
                Session::put('id', '1');
                Session::save();
                $returnData = array('status' => 'success');
             return json_encode($returnData);
            }
            else {
                $returnData = array('status' => 'error');
                return json_encode($returnData);
            }
            
        }
        else if($roleflag==3)
        {
            $student = students::all();
            foreach($student as $key => $student2){
                
                if($username==$student2->name && $password==$student2->password &&$student2->approveflag==1 )
            {
                $foundflag=1;
                break;
            }
           
              
            }
            if($foundflag==1){
               // session(['id' => '3']);
                Session::put('id', '3');
                Session::save();
                $returnData = array('status' => 'success');
             return json_encode($returnData);
            }
            else {
                $returnData = array('status' => 'error');
                return json_encode($returnData);
            }
        }
        else if($roleflag==2)
        {
           // DB::enableQueryLog();
            $teacher =  DB::select("SELECT * from teachers");
            //dd(DB::getQueryLog());
            foreach($teacher as $key => $teacher2){
                
                if($username==$teacher2->name && $password==$teacher2->password &&$teacher2->approveflag==1 )
            {
                $foundflag=1;
                break;
            }
           
              
            }
            //dd($foundflag);
            if($foundflag==1){
                Session::put('id', '2');
                Session::save();
                //session(['id' => '2']);
                $returnData = array('status' => 'success');
             return json_encode($returnData);
            }
            else {
                $returnData = array('status' => 'error');
                return json_encode($returnData);
            }
        }

       
      
        else{
            
            $returnData = array('status' => 'error');
                return json_encode($returnData);
        }
      
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function teachersignup()
    {
        return view('teachersignup');
    }
    public function studentsignup()
    {
        return view('studentsignup');
    }

    public function studentstore(Request $request)
    {
      // dd();
        $filename=$request->file('dp')->getClientOriginalName();
        $name=$request->name;
        $password=$request->password;
        $email=$request->email;
        $address=$request->address;
        $currentschool=$request->currentschool;
        $previousschool=$request->previousschool;
        $parentsdetails=$request->parentsdetails;
        $assignedteacher=$request->assignedteacher;
        $roleflag = $request->roleflag;
        

       $result= DB::insert("insert into students (name, password, email, address, profilepicture, currentschool, previousschool, parentsdetails, assignedteacher, roleflag) values ('$name', '$password', '$email', '$address', '$filename', '$currentschool', '$previousschool', '$parentsdetails', '$assignedteacher', '$roleflag')");
     /* if($result)
      {
        //$returnData = array('status' => 'success');
       // return json_encode($returnData);
       return view('adminhome');
      }
      else 
      {
        $returnData = array('status' => 'error');
        return json_encode($returnData);
      }
       */ 
      return response( $result);
    }

    public function teacherstore(Request $request)
    {
        
      // dd();
      $filename=$request->file('dp')->getClientOriginalName();
      $name=$request->name;
      $password=$request->password;
      $email=$request->email;
      $address=$request->address;
      $currentschool=$request->currentschool;
      $previousschool=$request->previousschool;
      $experienceinyears=$request->experienceinyears;
      $expertiseinsubjects=$request->expertiseinsubjects;
      $roleflag = $request->roleflag;
      

     $result= DB::insert("insert into teachers (name, password, email, address, profilepicture, currentschool, previousschool, experienceinyears, expertiseinsubjects, roleflag) values ('$name', '$password', '$email', '$address', '$filename', '$currentschool', '$previousschool', '$experienceinyears', '$expertiseinsubjects', '$roleflag')");
   /* if($result)
    {
      //$returnData = array('status' => 'success');
     // return json_encode($returnData);
     return view('adminhome');
    }
    else 
    {
      $returnData = array('status' => 'error');
      return json_encode($returnData);
    }
     */ 
    return response( $result);
        
    }

   

  

   
    public function studedit(admin $admin,$id)
    {
        $studentdata = DB::table('students')->where('id', $id)->first();
        return view('studentupdate')
    	->with(compact('studentdata'));
    }

    public function studeditentry(Request $request,$id)
    {
        $filename=$request->file('dp')->getClientOriginalName();
        $name=$request->name;
        $password=$request->password;
        $email=$request->email;
        $address=$request->address;
        $currentschool=$request->currentschool;
        $previousschool=$request->previousschool;
        $parentsdetails=$request->parentsdetails;
        $assignedteacher=$request->assignedteacher;
        $roleflag = $request->roleflag;
        $approveflag = (int)$request->approveflag;
        
        //DB::enableQueryLog(); // Enable query log
       $result=DB::update("update students set name='$name',password='$password',email='$email',address='$address',profilepicture='$filename',currentschool='$currentschool',previousschool='$previousschool',parentsdetails='$parentsdetails',assignedteacher='$assignedteacher',approveflag=$approveflag where id=$id");
       //dd(DB::getQueryLog());
       return response($result);
    }


    public function teacheredit(admin $admin,$id)
    {
        $teacherdata = DB::table('teachers')->where('id', $id)->first();
        return view('teacherupdate')
    	->with(compact('teacherdata'));
    }

    public function teachereditentry(Request $request,$id)
    {
        $filename=$request->file('dp')->getClientOriginalName();
        $name=$request->name;
        $password=$request->password;
        $email=$request->email;
        $address=$request->address;
        $currentschool=$request->currentschool;
        $previousschool=$request->previousschool;
        $experienceinyears=$request->experienceinyears;
        $expertiseinsubjects=$request->expertiseinsubjects;
        $roleflag = $request->roleflag;
        $approveflag = (int)$request->approveflag;
        
        //DB::enableQueryLog(); // Enable query log
       $result=DB::update("update teachers set name='$name',password='$password',email='$email',address='$address',profilepicture='$filename',currentschool='$currentschool',previousschool='$previousschool',experienceinyears='$experienceinyears',expertiseinsubjects='$expertiseinsubjects',approveflag=$approveflag where id=$id");
       //dd(DB::getQueryLog());
       return response($result);
    }

    public function teacherdeleteentry(Request $request,$id)
    {
        
        
        
       $result=DB::delete("delete from teachers  where id='$id'");
       return response($result);
    }

    public function studdeleteentry(Request $request,$id)
    {
        
        
        
       $result=DB::delete("delete from students  where id='$id'");
       return response($result);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(admin $admin)
    {
        //
    }
}
