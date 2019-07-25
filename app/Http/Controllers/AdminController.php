<?php
namespace App\Http\Controllers;
use App\About;
use App\Admin;
use App\Booking;
use App\Brand;
use App\Cash;
use App\Category;
use App\Contact;
use App\Copyright;
use App\Counter;
use App\Customer;
use App\Dinning;
use App\Expense;
use App\Facility;
use App\Facilitysingle;
use App\Gallery;
use App\Image;
use App\Logo;
use App\Meeting;
use App\Payment;
use App\Product;
use App\Room;
use App\Slider;
use App\Slider2;
use App\Slider3;
use App\Social;
use App\Statement;
use App\Subcategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File;
use PHPUnit\Framework\Constraint\Count;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin',['except'=>['create','store']]);
    }
    public function create()
    {
        return view('admin.pages.admin.admin_signup');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' =>'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:6|confirmed',
        ]);
        if($request->password_confirmation===$request->password){
            if( Admin::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ])){
                return redirect('login')->with('msg','Successfully Registration Now Log In with your email and Password!');
            }
        }
        return redirect('admin-signup');
    }
    public function index()
    {
        $payments=Payment::all();
        $cash=Cash::where('status',1)->get();
        $sale=$payments->sum('amount')+$cash->sum('amount');
        $rooms=Room::all();
        $books=Booking::all();
        $expenses=Expense::all();
        $today=Carbon::today();
        $yesterday=Carbon::yesterday();
        $today=Carbon::parse($today)->format('m/d/Y');
        $yesterday=Carbon::parse($yesterday)->format('m/d/Y');
        $statements=Statement::whereBetween('date', [$yesterday,$today])->get();
        return view('admin.index',compact('payments','expenses','statements','sale','rooms','books'));
    }
    public function categories()
    {
        $categories=Category::all();
        return view('admin.pages.categories',compact('categories'));
    }
    public function category_store(Request $request)
    {
        $this->validate($request,[
            'name' =>'required|unique:categories',
        ]);
       if (

           Category::create($request->all())
       ){
           return redirect()->route('categories');
       }
    }

    public function category_update(Request $request ,$id)
    {
        $this->validate($request,[
            'name' =>'required|unique:categories',
        ]);
        $Category=Category::findOrFail($id);
        $Category->update($request->all());
        return redirect()->route('categories')->with('msg','Category Updated Successfully');
    }
    public function category_destroy(Request $request ,$id)
    {
        Category::destroy($id);
        return redirect()->route('categories')->with('msg','Category Deleted Successfully');
    }
    public function addlogo(){

        $x = DB::table('logos')->first();
        if (is_null($x)){return view('admin.pages.logo.logo');}
        else
        {
            $logo=Logo::all();
            return view('admin.pages.logo.index',compact('logo'));
        }
    }
    public function storelogo(Request $request)
    {
        $logo_image='';
        if($request->hasFile('logo_image'))
        {
            $destinationPath="image/logo";
            $file=$request->logo_image;
            $extention=$file->getClientOriginalExtension();
            $filename=time().'.'.$extention;
            $file->move($destinationPath, $filename);
            $logo_image=$filename;
        }
        $data=[
            'logo_image'=>$logo_image,
        ];
        Logo::create($data);
        return redirect()->route('logo-index')->with('msg','Logo Added');
    }
    public function alllogo(){
        $logo=Logo::all();
        return view('admin.pages.logo.index',compact('logo'));
    }

    public function deletelogo($id)
    {
        $oldimage = Logo::findOrFail($id);
        $image_path = 'image/logo/'.$oldimage->logo_image;

        if(File::exists($image_path))
        {
            File::delete($image_path);
        }
        $oldimage->delete();
        return redirect()->route('logo')->with('msg','Successfully Deleted');
    }

    public function addslider(){

        return view('admin.pages.slider.slider');
    }
    public function storeslider(Request $request)
    {
        $slider_image='';
        if($request->hasFile('slider_image'))
        {
            $destinationPath='image/slider';
            $file=$request->slider_image;
            $extention=$file->getClientOriginalExtension();
            $filename=time().'.'.$extention;
            $file->move($destinationPath, $filename);
            $slider_image = $filename;
        }
        $data=[
            'heading_1'=>$request->heading_1,
            'heading_2'=>$request->heading_2,
            'description'=>$request->description,
            'slider_image'=>$slider_image,
        ];
        Slider::create($data);
        return redirect()->route('slider-index')->with('msg','Successfully Added');
    }
    public function allslider(){
        $slider=Slider::all();
        return view('admin.pages.slider.index',compact('slider'));
    }
    public function editslider($id){
        $slider=Slider::findOrFail($id);
        return view('admin.pages.slider.editslider',compact('slider'));
    }

    public function updateslider(Request $request, $id)
    {

        $oldimage=Slider::select('slider_image')->find($id);
        if($request->hasFile('slider_image'))
        {
            $file=$request->slider_image;
            $extention=$file->getClientOriginalExtension();
            $filename=time().'.'.$extention;
            $file->move('image/slider',$filename);
            $photo=$filename;
            $filename=($photo);
            $oldimage = Slider::findOrFail($id);
            $image_path ='image/slider/'.$oldimage->slider_image;

            if(File::exists($image_path))
            {
                File::delete($image_path);

            }
            $data=[

                'heading_1'=>$request->heading_1,
                'heading_2'=>$request->heading_2,
                'description'=>$request->description,
                'slider_image'=>$photo,
            ];

            DB::table('sliders')
                ->where('id', $id)
                ->update($data);
            return redirect()->route('slider-index');
        }
        else{
            $data=[
                'heading_1'=>$request->heading_1,
                'heading_2'=>$request->heading_2,
                'description'=>$request->description,
                'slider_image'=>$oldimage->slider_image,
            ];

            DB::table('sliders')
                ->where('id', $id)
                ->update($data);
            return redirect()->route('slider-index')->with('msg','Successfully Updated');
        }
    }

    public function deleteslider($id)
    {
        $oldimage = Slider::findOrFail($id);
        $image_path ='image/slider/'.$oldimage->slider_image;

        if(File::exists($image_path))
        {
            File::delete($image_path);
        }
        $oldimage->delete();
        return redirect()->route('slider-index')->with('msg','Successfully Deleted');

    }
    public function addslider2(){

        return view('admin.pages.slider2.slider');
    }
    public function storeslider2(Request $request)
    {

        if($request->hasFile('slider_image'))
        {
            $destinationPath="image/slider2";
            $file=$request->slider_image;
            $extention=$file->getClientOriginalExtension();
            $filename=time().'.'.$extention;
            $file->move($destinationPath, $filename);
            $slider_image=$filename;
            $data=[
                'heading_1'=>$request->heading_1,
                'heading_2'=>$request->heading_2,
                'description'=>$request->description,
                'slider_image'=>$slider_image,
            ];
            return redirect()->route('slider2-index')->with('msg','Successfully Added');
        }
        else
            {
            $data=[
                'heading_1'=>$request->heading_1,
                'heading_2'=>$request->heading_2,
                'description'=>$request->description,
            ];
            Slider2::create($data);
            return redirect()->route('slider2-index')->with('msg','Successfully Added');
        }

    }
    public function allslider2(){

        $slider=Slider2::all();

        return view('admin.pages.slider2.index',compact('slider'));
    }
    public function editslider2($id){
        $slider=Slider2::findOrFail($id);
        return view('admin.pages.slider2.editslider',compact('slider'));
    }

    public function updateslider2(Request $request, $id)
    {
        $oldimage=Slider2::select('slider_image')->find($id);
        if($request->hasFile('slider_image'))
        {
            $file=$request->slider_image;
            $extention=$file->getClientOriginalExtension();
            $filename=time().'.'.$extention;
            $file->move('image/slider2',$filename);
            $photo=$filename;
            $filename=($photo);
            $oldimage = Slider2::findOrFail($id);
            $image_path ='image/slider2/'.$oldimage->slider_image;

            if(File::exists($image_path))
            {
                File::delete($image_path);

            }
            $data=[
                'heading_1'=>$request->heading_1,
                'heading_2'=>$request->heading_2,
                'description'=>$request->description,
                'slider_image'=>$photo,
            ];
            DB::table('slider2s')
                ->where('id', $id)
                ->update($data);
            return redirect()->route('slider2-index');
        }
        else{
            $data=[
                'heading_1'=>$request->heading_1,
                'heading_2'=>$request->heading_2,
                'description'=>$request->description,
                'slider_image'=>$oldimage->slider_image,
            ];
            DB::table('slider2s')
                ->where('id', $id)
                ->update($data);
            return redirect()->route('slider2-index')->with('msg','Successfully Updated');
        }
    }
    public function deleteslider2($id)
    {
        $oldimage = Slider2::findOrFail($id);
        $image_path ='image/slider2/'.$oldimage->slider_image;

        if(File::exists($image_path))
        {
            File::delete($image_path);
        }
        $oldimage->delete();
        return redirect()->route('slider2-index')->with('msg','Successfully Deleted');
    }
    public function addslider3(){

        return view('admin.pages.slider3.slider');
    }
    public function storeslider3(Request $request)
    {
        if($request->hasFile('slider_image'))
        {
            $destinationPath="image/slider3";
            $file=$request->slider_image;
            $extention=$file->getClientOriginalExtension();
            $filename=time().'.'.$extention;
            $file->move($destinationPath, $filename);
            $slider_image=$filename;
            $data=[
                'heading_1'=>$request->heading_1,
                'heading_2'=>$request->heading_2,
                'description'=>$request->description,
                'slider_image'=>$slider_image,
            ];
            return redirect()->route('slider3-index')->with('msg','Successfully Added');
        }
        else{
        $data=[
            'heading_1'=>$request->heading_1,
            'heading_2'=>$request->heading_2,
            'description'=>$request->description,
        ];
        Slider3::create($data);
        return redirect()->route('slider3-index')->with('msg','Successfully Added');
        }
    }
    public function allslider3(){

        $slider=Slider3::all();

        return view('admin.pages.slider3.index',compact('slider'));
    }
    public function editslider3($id){
        $slider=Slider3::findOrFail($id);
        return view('admin.pages.slider3.editslider',compact('slider'));
    }

    public function updateslider3(Request $request, $id)
    {

        $oldimage=Slider2::select('slider_image')->find($id);
        if($request->hasFile('slider_image'))
        {
            $file=$request->slider_image;
            $extention=$file->getClientOriginalExtension();
            $filename=time().'.'.$extention;
            $file->move('image/slider3',$filename);
            $photo=$filename;
            $filename=($photo);
            $oldimage = Slider3::findOrFail($id);
            $image_path ='image/slider3/'.$oldimage->slider_image;

            if(File::exists($image_path))
            {
                File::delete($image_path);

            }
            $data=[
                'heading_1'=>$request->heading_1,
                'heading_2'=>$request->heading_2,
                'description'=>$request->description,
                'slider_image'=>$photo,
            ];
            DB::table('slider3s')
                ->where('id', $id)
                ->update($data);
            return redirect()->route('slider3-index');
        }
        else{
            $data=[
                'heading_1'=>$request->heading_1,
                'heading_2'=>$request->heading_2,
                'description'=>$request->description,
                'slider_image'=>$oldimage->slider_image,
            ];
            DB::table('slider3s')
                ->where('id', $id)
                ->update($data);
            return redirect()->route('slider3-index')->with('msg','Successfully Updated');
        }
    }

    public function deleteslider3($id)
    {
        $oldimage = Slider3::findOrFail($id);
        $image_path ='image/slider3/'.$oldimage->slider_image;

        if(File::exists($image_path))
        {
            File::delete($image_path);
        }
        $oldimage->delete();
        return redirect()->route('slider3-index')->with('msg','Successfully Deleted');

    }
    public function addimg(){
        $rooms=Room::all();
        return view('admin.pages.image.slider',compact('rooms'));
    }
    public function storeimg(Request $request)
    {
        if($request->hasFile('image'))
        {
            $destinationPath='image/room';
            $file=$request->image;
            $extention=$file->getClientOriginalExtension();
            $filename=time().'.'.$extention;
            $file->move($destinationPath, $filename);
            $image = $filename;
        }
        $data=[
            'room_id'=>$request->room_id,
            'image'=>$image,
        ];
        Image::create($data);
        return redirect()->route('img-index')->with('msg','Successfully Added');
    }
    public function allimg(){
        $rooms=Room::all();
        $slider=Image::all();
        return view('admin.pages.image.index',compact('slider','rooms'));
    }
    public function editimg($id){
        $slider=Image::findOrFail($id);
        return view('admin.pages.image.editslider',compact('slider'));
    }

    public function updateimg(Request $request, $id)
    {
        $oldimage=Image::select('image')->find($id);
        if($request->hasFile('image'))
        {
            $file=$request->slider_image;
            $extention=$file->getClientOriginalExtension();
            $filename=time().'.'.$extention;
            $file->move('image/room',$filename);
            $photo=$filename;
            $oldimage = Image::findOrFail($id);
            $image_path ='image/room/'.$oldimage->slider_image;

            if(File::exists($image_path))
            {
                File::delete($image_path);
            }
            $data=[

                'room_id'=>$request->room_id,
                'image'=>$photo,
            ];

            DB::table('images')
                ->where('id', $id)
                ->update($data);
            return redirect()->route('img-index');
        }
        else{
            $data=[

                'room_id'=>$request->room_id,
                'image'=>$oldimage->image,
            ];
            DB::table('images')
                ->where('id', $id)
                ->update($data);
            return redirect()->route('img-index')->with('msg','Successfully Updated');
        }
    }

    public function deleteimg($id)
    {
        $oldimage = Image::findOrFail($id);
        $image_path ='image/room/'.$oldimage->slider_image;

        if(File::exists($image_path))
        {
            File::delete($image_path);
        }
        $oldimage->delete();
        return redirect()->route('img-index')->with('msg','Successfully Deleted');
    }
    public function addgallery(){

        return view('admin.pages.gallery.gallery');
    }
    public function storegallery(Request $request)
    {
        $gallery_image='';
        if($request->hasFile('gallery_image'))
        {
            $destinationPath="image/gallery";
            $file=$request->gallery_image;
            $extention=$file->getClientOriginalExtension();
            $filename=time().'.'.$extention;
            $file->move($destinationPath, $filename);
            $gallery_image=$filename;
        }
        $data=[
            'tittle'=>$request->tittle,
            'description'=>$request->description,
            'gallery_image'=>$gallery_image,
        ];
        Gallery::create($data);
        return redirect()->route('gallery-index');

    }
    public function allgallery(){
        $gallery=Gallery::all();
        return view('admin.pages.gallery.index',compact('gallery'));
    }
    public function editgallery($id){
        $gallery=Gallery::find($id);
        return view('admin.pages.gallery.editgallery',compact('gallery'));
    }



    public function updategallery(Request $request, $id)
    {
        $oldimage=Gallery::select('gallery_image')->find($id);
        if($request->hasFile('gallery_image'))
        {
            $file=$request->gallery_image;
            $extention=$file->getClientOriginalExtension();
            $filename=time().'.'.$extention;
            $file->move('image/gallery',$filename);
            $photo=$filename;
            $filename=($photo);
            $oldimage = Gallery::findOrFail($id);
            $image_path ='image/gallery/'.$oldimage->gallery_image;

            if(File::exists($image_path))
            {
                File::delete($image_path);

            }
            $data=[

                'tittle'=>$request->tittle,
                'gallery_image'=>$photo,
            ];

            DB::table('galleries')
                ->where('id', $id)
                ->update($data);
            return redirect()->route('gallery-index');
        }
        else{
            $data=[

                'tittle'=>$request->tittle,
                'description'=>$request->description,
                'gallery_image'=>$oldimage->gallery_image,
            ];

            DB::table('galleries')
                ->where('id', $id)
                ->update($data);
            return redirect()->route('gallery-index');
        }
    }

    public function deletegallery($id)
    {
        $oldimage = Gallery::find($id);
        $image_path ='image/gallery/'.$oldimage->gallery_image;

        if(File::exists($image_path))
        {
            File::delete($image_path);
        }
        $oldimage->delete();
        return redirect()->route('gallery-index')->with('msg','Successfully Deleted');
    }


    public function contactinfo()
    {
        $contact=Contact::all();
        return view('admin.pages.contact.index',compact('contact'));
    }
    public function contactinfo_create(Request $request)
    {
        $x = DB::table('contacts')->first();
        if (is_null($x)){return view('admin.pages.contact.contact');}
        else
        {
            return view('admin.pages.contact.contact',
                array('note' => $x->note,'mobile' => $x->mobile,'email_1' => $x->email_1,'email_2' => $x->email_2));
        }

    }

    public function contactinfo_store(Request $request)
    {

        $x = DB::table('contacts')->first();
        if (is_null($x))
        {
            Contact::create($request->all());
        }
        else
        {
            Contact::find($x->id)->update($request->all());
        }
        return redirect()->route('contactinfo-index')->with('msg','Added Successfully');
    }

    public function counter()
    {
        $counters=Counter::all();
        return view('admin.pages.contact.index',compact('counters'));
    }
    public function counter_create(Request $request)
    {
        $x = Counter::get()->first();
        if (is_null($x)){return view('admin.pages.counter.counter');}
        else
        {
            return view('admin.pages.counter.counter',
                array
                (
                    'counter1' => $x->counter1,'counter1_name' => $x->counter1_name,
                    'counter2' => $x->counter2,'counter2_name' => $x->counter2_name,
                    'counter3' => $x->counter3,'counter3_name' => $x->counter3_name,
                    'counter4' => $x->counter4,'counter4_name' => $x->counter4_name,
                ));
        }

    }

    public function counter_store(Request $request)
    {

        $x = Counter::get()->first();
        if (is_null($x))
        {
            Counter::create($request->all());
        }
        else
        {
            Counter::find($x->id)->update($request->all());
        }
        return redirect()->route('counter-index')->with('msg','Added Successfully');
    }

    public function social()
    {
        $socials=Social::all();
        return view('admin.pages.social.index',compact('socials'));
    }


    public function social_create(Request $request)
    {
        $x = Social::get()->first();
        if ($x===null)
        {
            return view('admin.pages.social.social');
        }
        else
        {
            return view('admin.pages.social.social',
                array
                (
                    'facebook' => $x->facebook,
                    'twitter' => $x->twitter,
                    'instagram' => $x->instagram,
                    'linkedin' => $x->linkedin,
                    'youtube' => $x->youtube,
                ));
        }

    }

    public function social_store(Request $request)
    {

        $x = Social::get()->first();
        if ($x===null)
        {
            Social::create($request->all());
        }
        else
        {
            Social::find($x->id)->update($request->all());
        }
        return redirect()->route('social-index')->with('msg','Added Successfully');
    }






    public function about_create(Request $request)
    {
        $x = DB::table('abouts')->first();
        if (is_null($x)){return view('admin.pages.about');}
        else
        {
            return view('admin.pages.about',
                array('about' => $x->about,'img' => $x->img));
        }

    }

    public function about_store(Request $request )
    {
        $this->validate($request, [
            'about' => 'required|string',

        ]);

        $x = DB::table('abouts')->first();
        if (is_null($x))
        {
            if($request->hasFile('img'))
            {
                $destinationPath='image/about';
                $file=$request->img;
                $extention=$file->getClientOriginalExtension();
                $filename=time().'.'.$extention;
                $file->move($destinationPath, $filename);
                $img=$filename;
                $data=[
                    'about'=>$request->about,
                    'img'=>$img,
                ];
                About::create($data);
                return redirect()->route('about')->with('msg','Successfully Added');
            }
            else{
            $data=[
                'about'=>$request->about,
            ];
            About::create($data);
            return redirect()->route('about')->with('msg','Successfully Added');
            }
        }
        else
        {
            $oldimage=About::select('img')->find($x->id);
            if($request->hasFile('img'))
            {
                $file=$request->img;
                $extention=$file->getClientOriginalExtension();
                $filename=time().'.'.$extention;
                $file->move('image/about',$filename);
                $photo=$filename;
                $oldimage = About::findOrFail($x->id);
                $image_path ='image/about/'.$oldimage->img;

                if(File::exists($image_path))
                {
                    File::delete($image_path);

                }
                $data=[
                    'about'=>$request->about,
                    'img'=>$photo,
                ];
                DB::table('abouts')
                    ->where('id', $x->id)
                    ->update($data);
                return redirect()->route('about')->with('msg','Successfully Added');
            }
            else{
                $data=[
                    'about'=>$request->about,
                    'img'=>$oldimage->img,
                ];
                DB::table('abouts')
                    ->where('id',$x->id)
                    ->update($data);
                return redirect()->route('about')->with('msg','Successfully Added');
            }
        }

    }
    public function facilitySingle_create(Request $request)
    {
        $x = DB::table('facilitysingles')->first();
        if (is_null($x)){return view('admin.pages.facilitySingle');}
        else
        {
            return view('admin.pages.facilitySingle',
                array('contents' => $x->contents,'img' => $x->img));
        }

    }

    public function facilitySingle_store(Request $request )
    {
        $this->validate($request, [
            'contents' => 'required|string',

        ]);

        $x = DB::table('facilitysingles')->first();
        if (is_null($x))
        {
            if($request->hasFile('img'))
            {
                $destinationPath='image/facility';
                $file=$request->img;
                $extention=$file->getClientOriginalExtension();
                $filename=time().'.'.$extention;
                $file->move($destinationPath, $filename);
                $img=$filename;
                $data=[
                    'contents'=>$request->contents,
                    'img'=>$img,
                ];
                Facilitysingle::create($data);
                return redirect()->route('facilitySingle')->with('msg','Successfully Added');
            }
            else{
                $data=[
                    'contents'=>$request->contents,
                ];
                Facilitysingle::create($data);
                return redirect()->route('facilitySingle')->with('msg','Successfully Added');
            }
        }
        else
        {
            $oldimage=Facilitysingle::select('img')->find($x->id);
            if($request->hasFile('img'))
            {
                $file=$request->img;
                $extention=$file->getClientOriginalExtension();
                $filename=time().'.'.$extention;
                $file->move('image/facility',$filename);
                $photo=$filename;
                $oldimage = Facilitysingle::findOrFail($x->id);
                $image_path ='image/facility/'.$oldimage->img;

                if(File::exists($image_path))
                {
                    File::delete($image_path);

                }
                $data=[
                    'contents'=>$request->contents,
                    'img'=>$photo,
                ];
                DB::table('facilitysingles')
                    ->where('id', $x->id)
                    ->update($data);
                return redirect()->route('facilitySingle')->with('msg','Successfully Added');
            }
            else{
                $data=[
                    'contents'=>$request->contents,
                    'img'=>$oldimage->img,
                ];
                DB::table('facilitysingles')
                    ->where('id',$x->id)
                    ->update($data);
                return redirect()->route('about')->with('msg','Successfully Added');
            }
        }

    }
    public function dinning_create(Request $request)
    {
        $x = DB::table('dinnings')->first();
        if (is_null($x)){return view('admin.pages.dinning');}
        else
        {
            return view('admin.pages.dinning',
                array('contents' => $x->contents,'facility' => $x->facility,'img' => $x->img));
        }

    }

    public function dinning_store(Request $request )
    {
        $this->validate($request, [
            'contents' => 'required|string',
        ]);

        $x = DB::table('dinnings')->first();
        if (is_null($x))
        {
            if($request->hasFile('img'))
            {
                $destinationPath='image/dinning';
                $file=$request->img;
                $extention=$file->getClientOriginalExtension();
                $filename=time().'.'.$extention;
                $file->move($destinationPath, $filename);
                $img=$filename;
                $data=[
                    'contents'=>$request->contents,
                    'facility'=>$request->facility,
                    'img'=>$img,
                ];
                Dinning::create($data);
                return redirect()->route('dinning')->with('msg','Successfully Added');
            }
            else{
            $data=[
                'contents'=>$request->contents,
                'facility'=>$request->facility,
            ];
            Dinning::create($data);
            return redirect()->route('dinning')->with('msg','Successfully Added');
            }
        }
        else
        {
            $oldimage=Dinning::select('img')->find($x->id);
            if($request->hasFile('img'))
            {
                $file=$request->img;
                $extention=$file->getClientOriginalExtension();
                $filename=time().'.'.$extention;
                $file->move('image/dinning',$filename);
                $photo=$filename;
                $oldimage = Dinning::findOrFail($x->id);
                $image_path ='image/dinning/'.$oldimage->img;

                if(File::exists($image_path))
                {
                    File::delete($image_path);

                }
                $data=[
                    'contents'=>$request->contents,
                    'facility'=>$request->facility,
                    'img'=>$photo,
                ];
                DB::table('dinnings')
                    ->where('id', $x->id)
                    ->update($data);
                return redirect()->route('dinning')->with('msg','Successfully Added');
            }
            else{
                $data=[
                    'contents'=>$request->contents,
                    'facility'=>$request->facility,
                    'img'=>$oldimage->img,
                ];
                DB::table('dinnings')
                    ->where('id',$x->id)
                    ->update($data);
                return redirect()->route('dinning')->with('msg','Successfully Added');
            }
        }

    }
    public function meeting_create(Request $request)
    {
        $x = DB::table('meetings')->first();
        if (is_null($x)){return view('admin.pages.meeting');}
        else
        {
            return view('admin.pages.meeting',
                array('contents' => $x->contents,'facility' => $x->facility,'img' => $x->img));
        }

    }

    public function meeting_store(Request $request )
    {
        $this->validate($request, [
            'contents' => 'required|string',

        ]);
        $x = DB::table('meetings')->first();
        if (is_null($x))
        {
            if($request->hasFile('img'))
            {
                $destinationPath='image/meeting';
                $file=$request->img;
                $extention=$file->getClientOriginalExtension();
                $filename=time().'.'.$extention;
                $file->move($destinationPath, $filename);
                $img=$filename;
                $data=[
                    'contents'=>$request->contents,
                    'facility'=>$request->facility,
                    'img'=>$img,
                ];
                Meeting::create($data);
                return redirect()->route('meeting')->with('msg','Successfully Added');
            }
            else{
            $data=[
                'contents'=>$request->contents,
                'facility'=>$request->facility,
            ];
            Meeting::create($data);
            return redirect()->route('meeting')->with('msg','Successfully Added');
            }
        }
        else
        {
            $oldimage=Meeting::select('img')->find($x->id);
            if($request->hasFile('img'))
            {
                $file=$request->img;
                $extention=$file->getClientOriginalExtension();
                $filename=time().'.'.$extention;
                $file->move('image/meeting',$filename);
                $photo=$filename;
                $oldimage = Meeting::findOrFail($x->id);
                $image_path ='image/meeting/'.$oldimage->img;

                if(File::exists($image_path))
                {
                    File::delete($image_path);

                }
                $data=[
                    'contents'=>$request->contents,
                    'facility'=>$request->facility,
                    'img'=>$photo,
                ];
                DB::table('meetings')
                    ->where('id', $x->id)
                    ->update($data);
                return redirect()->route('meeting')->with('msg','Successfully Added');
            }
            else{
                $data=[
                    'contents'=>$request->contents,
                    'facility'=>$request->facility,
                    'img'=>$oldimage->img,
                ];
                DB::table('meetings')
                    ->where('id',$x->id)
                    ->update($data);
                return redirect()->route('meeting')->with('msg','Successfully Added');
            }
        }

    }
    public function facility_create()
    {
        $rooms=Room::all();
        $meeting=Meeting::all();
        $dinning=Dinning::all();
        return view('admin.pages.facility',compact('rooms','meeting','dinning'));
    }
    public function facilities()
    {
        $facilities=Facility::all();
        return view('admin.pages.facilities',compact('facilities'));
    }

    public function facility_store(Request $request )
    {
        $this->validate($request, [
            'facility' => 'required|string',
        ]);
        Facility::create($request->all());
        return redirect()->route('facilities')->with('msg','Successfully Added');
    }
    public function facility_edit($id)
    {
        $facility=Facility::findOrFail($id);
        $rooms=Room::all();
        $meeting=Meeting::all();
        $dinning=Dinning::all();
        return view('admin.pages.facility_edit',compact('facility','rooms','meeting','dinning'));
    }
    public function facility_update(Request $request ,$id)
    {
        $content=Facility::findOrFail($id);
        $content->update($request->all());
        return redirect()->route('facilities')->with('msg','Successfully Updated');
    }
    public function facility_destroy($id)
    {
        Facility::destroy($id);
        return redirect()->route('rooms')->with('msg','Successfully Updated');
    }


    public function users()
    {
        $bookings=Customer::all();
        return view('admin.pages.users',compact('bookings'));
    }
    public function user_destroy(Request $request ,$id)
    {
        Customer::destroy($id);
        return redirect()->route('bookings')->with('msg','User Deleted Successfully');
    }


    public function copyright_create(Request $request)
    {
        $x = DB::table('copyrights')->first();
        if (is_null($x)){return view('admin.pages.copyright');}
        else
        {
            return view('admin.pages.copyright',
                array('content' => $x->content));
        }

    }

    public function copyright_store(Request $request )
    {
        $this->validate($request, [
            'content' => 'required|string',

        ]);
        $x = DB::table('copyrights')->first();
        if (is_null($x))
        {

            Copyright::create($request->all());
            return redirect()->route('copyright')->with('msg','Successfully Added');
        }
        else
        {
            $content=Copyright::findOrFail($x->id);
            $content->update($request->all());

            return redirect()->route('copyright')->with('msg','Successfully Updated');

        }

    }
