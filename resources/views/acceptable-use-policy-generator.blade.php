@extends('layouts.master')

@section('acceptable-use-policy-generator')

<!DOCTYPE html>
<html lang="en">
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
            window.dataLayer.push({ stVar1: 3 }, { stVar3: 4 });
        </script>
        <link rel="dns-prefetch" href="https://www.google-analytics.com/" />
        <link rel="dns-prefetch" href="https://www.googletagmanager.com/" />
        <link rel="dns-prefetch" href="https://bat.bing.com/" />
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
        <link rel="alternate" type="application/rss+xml" title="WebsitePolicies.com Feed" href="feed" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Free Acceptable Use Policy Generator [Establish Clear Rules]</title>
        <meta name="description" content="Generate a professional attorney-drafted Acceptable Use Policy tailored specifically for your website and business to avoid abuse and overuse." />
        <script src="{{ asset('assets/js/1611587689.js')}}"></script>
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
        <meta property="og:image" content="uploads/0/f/h/6/dlyxpfzr3kku213xne15_x.png" />
        <meta property="og:type" content="article" />
        <meta property="og:title" content="Free Acceptable Use Policy Generator [Establish Clear Rules]" />
        <meta property="og:description" content="Generate a professional attorney-drafted Acceptable Use Policy tailored specifically for your website and business to avoid abuse and overuse." />
        <meta property="og:url" content="acceptable-use-policy-generator" />
        <meta property="article:published_time" content="2019-08-29T12:37:45+00:00" />
        <meta name="twitter:image" content="uploads/0/f/h/6/dlyxpfzr3kku213xne15_x.png" />
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:title" content="Free Acceptable Use Policy Generator [Establish Clear Rules]" />
        <meta name="twitter:description" content="Generate a professional attorney-drafted Acceptable Use Policy tailored specifically for your website and business to avoid abuse and overuse." />
        <meta name="twitter:url" content="acceptable-use-policy-generator" />
    </head>

    <body
        class="guest acceptable-use-policy-generator pages index"
        bis_register="W3sibWFzdGVyIjp0cnVlLCJleHRlbnNpb25JZCI6ImVwcGlvY2VtaG1ubGJoanBsY2drb2ZjaWllZ29tY29uIiwiYWRibG9ja2VyU3RhdHVzIjp7IkRJU1BMQVkiOiJlbmFibGVkIiwiRkFDRUJPT0siOiJlbmFibGVkIiwiVFdJVFRFUiI6ImVuYWJsZWQifSwidmVyc2lvbiI6IjEuOC4wIiwic2NvcmUiOjEwODAwMH1d"
    >
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NS2X6F" height="0" width="0" style="display: none; visibility: hidden;"></iframe></noscript>
       

        <div class="section hero acceptable-use-policy-generator" bis_skin_checked="1">
            <div class="container" bis_skin_checked="1">
                <div class="row" bis_skin_checked="1">
                    <div class="col-ms-12 col-md-7" bis_skin_checked="1">
                        <div class="text text-center" bis_skin_checked="1">
                            <h1>Attorney-Drafted Acceptable Use Policy Generator</h1>
                            <p>Create an acceptable use policy custom-tailored to your needs in minutes to set out clear rules and guidelines for the use of your products and services to prevent abuse.</p>
                            <div class="cta" bis_skin_checked="1">
                                <a class="button cta gtm-cta" data-event-label="hero" href="acceptable-use-policy">Get started</a>
                            </div>
                        </div>
                    </div>
                    <div class="hidden-ms visible-md col-md-5" bis_skin_checked="1">
                        <div class="image" bis_skin_checked="1">
                            <img
                                class="fluid"
                                width="434"
                                height="310"
                                alt="Free Acceptable Use Policy Generator"
                                title="Free Acceptable Use Policy Generator"
                                src="{{ asset('assets/images/acceptable-use-policy-generator.png')}}"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section steps" bis_skin_checked="1">
            <div class="container" bis_skin_checked="1">
                <div class="row" bis_skin_checked="1">
                    <div class="col-ms-12" bis_skin_checked="1">
                        <h2>Generate Acceptable Use Policy in <span class="underline ul-green">3 Easy Steps</span></h2>
                        <div class="row" bis_skin_checked="1">
                            <div class="col-ms-12 col-sm-4 step1" bis_skin_checked="1">
                                <p>
                                    <img
                                        class="fluid wide wide lazyload loaded"
                                        width="100"
                                        height="100"
                                        alt="Select platform"
                                        src="{{ asset('assets/images/platform.png')}}"
                                        style="max-width: 100px;"
                                    />
                                </p>
                                <h4>Choose platform</h4>
                                <p>Select the platform you use and the type of website, app and business you have</p>
                            </div>
                            <div class="col-ms-12 col-sm-4 step2" bis_skin_checked="1">
                                <p>
                                    <img
                                        class="fluid wide wide lazyload loaded"
                                        width="100"
                                        height="100"
                                        alt="Fill out questionnaire"
                                        src="{{ asset('assets/images/questionnaire.png')}}"
                                        style="max-width: 100px;"
                                    />
                                </p>
                                <h4>Customize policy</h4>
                                <p>Fill in the questionnaire and describe your business and how you operate it</p>
                            </div>
                            <div class="col-ms-12 col-sm-4 step3" bis_skin_checked="1">
                                <p>
                                    <img
                                        class="fluid wide wide lazyload loaded"
                                        width="100"
                                        height="100"
                                        alt="Download and publish"
                                        src="{{ asset('assets/images/publish.png')}}"
                                        style="max-width: 100px;"
                                    />
                                </p>
                                <h4>Download &amp; publish</h4>
                                <p>Download, view and publish your custom-made acceptable use policy instantly</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section usage shade1" bis_skin_checked="1">
            <div class="container" bis_skin_checked="1">
                <div class="row" bis_skin_checked="1">
                    <div class="col-ms-12 col-xs-4" bis_skin_checked="1">
                        <p>
                            <img width="50" height="50" alt="Select platform" src="{{ asset('assets/images/policies.png')}}" class="lazyload loaded" style="max-width: 50px;" />
                            <span>150,000+</span> policies created
                        </p>
                    </div>
                    <div class="col-ms-12 col-xs-4" bis_skin_checked="1">
                        <p>
                            <img width="50" height="50" alt="Select platform" src="{{ asset('assets/images/customers.png')}}" class="lazyload loaded" style="max-width: 50px;" />
                            <span>75,000+</span> customers who trust us
                        </p>
                    </div>
                    <div class="col-ms-12 col-xs-4" bis_skin_checked="1">
                        <p>
                            <img width="50" height="50" alt="Select platform" src="{{ asset('assets/images/countries.png')}}" class="lazyload loaded" style="max-width: 50px;" />
                            <span>100+</span> supported countries
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="section features" bis_skin_checked="1">
            <div class="container" bis_skin_checked="1">
                <h2 class="text-center margin-bottom-large"><span class="underline ul-red">Never Worry</span> About The Legal Stuff Again</h2>
                <div class="row" bis_skin_checked="1">
                    <div class="col-ms-12 col-md-6" bis_skin_checked="1">
                        <div class="row" bis_skin_checked="1">
                            <div class="col-ms-12 col-xs-4 col-sm-3 image" bis_skin_checked="1">
                                <p>
                                    <img
                                        class="fluid wide wide lazyload loaded"
                                        width="100"
                                        height="100"
                                        alt="Custom-made legal agreements"
                                        src="{{ asset('assets/images/customize.png')}}"
                                        style="max-width: 100px;"
                                    />
                                </p>
                            </div>
                            <div class="col-ms-12 col-xs-8 col-sm-9 text" bis_skin_checked="1">
                                <h3>No more generic templates</h3>
                                <p>
                                    Only you, the owner, can accurately describe your website, mobile app and business and how you manage and operate them. Every acceptable use policy that we generate is unique and built around the
                                    information you provide for the best results.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-ms-12 col-md-6" bis_skin_checked="1">
                        <div class="row" bis_skin_checked="1">
                            <div class="col-ms-12 col-xs-4 col-sm-3 image col-xs-push-8 col-sm-push-9 col-md-push-0" bis_skin_checked="1">
                                <p>
                                    <img
                                        class="fluid wide wide lazyload loaded"
                                        width="100"
                                        height="100"
                                        alt="Save thousands on legal fees"
                                        src="{{ asset('assets/images/save.png')}}"
                                        style="max-width: 100px;"
                                    />
                                </p>
                            </div>
                            <div class="col-ms-12 col-xs-8 col-sm-9 text col-xs-pull-4 col-sm-pull-3 col-md-pull-0" bis_skin_checked="1">
                                <h3>Save thousands on legal fees</h3>
                                <p>
                                    Our attorney-drafted acceptable use policies are completely free for personal and non-commercial use. We also offer premium policies with access to additional disclosures and upgraded features at a
                                    fraction of the cost of hiring a lawyer.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" bis_skin_checked="1">
                    <div class="col-ms-12 col-md-6" bis_skin_checked="1">
                        <div class="row" bis_skin_checked="1">
                            <div class="col-ms-12 col-xs-4 col-sm-3 image" bis_skin_checked="1">
                                <p>
                                    <img
                                        class="fluid wide wide lazyload loaded"
                                        width="100"
                                        height="100"
                                        alt="Protect yourself and your business"
                                        src="{{ asset('assets/images/protect.png')}}"
                                        style="max-width: 100px;"
                                    />
                                </p>
                            </div>
                            <div class="col-ms-12 col-xs-8 col-sm-9 text" bis_skin_checked="1">
                                <h3>Protect yourself and your business</h3>
                                <p>
                                    As a service provider, you are responsible for all activities taking place on your website or services. Outline clear rules, limitations and prohibited uses to help prevent abuse, protect yourself and
                                    your customers, and ensure optimal operation of your business.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-ms-12 col-md-6" bis_skin_checked="1">
                        <div class="row" bis_skin_checked="1">
                            <div class="col-ms-12 col-xs-4 col-sm-3 image col-xs-push-8 col-sm-push-9 col-md-push-0" bis_skin_checked="1">
                                <p>
                                    <img
                                        class="fluid wide wide lazyload loaded"
                                        width="100"
                                        height="100"
                                        alt="Copy the documents or host them with us"
                                        src="{{ asset('assets/images/host.png')}}"
                                        style="max-width: 100px;"
                                    />
                                </p>
                            </div>
                            <div class="col-ms-12 col-xs-8 col-sm-9 text col-xs-pull-4 col-sm-pull-3 col-md-pull-0" bis_skin_checked="1">
                                <h3>Copy or host the documents</h3>
                                <p>
                                    We can host your generated acceptable use policy for you for free so you don't have to worry about technical details. If you don't want that and would like to have full control over your documents, you
                                    can easily copy the policies to your site or app as well.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" bis_skin_checked="1">
                    <div class="col-ms-12 col-md-6" bis_skin_checked="1">
                        <div class="row" bis_skin_checked="1">
                            <div class="col-ms-12 col-xs-4 col-sm-3 image" bis_skin_checked="1">
                                <p>
                                    <img
                                        class="fluid wide wide lazyload loaded"
                                        width="100"
                                        height="100"
                                        alt="Get automatic updates"
                                        src="{{ asset('assets/images/updates.png')}}"
                                        style="max-width: 100px;"
                                    />
                                </p>
                            </div>
                            <div class="col-ms-12 col-xs-8 col-sm-9 text" bis_skin_checked="1">
                                <h3>Automatic updates</h3>
                                <p>
                                    With so many different and ever-changing laws it can be a daunting task to stay up to date with the latest legal requirements. Let us do the hard work and notify you of the new changes while you focus on
                                    running and improving your product and business.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-ms-12 col-md-6" bis_skin_checked="1">
                        <div class="row" bis_skin_checked="1">
                            <div class="col-ms-12 col-xs-4 col-sm-3 image col-xs-push-8 col-sm-push-9 col-md-push-0" bis_skin_checked="1">
                                <p>
                                    <img
                                        class="fluid wide wide lazyload loaded"
                                        width="100"
                                        height="100"
                                        alt="Global coverage"
                                        src="{{ asset('assets/images/global.png')}}"
                                        style="max-width: 100px;"
                                    />
                                </p>
                            </div>
                            <div class="col-ms-12 col-xs-8 col-sm-9 text col-xs-pull-4 col-sm-pull-3 col-md-pull-0" bis_skin_checked="1">
                                <h3>Global coverage</h3>
                                <p>
                                    We make every effort to cover every country's laws and regulations by adopting the strictest guidelines implemented in each country. Just tell us where you operate and we'll build a custom-tailored policy
                                    accordingly just for you.
                                </p>
                            </div>
                        </div>
                    </div>
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
                                            <img
                                                alt="Brian Jackson"
                                                width="250"
                                                height="250"
                                                src="{{ asset('assets/images/i1fhgbvdgwa41k48ol5j_l.jpg')}}"
                                                class="lazyload loaded"
                                                style="max-width: 250px;"
                                            />
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
                                    Draftly is indeed a great service you can use to generate privacy policy and other legal documents you need for your website. I found it easy to use and very professional. Don't hesitate to give
                                    them a try.
                                </p>
                                <div class="author" bis_skin_checked="1">
                                    <figure class="testimonial">
                                        <div class="image" bis_skin_checked="1">
                                            <img
                                                alt="Erik Emanuelli"
                                                width="250"
                                                height="250"
                                                src="{{ asset('assets/images/5lr07x0frhn0rxykpiyg_l.jpg')}}"
                                                class="lazyload loaded"
                                                style="max-width: 250px;"
                                            />
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
                                            <img
                                                alt="Zac Johnson"
                                                width="250"
                                                height="250"
                                                src="{{ asset('assets/images/mby7tgh37fauxzoi6fje_l.jpg')}}"
                                                class="lazyload loaded"
                                                style="max-width: 250px;"
                                            />
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

        <div class="section start text-center" bis_skin_checked="1">
            <div class="container" bis_skin_checked="1">
                <div class="row" bis_skin_checked="1">
                    <div class="col-ms-12" bis_skin_checked="1">
                        <h2>Ready to <span class="underline ul-purple">Get Started</span>?</h2>
                        <p>It takes only a few minutes to create an acceptable use policy for your website or mobile app. No credit card required.</p>
                        <a class="button cta" href="acceptable-use-policy">Get started</a>
                    </div>
                </div>
            </div>
        </div>

      
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