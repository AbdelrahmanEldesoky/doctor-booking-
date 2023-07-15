<!DOCTYPE html>

<head>
    <title>Ipersona Meetings Sessions</title>
    <meta charset="utf-8" />
    <link type="text/css" rel="stylesheet" href="https://source.zoom.us/2.9.5/css/bootstrap.css" />
    <link type="text/css" rel="stylesheet" href="https://source.zoom.us/2.9.5/css/react-select.css" />
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, initial-scale=1" />


</head>

<body>
    <style>
        .sdk-select {
            height: 34px;
            border-radius: 4px;
        }

        .websdktest button {
            float: right;
            margin-left: 5px;
        }

        #nav-tool {
            margin-bottom: 0px;
        }

        #show-test-tool {
            position: absolute;
            top: 100px;
            left: 0;
            display: block;
            z-index: 99999;
        }

        #display_name {
            width: 250px;
        }


        #websdk-iframe {
            width: 700px;
            height: 500px;
            border: 1px;
            border-color: red;
            border-style: dashed;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            left: 50%;
            margin: 0;
        }
    </style>

    <h2 style="text-align: center">Your meeting is being started...</h2>

    <nav id="nav-tool" class="navbar navbar-inverse navbar-fixed-top" style="display: none;">
        <div class="container">
            <div id="navbar" class="websdktest">
                <form class="navbar-form navbar-right" id="meeting_form">
                    <div class="form-group">
                        <input type="text" name="display_name" id="display_name" value="{{ $data['name'] }}"
                            maxLength="100" placeholder="Name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="meeting_number" id="meeting_number" value="{{ $data['mn'] }}"
                            maxLength="200" style="width:150px" placeholder="Meeting Number" class="form-control"
                            required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="meeting_pwd" id="meeting_pwd" value="1234567890" style="width:150px"
                            maxLength="32" placeholder="Meeting Password" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="text" name="meeting_email" id="meeting_email" value="{{ $data['email'] }}"
                            style="width:150px" maxLength="32" placeholder="Email option" class="form-control">
                    </div>

                    <div class="form-group">
                        <select id="meeting_role" class="sdk-select">
                            <option selected value=0>Attendee</option>
                            <option value=1>Host</option>
                            <option value=5>Assistant</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select id="meeting_china" class="sdk-select">
                            <option selected value=0>Global</option>
                            <option value=1>China</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select id="meeting_lang" class="sdk-select">
                            <option selected value="en-US">English</option>
                        </select>
                    </div>

                    <input type="hidden" value="" id="copy_link_value" />
                    <button type="submit" class="btn btn-primary" id="join_meeting">Join</button>


                </form>
            </div>
            <!--/.navbar-collapse -->
        </div>
    </nav>




    <script src="https://source.zoom.us/2.9.5/lib/vendor/react.min.js"></script>
    <script src="https://source.zoom.us/2.9.5/lib/vendor/react-dom.min.js"></script>
    <script src="https://source.zoom.us/2.9.5/lib/vendor/redux.min.js"></script>
    <script src="https://source.zoom.us/2.9.5/lib/vendor/redux-thunk.min.js"></script>
    <script src="https://source.zoom.us/2.9.5/lib/vendor/lodash.min.js"></script>
    <script src="https://source.zoom.us/zoom-meeting-2.9.5.min.js"></script>
    <script src="{{ asset('zoom') }}/js/tool.js"></script>
    <script src="{{ asset('zoom') }}/js/vconsole.min.js"></script>

    <script>
        window.addEventListener('DOMContentLoaded', function(event) {
            console.log('DOM fully loaded and parsed');
            websdkready();
          });

          function websdkready() {
            var testTool = window.testTool;
            if (testTool.isMobileDevice()) {
              vConsole = new VConsole();
            }
            console.log("checkSystemRequirements");
            console.log(JSON.stringify(ZoomMtg.checkSystemRequirements()));

            // it's option if you want to change the WebSDK dependency link resources. setZoomJSLib must be run at first
            // if (!china) ZoomMtg.setZoomJSLib('https://source.zoom.us/2.6.0/lib', '/av'); // CDN version default
            // else ZoomMtg.setZoomJSLib('https://jssdk.zoomus.cn/2.6.0/lib', '/av'); // china cdn option
            // ZoomMtg.setZoomJSLib('http://localhost:9999/node_modules/@zoomus/websdk/dist/lib', '/av'); // Local version default, Angular Project change to use cdn version
            ZoomMtg.preLoadWasm(); // pre download wasm file to save time.

            var SDK_KEY = "{{ config('zoom.ZOOM_SDK_CLIENT_KEY') }}";
            /**
             * NEVER PUT YOUR ACTUAL SDK SECRET IN CLIENT SIDE CODE, THIS IS JUST FOR QUICK PROTOTYPING
             * The below generateSignature should be done server side as not to expose your SDK SECRET in public
             * You can find an eaxmple in here: https://marketplace.zoom.us/docs/sdk/native-sdks/web/essential/signature
             */
            var SDK_SECRET = "{{ config('zoom.ZOOM_SDK_CLIENT_SECRET') }}";

            // some help code, remember mn, pwd, lang to cookie, and autofill.



            // click join meeting button
            document
              .getElementById("join_meeting")
              .addEventListener("click", function (e) {
                e.preventDefault();
                var meetingConfig = testTool.getMeetingConfig();
                if (!meetingConfig.mn || !meetingConfig.name) {
                  alert("Meeting number or username is empty");
                  return false;
                }


                testTool.setCookie("meeting_number", meetingConfig.mn);
                testTool.setCookie("meeting_pwd", meetingConfig.pwd);

                var signature = ZoomMtg.generateSDKSignature({
                  meetingNumber: meetingConfig.mn,
                  sdkKey: SDK_KEY,
                  sdkSecret: SDK_SECRET,
                  role: meetingConfig.role,
                  success: function (res) {
                    console.log(res.result);
                    meetingConfig.signature = res.result;
                    meetingConfig.sdkKey = SDK_KEY;
                    var joinUrl = "{{ route('zoom.meeting') }}?" + testTool.serialize(meetingConfig);
                    location.href = joinUrl
                  },
                });
              });



          }


    </script>


    <script>
        setTimeout(() => {
            document.getElementById("join_meeting").click();
        }, "2000")
    </script>

</body>

</html>