/*...................................*/
/*...................................*/
/*...................................*/
/*...................................*/

    public function room_create()
    {
        $categories=Category::all();
        return view('admin.pages.room',compact('categories'));
    }
    public function rooms()
    {
            $rooms=Room::all();
            return view('admin.pages.rooms',compact('rooms'));
    }

    public function room_store(Request $request )
    {
        $this->validate($request, [
            'category_id' =>'required|unique:rooms',
            'contents' => 'required|string',
        ]);
        $date=Carbon::today();
        $date=Carbon::parse($date)->format('m/d/Y');

        $yesterday=Carbon::yesterday();
        $yesterday=Carbon::parse($yesterday)->format('m/d/Y');
        $opening=Statement::where('date',$yesterday)->get();
        $opening=$opening->sum('closing');

        $expenses=Expense::all();
        $expenses=$expenses->sum('amount');


        $booking=Booking::all();
        $card=Payment::all();
        $cash=Cash::where('status',1)->get();
        $closing=$card->sum('amount')+$cash->sum('amount')-$expenses;
        $room=Room::create($request->all());
        Statement::create([
            'date' => $date,
            'rooms'=> $room->sum('total'),
            'booked'=> $booking->sum('room'),
            'available'=> $room->sum('available'),
            'rent'=> $room->sum('available_price'),
            'opening'=> $opening,
            'closing'=> $closing,
            'card'=> $card->sum('amount'),
            'cash'=> $cash->sum('amount'),
            'expense'=> $expenses,
            'due'=> $date,
        ]);
            return redirect()->route('rooms')->with('msg','Successfully Added');
    }
    public function room_edit($id)
    {
        $categories=Category::all();
        $room=Room::findOrFail($id);
        return view('admin.pages.room_edit',compact('room',compact('categories')));
    }
    public function room_update(Request $request ,$id)
    {
            $content=Room::findOrFail($id);
            $content->update($request->all());
            return redirect()->route('rooms')->with('msg','Successfully Updated');
    }
