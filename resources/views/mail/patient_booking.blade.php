<html xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office" lang="en"><head>
    <meta charset="utf-8">
    <meta name="x-apple-disable-message-reformatting">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no, date=no, address=no, email=no">
    <!--[if mso]>
    <xml><o:OfficeDocumentSettings><o:PixelsPerInch>96</o:PixelsPerInch></o:OfficeDocumentSettings></xml>
    <style>
        td,th,div,p,a,h1,h2,h3,h4,h5,h6 {font-family: "Segoe UI", sans-serif; mso-line-height-rule: exactly;}
    </style>
    <![endif]-->
    <title>@lang('site.confirm_booking')</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700" rel="stylesheet" media="screen">
    <style>
        .hover-underline:hover {
            text-decoration: underline !important;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        @keyframes ping {

            75%,
            100% {
                transform: scale(2);
                opacity: 0;
            }
        }

        @keyframes pulse {
            50% {
                opacity: .5;
            }
        }

        @keyframes bounce {

            0%,
            100% {
                transform: translateY(-25%);
                animation-timing-function: cubic-bezier(0.8, 0, 1, 1);
            }

            50% {
                transform: none;
                animation-timing-function: cubic-bezier(0, 0, 0.2, 1);
            }
        }

        @media (max-width: 600px) {
            .sm-leading-32 {
                line-height: 32px !important;
            }

            .sm-px-24 {
                padding-left: 24px !important;
                padding-right: 24px !important;
            }

            .sm-py-32 {
                padding-top: 32px !important;
                padding-bottom: 32px !important;
            }

            .sm-w-full {
                width: 100% !important;
            }
        }
    </style>
</head>

<body style="margin: 0; padding: 0; width: 100%; word-break: break-word; -webkit-font-smoothing: antialiased; --bg-opacity: 1; background-color: #eceff1; background-color: rgba(236, 239, 241, var(--bg-opacity));">
<div style="display: none;">@lang('confirm_booking')</div>
<div role="article" aria-roledescription="email" aria-label="Verify Email Address" lang="en">
    <table style="font-family: Montserrat, -apple-system, 'Segoe UI', sans-serif; width: 100%;" role="presentation" width="100%" cellspacing="0" cellpadding="0">
        <tbody><tr>
            <td style="--bg-opacity: 1; background-color: #eceff1; background-color: rgba(236, 239, 241, var(--bg-opacity)); font-family: Montserrat, -apple-system, 'Segoe UI', sans-serif;" bgcolor="rgba(236, 239, 241, var(--bg-opacity))" align="center">
                <table class="sm-w-full" style="font-family: 'Montserrat',Arial,sans-serif; width: 600px;" role="presentation" width="600" cellspacing="0" cellpadding="0">
                    <tbody><tr>
                        <td class="sm-py-32 sm-px-24" style="font-family: Montserrat, -apple-system, 'Segoe UI', sans-serif; padding: 48px; text-align: center;" align="center">
                            <a href="https://ipersona.me/">
                                <img src="{{asset('logo_main.png')}}" alt="Iperosona" style="border: 0; max-width: 100%; line-height: 100%; vertical-align: middle;" width="155">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td class="sm-px-24" style="font-family: 'Montserrat',Arial,sans-serif;" align="center">
                            <table style="font-family: 'Montserrat',Arial,sans-serif; width: 100%;" role="presentation" width="100%" cellspacing="0" cellpadding="0">
                                <tbody><tr>
                                    <td class="sm-px-24" style="--bg-opacity: 1; background-color: #ffffff; background-color: rgba(255, 255, 255, var(--bg-opacity)); border-radius: 4px; font-family: Montserrat, -apple-system, 'Segoe UI', sans-serif; font-size: 14px; line-height: 24px; padding: 48px; text-align: left; --text-opacity: 1; color: #626262; color: rgba(98, 98, 98, var(--text-opacity));" bgcolor="rgba(255, 255, 255, var(--bg-opacity))" align="left">
                                    @if(Session::get('locale') == 'en')
                                    <p>You have confirmed booking an appointment with
Dr {{$details['name']}}</p>

<p>
    Day: {{$details['day']}}
    <br>
    Date: {{$details['date']}}
    @if($details['type'] == 'online')
    <br>
    From: {{$details['from']}}
    <br>
    To: {{$details['to']}}
    <br>
    Session Duration: {{$details['duration']}}
    @else
    <br>
    Clinic Address: {{$details['address']}}
    <br>
    Clinic Appointments: From {{$details['from']}} To {{$details['to']}}
    <br>
    Phone Number: {{$details['phone']}}
    @endif
    <br>
    Session Price: {{$details['amount']}}


</p>

<p>Thanks
    <br>
iPersona Team</p>
@else
<div style="text-align:right">
<p>{{$details['name']}} لقد قمت بتأكيد حجز ميعاد كشف مع الدكتور</p>
<p> يوم :<span style="">@lang('site.'.$details['day']) </span>
    <br>
     {{$details['date']}} : تاريخ
    @if($details['type'] == 'online')
    <br>
    {{$details['from']}} : من
    <br>
    {{$details['to']}} : إلي
    <br>
    {{$details['duration']}} : مدة الجلسه

    @else
    <br>
     عنوان العيادة :<span style="margin-right:10px">{{$details['address']}}</span>
    <br>
    <div style="text-align:right;float:right">
    <div style="display:flex">
        <div style="display:flex">

            <div style="display:flex"><div style="margin-right:10px">{{$details['to']}} </div>
        <span style="margin-right:10px">    إلي </span>
            </div>
            <div style="display:flex"><div style="margin-right:10px">{{$details['from']}}</div>  <span style="margin-right:10px">من  </span>
            </div>
        </div> :مواعيد العيادة
    </div>
</div>
    <br>
    {{-- {{$details['phone']}} : موبايل  --}}
        @endif
    <br>
    {{$details['amount']}} : سعر الجلسه
</p>

<p>شكرا
    <br>
    فريق عمل آي بيرسونا</p>
    </div>
@endif
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-family: 'Montserrat',Arial,sans-serif; height: 20px;" height="20"></td>
                                </tr>
                                <tr>
                                    <td style="font-family: 'Montserrat',Arial,sans-serif; height: 16px;" height="16"></td>
                                </tr>
                                </tbody></table>
                        </td>
                    </tr>
                    </tbody></table>
            </td>
        </tr>
        </tbody></table>
</div>


</body></html>
