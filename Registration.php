<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Join;
use App\Models\Newsletter;
use App\Models\Testimony;
use App\Models\Profile;
use Hash;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Views;
class Registration extends Controller
{
  public function show($slug)
    {
        $category = Category::with('posts')->where('slug', $slug)->firstOrFail();

        if (view()->exists('category.custom.'.$category->slug)) {
            $view = 'category.custom.'.$category->slug;
       } else {
           $view = 'category.show';
       }

       return view($view, [
           'category' => $category,
       ]);
   }
    public function registration()
    {
      return view ("auth.registration");
    }
    public function login()
    {
      return view ("auth.login");
    }
    public function home2()
    {
      return view ("home2");
    }
    public function registrationto()
    {
      return view('auth.registrationto');
    }
    public function whatwedo()
    {
      return view("whatwedo");
    }

    public function SDG3()
    {
      return view("SDG3");
    }

    public function SDG8()
    {
      return view("SDG8");
    }
    public function SDG12()
    {
      return view("SDG12");
    }
    public function SDG13()
    {
      return view("SDG13");
    }
    public function about()
    {
      return view("about");
    }
    public function impact()
    {
      return view("impact");
    }
    public function testimony()
    {
      return view("testimony");
    }
    public function thankyou()
    {
      return view("thankyou");
    }
    public function profile()
    {
      return view("profile");
    }
     public function registeruser(Request $request)//validate and set criteria for fields
     {
       $request->validate([
         'name'=> 'required',
         'password'=>'required|min:6|max:12',
         'email'=> 'required|email|unique:users'
       ]);
       $user = new User();
       $user->name=$request->name;
       $user->password=Hash::make($request->password);//secure password
       $user->email=$request->email;
       $res=$user->save();
       if($res)//get response show action
       {
         return Redirect ('home2');
       } else
       {
         return back()->with('failed','There is something wrong');
       }
     }
public function registerjoin(Request $request){
  $request->validate([
 			'name' => 'required|string|min:3|max:255',
 			'email' => 'required|string|email|max:255',
      'interest'=>'required'
 		]);

 				$join = new Join;
        $join->name = $request->name;
        $join->interest = $request->interest;
 				$join->email = $request->email;
 				$res=$join->save();
        if($res)
        {
 				return redirect("thankyou");
 			}

 		}

public function loginuser(Request $request)
{
  $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|max:12'
        ]);

        $user = User::where('email','=',$request->email)->first();
        if ($user) {
            return Redirect('home2');
        }

        return redirect("login")->withSuccess('Login details are not valid');
    }

    public function store(Request $request)
        {
          $request->validate([
         			'name' => 'required|string|min:3|max:255',
         			'email' => 'required|string|email|max:255'

         		]);

         				$newsletter = new Newsletter;
                $newsletter->name = $request->name;
         				$newsletter->email = $request->email;
         				$res=$newsletter->save();
                if($res)
                {
         				return redirect()->route('home2')->with('Thank you for subscribing');
         			}

         		}
            public function testimonial(Request $request)
                {
                  $request->validate([
                 			'name' => 'required|string|min:3|max:255',
                 			'Testimony' => 'required|string'

                 		]);

                 				$testimonals = new Testimony;
                        $testimonals->name = $request->name;
                 				$testimonals->Testimony = $request->Testimony;
                 				$res=$testimonals->save();
                        if($res)
                        {
                 				return redirect("thankyou");
                 			}

                 		}
      public function profileUpdate(Request $request){
        //validation rules
            $request->validate([
            'name' =>'required|min:4|string|max:255',
            'email'=>'required|email|string|max:255'
        ]);
        $profiles = new Profile();
        $profiles->name = $request->name;
        $profiles->email = $request->email;
        $profiles->save();
        return back()->with('message','Profile Updated');
    }

    public function signOut() {
           Session::flush();
           Auth::logout();

           return Redirect('login');
       }
}
