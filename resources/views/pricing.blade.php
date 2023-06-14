 @extends('layouts.master')

 @section('pricing')

 <!DOCTYPE html>
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
        <link rel="alternate" type="application/rss+xml" title="Feed" href="blog/feed" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="Our attorney-drafted policies are completely free for personal use. Our premium policies are low-priced and are suitable for commercial use." />
        <script src="{{ asset('assets/js/1609791099.js')}}"></script>
        <meta property="og:image" content="uploads/p/h/7/g/1y9eg2ur9hegs3x1s2nd.png" />
        <meta property="og:type" content="article" />
        <meta property="og:title" content="Pricing - Free vs Premium Policies" />
        <meta property="og:description" content="Our attorney-drafted policies are completely free for personal use. Our premium policies are low-priced and are suitable for commercial use." />
        <meta property="og:url" content="pricing" />
        <meta property="article:published_time" content="2018-08-01T08:51:55+00:00" />
        <meta property="article:modified_time" content="2018-09-06T13:18:44+00:00" />
        <meta name="twitter:image" content="uploads/p/h/7/g/1y9eg2ur9hegs3x1s2nd.png" />
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:title" content="Pricing - Free vs Premium Policies" />
        <meta name="twitter:description" content="Our attorney-drafted policies are completely free for personal use. Our premium policies are low-priced and are suitable for commercial use." />
        <meta name="twitter:url" content="pricing" />
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
        <link href="{{ asset ('assets/css/new.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('assets/js/tawk.js')}}"></script>
    </head>
    <body
        class="guest pricing pages index"
        bis_register="W3sibWFzdGVyIjp0cnVlLCJleHRlbnNpb25JZCI6ImVwcGlvY2VtaG1ubGJoanBsY2drb2ZjaWllZ29tY29uIiwiYWRibG9ja2VyU3RhdHVzIjp7IkRJU1BMQVkiOiJlbmFibGVkIiwiRkFDRUJPT0siOiJlbmFibGVkIiwiVFdJVFRFUiI6ImVuYWJsZWQifSwidmVyc2lvbiI6IjEuOC4wIiwic2NvcmUiOjEwODAwMH1d"
    >
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NS2X6F" height="0" width="0" style="display: none; visibility: hidden;"></iframe></noscript>
       

        <div class="section sub-hero" bis_skin_checked="1">
            <div class="container" bis_skin_checked="1">
                <div class="row" bis_skin_checked="1">
                    <div class="col-ms-12" bis_skin_checked="1">
                        <h1>Pricing</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-pricing" bis_skin_checked="1">
            <div class="section shade1 payments text-center" bis_skin_checked="1">
                <div class="container" bis_skin_checked="1">
                    <div class="row" bis_skin_checked="1">
                        <div class="col-ms-12" bis_skin_checked="1">
                            <h3>Pay only for what you need. One-time payment. No recurring fees, ever!</h3>
                        </div>
                    </div>
                </div>
            </div>

            <?php $price = DB::table('price')->where('id', 1)->first(); ?>

            <div class="section comparison" bis_skin_checked="1">
                <div class="container" bis_skin_checked="1">
                    <div class="row" bis_skin_checked="1">
                        <div class="hidden-ms visible-sm col-sm-6 col-md-4 labels" bis_skin_checked="1">
                            <h4>What you get</h4>
                        </div>
                        <div class="col-ms-12 col-sm-3 col-md-4 basic" bis_skin_checked="1">
                            <h4 class="text-center">Basic: Free!</h4>
                        </div>
                        <div class="hidden-ms visible-sm col-sm-3 col-md-4 premium-plan" bis_skin_checked="1">
                            <h4 class="text-center">Premium: $<?php echo $price->deal_price; ?></h4>
                        </div>
                    </div>

                    <div class="row" bis_skin_checked="1">
                        <div class="hidden-ms visible-sm col-sm-6 table-column col-md-4 labels" bis_skin_checked="1">
                            <ul>
                                <li>
                                    Compliance with international laws
                                    <a
                                        class="feature-help"
                                        data-tooltip="default"
                                        title="Our attorney-drafted legal policies are fully compliant with various international laws including CCPA, GDPR, COPPA, CalOPPA, FTC, and others."
                                        onclick="return false"
                                        href="pricing#"
                                    >
                                        &nbsp;
                                    </a>
                                </li>
                                <li>
                                    Free hosting on our servers
                                    <a
                                        class="feature-help"
                                        data-tooltip="default"
                                        title="We can host your generated policies for you for free and without any limitations so you don&#39;t have to worry about technical details."
                                        onclick="return false"
                                        href="pricing#"
                                    >
                                        &nbsp;
                                    </a>
                                </li>
                                <li>
                                    Host policies on your own domain
                                    <a
                                        class="feature-help"
                                        data-tooltip="default"
                                        title="You have full control over your policy so you can easily copy it directly to your website or mobile app."
                                        onclick="return false"
                                        href="pricing#"
                                    >
                                        &nbsp;
                                    </a>
                                </li>
                                <li>
                                    Download policies in HTML format
                                </li>
                                <li>
                                    Download policies in plain text format
                                </li>
                                <li>
                                    Responsive design (mobile and web)
                                    <a
                                        class="feature-help"
                                        data-tooltip="default"
                                        title="Your policy will look great on any device you view it on, whether it&#39;s a desktop computer, tablet or smartphone."
                                        onclick="return false"
                                        href="pricing#"
                                    >
                                        &nbsp;
                                    </a>
                                </li>
                                <li>
                                    Comprehensive clauses and provisions
                                    <a
                                        class="feature-help"
                                        data-tooltip="default"
                                        title="Get the best legal coverage by including comprehensive clauses in your policies that outline advertising, affiliate links, payment processing and many other important topics not available in the basic policies."
                                        onclick="return false"
                                        href="pricing#"
                                    >
                                        &nbsp;
                                    </a>
                                </li>
                                <li>
                                    Suitable for commercial use
                                    <a
                                        class="feature-help"
                                        data-tooltip="default"
                                        title="Our premium policies are a perfect solution for any type of online business including bloggers, consultants, entrepreneurs, fitness and health professionals, and many more. Save time and let us worry about the legal stuff while you focus on what you do best."
                                        onclick="return false"
                                        href="pricing#"
                                    >
                                        &nbsp;
                                    </a>
                                </li>
                                <li>
                                    Remove Draftly branding
                                    <a
                                        class="feature-help"
                                        data-tooltip="default"
                                        title="Showcase your professionalism and boost your own brand reputation by not displaying our branding within your policies."
                                        onclick="return false"
                                        href="pricing#"
                                    >
                                        &nbsp;
                                    </a>
                                </li>
                                <li>
                                    Free lifetime automatic updates
                                    <a
                                        class="feature-help"
                                        data-tooltip="default"
                                        title="With our free lifetime updates you&#39;ll never have to worry about ever-changing laws, government regulations and various legal requirements."
                                        onclick="return false"
                                        href="pricing#"
                                    >
                                        &nbsp;
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-ms-12 col-sm-3 col-md-4 table-column basic-plan" bis_skin_checked="1">
                            <ul>
                                <li>
                                    <img width="20" height="20" alt="Yes" src="{{ asset('assets/images/feature-yes.png')}}" />
                                    <span class="icon-text icon-policies-feature-yes">
                                        Compliance with international laws
                                        <a
                                            class="feature-help"
                                            data-role="modal"
                                            data-type="html"
                                            data-src="Our attorney-drafted legal policies are fully compliant with various international laws including CCPA, GDPR, COPPA, CalOPPA, FTC, and others."
                                            onclick="return false"
                                            href="pricing#"
                                        >
                                            &nbsp;
                                        </a>
                                    </span>
                                </li>
                                <li>
                                    <img width="20" height="20" alt="Yes" src="{{ asset('assets/images/feature-yes.png')}}" />
                                    <span class="icon-text icon-policies-feature-yes">
                                        Free hosting on our servers
                                        <a
                                            class="feature-help"
                                            data-role="modal"
                                            data-type="html"
                                            data-src="We can host your generated policies for you for free and without any limitations so you don&#39;t have to worry about technical details."
                                            onclick="return false"
                                            href="pricing#"
                                        >
                                            &nbsp;
                                        </a>
                                    </span>
                                </li>
                                <li>
                                    <img width="20" height="20" alt="Yes" src="{{ asset('assets/images/feature-yes.png')}}" />
                                    <span class="icon-text icon-policies-feature-yes">
                                        Host policies on your own domain
                                        <a
                                            class="feature-help"
                                            data-role="modal"
                                            data-type="html"
                                            data-src="You have full control over your policy so you can easily copy it directly to your website or mobile app."
                                            onclick="return false"
                                            href="pricing#"
                                        >
                                            &nbsp;
                                        </a>
                                    </span>
                                </li>
                                <li><img width="20" height="20" alt="Yes" src="{{ asset('assets/images/feature-yes.png')}}" /> <span class="icon-text icon-policies-feature-yes"> Download policies in HTML format </span></li>
                                <li>
                                    <img width="20" height="20" alt="Yes" src="{{ asset('assets/images/feature-yes.png')}}" /> <span class="icon-text icon-policies-feature-yes"> Download policies in plain text format </span>
                                </li>
                                <li>
                                    <img width="20" height="20" alt="Yes" src="{{ asset('assets/images/feature-yes.png')}}" />
                                    <span class="icon-text icon-policies-feature-yes">
                                        Responsive design (mobile and web)
                                        <a
                                            class="feature-help"
                                            data-role="modal"
                                            data-type="html"
                                            data-src="Your policy will look great on any device you view it on, whether it&#39;s a desktop computer, tablet or smartphone."
                                            onclick="return false"
                                            href="pricing#"
                                        >
                                            &nbsp;
                                        </a>
                                    </span>
                                </li>
                                <li>
                                    <img width="20" height="20" alt="No" src="{{ asset('assets/images/feature-no.png')}}" />
                                    <span class="icon-text icon-policies-feature-no">
                                        Comprehensive clauses and provisions
                                        <a
                                            class="feature-help"
                                            data-role="modal"
                                            data-type="html"
                                            data-src="Get the best legal coverage by including comprehensive clauses in your policies that outline advertising, affiliate links, payment processing and many other important topics not available in the basic policies."
                                            onclick="return false"
                                            href="pricing#"
                                        >
                                            &nbsp;
                                        </a>
                                    </span>
                                </li>
                                <li>
                                    <img width="20" height="20" alt="No" src="{{ asset('assets/images/feature-no.png')}}" />
                                    <span class="icon-text icon-policies-feature-no">
                                        Suitable for commercial use
                                        <a
                                            class="feature-help"
                                            data-role="modal"
                                            data-type="html"
                                            data-src="Our premium policies are a perfect solution for any type of online business including bloggers, consultants, entrepreneurs, fitness and health professionals, and many more. Save time and let us worry about the legal stuff while you focus on what you do best."
                                            onclick="return false"
                                            href="pricing#"
                                        >
                                            &nbsp;
                                        </a>
                                    </span>
                                </li>
                                <li>
                                    <img width="20" height="20" alt="No" src="{{ asset('assets/images/feature-no.png')}}" />
                                    <span class="icon-text icon-policies-feature-no">
                                        Remove Draftly branding
                                        <a
                                            class="feature-help"
                                            data-role="modal"
                                            data-type="html"
                                            data-src="Showcase your professionalism and boost your own brand reputation by not displaying our branding within your policies."
                                            onclick="return false"
                                            href="pricing#"
                                        >
                                            &nbsp;
                                        </a>
                                    </span>
                                </li>
                                <li>
                                    <img width="20" height="20" alt="No" src="{{ asset('assets/images/feature-no.png')}}" />
                                    <span class="icon-text icon-policies-feature-no">
                                        Free lifetime automatic updates
                                        <a
                                            class="feature-help"
                                            data-role="modal"
                                            data-type="html"
                                            data-src="With our free lifetime updates you&#39;ll never have to worry about ever-changing laws, government regulations and various legal requirements."
                                            onclick="return false"
                                            href="pricing#"
                                        >
                                            &nbsp;
                                        </a>
                                    </span>
                                </li>
                            </ul>
                            <p class="text-center"><a class="button gtm-cta" data-event-label="basic" href="create">Get started</a></p>
                        </div>
                        <div class="col-ms-12 hidden-sm premium-plan" bis_skin_checked="1">
                            <h4 class="text-center">Premium: $<?php echo $price->price; ?></h4>
                        </div>
                        <div class="col-ms-12 col-sm-3 col-md-4 table-column premium-plan" bis_skin_checked="1">
                            <ul>
                                <li>
                                    <img width="20" height="20" alt="Yes" src="{{ asset('assets/images/feature-yes.png')}}" />
                                    <span class="icon-text icon-policies-feature-yes">
                                        Compliance with international laws
                                        <a
                                            class="feature-help"
                                            data-role="modal"
                                            data-type="html"
                                            data-src="Our attorney-drafted legal policies are fully compliant with various international laws including CCPA, GDPR, COPPA, CalOPPA, FTC, and others."
                                            onclick="return false"
                                            href="pricing#"
                                        >
                                            &nbsp;
                                        </a>
                                    </span>
                                </li>
                                <li>
                                    <img width="20" height="20" alt="Yes" src="{{ asset('assets/images/feature-yes.png')}}" />
                                    <span class="icon-text icon-policies-feature-yes">
                                        Free hosting on our servers
                                        <a
                                            class="feature-help"
                                            data-role="modal"
                                            data-type="html"
                                            data-src="We can host your generated policies for you for free and without any limitations so you don&#39;t have to worry about technical details."
                                            onclick="return false"
                                            href="pricing#"
                                        >
                                            &nbsp;
                                        </a>
                                    </span>
                                </li>
                                <li>
                                    <img width="20" height="20" alt="Yes" src="{{ asset('assets/images/feature-yes.png')}}" />
                                    <span class="icon-text icon-policies-feature-yes">
                                        Host policies on your own domain
                                        <a
                                            class="feature-help"
                                            data-role="modal"
                                            data-type="html"
                                            data-src="You have full control over your policy so you can easily copy it directly to your website or mobile app."
                                            onclick="return false"
                                            href="pricing#"
                                        >
                                            &nbsp;
                                        </a>
                                    </span>
                                </li>
                                <li><img width="20" height="20" alt="Yes" src="{{ asset('assets/images/feature-yes.png')}}" /> <span class="icon-text icon-policies-feature-yes"> Download policies in HTML format </span></li>
                                <li>
                                    <img width="20" height="20" alt="Yes" src="{{ asset('assets/images/feature-yes.png')}}" /> <span class="icon-text icon-policies-feature-yes"> Download policies in plain text format </span>
                                </li>
                                <li>
                                    <img width="20" height="20" alt="Yes" src="{{ asset('assets/images/feature-yes.png')}}" />
                                    <span class="icon-text icon-policies-feature-yes">
                                        Responsive design (mobile and web)
                                        <a
                                            class="feature-help"
                                            data-role="modal"
                                            data-type="html"
                                            data-src="Your policy will look great on any device you view it on, whether it&#39;s a desktop computer, tablet or smartphone."
                                            onclick="return false"
                                            href="pricing#"
                                        >
                                            &nbsp;
                                        </a>
                                    </span>
                                </li>
                                <li>
                                    <img width="20" height="20" alt="Yes" src="{{ asset('assets/images/feature-yes.png')}}" />
                                    <span class="icon-text icon-policies-feature-yes">
                                        Comprehensive clauses and provisions
                                        <a
                                            class="feature-help"
                                            data-role="modal"
                                            data-type="html"
                                            data-src="Get the best legal coverage by including comprehensive clauses in your policies that outline advertising, affiliate links, payment processing and many other important topics not available in the basic policies."
                                            onclick="return false"
                                            href="pricing#"
                                        >
                                            &nbsp;
                                        </a>
                                    </span>
                                </li>
                                <li>
                                    <img width="20" height="20" alt="Yes" src="{{ asset('assets/images/feature-yes.png')}}" />
                                    <span class="icon-text icon-policies-feature-yes">
                                        Suitable for commercial use
                                        <a
                                            class="feature-help"
                                            data-role="modal"
                                            data-type="html"
                                            data-src="Our premium policies are a perfect solution for any type of online business including bloggers, consultants, entrepreneurs, fitness and health professionals, and many more. Save time and let us worry about the legal stuff while you focus on what you do best."
                                            onclick="return false"
                                            href="pricing#"
                                        >
                                            &nbsp;
                                        </a>
                                    </span>
                                </li>
                                <li>
                                    <img width="20" height="20" alt="Yes" src="{{ asset('assets/images/feature-yes.png')}}" />
                                    <span class="icon-text icon-policies-feature-yes">
                                        Remove Draftly branding
                                        <a
                                            class="feature-help"
                                            data-role="modal"
                                            data-type="html"
                                            data-src="Showcase your professionalism and boost your own brand reputation by not displaying our branding within your policies."
                                            onclick="return false"
                                            href="pricing#"
                                        >
                                            &nbsp;
                                        </a>
                                    </span>
                                </li>
                                <li>
                                    <img width="20" height="20" alt="Yes" src="{{ asset('assets/images/feature-yes.png')}}" />
                                    <span class="icon-text icon-policies-feature-yes">
                                        Free lifetime automatic updates
                                        <a
                                            class="feature-help"
                                            data-role="modal"
                                            data-type="html"
                                            data-src="With our free lifetime updates you&#39;ll never have to worry about ever-changing laws, government regulations and various legal requirements."
                                            onclick="return false"
                                            href="pricing#"
                                        >
                                            &nbsp;
                                        </a>
                                    </span>
                                </li>
                            </ul>
                            <p class="text-center"><a class="button gtm-cta" data-event-label="premium" href="create">Get started</a></p>
                        </div>
                    </div>

                    <div class="bundle text-center" bis_skin_checked="1">
                        Looking for the complete legal compliance and protection? Save over 50% with our <a class="underline ul-purple gtm-cta" data-event-label="v1" href="/bundle">bundle packages</a>,
                        available for a limited time only!
                    </div>

                    <div class="moneyback-box text-center" bis_skin_checked="1">
                        <img class="fluid" height="100" width="100" src="{{ asset('assets/images/money-back.png')}}" alt="" />
                        <h4>100% No-Risk Money Back Guarantee</h4>
                        <p>Although we don't think you'll ever want one, we'll gladly provide a refund if it's requested within 7 days of purchase.</p>
                    </div>
                </div>
            </div>

            <div class="section testimonials shade1" bis_skin_checked="1">
                <div class="container" bis_skin_checked="1">
                    <h2 class="text-center">Hundreds of <span class="underline ul-yellow">Five-Star Ratings</span></h2>
                    <div class="plugin-testimonials" bis_skin_checked="1">
                        <div class="row" bis_skin_checked="1">
                            <div class="col-ms-12 col-md-4" bis_skin_checked="1">
                                <blockquote class="images">
                                    <p class="message">
                                        There are a lot of other free policy generators online but almost all of them are hideous and just trying to make a quick buck off of AdSense. That’s not the case with Draftly so kudos to the
                                        owners!
                                    </p>
                                    <div class="author" bis_skin_checked="1">
                                        <figure class="testimonial">
                                            <div class="image" bis_skin_checked="1">
                                                <img alt="Brian Jackson" width="250" height="250" src="{{ asset('assets/images/i1fhgbvdgwa41k48ol5j_l.jpg')}}" class="lazyload loaded" style="max-width: 250px;" />
                                            </div>
                                        </figure>
                                        <p class="about">
                                            <span class="name">Brian Jackson</span>
                                            <span class="rating"></span>
                                        </p>
                                    </div>
                                </blockquote>
                            </div>
                            <div class="col-ms-12 col-md-4" bis_skin_checked="1">
                                <blockquote class="images">
                                    <p class="message">
                                        Draftly is indeed a great service you can use to generate privacy policy and other legal documents you need for your website. I found it easy to use and very professional. Don't hesitate to
                                        give them a try.
                                    </p>
                                    <div class="author" bis_skin_checked="1">
                                        <figure class="testimonial">
                                            <div class="image" bis_skin_checked="1">
                                                <img alt="Erik Emanuelli" width="250" height="250" src="{{ asset('assets/images/5lr07x0frhn0rxykpiyg_l.jpg')}}" class="lazyload loaded" style="max-width: 250px;" />
                                            </div>
                                        </figure>
                                        <p class="about">
                                            <span class="name">Erik Emanuelli</span>
                                            <span class="rating"></span>
                                        </p>
                                    </div>
                                </blockquote>
                            </div>
                            <div class="col-ms-12 col-md-4" bis_skin_checked="1">
                                <blockquote class="images">
                                    <p class="message">
                                        With Draftly it’s easy to create legal documents for your site that match up with your site practices because each user is walked through a questionnaire, which breaks down the fine details.
                                    </p>
                                    <div class="author" bis_skin_checked="1">
                                        <figure class="testimonial">
                                            <div class="image" bis_skin_checked="1">
                                                <img alt="Zac Johnson" width="250" height="250" src="{{ asset('assets/images/mby7tgh37fauxzoi6fje_l.jpg')}}" class="lazyload loaded" style="max-width: 250px;" />
                                            </div>
                                        </figure>
                                        <p class="about">
                                            <span class="name">Zac Johnson</span>
                                            <span class="rating"></span>
                                        </p>
                                    </div>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section faq" bis_skin_checked="1">
                <div class="container" bis_skin_checked="1">
                    <h2 class="text-center margin-bottom-large">Frequently asked questions</h2>
                    <div class="row" bis_skin_checked="1">
                        <div class="col-ms-12 col-md-6" bis_skin_checked="1">
                            <h5>Will my policies get updates when laws change?</h5>
                            <p>Yes, premium policies will receive free lifetime updates. Basic policies will not get any updates.</p>

                            <h5>Do you offer discounts for multiple premium policies?</h5>
                            <p>Yes, you may save <span class="underline ul-purple">over 50%</span> by purchasing multiple policies with our <a href="bundle">bundle discounts</a>.</p>

                            <h5>Will the policies be valid in my country?</h5>
                            <p>Yes, your policy disclosures will be based on the location you provide in the questionnaire.</p>

                            <h5>When will I be able to download my policy?</h5>
                            <p>You'll be able to download it as soon as you complete the questionnaire.</p>
                        </div>
                        <div class="col-ms-12 col-md-6" bis_skin_checked="1">
                            <h5>Do your policies comply with the CCPA and GDPR?</h5>
                            <p>Yes, our policies are fully compliant with the CCPA and GDPR requirements.</p>

                            <h5>Do you offer refunds for premium policies?</h5>
                            <p>Yes, if you're unhappy with your policy for any reason we will issue a <a data-role="modal" data-src="#refund-modal" onclick="return false" href="pricing#">full refund</a>.</p>

                            <h5>Can you host my policies for me?</h5>
                            <p>Yes, we can host your policies for you on our own servers at no extra charge to you.</p>

                            <h5>Have more questions?</h5>
                            <p><a href="contact">Get in touch</a> with us and we'll be happy to assist you.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section start shade1 text-center" bis_skin_checked="1">
                <div class="container" bis_skin_checked="1">
                    <div class="feature" bis_skin_checked="1">
                        <div class="row" bis_skin_checked="1">
                            <div class="col-ms-12" bis_skin_checked="1">
                                <h2>Ready to get started?</h2>
                                <p>It takes only a few minutes to create legal agreements for your website or mobile app. No credit card required.</p>
                                <a class="button cta" href="create">Get started</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="refund-modal" class="refund-modal" style="display: none;" bis_skin_checked="1">
                <h3>100% Money Back Guarantee</h3>
                <p>
                    We're so convinced you'll absolutely love our easy to use service, that we're willing to offer you an unconditional and risk-free 7-day money back guarantee. If at any time within 7 days of making the purchase you are
                    unhappy, simply let us know and we'll refund your money.
                </p>
                <ul class="buttons">
                    <li><a onclick="$.fancybox.close(); return false;" class="button" href="pricing#">Close</a></li>
                </ul>
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