/*    public function available_update(Request $request ,$id)
    {
        $content=Room::findOrFail($id);
        $content->update($request->all());
        return redirect()->route('rooms')->with('msg','Successfully Updated');
    }*/
    public function room_destroy($id)
    {
        Room::destroy($id);
        return redirect()->route('rooms')->with('msg','Successfully Updated');
    }

    public function bookings()
    {
        $bookings=Booking::all();
        $payments=Payment::all();
        $rooms=Room::all();
        return view('admin.pages.bookings',compact('bookings','payments','rooms'));
    }

    public function bookingUpdate(Request $request,$id)
    {

        //return $request;
        $email=$request->email;
        $name=$request->name;
        $amount=$request->payment;
        $payment_id=$request->payment_id;
        $mobile=$request->mobile;
        $room_id=$request->room_id;
        $room=$request->room;
        $date=Carbon::today();
        $date=Carbon::parse($date)->format('m/d/Y');
        $booked=Booking::findOrFail($id);
        $booking=Booking::findOrFail($id);

        $booking->update($request->all());
        \Mail::send('frontEnd.pages.booking',
            array(
                'name'=> $name,
                'payment'=> $amount
            ), function($message) use ($email, $name)
            {
                $message->from('info.amazingsoft@gmail.com');
                $message->to($email, $name)->subject('Booking Confirmation');
            });
        $id=$booking->id;

        $payment=Payment::findOrFail($payment_id);
        $payment->update([
            'amount' => $amount
        ]);
        $room=Room::findOrFail($room_id);
        $price=$room->price;
        $old=$booked->room;
        $new=$request->room;
        $now=$new-$old;
        $available=$room->available-$now;

        $available_price=$price*$available;
        $room->update([
            'available'=>$available,
            'available_price'=>$available_price,
        ]);
        Booking::where('id',$id)
            ->update([
                'payment_status'=>1,
                'publication_status'=>1,
                'payment'=>$amount
            ]);
        $booking=Booking::all();
        $expenses=Expense::all();
        $expenses=$expenses->sum('amount');
        $yesterday=Carbon::yesterday();
        $yesterday=Carbon::parse($yesterday)->format('m/d/Y');
        $opening=Statement::where('date',$yesterday)->get();
        $opening=$opening->sum('closing');
        $card=Payment::all();
        $cash=Cash::where('status',1)->get();
        $closing=$card->sum('amount')+$cash->sum('amount')-$expenses;
        $room=Room::all();
        Statement::create([
            'date' => $date,
            'rooms'=> $room->sum('total'),
            'booked'=> $booking->sum('room'),
            'available'=> $room->sum('available'),
            'rent'=> $room->sum('available_price'),
            'opening'=> $opening,
            'closing'=> $closing,
            'card'=> $card->sum('amount'),
            'cash'=> $cash->sum('amount'),
            'expense'=> $expenses,
            'due'=> $date
        ]);
        \Mail::send('frontEnd.pages.payment_email',
            array(
                'name'=> $request->name,
                'payment'=>$request->amount,
            ), function($message) use ($email, $name)
            {
                $message->from('info.amazingsoft@gmail.com');
                $message->to($email, $name)->subject('Booking Confirmation');
            });

        return redirect()->route('bookings')->with('msg','Updated Successfully');

    }

    public function booking_active($id,$room,$result)
    {
       Booking::where('id',$id)
            ->update(['publication_status'=>1]);
       $room=Room::findOrFail($room);
        $price=$room->price;
        $available_price=$price*$result;

$room->update([
    'available'=>$result,
    'available_price'=>$available_price,

]);
        $date=Carbon::today();
        $date=Carbon::parse($date)->format('m/d/Y');
        $yesterday=Carbon::yesterday();
        $yesterday=Carbon::parse($yesterday)->format('m/d/Y');
        $opening=Statement::where('date',$yesterday)->get();
        $opening=$opening->sum('closing');
        $expenses=Expense::all();
        $expenses=$expenses->sum('amount');
        $booking=Booking::all();
        $card=Payment::all();
        $cash=Cash::where('status',1)->get();
        $closing=$card->sum('amount')+$cash->sum('amount')-$expenses;
        $room=Room::all();
        Statement::create([
            'date' => $date,
            'rooms'=> $room->sum('total'),
            'booked'=> $booking->sum('room'),
            'available'=> $room->sum('available'),
            'rent'=> $room->sum('available_price'),
            'opening'=> $opening,
            'closing'=> $closing,
            'card'=> $card->sum('amount'),
            'cash'=> $cash->sum('amount'),
            'expense'=> $expenses,
            'due'=> $date,
        ]);
        return redirect()->route('bookings')->with('msg','Activated Successfully');
    }
    public function booking_deactive($id)
    {
        Booking::where('id', $id)->update(['publication_status' => 0]);
        return redirect()->route('bookings')->with('msg','Dectivated Successfully');
    }
    public function booking_destroy($id)
    {
        Booking::destroy($id);
        return redirect()->route('bookings')->with('msg','Booking Deleted Successfully');
    }
    public function booking_close($id,$room,$add)
    {
       $booking=Booking::findorFail($id);
       $previous=$booking->room;
       $now=$previous-$previous;

        $room=Room::findOrFail($room);
        $price=$room->price;
        $available_price=$price*$add;
        $room->update([
            'available'=>$add,
            'available_price'=>$available_price,
        ]);
        Booking::where('id',$id)
            ->update([
                'checkout_status'=>1,
                'room'=>$now,
            ]);
        $date=Carbon::today();
        $date=Carbon::parse($date)->format('m/d/Y');
        $yesterday=Carbon::yesterday();
        $yesterday=Carbon::parse($yesterday)->format('m/d/Y');
        $opening=Statement::where('date',$yesterday)->get();
        $opening=$opening->sum('closing');
        $expenses=Expense::all();
        $expenses=$expenses->sum('amount');
        $booking=Booking::all();
        $card=Payment::all();
        $cash=Cash::where('status',1)->get();
        $closing=$card->sum('amount')+$cash->sum('amount')-$expenses;
        $room=Room::all();
        Statement::create([
            'date' => $date,
            'rooms'=> $room->sum('total'),
            'booked'=> $booking->sum('room'),
            'available'=> $room->sum('available'),
            'rent'=> $room->sum('available_price'),
            'opening'=> $opening,
            'closing'=> $closing,
            'card'=> $card->sum('amount'),
            'cash'=> $cash->sum('amount'),
            'expense'=> $expenses,
            'due'=> $date,
        ]);

        return redirect()->route('bookings')->with('msg','Chceck Out Successfully');
    }
    public function payments()
    {
        $payments=Payment::all();
        return view('admin.pages.payments',compact('payments'));
    }
    public function payment_destroy($id)
    {
        Payment::destroy($id);
        return redirect()->route('payments')->with('msg','Payment Deleted Successfully');
    }
    public function cashes()
    {
        $payments=Cash::all();
        $cash=Cash::where('status',1)->get();
        return view('admin.pages.cashes',compact('payments','cash'));
    }
    public function cash_destroy($id)
    {
        Cash::destroy($id);
        return redirect()->route('cashes')->with('msg','Cash Deleted Successfully');
    }
    public function cash_receive($id,$booking)
    {
        Cash::where('id',$id)
            ->update([
                'status'=>1,
            ]);
        Booking::where('id',$booking)
            ->update([
                'cash_status'=>1,
            ]);
        $date=Carbon::today();
        $date=Carbon::parse($date)->format('m/d/Y');
        $yesterday=Carbon::yesterday();
        $yesterday=Carbon::parse($yesterday)->format('m/d/Y');
        $opening=Statement::where('date',$yesterday)->get();
        $opening=$opening->sum('closing');
        $expenses=Expense::all();
        $expenses=$expenses->sum('amount');
        $booking=Booking::all();
        $card=Payment::all();
        $cash=Cash::where('status',1)->get();
        $closing=$card->sum('amount')+$cash->sum('amount')-$expenses;
        $room=Room::all();
        Statement::create([
            'date' => $date,
            'rooms'=> $room->sum('total'),
            'booked'=> $booking->sum('room'),
            'available'=> $room->sum('available'),
            'rent'=> $room->sum('available_price'),
            'opening'=> $opening,
            'closing'=> $closing,
            'card'=> $card->sum('amount'),
            'cash'=> $cash->sum('amount'),
            'expense'=> $expenses,
            'due'=> $date,
        ]);

        return redirect()->route('cashes')->with('msg','Cash Received Successfully');
    }



    public function expenses()
    {
        $expenses=Expense::all();
        return view('admin.pages.expenses',compact('expenses'));
    }
    public function expense_store(Request $request)
    {

        Expense::create($request->all());
        $date=Carbon::today();
        $date=Carbon::parse($date)->format('m/d/Y');
        $yesterday=Carbon::yesterday();
        $yesterday=Carbon::parse($yesterday)->format('m/d/Y');
        $opening=Statement::where('date',$yesterday)->get();
        $opening=$opening->sum('closing');
        $expenses=Expense::all();
        $expenses=$expenses->sum('amount');
        $booking=Booking::all();
        $card=Payment::all();
        $cash=Cash::where('status',1)->get();
        $closing=$card->sum('amount')+$cash->sum('amount')-$expenses;
        $room=Room::all();
        Statement::create([
            'date' => $date,
            'rooms'=> $room->sum('total'),
            'booked'=> $booking->sum('room'),
            'available'=> $room->sum('available'),
            'rent'=> $room->sum('available_price'),
            'opening'=> $opening,
            'closing'=> $closing,
            'card'=> $card->sum('amount'),
            'cash'=> $cash->sum('amount'),
            'expense'=> $expenses,
            'due'=> $date,
        ]);
            return redirect()->route('expenses')->with('msg','Expense Added Successfully');
    }
    public function expense_update(Request $request,$id)
    {
        $expense=Expense::findOrFail($id);
        $expense->update($request->all());
        return redirect()->route('expenses')->with('msg','Expense Updated Successfully');
    }
    public function expense_destroy($id)
    {
        Expense::destroy($id);
        return redirect()->route('expenses')->with('msg','Expense Deleted Successfully');
    }
    public function statements()
    {
        return view('admin.pages.statements');
    }
    public function statement(Request $request)
    {
        //return $request;

        //$dates =$request->daterange;

        $dates=explode(' - ', $request->daterange);
        //return $dates;
      //$statements=DB::table('statements')->whereBetween('date', [$dates[0], $dates[1]])->groupBy('date')->get();

      $bookings=Booking::whereBetween('check_in', [$dates[0], $dates[1]])->get();
         //$dates[0];
      $rooms=Room::all();
      $available=Room::all();
      $card=Payment::all();
       $statements=Statement::whereBetween('date', [$dates[0], $dates[1]])->get();

/*      all calculation will be here */
        //dd($statements);
        return view('admin.pages.statement',compact('dates','rooms','available','card','bookings','statements'));
    }





}
