<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\MobileVerified;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MobileVerificationController extends Controller
{
    public function register(Request $request)
    {

        $request->validate([
            'mobile' => 'required|regex:/[0-9]{9}/|digits:11|numeric',
            'name' => 'required',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::whereMobile(convert_ew($request->mobile))->first();

        if (! $user) {
            $activationKey = randomId();
            $userMobile = convert_ew($request->mobile);

            MobileVerified::updateOrCreate(
                ['mobile' => $userMobile],
                [
                    'name' => $request->name,
                    'password' => $request->password,
                    'activation_code' => $activationKey,
                ]

            );

            //Send Sms
            //            FastSendSms($userMobile,config('sms.pattern_activation'),$activationKey);

            return redirect(route('mobile.get.verify', base64_encode($userMobile)));

        }
        session()->flash('alert-error', ['شما قبلا ثبت نام کرده اید.']);

        return back();
    }

    public function getVerify(Request $request)
    {
        $mobile = base64_decode($request->mobile);

        return view('auth.mobile.verify', compact('mobile'));
    }

    public function verify(Request $request)
    {
        $request->validate([
            'mobile' => 'required|regex:/[0-9]{9}/|digits:11|numeric',
            'code' => 'required||numeric|digits:4',
        ]);

        $activation = MobileVerified::whereMobile($request->mobile)->where('activation_code', $request->code)->first();

        if ($activation) {
            $code = base64_encode($request->code);

            return redirect(route('register.verify', $code));

        } else {
            session()->flash('alert-error', ['کد تایید اشتباه میباشد.']);

            return back();
        }
    }

    public function registerVerify(Request $request)
    {
        $activation = MobileVerified::where('activation_code', base64_decode($request->code))->first();

        User::create([
            'name' => $activation->name,
            'mobile' => $activation->mobile,
            'password' => Hash::make($activation->password),
        ]);

        $activation->delete();
        session()->flash('alert-success', ['ثبت نام با موفقیت انجام شد.']);

        return redirect(route('login'));
    }
}
