@extends('layouts.master')

@section('content')


<!DOCTYPE html>
<!-- saved from url=(0043)login -->
<html lang="en">
    <script async="" src="{{ asset('assets/js/app.js')}}" charset="UTF-8" crossorigin="*"></script>
    <script type="text/javascript" async="" src="{{ asset('assets/js/bat.js')}}"></script>
    <script type="text/javascript" async="" src="{{ asset('assets/js/analytics.js')}}"></script>
    <script type="text/javascript" async="" src="{{ asset('assets/js/analytics.js')}}"></script>
    <script async="" src="{{ asset('assets/js/default.js')}}" charset="UTF-8" crossorigin="*"></script>
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
                w[l].push({ "gtm.start": new Date().getTime(), event: "gtm.js" });
                var f = d.getElementsByTagName(s)[0],
                    j = d.createElement(s),
                    dl = l != "dataLayer" ? "&l=" + l : "";
                j.async = true;
                j.src = "https://www.googletagmanager.com/gtm.js?id=" + i + dl;
                f.parentNode.insertBefore(j, f);
            })(window, document, "script", "dataLayer", "GTM-NS2X6F");
        </script>
        <link rel="alternate" type="application/rss+xml" title="WebsitePolicies.com Feed" href="blog/feed" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Log in</title>
        <meta name="description" content="Log in to your account to view and manage your generated policies, create new policies, and to update your account information." />
        <script src="{{ asset('assets/js/1609791099.js')}}"></script>
        <style>
            @media print {
                #ghostery-tracker-tally {
                    display: none !important;
                }
            }
        </style>
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
        <meta property="og:image" content="uploads/p/h/7/g/1y9eg2ur9hegs3x1s2nd.png" />
        <meta property="og:type" content="article" />
        <meta property="og:title" content="Log in" />
        <meta property="og:description" content="Log in to your account to view and manage your generated policies, create new policies, and to update your account information." />
        <meta property="og:url" content="login" />
        <meta name="twitter:image" content="uploads/p/h/7/g/1y9eg2ur9hegs3x1s2nd.png" />
        <meta name="twitter:card" content="summary" />
        <meta name="twitter:title" content="Log in" />
        <meta name="twitter:description" content="Log in to your account to view and manage your generated policies, create new policies, and to update your account information." />
        <meta name="twitter:url" content="login" />
        <style type="text/css">
            @keyframes tawkMaxOpen {
                0% {
                    opacity: 0;
                    transform: translate(0, 30px);
                }
                to {
                    opacity: 1;
                    transform: translate(0, 0px);
                }
            }
            @-moz-keyframes tawkMaxOpen {
                0% {
                    opacity: 0;
                    transform: translate(0, 30px);
                }
                to {
                    opacity: 1;
                    transform: translate(0, 0px);
                }
            }
            @-webkit-keyframes tawkMaxOpen {
                0% {
                    opacity: 0;
                    transform: translate(0, 30px);
                }
                to {
                    opacity: 1;
                    transform: translate(0, 0px);
                }
            }
            #kR718r6-1611222685508 {
                outline: none !important;
                visibility: visible !important;
                resize: none !important;
                box-shadow: none !important;
                overflow: visible !important;
                background: none !important;
                opacity: 1 !important;
                filter: alpha(opacity=100) !important;
                -ms-filter: progid:DXImageTransform.Microsoft.Alpha(Opacity1) !important;
                -moz-opacity: 1 !important;
                -khtml-opacity: 1 !important;
                top: auto !important;
                right: 10px !important;
                bottom: 0px !important;
                left: auto !important;
                position: fixed !important;
                border: 0 !important;
                min-height: 0 !important;
                min-width: 0 !important;
                max-height: none !important;
                max-width: none !important;
                padding: 0 !important;
                margin: 0 !important;
                -moz-transition-property: none !important;
                -webkit-transition-property: none !important;
                -o-transition-property: none !important;
                transition-property: none !important;
                transform: none !important;
                -webkit-transform: none !important;
                -ms-transform: none !important;
                width: auto !important;
                height: auto !important;
                display: none !important;
                z-index: 2000000000 !important;
                background-color: transparent !important;
                cursor: auto !important;
                float: none !important;
                border-radius: unset !important;
                pointer-events: auto !important;
            }
            #LrTS3LR-1611222685514.open {
                animation: tawkMaxOpen 0.25s ease !important;
            }
            .form-group.row {
    padding: 8px;
}
        </style>
    </head>


    <body
        class="guest users users_login index"
        bis_register="W3sibWFzdGVyIjp0cnVlLCJleHRlbnNpb25JZCI6ImVwcGlvY2VtaG1ubGJoanBsY2drb2ZjaWllZ29tY29uIiwiYWRibG9ja2VyU3RhdHVzIjp7IkRJU1BMQVkiOiJlbmFibGVkIiwiRkFDRUJPT0siOiJlbmFibGVkIiwiVFdJVFRFUiI6ImVuYWJsZWQifSwidmVyc2lvbiI6IjEuOC4wIiwic2NvcmUiOjEwODAwMH1d"
    >
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NS2X6F" height="0" width="0" style="display: none; visibility: hidden;"></iframe></noscript>
       

        <div class="section sub-hero" bis_skin_checked="1">
            <div class="container" bis_skin_checked="1">
                <div class="row" bis_skin_checked="1">
                    <div class="col-ms-12" bis_skin_checked="1">
                        <h1>Log in</h1>
                    </div>
                </div>
            </div>
        </div>



<div class="container" style="padding: 40px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><strong><h3>Login</h3></strong></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                 <a href="register" type="submit" class="btn btn-primary">
                                    Sign Up
                                </a>

                                 @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif 

                               
                            </div>
                        </div>
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
