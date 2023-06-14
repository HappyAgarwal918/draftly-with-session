@extends('layouts.master')

@section('testimonials')



<!DOCTYPE html>
<!-- saved from url=(0044)testimonials -->
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
        <link rel="alternate" type="application/rss+xml" title="websitepolicies.com Feed" href="blog/feed" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>What Our Customers Say About Us - Draftly Reviews</title>
        <meta name="description" content="Check out these honest reviews straight from our customers to see why over 75,000 of them love and trust us with their business." />
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
        <meta name="twitter:image" content="uploads/p/h/7/g/1y9eg2ur9hegs3x1s2nd.png" />
    </head>

    <body
        class="guest testimonials index"
        bis_register="W3sibWFzdGVyIjp0cnVlLCJleHRlbnNpb25JZCI6ImVwcGlvY2VtaG1ubGJoanBsY2drb2ZjaWllZ29tY29uIiwiYWRibG9ja2VyU3RhdHVzIjp7IkRJU1BMQVkiOiJlbmFibGVkIiwiRkFDRUJPT0siOiJlbmFibGVkIiwiVFdJVFRFUiI6ImVuYWJsZWQifSwidmVyc2lvbiI6IjEuOC4wIiwic2NvcmUiOjEwODAwMH1d"
    >
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NS2X6F" height="0" width="0" style="display: none; visibility: hidden;"></iframe></noscript>
        

        <div class="section sub-hero" bis_skin_checked="1">
            <div class="container" bis_skin_checked="1">
                <div class="row" bis_skin_checked="1">
                    <div class="col-ms-12" bis_skin_checked="1">
                        <h1>Testimonials</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="section shade1 payments text-center" bis_skin_checked="1">
            <div class="container" bis_skin_checked="1">
                <div class="row" bis_skin_checked="1">
                    <div class="col-ms-12" bis_skin_checked="1">
                        <h3>Don’t just take our words. See what our customers are saying.</h3>
                        <p>Read honest reviews straight from our customers to see why over 75,000 websites and apps use and rely on our trusted legal agreements.</p>
                        <a class="button cta gtm-cta" href="create">Get started</a>
                    </div>
                </div>
            </div>
        </div>

        <div id="container" bis_skin_checked="1">
            <div class="container" bis_skin_checked="1">
                <div class="row" bis_skin_checked="1">
                    <div id="content" class="col-ms-12" bis_skin_checked="1">
                        <div class="plugin-testimonials testimonials-index" bis_skin_checked="1">
                            <div class="masonry testimonials" id="infinitescroll-testimonials-container" bis_skin_checked="1">
                                <div class="brick infinitescroll-page-1" id="row-article-445" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            Exceptional service from Draftly. They make it so easy. They have comprehensive packages for any type of web-based business and I have peace of mind that the legal side is covered. 5*
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Anna Andrews"
                                                        width="250"
                                                        height="250"
                                                        src="{{ asset('assets/images/1609793176835-6607.jpg')}}"
                                                        class="lazyload loaded"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Anna Andrews</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-446" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Policies are always a bit tricky, but this covers you well.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Theilmann"
                                                        width="250"
                                                        height="250"
                                                        src="{{ asset('assets/images/1609778704873-568.jpg')}}"
                                                        class="lazyload loaded"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Theilmann</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-447" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            Highly recommend Draftly. First time launching a business and I didn’t know I needed a policy and I was really confused. Applying for my policy was straightforward and affordable. Simply
                                            answer the questions asked and pay. Thank You.
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Chelsea Murphy"
                                                        width="250"
                                                        height="250"
                                                        src="{{ asset('assets/images/1609708100299-4935.jpg')}}"
                                                        class="lazyload loaded"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Chelsea Murphy</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-448" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            I recently purchased terms &amp; conditions in addition to a privacy policy for my Fitness App that I will be launching in the next few weeks. The services provided were so clear and straight
                                            forward for me to complete. I am very satisfied!
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Joss Garnier"
                                                        width="250"
                                                        height="250"
                                                        src="{{ asset('assets/images/1609673843721-9254.jpg')}}"
                                                        class="lazyload loaded"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Joss Garnier</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-449" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            Very easy to use and affordable. Lega policies are something I always forget about until the last minute. I told them what I needed, paid for only what I needed, and that was it.
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="samantha rambo"
                                                        width="250"
                                                        height="250"
                                                        src="{{ asset('assets/images/1608645232665-8196.jpg')}}"
                                                        class="lazyload loaded"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">samantha rambo</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-450" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">It only took a few minutes to build the disclaimer that I need for my new site. Thank you</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Nancy Nichols-Miller"
                                                        width="250"
                                                        height="250"
                                                        src="{{ asset('assets/images/1608190021906-4958.jpg')}}"
                                                        class="lazyload loaded"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Nancy Nichols-Miller</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-435" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            I was thrilled to find Draftly.org because they make website legal policies so easy, quick, professional, and inexpensive. The policies their software generated for my website are very
                                            thorough. I highly recommend this company.
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Stacy Kestly Martin"
                                                        width="250"
                                                        height="250"
                                                        src="{{ asset('assets/images/1607518988963-2968.jpg')}}"
                                                        class="lazyload loaded"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Stacy Kestly Martin</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-436" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">As an efficiency-enhancing start-up, we were looking for an intuitive, fast, and affordable way to get our policies done. Draftly delivered exactly that and even more.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Christian Düsi"
                                                        width="250"
                                                        height="250"
                                                        src="{{ asset('assets/images/1607512583212-7138.jpg')}}"
                                                        class="lazyload loaded"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Christian Düsi</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-451" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">It was quick and easy to get my website policies up on my site. And I can have peace of mind I’ve satisfied the requirements.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Kamsin Kaneko"
                                                        width="250"
                                                        height="250"
                                                        src="{{ asset('assets/images/1607161159019-9794.jpg')}}"
                                                        class="lazyload loaded"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Kamsin Kaneko</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-437" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Very simple process, it took 10 mins and I uploaded the new terms and conditions to my website. Well done!</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Graeme M"
                                                        width="250"
                                                        height="250"
                                                        src="{{ asset('assets/images/1606929138135-3269.jpg')}}"
                                                        class="lazyload loaded"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Graeme M</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-438" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Super fast delivery and brilliant result. I was happy to find this service to get peace of mind by including Terms and Conditions and a Privacy Policy on my website.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Zsofia Vera"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1606237029400-8483.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Zsofia Vera</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-439" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Saved me so much time and it is well written. Warm and clear. Much better than anything I could have written!</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Sharon Christine McNeil"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1606014423388-5932.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Sharon Christine McNeil</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-440" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            Draftly made the creation and population of a terms and conditions document hassle-free. A must for any business that needs a simple document that doesn't warrant the expense of a
                                            solicitor to complete.
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Anthony McMahon"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1605826376569-155.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Anthony McMahon</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-441" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            This service is almost too good to be true! Thank you to the developers. I have a thorough privacy policy for my FB Group and website, that took me less than 5 minutes to create.
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Frederick K Newcombe"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1605549295905-6639.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Frederick K Newcombe</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-442" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Excellent customer service, good policies, thank you.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Anna Drozdowska"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1606014423394-3403.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Anna Drozdowska</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-443" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            Fantastic service. Huge relief and fast option to install on my site. Relieved to know the policies are up to date and meet legal requirements. Quick and easy and you don't need to be a techie to
                                            install. Thank you
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Narrae Crowley"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1605420587234-2108.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Narrae Crowley</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-422" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Great way to save your writing policy for your websites and mobile apps</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Naij Home"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1604060822035-2370.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Naij Home</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-423" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Worked out so well! Thanks guys!</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Steve Sommerfeld"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1604060822038-4722.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Steve Sommerfeld</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-444" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Super easy and extremely intuitive. Highly recommend.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="paul burkemper"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1603993865996-557.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">paul burkemper</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-424" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            By using your service. It had saved me a great deal of time and money. I am so glad that I can move forward and launch my website. With the confidence that these terms and policies are in place.
                                            Thank you!
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Bertrand Daniel"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1603750684540-5106.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Bertrand Daniel</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-425" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Professionally written policies that allow for updates to your website. The process of questionnaires is quick and personal for your business needs. Highly recommended.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Melissa Green"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1603748361825-8780.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Melissa Green</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-426" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">I am impressed by how my refund policy came out. Very pleasing to read as a customer. I definitely recommend it.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Rachel"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1603434841399-8080.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Rachel</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-427" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            It is so quick and easy. I researched a lot of free websites for a privacy policy and it was so complicated. This is such as unbelievably good price and I couldn't believe how quickly I received
                                            it. Will certainly be coming back for my other businesses.
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Gaynor Mary O&#39;Neil"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1603661222047-2767.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Gaynor Mary O'Neil</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-428" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            The best way to get a premium policy for your web site, quick, easily and accurately. I really appreciate the service that was provided to me and recommend it to anyone who is skeptical.
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Brien Blatt"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1603306624307-8064.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Brien Blatt</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-429" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            Excellent service. I spent days trying to get my head around writing terms and conditions for my new business start-up. Draftly was a gem of a find; easy to follow and quick to use. I
                                            recommend their services.
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Leeanna Kelly"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1603102500345-2644.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Leeanna Kelly</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-430" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Always looking to save my time. Draftly quickly made a DMCA policy for me. Really, appreciative of all the help.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Mahabub Rakib Hasan"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1603033565670-2179.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Mahabub Rakib Hasan</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-431" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Really easy and quick. Amazing tool to generate compliance forms.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Fabio Gómez Velásquez"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1603084022410-9892.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Fabio Gómez Velásquez</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-411" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Thank you for making the creating a privacy policy so simple and accessible to people like myself, who didn't have the confidence to create one on my own.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Irene Matejka"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1602549905631-8324.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Irene Matejka</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-432" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Very easy to generate website disclaimer polices. I highly recommend.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Ron Weinberger"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1603084022412-3697.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Ron Weinberger</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-412" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Was looking at the grim prospect of spending weeks drafting a privacy policy. This site just saved me from that situation. Thanks a lot.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Mohamed Abdul Hamed"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1602413494535-5481.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Mohamed Abdul Hamed</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-433" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Draftly took a long and confusing project and made it simple.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Julie Donnelly"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1603084022423-488.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Julie Donnelly</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-434" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">I love your site, a super-easy way to create terms and conditions. Really helpful and easy to use! Thanks.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Flavio Torres"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1602179336229-1305.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Flavio Torres</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-413" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            Using Website Policies services it was super easy to compose privacy policy and terms of use documents for our website, with confidence that they will conform to strict requirements worldwide.
                                            Thank you for your great service!
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Ravil Nugmanov"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1602196022196-7047.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Ravil Nugmanov</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-414" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            I needed a privacy policy for my blog that is affordable and easy to create. I bought the premium bundle and I am satisfied with the services, plus you can choose the policies that apply to your
                                            business.
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Evado"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1602060504101-3032.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Evado</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-415" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">I was told we need a privacy policy on our website. Found Draftly what a great service they offer. Answered their questions online and in 10 minutes got what I need.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Roger Newell"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1602196022192-8031.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Roger Newell</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-416" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            Draftly has made the legal policies on our site as easy as a few clicks. Rather than spending tons of money on lawyers, you get to customize your policies based on answers you input, which
                                            is great! Definitely a great service!
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Michael K."
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1601852572806-1893.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Michael K.</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-417" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">I got all the terms &amp; conditions I needed for my products and website. I also recommend them to my own clients.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Julia Ferrari"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1601802676650-464.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Julia Ferrari</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-418" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Super quick and easy and affordable. Wish they had something specific about PHI, only because I work in the therapy field. But I would absolutely recommend. It saved me hours!</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Kierstan Streber"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1602196022194-2568.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Kierstan Streber</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-400" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">This software has really helped take so much off my plate! I'm glad I found it.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Mark Adam"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1601439700266-1968.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Mark Adam</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-419" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Super policy generator with really great bundle pricing for premium website legal copy. Highly recommended if you have a website and want legal protection!</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Roger Dumas"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1602196022195-7302.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Roger Dumas</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-401" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Great service for small businesses that need to create privacy policies and other documents. Thanks, guys!</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Fiona Flood"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1601385703203-9194.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Fiona Flood</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-420" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">A very comprehensive questionary, I am really impressed by how they covered all areas. Keep up the good work.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Emil-Ilija Perić"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1601380999458-9403.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Emil-Ilija Perić</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-402" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            We are launching a new social media app for the service industry. We were in need of social media privacy policy and terms of use agreements for our app. It was a daunting task. This service made
                                            it both easy and affordable.
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Scott Nichols"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1601142259791-7076.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Scott Nichols</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-403" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            A great product that simplifies setting up compliance for the GDPR. Straightforward but with sufficient formatting choices. Fast and helpful support with queries. I like the one-time payment. Try
                                            the free version and upgrade if you like it.
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Richard Joss"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1601019596237-6906.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Richard Joss</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-404" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">It was so easy to generate my cookie policy without unpredictable legal risks. In just a few minutes I had a ready to launch cookie policy in my hands!</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Tamara Peiter"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1600963284104-6793.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Tamara Peiter</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-405" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            Very good! I found it to be a detailed, objective, and comprehensive policy generator. The automatic updates make it even better. I definitely recommend for those who want serious policies
                                            specifically designed to your business, and not the generic or copy and paste options.
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Flávia Bomfim Carvalhinho Lopes"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1600997223252-2306.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Flávia Bomfim Carvalhinho Lopes</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-406" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">It was a great experience using Draftly. Got the required policies easily with a very quick survey of questions that cover the needed information.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Mohammad Nobani"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1600777284598-9878.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Mohammad Nobani</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-407" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Great website for hassle-free privacy policies. Gives you exactly what you need. Highly recommend it.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Karl Driver"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1600699566927-1980.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Karl Driver</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-408" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            I am really impressed with how easy my policies were created. My policies look very professional. I read through them and they cover all the bases. The questionnaire was simple and very user
                                            friendly. I am so glad I found this service!
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Katrina Peaks"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1600462892319-8184.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Katrina Peaks</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-394" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Less confusing than other sites. The bundles are an excellent way of purchasing policies.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="David Dickson"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1600317745762-2668.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">David Dickson</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-409" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Great service! It is truly painless and saved me a lot of time and effort. It is worth the minimal expense. Give it a try, you won't be sorry! Thanks.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Terry Boyer"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1600368337246-9425.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Terry Boyer</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-395" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Hands down the best website policies company I've used. Also, brilliant customer service! Thank you.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Gareth"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1599998493351-3997.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Gareth</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-421" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Fast and easy. I just created a terms and conditions policy and the questions asked made me fill confident that I will be protected. I also love that they accept Bitcoin.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Jerry Paul"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1600997223261-5907.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Jerry Paul</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-410" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            Super easy to use tool to create awesome policies for my companies and clients websites. Highly recommended if you're looking to DIY and save money on legal fees for super solid policy!
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Shadow Universe"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1599632736893-5352.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Shadow Universe</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-396" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Really easy to create policies needed for a new app and very reasonably priced. Good discount for buying more than one policy with the option to create others later. Thanks!</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Heather Knewstubb"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1599278027836-6464.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Heather Knewstubb</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-397" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Draftly is BRILLIANT! I was dreading doing the 'legal stuff' for my new online business but it was so easy at this site. I would highly recommend them to anyone.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="We Do Love Pets"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1599200674425-1208.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">We Do Love Pets</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-385" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            We used Draftly to kick start our business and save a little on legal fees. We had the generated policy reviewed after the fact and was given the good to go with no edits or modifications!
                                            It took all of 5 minutes.
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Shawn Wilson"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1598970867268-3474.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Shawn Wilson</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-386" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            Insanely efficient process and great results! I confess I was a bit skeptical with the solution, but once I got answering the questions to generate our terms of use I decide to give it a chance
                                            and I couldn't be happier with my decision.
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Albert Hayfaz"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1598981873005-6399.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Albert Hayfaz</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-387" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Draftly made my work much easier. Plus the best benefit of having a peace of mind. It's priceless.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Jesse Veluz"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1598763738129-9068.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Jesse Veluz</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-393" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">This was quick, easy, and efficient. It saved me so much time and money!</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Lynda"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1598729809295-5937.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Lynda</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-388" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Incredibly easy and fast. I thought this would be a long process but it was completed in less than 15 minutes. I am very pleased and recommend this service.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Richard"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1598559837972-1971.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Richard</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-389" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            Brilliantly easy and sorted within a couple of minutes. All you do is answer a few questions on your business and then it generates you a policy. Really helpful and the price is really worth it
                                            too.
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Mark Ambrose"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1598365235324-4490.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Mark Ambrose</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-390" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Thanks to Draftly, I now have professional and GDPR-compliant Privacy Policy and Terms of Conditions agreements for my website at an affordable price.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Johan Berg"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1598281055053-8354.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Johan Berg</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-391" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">So easy to use and very affordable. Gave me exactly what I needed.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Kim"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1598106476585-3055.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Kim</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-381" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Draftly make it easier for us as a new web design agency to have good policies written. It's as easy as filling the form.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Tee"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1597840101525-5753.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Tee</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-382" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            It almost sounded too good to be true when I first discovered Draftly.org. I couldn't believe how easy it was to complete the tasks I was dreading for my website however I finished in an
                                            afternoon. 100% recommended.
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Aimbot Targets"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1597693622558-1193.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Aimbot Targets</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-398" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Great tool for any small business owner!</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Myle Hsu"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1599577023848-6693.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Myle Hsu</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-399" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Very easy to use forms. Just what I needed for my site!</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Katie Brooks"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1599577023850-1926.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Katie Brooks</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-383" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            Awesome!! Within minutes, I had comprehensive policies, at a fantastic rate. It's a huge relief and being able to access the material so quickly has allowed me to move onto continuing to build my
                                            business online! A huge thank you!! :-)
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Josey"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1596680572871-4002.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Josey</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-392" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">What a super helpful and user-friendly experience. I will absolutely recommend Draftly to anyone.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="BELINDA COATES"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1596658477293-8174.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">BELINDA COATES</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-373" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            Very happy with the quality and the rapidity of the service. I got my cookie policy and privacy policy sorted in no time. The small investment for the premium policy is worth the peace of mind.
                                            Highly recommended!
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Fatou Barry"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1596496864247-7030.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Fatou Barry</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-374" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Awesome work by the Draftly team. It helped me save a lot of my time. Great response. Whatever I required for my blog, everything is available. KEEP IT UP.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Tarun Kumar"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1596349691892-5588.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Tarun Kumar</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-375" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Super easy &amp; painless... the exact way it should be! Thanks guys!</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Ron Goldstein"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1596147369011-816.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Ron Goldstein</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-384" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            Mark,&nbsp;your services have been absolutely&nbsp;great. Gave me great peace of mind when I found your website, knowing I can get legal policies written to cater my business. Will surely
                                            recommend you.
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Kay"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1596057105095-1561.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Kay</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-376" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Thank you so much for the help. I am really impressed with the service and will continue to use it.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Shawnie B."
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1595979538939-2477.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Shawnie B.</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-377" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Are you searching for any form of policy generators? Search no more! Draftly is the one and only place to be.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Caleb Anenechukwu"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1595980622168-1796.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Caleb Anenechukwu</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-378" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            If you are making a website and are worried about legal policies - this is the service for you. They cover all of the things that concern a new webmaster or website owner. Fast, simple and
                                            affordable for those of us just starting out.
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Dennis Lee Shoemaker"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1595714221616-4634.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Dennis Lee Shoemaker</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-379" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">This was really helpful and saved me a lot of stress thinking how to go about drafting legal agreements for my website.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Ojobofun Christabel"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1595523531689-2867.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Ojobofun Christabel</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-363" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            I enjoyed the no-nonsense step-by-step process that helped me create the policies needed for our website. What could have taken hours of back and forth with a lawyer was accomplished in less than
                                            one hour at a reasonable price.
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="John MacLeod"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1595454386610-1579.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">John MacLeod</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-364" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Great website, handy, accurate, cost-benefit excellent! Highly recommend!</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Dany del Rio"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1595269622047-446.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Dany del Rio</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-365" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            The process of creating a disclaimer for my website was very intuitive and easy to execute. It gave me time to focus on building my business, instead of researching legal texts or on the phone
                                            with lawyers.
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Christen @MyHomeschoolBinder"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1594906889828-4946.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Christen @MyHomeschoolBinder</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-380" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            I like your service because it was professional and quick. Each time I asked a question everyone was so patient. I will pass the word about you guys and also use your service again. Thank you
                                            again.
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Fenicia Rosario"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1594874200567-9685.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Fenicia Rosario</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-366" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">I like the job the did on my disclaimer. They are professional, prompt, and helpful. Will use them again at some point.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Fenicia Rosario"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1594870022124-1201.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Fenicia Rosario</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-367" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">I found the service easy to use and fast, perfect for a new business owner just starting out. I love that it updates my policies automatically and no further fees.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Kim Pascu"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1594758651846-4430.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Kim Pascu</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-368" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            I love it! I was dreading the legal ins and outs of protecting my website. This was streamlined and amazing! So worth it! Took me less than 5 minutes to make an acceptable use policy.
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Brittani S."
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1594676944156-4876.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Brittani S.</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-369" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">I had no idea how to write a privacy policy and terms and conditions for my website. So happy to have found this company, it's simply genious. I recommend it!</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Stefania  Fanunza"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1594651269956-8057.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Stefania Fanunza</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-370" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            We needed a fast and efficient way to produce our terms &amp; conditions as well as a privacy policy. We turned to Draftly because they know the laws and we can focus on something else. 5
                                            * we love it!
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Mikael Casavant"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1594515714078-2297.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Mikael Casavant</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-371" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            I was using another service but the legal overkill/technical dead-ends had me going cross-eyed. Draftly makes everything easy and smooth (looks good too!). The customer service here makes
                                            me feel taken care of instead of annoyed.
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Milli Thornton"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1594498315051-3097.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Milli Thornton</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-350" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">A very easy service to use. We'll worth the cost.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Colin Kahler"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1594145409034-1822.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Colin Kahler</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-351" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            Setting up a new business is difficult enough without having to ensure you limit your legal liability. Using this service is quick, easy, and cost-effective. Knowing it is there removes one
                                            headache.
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Michael"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1593873210893-1097.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Michael</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-352" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            I had been looking for a company to draw up some website policies and stumbled upon this site. It was easy to use, affordable and met my needs. Ongoing, automatic policy updates are a bonus. Great
                                            experience so far, thanks guys!
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Joy Connell"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1593937621666-4925.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Joy Connell</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-353" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Quick and easy way to get over a tedious job.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Chris Pettipiere"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1593804421927-9301.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Chris Pettipiere</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-372" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">I really appreciate this service. It is awesome for start-up companies that cannot afford to hire a lawyer to begin with and it's affordable!</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="S. Nichole"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1593790571184-4383.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">S. Nichole</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-354" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            This a really good site needed to bring your website into compliance with those idiotic EEC rules and the new California laws. The site is easy to operate and for the most part, their HTML code
                                            was clean and easy to apply.
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Tom Mack"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1593804421926-9504.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Tom Mack</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-355" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">This is a great service with great support, thanks Mark. Just for a few euros, you can get compliant and protect yourself against lawsuits.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Lukáš Majer"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1593624957114-8217.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Lukáš Majer</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-356" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Thank you so much! Especially for small businesses and start-ups, this service is superb!!</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Marlen"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1593605783734-9777.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Marlen</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-357" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            An absolute life-saver. It allowed me to focus on my creative work without having to worry about drafting complex policies that were beyond my area of knowledge, thus saving me valuable time and
                                            resources.
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Phyo Myint"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1593478792461-9234.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Phyo Myint</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-358" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Great service! I wanted to get terms and conditions for my business website and this site gave me the best results. Thank you!</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Joseph Muriithi"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1593429724319-5780.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Joseph Muriithi</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-360" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Accurate policies and a very easy process to follow. A small price for a great service. Free updates included. I would recommend it!</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Matteo Carrubba"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1593380362110-2719.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Matteo Carrubba</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-334" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Easy, fast, immediate live support and you’re done in some minutes. Incredible!</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Thanasis Vogiatzis"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1593177025550-9136.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Thanasis Vogiatzis</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-335" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Great support and easy to use! Will use it again!</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Law Rence"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1593094021841-6365.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Law Rence</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-336" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            I needed to add policies to my website and Draftly helped me a lot! I have got everything I needed. What's more, they were happy to quickly answer all the questions I had. So nice to work
                                            with them.
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Michaela"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1592946072239-1495.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Michaela</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-337" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Very useful and not-boring wizard to get a practical solution to this very annoying issue.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Giulio D&#39;Urso"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1592917022461-7967.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Giulio D'Urso</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-361" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            I'd tried a number of policy generator services online but hadn't been able to get what I'd wanted. But thanks to Draftly.org which made it easy for me to generate my terms and conditions.
                                            I'll still return 2 generate more policies.
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Nathaniel Udo"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1592823328172-9836.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Nathaniel Udo</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-338" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Just wanted to say a "BIG THANK YOU" for helping me navigate my way through this vicious Internet Jungle and all the new laws and bi-laws they seem to put in our way.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Joseph Chait"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1592780867201-4177.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Joseph Chait</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-339" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">I totally recommend you guys! Very easy to set up and prices are very nice! I hope I will still be satisfied as time goes by! :)</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Emília Rovira Alegre"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1592917022465-7035.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Emília Rovira Alegre</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-340" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Draftly makes it easy for a business to get started in a legal sense to be able to have policies on behalf of both client and business. A very good experience.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Paolo Ritorto"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1592557050768-2418.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Paolo Ritorto</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-341" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Great service, easy platform, very quick and efficient service. Highly recommend it to anyone.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Nóra Köszler"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1592411542086-3435.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Nóra Köszler</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-342" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            I have no clue if its right or wrong but creating it was super easy! Just clicking the answers to questions that were easy and clear. Now I finally have a privacy policy for a really affordable
                                            price. I couldn't recommend it more!
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Katarzyna Muniak"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1592251021529-6786.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Katarzyna Muniak</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-343" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            What a great service. You can hunt all day and copy and paste or you can fill out a short questionnaire and have a very professional disclaimer delivered to your inbox. Super happy, excellent
                                            work. Highly recommend!!
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Greg Swain"
                                                        width="250"
                                                        height="250"
                                                        src="{{ asset('assets/images/1592194042519-6449.jpg')}}"
                                                        class="lazyload loaded"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Greg Swain</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-344" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            I was looking for a cookie notice pop up and most were complicated with javascript and who knows what else. I found this site and the process was quick and easy and works exactly the way I was
                                            hoping. Thank you.
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="BRUCE LOGAN"
                                                        width="250"
                                                        height="250"
                                                        src="{{ asset('assets/images/1592164314927-6390.jpg')}}"
                                                        class="lazyload loaded"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">BRUCE LOGAN</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-345" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Hands down this is the BEST service on the internet for legal policies! I purchased 4 and would do it again in a heartbeat.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Kevin Ivers"
                                                        width="250"
                                                        height="250"
                                                        src="{{ asset('assets/images/1592100094980-7329.jpg')}}"
                                                        class="lazyload loaded"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Kevin Ivers</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-346" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            Very easy to use. You don't have to be a lawyer to understand it. The price is well worth the safety of having terms and conditions. We use it for an app we're building for our radio station.
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Jason Gisser"
                                                        width="250"
                                                        height="250"
                                                        src="{{ asset('assets/images/1592028421386-5468.jpg')}}"
                                                        class="lazyload loaded"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Jason Gisser</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-347" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Easy to use for legal docs, really good customer service at a great price!</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Hema Kala"
                                                        width="250"
                                                        height="250"
                                                        src="{{ asset('assets/images/1591984622883-1258.jpg')}}"
                                                        class="lazyload loaded"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Hema Kala</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-348" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            I looked at other sites that offered this service but there were a few hundred dollars and even worse I was confused if what they were selling actually applied to my business. I love how
                                            customizable Draftly plans were, super easy!
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Bianca T"
                                                        width="250"
                                                        height="250"
                                                        src="{{ asset('assets/images/1591929702587-6395.jpg')}}"
                                                        class="lazyload loaded"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Bianca T</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-362" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Super easy to use, explanations as you go and a great price. Thanks!</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Pat Gillis"
                                                        width="250"
                                                        height="250"
                                                        src="{{ asset('assets/images/1591984622885-6665.jpg')}}"
                                                        class="lazyload loaded"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Pat Gillis</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-323" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">I am new at blogging and needed a disclaimer and was not sure how to write one. I got one that says everything I need for a great price. Thanks.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Cindy Leggett Bagot Crewdson"
                                                        width="250"
                                                        height="250"
                                                        src="{{ asset('assets/images/1591806421644-1308.jpg')}}"
                                                        class="lazyload loaded"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Cindy Leggett Bagot Crewdson</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-324" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">I have always relied on Draftly to create my legal site pages, as it is very simple and easy. I would recommend it to everyone who wants to save time and money.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Sydney Sekgala"
                                                        width="250"
                                                        height="250"
                                                        src="{{ asset('assets/images/1591612108997-5244.jpg')}}"
                                                        class="lazyload loaded"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Sydney Sekgala</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-325" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">A great service every website owner should know about. Makes it easy to be compliant at the fraction of the cost of a legal expert!</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Joe Baiden"
                                                        width="250"
                                                        height="250"
                                                        src="{{ asset('assets/images/1591540022075-612.jpg')}}"
                                                        class="lazyload loaded"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Joe Baiden</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-349" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">It's so easy to create terms and conditions through your generator. It's really a great help for website owners like us. Thanks!</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="RAJESH SHRIVASTAVA"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1591468751624-2747.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">RAJESH SHRIVASTAVA</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-321" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            Draftly made setting up my legal pages for my blog a breeze! I now have ALL of my legal pages for a price much lower than other sites! The questionnaires are legitimate and easy to fill
                                            out and I knew exactly what I was doing!
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Makayla Edmonds"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1591364921858-7095.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Makayla Edmonds</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-322" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            No joke, I can’t believe how easy and fast it was to go from “how the heck am I gonna write a ‘terms of use’ policy?” to “Here is the public URL for my company’s completed ‘terms of use’ policy!”
                                            So worth it!
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Jerrod"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1591292286746-5686.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Jerrod</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-326" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            It was easy to build a policy. Will probably make more purchases in the future. One time payment and ability to update the policy were the reasons I picked Draftly over others.
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Bahadır Kandemir"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1591296859942-4160.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Bahadır Kandemir</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-327" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Very easy to use, thank you!</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Natalie Massone"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1591318621718-3546.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Natalie Massone</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-328" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Very easy to use, great service and great price! Thank you!</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Donna Watts"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1591273621649-213.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Donna Watts</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-329" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Great services, better than working with a lawyer. Makes something so difficult as easy as can be!</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Review Quran"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1591030567324-7921.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Review Quran</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-330" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Unbelievably easy to use! The questions the form asked were very easy to answer and the results looked great. The price of the product fits easily within my budget.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Ernest Adams"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1590919021596-1070.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Ernest Adams</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-331" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">I found this site is beneficial. It was a delightful experience for me. Thank you very much!</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Aleksandr"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1590873712091-6636.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Aleksandr</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-332" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            The policy generators were exceptionally easy to use and it took the stress off me as a business owner to write terms and conditions, return, and privacy statements for my customers.
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Patrick Schustereit"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1590854796628-3158.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Patrick Schustereit</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-311" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Very easy to use. I got them up on my website in 15 minutes. Thanks!</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Nicolle"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1590562346827-9394.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Nicolle</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-310" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            I was sitting here stressing about figuring what I needed and how to communicate my policies effectively. This part of the business can be scary. I appreciate having a service like yours to
                                            alleviate compliance issues for my business. Thanks!
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Errol Kimble"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1590530420998-5618.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Errol Kimble</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-312" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Great, easy to use, no fish bones in between, 5 stars!</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Miguel Simoes"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1590474421933-6408.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Miguel Simoes</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-313" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Great service, I could create my app's policies easily in minutes.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Oscar Perez Martinez"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1590474421931-5721.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Oscar Perez Martinez</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-315" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            I needed terms and conditions for my website and had no idea how to go about this until I found Draftly. I filled out a quick form and bam there they were my very own terms and conditions.
                                            I would highly recommend them.
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Stefanie Angelopoulos"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1590369419895-5811.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Stefanie Angelopoulos</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-333" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Professional, affordable, and personalized service! I received my legally compliant privacy policy within minutes after completing the questionnaire.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Brooke Pearce"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1590067466824-5180.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Brooke Pearce</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-316" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            I needed a privacy policy for my real estate website and did some research online. After looking at 3-4 other websites and working through their questionnaires, I found Draftly to be easy
                                            and the most thorough in drafting the documents. The other websites also wanted to charge a monthly fee and with this website, you select the documents you need and pay a one time fee which I
                                            appreciated. I highly recommend Draftly.
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Sandy Mittry"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1590030421819-1502.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Sandy Mittry</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-317" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Great service at a great price. The policies are easy to understand and create, and being hosted on Draftly.org, you don't have to worry about keeping them up to date.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Paul Lawley-Jones"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1589966368021-2178.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Paul Lawley-Jones</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-280" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Wow! I can't believe how easy and inexpensive this was, and the documents are extremely thorough and professional. I definitely feel comfortable using these on my site.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Beth Deyo"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1589769231309-2442.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Beth Deyo</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-281" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">The Cookie Policy generator is quick, easy and painless. Very happy.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Clive Perrott"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1589720222596-5818.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Clive Perrott</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-282" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Very useful and very convenient. Excellent.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="John mark dalida"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1589698362001-6702.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">John mark dalida</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-283" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">I think this is a great service with amazing features. The process was a breeze and I will use this product again.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="BIlly G"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1589665957437-1911.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">BIlly G</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-284" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">So easy to use and super affordable! I'm so glad I found your service. Such a time saver when trying to manage all of my other tasks involved in starting a new business!!</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Lisa Sarver"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1589639747307-3145.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Lisa Sarver</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-285" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">This service has definitely helped me create a disclaimer for my blog! Fast, easy, and customizable. I loved it! Thank you so much!</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="M. E."
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1589587409421-3780.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">M. E.</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-286" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            How great is this!? Easy, peasy and so user-friendly. And Canadian, Eh?! I am so happy to have found this service for my website. Took the stress out of policy set up and made adding clauses
                                            simple. Highly recommended! Thanks!
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Becci Garrick"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1589469467884-7472.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Becci Garrick</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-318" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            Providing effective website policies is an important aspect of creating an e-commerce site where prospective customers feel comfortable. The process of creating various legal policies was quick,
                                            easy and effective with Draftly.org Thank you.
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="STEPHEN SHORTER"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1589465598413-2990.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">STEPHEN SHORTER</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-287" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">It was very easy to generate the privacy policy for my blog, in a few minutes I received my customized privacy policy by email! Great! Thank you!</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Annamaria Pappalardo"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1589309974909-7479.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Annamaria Pappalardo</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-288" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">We were searching for legally compliant policies - easy to create - at an affordable price and we found it at Draftly.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Dark Cloudless Sky Records"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1589194037043-3150.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Dark Cloudless Sky Records</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-289" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            WebistePolicies made it super easy to create a disclaimer for our site. We provide coaching and advice for people going through a divorce, so we touch on a lot of subjects that can be sensitive
                                            and delicate.
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Grady Sullivan"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1589191804843-7548.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Grady Sullivan</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-279" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            I am really astounded about the high quality of the offered policies. I already bought policies on another place and came to create a cookie consent banner. Now I bought the whole bundle, and
                                            replaced the others! I'm amazed, Thank you guys!!!
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Schwarzes Schaf"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1589098021372-4932.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Schwarzes Schaf</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-290" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">I loved using this service! It couldn't have been simpler to use, fully recommend!</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Bored Views"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1589061461574-4811.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Bored Views</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-291" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Very easy to use and professional results! Awesome service. Thank You!</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Brigitte Anderson"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1589054222272-2410.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Brigitte Anderson</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-292" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            I was looking for a template to add policy documents to a newly constructed website. Draftly was so easy to use and within half an hour I had all documentation completed and published on
                                            the site. I will definitely use them again.
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Jason Larkin"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1588947386592-4119.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Jason Larkin</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-293" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Great, fast service.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Bob Liddycoat"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1588944657002-3318.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Bob Liddycoat</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-294" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Great service for bloggers and creators. Just answer a few simple questions and you have a GDPR compliant policy! Thanks!</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Laura"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1588840006774-6826.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Laura</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-295" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Policies were quick and almost effortless to make. Gives me peace of mind for my new business website.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Alexei Marie Carreon"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1588831622129-1716.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Alexei Marie Carreon</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-319" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            I am truly grateful to have found your site with regards to being able to set up a website policy so quickly and easily. I was really struggling with how I was going to be able to come up with
                                            one. Thank you for making it a breeze.
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Toccara Scott"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1588775349870-8228.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Toccara Scott</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-296" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            I compared this service with another online provider, but I finally chose Draftly, which offered a more competitive price for a high-quality policy that met our expectations.
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="KOMP-ACT"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1588696173634-6049.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">KOMP-ACT</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-297" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">It just took me two minutes to create a professional T&amp;C. Some of the clauses are premium, but definitely worth it. Hassle-free.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Abhi Pandath"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1588661745774-2010.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Abhi Pandath</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-298" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            Draftly allowed me to efficiently meet my legal obligations &amp; goals as a writer creating a fascinating education blog. This allowed me to focus on field expeditions, getting photos,
                                            and content writing! Thank you!
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Christopher Stephens"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1588698422660-1884.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Christopher Stephens</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-299" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Professionals, everything is prepared correctly. I recommend them for polices and legality of websites.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Mohammed AbuSaad"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1588654621248-4138.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Mohammed AbuSaad</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-300" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Service is easy to use, accurate and concise.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Adeline Fogui Tchana"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1588630689506-2070.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Adeline Fogui Tchana</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-301" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">So easy and simple to use. As an artist this allows me to focus on building my site, my craft, and my audience without spending time on formulating legal disclaimers.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Stiliani Moulinos"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1588621369970-5166.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Stiliani Moulinos</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-302" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Thanks. It was worth the money. Just a few clicks to walk through the wizard, and I had a policy for my small business website.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="John Masters"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1588598568604-1654.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">John Masters</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-303" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">I had tried no many other services but Draftly.org provide me the best service and terms and conditions agreement.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Venkat"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1588561019018-8494.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Venkat</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-305" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Wow folks. I just discovered through Google search this awesome website policy creator. Super happy about this and the results.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Kenneth Radke"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1588512581101-2316.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Kenneth Radke</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-320" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">A great easy to use service that does exactly what it says. Thank you for the accessibility and ease of use.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Maali Khader"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1588424019570-3851.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Maali Khader</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-307" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            My policy was prepared and ready to link to my website very quickly. Also great customer service! I submitted my payment twice by accident and was refunded one of my payments with no problem at
                                            all.
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Rachel Newton"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1588210021416-8405.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Rachel Newton</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-308" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            The email communication I received during my decision-making process on whether to purchase this product or not was timely and efficient. Easy setup on my website. I highly recommend
                                            Draftly! Thank you Mark!
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Darlene Carswell"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1588165621851-4278.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Darlene Carswell</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-309" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            I was recently made aware that my blog needed to have legal pages that I was clueless about how to create or what they should contain. I was thrilled to find a website that walked me through the
                                            process and provided what I needed in just a few steps!
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Alison Simmons"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1588097998552-1933.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Alison Simmons</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-278" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">A big piece of assurance for a small price.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="YMGS"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1588020343524-1315.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">YMGS</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-275" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            I purchased a refund policy. Easy to use. You will get a well-written and professional policy that's fully customized so you do not have to copy policies from another website which may not suit
                                            your site.
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Josh"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1587712383803-204.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Josh</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-276" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Awesome, fast, easy. Well done!</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Eric Van Monckhoven"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1587677221590-676.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Eric Van Monckhoven</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-265" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Excellent service - the staff is very quick and helpful to answer any questions I have. The documents are easy to create through the forms provided. Highly recommend!</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Micha"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1587592717755-4417.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Micha</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-266" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            I love how user-friendly this policy generator is. They ask you questions based on what applies to your website and voila! You have a policy! Thank you to Draftly for your service!
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Kayla Locke"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1587510742439-9598.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Kayla Locke</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-267" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Very easy and intuitive interface and gets you going within minutes.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Abhijit Sudhakar Deshmukh"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1587410821350-8928.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Abhijit Sudhakar Deshmukh</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-268" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">I have tried other policy generators but Draftly is the best. Easy to use, beautiful style options and it's affordable.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Dan Collins"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1587262481797-7608.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Dan Collins</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-269" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Simple, fast, and effective.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Aurelio Lolli"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1587233221413-9828.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Aurelio Lolli</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-270" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            Simply the best. Very easy way to generate perfect terms and conditions and other legal policies according to your business/website with simple steps. I tried other services but found this one to
                                            be the best.
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Monir H Raju"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1587207745341-7111.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Monir H Raju</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-271" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            I'm so grateful to have found Draftly. I wouldn't have had a clue what to write! All I had to do was answer questions regarding my website and my policy was created. Draftly really
                                            made it so easy, I highly recommend them.
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Tracey"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1586936429099-2951.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Tracey</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-272" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">The service is great for an entrepreneur or small business. It is easy to use and generates a good disclaimer.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Todd R"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1586901732939-6558.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Todd R</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-273" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Excellent service and the terms and conditions policy turned out great.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Greg Cooksley"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1586876225712-5411.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Greg Cooksley</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-274" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Great website! Very quick and detailed! I will recommend to anyone that needs legal documents quickly that are tailored to their unique requests!</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Magan Driver"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1586786826384-2960.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Magan Driver</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-259" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            I recently purchased a cookie policy form Draftly and I was really happy with the result. I loved how quick and easy it was to generate the policy. It saved me a lot of time and hassle for
                                            what would have otherwise been a very painful and tedious process!
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Liz Broom"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1586520425527-6072.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Liz Broom</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-277" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">I just created my policy and wow was it every easy and intuitive. I am an application developer and this site is easy to use and provides great policies. Nicely done.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Gregory Hillsdon"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1586537140471-674.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Gregory Hillsdon</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-260" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Quick and Easy! Great Product. Thanks!</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Natasha Lallemand"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1586431624815-7237.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Natasha Lallemand</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-261" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">After looking everywhere for the website policies I found this website. Talking about free policies they really deserve to be applauded. Keep the good work guys.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Gaurav Malik"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1586413775438-3204.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Gaurav Malik</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-262" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            The service is actually really great and I find that the price is very reasonable. It really saves the hassle of finding a professional to draft the required documentation to ensure your business
                                            is covered.
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Sherazade Edoo"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1586409958670-8319.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Sherazade Edoo</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-263" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Creating a policy was quick, and easy! I received a link within minutes to load onto my website! Thank you!</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Sandy Fortier"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1586387224732-1320.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Sandy Fortier</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-247" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            A really great and invaluable service for personal bloggers. The service is really easy and straight forward to use, produces professional documents for use. Thank you WebsitesPolicies Team!
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Salman Tahir"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1586329775171-1947.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Salman Tahir</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-248" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Absolutely fantastic. Super easy to use and great that there's a free version for personal websites :) 5 Stars!</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Karen Forsman"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1586298425830-7783.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Karen Forsman</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-249" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            After trying to find a free template and going to multiple sites where the free turned into costly add ons I stumbled upon this site. For a flat rate, I received a detailed privacy policy, which
                                            saved me tons of research and typing. I just copied and pasted it into my site. Very happy with my purchase.
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Peggy Cleveland"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1586298425866-8950.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Peggy Cleveland</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-250" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            The services provide core legal subjects to protect your website, making it fantastic for start-ups. In addition to this, the customer support is responsive and ensuring. A great investment!
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Shaun King"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1586182270530-6583.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Shaun King</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-251" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">I loved using this refund generator! It was completely simple. Easy 3 step system just like they say on the website! Perfectly done and done! Thanks to you all!</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Michael A Guzman"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1586120831038-6962.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Michael A Guzman</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-252" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            I was seeking to generate the best legal policy for my website and Draftly was exactly the one for me. The service is simply amazing, quick and easy. Just within minutes, all the required
                                            policies can put into good use.
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Bradley Goh"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1586077729188-7168.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Bradley Goh</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-253" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">I would like to thank Mark for the excellent service he had given. I would definitely use them again for any policies I might need in the future. Thumbs up!</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Lawrence Ho"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1586015568723-6383.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Lawrence Ho</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-254" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            I used them for privacy and cookie policies and trust me they are awesome. I paid a one-time fee for premium policies. The best part is that no monthly hefty charges. Pay as you go, excellent
                                            customer support and money-back guarantee.
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="George"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1586014455711-7687.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">George</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-255" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            Draftly did an amazing job of compiling what I needed for my website. The set up was so simple that no experience is needed. Just answer some questions and they do the rest. I recommend
                                            for anyone needing an easy to use solution!
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Lou Booker"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1585894434807-3854.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Lou Booker</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-256" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Simple. Easy. Quick. Thank you for helping me create my privacy policy.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Frances Enid Ceja"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1585721225197-2812.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Frances Enid Ceja</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-257" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Very simple to generate a cookie banner to meet my website requirements. Thank you, truly appreciated.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Rohan Harrison"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1585454824908-3673.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Rohan Harrison</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-264" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">The website is very useful and provides all you need for your business. I strongly recommend it.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Rodrigo Barbosa"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1585544224991-8115.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Rodrigo Barbosa</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-239" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">This website was very user friendly and provided everything I needed for my business needs.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Franklin Muhammad"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1585232825110-664.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Franklin Muhammad</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-242" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">You are doing amazing job, thanks for everything!</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="vinura"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1584816227975-4484.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">vinura</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-243" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Makes a breeze of what would otherwise be a maze of confusion for an ignoramus like myself!</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Deidree"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1584671753681-2082.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Deidree</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-244" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            Definitely the best policy generator I've ever used. I like how you host the policies on your server. Simplicity at it's best. It'll be my go-to site from now on for legal policies. Keep up the
                                            good work.
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Terry Jackson"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1584655624272-5978.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Terry Jackson</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-245" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Thank you for making this for me. I never thought it would be such easy.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="DkBiswajit"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1584585677371-6284.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">DkBiswajit</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-246" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            I was on another website at first and after 20 minutes of filling out the information, they wanted to charge me $163.00! I just looked back at the website's name and laughed! Draftly, on
                                            the other hand, was fast, easy and delivered as promised.
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="David Colombo"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1584370924880-626.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">David Colombo</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-228" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">AAA+ service. Highly recommended. Thank you.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="ArielEnoch Trading"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1584345423787-6965.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">ArielEnoch Trading</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-229" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Their service is simply amazing, you just answer a few questions in less than 15 minutes and your legal document is ready for use.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Phumelela Lizalise Maqolo"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1584167223074-655.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Phumelela Lizalise Maqolo</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-230" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">A simple and easy way to create a legal policy that is tailored to your region at a very reasonable cost.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Flynn John"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1584034023350-9716.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Flynn John</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-231" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            I am extremely happy with the kind of service and support I got from you. I am sure that this would be of use to anyone who is on the lookout for website policies to be published on their sites.
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Venkata Subramani Ramachadra"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1583742704368-8807.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Venkata Subramani Ramachadra</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-232" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            Easy &amp; fast step by step construction of the policy made the experience easy. And then, of course, there is that element of trust that and assurance of care that one can get from
                                            Draftly.org. Thanks a million.
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1583599304303-4368.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                        alt=""
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name"></span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-233" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">I would recommend this service to anyone owning a website. The available options are amazing, giving you room to upgrade at your own will and time.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="sarah simiyu"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1583535200797-717.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">sarah simiyu</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-234" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            Reasonable cost for everything included. The system was easy to use and when I had questions, the response time was good and I got the help I needed. I would not hesitate to recommend.
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Lawrence Blanchard"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1583435071579-6616.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Lawrence Blanchard</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-235" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">it is superb!</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Bhavesh Vadadoriya"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1583405875154-774.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Bhavesh Vadadoriya</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-236" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Good and straightforward process. Very easy and straightforward.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Niccolo Antinucci"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1583397795242-755.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Niccolo Antinucci</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-237" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Handclaps for wonderful and easy service!!</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Renee Rejoice Renew"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1583413023697-5846.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Renee Rejoice Renew</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-238" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            When I realized I need a privacy policy document for my AR game, I found Draftly. In the next 15 minutes, I had a valid document ready and for a very low price as well! Good job guys, keep
                                            it going.
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="just Lukas"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1583259794969-5558.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">just Lukas</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-223" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            I have searched for more than a week for a good policy generator and wasn't quite sure which one to pick. Then I found Draftly that customized my policies to fit my needs perfectly. These
                                            guys are great! Totally recommend it!
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Ioana Gherasin"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1583013660712-9181.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Ioana Gherasin</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-224" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">The service offered by Draftly.org to me is indeed awesome. Kudos to them.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Charles Udoh"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1583003826740-4694.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Charles Udoh</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-225" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">I love the ease of use and pricing! Highly recommended!</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="LaToya Bowe-Johnson"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1582968422618-8701.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">LaToya Bowe-Johnson</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-226" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">It does exactly what it says - it compiles a privacy policy that is relevant to the function of your website in minutes. I’m happy with that!</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="J Bracey"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1582917385824-8102.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">J Bracey</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-220" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Smooth, clear and understandable procedure. Fast and hassle-free delivery. For me, as a legal professional, this was a real time saver. 5 out of 5 stars.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Marta Wegmann"
                                                        width="250"
                                                        height="250"
                                                        src="{{ asset('assets/images/1582809304154-9602.jpg')}}"
                                                        class="lazyload loaded"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Marta Wegmann</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-227" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Easy to create your website's privacy policy. I've made this for a project that needed an English version.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Thomas Buegel"
                                                        width="250"
                                                        height="250"
                                                        src="{{ asset('assets/images/1582835224391-9018.jpg')}}"
                                                        class="lazyload loaded"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Thomas Buegel</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-221" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">I appreciate your services, making it easier to create a return policy for my online business.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img alt="Ann" width="250" height="250" src="{{ asset('assets/images/1582610396278-2145.jpg')}}" class="lazyload loaded" style="max-width: 250px;" />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Ann</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-222" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Great, uncomplicated and fast service!</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Lee Ann Mumford"
                                                        width="250"
                                                        height="250"
                                                        src="{{ asset('assets/images/1582569233316-7806.jpg')}}"
                                                        class="lazyload loaded"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Lee Ann Mumford</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-215" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Super easy to fill out the forms. Highly recommended.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="William Custance"
                                                        width="250"
                                                        height="250"
                                                        src="{{ asset('assets/images/1582435623267-9652.jpg')}}"
                                                        class="lazyload loaded"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">William Custance</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-216" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Fast and simple. Totally intuitive and easy to set up, thank you!!</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Eva Genin"
                                                        width="250"
                                                        height="250"
                                                        src="{{ asset('assets/images/1582380678323-2769.jpg')}}"
                                                        class="lazyload loaded"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Eva Genin</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-217" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Their services are simply the best no doubt about that, I would recommend them over and over again. Kudos guys!</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Nicklaus Macanthony"
                                                        width="250"
                                                        height="250"
                                                        src="{{ asset('assets/images/1582347422733-9072.jpg')}}"
                                                        class="lazyload loaded"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Nicklaus Macanthony</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-218" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            I scrambled for weeks to get things done not knowing someone can do it for me in just a few minutes and with full legal compliance. I can sleep safely now without having to pay high attorney's
                                            fees. I grab all the bundles!
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Asmawi"
                                                        width="250"
                                                        height="250"
                                                        src="{{ asset('assets/images/1582304645203-1974.jpg')}}"
                                                        class="lazyload loaded"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Asmawi</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-219" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            We used Draftly.org specifically for a disclaimer. We found the process straightforward and easy to use. The final document was comprehensive and reflected the current structure of our
                                            platform. We will use them again!
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="P Vernon"
                                                        width="250"
                                                        height="250"
                                                        src="{{ asset('assets/images/1582173498890-2582.jpg')}}"
                                                        class="lazyload loaded"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">P Vernon</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-207" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            Fantastic self-service and pricing for policies which was half the price compared to other policy websites that I visited. I really liked how the policies incorporate everything I need.
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Melissa Green"
                                                        width="250"
                                                        height="250"
                                                        src="{{ asset('assets/images/1582111566739-2671.jpg')}}"
                                                        class="lazyload loaded"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Melissa Green</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-208" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            I'm so happy I found this website! They work really hard to put it all together. I'm so grateful to have found it. It took only a few minutes for me to get something that would've taken me hours
                                            to figure out on my own. Honestly, thank you so much!
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="レモケット メルリ"
                                                        width="250"
                                                        height="250"
                                                        src="{{ asset('assets/images/1582124823074-2797.jpg')}}"
                                                        class="lazyload loaded"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">レモケット メルリ</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-209" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">My website now feels more secure with the terms and conditions that I created. Thanks.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="ADNAN AHMAD KHAN"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1581959861582-5427.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">ADNAN AHMAD KHAN</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-210" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Really powerful to be able to have terms and conditions generated for a start-up. Saving a lot of fees when money is sparse. Thanks a lot!</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="The Citadel App"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1581950720458-719.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">The Citadel App</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-211" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">This website provides an excellent term and conditions generator. Recommended for every website owner.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Salem Alkandari"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1581764121944-9017.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Salem Alkandari</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-212" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Very easy and quick to complete and use. Very happy with the results!</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Neil"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1581696263519-6825.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Neil</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-213" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            Great service! Mark always asked if everything was ok and kept me up to date with the policy. I purchased and Mark was always at hand if needed. I will be returning! Keep up the good work.
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="stephen mezen"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1581692160142-2134.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">stephen mezen</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-214" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">It took me about 5 minutes to do my disclaimer. It was so easy to follow. I would recommend Website Policies to everyone.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Karen Dahlin"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1581548222814-717.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Karen Dahlin</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-204" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">A few simple questions, and poof! You got a privacy policy with a link and everything!</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="David Salyer"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1581444999572-7514.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">David Salyer</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-205" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            If you are dreading the tasks of adding a disclaimer, terms and conditions and a privacy policy to your website, then you have found the RIGHT COMPANY to help your website become compliant; in
                                            less than 10 minutes.
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Veronica Johnson Spates"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1581370024778-3172.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Veronica Johnson Spates</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-206" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            Forms were quick and simple to do, 3 forms done in 15 minutes. Good price and saved me a lot of time and I know that my site is covered, great service, will recommend. Thank you!
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Stav"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1581012648886-5453.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Stav</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-198" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Great features and service! Highly recommended.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Millicent Ojay James"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1580926022835-6576.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Millicent Ojay James</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-199" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Brilliant website, it takes the hard work out of all the legal documents on your website. An amazing service. Thank you.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Marie Hubbard"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1580837223480-709.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Marie Hubbard</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-200" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            Found this service online and am grateful. The process for creating a disclaimer document for my website literally took 5 minutes and is pretty comprehensive. Thank you Draftly!
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Aquiller Cole"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1580798408560-8945.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Aquiller Cole</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-201" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            I am so happy that I found this site. I was tearing my hair out trying to create a privacy policy and this site made it so easy. I also appreciate that it hosts and updates the page if needed.
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Manda Hope"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1580787265707-3053.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Manda Hope</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-202" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">The comprehensive questionnaire makes the process of creating legal pages very easy. It took me about half an hour to create all my policies.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Hida"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1580777764663-1685.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Hida</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-193" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            Simple and very easy to use. I made my privacy policy and disclaimer for my personal donation website in a matter of minutes. Now I know where to find the professional services next time for my
                                            professional websites. Thanks.
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Arda Pertama"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1580738724838-4104.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Arda Pertama</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-203" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Great service and I recommend anyone starting a blog or a business. Thank you Mark!</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Diana Hochberg"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1580750602769-1091.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Diana Hochberg</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-194" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Great service. Highly recommended for startups looking to craft their privacy policies and cookie policies.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Raymond Obuoyo"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1580677684430-8440.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Raymond Obuoyo</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-191" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            This service was by far the best option I found after comparing numerous choices. The chat support is super helpful walking you through any questions you have, and the price can't be beat!
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Elizabeth Hambleton"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1580487565998-4390.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Elizabeth Hambleton</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-196" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            I used Website Policies for my terms of service agreement for my REA Scoop mobile and desktop iOS / Google Play New Home Search application. It was accepted upon the first review. I highly
                                            recommend their service for your policy needs!
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Greg Burger"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1580497261915-9984.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Greg Burger</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-197" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Very helpful, saved me a lot of time, service was amazing.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Andrew"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1580491091604-8798.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Andrew</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-188" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Thanks for the code. A hassle less to solve when creating a website.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Jan"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1580426462312-6371.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Jan</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-189" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Great and quick to use tool for generating those long but necessary policies. Top work guys!</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Radu Rugiubei"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1580437621835-3793.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Radu Rugiubei</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-123" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">This helped a lot. It's quick and easy to register and the policy is instantly created to your needs. If you need it (you do!) it's really helpful.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Emperor CZR"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1580310621648-7506.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Emperor CZR</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-124" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Simply great! In just a few clicks they made my terms &amp; conditions document to show on my app.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Tullio Monti"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1580301848414-2192.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Tullio Monti</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-190" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Simply great! In just a few clicks they made my Terms &amp; Conditions document to show on my app</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Tullio Monti"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1580437621747-5579.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Tullio Monti</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-125" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">They offer a customized and complete service.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Djounia Saint-Fleurant"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1580272022477-5915.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Djounia Saint-Fleurant</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-126" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Good service, great for school projects. I like how many features they offer for free - you never feel pressured to buy.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Adam S"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1580208041816-8468.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Adam S</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-127" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">You may not think your site needs a privacy policy, but it really does and Draftly.org makes it fantastically simple.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Recipe Approved"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1580157440399-4532.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Recipe Approved</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-128" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            I was really confused about the whole terms of service thing as a first-time website owner until I stumbled upon Website Policies. I got a terms of service page for my writing website in minutes!
                                            Highly recommend.
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Ajitsa Ashihundu"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1580118237928-3016.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Ajitsa Ashihundu</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-129" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            This service is AWESOME! All I had to do was go to the policy generator, answer the questions and my policies were created instantly and sent directly to my email for me to install on my website.
                                            So easy!! Thanks guys, you rock!!
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Baden Maxwell"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1580107385093-8743.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Baden Maxwell</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-130" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            I'm glad I discovered Draftly. They make it very quick and easy to create privacy policies and other necessary legal documents. Just answer some questions and voila! You have a document.
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Yashdhar Vyas"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1579824290080-7751.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Yashdhar Vyas</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-131" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Great service, especially the help while filling the form out. Thank you</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Duder Saikowsky"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1579834622656-5511.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Duder Saikowsky</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-132" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Amazing online mode to generate policies is the most recommended feature to all new website creators.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Sam Venks"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1579746422919-994.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Sam Venks</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-183" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">The generator is a perfect platform for upcoming and established developers. It's superb and I recommend it.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Sahfra Frasah"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1579698342559-5195.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Sahfra Frasah</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-133" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            A great way to sort out quite an important aspect of any website - the online legal policies needed. Simple and quite powerful, the service provided by Draftly.org fits perfectly with our
                                            needs and our clients'. Thanks guys!
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Cris"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1579592413259-5088.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Cris</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-134" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">The process of creation of the disclaimer is very simple, clear and fast. Great quality and fantastic service. Thanks !</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Roberto Quintans"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1579541148286-9715.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Roberto Quintans</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-135" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            This website is a genius idea! I thought I I would have to put so much work in collecting the legal information and writing the disclaimer, but here it took only 3 minutes! And it’s totaly
                                            correct! Thank You!
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Carola"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1579520347067-5809.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Carola</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-136" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Great price for the bundle deal and great customer service.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Adam"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1579430347074-3394.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Adam</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-137" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            I've been searching for a while through lots of sites that I assumed could generate site terms and policies but I’ve been disappointed until I found this site. It’s the best place on the net so
                                            far to create your website terms and policies.
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Talal"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1579198992293-869.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Talal</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-138" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            Cobbling together a privacy policy and terms agreement seemed a monumental task. I wanted to look like a professional and felt one of the ways to do this is by having a professionally written
                                            policy. Great value!
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Eric"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1579144886258-6796.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Eric</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-139" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Great policies at an affordable cost. Nice work!</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="dhruba"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1578724506318-8190.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">dhruba</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-140" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            So easy to use! I started to write a privacy policy, disclaimer and t&amp;c document myself but was struggling with wording and content. Draftly made the process simple and has provided
                                            quality documents far better than my own efforts
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Paul"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1578701217346-2464.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Paul</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-141" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">A wonderful service for all types of users especially beginners who don't know much about the legal side of running websites.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Hammad Pannu"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1578689886365-4091.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Hammad Pannu</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-142" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">It is quite logical and useful for someone who is not quite familiar with legal terms and its applications. And so efficient.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Edmit Int&#39;l Ed Cons"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1578590877188-7767.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Edmit Int'l Ed Cons</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-184" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">You guys are so fantastic with your privacy generator I love it thanks so much.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Victor Onyema"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1578319299866-9634.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Victor Onyema</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-143" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Extremely user-friendly, fast , great service! Thank you so much ''Website Policies''</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Aditya Rajput"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1578254877092-6420.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Aditya Rajput</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-144" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">A perfect one-stop solution for startup companies. It is very easy to create a policy even we do not have any legal background. I strongly recommend Draftly service.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="7freeads"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1577950322770-9902.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">7freeads</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-145" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">It is very user-friendly and it is very easy to understand by all non-technical users. Thank you. Appreciate it.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="abhishek sergei"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1577946910529-898.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">abhishek sergei</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-146" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            Website Policies is really fantastic, extremely easy to use. In less than an hour, I solved all the policies for my website, all of them personalized and with the possibility to keep them stored
                                            on their servers. Highly recommend.
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Gregory Manchia"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1577798871444-8600.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Gregory Manchia</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-147" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">This is a very good service for generating terms and conditions generator for your website. Thank you.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Harish Kumar"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1577506948803-2561.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Harish Kumar</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-148" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Thank you for this. You are doing a great job out there for all who have no idea how this works. Thanks a million, ton.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Go Green"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1577044652976-7248.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Go Green</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-149" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            Draftly is a wonderful service for beginners who want their websites or blogs up and running without having to go through the rigors of finding out what to write and what language to use.
                                            It was very helpful. Thank you so much.
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Arun Dwivedi"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1577035941593-4947.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Arun Dwivedi</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-150" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">I am very glad to discover Draftly. I saved a lot of time and you can tell that there are good entrepreneurs behind this.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Samed Sökmen"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1576963463178-5975.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Samed Sökmen</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-151" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">I never though I need to use this service at all, but it seems times change. Clear, useful service indeed.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Péter Szabó"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1576857455442-327.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Péter Szabó</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-152" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            As a consultant, I find website policies a huge help in creating quick documentation for all my clients. I save time and effort and am assured that all required points are covered. All in all they
                                            do an amazing job.
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Richa Nevatia"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1576759307652-3316.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Richa Nevatia</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-185" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            Their disclaimer service gave me a disclaimer that does an outstanding job of pointing out that I am not claiming anything and that the information on my site is basically for entertainment
                                            purposes only so enjoy yourself!
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="David Lovell"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1576364841062-6796.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">David Lovell</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-153" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            Wow, I am impressed and extremely satisfied. Draftly helped me create a standard privacy policy for my website for free! And it looks so professional. I am so happy. Thank you, guys. I
                                            will definitely create a premium one once I have settled everything for my business. I do highly recommend.
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Sandrine M. Sidze"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1576163251989-9975.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Sandrine M. Sidze</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-154" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Very easy and fast. I got my terms and condition page free of cost as I don't need premium for now. Thanks.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Moin Qamruddin Shaikh"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1576099830719-9628.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Moin Qamruddin Shaikh</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-155" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            Extremely satisfied with Draftly.org They made it simple, fast and easy to create the policies needed for my business website. The premium policies bundles is inexpensive with no recurring
                                            fees and allows you to update for a lifetime! Great service!
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Jaime Dean Gantz"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1576079850985-3821.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Jaime Dean Gantz</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-156" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Professional and fast service, user friendly.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Marion Deco-Furbish"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1575889645894-1453.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Marion Deco-Furbish</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-157" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Very professional and user-friendly templates. Excellent work!</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Irene Krassas"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1575844047703-6534.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Irene Krassas</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-158" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Excellent service, user-friendly templates, very professional, highly recommended!</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Irene Krassas"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1575841503749-2549.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Irene Krassas</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-159" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            Very satisfied with the service!! Draftly.org have made it extremely easy to acquire all of the policies needed for my business website. The premium policies bundles is very inexpensive
                                            with no recurring fees, and they take care of lifetime policy updates and so much more!!
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Joanne Dale"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1575748646973-5088.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Joanne Dale</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-160" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            So far very satisfied!! Draftly.org have made it extremely easy to acquire all of the policies needed for my business website. The premium policies are very inexpensive and they take care
                                            of any lifetime policy updates and much more.
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Handyman Services"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1575745768919-5019.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Handyman Services</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-161" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">The site has a simple and easy to use process making it easy for people without a legal background to generate a privacy policy.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Robert Yawe"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1575486826800-1002.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Robert Yawe</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-162" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">I absolutely love using Draftly for all my policy needs. They make the process so incredibly easy for a great price!</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Rapper SteelTeeth"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1575486826811-2065.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Rapper SteelTeeth</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-186" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">I absolutely love using Draftly for all my policy needs. They make the process so incredibly easy for a great price!</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Anna Bledsoe"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1575486826806-6181.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Anna Bledsoe</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-163" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Thank you so much!! Wonderful service.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Dror Gronich"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1575486826773-3475.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Dror Gronich</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-164" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Very fast policy creator, never seen before but glad I found it. Thanks a lot to Draftly.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Syed Abid"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1575486826821-8672.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Syed Abid</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-165" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Easy to use, free for basic policies which is what need, for now, will upgrade later.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Kylie Griffin"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1575486826914-3711.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Kylie Griffin</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-166" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Awesome generator and nice and easy setup flow to get it customized for your website. Thumbs up!</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Filip Djukanovic"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1575486826911-4915.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Filip Djukanovic</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-167" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Headache gone, quick, easy, inexpensive!</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Maryjane Claydon"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1575486826924-2144.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Maryjane Claydon</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-168" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Helpful, easy and user-friendly. Thank you.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Tahrima Sharmin Nisa"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1575486826931-3962.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Tahrima Sharmin Nisa</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-169" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Extremely user-friendly, fast, great service! Thank you so much Draftly!</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Shirin Asadi McGhee"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1575486826929-988.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Shirin Asadi McGhee</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-170" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            So easy to use. Reasonable prices. I got exactly what they promised and am happy to have found them as this is an area that demands some level of expertise I don't want to spend my time on
                                            studying.
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Susanne Helgesen"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1575486826934-2276.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Susanne Helgesen</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-171" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">This is the best service for the best price among others that I've tried!</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Victor Stadnichenko"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1575486827058-6581.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Victor Stadnichenko</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-172" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Looks genuine and trustworthy, thanks!</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Mariano Navas"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1575486827054-4261.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Mariano Navas</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-187" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Great for startups and very easy to create. Thank U.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Shubh Aur Labh"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1575486827040-9444.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Shubh Aur Labh</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-173" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Great for startups and very easy to use! Provided what they promised. Thank you!</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Andrea Clement"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1575486827046-7534.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Andrea Clement</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-174" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Thank you for helping me create a privacy policy.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Andi Krisdianto"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1575486827044-3514.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Andi Krisdianto</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-175" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">Reasonably priced and easy to use. Thanks for the great service!</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Julie Emilio"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1575486827046-2930.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Julie Emilio</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-176" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">The site is easy to use and offers great solutions for start-ups.</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Lana Hill"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1575486827160-7948.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Lana Hill</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-91" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            A perfect solution for startup companies. It is very easy to create a policy even you do not have any legal background. Service is affordable as well. I strongly recommend Draftly service.
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Buryan Turan"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1586182270530-6583.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Buryan Turan</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-177" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">The perfect solution for startup companies with online services. The "go-to" website for generating policies. Thanks for creating such a service!</p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Büryan Turan"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1575486827187-8099.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Büryan Turan</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-73" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            I've been looking all over to find a place where I could get GDPR Privacy and Cookie Policies for my site at a reasonable price. Then I stumbled across Draftly and gave it a try. It was
                                            super easy to fill in the form, took just a few mins. I also ended up ordering Terms and Conditions, Disclaimer, and Acceptable Use Policy, since they gave me a significant discount. So far, I
                                            have created the Privacy Policy, and I'm pleased with what I got, it covers everything I need.
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Stefan Fahlberg"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1587207745341-7111.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Stefan Fahlberg</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-52" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            Out of the various legal agreement platforms I found, Draftly grabbed me right away because they provided a free template. That sat well with me, and when I needed to purchase a customized
                                            terms of service agreement the price was reasonable, the process was easy to get through and the product was immediately provided. I give 5 stars!!!
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Ally Drez"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1586298425830-7783.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Ally Drez</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-38" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            This was a godsend. After spending months developing my website I am ready to launch, but I really didn't want to go to a lawyer and wait longer and pay a lot to have a terms of service written
                                            for it. After just filling out some forms, I now have a complete ToS to show on my website. I'm so happy!
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Frank"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1595714221616-4634.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Frank</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-14" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            There are a lot of other free policy generators online but almost all of them are hideous and just trying to make a quick buck off of AdSense. That’s not the case with Draftly so kudos to
                                            the owners!
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Brian Jackson"
                                                        width="250"
                                                        height="250"
                                                        data-src="{{ asset('assets/images/i1fhgbvdgwa41k48ol5j_l.jpg')}}"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
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

                                <div class="brick infinitescroll-page-1" id="row-article-13" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            When searching around for a website to help me with a privacy policy, I ran across a few that wanted to charge an annual fee or they didn't include everything you need (GDPR language). Not so with
                                            Draftly. They offered a comprehensive policy at a great price with a link to the policy that will be updated if any laws change. It was easy to use &amp; navigate - what else would you
                                            need and want?
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Andrew Tucker"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1575486826911-4915.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Andrew Tucker</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-11" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            After looking into how I can protect my business, I decided to create my app policies with Draftly, and it was a perfect choice. The questions are easy to answer to, it's fully
                                            customizable and looks very professional. Amazing service!
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Sandy Chiereghin"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1576963463178-5975.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Sandy Chiereghin</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-10" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            Draftly is indeed a great service you can use to generate privacy policy and other legal documents you need for your website. I found it easy to use and very professional. Don't hesitate
                                            to give them a try.
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Erik Emanuelli"
                                                        width="250"
                                                        height="250"
                                                        data-src="{{ asset('assets/images/5lr07x0frhn0rxykpiyg_l.jpg')}}"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
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

                                <div class="brick infinitescroll-page-1" id="row-article-8" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            With Draftly it’s easy to create legal documents for your site that match up with your site practices because each user is walked through a questionnaire, which breaks down the fine
                                            details.
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Zac Johnson"
                                                        width="250"
                                                        height="250"
                                                        data-src="{{ asset('assets/images/mby7tgh37fauxzoi6fje_l.jpg')}}"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
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

                                <div class="brick infinitescroll-page-1" id="row-article-7" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            I was really impressed with Draftly. It makes the boring task of creating a legal document quick and easy. I highly recommend checking it out if you are looking to create a privacy policy,
                                            terms of service policy or others.
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Kevin Muldoon"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1588598568604-1654.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Kevin Muldoon</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-6" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            As an entrepreneur, time is the most valuable asset for me. Your service allows me to create legal agreements for my ventures with just a few clicks without having to spend a lot of time
                                            researching the laws and requirements. Well worth the money spent.
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Monica Hall"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1595269622047-446.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Monica Hall</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-5" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            I used a different company to create my privacy policy and disclaimer in the past but I wanted something different as I didn’t like paying monthly fees. The fact that you provide customizable
                                            policies for a low one-time fee is a win for me.
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="David Troy"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1593478792461-9234.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">David Troy</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-4" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            We looked at a number of different solutions and yours was by far the best choice. Custom-tailored to our needs, no monthly fees and responsive support – couldn’t have asked for anything more.
                                            Thanks for making it so simple.
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Michael Lee"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1584034023350-9716.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Michael Lee</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-3" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            This is a perfect service for me as a blogger. I felt hesitant using online templates for my disclaimer and certainly didn’t want to pay monthly fees. I was very impressed with what I got from you
                                            as it suits my needs perfectly.
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Nancy Kolva"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1593937621666-4925.jpg"

                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Nancy Kolva</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-2" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            It’s been a great experience from start to finish and I can’t thank you enough. I had a couple of questions along the way that your staff addressed very promptly. I’m never going to copy anyone
                                            else’s privacy policy anymore and will be happy to use your services again for all my future projects.
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Naomi Tang"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1594651269956-8057.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Naomi Tang</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-1" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            I’m so glad I found you guys! You saved me quite a bit of money and took the stress away from writing these annoying legal agreements. I couldn’t be happier with the results and will definitely
                                            recommend you to everyone.
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Dennis Boriy"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1602196022196-7047.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Dennis Boriy</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="brick infinitescroll-page-1" id="row-article-178" bis_skin_checked="1">
                                    <blockquote class="images">
                                        <p class="message">
                                            All legal documents I need for my apps and websites, easy and low cost-effective compared to others! Thank you so much, I would recommend you to others! Support is highly responsive :)
                                        </p>

                                        <div class="author" bis_skin_checked="1">
                                            <figure class="testimonial">
                                                <div class="image" bis_skin_checked="1">
                                                    <img
                                                        alt="Kiruba Jc"
                                                        width="250"
                                                        height="250"
                                                        data-src="https://ndrsl-avatars.s3.us-east-2.amazonaws.com/1575486827188-5579.jpg"
                                                        src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20250%20250%22%3E%3C/svg%3E"
                                                        class="lazyload"
                                                        style="max-width: 250px;"
                                                    />
                                                </div>
                                            </figure>
                                            <p class="about">
                                                <span class="name">Kiruba Jc</span>
                                                <span class="rating"></span>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>
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