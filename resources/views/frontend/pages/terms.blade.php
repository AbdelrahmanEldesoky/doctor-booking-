@extends('layouts.app')
@section('title', trans('site.Terms'))
@push('css')
<style>
    p {
        font-size: 22px !important;
        font-weight: 500;
        text-align:justify;
        margin-top:0cm;
        margin-right:0cm;
        margin-bottom:.0001pt;
        margin-left:0cm;
        line-height:150%;
        font-size:15px;
        font-family:"Calibri","sans-serif";
    }
     p span{
        font-size:19px;line-height:150%;font-family:"Times New Roman","serif";
     }
  ul li{
    list-style:none;
  }
  ul
  {
    padding: 0;
  }
</style>
@endpush
@section('content')
<div class="tabslid pages-banner">
    <div class="container text-center px-0">

        <div class="py-0  text-center">
            <h1 class="GraphikArabic-Black-Web text-white">
                @lang('site.Terms')
            </h1>
        </div>

    </div>
</div>




<main class="container my-5">


    <div class="row g-5">

        <div class="col-md-12 mb-4">

            <div class=" card-fields" style="text-align: left !important">
                @if (!empty(Session::get('locale') == 'en'))
                <p> Please read the following terms and conditions carefully before using Ipersona.me website
                        : To access the site, the following terms and conditions apply By using the ipersona.me website,
                        you have to agree that you will be legally bound by these terms and conditions, which are
                        effective immediately after your use of the ipersona.me website.</p>

                        <p>If you do not agree, you should not use the ipersona.me website. Persona company is the owner of
                        ipersona.me reserves the right to change the terms, conditions and items related to Privacy
                        Policy from time to time and accordingly The user must review these terms and conditions and the
                        privacy policy periodically. It will be enough for us to mention the date of the last update
                        terms of use and privacy policy without need to contact the user (you) directly or inform you of
                        any changes made to the terms and conditions and privacy policy. We, the "iPersona" team, We
                        welcome all your comments through our contact form "Contact Us" "or info@ipersona.me
                        Registration terms : </p>
                        <ul>
                            <li>
                                1- consent of the parents or one of them or the guardian for those under 18 years of
                                age. according to the Gregorian calendar) and want to use ipersona.me, they will have to
                                send an email to a parent or guardian so that the ipersona team can contact them to make
                                sure and get approval, and accordingly the parents or one of them or the guardian is
                                obligated to monitor the activities of their children who are using the ipersona.me site
                                and to be fully responsible for their actions issued by them on the ipersona.me site as
                                long as they They have not reached the legal age, which is 18 years according to the
                                Gregorian calendar.
                            </li>
                            <li>
                                2- Applying the Children’s Online Privacy Protection law in any Sites or Apps, if it
                                appears to us or we are informed that the user's age is less than the legal age to
                                create an account on ipersona.me, we will make a temporary suspension of the account
                                until obtaining the consent of the guardian by requesting the mail address The
                                electronic mail of the parents, one of them, or the guardian, in accordance with the
                                requirements of the Children's Online Privacy Protection Act If you believe that your
                                child is engaged in an activity that collects personal information, and your parent or
                                guardian has not received or received an email notifying you or requesting your consent,
                                please do not hesitate to contact us. via info@ipersona.me
                            </li>
                            <li>
                                3- By using the ipersona.me site, this is an acknowledgment and undertaking from you
                                that you have the right and legal ability to use the ipersona site in accordance with
                                the law of the country it belongs to, and as a guide without limitation, the minimum
                                legal age to use the ipersona.me site It is 18 years according to the Gregorian calendar
                                in Egypt, as well as other Arabic countries - and 18 years according to the calendar
                                Gregorian in China - and 16 years in the Netherlands And 14 years in Germany, Australia,
                                South Korea and Spain and the United States of America - and 13 years In relation to the
                                rest of the world.
                            </li>
                            <li>
                                4- By using the ipersona.me website, you agree to refrain from doing or participating in
                                the following matters (whether: done by you personally or through a third party (whereby
                                by using the ipersona.me site you bear the personal and legal responsibility not to
                                publish, upload, send, distribute, store, create or publish in any way or cause to be
                                published on the ipersona.me site in any way directly or indirectly through a third
                                party website Any of the following):
                            </li>
                            <li>
                                <ul>
                                    <li>
                                        1-4/ Carrying out any action that may affect employment or the security of
                                        ipersona.me.
                                    </li>
                                    <li>
                                        2-4/ Causing unreasonable inconvenience, abuse, or disruption to any other User
                                        or Team Process ipersona.me
                                    </li>
                                    <li>
                                        3-4 Transferring your personal account or the page you manage on ipersona.me to
                                        any person without notifying us and obtaining prior written permission. with
                                        that.
                                    </li>
                                    <li>
                                        4-4 Applying reverse engineering, reverse assembly, disassembly, or any other
                                        work with the aim of discovering source code or other mathematical formulas or
                                        processors regarding the computer program used in the infrastructure and related
                                        operations of ipersona.me website || express consent, whether manually or
                                        otherwise.

                                        5-4 Violating the privacy rights of other users or collecting data and
                                        information about users without using any automated or spider software A
                                        crawler, site search, retrieval application, or any other automated device or
                                        process to hack a website or restore the index or data mining information.
                                    </li>
                                    <li>
                                        6-4 Providing personal information about another person (name / phone number /
                                        e-mail / medical condition / credit card numbers)
                                    </li>
                                    <li>
                                        7-4- Transmitting viruses, destructive data, or any files intended to sabotage,
                                        disable, or cause damage to the site. Providing content or links that we
                                        consider, based on our absolute judgment, to be dangerous and harmful to the
                                        ipersona.me site, or to pose danger and harm to the rest of the users, or to
                                        expose us to legal issues in any way .
                                    </li>
                                </ul>
                            </li>
                            <li>

                                5- By using the ipersona.me website, this means commitment to ethical and legal values
                                and standards in relation to providing content, or you will be subject to legal issues.
                                The following are the types of content that are rejected and that expose you to legal
                                issues:
                            </li>
                            <li>
                                <ul>
                                    <li>
                                        1-5 Illegal content, including Defamation, slander, abuse to any religious or
                                        moral group or content that is obscene, pornographic, obscene, obscene,
                                        suggestive, or Harassment, threats or Privacy and copyright infringement .
                                    </li>
                                    <li>
                                        2-5 Violent, sensitizing, fraudulent, or Not acceptable in any way.
                                    </li>
                                    <li>
                                        3-5 Content that encourages, constitutes, or provides instructions for violating
                                        it offense or infringement of the rights of any party whatsoever form in breach
                                        of local laws.
                                    </li>
                                    <li>
                                        4-5 Content that disturbs or annoys others.
                                    </li>
                                    <li>
                                        5-5 Content that you do not personally own without legal permission From the
                                        original content owner.
                                    </li>
                                    <li>
                                        6-5/ Content that impersonates the identity or description of any real person or
                                        deeming or creating a false claim in consequence thereof real or legal person
                                        including ipersona
                                    </li>
                                    <li>
                                        7-5/ Promote unwanted materials or political campaigns Harassment, threats or
                                        breach of privacy rights and published
                                    </li>
                                    <li>
                                        2-5 Violent, sensitizing, fraudulent, or Not acceptable in any way.
                                    </li>
                                    <li>
                                        3-5 Content that encourages, constitutes, or provides instructions for violating
                                        it offense or infringement of the rights of any party whatsoever form in breach
                                        of local laws.
                                    </li>
                                    <li>
                                        4-5 Content that disturbs or annoys others.
                                    </li>
                                    <li>
                                        5-5 Content that you do not personally own without legal permission From the
                                        original content owner.
                                    </li>
                                    <li>
                                        6-5/ Content that impersonates the identity or description of any real person or
                                        deeming or creating a false claim in consequence thereof real or legal person
                                        including ipersona
                                    </li>
                                    <li>
                                        7-5/ Promote unwanted materials or political campaigns advertisements, contests,
                                        sweepstakes, or submissions offers.
                                    </li>
                                </ul>
                            </li>
                            <li>
                                6/ ipersona.me is not responsible for or clicking any content posted by users, uploaded,
                                broadcast, distributed, stored, found or posted in any way or caused to be posted on
                                ipersona.me directly or through a third party website.
                            </li>
                            <li>
                                <ul>
                                    <li>
                                        2 - 6/ ipersona.me is not responsible for any Content posted, stored or uploaded
                                        in the groups or the interactive page by you or by any third party Nor shall we
                                        be liable for any damages or losses arising therefrom
                                    </li>
                                    <li>
                                        3-6 / ipersona.me is not responsible for: any errors, defamation,, omissions,
                                        lies, abuse, pornography, insults that you may encounter during your use
                                        interactive pages .
                                    </li>
                                    <li>
                                        4-6 The ipersona.me is not responsible for any statements bearing commitments on
                                        public interactive pages, and the user must notify us as soon as one of these
                                        violations occurs so that we can take the necessary action at our discretion.
                                    </li>
                                </ul>
                            </li>
                            <li>
                                7/ In the event of complaints arising from the content that a user has posted, uploaded,
                                broadcast, distributed, saved, created or caused in any way to be published on
                                ipersona.me either directly or through a third party website, you agree to file a
                                complaint against this user only and not against us ipersona.
                            </li>
                            <li>
                                8/ You are committed not to use ipersona.me in any way that sabotages or exceeds the
                                carrying capacity of our servers or networks associated with any of our servers due to
                                the limited capacity of server hardware and their use by many people around the world.
                                It also warns against any action that would impose an unreasonably large load or
                                inappropriately with i persona.
                            </li>
                            <li>
                                9- ipersona.me offers you all. Psychotherapy, also tele-psychological care In written,
                                visual and audio conversations through Book psychological sessions with doctors and
                                psychotherapists The subscription is paid in one of the following ways:
                            </li>
                            <li>
                                <ul>
                                    <li>
                                        1-9 / credit cards in all around the world .
                                    </li>
                                    <li>
                                        2-9/ electronic cards (Fawry outlets) and Vodafone Cash Arab Republic of Egypt.
                                    </li>
                                    <li>
                                        3 - 9/ By subscribing to any of our services provided to you from our
                                        ipersona.me website, and according to the method of payment for the service
                                        subscription, you agree to the refund policy. which is next :-
                                    </li>
                                    <li>
                                        4-9 In the event that you cancel the session reservation. with a physician or
                                        Psychotherapist through audio or video chat 48 before the start of the session
                                        time as a maximum of forty-eight You are entitled to a full refund for the
                                        service.
                                    </li>
                                    <li>
                                        5-9 In the event that you cancel the audio or video session reservation with the
                                        doctor or psychiatrist before the session date Within 24 hours, you are entitled
                                        to a 70% refund , Only for the service .
                                    </li>
                                    <li>
                                        6-9 In the event that you cancel the audio or video session reservation with the
                                        psychiatrist or psychologist on the same day, you only have the right to change
                                        the appointment or choose another doctor or therapist.

                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <strong>Refund method:</strong> <br>
                        <ul>
                            <li>
                                1- If you want to change the session date or choose another doctor or psychotherapist
                                after
                                booking the first time and cancelling on the same day of session will be changed and the
                                doctor
                                or psychotherapist will be selected within 48 hours or will losing full service without
                                refund.
                            </li>
                            <li>

                                2- If the service has been paid by credit card, the money will be refunded within 10 to
                                15
                                working days, according to the bank’s system. Your credit account.
                            </li>
                            <li>
                                3- If the service has been paid through one of the Fawry outlets, a short text message
                                will be
                                sent containing a code, and it will be replaced from the nearest Fawry outlet to you.
                            </li>
                            <li>
                                4- If the service has been paid for via Vodafone Cash, the amount will be refunded to
                                your
                                wallet on the site for the possibility of booking one more time .
                            </li>
                            <li>


                                5- Our full responsibility lies towards our interested customers Obtaining all
                                psychological
                                care services provided ipersona.me from the site In full commitment to respect the user
                                requesting the service through our basic message and for better mental health according
                                to all
                                internationally recognized medical standards with Taking into account the provisions of
                                Law No.
                                71 of 2009 issued in a Egypt regarding the care of psychiatric patients.
                            </li>
                            <li>

                                6- Subject to the responsibilities provided by law that cannot be excluded, we or one of
                                its
                                employees shall not be liable to you as a result of any losses, damages, liabilities,
                                claims or
                                costs including but not limited to legal costs, defense fees or settlement costs in any
                                way or
                                arising out of access to ipersona.me by you due to your reliance on information provided
                                through
                                the Site, specialists Whether in contract or damage including negligence, law or
                                otherwise, we
                                are not responsible for any damage caused by any of the professionals
                                (psychiatrists/psychologist) through any agreement made between you and the doctor or
                                psychotherapist apart from the terms and standards of use in our site and services, as
                                this is a
                                violation of the use policy and the terms and conditions agreed upon .
                            </li>
                            <li>
                                7- We, the ipersona.me team, are always responsible for everything related to quality,
                                accuracy, and the specific purpose appropriate to the service. Psychological care and
                                psychotherapy services, except as required by law.
                            </li>
                            <li>
                                8- Based on the above and under the laws of copyright, trademarks and other property
                                rights in
                                force, we would like to inform you that the contents of the ipersona.me site, including
                                but not
                                limited to the source code, programs, specifications, images, marks and audio files are
                                protected by these laws, so you are not allowed to create what simulates content
                                ipersona.me in
                                any way without consent are legal from ipersona, It is also not permissible to use
                                illustrations, media (images, video clips, or audio sequences). If you print or download
                                any of
                                the above from ipersona.me - please stop and destroy Any copy you have due to violating
                                the
                                terms of use.
                            </li>
                            <li>
                                9- Users of ipersona.me respect the intellectual property rights of others, and the site
                                staff
                                has the right to remove any Content that proves a violation of the intellectual property
                                rights
                                of others.
                            </li>
                            <li>
                                10- In the event that there is a complaint regarding a violation of your intellectual
                                property
                                rights on the site or using it without No legal agreement must communicate With us
                                info@ipersona.me and attach:
                                1-10 A statement or official document proving your intellectual ownership of the
                                material
                                mentioned.
                            </li>
                            <li>
                                <ul>
                                    <li>
                                        2-10/ Detailed description with information that enables us to identify its
                                        website URL.
                                        3 - 15/ The title of existence of the material to which you have the right of
                                        ownership
                                        intellectual.
                                        4-15/ Data: Name of the intellectual property owner - No Contact phone -
                                        verified email -
                                        address zip.
                                    </li>
                                </ul>
                            </li>
                            <li>
                                11- if you send content on the interactive page owned by persona, the owner of the
                                ipersona.me
                                website, by sending it by e-mail or any other method, We would like to inform you that
                                iPersona
                                has the full right to use the content in any form and the user undertakes that this
                                article is
                                valid for publication on the Internet and agrees that if any third party takes any
                                compensation
                                action it is against the user and not against iPersona.
                            </li>
                            <li>
                                12- If any court or regulatory body decides that any rules From these terms and
                                conditions is
                                invalid or enforceable, it will be separated and deleted from the terms and conditions
                                of
                                ipersona.me, and the remaining terms and conditions will remain in force and effect.
                            </li>
                            <li>
                                13- These Terms and Conditions and persona company, the owner of ipersona.me , are
                                governed by
                                the law of the Arab Republic of Egypt.
                            </li>
                            <li>
                                14- Disputes can be dealt with by the courts Egyptian.
                            </li>
                            <li>
                                15- Terms and conditions apply between iPersona and its users, No one else has the right
                                to
                                benefit under these Terms and Conditions.
                            </li>
                            <li>
                                16- We, iPersona, reserve the right to terminate your use of the services of our website
                                if you
                                violate the Terms and conditions of ipersona.me
                            </li>
                        </ul>
                <p
                    style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:150%;font-size:15px;font-family:"Calibri","sans-serif";'>
                    <span style="font-size:19px;line-height:150%;">&nbsp;</span></p>
                @else
                <p> للوصول للموقع تطبق الشروط والأحكام التاليه  , بإستخدام موقعipersona.me  آي بيرسونا فإنك توافق علي أن تكون ملزم قانونيا بهذه الشروط والأحكام والتي تنتج آثارها فور إستخدامك لموقع  ipersona.me  آي بيرسونا , </p>

                        <p>إذا كنت لا توافق فلا يجب عليك أن تستخدم موقع ipersona.me  آي بيرسونا
شركة " بيرسونا للتسويق الإلكتروني " المالكه لموقع ipersona.me  آي بيرسونا تحتفظ بحقها في تغيير الشروط والأحكام والبنود الخاصه بسياسة الخصوصيه من وقت لآخر وبناء عليه يتعين علي المستخدم الإطلاع علي هذه الشروط والأحكام وسياسة الخصوصيه دوريا ً , سيتم الإكتفاء بالتنويه عن تاريخ آخر تحديث لشروط الإستخدام وسياسة الخصوصيه دون الحاجه للإتصال بالمستخدم ( أنت ) مباشرة أو إعلامك بأي تغييرات تم إجراؤها علي الشروط والأحكام وسياسة الخصوصيه .
نحن فريق عمل " آي بيرسونا " نرحب بكافة تعليقاتك من خلال نموذج التواصل معنا " إتصل بنا " أو info@ipersona.me  آي بيرسونا
 </p>
                        <ul style="text-align:right">
                            <li>
                            1/ موافقة الوالدين أو أحدهما أو ولي الأمر لمن هم أقل من 18 عام ( حسب التقويم الميلادي ) ويريدون إستخدام موقعipersona.me  آي بيرسونا سيتعين عليهم إرسال البريد الإلكتروني لأحد الوالدين أو ولي الأمر حتي يتمكن فريق ipersona من مخاطبتهم للتأكد والحصول علي الموافقه , وبناء عليه يلتزم الوالدان أو أحدهم أو ولي الأمر بمراقبة أنشطة أبنائهم المستخدمين لموقع ipersona.me  آي بيرسونا وأن يكونوا مسئولين عن تصرفاتهم مسئوليه كامله والإجراءات الصادرة منهم علي موقع ipersona.me  آي بيرسونا طالما أنهم لم يبلغوا سن الرشد وهو 18 عام بالتقويم الميلادي .
                            </li>
                            <li>
                                2/ تطبيقا ً لقانون حماية خصوصية الأطفال عبر الإنترنت في أي من المواقع أو التطبيقات فإنه إذا تبين لنا أو تم إبلاغنا أن عمر المستخدم أقل من السن القانونيه لإنشاء حساب علي ipersona.me  آي بيرسونا فسنقوم بعمل إيقاف مؤقت للحساب لحين الحصول علي موافقة ولي الأمر من خلال طلب عنوان البريد الإلكتروني الخاص بالوالدين او أحدهم أو ولي الأمر وذلك بما يتفق مع متطلبات قانون حماية خصوصية الاطفال عبر الإنترنت .
إذا كنت تعتقد أن طفلك يشارك في نشاط يقوم بجمع المعلومات الشخصيه , ولم يصلك أو يصل الوالد أو ولي الأمر بريد إلكتروني لإخطارك أو طلب موافقتك , يرجي عدم التردد في التواصل معنا عبرinfo@ipersona.me  آي بيرسونا

                            </li>
                            <li>
                                3/ بإستخدامك موقع ipersona.me  آي بيرسونا فهذا إقرار وتعهد منك بتمتعك بالحق والقدره القانونيه علي إستخدام موقع آي بيرسونا طبقا ًلقانون البلد التابع لها وعلي سبيل الإسترشاد دون الحصر يكون الحد الأدني للسن القانوني لإستخدام موقعipersona.me  آي بيرسونا
هو 18 عام بالتقويم الميلادي في جمهورية مصر العربيه و كذلك الدول العربيه – و 18 عام بالتقويم الميلادي في دولة الصين – و 16 عام في دولة هولندا – و 14 عام في ألمانيا و أستراليا و وكوريا الجنوبيه و إسبانيا و الولايات المتحده الامريكيه – و 13 سنه بالنسبه لباقي دول العالم .

                            </li>
                            <li>
                                4/ بإستخدامك موقع ipersona.me  آي بيرسونا فإنك توافق علي الإمتناع عن القيام أو المشاركه في الأمور التاليه ( سواء قمت أنت بها شخصيا ً أو من خلال طرف ثالث ) حيث بإستخدامك لموقعipersona.me  آي بيرسونا تتحمل المسئوليه الشخصيه والقانونيه في ( عدم نشر أو رفع أو إرسال أو توزيع أو تخزين أو إيجاد أو نشر بأي شكل من الأشكال أو التسبب في نشر علي موقع ipersona.me  آي بيرسونا بشكل مباشر أو غير مباشر عن طريق موقع إلكتروني للغير أي من الأمور التاليه ) :-
                            </li>
                            <li>
                                <ul>
                                    <li>
                                        1-4/ القيام بأي عمل يكون من شأنه التأثير علي تشغيل أو أمن موقع ipersona.me  آي بيرسونا .
                                    </li>
                                    <li>
                                        2-4/ التسبب في إزعاج غير منطقي أو الإساءه أو التعطيل لأي من المستخدمين الآخرين أو فريق عملipersona.me  آي بيرسونا
                                    </li>
                                    <li>
                                        3-4/ نقل حسابك الشخصي أو الصفحه التي تديرها علي موقع ipersona.me  آي بيرسونا إلي أي شخص دون إخطارنا بذلك والحصول علي إذن كتابي مسبق يسمح بذلك .
                                    </li>
                                    <li>
                                        4-4/ تطبيق هندسه عكسي أو جمع عكسي أو تفكيك أو أي عمل آخر بهدف إكتشاف رمز مصدري أو غيره من الصيغ الحسابيه أو المعالجات فيما يخص برنامج الحاسوب المستخدم في البنيه التحتيه والعمليات المتعلقه بموقعipersona.me  آي بيرسونا

                                        5-4/ إنتهاك حقوق خصوصية المستخدمين الآخرين أو جمع البيانات والمعلومات حول المستخدمين دون موافقتهم الصريحه سواء كان ذلك بشكل يدوي أو بإستخدام أي برمجيات آليه أو عنكبوتيه ( spider ) أو متسلله (crawler ) أو بحث في الموقع أو تطبيق إستعاده أو أي أجهزة أو عمليات آليه أخري لإختراق الموقع الإلكتروني أو إستعادة فهرس أو معلومات تنقيب البيانات .
                                    </li>
                                    <li>
                                        6-4/ تقديم معلومات شخصيه خاصه بشخص آخر ( الإسم / رقم التليفون / البريد الإلكتروني / الحاله المرضيه / أرقام بطاقات الإئتمان )
                                    </li>
                                    <li>
                                        7-4-  بث فيروسات أو بيانات مخربه أو أي ملفات الغرض منها التخريب والتعطيل وإلحاق الضرر بالموقع .
 تقديم محتوي أو روابط نعتبرها بناء علي حكمنا المطلق بأنه يشكل خطرا ً وضررا ًعلي موقع ipersona.me  آي بيرسونا أو يشكل خطرا ً  وضررا ًعلي بقية المستخدمين أو يعرضنا للمسائله القانونيه بأي شكل من الأشكال .

                                    </li>
                                </ul>
                            </li>
                            <li>

                                5/ بإستخدامك موقع ipersona.me  آي بيرسونا فهذا يعني الإلتزام بالقيم والمعايير الاخلاقيه والقانونيه فيما يتعلق بتقديم المحتوي أو ستتعرض للمسائله القانونيه وفيما يلي أنواع المحتوي المرفوضه والتي تعرضك للمسائله القانونيه :-
                            </li>
                            <li>
                                <ul>
                                    <li>
                                        1-5/ المحتوي الغير قانوني ويشمل التشهير , الذم , الإساءه لأي مجموعه دينيه أو أخلاقيه أو محتوي فاضح أو إباحي أو فاحش أو بذيء أو يحمل إيحاءات أو مضايقات أو تهديدات أو خرق لحقوق الخصوصيه والنشر
                                    </li>
                                    <li>
                                        2-5/ محتوي عنيف أو مثير للحساسيات أو إحتيالي أو غير مقبول بأي شكل من الأشكال .
                                    </li>
                                    <li>
                                        3-5/ محتوي يشجع أو يشكل أو يقدم تعليمات لمخالفه جرميه أو خرق حقوق أي طرف كان أو يتسبب بأي شكل من الأشكال في خرق القوانين المحليه
                                    </li>
                                    <li>
                                        4-5/ محتوي يتسبب في إزعاج أو مضايقة الآخرين .
                                    </li>
                                    <li>
                                        5-5/ محتوي لا تمتلكه أنت شخصيا ً دون إذن قانوني من مالك المحتوي الأصلي .
                                    </li>
                                    <li>
                                        6-5/ محتوي ينتحل شخصية او صفة أي شخص حقيقي أو إعتباري أو التسبب في إدعاء كاذب بتبعية لذلك الشخص الحقيقي أو الإعتباري بما في ذلك ipersona
                                    </li>
                                    <li>
                                        7-5/ الترويج لمواد غير مرغوبه أو الحملات السياسيه أو الإعلانات أو المسابقات أو السحوبات أو تقديم العروض
                                    </li>
                                    <li>
                                        2-5 Violent, sensitizing, fraudulent, or Not acceptable in any way.
                                    </li>
                                    <li>
                                        3-5 Content that encourages, constitutes, or provides instructions for violating
                                        it offense or infringement of the rights of any party whatsoever form in breach
                                        of local laws.
                                    </li>
                                    <li>
                                        4-5 Content that disturbs or annoys others.
                                    </li>
                                    <li>
                                        5-5 Content that you do not personally own without legal permission From the
                                        original content owner.
                                    </li>
                                    <li>
                                        6-5/ Content that impersonates the identity or description of any real person or
                                        deeming or creating a false claim in consequence thereof real or legal person
                                        including ipersona
                                    </li>
                                    <li>
                                        7-5/ Promote unwanted materials or political campaigns advertisements, contests,
                                        sweepstakes, or submissions offers.
                                    </li>
                                </ul>
                            </li>
                            <li>
                                6/ لا يتحمل موقع ipersona.me  آي بيرسونا مسئولية أو نقر أي محتوي ينشره المستخدمون , أو يرفعونه أو يبثونه أو يوزعونه أو يخزنونه أو يوجدونه أو ينشرونه بأي طريقة كانت أو يتسببون في نشره علي موقع ipersona.me  آي بيرسونا مباشرة او من خلال موقع إلكتروني للغير .
                            </li>
                            <li>
                                <ul>
                                    <li>
                                        2 - 6/ لا يتحمل موقع ipersona.me  آي بيرسونا مسئولية أي محتوي يتم نشره أو تخزينه أو رفعه في المجموعات أو الصفحه التفاعليه من قبلك أو من قبل أي طرف ثالث , كما لا نتحمل أي أضرار أو خسائر ناجمه عن ذلك .
                                    </li>
                                    <li>
                                        3-6 / لا يتحمل موقع ipersona.me  آي بيرسونا مسئولية : أي أخطاء , الذم , التشهير , السهو , الأكاذيب , الإساءه , الإباحيه , الشتائم التي قد تصادفك أثناء إستخدامك الصفحات التفاعليه
                                    </li>
                                    <li>
                                        4-6/ لا يتحمل موقع ipersona.me  آي بيرسونا مسئولية أي عبارات تحمل تعهدات علي الصفحات التفاعليه العامه , ويجب علي المستخدم تبليغنا فور حدوث إحدي أي من تلك التجاوزات حتي يتسني لنا إتخاذ الإجراءات اللازمه وفقا ً لتقديرنا .
                                    </li>
                                </ul>
                            </li>
                            <li>
                                7/ في حالة وجود شكاوي ناشئه عن المحتوي الذي قام مستخدم بنشره أو رفعه أو بثه أو توزيعه أو حفظه أو إيجاده أو تسبب بأي طريقة كانت في نشره علي موقع ipersona.me  آي بيرسونا  بشكل مباشر أو عن طريق موقع إلكتروني للغير فأنت توافق علي تقديم الشكوي ضد هذا المستخدم فقط وليس ضدنا نحن شركة ipersona
                            </li>
                            <li>
                                8/ أنت تلتزم بعدم إستخدام موقع ipersona.me  آي بيرسونا بأي طريقه تؤدي للتخريب أو تجاوز قدرة تحمل أجهزة الخادم servers  لدينا أو الشبكات المرتبطه بأي من خوادمنا وذلك نظرا لمحدودية قدرة أجهزة الخوادم وإستخدامها من قبل العديد من الأشخاص في جميع أنحاء العالم , كما يحذر من القيام بأي فعل من شأنه فرض حمل كبير بشكل غير منطقي أو غير مناسب مع البنيه التحتيه المتاحه أو النطاق الترددي لموقع ipersona.me  آي بيرسونا
                            </li>
                            <li>
                                9/ يقدم لك موقع ipersona.me  آي بيرسونا جميع خدمات العلاج النفسي لا سيما الرعايه النفسيه عن بعد المتمثله في المحادثات الكتابيه والمرئيه والمسموعه من خلال حجز جلسات نفسيه مع الأطباء والمعالجين النفسيين ويتم سداد الإشتراك بإحدي الطرق التاليه : -
                            </li>
                            <li>
                                <ul>
                                    <li>
                                        1-9 / البطاقات الإئتمانيه في جميع أنحاء العالم .
                                    </li>
                                    <li>
                                        2-9/ البطاقات الإلكترونيه ( منافذ فوري ) , و فودافون كاش جمهورية مصر العربيه .
                                    </li>
                                    <li>
                                        3 - 9/ بإشتراكك في أي من خدماتنا المقدمه لك من موقعنا ipersona.me  آي بيرسونا ووفقا ً لطريقة السداد في إشتراك الخدمه فأنت توافق بذلك علي سياسة الإسترداد وهي كالتالي :-
                                    </li>
                                    <li>
                                        4-9/ في حالة قيامك بإلغاء حجز الجلسه مع الطبيب أو المعالج النفسي عن طريق المحادثه الصوتيه أو المرئيه قبل بدء ميعاد الجلسه كحد أقصي بثماني وأربعون 48 ساعه يحق لك إسترداد مقابل الخدمه بالكامل .
                                    </li>
                                    <li>
                                        5-9/ في حالة قيامك بإلغاء حجز الجلسه الصوتيه أو المرئيه مع الطبيب أو المعالج النفسي قبل ميعاد الجلسه بأربعه وعشرون 24 ساعه يحق لك إسترداد 70 % فقط من مقابل الخدمه .
                                    </li>
                                    <li>
                                        6-9/ في حالة قيامك بإلغاء حجز الجلسه الصوتيه أو المرئيه مع الطبيب أو المعالج النفسي في نفس اليوم يحق لك فقط تغيير الميعاد أو إختيار طبيب أو معالج نفسي آخر .

                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <p style="text-align:right"><strong>طريقة الإسترداد :-</strong> <br></p>
                        <ul style="text-align:right">
                            <li>
                                1/ في حالة الرغبه في تغيير ميعاد الجلسه أو إختيار طبيب آخر او معالج نفسي آخر بعد الحجز أول مرة والإلغاء في نفس اليوم , يتم تغيير ميعاد الجلسه وإختيار الطبيب أو المعالج النفسي خلال 48 ساعه أو سيتم خصم مقابل الخدمه كاملا ً بلا إسترداد
                            </li>
                            <li>

                                2/ إذا كان قد تم دفع مقابل الخدمه عن طريق البطاقه الإئتمانيه credit card , سيتم إسترداد الأموال خلال من 10 إلي 15 يوم عمل حسب نظام البنك التابع له حسابك الإئتماني
                            </li>
                            <li>
                                3/ إذا كان قد تم دفع مقابل الخدمه عن طريق أحد منافذ فوري يتم إرسال رساله نصيه قصيره تحتوي علي كود ويتم إستبداله من أقرب منفذ من منافذ فوري لك .
                            </li>
                            <li>
                                4/ إذا كان قد تم دفع مقابل الخدمه عن طريق فودافون كاش يتم رد المبلغ لمحفظتك بالموقع لإمكانية الحجز مرة أخري
                            </li>
                            <li>


                                5/ تكمن مسئوليتنا الكامله تجاه عملائنا المهتمون بالحصول علي جميع خدمات الرعايه النفسيه المقدمه من موقع ipersona.me  آي بيرسونا
في الإلتزام الكامل بإحترام المستخدم طالب الخدمه من خلال رسالتنا الأساسيه ومن اجل صحه نفسيه أفضل وفق جميع المعايير الطبيه المتعارف عليها دوليا ً مع مراعاة أحكام القانون رقم 71 لسنة 2009 الصادر في مصر بشأن رعاية المرضي النفسيين
s.
                            </li>
                            <li>

                                6/ وفقا ً للمسئوليات المنصوص عليها في القانون والتي لا يمكن إستبعادها لا نتحمل نحن شركة بيرسونا للتسويق الإلكتروني أو أحد موظفيها مسئوليه تجاهك نتيجة أي خسائر او أضرار أو مسئوليات أو مطالبات أو تكاليف بما في ذلك علي سبيل المثال لا الحصر التكاليف القانونيه ورسوم الدفاع أو تكاليف التسويه بأي طريقة كانت أو ناشئه بسبب الوصول إلي ipersona.me  آي بيرسونا بواسطتك بسبب إعتمادك علي المعلومات المقدمه من خلال الموقع أو المتخصصين أو مواقع الويب الأخري أو خدمات الآخرين بأي طريقة كانت سواء في العقد أو الضرر بما في ذلك الإهمال أو القانون أو غير ذلك , نحن لسنا مسئولين عن أي ضرر يسببه أي من المهنيين ( الأطباء / المعالجين النفسيين ) من خلال أي إتفاق قد تم بينك وبين الطبيب أو المعالج النفسي بعيدا ً عن شروط ومعايير إستخدام موقعنا وخدماتنا , لان هذا يعد خرق لسياسة الإستخدام والشروط والأحكام المتفق عليها من كلا الطرفين المستخدم والطبيب او المعالج النفسي
                            </li>
                            <li>
                                7/ نحن فريق عمل ipersona.me  آي بيرسونا نتحمل المسئوليه دائما ً وأبدا ً عن كل مايتعلق بالجوده والدقه والغرض المحدد المناسب للخدمه وملتزمون بالسعي دائما ً لتطوير خدماتنا من أجلك وتقديم جميع خدمات الرعايه النفسيه والعلاج النفسي بإستثناء ما يلزم بموجب القانون .
                            </li>
                            <li>
                                8/ بناء علي ماسبق ذكره وبموجب قوانين حقوق النشر والعلامات التجاريه وحقوق الملكيه الأخري المعمول بها فنود إعلامك بأن محتويات موقع ipersona.me  آي بيرسونا علي سبيل المثال لا الحصر كود المصدر والبرامج والمواصفات والصور والعلامات والملفات الصوتيه محميه بموجب هذه القوانين , لذلك لا يسمح لك بإنشاء ما يحاكي محتوي موقعipersona.me  آي بيرسونا بأي طريقه كانت بدون موافقه قانونيه من شركة بيرسونا للتسويق الإلكتروني كما لا يجوز إستخدام الرسوم التوضيحيه أو الوسائط ( الصور ومقاطع الفيديو ) أو التسلسلات الصوتيه وفي حالة طباعة أو تنزيل أي مما سبق من موقعipersona.me  آي بيرسونا – يرجي التوقف وإتلاف أي نسخه لديك نظرا ً لإنتهاكك شروط الإستخدام
                            </li>

                            <li>
                                9/ إحترام المستخدمين لموقعipersona.me  آي بيرسونا حقوق الملكيه الفكريه للآخرين ويحق لموظفو الموقع إزالة أي محتوي يثبت إنتهاكه لحقوق الملكيه الفكريه للآخرين
                            </li>
                            <li>
                                10/ في حالة وجود شكوي بخصوص إنتهاك لحقوق ملكية فكريه خاصه بك علي الموقع أو إستخدامها بدون موافقه قانونيه يجب التواصل معناinfo@ipersona.me  آي بيرسونا وإرفاق :-
                            </li>
                            <li>
                                <ul>
                                    <li>
                                        2-10/ بيان أو وثيقه رسميه تثبت ملكيتك الفكريه للماده المذكورة
                                        3 - 10/ وصف تفصيلي مع معلومات تمكننا من تحديد موقعهاURL
                                        .
                                        4-10/ عنوان وجود الماده التي لديك حق ملكيتها الفكريه .
                                        5-10/ ع/ بيانات : إسم صاحب الملكيه الفكريه – رقم تليفون للتواصل – بريد إلكتروني موثق – العنوان البريدي                                    </li>
                                </ul>
                            </li>
                            <li>
                                11- / في حالة قيامك بإرسال محتوي علي الصفحه التفاعليه المملوكه لشركة بيرسونا للتسويق الإلكتروني المالكه لموقعipersona.me  آي بيرسونا عن طريق إرساله في البريد الإلكتروني أو أي طريقه أخري , فنود إعلامك بأن شركة بيرسونا للتسويق الإلكتروني لها كامل الحق في إستخدام المحتوي بأي شكل ويتعهد المستخدم بأن هذه المقاله صالحه للنشر علي الإنترنت ويوافق بأن إذا إتخذ أي طرف ثالث أي إجراء تعويض يكون ضد المستخدم وليس ضد شركة بيرسونا للتسويق الإلكتروني .
                            </li>
                            <li>
                                12/ إذا أقرت أي محكمه أو جهه تنظيميه أن أي حكم من هذه الشروط والأحكام غير صالح أو قابل للتنفيذ فسيتم فصله وحذفه من الشروط والأحكام الخاصه بشركة بيرسونا للتسويق الإلكتروني وسيظل سريان المفعول والتأثير لباقي الشروط والأحكام .
                            </li>
                            <li>
                                13/ تخضع هذه الشروط والأحكام وشركة بيرسونا للتسويق الإلكتروني المالكه لموقعipersona.me  آي بيرسونا لقانون جمهورية مصر العربيه
                            </li>
                            <li>
                                14- / يمكن التعامل مع المنازعات من قبل المحاكم المصريه .
                            </li>
                            <li>
                                15/ تطبق الشروط والأحكام بين شركة بيرسونا للتسويق الإلكتروني وبين مستخدمينها ولا يحق لأي شخص آخر الإستفاده بموجب هذه الشروط والأحكام
                            </li>
                            <li>
                                16/ نحن شركة بيرسونا للتسويق الإلكتروني نحتفظ بالحق في إنهاء إستخدامك لخدمات موقعنا إذا قمت بإنتهاك الشروط والأحكام الخاصه بموقعipersona.me  آي بيرسونا
                            </li>
                        </ul>
                <p
                    style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:150%;font-size:15px;font-family:"Calibri","sans-serif";'>
                    <span style="font-size:19px;line-height:150%;">&nbsp;</span></p>
                @endif

            </div>

        </div>
    </div>
</main>





@endsection
