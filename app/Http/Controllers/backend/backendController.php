<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Mail\ahmed;
use App\Mail\Weclome;
use App\Models\education;
use App\Models\Image;
use App\Models\Info;
use App\Models\Laguage;
use App\Models\Level;
use App\Models\Profile;
use App\Models\Language;
use App\Models\pig;
use App\Models\skill;
use App\Models\User;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;
use Barryvdh\DomPDF\Facade\Pdf;




use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class backendController extends Controller
{

    //
    public function UserCv()
    {
        return view('backend.basicinfo');
    }
    public function userLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
    public function saveInfo(Request $request)
    {
        Info::insert(
            [
                'user_id' => Auth::user()->id,
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'city' => $request->city,
            ]
        );
        $notification = array(
            'message' => 'basic info inserted successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('user.profile')->with($notification);
    }

    public function editInfo()
    {
        $info =  Info::where('user_id', Auth::user()->id)->first();
        return view('backend.editInfo', compact('info'));
    }
    public function updateInfo(Request $request)
    {
        $id = $request->id;
        Info::findOrFail($id)->update(
            [
                'user_id' => Auth::user()->id,
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'city' => $request->city,
            ]
        );
        $notification = array(
            'message' => 'basic info Update successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }
    public function Userprofile()
    {
        return view('backend.profile');
    }
    public function saveprofile(Request $request)
    {
        Profile::insert(
            [
                'user_id' => Auth::user()->id,
                'desc' => $request->desc,

            ]
        );

        $notification = array(
            'message' => ' profile inserted  successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('user.skill')->with($notification);
    }

    public function editprofile()
    {
        $profile =  Profile::where('user_id', Auth::user()->id)->first();
        return view('backend.editprofile', compact('profile'));
    }

    public function updateprofile(Request $request)
    {
        $id = $request->id;
        Profile::findOrFail($id)->update(
            [
                'user_id' => Auth::user()->id,
                'desc' => $request->desc,

            ]
        );

        $notification = array(
            'message' => ' profile Update successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
    public function Userskill()
    {
        return view('backend.skill');
    }
    public function saveskill(Request $request)
    {
        skill::insert(
            [
                'user_id' => Auth::user()->id,
                'skillName' => $request->skillName,

            ]
        );

        $notification = array(
            'message' => 'Skills inserted  successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('user.edu')->with($notification);
    }
    public function editskill()
    {
        $skill =  skill::where('user_id', Auth::user()->id)->first();
        $skillName = $skill->skillName;
        $skills = explode(',', $skillName);
        return view('backend.editskill', compact('skillName', 'skill'));
    }

    public function updateskill(Request $request)
    {
        $id = $request->id;
        skill::findOrFail($id)->update(
            [
                'user_id' => Auth::user()->id,
                'skillName' => $request->skillName,

            ]
        );

        $notification = array(
            'message' => 'Skills update  successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    public function Useredu()
    {

        $kind = Level::get();
        return view('backend.edu', compact('kind'));
    }
    public function saveedu(Request $request)
    {
        education::insert(
            [
                'user_id' => Auth::user()->id,
                'eduName' => $request->eduName,
                'StartDate' => $request->StartDate,
                'EndDate' => $request->EndDate,
                'level_id' => $request->level_id,
                'field' => $request->field,
                'desc' => $request->desc,

            ]
        );

        $notification = array(
            'message' => 'Education inserted  successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }
    public function editedu()
    {
        $edus =  education::where('user_id', Auth::user()->id)->get();
        return view('backend.editedu', compact('edus'));
    }
    public function editeducation($id)
    {
        $kind = Level::get();

        $edus =  education::where('id', $id)->first();
        return view('backend.editeducation', compact('edus', 'kind'));
    }
    public function updateedu(Request $request)
    {

        $id = $request->id;

        education::findOrFail($id)->update(
            [

                'eduName' => $request->eduName,
                'StartDate' => $request->StartDate,
                'EndDate' => $request->EndDate,
                'level_id' => $request->level_id,
                'field' => $request->field,
                'desc' => $request->desc,

            ]
        );

        $notification = array(
            'message' => 'Education update  successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('edit.edu')->with($notification);
    }

    public function deleteeducation($id)
    {
        education::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Education deleted   successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }
    public function Userlanuage()
    {

        return view('backend.lanuage');
    }


    public function saveelanguage(Request $request)
    {
        Laguage::insert(
            [
                'user_id' => Auth::user()->id,
                'name' => $request->name,

            ]
        );

        $notification = array(
            'message' => 'Languages  inserted  successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('user.image')->with($notification);
    }
    public function editlanguage()
    {
        $lang =  Laguage::where('user_id', Auth::user()->id)->first();
        return view('backend.editlanguage', compact('lang'));
    }
    public function updatelanguage(Request $request)
    {
        $id = $request->id;
        Laguage::findOrFail($id)->update(
            [
                'user_id' => Auth::user()->id,
                'name' => $request->name,

            ]
        );

        $notification = array(
            'message' => 'Languages updated  successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    public function Userimage()
    {


        return view('backend.Userimage');
    }

    public function saveelimage(Request $request)
    {
        if ($request->file('img')) {
            $manager = new ImageManager(new Driver());
            $img_name = hexdec(uniqid()) . '.' . $request->file('img')->getClientOriginalExtension();
            $img = $manager->read($request->file('img'));
            $img->resize(480, 480);
            $img->toJpeg(80)->save(base_path('public/upload/' . $img_name));
            $url = 'upload/' . $img_name;

            Image::insert(
                [
                    'user_id' => Auth::user()->id,
                    'img' => $url,

                ]
            );

            $notification = array(
                'message' => 'Image  Uploaded  successfully',
                'alert-type' => 'success',
            );

            return redirect()->back()->with($notification);
        }
    }
    public function editimage()
    {
        $image =  Image::where('user_id', Auth::user()->id)->first();
        return view('backend.editimage', compact('image'));
    }

    public function updateimage(Request $request)
    {
        $id = $request->id;
        $old_img = $request->Old_img;
        if ($request->file('img')) {
            $manager = new ImageManager(new Driver());
            $img_name = hexdec(uniqid()) . '.' . $request->file('img')->getClientOriginalExtension();
            $img = $manager->read($request->file('img'));
            $img->resize(480, 480);
            $img->toJpeg(80)->save(base_path('public/upload/' . $img_name));
            $url = 'upload/' . $img_name;
            if (file_exists($old_img)) {
                unlink($old_img);
            }

            Image::findOrFail($id)->update(
                [

                    'img' => $url,

                ]
            );

            $notification = array(
                'message' => 'Image  updated  successfully',
                'alert-type' => 'success',
            );

            return redirect()->back()->with($notification);
        }
    }
    public function resume()
    {
        return view('backend.cv');
    }

    public function downloadCv()
    {
        $pdf = Pdf::loadView('backend.getcv')
            ->setOptions([
                'tempdir' => public_path(),
                'chroot' => public_path(),
                'defaultFont' => 'sans-serif',

            ]);

        return $pdf->download('cv.pdf');
    }

    public function admin()
    {
        return view('admin.admin_page');
    }

    public function saveAdmin(Request $request)
    {
        $request->validate(
            [

                'name' => 'required|max:20',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:8|same:confirm',

            ],
            [
                'name.required' => 'name must not be emty',
            ]

        );

        User::insert(
            [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'admin',



            ]
        );

        $notification = array(
            'message' => 'Admin Inserted  successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }
}
