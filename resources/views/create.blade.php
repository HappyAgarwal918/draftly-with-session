 @extends('layouts.master')

 @section('create')


<!DOCTYPE html>
<!-- saved from url=(0038)create -->
<html lang="en">
    <script type="text/javascript" async="" src="{{ asset('assets/js/bat.js')}}"></script>
    <script type="text/javascript" async="" src="{{ asset('assets/js/analytics.js')}}"></script>
    <script type="text/javascript" async="" src="{{ asset('assets/js/analytics.js')}}"></script>
    <script async="" src="{{ asset('assets/js/app.js')}}" charset="UTF-8" crossorigin="*"></script>
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
        <title>What would you like to create?</title>
        <meta name="description" content="Use our free automated wizard to create essential terms and policies for your website, mobile app, and business in 5 simple steps." />
        <script src="{{ asset('assets/js/1609791099.js')}}"></script>
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
        <meta property="og:type" content="article" />
        <meta property="og:title" content="What would you like to create?" />
        <meta property="og:description" content="Use our free automated wizard to create essential terms and policies for your website, mobile app, and business in 5 simple steps." />
        <meta property="og:url" content="create" />
        <meta name="twitter:image" content="uploads/p/h/7/g/1y9eg2ur9hegs3x1s2nd.png" />
        <meta name="twitter:card" content="summary" />
        <meta name="twitter:title" content="What would you like to create?" />
        <meta name="twitter:description" content="Use our free automated wizard to create essential terms and policies for your website, mobile app, and business in 5 simple steps." />
        <meta name="twitter:url" content="create" />
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
            #eKd5A14-1611223833819 {
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
            #P8V85a1-1611223833821.open {
                animation: tawkMaxOpen 0.25s ease !important;
            }
        </style>
    </head>
    
    <body
        class="guest create policies_wizard index"
        bis_register="W3sibWFzdGVyIjp0cnVlLCJleHRlbnNpb25JZCI6ImVwcGlvY2VtaG1ubGJoanBsY2drb2ZjaWllZ29tY29uIiwiYWRibG9ja2VyU3RhdHVzIjp7IkRJU1BMQVkiOiJlbmFibGVkIiwiRkFDRUJPT0siOiJlbmFibGVkIiwiVFdJVFRFUiI6ImVuYWJsZWQifSwidmVyc2lvbiI6IjEuOC4wIiwic2NvcmUiOjEwODAwMH1d"
    >
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NS2X6F" height="0" width="0" style="display: none; visibility: hidden;"></iframe></noscript>
        

        <div class="section sub-hero" bis_skin_checked="1">
            <div class="container" bis_skin_checked="1">
                <div class="row" bis_skin_checked="1">
                    <div class="col-ms-12" bis_skin_checked="1">
                        <h1>What would you like to create?</h1>
                    </div>
                </div>
            </div>
        </div>

        <div id="container" bis_skin_checked="1">
            <div class="container" bis_skin_checked="1">
                <div class="row" bis_skin_checked="1">
                    <div id="content" class="col-ms-12" bis_skin_checked="1">
                        <div class="plugin-policies wizard create section policies" bis_skin_checked="1">
                            <div class="row text-left" bis_skin_checked="1">
                                <div class="col-ms-12 col-sm-6" bis_skin_checked="1">
                                    <a class="image" href="acceptable-use-policy">
                                        <img class="fluid" width="100" height="100" alt="Create acceptable use policy" src="{{ asset('assets/images/acceptable-use-policy.png')}}" />
                                    </a>
                                    <div class="text" bis_skin_checked="1">
                                        <h4>Acceptable use policy</h4>
                                        <p>
                                            An acceptable use policy is a set of rules that define what may or may not be done with the assets and data within your website, network, or service. It's meant to protect you and your company
                                            against abuse and overuse of the resources.
                                        </p>
                                        <a href="/acceptable-use-policy?form-id=<?php echo uniqid(); ?>" class="button submit" type="submit" name="submit">Create acceptable use policy</a>
                                           
                                    </div>
                                </div>
                                <div class="col-ms-12 col-sm-6" bis_skin_checked="1">
                                    <a class="image" href="cookie-policy">
                                        <img class="fluid" width="100" height="100" alt="Create cookie policy" src="{{ asset('assets/images/cookie-policy.png')}}" />
                                    </a>
                                    <div class="text" bis_skin_checked="1">
                                        <h4>Cookie policy</h4>
                                        <p>
                                            A cookie policy outlines the types of cookies and other tracking technologies used on your website, what they do, and how they are used. You are required by the EU law to have a cookie policy and
                                            notify visitors that your site uses them.
                                        </p>
                                        <a href="/cookie-policyy?form-id=<?php echo uniqid(); ?>" class="button submit" type="submit" name="submit">Create cookie policy</a>
                                    </div>
                                </div>
                                <div class="clearfix hidden-ms visible-sm" bis_skin_checked="1"></div>

                                <div class="col-ms-12 col-sm-6" bis_skin_checked="1">
                                    <a class="image" href="cookie-consent-banner">
                                        <img class="fluid" width="100" height="100" alt="Create cookie consent banner" src="{{ asset('assets/images/cookie-consent-banner.png')}}" />
                                    </a>
                                    <div class="text" bis_skin_checked="1">
                                        <h4>Cookie consent banner</h4>
                                        <p>
                                            Generate and display a cookie permissions pop-up on your site using our lightweight and customizable free cookie consent banner plugin. Handle the GDPR legislation and EU cookies directive without
                                            spending money on a developer.
                                        </p>
                                        <p><a class="button" href="cookie-consent-banner">Create cookie consent banner</a></p>
                                    </div>
                                </div>
                                <div class="col-ms-12 col-sm-6" bis_skin_checked="1">
                                    <a class="image" href="disclaimer">
                                        <img class="fluid" width="100" height="100" alt="Create disclaimer" src="{{ asset('assets/images/disclaimer.png')}}" />
                                    </a>
                                    <div class="text" bis_skin_checked="1">
                                        <h4>Disclaimer</h4>
                                        <p>
                                            A disclaimer is often described as a common method used by website owners in order to limit their liability on their website. The main purpose of a disclaimer is to make sure the information on
                                            your website will not be improperly relied upon.
                                        </p>
                                        <a href="/disclaimer?form-id=<?php echo uniqid(); ?>" class="button submit" type="submit" name="submit">Create disclaimer</a>
                                    </div>
                                </div>
                                <div class="clearfix hidden-ms visible-sm" bis_skin_checked="1"></div>

                                <div class="col-ms-12 col-sm-6" bis_skin_checked="1">
                                    <a class="image" href="dmca-policy">
                                        <img class="fluid" width="100" height="100" alt="Create DMCA policy" src="{{ asset('assets/images/dmca-policy.png')}}" />
                                    </a>
                                    <div class="text" bis_skin_checked="1">
                                        <h4>DMCA policy</h4>
                                        <p>
                                            A DMCA policy protects your business from copyright infringements and potentially expensive lawsuits. It addresses the rights and obligations of copyrighted material owners who believe their
                                            rights have been infringed.
                                        </p>
                                        <a href="/dmca-policy?form-id=<?php echo uniqid(); ?>" class="button submit" type="submit" name="submit">Create DMCA policy</a>
                                    </div>
                                </div>
                                <div class="col-ms-12 col-sm-6" bis_skin_checked="1">
                                    <a class="image" href="privacy-policy">
                                        <img class="fluid" width="100" height="100" alt="Create privacy policy" src="{{ asset('assets/images/privacy-policy.png')}}" />
                                    </a>
                                    <div class="text" bis_skin_checked="1">
                                        <h4>Privacy policy</h4>
                                        <p>
                                            A privacy policy is a document that discloses some or all of the ways your website or product gathers, uses, discloses, and manages a customer or client's data. It fulfills a legal requirement to
                                            protect a customer or client's privacy.
                                        </p>
                                        <a href="/privacy-policy?form-id=<?php echo uniqid(); ?>" class="button submit" type="submit" name="submit">Create privacy policy</a>
                                    </div>
                                </div>
                                <div class="clearfix hidden-ms visible-sm" bis_skin_checked="1"></div>

                                <div class="col-ms-12 col-sm-6" bis_skin_checked="1">
                                    <a class="image" href="refund-policy">
                                        <img class="fluid" width="100" height="100" alt="Create refund policy" src="{{ asset('assets/images/refund-policy.png')}}" />
                                    </a>
                                    <div class="text" bis_skin_checked="1">
                                        <h4>Refund policy</h4>
                                        <p>
                                            A good refund policy can help protect your company and win your customers' trust. Refund policy outlines the requirements and steps your customers need to take in order to return or exchange
                                            purchased product and receive a refund.
                                        </p>
                                        <a href="/refund-policy?form-id=<?php echo uniqid(); ?>" class="button submit" type="submit" name="submit">Create refund policy</a>
                                    </div>
                                </div>
                                <div class="col-ms-12 col-sm-6" bis_skin_checked="1">
                                    <a class="image" href="terms-and-conditions">
                                        <img class="fluid" width="100" height="100" alt="Create terms and conditions" src="{{ asset('assets/images/terms-conditions.png')}}" />
                                    </a>
                                    <div class="text" bis_skin_checked="1">
                                        <h4>Terms and conditions</h4>
                                        <p>
                                            Terms and conditions (also known as terms of use and terms of service) are a set of guidelines and rules which one must agree to abide by in order to use your website or product. Terms and
                                            conditions are legally binding for both parties.
                                        </p>
                                        <a href="/terms-and-conditions?form-id=<?php echo uniqid(); ?>" class="button submit" type="submit" name="submit">Create terms and conditions</a>
                                    </div>
                                </div>
                                <div class="clearfix hidden-ms visible-sm" bis_skin_checked="1"></div>
                            </div>
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