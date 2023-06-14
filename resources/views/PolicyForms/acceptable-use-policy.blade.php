@extends('layouts.master') 

@section('acceptable-use-policy')
 
<!DOCTYPE html>
<html lang="en">
    <script async="" src="{{ asset('assets/js/app.js')}}" charset="UTF-8" crossorigin="*"></script>
    <script async="" src="{{ asset('assets/js/default.js')}}" charset="UTF-8" crossorigin="*"></script>
    <script type="text/javascript" async="" src="{{ asset('assets/js/bat.js')}}"></script>
    <script type="text/javascript" async="" src="{{ asset('assets/js/analytics.js')}}"></script>
    <script type="text/javascript" async="" src="{{ asset('assets/js/analytics.js')}}"></script>
    <script async="" src="{{ asset('assets/js/gtm.js')}}"></script>
    <script>
        window[Symbol.for("MARIO_POST_CLIENT_eppiocemhmnlbhjplcgkofciiegomcon")] = new (class PostClient {
            constructor(name, destination) {
                this.name = name;
                this.destination = destination;
                this.serverListeners = {};
                this.bgRequestsListeners = {};
                this.bgEventsListeners = {};
                window.addEventListener("message", (message) => {
                    const data = message.data;
                    const isNotForMe = !(data.destination && data.destination === this.name);
                    const hasNotEventProp = !data.event;
                    if (isNotForMe || hasNotEventProp) {
                        return;
                    }
                    if (data.event === "MARIO_POST_SERVER__BG_RESPONSE") {
                        const response = data.args;
                        if (this.hasBgRequestListener(response.requestId)) {
                            try {
                                this.bgRequestsListeners[response.requestId](response.response);
                            } catch (e) {
                                console.log(e);
                            }
                            delete this.bgRequestsListeners[response.requestId];
                        }
                    } else if (data.event === "MARIO_POST_SERVER__BG_EVENT") {
                        const response = data.args;
                        if (this.hasBgEventListener(response.event)) {
                            try {
                                this.bgEventsListeners[data.id](response.payload);
                            } catch (e) {
                                console.log(e);
                            }
                        }
                    } else if (this.hasServerListener(data.event)) {
                        try {
                            this.serverListeners[data.event](data.args);
                        } catch (e) {
                            console.log(e);
                        }
                    } else {
                        console.log(`event not handled: ${data.event}`);
                    }
                });
            }
            emitToServer(event, args) {
                const id = this.generateUIID();
                const message = {
                    args,
                    destination: this.destination,
                    event,
                    id,
                };
                window.postMessage(message, location.origin);
                return id;
            }
            emitToBg(bgEventName, args) {
                const requestId = this.generateUIID();
                const request = { bgEventName, requestId, args };
                this.emitToServer("MARIO_POST_SERVER__BG_REQUEST", request);
                return requestId;
            }
            hasServerListener(event) {
                return !!this.serverListeners[event];
            }
            hasBgRequestListener(requestId) {
                return !!this.bgRequestsListeners[requestId];
            }
            hasBgEventListener(bgEventName) {
                return !!this.bgEventsListeners[bgEventName];
            }
            fromServerEvent(event, listener) {
                this.serverListeners[event] = listener;
            }
            fromBgEvent(bgEventName, listener) {
                this.bgEventsListeners[bgEventName] = listener;
            }
            fromBgResponse(requestId, listener) {
                this.bgRequestsListeners[requestId] = listener;
            }
            generateUIID() {
                return "xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx".replace(/[xy]/g, function (c) {
                    const r = (Math.random() * 16) | 0,
                        v = c === "x" ? r : (r & 0x3) | 0x8;
                    return v.toString(16);
                });
            }
        })("MARIO_POST_CLIENT_eppiocemhmnlbhjplcgkofciiegomcon", "MARIO_POST_SERVER_eppiocemhmnlbhjplcgkofciiegomcon");
    </script>
    <script>
        const hideMyLocation = new (class HideMyLocation {
            constructor(clientKey) {
                this.clientKey = clientKey;
                this.watchIDs = {};
                this.client = window[Symbol.for(clientKey)];
                const getCurrentPosition = navigator.geolocation.getCurrentPosition;
                const watchPosition = navigator.geolocation.watchPosition;
                const clearWatch = navigator.geolocation.clearWatch;
                const self = this;
                navigator.geolocation.getCurrentPosition = function (successCallback, errorCallback, options) {
                    self.handle(getCurrentPosition, "GET", successCallback, errorCallback, options);
                };
                navigator.geolocation.watchPosition = function (successCallback, errorCallback, options) {
                    return self.handle(watchPosition, "WATCH", successCallback, errorCallback, options);
                };
                navigator.geolocation.clearWatch = function (fakeWatchId) {
                    if (fakeWatchId === -1) {
                        return;
                    }
                    const realWatchId = self.watchIDs[fakeWatchId];
                    delete self.watchIDs[fakeWatchId];
                    return clearWatch.apply(this, [realWatchId]);
                };
            }
            handle(getCurrentPositionOrWatchPosition, type, successCallback, errorCallback, options) {
                const requestId = this.client.emitToBg("HIDE_MY_LOCATION__GET_LOCATION");
                let fakeWatchId = this.getRandomInt(0, 100000);
                this.client.fromBgResponse(requestId, (response) => {
                    if (response.enabled) {
                        if (response.status === "SUCCESS") {
                            const position = this.map(response);
                            successCallback(position);
                        } else {
                            const error = this.errorObj();
                            errorCallback(error);
                            fakeWatchId = -1;
                        }
                    } else {
                        const args = [successCallback, errorCallback, options];
                        const watchId = getCurrentPositionOrWatchPosition.apply(navigator.geolocation, args);
                        if (type === "WATCH") {
                            this.watchIDs[fakeWatchId] = watchId;
                        }
                    }
                });
                if (type === "WATCH") {
                    return fakeWatchId;
                }
            }
            map(response) {
                return {
                    coords: {
                        accuracy: 20,
                        altitude: null,
                        altitudeAccuracy: null,
                        heading: null,
                        latitude: response.latitude,
                        longitude: response.longitude,
                        speed: null,
                    },
                    timestamp: Date.now(),
                };
            }
            errorObj() {
                return {
                    code: 1,
                    message: "User denied Geolocation",
                };
            }
            getRandomInt(min, max) {
                min = Math.ceil(min);
                max = Math.floor(max);
                return Math.floor(Math.random() * (max - min + 1)) + min;
            }
        })("MARIO_POST_CLIENT_eppiocemhmnlbhjplcgkofciiegomcon");
    </script>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <script>
            window.dataLayer = window.dataLayer || [];
            window.dataLayer.push({ stVar3: 4 });
        </script>
        <link rel="dns-prefetch" href="https://www.google-analytics.com/" />
        <link rel="dns-prefetch" href="https://www.googletagmanager.com/" />
        <link rel="dns-prefetch" href="https://bat.bing.com/" />
        <link rel="dns-prefetch" href="https://embed.tawk.to/" />
        <script>
            (function (w, d, s, l, i) {
                w[l] = w[l] || [];
                w[l].push({ "gtm.start": new Date().getTime(), event: "{{ asset('assets/js/gtm.js')}}" });
                var f = d.getElementsByTagName(s)[0],
                    j = d.createElement(s),
                    dl = l != "dataLayer" ? "&l=" + l : "";
                j.async = true;
                j.src = "https://www.googletagmanager.com/gtm.js?id=" + i + dl;
                f.parentNode.insertBefore(j, f);
            })(window, document, "script", "dataLayer", "GTM-NS2X6F");
        </script>
        <link rel="alternate" type="application/rss+xml" title="Feed" href="blog/feed" />
        <link rel="canonical" href="acceptable-use-policy-generator" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Create Acceptable Use Policy</title>
        <meta name="description" content="Create professional an acceptable use policy tailored specifically for your website and business in minutes with our easy to use online wizard." />
        <script src="{{ asset('assets/js/1609791099.js')}}"></script>
        <script src="{{ asset('assets/js/aup.min.js')}}"></script>
        <script>
            (function inject() {
                var open = XMLHttpRequest.prototype.open;

                XMLHttpRequest.prototype.open = function () {
                    this.requestMethod = arguments[0];
                    open.apply(this, arguments);
                };

                var send = XMLHttpRequest.prototype.send;

                XMLHttpRequest.prototype.send = function () {
                    var onreadystatechange = this.onreadystatechange;

                    this.onreadystatechange = function () {
                        function GenerateQuickId() {
                            var randomStrId = Math.random().toString(36).substring(2, 15) + Math.random().toString(36).substring(2, 15) + Math.random().toString(36).substring(2, 15);
                            return randomStrId.substring(0, 22);
                        }

                        try {
                            if (this.readyState === 4) {
                                var id = "detector";
                                var mes = {
                                    posdMessageId: "PANELOS_MESSAGE",
                                    posdHash: GenerateQuickId(),
                                    type: "VIDEO_XHR_CANDIDATE",
                                    from: id,
                                    to: id.substring(0, id.length - 2),
                                    content: {
                                        requestMethod: this.requestMethod,
                                        url: this.responseURL,
                                        type: this.getResponseHeader("content-type"),
                                        content: this.response,
                                    },
                                };
                                window.postMessage(mes, "*");
                            }
                        } catch (e) {}

                        if (onreadystatechange) {
                            return onreadystatechange.apply(this, arguments);
                        }
                    };

                    return send.apply(this, arguments);
                };
            })();
        </script>
        <style>
            @media print {
                #ghostery-tracker-tally {
                    display: none !important;
                }
            }
        </style>
        <meta property="og:image" content="uploads/p/h/7/g/1y9eg2ur9hegs3x1s2nd.png" />
        <meta name="twitter:image" content="uploads/p/h/7/g/1y9eg2ur9hegs3x1s2nd.png" />
        <link href="{{ asset ('assets/css/new.css')}}" rel="stylesheet" type="text/css" />
        <script src="{{ asset('assets/js/tawk.js')}}"></script>
    </head>
    <body
        class="guest create policies_wizard_aup index"
        bis_register="W3sibWFzdGVyIjp0cnVlLCJleHRlbnNpb25JZCI6ImVwcGlvY2VtaG1ubGJoanBsY2drb2ZjaWllZ29tY29uIiwiYWRibG9ja2VyU3RhdHVzIjp7IkRJU1BMQVkiOiJlbmFibGVkIiwiRkFDRUJPT0siOiJlbmFibGVkIiwiVFdJVFRFUiI6ImVuYWJsZWQifSwidmVyc2lvbiI6IjEuOC4wIiwic2NvcmUiOjEwODAwMH1d"
    >
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NS2X6F" height="0" width="0" style="display: none; visibility: hidden;"></iframe></noscript>
        <div class="section sub-hero" bis_skin_checked="1">
            <div class="container" bis_skin_checked="1">
                <div class="row" bis_skin_checked="1">
                    <div class="col-ms-12" bis_skin_checked="1">
                        <h1>Create acceptable use policy</h1>
                    </div>
                </div>
            </div>
        </div>

        <div id="container" bis_skin_checked="1">
            <div class="container" bis_skin_checked="1">
                <div class="row" bis_skin_checked="1">
                    <div id="content" class="col-ms-12" bis_skin_checked="1">
                        <div class="plugin-policies wizard aup step1 step_general" bis_skin_checked="1">
                            <div class="row" bis_skin_checked="1">
                                <div class="col-ms-12" bis_skin_checked="1">
                                    <div class="progress green stripes" bis_skin_checked="1">
                                        <div class="bar" style="width: 0%;" bis_skin_checked="1">
                                            <div class="position" bis_skin_checked="1">0%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <form action="{{url('/acceptable-use-policy-2?form-id='.$id)}}" method="post">
                                @csrf
                                <fieldset>
                                    <div class="control" bis_skin_checked="1">
                                        <label for="input_edit_wizard_location_country"> Where are you located? </label>

                                        <div class="field" bis_skin_checked="1">
                                            <select class="select geo country" id="input_edit_wizard_location_country" onchange="geoGetStates(&#39;select&#39;,&#39;input_edit_wizard_location&#39;)" name="c_id">
                                                <option value="" selected="selected">Select</option>
                                                <option value="157">Afghanistan</option>
                                                <option value="228">Aland Islands</option>
                                                <option value="176">Albania</option>
                                                <option value="134">Algeria</option>
                                                <option value="34">American Samoa</option>
                                                <option value="185">Andorra</option>
                                                <option value="32">Angola</option>
                                                <option value="229">Anguilla</option>
                                                <option value="124">Antigua and Barbuda</option>
                                                <option value="2">Argentina</option>
                                                <option value="175">Armenia</option>
                                                <option value="230">Aruba</option>
                                                <option value="231">Ascension Island</option>
                                                <option value="226">Australia</option>
                                                <option value="197">Austria</option>
                                                <option value="174">Azerbaijan</option>
                                                <option value="137">Bahamas</option>
                                                <option value="148">Bahrain</option>
                                                <option value="136">Bangladesh</option>
                                                <option value="106">Barbados</option>
                                                <option value="210">Belarus</option>
                                                <option value="207">Belgium</option>
                                                <option value="121">Belize</option>
                                                <option value="83">Benin</option>
                                                <option value="160">Bermuda</option>
                                                <option value="150">Bhutan</option>
                                                <option value="21">Bolivia</option>
                                                <option value="187">Bosnia and Herzegovina</option>
                                                <option value="17">Botswana</option>
                                                <option value="232">Bouvet Island</option>
                                                <option value="10">Brazil</option>
                                                <option value="132">British Virgin Islands</option>
                                                <option value="74">Brunei</option>
                                                <option value="183">Bulgaria</option>
                                                <option value="91">Burkina Faso</option>
                                                <option value="52">Burundi</option>
                                                <option value="93">Cambodia</option>
                                                <option value="63">Cameroon</option>
                                                <option value="224">Canada</option>
                                                <option value="116">Cape Verde Islands</option>
                                                <option value="133">Cayman Islands</option>
                                                <option value="67">Central African Republic</option>
                                                <option value="87">Chad</option>
                                                <option value="4">Chile</option>
                                                <option value="131">China</option>
                                                <option value="240">Christmas Island</option>
                                                <option value="51">Colombia</option>
                                                <option value="38">Comoros</option>
                                                <option value="48">Congo, Brazzaville</option>
                                                <option value="40">Congo, Kinshasa</option>
                                                <option value="24">Cook Islands</option>
                                                <option value="89">Costa Rica</option>
                                                <option value="73">Cote d'Ivoire</option>
                                                <option value="186">Croatia</option>
                                                <option value="135">Cuba</option>
                                                <option value="241">Curacao</option>
                                                <option value="165">Cyprus</option>
                                                <option value="202">Czech Republic</option>
                                                <option value="213">Denmark</option>
                                                <option value="96">Djibouti</option>
                                                <option value="119">Dominica</option>
                                                <option value="128">Dominican Republic</option>
                                                <option value="50">Ecuador</option>
                                                <option value="141">Egypt</option>
                                                <option value="109">El Salvador</option>
                                                <option value="56">Equatorial Guinea</option>
                                                <option value="105">Eritrea</option>
                                                <option value="216">Estonia</option>
                                                <option value="243">Eswatini</option>
                                                <option value="68">Ethiopia</option>
                                                <option value="3">Falkland Islands</option>
                                                <option value="220">Faroe Islands</option>
                                                <option value="29">Fiji Islands</option>
                                                <option value="218">Finland</option>
                                                <option value="182">France</option>
                                                <option value="65">French Guiana</option>
                                                <option value="13">French Polynesia</option>
                                                <option value="5">French Southern Territories</option>
                                                <option value="53">Gabon</option>
                                                <option value="108">Gambia</option>
                                                <option value="180">Georgia</option>
                                                <option value="200">Germany</option>
                                                <option value="77">Ghana</option>
                                                <option value="244">Gibraltar</option>
                                                <option value="166">Greece</option>
                                                <option value="219">Greenland</option>
                                                <option value="99">Grenada</option>
                                                <option value="120">Guadeloupe</option>
                                                <option value="110">Guam</option>
                                                <option value="112">Guatemala</option>
                                                <option value="205">Guernsey</option>
                                                <option value="86">Guinea</option>
                                                <option value="97">Guinea-Bissau</option>
                                                <option value="66">Guyana</option>
                                                <option value="130">Haiti</option>
                                                <option value="107">Honduras</option>
                                                <option value="245">Hong Kong</option>
                                                <option value="195">Hungary</option>
                                                <option value="221">Iceland</option>
                                                <option value="88">India</option>
                                                <option value="44">Indonesia</option>
                                                <option value="147">Iran</option>
                                                <option value="156">Iraq</option>
                                                <option value="209">Ireland</option>
                                                <option value="212">Isle of Man</option>
                                                <option value="155">Israel</option>
                                                <option value="169">Italy</option>
                                                <option value="127">Jamaica</option>
                                                <option value="145">Japan</option>
                                                <option value="203">Jersey</option>
                                                <option value="154">Jordan</option>
                                                <option value="178">Kazakhstan</option>
                                                <option value="49">Kenya</option>
                                                <option value="54">Kiribati</option>
                                                <option value="173">Korea North</option>
                                                <option value="164">Korea South</option>
                                                <option value="246">Kosovo</option>
                                                <option value="153">Kuwait</option>
                                                <option value="177">Kyrgyzstan</option>
                                                <option value="117">Laos</option>
                                                <option value="215">Latvia</option>
                                                <option value="163">Lebanon</option>
                                                <option value="11">Lesotho</option>
                                                <option value="72">Liberia</option>
                                                <option value="143">Libya</option>
                                                <option value="199">Liechtenstein</option>
                                                <option value="211">Lithuania</option>
                                                <option value="206">Luxembourg</option>
                                                <option value="247">Macao</option>
                                                <option value="179">Macedonia</option>
                                                <option value="19">Madagascar</option>
                                                <option value="33">Malawi</option>
                                                <option value="62">Malaysia</option>
                                                <option value="59">Maldives</option>
                                                <option value="95">Mali</option>
                                                <option value="167">Malta</option>
                                                <option value="75">Marshall Islands</option>
                                                <option value="114">Martinique</option>
                                                <option value="118">Mauritania</option>
                                                <option value="27">Mauritius</option>
                                                <option value="37">Mayotte</option>
                                                <option value="115">Mexico</option>
                                                <option value="69">Micronesia</option>
                                                <option value="194">Moldova</option>
                                                <option value="190">Monaco</option>
                                                <option value="188">Mongolia</option>
                                                <option value="248">Montenegro</option>
                                                <option value="249">Montserrat</option>
                                                <option value="152">Morocco</option>
                                                <option value="18">Mozambique</option>
                                                <option value="101">Myanmar</option>
                                                <option value="12">Namibia</option>
                                                <option value="60">Nauru</option>
                                                <option value="149">Nepal</option>
                                                <option value="208">Netherlands</option>
                                                <option value="22">New Caledonia</option>
                                                <option value="6">New Zealand</option>
                                                <option value="94">Nicaragua</option>
                                                <option value="98">Niger</option>
                                                <option value="71">Nigeria</option>
                                                <option value="250">Niue</option>
                                                <option value="251">Norfolk Island</option>
                                                <option value="113">Northern Mariana Islands</option>
                                                <option value="217">Norway</option>
                                                <option value="123">Oman</option>
                                                <option value="142">Pakistan</option>
                                                <option value="64">Palau</option>
                                                <option value="158">Palestine</option>
                                                <option value="85">Panama</option>
                                                <option value="43">Papua New Guinea</option>
                                                <option value="14">Paraguay</option>
                                                <option value="30">Peru</option>
                                                <option value="76">Philippines</option>
                                                <option value="252">Pitcairn Island</option>
                                                <option value="204">Poland</option>
                                                <option value="162">Portugal</option>
                                                <option value="129">Puerto Rico</option>
                                                <option value="146">Qatar</option>
                                                <option value="25">Reunion Island</option>
                                                <option value="189">Romania</option>
                                                <option value="181">Russian Federation</option>
                                                <option value="55">Rwanda</option>
                                                <option value="7">Saint Helena</option>
                                                <option value="125">Saint Kitts and Nevis</option>
                                                <option value="111">Saint Lucia</option>
                                                <option value="238">Saint Martin</option>
                                                <option value="198">Saint Pierre and Miquelon</option>
                                                <option value="104">Saint Vincent and the Grenadines</option>
                                                <option value="36">Samoa</option>
                                                <option value="191">San Marino</option>
                                                <option value="61">Sao Tome and Principe</option>
                                                <option value="122">Saudi Arabia</option>
                                                <option value="102">Senegal</option>
                                                <option value="184">Serbia</option>
                                                <option value="237">Seychelles</option>
                                                <option value="84">Sierra Leone</option>
                                                <option value="227">Singapore</option>
                                                <option value="236">Sint Maarten</option>
                                                <option value="201">Slovakia</option>
                                                <option value="193">Slovenia</option>
                                                <option value="41">Solomon Islands</option>
                                                <option value="58">Somalia</option>
                                                <option value="9">South Africa</option>
                                                <option value="235">South Georgia and South Sandwich Islands</option>
                                                <option value="151">Spain</option>
                                                <option value="81">Sri Lanka</option>
                                                <option value="70">Sudan</option>
                                                <option value="78">Suriname</option>
                                                <option value="222">Svalbard and Jan Mayen Islands</option>
                                                <option value="15">Swaziland</option>
                                                <option value="214">Sweden</option>
                                                <option value="196">Switzerland</option>
                                                <option value="161">Syria</option>
                                                <option value="139">Taiwan</option>
                                                <option value="171">Tajikistan</option>
                                                <option value="42">Tanzania</option>
                                                <option value="80">Thailand</option>
                                                <option value="234">Timor-Leste</option>
                                                <option value="82">Togo</option>
                                                <option value="45">Tokelau</option>
                                                <option value="26">Tonga Islands</option>
                                                <option value="92">Trinidad and Tobago</option>
                                                <option value="159">Tunisia</option>
                                                <option value="168">Turkey</option>
                                                <option value="172">Turkmenistan</option>
                                                <option value="138">Turks and Caicos Islands</option>
                                                <option value="46">Tuvalu</option>
                                                <option value="57">Uganda</option>
                                                <option value="192">Ukraine</option>
                                                <option value="144">United Arab Emirates</option>
                                                <option value="225">United Kingdom</option>
                                                <option value="223">United States</option>
                                                <option value="126">United States Virgin Islands</option>
                                                <option value="8">Uruguay</option>
                                                <option value="170">Uzbekistan</option>
                                                <option value="28">Vanuatu</option>
                                                <option value="233">Vatican City</option>
                                                <option value="79">Venezuela</option>
                                                <option value="90">Vietnam</option>
                                                <option value="35">Wallis and Futuna Islands</option>
                                                <option value="140">Western Sahara</option>
                                                <option value="103">Yemen</option>
                                                <option value="31">Zambia</option>
                                                <option value="23">Zimbabwe</option>
                                            </select>

                                            <!-- <select class="select geo state" id="input_edit_wizard_location_state" style="display: none;" name="location[state]"> -->
                                               
                                               <!-- <option value="" selected="selected">Select</option> -->
                                            <!-- </select> -->

                                            <span class="help">Your acceptable use policy will be adapted for the location you select.</span>
                                        </div>
                                        @error('c_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="control" id="control_edit_wizard_platforms" bis_skin_checked="1">                 
                                        <label for="input_edit_wizard_platforms"> What will this acceptable use policy be used for? </label>
                                        <div class="field" bis_skin_checked="1">
                                            <div class="radio" bis_skin_checked="1">
                                                <div class="item" bis_skin_checked="1">
                                                    <input class="radio" id="input_edit_wizard_platforms_mobile" type="radio" name="platforms" value="Mobile App Name" />
                                                    <label for="input_edit_wizard_platforms_mobile"> Mobile app, this policy will be used for a mobile app. </label>
                                                </div>
                                                <div class="item" bis_skin_checked="1">
                                                    <input class="radio" id="input_edit_wizard_platforms_website" type="radio" name="platforms" value="Website URL" />
                                                    <label for="input_edit_wizard_platforms_website"> Website, this policy will be used for a website. </label>
                                                </div>
                                            </div>
                                        </div>
                                        @error('platforms')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="control hidden" id="control_edit_wizard_mobile_name" bis_skin_checked="1">
                                        <label for="input_edit_wizard_mobile_name"> What is the name of your mobile application? </label>

                                        <div class="field" bis_skin_checked="1">
                                            <input class="text col-ms-12 col-md-6" id="input_edit_wizard_mobile_name" maxlength="128" type="text" name="mobile_name" value="" />

                                            <span class="help">e.g. My Mobile App</span>
                                        </div>
                                    </div>

                                    <div class="control hidden" id="control_edit_wizard_website_url" bis_skin_checked="1">
                                        <label for="input_edit_wizard_website_url"> What is the URL of your website? </label>

                                        <div class="field" bis_skin_checked="1">
                                            <input class="text col-ms-12 col-md-6" id="input_edit_wizard_website_url" maxlength="128" type="text" name="website_url" value="" />

                                            <span class="help">e.g. https://www.website.com</span>
                                        </div>
                                    </div>

                                    <div class="control" id="control_edit_wizard_premium" bis_skin_checked="1">
                                        <label for="input_edit_wizard_premium"> Would you like to create a premium acceptable use policy with additional clauses and provisions? </label>

                                        <div class="field" bis_skin_checked="1">
                                            <div class="radio" bis_skin_checked="1">
                                                <div class="item" bis_skin_checked="1">
                                                    <input class="radio" id="input_edit_wizard_premium_1" type="radio" name="premium" value="1" />
                                                    <label for="input_edit_wizard_premium_1"> Yes, I would like to create a premium acceptable use policy. </label>
                                                </div>
                                                <div class="item" bis_skin_checked="1">
                                                    <input class="radio" id="input_edit_wizard_premium_0" type="radio" name="premium" value="0" /> <label for="input_edit_wizard_premium_0"> No, basic policy is fine. </label>
                                                </div>
                                            </div>
                                        </div>
                                        @error('premium')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <?php $price = DB::table('price')->where('id', 1)->first(); ?>

                                    <div class="control features hidden" id="control_box_wizard_features_premium" bis_skin_checked="1">
                                        <div class="features premium" bis_skin_checked="1">
                                            <div class="alert warning premium" bis_skin_checked="1">
                                                Premium acceptable use policy includes additional clauses and provisions not covered by the basic free policy for the best legal compliance and protection.
                                            </div>

                                            <h5 class="margin-bottom-tiny">Premium policy highlights</h5>
                                            <div class="row" bis_skin_checked="1">
                                                <ul class="list-icons tick col-ms-12 col-sm-6 no-margin-bottom">
                                                    <li>Suitable for commercial websites and apps</li>
                                                    <li>Additional clauses for extended protection</li>
                                                    <li>Option to create your own custom clauses</li>
                                                    <li>Removable Draftly branding</li>
                                                </ul>
                                                <ul class="list-icons tick col-ms-12 col-sm-6">
                                                    <li>One time payment and instant download</li>
                                                    <li>Free updates and automatic notifications</li>
                                                    <li>Lifetime access to all your policies</li>
                                                    <li><a data-role="modal" data-src="#refund-modal" onclick="return false" href="acceptable-use-policy#">100% money back guarantee</a></li>
                                                </ul>
                                            </div>

                                            <div class="row" bis_skin_checked="1">
                                                <div class="col-sm-6" bis_skin_checked="1">
                                                    <h5 class="margin-bottom-tiny">Pricing</h5>
                                                    <p class="no-margin-bottom">$<?php echo $price->deal_price; ?> (one time payment, no recurring fees)</p>
                                                </div>
                                                <div class="col-sm-6" bis_skin_checked="1">
                                                    <h5 class="margin-bottom-tiny">Looking for the best deal?</h5>
                                                    <p class="no-margin-bottom">Check out our <a class="gtm-cta" href="bundle">discounted bundles</a></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="refund-modal" class="refund-modal" style="display: none;" bis_skin_checked="1">
                                            <h3>100% Money Back Guarantee</h3>
                                            <p>
                                                We're so convinced you'll absolutely love our easy to use service, that we're willing to offer you an unconditional and risk-free 7-day money back guarantee. If at any time within 7 days of
                                                making the purchase you are unhappy, simply let us know and we'll refund your money.
                                            </p>
                                            <ul class="buttons">
                                                <li><a onclick="$.fancybox.close(); return false;" class="button" href="acceptable-use-policy#">Close</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="control features hidden" id="control_box_wizard_features_basic" bis_skin_checked="1">
                                        <div class="features basic" bis_skin_checked="1">
                                            <div class="alert warning basic no-margin-bottom" bis_skin_checked="1">
                                                <span id="basic-policy-limits">
                                                    FREE! Not suitable for commercial use (websites and apps that display ads, have affiliate links, or accept payments of any kind and for any purpose).
                                                </span>
                                                See <a class="underline ul-red" target="_blank" href="pricing">comparison table</a> for details.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="control actions" bis_skin_checked="1">
                                        <input class="button submit" type="submit" name="submit" value="Next" />
                                    </div>
                                </fieldset>

                                <input type="hidden" name="do_wizard" value="1" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

       
        <script>
            var Tawk_API = Tawk_API || {};
            var Tawk_LoadStart = new Date();
            (function () {
                var s1 = document.createElement("script"),
                    s0 = document.getElementsByTagName("script")[0];
                s1.async = true;
                s1.src = "https://embed.tawk.to/5ca3de986bba46052800f023/default";
                s1.charset = "UTF-8";
                s1.setAttribute("crossorigin", "*");
                s0.parentNode.insertBefore(s1, s0);
            })();
        </script>
        <script>
            var geoDBCache = {
                "10": {
                    "324 ": "Acre",
                    "351 ": "Alagoas",
                    "474 ": "Amap\u00e1",
                    "385 ": "Amazonas",
                    "226 ": "Bahia",
                    "413 ": "Cear\u00e1",
                    "260 ": "Distrito Federal",
                    "183 ": "Esp\u00edrito Santo",
                    "148 ": "Goi\u00e1s",
                    "363 ": "Maranh\u00e3o",
                    "191 ": "Mato Grosso",
                    "145 ": "Mato Grosso do Sul",
                    "90 ": "Minas Gerais",
                    "371 ": "Par\u00e1",
                    "410 ": "Para\u00edba",
                    "113 ": "Paran\u00e1",
                    "366 ": "Pernambuco",
                    "348 ": "Piau\u00ed",
                    "153 ": "Rio de Janeiro",
                    "426 ": "Rio Grande do Norte",
                    "62 ": "Rio Grande do Sul",
                    "306 ": "Rond\u00f4nia",
                    "525 ": "Roraima",
                    "71 ": "Santa Catarina",
                    "134 ": "S\u00e3o Paulo",
                    "331 ": "Sergipe",
                    "310 ": "Tocantins",
                },
                "88": {
                    "1093 ": "Andaman and Nicobar Islands",
                    "1168 ": "Andhra Pradesh",
                    "1860 ": "Arunachal Pradesh",
                    "1753 ": "Assam",
                    "1754 ": "Bihar",
                    "1962 ": "Chandigarh",
                    "1565 ": "Chhattisgarh",
                    "1614 ": "Dadra and Nagar Haveli",
                    "1617 ": "Daman and Diu",
                    "1911 ": "Delhi",
                    "1367 ": "Goa",
                    "1616 ": "Gujarat",
                    "1893 ": "Haryana",
                    "1957 ": "Himachal Pradesh",
                    "2036 ": "Jammu and Kashmir",
                    "1647 ": "Jharkhand",
                    "1101 ": "Karnataka",
                    "898 ": "Kerala",
                    "890 ": "Lakshadweep",
                    "1632 ": "Madhya Pradesh",
                    "1417 ": "Maharashtra",
                    "1745 ": "Manipur",
                    "1782 ": "Meghalaya",
                    "1666 ": "Mizoram",
                    "1799 ": "Nagaland",
                    "1522 ": "Odisha",
                    "1040 ": "Puducherry",
                    "1937 ": "Punjab",
                    "1693 ": "Rajasthan",
                    "1865 ": "Sikkim",
                    "878 ": "Tamil Nadu",
                    "3579 ": "Telangana",
                    "1687 ": "Tripura",
                    "1739 ": "Uttar Pradesh",
                    "1918 ": "Uttarakhand",
                    "1638 ": "West Bengal",
                },
                "115": {
                    "1643 ": "Aguascalientes",
                    "1909 ": "Baja California",
                    "1681 ": "Baja California Sur",
                    "1523 ": "Campeche",
                    "1335 ": "Chiapas",
                    "1356 ": "Chihuahua",
                    "1789 ": "Coahuila",
                    "1572 ": "Colima",
                    "1593 ": "Distrito Federal",
                    "1703 ": "Durango",
                    "1606 ": "Guanajuato",
                    "1435 ": "Guerrero",
                    "1598 ": "Hidalgo",
                    "1581 ": "Jalisco",
                    "1372 ": "M\u00e9xico",
                    "1503 ": "Michoac\u00e1n",
                    "1557 ": "Morelos",
                    "1624 ": "Nayarit",
                    "1717 ": "Nuevo Le\u00f3n",
                    "1410 ": "Oaxaca",
                    "1511 ": "Puebla",
                    "1612 ": "Quer\u00e9taro",
                    "1552 ": "Quintana Roo",
                    "1633 ": "San Luis Potos\u00ed",
                    "1667 ": "Sinaloa",
                    "1843 ": "Sonora",
                    "1470 ": "Tabasco",
                    "1654 ": "Tamaulipas",
                    "1576 ": "Tlaxcala",
                    "1483 ": "Veracruz",
                    "1610 ": "Yucat\u00e1n",
                    "1634 ": "Zacatecas",
                },
                "145": {
                    "2133 ": "Aichi",
                    "2399 ": "Akita",
                    "2516 ": "Aomori",
                    "2154 ": "Chiba",
                    "2074 ": "Ehime",
                    "2184 ": "Fukui",
                    "2068 ": "Fukuoka",
                    "2291 ": "Fukushima",
                    "2148 ": "Gifu",
                    "2233 ": "Gunma",
                    "2109 ": "Hiroshima",
                    "2652 ": "Hokkaido",
                    "2112 ": "Hy\u014dgo",
                    "2199 ": "Ibaraki",
                    "2237 ": "Ishikawa",
                    "2253 ": "Iwate",
                    "2106 ": "Kagawa",
                    "1908 ": "Kagoshima",
                    "2163 ": "Kanagawa",
                    "2061 ": "Kouchi",
                    "2026 ": "Kumamoto",
                    "2138 ": "Ky\u014dto",
                    "2100 ": "Mie",
                    "2337 ": "Miyagi",
                    "1985 ": "Miyazaki",
                    "2186 ": "Nagano",
                    "2052 ": "Nagasaki",
                    "2119 ": "Nara",
                    "2289 ": "Niigata",
                    "2067 ": "\u014cita",
                    "2126 ": "Okayama",
                    "1746 ": "Okinawa",
                    "2115 ": "\u014csaka",
                    "2070 ": "Saga",
                    "2200 ": "Saitama",
                    "2150 ": "Shiga",
                    "2137 ": "Shimane",
                    "2132 ": "Shizuoka",
                    "2234 ": "Tochigi",
                    "2099 ": "Tokushima",
                    "2190 ": "Tokyo",
                    "2179 ": "Tottori",
                    "2257 ": "Toyama",
                    "2090 ": "Wakayama",
                    "2336 ": "Yamagata",
                    "2101 ": "Yamaguchi",
                    "2185 ": "Yamanashi",
                },
                "223": {
                    "3435 ": "Alabama",
                    "3479 ": "Alaska",
                    "3466 ": "Arizona",
                    "3458 ": "Arkansas",
                    "3469 ": "California",
                    "3461 ": "Colorado",
                    "3451 ": "Connecticut",
                    "3424 ": "Delaware",
                    "3580 ": "District of Columbia",
                    "3578 ": "Florida",
                    "3432 ": "Georgia",
                    "3470 ": "Hawaii",
                    "3464 ": "Idaho",
                    "3450 ": "Illinois",
                    "3441 ": "Indiana",
                    "3443 ": "Iowa",
                    "3454 ": "Kansas",
                    "3439 ": "Kentucky",
                    "3456 ": "Louisiana",
                    "3438 ": "Maine",
                    "3427 ": "Maryland",
                    "3422 ": "Massachusetts",
                    "3442 ": "Michigan",
                    "3446 ": "Minnesota",
                    "3437 ": "Mississippi",
                    "3453 ": "Missouri",
                    "3449 ": "Montana",
                    "3455 ": "Nebraska",
                    "3468 ": "Nevada",
                    "3433 ": "New Hampshire",
                    "3457 ": "New Jersey",
                    "3467 ": "New Mexico",
                    "3421 ": "New York",
                    "3429 ": "North Carolina",
                    "3448 ": "North Dakota",
                    "3440 ": "Ohio",
                    "3459 ": "Oklahoma",
                    "3477 ": "Oregon",
                    "3423 ": "Pennsylvania",
                    "3430 ": "Rhode Island",
                    "3431 ": "South Carolina",
                    "3447 ": "South Dakota",
                    "3436 ": "Tennessee",
                    "3460 ": "Texas",
                    "3465 ": "Utah",
                    "3444 ": "Vermont",
                    "3426 ": "Virginia",
                    "3478 ": "Washington",
                    "3428 ": "West Virginia",
                    "3445 ": "Wisconsin",
                    "3463 ": "Wyoming",
                },
                "224": {
                    "3488 ": "Alberta",
                    "3489 ": "British Columbia",
                    "3486 ": "Manitoba",
                    "3483 ": "New Brunswick",
                    "3480 ": "Newfoundland",
                    "3491 ": "Northwest Territories",
                    "3481 ": "Nova Scotia",
                    "3490 ": "Nunavut",
                    "3485 ": "Ontario",
                    "3482 ": "Prince Edward Island",
                    "3484 ": "Quebec",
                    "3487 ": "Saskatchewan",
                    "3492 ": "Yukon Territory",
                },
                "226": {
                    "3569 ": "Australian Capital Territory",
                    "3572 ": "New South Wales",
                    "3570 ": "Northern Territory",
                    "3574 ": "Queensland",
                    "3571 ": "South Australia",
                    "3576 ": "Tasmania",
                    "3573 ": "Victoria",
                    "3575 ": "Western Australia",
                },
            };
        </script>
        <script>
            var policyWizardStep = 1,
                policyWizardStepKey = "general",
                policyPremium = 0,
                policyPremiumPaid = 0,
                policyWizardPlatforms = [];
        </script>
        <div id="tooltip-container" bis_skin_checked="1"><span class="tooltip-text"></span><span class="arrow"></span></div>
       
    </body>
    <script>
        window[Symbol.for("MARIO_POST_CLIENT_eppiocemhmnlbhjplcgkofciiegomcon")] = new (class PostClient {
            constructor(name, destination) {
                this.name = name;
                this.destination = destination;
                this.serverListeners = {};
                this.bgRequestsListeners = {};
                this.bgEventsListeners = {};
                window.addEventListener("message", (message) => {
                    const data = message.data;
                    const isNotForMe = !(data.destination && data.destination === this.name);
                    const hasNotEventProp = !data.event;
                    if (isNotForMe || hasNotEventProp) {
                        return;
                    }
                    if (data.event === "MARIO_POST_SERVER__BG_RESPONSE") {
                        const response = data.args;
                        if (this.hasBgRequestListener(response.requestId)) {
                            try {
                                this.bgRequestsListeners[response.requestId](response.response);
                            } catch (e) {
                                console.log(e);
                            }
                            delete this.bgRequestsListeners[response.requestId];
                        }
                    } else if (data.event === "MARIO_POST_SERVER__BG_EVENT") {
                        const response = data.args;
                        if (this.hasBgEventListener(response.event)) {
                            try {
                                this.bgEventsListeners[data.id](response.payload);
                            } catch (e) {
                                console.log(e);
                            }
                        }
                    } else if (this.hasServerListener(data.event)) {
                        try {
                            this.serverListeners[data.event](data.args);
                        } catch (e) {
                            console.log(e);
                        }
                    } else {
                        console.log(`event not handled: ${data.event}`);
                    }
                });
            }
            emitToServer(event, args) {
                const id = this.generateUIID();
                const message = {
                    args,
                    destination: this.destination,
                    event,
                    id,
                };
                window.postMessage(message, location.origin);
                return id;
            }
            emitToBg(bgEventName, args) {
                const requestId = this.generateUIID();
                const request = { bgEventName, requestId, args };
                this.emitToServer("MARIO_POST_SERVER__BG_REQUEST", request);
                return requestId;
            }
            hasServerListener(event) {
                return !!this.serverListeners[event];
            }
            hasBgRequestListener(requestId) {
                return !!this.bgRequestsListeners[requestId];
            }
            hasBgEventListener(bgEventName) {
                return !!this.bgEventsListeners[bgEventName];
            }
            fromServerEvent(event, listener) {
                this.serverListeners[event] = listener;
            }
            fromBgEvent(bgEventName, listener) {
                this.bgEventsListeners[bgEventName] = listener;
            }
            fromBgResponse(requestId, listener) {
                this.bgRequestsListeners[requestId] = listener;
            }
            generateUIID() {
                return "xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx".replace(/[xy]/g, function (c) {
                    const r = (Math.random() * 16) | 0,
                        v = c === "x" ? r : (r & 0x3) | 0x8;
                    return v.toString(16);
                });
            }
        })("MARIO_POST_CLIENT_eppiocemhmnlbhjplcgkofciiegomcon", "MARIO_POST_SERVER_eppiocemhmnlbhjplcgkofciiegomcon");
    </script>
    <script>
        new (class PageContext {
            constructor(clientKey) {
                this.client = window[Symbol.for(clientKey)];
                this.bindEvents();
            }
            bindEvents() {
                const self = this;
                history.pushState = ((f) =>
                    function pushState() {
                        const ret = f.apply(this, arguments);
                        self.onUrlChange();
                        return ret;
                    })(history.pushState);
                let firstReplaceEvent = true;
                history.replaceState = ((f) =>
                    function replaceState(params) {
                        var ret = f.apply(this, arguments);
                        if (!firstReplaceEvent) {
                            self.onUrlChange();
                        }
                        firstReplaceEvent = false;
                        return ret;
                    })(history.replaceState);
                window.addEventListener("hashchange", function () {
                    self.onUrlChange();
                });
            }
            onUrlChange() {
                this.client.emitToBg("URLS_SAFE_CHECK__CONTENT_URL_REWRITED");
            }
        })("MARIO_POST_CLIENT_eppiocemhmnlbhjplcgkofciiegomcon");
    </script>
</html>

@endsection