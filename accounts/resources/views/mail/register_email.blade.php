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
    <title>Register Email</title>
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
<div style="display: none;">Register Email</div>
<div role="article" aria-roledescription="email" aria-label="Verify Email Address" lang="en">
    <table style="font-family: Montserrat, -apple-system, 'Segoe UI', sans-serif; width: 100%;" role="presentation" width="100%" cellspacing="0" cellpadding="0">
        <tbody><tr>
            <td style="--bg-opacity: 1; background-color: #eceff1; background-color: rgba(236, 239, 241, var(--bg-opacity)); font-family: Montserrat, -apple-system, 'Segoe UI', sans-serif;" bgcolor="rgba(236, 239, 241, var(--bg-opacity))" align="center">
                <table class="sm-w-full" style="font-family: 'Montserrat',Arial,sans-serif; width: 600px;" role="presentation" width="600" cellspacing="0" cellpadding="0">
                    <tbody><tr>
                        <td class="sm-py-32 sm-px-24" style="font-family: Montserrat, -apple-system, 'Segoe UI', sans-serif; padding: 48px; text-align: center;" align="center">
                            <a href="https://1.envato.market/vuexy_admin">
                                <img src="{{asset('logo_main.png')}}" alt="Iperosona" style="border: 0; max-width: 100%; line-height: 100%; vertical-align: middle;" width="155">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td class="sm-px-24" style="font-family: 'Montserrat',Arial,sans-serif;" align="center">
                            <table style="font-family: 'Montserrat',Arial,sans-serif; width: 100%;" role="presentation" width="100%" cellspacing="0" cellpadding="0">
                                <tbody><tr>
                                    <td class="sm-px-24" style="--bg-opacity: 1; background-color: #ffffff; background-color: rgba(255, 255, 255, var(--bg-opacity)); border-radius: 4px; font-family: Montserrat, -apple-system, 'Segoe UI', sans-serif; font-size: 14px; line-height: 24px; padding: 48px; text-align: left; --text-opacity: 1; color: #626262; color: rgba(98, 98, 98, var(--text-opacity));" bgcolor="rgba(255, 255, 255, var(--bg-opacity))" align="left">
                                    
<div style="text-align:right;margin-bottom:20px">
{{$details['name']}} مرحبا 
<br>
تشرفنا بإنضمامك لموقع آي بيرسونا أقوي موقع للرعاية النفسية في الوطن العربي آملين في الاستفادة من خبراتكم الكبيرة لتقديم خدمة أفضل لعملائنا في جميع أنحاء الوطن العربي . 

<br>
{{$details['email']}}:اسم المستخدم
<br>
{{$details['email']}}:كلمة المرور
<br>
شكرا
<br>
فريق عمل آي بيرسونا
</div>
                                    
                                    <p>Dear {{$details['name']}}</p>

<p>We are honored to have you join the iPersona website, the best at all for psychological care in the Arab world, hoping to benefit from your great experiences to provide better service to our customers throughout the Arab world.</p>

Mail:{{$details['email']}}
<br>
Password:{{$details['email']}}

Thanks
<br>
iPersona Team


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
