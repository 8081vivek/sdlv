<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http; 

use App\Exports\StudentExport;
use App\Exports\TeacherExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Models\admin_panel;
use App\Models\teacher_panel;
use App\Models\student_panel;
use App\Models\attendance;
use App\Models\faculty_categorie;

class sdlvController extends Controller
{

  public function admin_dashboard(Request $request)
{
    $data = admin_panel::count();
    $data1 = teacher_panel::count();
    $data2 = student_panel::count();
    $data3 = student_panel::paginate(10);

    $today = date('d/m/Y'); 

    $records = attendance::where('attendance_date', $today)->get();

    $classData = []; 
    foreach ($records as $record) {
        $class = $record->class; 
        if(!isset($classData[$class])) {
            $classData[$class] = ['present'=>0, 'absent'=>0];
        }

        $attendances = explode(',', $record->student_attendence); // "55:Present,65:Absent"

        foreach ($attendances as $att) {
            list($roll, $status) = explode(':', $att);

            if(trim($status) == 'Present') {
                $classData[$class]['present']++;
            } elseif(trim($status) == 'Absent') {
                $classData[$class]['absent']++;
            }
        }
    }

    // total percentage
    $total_present = array_sum(array_column($classData, 'present'));
    $pattendance = number_format(($total_present/$data2)*100, 2);

    // JSON encode class-wise data for frontend
    $classChartData = json_encode($classData);

    return view('Admin_dashboard',compact('data','data1','data2','data3','pattendance','classChartData'));
}



    function admin_logout(Request $request)
    {
        session()->forget('admin');
        return redirect('Admin');
    }



