<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Validator;
use App\Job;
use App\GaussReport;
use App\Quiz;
use App\User;
use Storage;

class ReportController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{    
		if(!in_array(30, $this->privsArray)){
			return redirect()->back();
		}
		return view('reports.show_reports');		
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		if(!in_array(29, $this->privsArray))
			return redirect()->back();
			
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{   
		$very_bad = str_replace(' ', '', explode('-',$request->very_bad));
		$bad = str_replace(' ', '', explode('-',$request->bad));
		$medium = str_replace(' ', '', explode('-',$request->medium));
		$good = str_replace(' ', '', explode('-',$request->good));
		$very_good = str_replace(' ', '', explode('-',$request->very_good));
		// $this->validate($request, [
		// 		'name' => 'required',
		// 		'very_bad' => 'required',
		// 		'bad' => 'required',
		// 		'medium' => 'required',
		// 		'good' => 'required',
		// 		'very_good' => 'required',
		// ]);
        if(count($very_bad) <= 1){
        	$this->validate($request, [
				'very_bad' => 'required|numeric',
			]);
            
        }else{
        	foreach($very_bad as $v_b){
	            if(!is_numeric($v_b)){
	          	  return redirect()->back()->withErrors(['very_bad' => \Lang::get("messages.report_error")]); 
	            }
            }
        }
        if(count($bad) <= 1){
           $this->validate($request, [
				'bad' => 'required|numeric',
		   ]);	
        }else{
        	foreach($bad as $b){
	          if(!is_numeric($b)){
	          	return redirect()->back()->withErrors(['bad' => \Lang::get("messages.report_error")]); 
	          }
            }           
        }
        if(count($medium) <= 1){
           	$this->validate($request, [
				'medium' => 'required|numeric',
		    ]);
        }else{
        	foreach($medium as $m){
	          if(!is_numeric($m)){
	          	return redirect()->back()->withErrors(['medium' => \Lang::get("messages.report_error")]); 
	          }
            }
        }
        if(count($good) <= 1){
           $this->validate($request, [
				'good' => 'required|numeric',
		    ]);	
        }else{
        	foreach($bad as $b){
	          if(!is_numeric($m)){
	          	return redirect()->back()->withErrors(['bad' => \Lang::get("messages.report_error")]); 
	          }
            }  
        }
        if(count($very_good) <= 1){
           $this->validate($request, [
				'very_good' => 'required|numeric',
		    ]);
        }else{
        	foreach($very_good as $v_g){
	          if(!is_numeric($v_g)){
	          	return redirect()->back()->withErrors(['very_good' => \Lang::get("messages.report_error")]); 
	          }
            }	
        }     
        
		
        
		$input = $request->all();
		if(count($very_bad) >= 2){
          $input['very_bad'] =(int)$very_bad[1];
        }else{
        	$input['very_bad'] = (int)$very_bad[0];
        }
        if(count($bad) >= 2){
          $input['bad'] = (int)$bad[1];
        }else{
        	$input['bad'] = (int)$bad[0];
        }
        if(count($medium) >= 2){
          $input['medium'] = (int)$medium[1];	
        }else{
        	$input['medium'] = (int)$medium[0];
        }
        if(count($good) >= 2){
           $input['good'] = (int)$good[1]; 	
        }else{
        	 $input['good'] = (int)$good[0]; 
        }
        if(count($very_good) >= 2){
           $input['very_good'] = (int)$very_good[1];	
        }else{
        	 $input['very_good'] = (int)$very_good[0]; 
        }     
        
        $input['quiz_id'] = (int)$input['quiz_id']; 
		$newReport = GaussReport::create($input);
         
	       
		return redirect('reports');
	}
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
    public function show_report($id)
	{
		
        $info = [];
        $countUsers = 0;
        $very_bad_users = [];
        $bad_users = [];
        $medium_users = [];
        $good_users = [];
        $very_good_users = [];

	    $reports = GaussReport::all();

  		
			
		$reports = GaussReport::where('quiz_id',$id)->first();
      
        $users = $reports->assigned;

      	foreach($users as $userStat){
					$info[] = $userStat->user_id;
		       		if($userStat->mark >= 0 && $userStat->mark <= $reports->very_bad && $userStat->final ==1){
		       	 		$very_bad_users[] = $userStat->user->name.' '.$userStat->user->surname;		
		       	 		      		       		
		       		}
		       	 	elseif($userStat->mark >= $reports->very_bad && $userStat->mark <= $reports->bad && $userStat->final ==1){
		       			$bad_users[] = $userStat->user->name.' '.$userStat->user->surname;	
		       		}
		       		elseif($userStat->mark >= $reports->bad && $userStat->mark <= $reports->medium && $userStat->final ==1){
		       			$medium_users[] = $userStat->user->name.' '.$userStat->user->surname;	
		       		}
		       		elseif($userStat->mark >= $reports->medium && $userStat->mark <= $reports->good && $userStat->final ==1){
		       	 		$good_users[] = $userStat->user->name.' '.$userStat->user->surname;	
		       		}
		       		elseif($userStat->mark > $reports->good && $userStat->mark <= $reports->very_good && $userStat->final ==1){
		       			$very_good_users[] = $userStat->user->name.' '.$userStat->user->surname;	
		       		}  
		} 

		
        $countUsers = count($info);
        $countUs = count(array_unique($info));
        
		return view('reports.show_report', compact('countUs','countUsers', 'very_bad_users','bad_users','medium_users','good_users','very_good_users'));
	}
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{    
		$create = FALSE;
		$edit = FALSE;
		if(in_array(31, $this->privsArray))
			$edit = TRUE;
		if(in_array(29, $this->privsArray))
		    $create = TRUE;
				
        $report = GaussReport::where('quiz_id',$id)->first();
        $id_rap = [];
        $continue = TRUE;
        if(empty($report)){
        	$continue = FALSE;
        	$report = Quiz::find($id);
        }
        
        if($continue)
        {
         $id_rap = $report->id;
         
        }
        
  		return view('reports.edit_report', compact('report','id_rap','continue','create','edit'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id_rap, Request $request)
	{

		$this->validate($request, [
				'name' => 'required',
				'very_bad' => 'required',
				'bad' => 'required',
				'medium' => 'required',
				'good' => 'required',
				'very_good' => 'required',
		       // 'job_officer' => 'required'
		]);
		$input = $request->all();
		$raport = GaussReport::find($id_rap);
		$raport->name = $input['name'];
        $very_bad = str_replace(' ', '', explode('-',$input['very_bad']));        
        $bad = str_replace(' ', '', explode('-',$input['bad']));
        $medium = str_replace(' ', '', explode('-',$input['medium']));
        $good = str_replace(' ', '', explode('-',$input['good']));
        $very_good = str_replace(' ', '', explode('-',$input['very_good']));
        if(count($very_bad) == 1){
        $raport->very_bad =(int)$very_bad[0];	
        }else{
        	$raport->very_bad =(int)$very_bad[1];
        }
		if(count($bad) == 1 ){
			$raport->bad = (int)$bad[0];
		}else{
			$raport->bad = (int)$bad[1];
		}
		if(count($medium) == 1){
		    $raport->medium = (int)$medium[0];	
		}else{
			$raport->medium = (int)$medium[1];
		}
		if(count($good) == 1){
		    $raport->good = (int)$good[0];	
		}else{
			$raport->good = (int)$good[1];
		}
		if(count($very_good) == 1){
		    $raport->very_good = (int)$very_good[0];	
		}else{
			$raport->very_good = (int)$very_good[1];
		}
		
		$raport->save();
     
        foreach($very_bad as $v_b){
          if(!is_numeric($v_b)){
          	return redirect()->back()->withErrors(['very_bad' => \Lang::get("messages.report_error")]); 
          }
        }
        foreach($bad as $b){
          if(!is_numeric($b)){
          	return redirect()->back()->withErrors(['bad' => \Lang::get("messages.report_error")]); 
          }
        }
        foreach($medium as $m){
          if(!is_numeric($m)){
          	return redirect()->back()->withErrors(['medium' => \Lang::get("messages.report_error")]); 
          }
        }
        foreach($good as $g){
          if(!is_numeric($g)){
          	return redirect()->back()->withErrors(['good' => \Lang::get("messages.report_error")]); 
          }
        }
        foreach($very_good as $v_g){
          if(!is_numeric($v_g)){
          	return redirect()->back()->withErrors(['very_good' => \Lang::get("messages.report_error")]); 
          }
        }
         		

		return redirect('reports');

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		if(!in_array(32, $this->privsArray))
			return redirect()->back();
		
		return redirect('reports');
	}

}
