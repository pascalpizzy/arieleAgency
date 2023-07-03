<?php

namespace App\Http\Controllers\Job;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\Generics;
use App\Models\JobOpening;
use RealRashid\SweetAlert\Facades\Alert;



class JobopeningController extends Controller
{
    use Generics;

    function __construct(JobOpening $jobOpening){
        $this->jobOpening = $jobOpening;
    }

    function job_opening(){
        $allOpenedJobs = $this->jobOpening::orderBy('id', 'asc')->simplePaginate(6);
        return view('/pages.job-opening', ['allOpenings' => $allOpenedJobs]);
    }

    function create_job_opening(){
        return view('pages.create-job');
    }

    function store_job(Request $request){

        $this->validate($request, [
            'image' => 'image|max:5000',
            'deadline' => 'required',       
            'title' => 'required|string',
            'about_job' => 'required', 
            'salary' => 'required',      
        ]);        
        
        // return $request->image;

        $unique_id = $this->createNewUniqueId('job_openings', 'unique_id');


        if($request->hasFile('image')){
      
         //get filename with the extension
         $filenameWithExt = $request->file('image')->getClientOriginalName();

         //get just file name
         $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

         //get just extension
         $extension = $request->file('image')->getClientOriginalExtension();

         //file name to store
         $fileNameToStore = $filename.'_'.time().'.'.$extension;

         //upload image
         $path = $request->file('image')->storeAs('public/images', $fileNameToStore);

     }else{

         $fileNameToStore = $this->jobOpening->defaultImageName;
     }

        $newJob = new JobOpening;
        $newJob->unique_id = $unique_id;
        $newJob->deadline = $request->input('deadline');
        $newJob->title = $request->input('title');
        $newJob->about_job = $request->input('about_job');
        $newJob->salary = $request->input('salary');
        $newJob->image = $fileNameToStore;

        if($newJob->save()){

            Alert::success('Success!', 'Job posted successfully!');    

            return back()->with([
                'success' => "Job posted successfully!"
            ]);    
        }else{
            Alert::error('Not post!', 'Job could not be posted');    

            return back(); 
        };
    }

    function edit_job($unique_id){
        $findJob = $this->jobOpening::where([
            ['unique_id', '=', $unique_id]
        ])->first();

        if($findJob == null){

            Alert::error('Error!', 'Job not found!');    

            return back()->with([
                'error' => "Job posted successfully!"
            ]);    
        }else{            
            return view('/pages.edit-job', ['findJob' => $findJob]);
        };
            
    }

    function store_edited_job(Request $request){

        $newJob = $this->jobOpening::where([
            ['unique_id', '=', $request->unique_id]
        ])->first();

        
        $this->validate($request, [
            'image' => 'image|max:5000',
            'deadline' => 'required',       
            'title' => 'required|string',
            'about_job' => 'required', 
            'salary' => 'required',      
        ]);        
        
        
        

        // return $request->image;

        
        if($request->hasFile('image')){
            
         //get filename with the extension
         $filenameWithExt = $request->file('image')->getClientOriginalName();

         //get just file name
         $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

         //get just extension
         $extension = $request->file('image')->getClientOriginalExtension();

         //file name to store
         $fileNameToStore = $filename.'_'.time().'.'.$extension;

         //upload image
         $path = $request->file('image')->storeAs('public/images', $fileNameToStore);

     }else{

         $fileNameToStore = $this->jobOpening->defaultImageName;
        }
        
        $newJob->deadline = $request->input('deadline');
        $newJob->title = $request->input('title');
        $newJob->about_job = $request->input('about_job');
        $newJob->salary = $request->input('salary');
        $newJob->image = $fileNameToStore;
        // return $newJob;
        
        if($newJob->save()){

            Alert::success('Updated!', 'Job has been updated successfully!');    

            return back()->with([
                'success' => "Job updated successfully!"
            ]);    
        }else{
            Alert::error('Not post!', 'Job could not be edited');    

            return back(); 
        };
    }  


    function job_details($unique_id){
        $getJob = $this->jobOpening::where([
            ['unique_id', '=', $unique_id]
        ])->first();

        $getJobs = $this->jobOpening::orderBy('id', 'asc')->where('unique_id', '!=', $unique_id)->limit(3)->get();

        return view('/pages.job-details', ['getJob' => $getJob, 'getJobs' => $getJobs]);
    }
    

    function delete_job($unique_id){
        $deleteJob = $this->jobOpening::where([
            ['unique_id', '=', $unique_id]
            ])->first();
            
            if($deleteJob !== null){
                $deleteJob->delete();

                Alert::success('Deleted!', 'Job has been deleted successfully!');  
                
                return redirect('/Job-opening');
            }else{
                Alert::error('Not deleted!', 'Job could not be deleted!');    
                return back(); 
            };
            
    }
}