 public function admin_login(Request $request)
{ 
   $email=$request->email;
    $request->validate([
        'email' => 'required',
        'password' => 'required|min:4'
    ]);

    
    $admin = admin_Panel::where('email', $request->email)
                ->orWhere('name', $request->email)
                ->first();


        if($admin){ 
    if ($request->password!= $admin->password) {
        return back()->withErrors([
            'password' => 'Invalid user password'     ]); }  
            else{
        $minutes = 60;
        session()->put('admin', $email);
        session()->put('login_time', now());
        session()->put('expiry_time', now()->addMinutes($minutes));
        return redirect('Admin_dashboard');
            }
}

else{
    return back()->withErrors([
        'email' => 'Invalid Admin email or Mobile Number'     ]);
}
       
}


public function Teacher_register(Request $r)
{
  
    $r->validate([
        'firstName' => 'required|string|max:255',
        'lastName' => 'required|string|max:255',
        'dob' => 'required|date',
        'gender' => 'required|string',
        
        'email' => 'required|email|unique:teacher_panels,email',
        'phone' => 'required|numeric|digits:10|unique:teacher_panels,phone',
        'gid' => 'required|string|unique:teacher_panels,gid',

        'password' => 'required|string|min:3',

        'address' => 'required|string|max:500',
        'pincode' => 'required|numeric|digits:6',

        'subjects' => 'required|array',
        'classes' => 'required|array',

      
    ]);

    // Full Name
    $fullName = $r->firstName . ' ' . $r->lastName;
$type=$r->type;
    // Arrays convert
    $subjects = implode(',', $r->subjects);
    $classes = implode(',', $r->classes);
    $ssubject = $r->ssubject;


    $resume = $r->file('resume');
    $resumeName = time() . '_resume_' . $resume->getClientOriginalName();
    $resume->move(public_path('image/'), $resumeName);

    // ID Proof
    $idproof = $r->file('idproof');
    $idproofName = time() . '_id_' . $idproof->getClientOriginalName();
    $idproof->move(public_path('image/'), $idproofName);

    // Photo
    $photo = $r->file('photo');
    $photoName = time() . '_photo_' . $photo->getClientOriginalName();
    $photo->move(public_path('image/'), $photoName);

    // Certificates
    $certificatearr = [];
    if ($r->hasFile('certificates')) {
        foreach ($r->file('certificates') as $certificate) {
            $certificateName = time() . '_' . $certificate->getClientOriginalName();
            $certificate->move(public_path('image/'), $certificateName);
            $certificatearr[] = $certificateName;
        }
    }


    $data = new teacher_panel();
    $data->name = $fullName;
    $data->dob = $r->dob;
    $data->gender = $r->gender;
    $data->email = $r->email;
    $data->password = $r->password;
    $data->phone = $r->phone;
    $data->nationality = $r->nationality;
    $data->gid = $r->gid;
    $data->address = $r->address;
    $data->city = $r->city;
    $data->state = $r->state;
    $data->pincode = $r->pincode;
    $data->hqualification = $r->hqualification;
    $data->ssubjects = $ssubject;
    $data->bed = $r->bed;
    $data->experience = $r->experience;
    $data->subjects = $subjects;
    $data->classes = $classes;
    $data->type=$type;

    $data->resume = $resumeName;
    $data->idproof = $idproofName;
    $data->photo = $photoName;
    $data->certificates = implode(',', $certificatearr);

    $data->save();

    return redirect()->back()
        ->with('success', 'Teacher registered successfully!');
}

function add_teacher(){
$data=faculty_categorie::all();
return view('select_faculty_type',compact('data'));
}
function type_code(Request $r){
    $type=$r->type;

    return view('Teacher_registration',compact('type'));

}

function teacher_login(Request $request)
{ $check=$request->remember;
    $email=$request->email;
    

    $request->validate([
        'email' => 'required',
        'password' => 'required|min:3'
    ]);

    
    $teacher = teacher_panel::where('email', $request->email)
                ->orWhere('phone', $request->email)
                ->first();
     if($teacher){
    if ($request->password!= $teacher->password) {
        return back()->withErrors([
            'password' => 'Invalid user password'     ]);  
            
            }
    else{
        $minutes = 60;
        session()->put('teacher', $email);
        session()->put('login_time', now());
        session()->put('expiry_time', now()->addMinutes($minutes));
        return view('Teacher_dashboard',compact('teacher'));
        
        }
    }
        else{
            return back()->withErrors([
                'email' => 'Invalid user email'     ]);  
        }

}
function student_register(Request $r)
{
    $r->validate([
        'firstName' => 'required|string|max:255',
        'lastName' => 'required|string|max:255',
        'dob' => 'required|date',
        'gender' => 'required|string',
        
        // Email unique check
        'email' => 'required|email',

        // Phone unique check
        'phone' => 'required|numeric|digits:10',

        'password' => 'required|string|min:3',
        'confirm_password' => 'required|string|same:password',

        'address' => 'required|string|max:500',
        'pincode' => 'required|numeric|digits:6',


      
    ]);

    // Full Name
    $fullName = $r->firstName . ' ' . $r->lastName;

  


    $resume = $r->file('resume');
    $resumeName =  $resume->getClientOriginalName();
    $resume->move(public_path('image/'), $resumeName);

    // ID Proof
    $idproof = $r->file('idproof');
    // echo $idproof;
    // die();
    $idproofName = $idproof->getClientOriginalName();
    $idproof->move(public_path('student/'), $idproofName);

    // Photo
    $photo = $r->file('photo');
    $photoName =  $photo->getClientOriginalName();
    $photo->move(public_path('student/'), $photoName);

    // Certificates
    $certificate=$r->file('certificate');
    $certificateName=$certificate->getClientOriginalName();
    $certificate->move(public_path('student/'),$certificateName);
$stream = $r->stream ?? null;

    $data = new student_panel();
    $data->name = $fullName;
    $data->dob = $r->dob;
    $data->gender = $r->gender;
    $data->email = $r->email;
    $data->religion=$r->religion;
    $data->password = $r->password;
    $data->phone = $r->phone;
    $data->pschool=$r->pschool;
    $data->nationality = $r->nationality;
    $data->address = $r->address;
    $data->city = $r->city;
    $data->state = $r->state;
    $data->pincode = $r->pincode;  
    $data->class = $r->class;
    $data->lclass=$r->lastclass;
    $data->stream=$stream;
    $data->status="pending";
    $data->rdate=now();

    $data->fname=$r->father_name;
    $data->foccupation=$r->father_occupation;
    $data->mname=$r->mother_name;
    $data->moccupation=$r->mother_occupation;

    $data->tc= $resumeName;
    $data->idproof = $idproofName;
    $data->photo = $photoName;
    $data->fpic = $certificateName;
$data->roll_number="";
$data->user_Id="2";
    $data->save();

    return redirect()->back()
        ->with('success', 'Student  registered successfully!');


}


// ******************************Student Login*******************************
function student_login(Request $request)
{ $check=$request->remember;
    $email=$request->email;
    

    $request->validate([
        'email' => 'required',
        'password' => 'required|min:3'
    ]);

    
    $student = student_panel::where('email', $request->email)
                ->orWhere('phone', $request->email)
                ->first();
     if($student){
    if ($request->password!= $student->password) {
        return back()->withErrors([
            'password' => 'Invalid user password'     ]);  
            
            }
    else{
        $minutes = 60;
        session()->put('student', $email);
        session()->put('login_time', now());
        session()->put('expiry_time', now()->addMinutes($minutes));
        return redirect('Student_dashboard');
        
        }
    }
        else{
            return back()->withErrors([
                'email' => 'Invalid user email'     ]);  
        }   }
        



