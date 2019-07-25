<?php
namespace App\Http\Controllers;
use App\About;
use App\Booking;
use App\Cash;
use App\Mail\Book;
use App\Counter;
use App\Payment;
use App\Slider;
use App\Slider2;
use App\Statement;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Mail;
use App\Mail\Contact;
use App\Customer;
use App\Dinning;
use App\Facility;
use App\Facilitysingle;
use App\Gallery;
use App\Meeting;
use App\Expense;
use App\Room;
use Illuminate\Http\Request;

class frontendController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:customer',['except'=>['index','search_index','about','room','room_details','facilities','dinning','meeting','gallery','contact','contactUSPost','login','registration']]);
    }
    public function index()
    {
        $sliders=Slider::all();
        $rooms=Room::all();
        $testimonials=Slider2::all();
        $counter=Counter::get()->first();
        return view('frontEnd.index',compact('sliders','rooms','testimonials','counter'));
    }
    public function search_index(Request $request)
    {
        $rooms=Room::all();
        $userss = Room::all();
        $check_in = $request->check_in;
        $check_out = $request->check_out;
        $room_number = $request->room;
        $adult = $request->adult;
        $child = $request->child;
        return view('frontEnd.pages.room',compact('rooms','userss','check_in','check_out','room_number','adult','child'));
    }

    public function booking(Request $request)
    {
        $email=$request->email;
        $name=$request->name;
        $amount=$request->payment;
        $mobile=$request->mobile;
        $room_id=$request->room_id;
        $room=$request->room;
        $date=Carbon::today();
        $date=Carbon::parse($date)->format('m/d/Y');

        $data=Booking::create($request->all());
        //$data=Booking::create($request->all());
        \Mail::send('frontEnd.pages.booking',
            array(
                'name'=> $name,
                'payment'=> $amount
            ), function($message) use ($email, $name)
            {
                $message->from('info.amazingsoft@gmail.com');
                $message->to($email, $name)->subject('Booking Confirmation');
            });
        $id=$data->id;
            return view('frontEnd.pages.payment',compact('email','name','amount','room_id','room','mobile','id'))->with('msg','Booking Information sent Successfully');
    }
    public function payment($id)
    {
        $payment=Booking::findOrFail($id);
        $email=$payment->email;
        $name=$payment->name;
        $amount=$payment->payment;
        $room_id=$payment->room_id;
        $room=$payment->room;
        $mobile=$payment->mobile;
        $id=$payment->id;
        return view('frontEnd.pages.payment',compact('email','name','amount','room_id','room','mobile','id'));
    }
    public function postPaymentWithStripe(Request $request)
    {
        $booking_id=$request->booking_id;
        $name=$request->name;
        $email=$request->email;
        \Stripe\Stripe::setApiKey ( 'sk_test_RyFAiUILwhx6K0gz2RxbhC9S' );

        try {
            \Stripe\Charge::create ( array (

                "amount" => $request->amount * 100,

                "currency" => "usd",

                "source" => $request->input('stripeToken'), // obtained with Stripe.js

                "description" => "Test payment."

            ) );
            $date=Carbon::today();
            $date=Carbon::parse($date)->format('m/d/Y');
           $data=Payment::create([
               'date' => $date,
                'amount' => $request->amount,
                'name' => $name,
                'email' => $email,
                'mobile' => $request->mobile,
                'customer_id' => $request->customer_id,
                'room_id' => $request->room_id,
                'room' => $request->room,
            ]);
            $room=Room::findOrFail($request->room_id);
            $price=$room->price;
            $available=$room->available-$request->room;
            $available_price=$price*$available;
            $room->update([
                'available'=>$available,
                'available_price'=>$available_price,
            ]);
            Booking::where('id',$booking_id)
                ->update([
                    'payment_status'=>1,
                    'payment_id'=>$data->id,
                    'publication_status'=>1
                ]);
            $booking=Booking::all();
            $expense=Expense::all();
            $opening=Statement::all();
            $cash=Cash::where('status',1)->get();
            $closing=$data->sum('amount')+$cash->sum('amount');
            $room=Room::all();
            Statement::create([
                'date' => $date,
                'rooms'=> $room->sum('total'),
                'booked'=> $booking->sum('room'),
                'available'=> $room->sum('available'),
                'rent'=> $room->sum('available_price'),
                'opening'=> $opening->sum('opening'),
                'closeing'=> $closing,
                'card'=> $data->sum('amount'),
                'cash'=> $cash->sum('amount'),
                'expense'=> $expense->sum('amount'),
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
            return redirect()->route('frontend-room')->with('msg','done');
        }
        catch ( \Exception $e ) {
            dd($e);

            //return Redirect::back ();
        }

}
    public function cash(Request $request)
    {
        $booking_id=$request->booking_id;
        $name=$request->name;
        $email=$request->email;
            $date=Carbon::today();
            $date=Carbon::parse($date)->format('m/d/Y');
            $data=Cash::create([
                'date' => $date,
                'amount' => $request->amount,
                'name' => $name,
                'email' => $email,
                'mobile' => $request->mobile,
                'customer_id' => $request->customer_id,
                'room_id' => $request->room_id,
                'booking_id' => $booking_id,
                'room' => $request->room
            ]);
        Booking::where('id',$booking_id)
            ->update([
                'cash_status'=>0,
                'cash_id'=>$data->id
            ]);
            $booking=Booking::all();
            $expense=Expense::all();
            $opening=Statement::all();
            $cash=Cash::where('status',1)->get();
            $closing=$data->sum('amount')+$cash->sum('amount');
            $payments=Payment::all();
            $room=Room::all();
            Statement::create([
                'date' => $date,
                'rooms'=> $room->sum('total'),
                'booked'=> $booking->sum('room'),
                'available'=> $room->sum('available'),
                'rent'=> $room->sum('available_price'),
                'opening'=> $opening->sum('opening'),
                'closeing'=> $closing,
                'card'=> $payments->sum('amount'),
                'cash'=>  $cash->sum('amount'),
                'expense'=> $expense->sum('amount'),
                'due'=> $date,
            ]);
            \Mail::send('frontEnd.pages.cash_email',
                array(
                    'name'=> $request->name,
                    'payment'=>$request->amount,
                ), function($message) use ($email, $name)
                {
                    $message->from('info.amazingsoft@gmail.com');
                    $message->to($email, $name)->subject('Booking Confirmation Pending');
                });
            return redirect()->route('frontend-room')->with('msg','done');
    }
    public function about()
    {
        $about=About::all();
        $testimonials=Slider2::all();
        return view('frontEnd.pages.about',compact('about','testimonials'));
    }
    public function room()
    {
        $rooms=Room::all();
        return view('frontEnd.pages.room',compact('rooms'));
    }
    public function room_details($id)
    {
        $room=Room::findOrFail($id);
        $datas=Room::get()->take(3);
        return view('frontEnd.pages.room_details',compact('room','datas'));
    }
    public function facilities()
    {
        $facility=Facilitysingle::all();
        return view('frontEnd.pages.facilities',compact('facility'));
    }
    public function dinning()
    {
        $dinning=Dinning::all();
        return view('frontEnd.pages.dinning',compact('dinning'));
    }
    public function meeting()
    {
        $meeting=Meeting::all();
        return view('frontEnd.pages.meeting',compact('meeting'));
    }
    public function gallery()
    {
        $galleries=Gallery::all();
        return view('frontEnd.pages.gallery',compact('galleries'));
    }
    public function contact()
    {
        return view('frontEnd.pages.contact');
    }
    public function contactUSPost(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);
        \Mail::to(
            'info.amazingsoft@gmail.com')->send(new Contact);
        return back()->with('success', 'Thanks for contacting us!');
    }

    public function login(){
        return view('frontEnd.pages.login');
    }
    public function registration(Request $request)
    {
        $this->validate($request,[
            'name' =>'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:customers',
            'password' => 'required|string|min:6|confirmed',
        ]);
        if($request->password_confirmation===$request->password){
            if( Customer::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ])){
                return redirect()->route('user-login')->with('msg','Successfully Registration Now Log In with your email and Password!');
            }
        }
        return redirect()->route('user-login')->with('msg','Error!');
    }
    public function account(){
        $bookings=Booking::where('customer_id','=',Auth::guard('customer')->user()->id)->get();
        return view('frontEnd.pages.my-account',compact('bookings'));
    }

}
