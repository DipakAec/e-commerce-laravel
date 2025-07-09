<?php

namespace App\Http\Controllers\Seller;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Seller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class SellerAuthController extends Controller
{
    public function showRegisterForm()
{
    $countries = Country::all();
    $states = State::all();
    $cities = City::all();

    return view('seller.auth.register', compact('countries', 'states', 'cities'));
}

    public function submitRegisterForm(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'          => 'required|string|max:255',
            'username'      => 'required|string|max:255|unique:sellers,username',
            'email'         => 'required|email|max:255|unique:sellers,email',
            'mobile'        => 'required|string|max:10|unique:sellers,mobile',
            'country'       => 'required|exists:countries,id',
            'state'         => 'required|exists:states,id',
            'city'          => 'required|exists:cities,id',
            'pin'           => 'required|string|max:6',
            'product_type'  => 'required|string|max:255',
            'gstin'         => 'required|string|max:20|unique:sellers,gstin',
            'password'      => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Save seller
        Seller::create([
            'name'         => $request->name,
            'username'     => $request->username,
            'email'        => $request->email,
            'mobile'       => $request->mobile,
            'country'      => $request->country,
            'state'        => $request->state,
            'city'         => $request->city,
            'pin'          => $request->pin,
            'product_type' => $request->product_type,
            'gstin'        => $request->gstin,
            'password'     => Hash::make($request->password),
        ]);

        return redirect()->route('seller.login')->with('success', 'Seller registered successfully!');
    }
    public function showLoginForm()
    {
        return view('seller.auth.login');
    }

     public function login(Request $request)
    {   
        $request->validate([
            'login' => 'required|string',
            'password' => 'required|string',
        ]);

        // Allow login via email or username
        $seller = Seller::where('email', $request->login)
                    ->orWhere('username', $request->login)
                    ->first();

        if ($seller && Hash::check($request->password, $seller->password)) {
            Auth::guard('seller')->login($seller);
            return redirect()->route('seller.dashboard'); // create this route
        }

        return back()->with('error', 'Invalid credentials');
    }

    public function logout(Request $request)
    {
        Auth::guard('seller')->logout();
        return redirect()->route('seller.login');
    }
}