        // ****************************Teacher********************************
function student_show(Request $r ){
    if(session()->has('teacher')){
$class=$r->class;
$sesid=$r->session()->get('teacher');
$data=student_panel::where('class',$class)->get();
$data1=teacher_panel::where('email',$sesid)->orWhere('phone',$sesid)->first();
return view('Make_attendance',compact('data','class','data1'));
    }
    else{
        return redirect('Teacher');
    }




}
function save_attendance(Request $r){
     $attendance = $r->attendance;
     $class=$r->class;
     $teacher_id=$r->teacher_id;

$outputArr = [];

foreach($attendance as $student_id => $status){
    $outputArr[] = "$student_id:$status";
}

$outputString = implode(", ", $outputArr);
$date = now()->format('d/m/Y');
$time = now()->format('h:i A');

$data=new attendance();
$data->class=$class;
$data->teacher_id=$teacher_id;
$data->student_attendence=$outputString;
$data->attendance_date=$date;
$data->attendance_time=$time;
$data->save();
    return back()->with('success', 'Attendance saved successfully!');
}



// ****************************

function add_category_faculty(Request $r){
$type=$r->type;
$data =new faculty_categorie();
$data->type=$type;
$i=faculty_categorie::where('type',$type)->first();

$data->save();
return view('Teacher_registration', compact('i'));

}



// **************************
public function admin_student(Request $request)
{
$request->input('search');
    // Search input
    $search = $request->input('search');

    // Query with optional search
    $query = student_panel::query();

    if ($search) {
        $query->where(function($q) use ($search) {
            $q->where('name', 'like', "%{$search}%")
              ->orWhere('roll_number', 'like', "%{$search}%");
        });
    }

    $data = $query->paginate(10)->withQueryString(); // withQueryString() ensures search term stays in pagination links

    $data1 = $query->count();

    return view('Admin_student', compact('data', 'data1'));
}

public function attendance_form()
{
    $teacher_email=session()->get('teacher');
$data_teacher=teacher_panel::where('email',$teacher_email)
                ->orWhere('phone',$teacher_email)
                ->first();
    return view('Attendance_form', compact('data_teacher'));
}



public function teacher_student(Request $request)
{
    
    $search = $request->input('search');
    $teacher_email = session()->get('teacher');
    $data_teacher = teacher_panel::where('email', $teacher_email)
                    ->orWhere('phone', $teacher_email)
                    ->first();
    $query = student_panel::query();

    if ($search) {
        $query->where(function($q) use ($search) {
            $q->where('name', 'like', "%{$search}%")
              ->orWhere('roll_number', 'like', "%{$search}%");
        });
    }

    $data = $query->paginate(10)->withQueryString(); 
        $data1 = $query->count();

    return view('teacher_student', compact('data', 'data1', 'data_teacher'));
}
public function student_fee(Request $request)
{
    
    $search = $request->input('search');
    $query = student_panel::query();

    if ($search) {
        $query->where(function($q) use ($search) {
            $q->where('name', 'like', "%{$search}%")
              ->orWhere('roll_number', 'like', "%{$search}%");
        });
    }

    $data = $query->paginate(10)->withQueryString(); 
        $data1 = $query->count();

    return view('Fee_pay', compact('data', 'data1'));
}


public function pay_form(Request $r)
{
    $id=$r->id;
    $data=student_panel::where('id',$id)->first();

    return view('pay_page',compact('data'));
   
}

// function  fee_payment(Request $r){
    

// }




public function exportStudents()
{
    return \Excel::download(new StudentExport, 'students.xlsx');
}

public function exportTeachers()
{
    return \Excel::download(new TeacherExport, 'teachers.xlsx');
}
public function createOrder(Request $request) {
        // backend request (No CORS error)
        $response = Http::withoutVerifying()->get("https://phpcrud.himanshukashyap.com/rzp/createOrder.php", [
            'amount' => $request->amount
        ]);

        if ($response->successful()) {
            return $response->json(); 
        }
        return response()->json(['error' => 'API Not Responding'], 500);
    }
}






