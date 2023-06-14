// Copyright 2012 Google Inc. All rights reserved.
(function () {
    var data = {
        resource: {
            version: "27",

            macros: [
                {
                    function: "__e",
                },
                {
                    function: "__dee",
                },
            ],
            tags: [
                {
                    function: "__asprv",
                    vtp_globalName: "google_optimize",
                    tag_id: 6,
                },
            ],
            predicates: [
                {
                    function: "_eq",
                    arg0: ["macro", 0],
                    arg1: ["macro", 1],
                },
                {
                    function: "_eq",
                    arg0: ["macro", 0],
                    arg1: "optimize.callback",
                },
            ],
            rules: [
                [
                    ["if", 0],
                    ["add", 0],
                ],
                [
                    ["if", 1],
                    ["add", 0],
                ],
            ],
        },
        runtime: [],
    };
    /*

 Copyright The Closure Library Authors.
 SPDX-License-Identifier: Apache-2.0
*/
    var aa,
        ba = function (a) {
            var b = 0;
            return function () {
                return b < a.length ? { done: !1, value: a[b++] } : { done: !0 };
            };
        },
        da = function (a) {
            var b = "undefined" != typeof Symbol && Symbol.iterator && a[Symbol.iterator];
            return b ? b.call(a) : { next: ba(a) };
        },
        ea =
            "function" == typeof Object.create
                ? Object.create
                : function (a) {
                      var b = function () {};
                      b.prototype = a;
                      return new b();
                  },
        fa;
    if ("function" == typeof Object.setPrototypeOf) fa = Object.setPrototypeOf;
    else {
        var ha;
        a: {
            var ka = { a: !0 },
                la = {};
            try {
                la.__proto__ = ka;
                ha = la.a;
                break a;
            } catch (a) {}
            ha = !1;
        }
        fa = ha
            ? function (a, b) {
                  a.__proto__ = b;
                  if (a.__proto__ !== b) throw new TypeError(a + " is not extensible");
                  return a;
              }
            : null;
    }
    var na = fa,
        pa = function (a, b) {
            a.prototype = ea(b.prototype);
            a.prototype.constructor = a;
            if (na) na(a, b);
            else
                for (var c in b)
                    if ("prototype" != c)
                        if (Object.defineProperties) {
                            var d = Object.getOwnPropertyDescriptor(b, c);
                            d && Object.defineProperty(a, c, d);
                        } else a[c] = b[c];
            a.di = b.prototype;
        },
        qa = this || self,
        ta = function (a) {
            if (a && a != qa) return ra(a.document);
            null === sa && (sa = ra(qa.document));
            return sa;
        },
        ua = /^[\w+/_-]+[=]{0,2}$/,
        sa = null,
        ra = function (a) {
            var b = a.querySelector && a.querySelector("script[nonce]");
            if (b) {
                var c = b.nonce || b.getAttribute("nonce");
                if (c && ua.test(c)) return c;
            }
            return "";
        },
        va = function (a) {
            var b = typeof a;
            return "object" != b ? b : a ? (Array.isArray(a) ? "array" : b) : "null";
        },
        xa = function (a, b) {
            function c() {}
            c.prototype = b.prototype;
            a.di = b.prototype;
            a.prototype = new c();
            a.prototype.constructor = a;
            a.yi = function (d, e, f) {
                for (var h = Array(arguments.length - 2), k = 2; k < arguments.length; k++) h[k - 2] = arguments[k];
                return b.prototype[e].apply(d, h);
            };
        },
        ya = function (a) {
            return a;
        };
    var za = function () {},
        Aa = function (a) {
            return "function" == typeof a;
        },
        g = function (a) {
            return "string" == typeof a;
        },
        Ca = function (a) {
            return "number" == typeof a && !isNaN(a);
        },
        Da = function (a) {
            return "[object Array]" == Object.prototype.toString.call(Object(a));
        },
        Ea = function (a, b) {
            if (Array.prototype.indexOf) {
                var c = a.indexOf(b);
                return "number" == typeof c ? c : -1;
            }
            for (var d = 0; d < a.length; d++) if (a[d] === b) return d;
            return -1;
        },
        Fa = function (a, b) {
            if (a && Da(a)) for (var c = 0; c < a.length; c++) if (a[c] && b(a[c])) return a[c];
        },
        Ga = function (a, b) {
            if (!Ca(a) || !Ca(b) || a > b) (a = 0), (b = 2147483647);
            return Math.floor(Math.random() * (b - a + 1) + a);
        },
        Ja = function (a, b) {
            for (var c = new Ia(), d = 0; d < a.length; d++) c.set(a[d], !0);
            for (var e = 0; e < b.length; e++) if (c.get(b[e])) return !0;
            return !1;
        },
        Ka = function (a, b) {
            for (var c in a) Object.prototype.hasOwnProperty.call(a, c) && b(c, a[c]);
        },
        La = function (a) {
            return !!a && ("[object Arguments]" == Object.prototype.toString.call(a) || Object.prototype.hasOwnProperty.call(a, "callee"));
        },
        Na = function (a) {
            return Math.round(Number(a)) || 0;
        },
        Sa = function (a) {
            return "false" == String(a).toLowerCase() ? !1 : !!a;
        },
        Ta = function (a) {
            var b = [];
            if (Da(a)) for (var c = 0; c < a.length; c++) b.push(String(a[c]));
            return b;
        },
        Ua = function (a) {
            return a ? a.replace(/^\s+|\s+$/g, "") : "";
        },
        Va = function () {
            return new Date().getTime();
        },
        Ia = function () {
            this.prefix = "gtm.";
            this.values = {};
        };
    Ia.prototype.set = function (a, b) {
        this.values[this.prefix + a] = b;
    };
    Ia.prototype.get = function (a) {
        return this.values[this.prefix + a];
    };
    var Xa = function (a, b, c) {
            return a && a.hasOwnProperty(b) ? a[b] : c;
        },
        Ya = function (a) {
            var b = !1;
            return function () {
                if (!b)
                    try {
                        a();
                    } catch (c) {}
                b = !0;
            };
        },
        bb = function (a, b) {
            for (var c in b) b.hasOwnProperty(c) && (a[c] = b[c]);
        },
        cb = function (a) {
            for (var b in a) if (a.hasOwnProperty(b)) return !0;
            return !1;
        },
        db = function (a, b) {
            for (var c = [], d = 0; d < a.length; d++) c.push(a[d]), c.push.apply(c, b[a[d]] || []);
            return c;
        },
        eb = function (a, b) {
            for (var c = {}, d = c, e = a.split("."), f = 0; f < e.length - 1; f++) d = d[e[f]] = {};
            d[e[e.length - 1]] = b;
            return c;
        },
        fb = function (a) {
            var b = [];
            Ka(a, function (c, d) {
                10 > c.length && d && b.push(c);
            });
            return b.join(",");
        }; /*
 jQuery v1.9.1 (c) 2005, 2012 jQuery Foundation, Inc. jquery.org/license. */
    var gb = /\[object (Boolean|Number|String|Function|Array|Date|RegExp)\]/,
        hb = function (a) {
            if (null == a) return String(a);
            var b = gb.exec(Object.prototype.toString.call(Object(a)));
            return b ? b[1].toLowerCase() : "object";
        },
        ib = function (a, b) {
            return Object.prototype.hasOwnProperty.call(Object(a), b);
        },
        kb = function (a) {
            if (!a || "object" != hb(a) || a.nodeType || a == a.window) return !1;
            try {
                if (a.constructor && !ib(a, "constructor") && !ib(a.constructor.prototype, "isPrototypeOf")) return !1;
            } catch (c) {
                return !1;
            }
            for (var b in a);
            return void 0 === b || ib(a, b);
        },
        m = function (a, b) {
            var c = b || ("array" == hb(a) ? [] : {}),
                d;
            for (d in a)
                if (ib(a, d)) {
                    var e = a[d];
                    "array" == hb(e) ? ("array" != hb(c[d]) && (c[d] = []), (c[d] = m(e, c[d]))) : kb(e) ? (kb(c[d]) || (c[d] = {}), (c[d] = m(e, c[d]))) : (c[d] = e);
                }
            return c;
        };
    var lb = function (a) {
        if (void 0 === a || Da(a) || kb(a)) return !0;
        switch (typeof a) {
            case "boolean":
            case "number":
            case "string":
            case "function":
                return !0;
        }
        return !1;
    };
    var Jb;
    var Kb = [],
        Lb = [],
        Mb = [],
        Nb = [],
        Ob = [],
        Pb = {},
        Sb,
        Tb,
        Ub,
        Vb = function (a, b) {
            var c = a["function"];
            if (!c) throw Error("Error: No function name given for function call.");
            var d = Pb[c],
                e = {},
                f;
            for (f in a) a.hasOwnProperty(f) && 0 === f.indexOf("vtp_") && (d && b && b.Ze && b.Ze(a[f]), (e[void 0 !== d ? f : f.substr(4)] = a[f]));
            return void 0 !== d ? d(e) : Jb(c, e, b);
        },
        Xb = function (a, b, c) {
            c = c || [];
            var d = {},
                e;
            for (e in a) a.hasOwnProperty(e) && (d[e] = Wb(a[e], b, c));
            return d;
        },
        Wb = function (a, b, c) {
            if (Da(a)) {
                var d;
                switch (a[0]) {
                    case "function_id":
                        return a[1];
                    case "list":
                        d = [];
                        for (var e = 1; e < a.length; e++) d.push(Wb(a[e], b, c));
                        return d;
                    case "macro":
                        var f = a[1];
                        if (c[f]) return;
                        var h = Kb[f];
                        if (!h || b.xd(h)) return;
                        c[f] = !0;
                        try {
                            var k = Xb(h, b, c);
                            k.vtp_gtmEventId = b.id;
                            d = Vb(k, b);
                            Ub && (d = Ub.$g(d, k));
                        } catch (y) {
                            b.pf && b.pf(y, Number(f)), (d = !1);
                        }
                        c[f] = !1;
                        return d;
                    case "map":
                        d = {};
                        for (var l = 1; l < a.length; l += 2) d[Wb(a[l], b, c)] = Wb(a[l + 1], b, c);
                        return d;
                    case "template":
                        d = [];
                        for (var q = !1, r = 1; r < a.length; r++) {
                            var n = Wb(a[r], b, c);
                            Tb && (q = q || n === Tb.fc);
                            d.push(n);
                        }
                        return Tb && q ? Tb.dh(d) : d.join("");
                    case "escape":
                        d = Wb(a[1], b, c);
                        if (Tb && Da(a[1]) && "macro" === a[1][0] && Tb.zh(a)) return Tb.Qh(d);
                        d = String(d);
                        for (var t = 2; t < a.length; t++) mb[a[t]] && (d = mb[a[t]](d));
                        return d;
                    case "tag":
                        var p = a[1];
                        if (!Nb[p]) throw Error("Unable to resolve tag reference " + p + ".");
                        return (d = { df: a[2], index: p });
                    case "zb":
                        var u = { arg0: a[2], arg1: a[3], ignore_case: a[5] };
                        u["function"] = a[1];
                        var v = Zb(u, b, c),
                            w = !!a[4];
                        return w || 2 !== v ? w !== (1 === v) : null;
                    default:
                        throw Error("Attempting to expand unknown Value type: " + a[0] + ".");
                }
            }
            return a;
        },
        Zb = function (a, b, c) {
            try {
                return Sb(Xb(a, b, c));
            } catch (d) {
                JSON.stringify(a);
            }
            return 2;
        };
    var $b = (function () {
        var a = function (b) {
            return {
                toString: function () {
                    return b;
                },
            };
        };
        return {
            Gf: a("consent"),
            Wd: a("convert_case_to"),
            Xd: a("convert_false_to"),
            Yd: a("convert_null_to"),
            Zd: a("convert_true_to"),
            $d: a("convert_undefined_to"),
            mi: a("debug_mode_metadata"),
            Na: a("function"),
            ug: a("instance_name"),
            vg: a("live_only"),
            wg: a("malware_disabled"),
            xg: a("metadata"),
            ri: a("original_activity_id"),
            si: a("original_vendor_template_id"),
            zg: a("once_per_event"),
            Pe: a("once_per_load"),
            Te: a("setup_tags"),
            Ue: a("tag_id"),
            Ve: a("teardown_tags"),
        };
    })();
    var ac = null,
        dc = function (a) {
            function b(n) {
                for (var t = 0; t < n.length; t++) d[n[t]] = !0;
            }
            var c = [],
                d = [];
            ac = bc(a);
            for (var e = 0; e < Lb.length; e++) {
                var f = Lb[e],
                    h = cc(f);
                if (h) {
                    for (var k = f.add || [], l = 0; l < k.length; l++) c[k[l]] = !0;
                    b(f.block || []);
                } else null === h && b(f.block || []);
            }
            for (var q = [], r = 0; r < Nb.length; r++) c[r] && !d[r] && (q[r] = !0);
            return q;
        },
        cc = function (a) {
            for (var b = a["if"] || [], c = 0; c < b.length; c++) {
                var d = ac(b[c]);
                if (0 === d) return !1;
                if (2 === d) return null;
            }
            for (var e = a.unless || [], f = 0; f < e.length; f++) {
                var h = ac(e[f]);
                if (2 === h) return null;
                if (1 === h) return !1;
            }
            return !0;
        },
        bc = function (a) {
            var b = [];
            return function (c) {
                void 0 === b[c] && (b[c] = Zb(Mb[c], a));
                return b[c];
            };
        };
    var ec = {
        $g: function (a, b) {
            b[$b.Wd] && "string" === typeof a && (a = 1 == b[$b.Wd] ? a.toLowerCase() : a.toUpperCase());
            b.hasOwnProperty($b.Yd) && null === a && (a = b[$b.Yd]);
            b.hasOwnProperty($b.$d) && void 0 === a && (a = b[$b.$d]);
            b.hasOwnProperty($b.Zd) && !0 === a && (a = b[$b.Zd]);
            b.hasOwnProperty($b.Xd) && !1 === a && (a = b[$b.Xd]);
            return a;
        },
    }; /*
 Copyright (c) 2014 Derek Brans, MIT license https://github.com/krux/postscribe/blob/master/LICENSE. Portions derived from simplehtmlparser, which is licensed under the Apache License, Version 2.0 */
    var C = {
        yb: "_ee",
        ld: "_syn",
        wi: "_uei",
        ed: "_eu",
        ui: "_pci",
        Tc: "event_callback",
        Zb: "event_timeout",
        fa: "gtag.config",
        Ja: "gtag.get",
        ma: "purchase",
        Xa: "refund",
        Ia: "begin_checkout",
        Va: "add_to_cart",
        Wa: "remove_from_cart",
        Qf: "view_cart",
        de: "add_to_wishlist",
        ya: "view_item",
        ce: "view_promotion",
        be: "select_promotion",
        Oc: "select_item",
        Wb: "view_item_list",
        ae: "add_payment_info",
        Pf: "add_shipping_info",
        Ba: "value_key",
        Aa: "value_callback",
        ia: "allow_ad_personalization_signals",
        ad: "restricted_data_processing",
        ob: "allow_google_signals",
        ja: "cookie_expires",
        rb: "cookie_update",
        vb: "session_duration",
        oa: "user_properties",
        Ma: "transport_url",
        O: "ads_data_redaction",
        B: "ad_storage",
        I: "analytics_storage",
        Hf: "region",
        If: "wait_for_update",
    };
    C.Ge = [C.ma, C.Xa, C.Ia, C.Va, C.Wa, C.Qf, C.de, C.ya, C.ce, C.be, C.Wb, C.Oc, C.ae, C.Pf];
    C.Fe = [C.ia, C.ob, C.rb];
    C.He = [C.ja, C.Zb, C.vb];
    var Fc = {},
        Gc = function (a, b) {
            Fc[a] = Fc[a] || [];
            Fc[a][b] = !0;
        },
        Hc = function (a) {
            for (var b = [], c = Fc[a] || [], d = 0; d < c.length; d++) c[d] && (b[Math.floor(d / 6)] ^= 1 << d % 6);
            for (var e = 0; e < b.length; e++) b[e] = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789-_".charAt(b[e] || 0);
            return b.join("");
        };
    var E = function (a) {
        Gc("GTM", a);
    };
    function Ic(a) {
        if (Error.captureStackTrace) Error.captureStackTrace(this, Ic);
        else {
            var b = Error().stack;
            b && (this.stack = b);
        }
        a && (this.message = String(a));
    }
    xa(Ic, Error);
    Ic.prototype.name = "CustomError";
    var Jc = function (a, b) {
        for (var c = a.split("%s"), d = "", e = c.length - 1, f = 0; f < e; f++) d += c[f] + (f < b.length ? b[f] : "%s");
        Ic.call(this, d + c[e]);
    };
    xa(Jc, Ic);
    Jc.prototype.name = "AssertionError";
    var Nc = function (a, b) {
        throw new Jc("Failure" + (a ? ": " + a : ""), Array.prototype.slice.call(arguments, 1));
    };
    var Oc = function (a, b) {
            var c = function () {};
            c.prototype = a.prototype;
            var d = new c();
            a.apply(d, Array.prototype.slice.call(arguments, 1));
            return d;
        },
        Pc = function (a) {
            var b = a;
            return function () {
                if (b) {
                    var c = b;
                    b = null;
                    c();
                }
            };
        };
    var Qc,
        Rc = function () {
            if (void 0 === Qc) {
                var a = null,
                    b = qa.trustedTypes;
                if (b && b.createPolicy) {
                    try {
                        a = b.createPolicy("goog#html", { createHTML: ya, createScript: ya, createScriptURL: ya });
                    } catch (c) {
                        qa.console && qa.console.error(c.message);
                    }
                    Qc = a;
                } else Qc = a;
            }
            return Qc;
        };
    var Tc = function (a, b) {
        this.m = b === Sc ? a : "";
    };
    Tc.prototype.toString = function () {
        return this.m + "";
    };
    var Sc = {};
    var Uc = /^(?:(?:https?|mailto|ftp):|[^:/?#]*(?:[/?#]|$))/i;
    var Vc;
    a: {
        var Wc = qa.navigator;
        if (Wc) {
            var Xc = Wc.userAgent;
            if (Xc) {
                Vc = Xc;
                break a;
            }
        }
        Vc = "";
    }
    var Yc = function (a) {
        return -1 != Vc.indexOf(a);
    };
    var $c = function (a, b, c) {
        this.m = c === Zc ? a : "";
    };
    $c.prototype.toString = function () {
        return this.m.toString();
    };
    var ad = function (a) {
            if (a instanceof $c && a.constructor === $c) return a.m;
            Nc("expected object of type SafeHtml, got '" + a + "' of type " + va(a));
            return "type_error:SafeHtml";
        },
        Zc = {},
        bd = new $c((qa.trustedTypes && qa.trustedTypes.emptyHTML) || "", 0, Zc);
    var cd = { MATH: !0, SCRIPT: !0, STYLE: !0, SVG: !0, TEMPLATE: !0 },
        dd = (function (a) {
            var b = !1,
                c;
            return function () {
                b || ((c = a()), (b = !0));
                return c;
            };
        })(function () {
            if ("undefined" === typeof document) return !1;
            var a = document.createElement("div"),
                b = document.createElement("div");
            b.appendChild(document.createElement("div"));
            a.appendChild(b);
            if (!a.firstChild) return !1;
            var c = a.firstChild.firstChild;
            a.innerHTML = ad(bd);
            return !c.parentElement;
        }),
        fd = function (a, b) {
            if (a.tagName && cd[a.tagName.toUpperCase()]) throw Error("goog.dom.safe.setInnerHtml cannot be used to set content of " + a.tagName + ".");
            if (dd()) for (; a.lastChild; ) a.removeChild(a.lastChild);
            a.innerHTML = ad(b);
        };
    var gd = function (a) {
        var b = Rc(),
            c = b ? b.createHTML(a) : a;
        return new $c(c, null, Zc);
    };
    var G = window,
        H = document,
        hd = navigator,
        id = H.currentScript && H.currentScript.src,
        jd = function (a, b) {
            var c = G[a];
            G[a] = void 0 === c ? b : c;
            return G[a];
        },
        kd = function (a, b) {
            b &&
                (a.addEventListener
                    ? (a.onload = b)
                    : (a.onreadystatechange = function () {
                          a.readyState in { loaded: 1, complete: 1 } && ((a.onreadystatechange = null), b());
                      }));
        },
        ld = function (a, b, c) {
            var d = H.createElement("script");
            d.type = "text/javascript";
            d.async = !0;
            var e,
                f = Rc(),
                h = f ? f.createScriptURL(a) : a;
            e = new Tc(h, Sc);
            var k;
            a: {
                try {
                    var l = d && d.ownerDocument,
                        q = l && (l.defaultView || l.parentWindow);
                    q = q || qa;
                    if (q.Element && q.Location) {
                        k = q;
                        break a;
                    }
                } catch (w) {}
                k = null;
            }
            if (k && "undefined" != typeof k.HTMLScriptElement && (!d || (!(d instanceof k.HTMLScriptElement) && (d instanceof k.Location || d instanceof k.Element)))) {
                var r;
                var n = typeof d;
                if (("object" == n && null != d) || "function" == n)
                    try {
                        r = d.constructor.displayName || d.constructor.name || Object.prototype.toString.call(d);
                    } catch (w) {
                        r = "<object could not be stringified>";
                    }
                else r = void 0 === d ? "undefined" : null === d ? "null" : typeof d;
                Nc("Argument is not a %s (or a non-Element, non-Location mock); got: %s", "HTMLScriptElement", r);
            }
            var t;
            e instanceof Tc && e.constructor === Tc ? (t = e.m) : (Nc("expected object of type TrustedResourceUrl, got '" + e + "' of type " + va(e)), (t = "type_error:TrustedResourceUrl"));
            d.src = t;
            var p = ta(d.ownerDocument && d.ownerDocument.defaultView);
            p && d.setAttribute("nonce", p);
            kd(d, b);
            c && (d.onerror = c);
            var u = ta();
            u && d.setAttribute("nonce", u);
            var v = H.getElementsByTagName("script")[0] || H.body || H.head;
            v.parentNode.insertBefore(d, v);
            return d;
        },
        md = function () {
            if (id) {
                var a = id.toLowerCase();
                if (0 === a.indexOf("https://")) return 2;
                if (0 === a.indexOf("http://")) return 3;
            }
            return 1;
        },
        nd = function (a, b) {
            var c = H.createElement("iframe");
            c.height = "0";
            c.width = "0";
            c.style.display = "none";
            c.style.visibility = "hidden";
            var d = (H.body && H.body.lastChild) || H.body || H.head;
            d.parentNode.insertBefore(c, d);
            kd(c, b);
            void 0 !== a && (c.src = a);
            return c;
        },
        od = function (a, b, c) {
            var d = new Image(1, 1);
            d.onload = function () {
                d.onload = null;
                b && b();
            };
            d.onerror = function () {
                d.onerror = null;
                c && c();
            };
            d.src = a;
            return d;
        },
        pd = function (a, b, c, d) {
            a.addEventListener ? a.addEventListener(b, c, !!d) : a.attachEvent && a.attachEvent("on" + b, c);
        },
        qd = function (a, b, c) {
            a.removeEventListener ? a.removeEventListener(b, c, !1) : a.detachEvent && a.detachEvent("on" + b, c);
        },
        I = function (a) {
            G.setTimeout(a, 0);
        },
        rd = function (a, b) {
            return a && b && a.attributes && a.attributes[b] ? a.attributes[b].value : null;
        },
        sd = function (a) {
            var b = a.innerText || a.textContent || "";
            b && " " != b && (b = b.replace(/^[\s\xa0]+|[\s\xa0]+$/g, ""));
            b && (b = b.replace(/(\xa0+|\s{2,}|\n|\r\t)/g, " "));
            return b;
        },
        td = function (a) {
            var b = H.createElement("div");
            fd(b, gd("A<div>" + a + "</div>"));
            b = b.lastChild;
            for (var c = []; b.firstChild; ) c.push(b.removeChild(b.firstChild));
            return c;
        },
        ud = function (a, b, c) {
            c = c || 100;
            for (var d = {}, e = 0; e < b.length; e++) d[b[e]] = !0;
            for (var f = a, h = 0; f && h <= c; h++) {
                if (d[String(f.tagName).toLowerCase()]) return f;
                f = f.parentElement;
            }
            return null;
        },
        vd = function (a) {
            (hd.sendBeacon && hd.sendBeacon(a)) || od(a);
        },
        wd = function (a, b) {
            var c = a[b];
            c && "string" === typeof c.animVal && (c = c.animVal);
            return c;
        };
    var xd = {},
        yd = function () {
            return void 0 == xd.gtag_cs_api ? !1 : xd.gtag_cs_api;
        };
    var zd = [];
    function Ad() {
        var a = jd("google_tag_data", {});
        a.ics || (a.ics = { entries: {}, set: Bd, update: Cd, addListener: Dd, notifyListeners: Ed, active: !1 });
        return a.ics;
    }
    function Bd(a, b, c, d, e, f) {
        var h = Ad();
        h.active = !0;
        if (void 0 != b) {
            var k = h.entries,
                l = k[a] || {},
                q = l.region,
                r = c && g(c) ? c.toUpperCase() : void 0;
            d = d.toUpperCase();
            e = e.toUpperCase();
            if (r === e || (r === d ? q !== e : !r && !q)) {
                var n = !!(f && 0 < f && void 0 === l.update),
                    t = { region: r, initial: "granted" === b, update: l.update, quiet: n };
                k[a] = t;
                n &&
                    G.setTimeout(function () {
                        k[a] === t && t.quiet && ((t.quiet = !1), Fd(a), Ed(), Gc("TAGGING", 2));
                    }, f);
            }
        }
    }
    function Cd(a, b) {
        var c = Ad();
        c.active = !0;
        if (void 0 != b) {
            var d = Gd(a),
                e = c.entries,
                f = (e[a] = e[a] || {});
            f.update = "granted" === b;
            var h = Gd(a);
            f.quiet ? ((f.quiet = !1), Fd(a)) : h !== d && Fd(a);
        }
    }
    function Dd(a, b) {
        zd.push({ af: a, mh: b });
    }
    function Fd(a) {
        for (var b = 0; b < zd.length; ++b) {
            var c = zd[b];
            Da(c.af) && -1 !== c.af.indexOf(a) && (c.tf = !0);
        }
    }
    function Ed(a) {
        for (var b = 0; b < zd.length; ++b) {
            var c = zd[b];
            if (c.tf) {
                c.tf = !1;
                try {
                    c.mh({ $e: a });
                } catch (d) {}
            }
        }
    }
    var Gd = function (a) {
            var b = Ad().entries[a] || {};
            return void 0 !== b.update ? b.update : void 0 !== b.initial ? b.initial : void 0;
        },
        Hd = function (a) {
            return !(Ad().entries[a] || {}).quiet;
        },
        Id = function () {
            return yd() ? Ad().active : !1;
        },
        Jd = function (a, b) {
            Ad().addListener(a, b);
        },
        Kd = function (a, b) {
            function c() {
                for (var e = 0; e < b.length; e++) if (!Hd(b[e])) return !0;
                return !1;
            }
            if (c()) {
                var d = !1;
                Jd(b, function (e) {
                    d || c() || ((d = !0), a(e));
                });
            } else a({});
        },
        Ld = function (a, b) {
            if (!1 === Gd(b)) {
                var c = !1;
                Jd([b], function (d) {
                    !c && Gd(b) && (a(d), (c = !0));
                });
            }
        };
    var Md = [C.B, C.I],
        Nd = function (a) {
            var b = a[C.Hf];
            b && E(40);
            var c = a[C.If];
            c && E(41);
            for (var d = Da(b) ? b : [b], e = 0; e < d.length; ++e)
                for (var f = 0; f < Md.length; f++) {
                    var h = Md[f],
                        k = a[Md[f]],
                        l = d[e];
                    Ad().set(h, k, l, "IN", "IN-CH", c);
                }
        },
        Od = function (a, b) {
            for (var c = 0; c < Md.length; c++) {
                var d = Md[c],
                    e = a[Md[c]];
                Ad().update(d, e);
            }
            Ad().notifyListeners(b);
        },
        Pd = function (a) {
            var b = Gd(a);
            return void 0 != b ? b : !0;
        },
        Qd = function () {
            for (var a = [], b = 0; b < Md.length; b++) {
                var c = Gd(Md[b]);
                a[b] = !0 === c ? "1" : !1 === c ? "0" : "-";
            }
            return "G1" + a.join("");
        },
        Rd = function (a, b) {
            Kd(a, b);
        };
    var Td = function (a) {
            return Sd ? H.querySelectorAll(a) : null;
        },
        Ud = function (a, b) {
            if (!Sd) return null;
            if (Element.prototype.closest)
                try {
                    return a.closest(b);
                } catch (e) {
                    return null;
                }
            var c = Element.prototype.matches || Element.prototype.webkitMatchesSelector || Element.prototype.mozMatchesSelector || Element.prototype.msMatchesSelector || Element.prototype.oMatchesSelector,
                d = a;
            if (!H.documentElement.contains(d)) return null;
            do {
                try {
                    if (c.call(d, b)) return d;
                } catch (e) {
                    break;
                }
                d = d.parentElement || d.parentNode;
            } while (null !== d && 1 === d.nodeType);
            return null;
        },
        Vd = !1;
    if (H.querySelectorAll)
        try {
            var Wd = H.querySelectorAll(":root");
            Wd && 1 == Wd.length && Wd[0] == H.documentElement && (Vd = !0);
        } catch (a) {}
    var Sd = Vd;
    var $d = function (a) {
        if (H.hidden) return !0;
        var b = a.getBoundingClientRect();
        if (b.top == b.bottom || b.left == b.right || !G.getComputedStyle) return !0;
        var c = G.getComputedStyle(a, null);
        if ("hidden" === c.visibility) return !0;
        for (var d = a, e = c; d; ) {
            if ("none" === e.display) return !0;
            var f = e.opacity,
                h = e.filter;
            if (h) {
                var k = h.indexOf("opacity(");
                0 <= k && ((h = h.substring(k + 8, h.indexOf(")", k))), "%" == h.charAt(h.length - 1) && (h = h.substring(0, h.length - 1)), (f = Math.min(h, f)));
            }
            if (void 0 !== f && 0 >= f) return !0;
            (d = d.parentElement) && (e = G.getComputedStyle(d, null));
        }
        return !1;
    };
    var ie = /:[0-9]+$/,
        je = function (a, b, c) {
            for (var d = a.split("&"), e = 0; e < d.length; e++) {
                var f = d[e].split("=");
                if (decodeURIComponent(f[0]).replace(/\+/g, " ") === b) {
                    var h = f.slice(1).join("=");
                    return c ? h : decodeURIComponent(h).replace(/\+/g, " ");
                }
            }
        },
        me = function (a, b, c, d, e) {
            b && (b = String(b).toLowerCase());
            if ("protocol" === b || "port" === b) a.protocol = ke(a.protocol) || ke(G.location.protocol);
            "port" === b
                ? (a.port = String(Number(a.hostname ? a.port : G.location.port) || ("http" == a.protocol ? 80 : "https" == a.protocol ? 443 : "")))
                : "host" === b && (a.hostname = (a.hostname || G.location.hostname).replace(ie, "").toLowerCase());
            return le(a, b, c, d, e);
        },
        le = function (a, b, c, d, e) {
            var f,
                h = ke(a.protocol);
            b && (b = String(b).toLowerCase());
            switch (b) {
                case "url_no_fragment":
                    f = ne(a);
                    break;
                case "protocol":
                    f = h;
                    break;
                case "host":
                    f = a.hostname.replace(ie, "").toLowerCase();
                    if (c) {
                        var k = /^www\d*\./.exec(f);
                        k && k[0] && (f = f.substr(k[0].length));
                    }
                    break;
                case "port":
                    f = String(Number(a.port) || ("http" == h ? 80 : "https" == h ? 443 : ""));
                    break;
                case "path":
                    a.pathname || a.hostname || Gc("TAGGING", 1);
                    f = "/" == a.pathname.substr(0, 1) ? a.pathname : "/" + a.pathname;
                    var l = f.split("/");
                    0 <= Ea(d || [], l[l.length - 1]) && (l[l.length - 1] = "");
                    f = l.join("/");
                    break;
                case "query":
                    f = a.search.replace("?", "");
                    e && (f = je(f, e, void 0));
                    break;
                case "extension":
                    var q = a.pathname.split(".");
                    f = 1 < q.length ? q[q.length - 1] : "";
                    f = f.split("/")[0];
                    break;
                case "fragment":
                    f = a.hash.replace("#", "");
                    break;
                default:
                    f = a && a.href;
            }
            return f;
        },
        ke = function (a) {
            return a ? a.replace(":", "").toLowerCase() : "";
        },
        ne = function (a) {
            var b = "";
            if (a && a.href) {
                var c = a.href.indexOf("#");
                b = 0 > c ? a.href : a.href.substr(0, c);
            }
            return b;
        },
        oe = function (a) {
            var b = H.createElement("a");
            a && (b.href = a);
            var c = b.pathname;
            "/" !== c[0] && (a || Gc("TAGGING", 1), (c = "/" + c));
            var d = b.hostname.replace(ie, "");
            return { href: b.href, protocol: b.protocol, host: b.host, hostname: d, pathname: c, search: b.search, hash: b.hash, port: b.port };
        },
        pe = function (a) {
            function b(q) {
                var r = q.split("=")[0];
                return 0 > d.indexOf(r) ? q : r + "=0";
            }
            function c(q) {
                return q
                    .split("&")
                    .map(b)
                    .filter(function (r) {
                        return void 0 != r;
                    })
                    .join("&");
            }
            var d = "gclid dclid gclaw gcldc gclgp gclha gclgf _gl".split(" "),
                e = oe(a),
                f = a.split(/[?#]/)[0],
                h = e.search,
                k = e.hash;
            "?" === h[0] && (h = h.substring(1));
            "#" === k[0] && (k = k.substring(1));
            h = c(h);
            k = c(k);
            "" !== h && (h = "?" + h);
            "" !== k && (k = "#" + k);
            var l = "" + f + h + k;
            "/" === l[l.length - 1] && (l = l.substring(0, l.length - 1));
            return l;
        };
    var qe = new RegExp(/[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}/i),
        re = new RegExp(/support|noreply/i),
        se = ["SCRIPT", "IMG", "SVG", "PATH", "BR"],
        te = ["BR"];
    function ue(a) {
        var b;
        if (a === H.body) b = "body";
        else {
            var c;
            if (a.id) c = "#" + a.id;
            else {
                var d;
                if (a.parentElement) {
                    var e;
                    a: {
                        var f = a.parentElement;
                        if (f) {
                            for (var h = 0; h < f.childElementCount; h++)
                                if (f.children[h] === a) {
                                    e = h + 1;
                                    break a;
                                }
                            e = -1;
                        } else e = 1;
                    }
                    d = ue(a.parentElement) + ">:nth-child(" + e + ")";
                } else d = "";
                c = d;
            }
            b = c;
        }
        return b;
    }
    var xe = function () {
        var a = !0;
        var b = a,
            c;
        var d = [],
            e = H.body;
        if (e) {
            for (var f = e.querySelectorAll("*"), h = 0; h < f.length && 1e4 > h; h++) {
                var k = f[h];
                if (!(0 <= se.indexOf(k.tagName.toUpperCase()))) {
                    for (var l = !1, q = 0; q < k.childElementCount && 1e4 > q; q++)
                        if (!(0 <= te.indexOf(k.children[q].tagName.toUpperCase()))) {
                            l = !0;
                            break;
                        }
                    l || d.push(k);
                }
            }
            c = { elements: d, status: 1e4 < f.length ? "2" : "1" };
        } else c = { elements: d, status: "4" };
        for (var r = c, n = r.elements, t = [], p = 0; p < n.length; p++) {
            var u = n[p],
                v = u.textContent;
            u.value && (v = u.value);
            if (v) {
                var w = v.match(qe);
                if (w) {
                    var y = w[0],
                        x;
                    if (G.location) {
                        var z = le(G.location, "host", !0);
                        x = 0 <= y.toLowerCase().indexOf(z);
                    } else x = !1;
                    x || t.push({ element: u, Mc: y });
                }
            }
        }
        var A;
        for (var B = [], D = 10 < t.length ? "3" : r.status, F = 0; F < t.length && 10 > F; F++) {
            var K = t[F].element,
                P = t[F].Mc,
                T = !1;
            B.push({ Mc: P, querySelector: ue(K), tagName: K.tagName, isVisible: !$d(K), type: 1, zc: !!T });
        }
        return { elements: B, status: D };
    };
    var Le = {},
        L = null,
        Me = Math.random();
    Le.D = "GTM-M538CNN";
    Le.kc = "1d0";
    Le.oi = "";
    Le.Jf = "";
    var Ne = { __cl: !0, __ecl: !0, __ehl: !0, __evl: !0, __fal: !0, __fil: !0, __fsl: !0, __hl: !0, __jel: !0, __lcl: !0, __sdl: !0, __tl: !0, __ytl: !0 },
        Oe = { __paused: !0, __tg: !0 },
        Pe;
    for (Pe in Ne) Ne.hasOwnProperty(Pe) && (Oe[Pe] = !0);
    var Qe = "www.google-analytics.com/gtm.js";
    var Re = Qe,
        Se = Sa(""),
        Te = null,
        Ue = null,
        Ve = "//www.googletagmanager.com/a?id=" + Le.D + "&cv=27",
        We = {},
        Xe = {},
        Ye = function () {
            var a = L.sequence || 1;
            L.sequence = a + 1;
            return a;
        };
    var Ze = {},
        $e = new Ia(),
        af = {},
        bf = {},
        ef = {
            name: "dataLayer",
            set: function (a, b) {
                m(eb(a, b), af);
                cf();
            },
            get: function (a) {
                return df(a, 2);
            },
            reset: function () {
                $e = new Ia();
                af = {};
                cf();
            },
        },
        df = function (a, b) {
            return 2 != b ? $e.get(a) : ff(a);
        },
        ff = function (a) {
            var b,
                c = a.split(".");
            b = b || [];
            for (var d = af, e = 0; e < c.length; e++) {
                if (null === d) return !1;
                if (void 0 === d) break;
                d = d[c[e]];
                if (-1 !== Ea(b, d)) return;
            }
            return d;
        },
        gf = function (a, b) {
            bf.hasOwnProperty(a) || ($e.set(a, b), m(eb(a, b), af), cf());
        },
        cf = function (a) {
            Ka(bf, function (b, c) {
                $e.set(b, c);
                m(eb(b, void 0), af);
                m(eb(b, c), af);
                a && delete bf[b];
            });
        },
        hf = function (a, b, c) {
            Ze[a] = Ze[a] || {};
            var d = 1 !== c ? ff(b) : $e.get(b);
            "array" === hb(d) || "object" === hb(d) ? (Ze[a][b] = m(d)) : (Ze[a][b] = d);
        },
        jf = function (a, b) {
            if (Ze[a]) return Ze[a][b];
        },
        kf = function (a, b) {
            Ze[a] && delete Ze[a][b];
        };
    var pf = {},
        qf = function (a, b) {
            if (G._gtmexpgrp && G._gtmexpgrp.hasOwnProperty(a)) return G._gtmexpgrp[a];
            void 0 === pf[a] && (pf[a] = Math.floor(Math.random() * b));
            return pf[a];
        };
    var rf = function (a) {
        var b = 1,
            c,
            d,
            e;
        if (a) for (b = 0, d = a.length - 1; 0 <= d; d--) (e = a.charCodeAt(d)), (b = ((b << 6) & 268435455) + e + (e << 14)), (c = b & 266338304), (b = 0 != c ? b ^ (c >> 21) : b);
        return b;
    };
    function sf(a, b, c) {
        for (var d = [], e = b.split(";"), f = 0; f < e.length; f++) {
            var h = e[f].split("="),
                k = h[0].replace(/^\s*|\s*$/g, "");
            if (k && k == a) {
                var l = h
                    .slice(1)
                    .join("=")
                    .replace(/^\s*|\s*$/g, "");
                l && c && (l = decodeURIComponent(l));
                d.push(l);
            }
        }
        return d;
    }
    var uf = function (a, b, c, d) {
            return tf(d) ? sf(a, String(b || document.cookie), c) : [];
        },
        xf = function (a, b, c, d, e) {
            if (tf(e)) {
                var f = vf(a, d, e);
                if (1 === f.length) return f[0].id;
                if (0 !== f.length) {
                    f = wf(
                        f,
                        function (h) {
                            return h.uc;
                        },
                        b
                    );
                    if (1 === f.length) return f[0].id;
                    f = wf(
                        f,
                        function (h) {
                            return h.Mb;
                        },
                        c
                    );
                    return f[0] ? f[0].id : void 0;
                }
            }
        };
    function yf(a, b, c, d) {
        var e = document.cookie;
        document.cookie = a;
        var f = document.cookie;
        return e != f || (void 0 != c && 0 <= uf(b, f, !1, d).indexOf(c));
    }
    var Cf = function (a, b, c) {
            function d(p, u, v) {
                if (null == v) return delete h[u], p;
                h[u] = v;
                return p + "; " + u + "=" + v;
            }
            function e(p, u) {
                if (null == u) return delete h[u], p;
                h[u] = !0;
                return p + "; " + u;
            }
            if (!tf(c.va)) return 2;
            var f;
            void 0 == b ? (f = a + "=deleted; expires=" + new Date(0).toUTCString()) : (c.encode && (b = encodeURIComponent(b)), (b = zf(b)), (f = a + "=" + b));
            var h = {};
            f = d(f, "path", c.path);
            var k;
            c.expires instanceof Date ? (k = c.expires.toUTCString()) : null != c.expires && (k = "" + c.expires);
            f = d(f, "expires", k);
            f = d(f, "max-age", c.Gi);
            f = d(f, "samesite", c.Ki);
            c.Li && (f = e(f, "secure"));
            var l = c.domain;
            if ("auto" === l) {
                for (var q = Af(), r = 0; r < q.length; ++r) {
                    var n = "none" !== q[r] ? q[r] : void 0,
                        t = d(f, "domain", n);
                    t = e(t, c.flags);
                    if (!Bf(n, c.path) && yf(t, a, b, c.va)) return 0;
                }
                return 1;
            }
            l && "none" !== l && (f = d(f, "domain", l));
            f = e(f, c.flags);
            return Bf(l, c.path) ? 1 : yf(f, a, b, c.va) ? 0 : 1;
        },
        Df = function (a, b, c) {
            null == c.path && (c.path = "/");
            c.domain || (c.domain = "auto");
            return Cf(a, b, c);
        };
    function wf(a, b, c) {
        for (var d = [], e = [], f, h = 0; h < a.length; h++) {
            var k = a[h],
                l = b(k);
            l === c ? d.push(k) : void 0 === f || l < f ? ((e = [k]), (f = l)) : l === f && e.push(k);
        }
        return 0 < d.length ? d : e;
    }
    function vf(a, b, c) {
        for (var d = [], e = uf(a, void 0, void 0, c), f = 0; f < e.length; f++) {
            var h = e[f].split("."),
                k = h.shift();
            if (!b || -1 !== b.indexOf(k)) {
                var l = h.shift();
                l && ((l = l.split("-")), d.push({ id: h.join("."), uc: 1 * l[0] || 1, Mb: 1 * l[1] || 1 }));
            }
        }
        return d;
    }
    var zf = function (a) {
            a && 1200 < a.length && (a = a.substring(0, 1200));
            return a;
        },
        Ef = /^(www\.)?google(\.com?)?(\.[a-z]{2})?$/,
        Ff = /(^|\.)doubleclick\.net$/i,
        Bf = function (a, b) {
            return Ff.test(document.location.hostname) || ("/" === b && Ef.test(a));
        },
        Af = function () {
            var a = [],
                b = document.location.hostname.split(".");
            if (4 === b.length) {
                var c = b[b.length - 1];
                if (parseInt(c, 10).toString() === c) return ["none"];
            }
            for (var d = b.length - 2; 0 <= d; d--) a.push(b.slice(d).join("."));
            var e = document.location.hostname;
            Ff.test(e) || Ef.test(e) || a.push("none");
            return a;
        },
        tf = function (a) {
            if (!yd() || !a || !Id()) return !0;
            if (!Hd(a)) return !1;
            var b = Gd(a);
            return null == b ? !0 : !!b;
        };
    var Gf = function () {
            for (var a = hd.userAgent + (H.cookie || "") + (H.referrer || ""), b = a.length, c = G.history.length; 0 < c; ) a += c-- ^ b++;
            return [Math.round(2147483647 * Math.random()) ^ (rf(a) & 2147483647), Math.round(Va() / 1e3)].join(".");
        },
        Jf = function (a, b, c, d, e) {
            var f = Hf(b);
            return xf(a, f, If(c), d, e);
        },
        Kf = function (a, b, c, d) {
            var e = "" + Hf(c),
                f = If(d);
            1 < f && (e += "-" + f);
            return [b, e, a].join(".");
        },
        Hf = function (a) {
            if (!a) return 1;
            a = 0 === a.indexOf(".") ? a.substr(1) : a;
            return a.split(".").length;
        },
        If = function (a) {
            if (!a || "/" === a) return 1;
            "/" !== a[0] && (a = "/" + a);
            "/" !== a[a.length - 1] && (a += "/");
            return a.split("/").length - 1;
        };
    function Lf(a, b, c) {
        var d,
            e = a.Lb;
        null == e && (e = 7776e3);
        0 !== e && (d = new Date((b || Va()) + 1e3 * e));
        return { path: a.path, domain: a.domain, flags: a.flags, encode: !!c, expires: d };
    }
    var Mf = ["1"],
        Nf = {},
        Qf = function (a) {
            var b = Of(a.prefix),
                c = Nf[b];
            c && Pf(b, c, a);
        },
        Sf = function (a) {
            var b = Of(a.prefix);
            if (!Nf[b] && !Rf(b, a.path, a.domain)) {
                var c = Gf();
                Pf(b, c, a);
                var d = jd("google_tag_data", {});
                d._gcl_au ? Gc("GTM", 57) : (d._gcl_au = c);
                Rf(b, a.path, a.domain);
            }
        };
    function Pf(a, b, c) {
        var d = Kf(b, "1", c.domain, c.path),
            e = Lf(c);
        e.va = "ad_storage";
        Df(a, d, e);
    }
    function Rf(a, b, c) {
        var d = Jf(a, b, c, Mf, "ad_storage");
        d && (Nf[a] = d);
        return d;
    }
    function Of(a) {
        return (a || "_gcl") + "_au";
    }
    function Tf() {
        for (var a = Uf, b = {}, c = 0; c < a.length; ++c) b[a[c]] = c;
        return b;
    }
    function Vf() {
        var a = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        a += a.toLowerCase() + "0123456789-_";
        return a + ".";
    }
    var Uf, Wf;
    function Xf(a) {
        function b(l) {
            for (; d < a.length; ) {
                var q = a.charAt(d++),
                    r = Wf[q];
                if (null != r) return r;
                if (!/^[\s\xa0]*$/.test(q)) throw Error("Unknown base64 encoding at char: " + q);
            }
            return l;
        }
        Uf = Uf || Vf();
        Wf = Wf || Tf();
        for (var c = "", d = 0; ; ) {
            var e = b(-1),
                f = b(0),
                h = b(64),
                k = b(64);
            if (64 === k && -1 === e) return c;
            c += String.fromCharCode((e << 2) | (f >> 4));
            64 != h && ((c += String.fromCharCode(((f << 4) & 240) | (h >> 2))), 64 != k && (c += String.fromCharCode(((h << 6) & 192) | k)));
        }
    }
    var Yf;
    var bg = function () {
            var a = Zf,
                b = $f,
                c = ag(),
                d = function (h) {
                    a(h.target || h.srcElement || {});
                },
                e = function (h) {
                    b(h.target || h.srcElement || {});
                };
            if (!c.init) {
                pd(H, "mousedown", d);
                pd(H, "keyup", d);
                pd(H, "submit", e);
                var f = HTMLFormElement.prototype.submit;
                HTMLFormElement.prototype.submit = function () {
                    b(this);
                    f.call(this);
                };
                c.init = !0;
            }
        },
        cg = function (a, b, c, d, e) {
            var f = { callback: a, domains: b, fragment: 2 === c, placement: c, forms: d, sameHost: e };
            ag().decorators.push(f);
        },
        dg = function (a, b, c) {
            for (var d = ag().decorators, e = {}, f = 0; f < d.length; ++f) {
                var h = d[f],
                    k;
                if ((k = !c || h.forms))
                    a: {
                        var l = h.domains,
                            q = a,
                            r = !!h.sameHost;
                        if (l && (r || q !== H.location.hostname))
                            for (var n = 0; n < l.length; n++)
                                if (l[n] instanceof RegExp) {
                                    if (l[n].test(q)) {
                                        k = !0;
                                        break a;
                                    }
                                } else if (0 <= q.indexOf(l[n]) || (r && 0 <= l[n].indexOf(q))) {
                                    k = !0;
                                    break a;
                                }
                        k = !1;
                    }
                if (k) {
                    var t = h.placement;
                    void 0 == t && (t = h.fragment ? 2 : 1);
                    t === b && bb(e, h.callback());
                }
            }
            return e;
        },
        ag = function () {
            var a = jd("google_tag_data", {}),
                b = a.gl;
            (b && b.decorators) || ((b = { decorators: [] }), (a.gl = b));
            return b;
        };
    var eg = /(.*?)\*(.*?)\*(.*)/,
        fg = /^https?:\/\/([^\/]*?)\.?cdn\.ampproject\.org\/?(.*)/,
        gg = /^(?:www\.|m\.|amp\.)+/,
        hg = /([^?#]+)(\?[^#]*)?(#.*)?/;
    function ig(a) {
        return new RegExp("(.*?)(^|&)" + a + "=([^&]*)&?(.*)");
    }
    var kg = function (a) {
            var b = [],
                c;
            for (c in a)
                if (a.hasOwnProperty(c)) {
                    var d = a[c];
                    if (void 0 !== d && d === d && null !== d && "[object Object]" !== d.toString()) {
                        b.push(c);
                        var e = b,
                            f = e.push,
                            h,
                            k = String(d);
                        Uf = Uf || Vf();
                        Wf = Wf || Tf();
                        for (var l = [], q = 0; q < k.length; q += 3) {
                            var r = q + 1 < k.length,
                                n = q + 2 < k.length,
                                t = k.charCodeAt(q),
                                p = r ? k.charCodeAt(q + 1) : 0,
                                u = n ? k.charCodeAt(q + 2) : 0,
                                v = t >> 2,
                                w = ((t & 3) << 4) | (p >> 4),
                                y = ((p & 15) << 2) | (u >> 6),
                                x = u & 63;
                            n || ((x = 64), r || (y = 64));
                            l.push(Uf[v], Uf[w], Uf[y], Uf[x]);
                        }
                        h = l.join("");
                        f.call(e, h);
                    }
                }
            var z = b.join("*");
            return ["1", jg(z), z].join("*");
        },
        jg = function (a, b) {
            var c = [window.navigator.userAgent, new Date().getTimezoneOffset(), window.navigator.userLanguage || window.navigator.language, Math.floor(new Date().getTime() / 60 / 1e3) - (void 0 === b ? 0 : b), a].join("*"),
                d;
            if (!(d = Yf)) {
                for (var e = Array(256), f = 0; 256 > f; f++) {
                    for (var h = f, k = 0; 8 > k; k++) h = h & 1 ? (h >>> 1) ^ 3988292384 : h >>> 1;
                    e[f] = h;
                }
                d = e;
            }
            Yf = d;
            for (var l = 4294967295, q = 0; q < c.length; q++) l = (l >>> 8) ^ Yf[(l ^ c.charCodeAt(q)) & 255];
            return ((l ^ -1) >>> 0).toString(36);
        },
        mg = function () {
            return function (a) {
                var b = oe(G.location.href),
                    c = b.search.replace("?", ""),
                    d = je(c, "_gl", !0) || "";
                a.query = lg(d) || {};
                var e = me(b, "fragment").match(ig("_gl"));
                a.fragment = lg((e && e[3]) || "") || {};
            };
        },
        ng = function (a) {
            var b = mg(),
                c = ag();
            c.data || ((c.data = { query: {}, fragment: {} }), b(c.data));
            var d = {},
                e = c.data;
            e && (bb(d, e.query), a && bb(d, e.fragment));
            return d;
        },
        lg = function (a) {
            var b;
            b = void 0 === b ? 3 : b;
            try {
                if (a) {
                    var c;
                    a: {
                        for (var d = a, e = 0; 3 > e; ++e) {
                            var f = eg.exec(d);
                            if (f) {
                                c = f;
                                break a;
                            }
                            d = decodeURIComponent(d);
                        }
                        c = void 0;
                    }
                    var h = c;
                    if (h && "1" === h[1]) {
                        var k = h[3],
                            l;
                        a: {
                            for (var q = h[2], r = 0; r < b; ++r)
                                if (q === jg(k, r)) {
                                    l = !0;
                                    break a;
                                }
                            l = !1;
                        }
                        if (l) {
                            for (var n = {}, t = k ? k.split("*") : [], p = 0; p < t.length; p += 2) n[t[p]] = Xf(t[p + 1]);
                            return n;
                        }
                    }
                }
            } catch (u) {}
        };
    function og(a, b, c, d) {
        function e(r) {
            var n = r,
                t = ig(a).exec(n),
                p = n;
            if (t) {
                var u = t[2],
                    v = t[4];
                p = t[1];
                v && (p = p + u + v);
            }
            r = p;
            var w = r.charAt(r.length - 1);
            r && "&" !== w && (r += "&");
            return r + q;
        }
        d = void 0 === d ? !1 : d;
        var f = hg.exec(c);
        if (!f) return "";
        var h = f[1],
            k = f[2] || "",
            l = f[3] || "",
            q = a + "=" + b;
        d ? (l = "#" + e(l.substring(1))) : (k = "?" + e(k.substring(1)));
        return "" + h + k + l;
    }
    function pg(a, b) {
        var c = "FORM" === (a.tagName || "").toUpperCase(),
            d = dg(b, 1, c),
            e = dg(b, 2, c),
            f = dg(b, 3, c);
        if (cb(d)) {
            var h = kg(d);
            c ? qg("_gl", h, a) : rg("_gl", h, a, !1);
        }
        if (!c && cb(e)) {
            var k = kg(e);
            rg("_gl", k, a, !0);
        }
        for (var l in f)
            if (f.hasOwnProperty(l))
                a: {
                    var q = l,
                        r = f[l],
                        n = a;
                    if (n.tagName) {
                        if ("a" === n.tagName.toLowerCase()) {
                            rg(q, r, n, void 0);
                            break a;
                        }
                        if ("form" === n.tagName.toLowerCase()) {
                            qg(q, r, n);
                            break a;
                        }
                    }
                    "string" == typeof n && og(q, r, n, void 0);
                }
    }
    function rg(a, b, c, d) {
        if (c.href) {
            var e = og(a, b, c.href, void 0 === d ? !1 : d);
            Uc.test(e) && (c.href = e);
        }
    }
    function qg(a, b, c) {
        if (c && c.action) {
            var d = (c.method || "").toLowerCase();
            if ("get" === d) {
                for (var e = c.childNodes || [], f = !1, h = 0; h < e.length; h++) {
                    var k = e[h];
                    if (k.name === a) {
                        k.setAttribute("value", b);
                        f = !0;
                        break;
                    }
                }
                if (!f) {
                    var l = H.createElement("input");
                    l.setAttribute("type", "hidden");
                    l.setAttribute("name", a);
                    l.setAttribute("value", b);
                    c.appendChild(l);
                }
            } else if ("post" === d) {
                var q = og(a, b, c.action);
                Uc.test(q) && (c.action = q);
            }
        }
    }
    var Zf = function (a) {
            try {
                var b;
                a: {
                    for (var c = a, d = 100; c && 0 < d; ) {
                        if (c.href && c.nodeName.match(/^a(?:rea)?$/i)) {
                            b = c;
                            break a;
                        }
                        c = c.parentNode;
                        d--;
                    }
                    b = null;
                }
                var e = b;
                if (e) {
                    var f = e.protocol;
                    ("http:" !== f && "https:" !== f) || pg(e, e.hostname);
                }
            } catch (h) {}
        },
        $f = function (a) {
            try {
                if (a.action) {
                    var b = me(oe(a.action), "host");
                    pg(a, b);
                }
            } catch (c) {}
        },
        sg = function (a, b, c, d) {
            bg();
            cg(a, b, "fragment" === c ? 2 : 1, !!d, !1);
        },
        tg = function (a, b) {
            bg();
            cg(a, [le(G.location, "host", !0)], b, !0, !0);
        },
        ug = function () {
            var a = H.location.hostname,
                b = fg.exec(H.referrer);
            if (!b) return !1;
            var c = b[2],
                d = b[1],
                e = "";
            if (c) {
                var f = c.split("/"),
                    h = f[1];
                e = "s" === h ? decodeURIComponent(f[2]) : decodeURIComponent(h);
            } else if (d) {
                if (0 === d.indexOf("xn--")) return !1;
                e = d.replace(/-/g, ".").replace(/\.\./g, "-");
            }
            var k = a.replace(gg, ""),
                l = e.replace(gg, ""),
                q;
            if (!(q = k === l)) {
                var r = "." + l;
                q = k.substring(k.length - r.length, k.length) === r;
            }
            return q;
        },
        vg = function (a, b) {
            return !1 === a ? !1 : a || b || ug();
        };
    var wg = /^\w+$/,
        xg = /^[\w-]+$/,
        yg = /^~?[\w-]+$/,
        zg = { aw: "_aw", dc: "_dc", gf: "_gf", ha: "_ha", gp: "_gp" },
        Ag = function () {
            if (!yd() || !Id()) return !0;
            var a = Gd("ad_storage");
            return null == a ? !0 : !!a;
        },
        Bg = function (a, b) {
            Hd("ad_storage")
                ? Ag()
                    ? a()
                    : Ld(a, "ad_storage")
                : b
                ? Gc("TAGGING", 3)
                : Kd(
                      function () {
                          Bg(a, !0);
                      },
                      ["ad_storage"]
                  );
        },
        Eg = function (a) {
            var b = [];
            if (!H.cookie) return b;
            var c = uf(a, H.cookie, void 0, "ad_storage");
            if (!c || 0 == c.length) return b;
            for (var d = 0; d < c.length; d++) {
                var e = Cg(c[d]);
                e && -1 === Ea(b, e) && b.push(e);
            }
            return Dg(b);
        };
    function Fg(a) {
        return a && "string" == typeof a && a.match(wg) ? a : "_gcl";
    }
    var Hg = function () {
            var a = oe(G.location.href),
                b = me(a, "query", !1, void 0, "gclid"),
                c = me(a, "query", !1, void 0, "gclsrc"),
                d = me(a, "query", !1, void 0, "dclid");
            if (!b || !c) {
                var e = a.hash.replace("#", "");
                b = b || je(e, "gclid", void 0);
                c = c || je(e, "gclsrc", void 0);
            }
            return Gg(b, c, d);
        },
        Gg = function (a, b, c) {
            var d = {},
                e = function (f, h) {
                    d[h] || (d[h] = []);
                    d[h].push(f);
                };
            d.gclid = a;
            d.gclsrc = b;
            d.dclid = c;
            if (void 0 !== a && a.match(xg))
                switch (b) {
                    case void 0:
                        e(a, "aw");
                        break;
                    case "aw.ds":
                        e(a, "aw");
                        e(a, "dc");
                        break;
                    case "ds":
                        e(a, "dc");
                        break;
                    case "3p.ds":
                        e(a, "dc");
                        break;
                    case "gf":
                        e(a, "gf");
                        break;
                    case "ha":
                        e(a, "ha");
                        break;
                    case "gp":
                        e(a, "gp");
                }
            c && e(c, "dc");
            return d;
        },
        Ig = function (a, b) {
            switch (a) {
                case void 0:
                case "aw":
                    return "aw" === b;
                case "aw.ds":
                    return "aw" === b || "dc" === b;
                case "ds":
                case "3p.ds":
                    return "dc" === b;
                case "gf":
                    return "gf" === b;
                case "ha":
                    return "ha" === b;
                case "gp":
                    return "gp" === b;
            }
            return !1;
        },
        Kg = function (a) {
            var b = Hg();
            Bg(function () {
                Jg(b, a);
            });
        };
    function Jg(a, b, c) {
        function d(l, q) {
            var r = Lg(l, e);
            r && Df(r, q, f);
        }
        b = b || {};
        var e = Fg(b.prefix);
        c = c || Va();
        var f = Lf(b, c, !0);
        f.va = "ad_storage";
        var h = Math.round(c / 1e3),
            k = function (l) {
                return ["GCL", h, l].join(".");
            };
        a.aw && (!0 === b.Pi ? d("aw", k("~" + a.aw[0])) : d("aw", k(a.aw[0])));
        a.dc && d("dc", k(a.dc[0]));
        a.gf && d("gf", k(a.gf[0]));
        a.ha && d("ha", k(a.ha[0]));
        a.gp && d("gp", k(a.gp[0]));
    }
    var Ng = function (a, b) {
            var c = ng(!0);
            Bg(function () {
                for (var d = Fg(b.prefix), e = 0; e < a.length; ++e) {
                    var f = a[e];
                    if (void 0 !== zg[f]) {
                        var h = Lg(f, d),
                            k = c[h];
                        if (k) {
                            var l = Math.min(Mg(k), Va()),
                                q;
                            b: {
                                for (var r = l, n = uf(h, H.cookie, void 0, "ad_storage"), t = 0; t < n.length; ++t)
                                    if (Mg(n[t]) > r) {
                                        q = !0;
                                        break b;
                                    }
                                q = !1;
                            }
                            if (!q) {
                                var p = Lf(b, l, !0);
                                p.va = "ad_storage";
                                Df(h, k, p);
                            }
                        }
                    }
                }
                Jg(Gg(c.gclid, c.gclsrc), b);
            });
        },
        Lg = function (a, b) {
            var c = zg[a];
            if (void 0 !== c) return b + c;
        },
        Mg = function (a) {
            var b = a.split(".");
            return 3 !== b.length || "GCL" !== b[0] ? 0 : 1e3 * (Number(b[1]) || 0);
        };
    function Cg(a) {
        var b = a.split(".");
        if (3 == b.length && "GCL" == b[0] && b[1]) return b[2];
    }
    var Og = function (a, b, c, d, e) {
            if (Da(b)) {
                var f = Fg(e),
                    h = function () {
                        for (var k = {}, l = 0; l < a.length; ++l) {
                            var q = Lg(a[l], f);
                            if (q) {
                                var r = uf(q, H.cookie, void 0, "ad_storage");
                                r.length && (k[q] = r.sort()[r.length - 1]);
                            }
                        }
                        return k;
                    };
                Bg(function () {
                    sg(h, b, c, d);
                });
            }
        },
        Dg = function (a) {
            return a.filter(function (b) {
                return yg.test(b);
            });
        },
        Pg = function (a, b) {
            for (var c = Fg(b.prefix), d = {}, e = 0; e < a.length; e++) zg[a[e]] && (d[a[e]] = zg[a[e]]);
            Bg(function () {
                Ka(d, function (f, h) {
                    var k = uf(c + h, H.cookie, void 0, "ad_storage");
                    if (k.length) {
                        var l = k[0],
                            q = Mg(l),
                            r = {};
                        r[f] = [Cg(l)];
                        Jg(r, b, q);
                    }
                });
            });
        };
    function Qg(a, b) {
        for (var c = 0; c < b.length; ++c) if (a[b[c]]) return !0;
        return !1;
    }
    var Rg = function () {
            function a(e, f, h) {
                h && (e[f] = h);
            }
            var b = ["aw", "dc"];
            if (Id()) {
                var c = Hg();
                if (Qg(c, b)) {
                    var d = {};
                    a(d, "gclid", c.gclid);
                    a(d, "dclid", c.dclid);
                    a(d, "gclsrc", c.gclsrc);
                    tg(function () {
                        return d;
                    }, 3);
                    tg(function () {
                        var e = {};
                        return (e._up = "1"), e;
                    }, 1);
                }
            }
        },
        Sg = function () {
            var a;
            if (Ag()) {
                for (var b = [], c = H.cookie.split(";"), d = /^\s*_gac_(UA-\d+-\d+)=\s*(.+?)\s*$/, e = 0; e < c.length; e++) {
                    var f = c[e].match(d);
                    f && b.push({ Qd: f[1], value: f[2] });
                }
                var h = {};
                if (b && b.length)
                    for (var k = 0; k < b.length; k++) {
                        var l = b[k].value.split(".");
                        "1" == l[0] && 3 == l.length && l[1] && (h[b[k].Qd] || (h[b[k].Qd] = []), h[b[k].Qd].push({ timestamp: l[1], wc: l[2] }));
                    }
                a = h;
            } else a = {};
            return a;
        };
    var Tg = /^\d+\.fls\.doubleclick\.net$/,
        Ug = !1;
    function Vg(a, b) {
        Hd(C.B)
            ? Pd(C.B)
                ? a()
                : Ld(a, C.B)
            : b
            ? E(42)
            : Rd(
                  function () {
                      Vg(a, !0);
                  },
                  [C.B]
              );
    }
    function Wg(a) {
        var b = oe(G.location.href),
            c = me(b, "host", !1);
        if (c && c.match(Tg)) {
            var d = me(b, "path").split(a + "=");
            if (1 < d.length) return d[1].split(";")[0].split("?")[0];
        }
    }
    function Xg(a, b, c) {
        if ("aw" == a || "dc" == a) {
            var d = Wg("gcl" + a);
            if (d) return d.split(".");
        }
        var e = Fg(b);
        if ("_gcl" == e) {
            c = void 0 === c ? !0 : c;
            var f = !Pd(C.B) && c,
                h;
            h = Hg()[a] || [];
            if (0 < h.length) return f ? ["0"] : h;
        }
        var k = Lg(a, e);
        return k ? Eg(k) : [];
    }
    var Yg = function (a) {
            var b = Wg("gac");
            if (b) return !Pd(C.B) && a ? "0" : decodeURIComponent(b);
            var c = Sg(),
                d = [];
            Ka(c, function (e, f) {
                for (var h = [], k = 0; k < f.length; k++) h.push(f[k].wc);
                h = Dg(h);
                h.length && d.push(e + ":" + h.join(","));
            });
            return d.join(";");
        },
        $g = function (a, b) {
            if (Ug) Zg(a, b, "dc");
            else {
                var c = Hg().dc || [];
                Vg(function () {
                    Sf(b);
                    var d = Nf[Of(b.prefix)],
                        e = !1;
                    if (d && 0 < c.length) {
                        var f = (L.joined_au = L.joined_au || {}),
                            h = b.prefix || "_gcl";
                        if (!f[h])
                            for (var k = 0; k < c.length; k++) {
                                var l = "https://adservice.google.com/ddm/regclk";
                                l = l + "?gclid=" + c[k] + "&auiddc=" + d;
                                vd(l);
                                e = f[h] = !0;
                            }
                    }
                    null == a && (a = e);
                    a && d && Qf(b);
                });
            }
        },
        Zg = function (a, b, c) {
            var d = Hg(),
                e = [],
                f = d.gclid,
                h = d.dclid,
                k = d.gclsrc || "aw";
            !f || ("aw.ds" !== k && "aw" !== k && "ds" !== k) || (c && !Ig(k, c)) || e.push({ wc: f, kf: k });
            !h || (c && "dc" !== c) || e.push({ wc: h, kf: "ds" });
            Vg(function () {
                Sf(b);
                var l = Nf[Of(b.prefix)],
                    q = !1;
                if (l && 0 < e.length)
                    for (var r = (L.joined_auid = L.joined_auid || {}), n = 0; n < e.length; n++) {
                        var t = e[n],
                            p = t.wc,
                            u = t.kf,
                            v = (b.prefix || "_gcl") + "." + u + "." + p;
                        if (!r[v]) {
                            var w = "https://adservice.google.com/pagead/regclk";
                            w = w + "?gclid=" + p + "&auid=" + l + "&gclsrc=" + u;
                            vd(w);
                            q = r[v] = !0;
                        }
                    }
                null == a && (a = q);
                a && l && Qf(b);
            });
        };
    var ah = /[A-Z]+/,
        bh = /\s/,
        ch = function (a) {
            if (g(a) && ((a = Ua(a)), !bh.test(a))) {
                var b = a.indexOf("-");
                if (!(0 > b)) {
                    var c = a.substring(0, b);
                    if (ah.test(c)) {
                        for (var d = a.substring(b + 1).split("/"), e = 0; e < d.length; e++) if (!d[e]) return;
                        return { id: a, prefix: c, containerId: c + "-" + d[0], F: d };
                    }
                }
            }
        },
        eh = function (a) {
            for (var b = {}, c = 0; c < a.length; ++c) {
                var d = ch(a[c]);
                d && (b[d.id] = d);
            }
            dh(b);
            var e = [];
            Ka(b, function (f, h) {
                e.push(h);
            });
            return e;
        };
    function dh(a) {
        var b = [],
            c;
        for (c in a)
            if (a.hasOwnProperty(c)) {
                var d = a[c];
                "AW" === d.prefix && d.F[1] && b.push(d.containerId);
            }
        for (var e = 0; e < b.length; ++e) delete a[b[e]];
    }
    var fh = function () {
        var a = !1;
        return a;
    };
    var hh = function (a, b, c, d) {
            return (2 === gh() || d || "http:" != G.location.protocol ? a : b) + c;
        },
        gh = function () {
            var a = md(),
                b;
            if (1 === a)
                a: {
                    var c = Re;
                    c = c.toLowerCase();
                    for (var d = "https://" + c, e = "http://" + c, f = 1, h = H.getElementsByTagName("script"), k = 0; k < h.length && 100 > k; k++) {
                        var l = h[k].src;
                        if (l) {
                            l = l.toLowerCase();
                            if (0 === l.indexOf(e)) {
                                b = 3;
                                break a;
                            }
                            1 === f && 0 === l.indexOf(d) && (f = 2);
                        }
                    }
                    b = f;
                }
            else b = a;
            return b;
        };
    var vh = function (a) {
            return Pd(C.B)
                ? a
                : a.replace(/&url=([^&#]+)/, function (b, c) {
                      var d = pe(decodeURIComponent(c));
                      return "&url=" + encodeURIComponent(d);
                  });
        },
        wh = function () {
            var a;
            if (!(a = Se)) {
                var b;
                if (!0 === G._gtmdgs) b = !0;
                else {
                    var c = (hd && hd.userAgent) || "";
                    b = 0 > c.indexOf("Safari") || /Chrome|Coast|Opera|Edg|Silk|Android/.test(c) || 11 > ((/Version\/([\d]+)/.exec(c) || [])[1] || "") ? !1 : !0;
                }
                a = !b;
            }
            if (a) return -1;
            var d = Na("1");
            return qf(1, 100) < d ? qf(2, 2) : -1;
        },
        xh = function (a) {
            var b;
            if (!a || !a.length) return;
            for (var c = [], d = 0; d < a.length; ++d) {
                var e = a[d];
                e && e.estimated_delivery_date ? c.push("" + e.estimated_delivery_date) : c.push("");
            }
            b = c.join(",");
            return b;
        };
    var yh = new RegExp(/^(.*\.)?(google|youtube|blogger|withgoogle)(\.com?)?(\.[a-z]{2})?\.?$/),
        zh = {
            cl: ["ecl"],
            customPixels: ["nonGooglePixels"],
            ecl: ["cl"],
            ehl: ["hl"],
            hl: ["ehl"],
            html: ["customScripts", "customPixels", "nonGooglePixels", "nonGoogleScripts", "nonGoogleIframes"],
            customScripts: ["html", "customPixels", "nonGooglePixels", "nonGoogleScripts", "nonGoogleIframes"],
            nonGooglePixels: [],
            nonGoogleScripts: ["nonGooglePixels"],
            nonGoogleIframes: ["nonGooglePixels"],
        },
        Ah = {
            cl: ["ecl"],
            customPixels: ["customScripts", "html"],
            ecl: ["cl"],
            ehl: ["hl"],
            hl: ["ehl"],
            html: ["customScripts"],
            customScripts: ["html"],
            nonGooglePixels: ["customPixels", "customScripts", "html", "nonGoogleScripts", "nonGoogleIframes"],
            nonGoogleScripts: ["customScripts", "html"],
            nonGoogleIframes: ["customScripts", "html", "nonGoogleScripts"],
        },
        Bh = "google customPixels customScripts html nonGooglePixels nonGoogleScripts nonGoogleIframes".split(" ");
    var Dh = function (a) {
            var b;
            df("gtm.allowlist") && E(52);
            b = df("gtm.allowlist");
            b || (b = df("gtm.whitelist"));
            b && E(9);
            var c = b && db(Ta(b), zh),
                d;
            df("gtm.blocklist") && E(51);
            d = df("gtm.blocklist");
            d || (d = df("gtm.blacklist"));
            d || ((d = df("tagTypeBlacklist")) && E(3));
            d ? E(8) : (d = []);
            Ch() && ((d = Ta(d)), d.push("nonGooglePixels", "nonGoogleScripts", "sandboxedScripts"));
            0 <= Ea(Ta(d), "google") && E(2);
            var e = d && db(Ta(d), Ah),
                f = {};
            return function (h) {
                var k = h && h[$b.Na];
                if (!k || "string" != typeof k) return !0;
                k = k.replace(/^_*/, "");
                if (void 0 !== f[k]) return f[k];
                var l = Xe[k] || [],
                    q = a(k, l);
                if (b) {
                    var r;
                    if ((r = q))
                        a: {
                            if (0 > Ea(c, k))
                                if (l && 0 < l.length)
                                    for (var n = 0; n < l.length; n++) {
                                        if (0 > Ea(c, l[n])) {
                                            E(11);
                                            r = !1;
                                            break a;
                                        }
                                    }
                                else {
                                    r = !1;
                                    break a;
                                }
                            r = !0;
                        }
                    q = r;
                }
                var t = !1;
                if (d) {
                    var p = 0 <= Ea(e, k);
                    if (p) t = p;
                    else {
                        var u = Ja(e, l || []);
                        u && E(10);
                        t = u;
                    }
                }
                var v = !q || t;
                v || !(0 <= Ea(l, "sandboxedScripts")) || (c && -1 !== Ea(c, "sandboxedScripts")) || (v = Ja(e, Bh));
                return (f[k] = v);
            };
        },
        Ch = function () {
            return yh.test(G.location && G.location.hostname);
        };
    var Eh = {
            active: !0,
            isAllowed: function () {
                return !0;
            },
        },
        Fh = function (a) {
            var b = L.zones;
            return b ? b.checkState(Le.D, a) : Eh;
        },
        Gh = function (a) {
            var b = L.zones;
            !b && a && (b = L.zones = a());
            return b;
        };
    var Lh = function () {},
        Mh = function () {};
    var Nh = !1,
        Oh = 0,
        Ph = [];
    function Qh(a) {
        if (!Nh) {
            var b = H.createEventObject,
                c = "complete" == H.readyState,
                d = "interactive" == H.readyState;
            if (!a || "readystatechange" != a.type || c || (!b && d)) {
                Nh = !0;
                for (var e = 0; e < Ph.length; e++) I(Ph[e]);
            }
            Ph.push = function () {
                for (var f = 0; f < arguments.length; f++) I(arguments[f]);
                return 0;
            };
        }
    }
    function Rh() {
        if (!Nh && 140 > Oh) {
            Oh++;
            try {
                H.documentElement.doScroll("left"), Qh();
            } catch (a) {
                G.setTimeout(Rh, 50);
            }
        }
    }
    var Sh = function (a) {
        Nh ? a() : Ph.push(a);
    };
    var Th = {},
        Uh = {},
        Vh = function (a, b, c, d) {
            if (!Uh[a] || Oe[b] || "__zone" === b) return -1;
            var e = {};
            kb(d) && (e = m(d, e));
            e.id = c;
            e.status = "timeout";
            return Uh[a].tags.push(e) - 1;
        },
        Wh = function (a, b, c, d) {
            if (Uh[a]) {
                var e = Uh[a].tags[b];
                e && ((e.status = c), (e.executionTime = d));
            }
        };
    function Xh(a) {
        for (var b = Th[a] || [], c = 0; c < b.length; c++) b[c]();
        Th[a] = {
            push: function (d) {
                d(Le.D, Uh[a]);
            },
        };
    }
    var $h = function (a, b, c) {
            Uh[a] = { tags: [] };
            Aa(b) && Yh(a, b);
            c &&
                G.setTimeout(function () {
                    return Xh(a);
                }, Number(c));
            return Zh(a);
        },
        Yh = function (a, b) {
            Th[a] = Th[a] || [];
            Th[a].push(
                Ya(function () {
                    return I(function () {
                        b(Le.D, Uh[a]);
                    });
                })
            );
        };
    function Zh(a) {
        var b = 0,
            c = 0,
            d = !1;
        return {
            add: function () {
                c++;
                return Ya(function () {
                    b++;
                    d && b >= c && Xh(a);
                });
            },
            Ng: function () {
                d = !0;
                b >= c && Xh(a);
            },
        };
    }
    var ai = function () {
        function a(d) {
            return !Ca(d) || 0 > d ? 0 : d;
        }
        if (!L._li && G.performance && G.performance.timing) {
            var b = G.performance.timing.navigationStart,
                c = Ca(ef.get("gtm.start")) ? ef.get("gtm.start") : 0;
            L._li = { cst: a(c - b), cbt: a(Ue - b) };
        }
    };
    var ei = {},
        fi = function () {
            return G.GoogleAnalyticsObject && G[G.GoogleAnalyticsObject];
        },
        gi = !1;
    var hi = function (a) {
            G.GoogleAnalyticsObject || (G.GoogleAnalyticsObject = a || "ga");
            var b = G.GoogleAnalyticsObject;
            if (G[b]) G.hasOwnProperty(b) || E(12);
            else {
                var c = function () {
                    c.q = c.q || [];
                    c.q.push(arguments);
                };
                c.l = Number(new Date());
                G[b] = c;
            }
            ai();
            return G[b];
        },
        ii = function (a, b, c, d) {
            b = String(b).replace(/\s+/g, "").split(",");
            var e = fi();
            e(a + "require", "linker");
            e(a + "linker:autoLink", b, c, d);
        },
        ji = function (a) {};
    var li = function (a) {
            if (ei[a] || gi) return;
            var b = G[ki()];
            Aa(b) && (b("provide", a, za), (ei[a] = !0));
        },
        ki = function () {
            return G.GoogleAnalyticsObject || "ga";
        },
        mi = function (a, b) {
            return function () {
                var c = fi(),
                    d = c && c.getByName && c.getByName(a);
                if (d) {
                    var e = d.get("sendHitTask");
                    d.set("sendHitTask", function (f) {
                        var h = f.get("hitPayload"),
                            k = f.get("hitCallback"),
                            l = 0 > h.indexOf("&tid=" + b);
                        l && (f.set("hitPayload", h.replace(/&tid=UA-[0-9]+-[0-9]+/, "&tid=" + b), !0), f.set("hitCallback", void 0, !0));
                        e(f);
                        l && (f.set("hitPayload", h, !0), f.set("hitCallback", k, !0), f.set("_x_19", void 0, !0), e(f));
                    });
                }
            };
        };
    var ri = function () {
            return (
                "&tc=" +
                Nb.filter(function (a) {
                    return a;
                }).length
            );
        },
        ui = function () {
            2022 <= si().length && ti();
        },
        wi = function () {
            vi || (vi = G.setTimeout(ti, 500));
        },
        ti = function () {
            vi && (G.clearTimeout(vi), (vi = void 0));
            void 0 === xi || (yi[xi] && !zi && !Ai) || (Bi[xi] || Ci.Ah() || 0 >= Di-- ? (E(1), (Bi[xi] = !0)) : (Ci.Wh(), od(si()), (yi[xi] = !0), (Ei = Fi = Gi = Ai = zi = "")));
        },
        si = function () {
            var a = xi;
            if (void 0 === a) return "";
            var b = Hc("GTM"),
                c = Hc("TAGGING");
            return [Hi, yi[a] ? "" : "&es=1", Ii[a], b ? "&u=" + b : "", c ? "&ut=" + c : "", ri(), zi, Ai, Gi ? Gi : "", Fi, Ei, "&z=0"].join("");
        },
        Ji = function () {
            return [Ve, "&v=3&t=t", "&pid=" + Ga(), "&rv=" + Le.kc].join("");
        },
        Ki = "0.005000" > Math.random(),
        Hi = Ji(),
        Li = function () {
            Hi = Ji();
        },
        yi = {},
        zi = "",
        Ai = "",
        Ei = "",
        Fi = "",
        Gi = "",
        xi = void 0,
        Ii = {},
        Bi = {},
        vi = void 0,
        Ci = (function (a, b) {
            var c = 0,
                d = 0;
            return {
                Ah: function () {
                    if (c < a) return !1;
                    Va() - d >= b && (c = 0);
                    return c >= a;
                },
                Wh: function () {
                    Va() - d >= b && (c = 0);
                    c++;
                    d = Va();
                },
            };
        })(2, 1e3),
        Di = 1e3,
        Mi = function (a, b, c) {
            if (Ki && !Bi[a] && b) {
                a !== xi && (ti(), (xi = a));
                var d,
                    e = String(b[$b.Na] || "").replace(/_/g, "");
                0 === e.indexOf("cvt") && (e = "cvt");
                d = e;
                var f = c + d;
                zi = zi ? zi + "." + f : "&tr=" + f;
                var h = b["function"];
                if (!h) throw Error("Error: No function name given for function call.");
                var k = (Pb[h] ? "1" : "2") + d;
                Ei = Ei ? Ei + "." + k : "&ti=" + k;
                wi();
                ui();
            }
        },
        Ni = function (a, b, c) {
            if (Ki && !Bi[a]) {
                a !== xi && (ti(), (xi = a));
                var d = c + b;
                Ai = Ai ? Ai + "." + d : "&epr=" + d;
                wi();
                ui();
            }
        },
        Oi = function (a, b, c) {};
    function Pi(a, b, c, d) {
        var e = Nb[a],
            f = Qi(a, b, c, d);
        if (!f) return null;
        var h = Wb(e[$b.Te], c, []);
        if (h && h.length) {
            var k = h[0];
            f = Pi(k.index, { K: f, J: 1 === k.df ? b.terminate : f, terminate: b.terminate }, c, d);
        }
        return f;
    }
    function Qi(a, b, c, d) {
        function e() {
            if (f[$b.wg]) k();
            else {
                var w = Xb(f, c, []);
                var z = Vh(c.id, String(f[$b.Na]), Number(f[$b.Ue]), w[$b.xg]),
                    A = !1;
                w.vtp_gtmOnSuccess = function () {
                    if (!A) {
                        A = !0;
                        var F = Va() - D;
                        Mi(c.id, Nb[a], "5");
                        Wh(c.id, z, "success", F);
                        h();
                    }
                };
                w.vtp_gtmOnFailure = function () {
                    if (!A) {
                        A = !0;
                        var F = Va() - D;
                        Mi(c.id, Nb[a], "6");
                        Wh(c.id, z, "failure", F);
                        k();
                    }
                };
                w.vtp_gtmTagId = f.tag_id;
                w.vtp_gtmEventId = c.id;
                Mi(c.id, f, "1");
                var B = function () {
                    var F = Va() - D;
                    Mi(c.id, f, "7");
                    Wh(c.id, z, "exception", F);
                    A || ((A = !0), k());
                };
                var D = Va();
                try {
                    Vb(w, c);
                } catch (F) {
                    B(F);
                }
            }
        }
        var f = Nb[a],
            h = b.K,
            k = b.J,
            l = b.terminate;
        if (c.xd(f)) return null;
        var q = Wb(f[$b.Ve], c, []);
        if (q && q.length) {
            var r = q[0],
                n = Pi(r.index, { K: h, J: k, terminate: l }, c, d);
            if (!n) return null;
            h = n;
            k = 2 === r.df ? l : n;
        }
        if (f[$b.Pe] || f[$b.zg]) {
            var t = f[$b.Pe] ? Ob : c.ei,
                p = h,
                u = k;
            if (!t[a]) {
                e = Ya(e);
                var v = Ri(a, t, e);
                h = v.K;
                k = v.J;
            }
            return function () {
                t[a](p, u);
            };
        }
        return e;
    }
    function Ri(a, b, c) {
        var d = [],
            e = [];
        b[a] = Si(d, e, c);
        return {
            K: function () {
                b[a] = Ti;
                for (var f = 0; f < d.length; f++) d[f]();
            },
            J: function () {
                b[a] = Ui;
                for (var f = 0; f < e.length; f++) e[f]();
            },
        };
    }
    function Si(a, b, c) {
        return function (d, e) {
            a.push(d);
            b.push(e);
            c();
        };
    }
    function Ti(a) {
        a();
    }
    function Ui(a, b) {
        b();
    }
    var Xi = function (a, b, c) {
        for (var d = [], e = 0; e < Nb.length; e++)
            if (a[e]) {
                var f = Nb[e];
                var h = c.add();
                try {
                    var k = Pi(e, { K: h, J: h, terminate: h }, b, e);
                    if (k) {
                        var l = d,
                            q = l.push,
                            r = e,
                            n = f["function"];
                        if (!n) throw "Error: No function name given for function call.";
                        var t = Pb[n];
                        q.call(l, { Bf: r, uf: t ? t.priorityOverride || 0 : 0, kh: k });
                    } else Vi(e, b), h();
                } catch (u) {
                    h();
                }
            }
        c.Ng();
        d.sort(Wi);
        for (var p = 0; p < d.length; p++) d[p].kh();
        return 0 < d.length;
    };
    function Wi(a, b) {
        var c,
            d = b.uf,
            e = a.uf;
        c = d > e ? 1 : d < e ? -1 : 0;
        var f;
        if (0 !== c) f = c;
        else {
            var h = a.Bf,
                k = b.Bf;
            f = h > k ? 1 : h < k ? -1 : 0;
        }
        return f;
    }
    function Vi(a, b) {
        if (!Ki) return;
        var c = function (d) {
            var e = b.xd(Nb[d]) ? "3" : "4",
                f = Wb(Nb[d][$b.Te], b, []);
            f && f.length && c(f[0].index);
            Mi(b.id, Nb[d], e);
            var h = Wb(Nb[d][$b.Ve], b, []);
            h && h.length && c(h[0].index);
        };
        c(a);
    }
    var Yi = !1,
        cj = function (a) {
            var b = a["gtm.uniqueEventId"],
                c = a.event;
            if ("gtm.js" === c) {
                if (Yi) return !1;
                Yi = !0;
            }
            var d = Fh(b),
                e = !1;
            if (!d.active) {
                if ("gtm.js" !== c) return !1;
                e = !0;
                d = Fh(Number.MAX_SAFE_INTEGER);
            }
            Ki && !Bi[b] && xi !== b && (ti(), (xi = b), (Ei = zi = ""), (Ii[b] = "&e=" + (0 === c.indexOf("gtm.") ? encodeURIComponent(c) : "*") + "&eid=" + b), wi());
            var f = {
                    id: b,
                    name: c,
                    xd: Dh(d.isAllowed),
                    ei: [],
                    pf: function () {
                        E(6);
                    },
                    Ze: Zi(b),
                },
                h = $h(b, a.eventCallback, a.eventTimeout);
            $i(b);
            var k = dc(f);
            e && (k = aj(k));
            var l = Xi(k, f, h);
            ("gtm.js" !== c && "gtm.sync" !== c) || li(Le.D);
            switch (c) {
                case "gtm.init":
                    E(19), l && E(20);
            }
            return bj(k, l);
        };
    function Zi(a) {
        return function (b) {
            Ki && (lb(b) || Oi(a, "input", b));
        };
    }
    function $i(a) {
        hf(a, "event", 1);
        hf(a, "ecommerce", 1);
        hf(a, "gtm");
        hf(a, "eventModel");
    }
    function aj(a) {
        for (var b = [], c = 0; c < a.length; c++) a[c] && Ne[String(Nb[c][$b.Na])] && (b[c] = !0);
        return b;
    }
    function bj(a, b) {
        if (!b) return b;
        for (var c = 0; c < a.length; c++) if (a[c] && Nb[c] && !Oe[String(Nb[c][$b.Na])]) return !0;
        return !1;
    }
    function dj(a, b) {
        if (a) {
            var c = "" + a;
            0 !== c.indexOf("http://") && 0 !== c.indexOf("https://") && (c = "https://" + c);
            "/" === c[c.length - 1] && (c = c.substring(0, c.length - 1));
            return oe("" + c + b).href;
        }
    }
    function ej(a, b) {
        return fj() ? dj(a, b) : void 0;
    }
    function fj() {
        var a = !1;
        return a;
    }
    var gj = function () {
            this.eventModel = {};
            this.targetConfig = {};
            this.containerConfig = {};
            this.m = {};
            this.globalConfig = {};
            this.K = function () {};
            this.J = function () {};
            this.setContainerTypeLoaded = function () {};
            this.getContainerTypeLoaded = function () {};
            this.eventId = void 0;
        },
        hj = function (a) {
            var b = new gj();
            b.eventModel = a;
            return b;
        },
        ij = function (a, b) {
            a.targetConfig = b;
            return a;
        },
        jj = function (a, b) {
            a.containerConfig = b;
            return a;
        },
        kj = function (a, b) {
            a.m = b;
            return a;
        },
        lj = function (a, b) {
            a.globalConfig = b;
            return a;
        },
        mj = function (a, b) {
            a.K = b;
            return a;
        },
        nj = function (a, b) {
            a.setContainerTypeLoaded = b;
            return a;
        },
        oj = function (a, b) {
            a.getContainerTypeLoaded = b;
            return a;
        },
        pj = function (a, b) {
            a.J = b;
            return a;
        };
    gj.prototype.getWithConfig = function (a) {
        if (void 0 !== this.eventModel[a]) return this.eventModel[a];
        if (void 0 !== this.targetConfig[a]) return this.targetConfig[a];
        if (void 0 !== this.containerConfig[a]) return this.containerConfig[a];
        if (void 0 !== this.m[a]) return this.m[a];
        if (void 0 !== this.globalConfig[a]) return this.globalConfig[a];
    };
    var qj = function (a) {
        function b(e) {
            Ka(e, function (f) {
                c[f] = null;
            });
        }
        var c = {};
        b(a.eventModel);
        b(a.targetConfig);
        b(a.containerConfig);
        b(a.globalConfig);
        var d = [];
        Ka(c, function (e) {
            d.push(e);
        });
        return d;
    };
    var rj;
    if (3 === Le.kc.length) rj = "g";
    else {
        var sj = "G";
        rj = sj;
    }
    var tj = { "": "n", UA: "u", AW: "a", DC: "d", G: "e", GF: "f", HA: "h", GTM: rj, OPT: "o" },
        uj = function (a) {
            var b = Le.D.split("-"),
                c = b[0].toUpperCase(),
                d = tj[c] || "i",
                e = a && "GTM" === c ? b[1] : "OPT" === c ? b[1] : "",
                f;
            if (3 === Le.kc.length) {
                var h = "w";
                h = "z";
                f = "2" + h;
            } else f = "";
            return f + d + Le.kc + e;
        };
    var vj = function (a, b) {
        a.addEventListener && a.addEventListener.call(a, "message", b, !1);
    };
    var wj = function () {
        return Yc("iPhone") && !Yc("iPod") && !Yc("iPad");
    };
    Yc("Opera");
    Yc("Trident") || Yc("MSIE");
    Yc("Edge");
    !Yc("Gecko") || (-1 != Vc.toLowerCase().indexOf("webkit") && !Yc("Edge")) || Yc("Trident") || Yc("MSIE") || Yc("Edge");
    -1 != Vc.toLowerCase().indexOf("webkit") && !Yc("Edge") && Yc("Mobile");
    Yc("Macintosh");
    Yc("Windows");
    Yc("Linux") || Yc("CrOS");
    var xj = qa.navigator || null;
    xj && (xj.appVersion || "").indexOf("X11");
    Yc("Android");
    wj();
    Yc("iPad");
    Yc("iPod");
    wj() || Yc("iPad") || Yc("iPod");
    Vc.toLowerCase().indexOf("kaios");
    var yj = function (a, b) {
        for (var c = a, d = 0; 50 > d; ++d) {
            var e;
            try {
                e = !(!c.frames || !c.frames[b]);
            } catch (k) {
                e = !1;
            }
            if (e) return c;
            var f;
            a: {
                try {
                    var h = c.parent;
                    if (h && h != c) {
                        f = h;
                        break a;
                    }
                } catch (k) {}
                f = null;
            }
            if (!(c = f)) break;
        }
        return null;
    };
    var zj = function () {};
    var Aj = function (a) {
            void 0 !== a.addtlConsent && "string" !== typeof a.addtlConsent && (a.addtlConsent = void 0);
            void 0 !== a.gdprApplies && "boolean" !== typeof a.gdprApplies && (a.gdprApplies = void 0);
            return (void 0 !== a.tcString && "string" !== typeof a.tcString) || (void 0 !== a.listenerId && "number" !== typeof a.listenerId) ? 2 : a.cmpStatus && "error" !== a.cmpStatus ? 0 : 3;
        },
        Bj = function (a, b) {
            this.o = a;
            this.m = null;
            this.M = {};
            this.wa = 0;
            this.la = void 0 === b ? 500 : b;
            this.C = null;
        };
    pa(Bj, zj);
    var Dj = function (a) {
        return "function" === typeof a.o.__tcfapi || null != Cj(a);
    };
    Bj.prototype.addEventListener = function (a) {
        var b = {},
            c = Pc(function () {
                return a(b);
            }),
            d = 0;
        -1 !== this.la &&
            (d = setTimeout(function () {
                b.tcString = "tcunavailable";
                b.internalErrorState = 1;
                c();
            }, this.la));
        var e = function (f, h) {
            clearTimeout(d);
            f ? ((b = f), (b.internalErrorState = Aj(b)), (h && 0 === b.internalErrorState) || ((b.tcString = "tcunavailable"), h || (b.internalErrorState = 3))) : ((b.tcString = "tcunavailable"), (b.internalErrorState = 3));
            a(b);
        };
        try {
            Ej(this, "addEventListener", e);
        } catch (f) {
            (b.tcString = "tcunavailable"), (b.internalErrorState = 3), d && (clearTimeout(d), (d = 0)), c();
        }
    };
    Bj.prototype.removeEventListener = function (a) {
        a && a.listenerId && Ej(this, "removeEventListener", null, a.listenerId);
    };
    var Gj = function (a, b, c) {
            var d;
            d = void 0 === d ? "755" : d;
            var e;
            a: {
                if (a.publisher && a.publisher.restrictions) {
                    var f = a.publisher.restrictions[b];
                    if (void 0 !== f) {
                        e = f[void 0 === d ? "755" : d];
                        break a;
                    }
                }
                e = void 0;
            }
            var h = e;
            if (0 === h) return !1;
            var k = c;
            2 === c ? ((k = 0), 2 === h && (k = 1)) : 3 === c && ((k = 1), 1 === h && (k = 0));
            var l;
            if (0 === k)
                if (a.purpose && a.vendor) {
                    var q = Fj(a.vendor.consents, void 0 === d ? "755" : d);
                    l = q && "1" === b && a.purposeOneTreatment && "DE" === a.publisherCC ? !0 : q && Fj(a.purpose.consents, b);
                } else l = !0;
            else l = 1 === k ? (a.purpose && a.vendor ? Fj(a.purpose.legitimateInterests, b) && Fj(a.vendor.legitimateInterests, void 0 === d ? "755" : d) : !0) : !0;
            return l;
        },
        Fj = function (a, b) {
            return !(!a || !a[b]);
        },
        Ej = function (a, b, c, d) {
            c || (c = function () {});
            if ("function" === typeof a.o.__tcfapi) {
                var e = a.o.__tcfapi;
                e(b, 2, c, d);
            } else if (Cj(a)) {
                Hj(a);
                var f = ++a.wa;
                a.M[f] = c;
                if (a.m) {
                    var h = {};
                    a.m.postMessage(((h.__tcfapiCall = { command: b, version: 2, callId: f, parameter: d }), h), "*");
                }
            } else c({}, !1);
        },
        Cj = function (a) {
            if (a.m) return a.m;
            a.m = yj(a.o, "__tcfapiLocator");
            return a.m;
        },
        Hj = function (a) {
            a.C ||
                ((a.C = function (b) {
                    try {
                        var c;
                        c = ("string" === typeof b.data ? JSON.parse(b.data) : b.data).__tcfapiReturn;
                        a.M[c.callId](c.returnValue, c.success);
                    } catch (d) {}
                }),
                vj(a.o, a.C));
        };
    var Ij = { 1: 0, 3: 0, 4: 0, 7: 3, 9: 3, 10: 3 };
    function Jj(a, b) {
        if ("" === a) return b;
        var c = Number(a);
        return isNaN(c) ? b : c;
    }
    var Kj = Jj("", 550),
        Lj = Jj("", 500);
    function Mj() {
        var a = L.tcf || {};
        return (L.tcf = a);
    }
    var Nj = function (a, b) {
            this.C = a;
            this.m = b;
            this.o = Va();
        },
        Oj = function (a) {},
        Pj = function (a) {},
        Vj = function () {
            var a = Mj(),
                b = new Bj(G, 3e3),
                c = new Nj(b, a);
            if ((Qj() ? !0 === G.gtag_enable_tcf_support : !1 !== G.gtag_enable_tcf_support) && !a.active && ("function" === typeof G.__tcfapi || Dj(b))) {
                a.active = !0;
                a.Nb = {};
                Rj();
                var d = setTimeout(function () {
                    Sj(a);
                    Tj(a);
                    d = null;
                }, Lj);
                try {
                    b.addEventListener(function (e) {
                        d && (clearTimeout(d), (d = null));
                        if (0 !== e.internalErrorState) Sj(a), Tj(a), Oj(c);
                        else {
                            var f;
                            if (!1 === e.gdprApplies) (f = Uj()), b.removeEventListener(e);
                            else if ("tcloaded" === e.eventStatus || "useractioncomplete" === e.eventStatus || "cmpuishown" === e.eventStatus) {
                                var h = {},
                                    k;
                                for (k in Ij)
                                    if (Ij.hasOwnProperty(k))
                                        if ("1" === k) {
                                            var l = e,
                                                q = !0;
                                            q = void 0 === q ? !1 : q;
                                            var r;
                                            var n = l;
                                            !1 === n.gdprApplies
                                                ? (r = !0)
                                                : (void 0 === n.internalErrorState && (n.internalErrorState = Aj(n)),
                                                  (r = "error" === n.cmpStatus || 0 !== n.internalErrorState || ("loaded" === n.cmpStatus && ("tcloaded" === n.eventStatus || "useractioncomplete" === n.eventStatus)) ? !0 : !1));
                                            h["1"] = r ? (!1 === l.gdprApplies || "tcunavailable" === l.tcString || (void 0 === l.gdprApplies && !q) || "string" !== typeof l.tcString || !l.tcString.length ? !0 : Gj(l, "1", 0)) : !1;
                                        } else h[k] = Gj(e, k, Ij[k]);
                                f = h;
                            }
                            f && ((a.tcString = e.tcString || "tcempty"), (a.Nb = f), Tj(a), Oj(c));
                        }
                    }),
                        Pj(c);
                } catch (e) {
                    d && (clearTimeout(d), (d = null)), Sj(a), Tj(a);
                }
            }
        };
    function Sj(a) {
        a.type = "e";
        a.tcString = "tcunavailable";
        a.Nb = Uj();
    }
    function Rj() {
        var a = {};
        Nd(((a.ad_storage = "denied"), (a.wait_for_update = Kj), a));
    }
    var Qj = function () {
        var a = !1;
        a = !0;
        return a;
    };
    function Uj() {
        var a = {},
            b;
        for (b in Ij) Ij.hasOwnProperty(b) && (a[b] = !0);
        return a;
    }
    function Tj(a) {
        var b = {};
        Od(((b.ad_storage = a.Nb["1"] ? "granted" : "denied"), b));
    }
    var Wj = function () {
            var a = Mj();
            if (a.active && void 0 !== a.loadTime) return Number(a.loadTime);
        },
        Xj = function () {
            var a = Mj();
            return a.active ? a.tcString || "" : "";
        },
        Yj = function (a) {
            if (!Ij.hasOwnProperty(String(a))) return !0;
            var b = Mj();
            return b.active && b.Nb ? !!b.Nb[String(a)] : !0;
        };
    var Zj = !1;
    function ak(a) {
        var b = String(G.location).split(/[?#]/)[0],
            c = Le.Jf || G._CONSENT_MODE_SALT;
        return a ? (c ? String(rf(b + a + c)) : "0") : "";
    }
    function bk(a, b, c, d, e) {
        function f(t) {
            var p;
            L.reported_gclid || (L.reported_gclid = {});
            p = L.reported_gclid;
            var u;
            u = Zj && e && (!Id() || Pd(C.B)) ? k + "." + (d.prefix || "_gcl") + (t ? "gcu" : "gcs") : k + (t ? "gcu" : "gcs");
            if (!p[u]) {
                p[u] = !0;
                var v = [],
                    w = function (B, D) {
                        D && v.push(B + "=" + encodeURIComponent(D));
                    },
                    y = "https://www.google.com";
                if (Id()) {
                    var x = Pd(C.B);
                    w("gcs", Qd());
                    t && w("gcu", "1");
                    L.dedupe_gclid || (L.dedupe_gclid = "" + Gf());
                    w("rnd", L.dedupe_gclid);
                    if ((!k || (l && "aw.ds" !== l)) && Pd(C.B)) {
                        var z = Eg("_gcl_aw");
                        w("gclaw", z.join("."));
                    }
                    w("url", String(G.location).split(/[?#]/)[0]);
                    w("dclid", ck(b, q));
                    !x && b && (y = "https://pagead2.googlesyndication.com");
                }
                w("gdpr_consent", Xj());
                "1" === ng(!1)._up && w("gtm_up", "1");
                w("gclid", ck(b, k));
                w("gclsrc", l);
                w("gtm", uj(!c));
                Zj && e && Pd(C.B) && (Sf(d || {}), w("auid", Nf[Of(d.prefix)] || ""));
                var A = y + "/pagead/landing?" + v.join("&");
                vd(A);
            }
        }
        d = void 0 === d ? {} : d;
        e = void 0 === e ? !0 : e;
        var h = Hg(),
            k = h.gclid || "",
            l = h.gclsrc,
            q = h.dclid || "",
            r = !a && (!k || (l && "aw.ds" !== l) ? !1 : !0),
            n = Id();
        if (r || n)
            n
                ? Rd(
                      function () {
                          f();
                          Pd(C.B) ||
                              Ld(function (t) {
                                  return f(!0, t.$e);
                              }, C.B);
                      },
                      [C.B]
                  )
                : f();
    }
    function ck(a, b) {
        var c = a && !Pd(C.B);
        return b && c ? "0" : b;
    }
    var Mk = function () {
            var a = !0;
            (Yj(7) && Yj(9) && Yj(10)) || (a = !1);
            var b = !0;
            b = !1;
            b && !Lk() && (a = !1);
            return a;
        },
        Lk = function () {
            var a = !0;
            (Yj(3) && Yj(4)) || (a = !1);
            return a;
        };
    var hl = !1;
    function il() {
        var a = L;
        return (a.gcq = a.gcq || new jl());
    }
    var kl = function (a, b, c) {
            il().register(a, b, c);
        },
        ll = function (a, b, c, d) {
            il().push("event", [b, a], c, d);
        },
        ml = function (a, b) {
            il().push("config", [a], b);
        },
        nl = function (a, b, c, d) {
            il().push("get", [a, b], c, d);
        },
        ol = {},
        pl = function () {
            this.status = 1;
            this.containerConfig = {};
            this.targetConfig = {};
            this.o = {};
            this.C = null;
            this.m = !1;
        },
        ql = function (a, b, c, d, e) {
            this.type = a;
            this.C = b;
            this.U = c || "";
            this.m = d;
            this.o = e;
        },
        jl = function () {
            this.M = {};
            this.o = {};
            this.m = [];
            this.C = { AW: !1, UA: !1 };
        },
        rl = function (a, b) {
            var c = ch(b);
            return (a.M[c.containerId] = a.M[c.containerId] || new pl());
        },
        sl = function (a, b, c) {
            if (b) {
                var d = ch(b);
                if (d && 1 === rl(a, b).status) {
                    rl(a, b).status = 2;
                    var e = {};
                    Ki &&
                        (e.timeoutId = G.setTimeout(function () {
                            E(38);
                            wi();
                        }, 3e3));
                    a.push("require", [e], d.containerId);
                    ol[d.containerId] = Va();
                    if (fh()) {
                    } else {
                        var h = "/gtag/js?id=" + encodeURIComponent(d.containerId) + "&l=dataLayer&cx=c",
                            k = ("http:" != G.location.protocol ? "https:" : "http:") + ("//www.google-analytics.com" + h),
                            l = ej(c, h) || k;
                        ld(l);
                    }
                }
            }
        },
        tl = function (a, b, c, d) {
            if (d.U) {
                var e = rl(a, d.U),
                    f = e.C;
                if (f) {
                    var h = m(c),
                        k = m(e.targetConfig[d.U]),
                        l = m(e.containerConfig),
                        q = m(e.o),
                        r = m(a.o),
                        n = df("gtm.uniqueEventId"),
                        t = ch(d.U).prefix,
                        p = oj(
                            nj(
                                pj(
                                    mj(lj(kj(jj(ij(hj(h), k), l), q), r), function () {
                                        Ni(n, t, "2");
                                    }),
                                    function () {
                                        Ni(n, t, "3");
                                    }
                                ),
                                function (u, v) {
                                    a.C[u] = v;
                                }
                            ),
                            function (u) {
                                return a.C[u];
                            }
                        );
                    try {
                        Ni(n, t, "1");
                        f(d.U, b, d.C, p);
                    } catch (u) {
                        Ni(n, t, "4");
                    }
                }
            }
        };
    aa = jl.prototype;
    aa.register = function (a, b, c) {
        var d = rl(this, a);
        if (3 !== d.status) {
            d.C = b;
            d.status = 3;
            if (c) {
                d.o = c;
            }
            var e = ch(a),
                f = ol[e.containerId];
            if (void 0 !== f) {
                var h = L[e.containerId].bootstrap,
                    k = e.prefix.toUpperCase();
                L[e.containerId]._spx && (k = k.toLowerCase());
                var l = df("gtm.uniqueEventId"),
                    q = k,
                    r = Va() - h;
                if (Ki && !Bi[l]) {
                    l !== xi && (ti(), (xi = l));
                    var n = q + "." + Math.floor(h - f) + "." + Math.floor(r);
                    Fi = Fi ? Fi + "," + n : "&cl=" + n;
                }
                delete ol[e.containerId];
            }
            this.flush();
        }
    };
    aa.push = function (a, b, c, d) {
        var e = Math.floor(Va() / 1e3);
        sl(this, c, b[0][C.Ma] || this.o[C.Ma]);
        hl && c && rl(this, c).m && (d = !1);
        this.m.push(new ql(a, e, c, b, d));
        d || this.flush();
    };
    aa.insert = function (a, b, c) {
        var d = Math.floor(Va() / 1e3);
        0 < this.m.length ? this.m.splice(1, 0, new ql(a, d, c, b, !1)) : this.m.push(new ql(a, d, c, b, !1));
    };
    aa.flush = function (a) {
        for (var b = this, c = [], d = !1; this.m.length; ) {
            var e = this.m[0];
            if (e.o) hl ? (!e.U || rl(this, e.U).m ? ((e.o = !1), this.m.push(e)) : c.push(e)) : ((e.o = !1), this.m.push(e));
            else
                switch (e.type) {
                    case "require":
                        if (3 !== rl(this, e.U).status && !a) {
                            hl && this.m.push.apply(this.m, c);
                            return;
                        }
                        Ki && G.clearTimeout(e.m[0].timeoutId);
                        break;
                    case "set":
                        Ka(e.m[0], function (t, p) {
                            m(eb(t, p), b.o);
                        });
                        break;
                    case "config":
                        var f = e.m[0],
                            h = !!f[C.cc];
                        delete f[C.cc];
                        var k = rl(this, e.U),
                            l = ch(e.U),
                            q = l.containerId === l.id;
                        h || (q ? (k.containerConfig = {}) : (k.targetConfig[e.U] = {}));
                        (k.m && h) || tl(this, C.fa, f, e);
                        k.m = !0;
                        delete f[C.yb];
                        q ? m(f, k.containerConfig) : m(f, k.targetConfig[e.U]);
                        hl && (d = !0);
                        break;
                    case "event":
                        tl(this, e.m[1], e.m[0], e);
                        break;
                    case "get":
                        var r = {},
                            n = ((r[C.Ba] = e.m[0]), (r[C.Aa] = e.m[1]), r);
                        tl(this, C.Ja, n, e);
                }
            this.m.shift();
        }
        hl && (this.m.push.apply(this.m, c), d && this.flush());
    };
    aa.getRemoteConfig = function (a) {
        return rl(this, a).o;
    };
    var ul = function (a, b, c) {
            function d(f, h) {
                var k = f[h];
                return k;
            }
            var e = { event: b, "gtm.element": a, "gtm.elementClasses": d(a, "className"), "gtm.elementId": a["for"] || rd(a, "id") || "", "gtm.elementTarget": a.formTarget || d(a, "target") || "" };
            c && (e["gtm.triggers"] = c.join(","));
            e["gtm.elementUrl"] = (a.attributes && a.attributes.formaction ? a.formAction : "") || a.action || d(a, "href") || a.src || a.code || a.codebase || "";
            return e;
        },
        vl = function (a) {
            L.hasOwnProperty("autoEventsSettings") || (L.autoEventsSettings = {});
            var b = L.autoEventsSettings;
            b.hasOwnProperty(a) || (b[a] = {});
            return b[a];
        },
        wl = function (a, b, c) {
            vl(a)[b] = c;
        },
        xl = function (a, b, c, d) {
            var e = vl(a),
                f = Xa(e, b, d);
            e[b] = c(f);
        },
        yl = function (a, b, c) {
            var d = vl(a);
            return Xa(d, b, c);
        };
    var zl = !1,
        Al = [];
    function Bl() {
        if (!zl) {
            zl = !0;
            for (var a = 0; a < Al.length; a++) I(Al[a]);
        }
    }
    var Cl = function (a) {
        zl ? I(a) : Al.push(a);
    };
    var Dl = "HA GF G UA AW DC".split(" "),
        El = !1,
        Fl = {},
        Gl = !1;
    function Hl(a, b) {
        var c = { event: a };
        b && ((c.eventModel = m(b)), b[C.Tc] && (c.eventCallback = b[C.Tc]), b[C.Zb] && (c.eventTimeout = b[C.Zb]));
        return c;
    }
    function Il() {
        return El;
    }
    var Ll = {
            config: function (a) {
                var b;
                return b;
            },
            consent: function (a) {
                function b() {
                    Il() && m(a[2], { subcommand: a[1] });
                }
                if (3 === a.length) {
                    E(39);
                    var c = Ye(),
                        d = a[1];
                    "default" === d ? (b(), Nd(a[2])) : "update" === d && (b(), Od(a[2], c));
                }
            },
            event: function (a) {
                var b = a[1];
                if (!(2 > a.length) && g(b)) {
                    var c;
                    if (2 < a.length) {
                        if ((!kb(a[2]) && void 0 != a[2]) || 3 < a.length) return;
                        c = a[2];
                    }
                    var d = Hl(b, c);
                    return d;
                }
            },
            get: function (a) {},
            js: function (a) {
                if (2 == a.length && a[1].getTime) return (Gl = !0), Il(), { event: "gtm.js", "gtm.start": a[1].getTime() };
            },
            policy: function () {},
            set: function (a) {
                var b;
                2 == a.length && kb(a[1]) ? (b = m(a[1])) : 3 == a.length && g(a[1]) && ((b = {}), kb(a[2]) || Da(a[2]) ? (b[a[1]] = m(a[2])) : (b[a[1]] = a[2]));
                if (b) {
                    b._clear = !0;
                    return b;
                }
            },
        },
        Ml = { policy: !0 };
    var Nl = function (a, b) {
            var c = a.hide;
            if (c && void 0 !== c[b] && c.end) {
                c[b] = !1;
                var d = !0,
                    e;
                for (e in c)
                    if (c.hasOwnProperty(e) && !0 === c[e]) {
                        d = !1;
                        break;
                    }
                d && (c.end(), (c.end = null));
            }
        },
        Pl = function (a) {
            var b = Ol(),
                c = b && b.hide;
            c && c.end && (c[a] = !0);
        };
    var Yl = function () {
            try {
                var a, b;
                var c = G[ki()],
                    d = "gtm2";
                "" == d && (d = "t0");
                b = "ga";
                try {
                    var e = c && c.getByName && c.getByName(d);
                    if (e) {
                        0 === d.indexOf("gtag_") && (b = "gtag");
                        e.get("&gtm") && (b = "gtm");
                        for (var f in c)
                            if (c.hasOwnProperty(f)) {
                                var h = c[f];
                                if ("l" !== f && "answer" !== f && "number" === typeof h) {
                                    var k = Ql - h;
                                    1e5 > k && 0 < k && (a = k);
                                }
                            }
                    }
                } catch (B) {
                    console.log("[tick.ga] - " + Le.D + ": exception: " + B);
                }
                var l,
                    q = Le.D,
                    r = Td('script[src*="gtm/js?id=' + q + '"],script[src*="optimize.js?id=' + q + '"]');
                l = r && 0 < r.length ? r[0] : null;
                b || (b = "gaoo");
                var n = Rl(Sl, l && l.src),
                    t = n.Qb,
                    p = n.Rb,
                    u = n.Cc,
                    v = n.Dc,
                    w = n.vc,
                    y = n.Hc,
                    x = n.Ib,
                    z = n.ud,
                    A = n.Hb;
                "h0" != x || Tl || (x = "h3");
                Ul = { Ib: x, Hb: A, nh: a, Ih: b, ud: z, Dc: v, vc: w, Hc: y, Cc: u, Qb: t, Rb: p, jf: Vl, Cf: Wl };
                Xl(Ul);
            } catch (B) {
                console.log("[opttick] - " + Le.D + ": exception: " + B);
            }
        },
        Zl = function () {
            var a = G.gaData,
                b = 0,
                c = void 0;
            if (a)
                for (var d in a)
                    if (a.hasOwnProperty(d) && 0 === d.indexOf("UA-") && a[d].hitcount) {
                        b += a[d].hitcount;
                        var e = Number(a[d].first_hit);
                        e && (!c || e < c) && (c = e);
                    }
            return { lf: b, ef: c };
        },
        Rl = function (a, b) {
            var c, d, e, f, h, k, l, q, r;
            var n = G.performance;
            if (n) {
                if (b) {
                    var t = n.getEntriesByName(b)[0];
                    if (t) {
                        var p = n.getEntriesByType("resource"),
                            u = 0;
                        p && 0 < p.length && (u = p[0].startTime);
                        f = Math.round(t.startTime - u);
                        h = Math.round(t.duration);
                        e = p.indexOf(t);
                        -1 === e && (e = void 0);
                        k = Math.round(a - (t.startTime + t.duration));
                    }
                }
                var v = n.timing;
                if (v.domContentLoadedEventStart) {
                    var w = v.domContentLoadedEventStart - v.navigationStart;
                    w && (d = Math.round(a - w));
                }
                var y = n.getEntriesByType("paint").filter(function (B) {
                    return "first-contentful-paint" === B.name;
                })[0];
                y && (c = Math.round(a - y.startTime));
            }
            var x = G["dataLayer"].hide;
            if (x) {
                if (void 0 === x[Le.D]) l = "h2";
                else {
                    var z = !1;
                    if (null === x.end)
                        for (var A in x)
                            if (x.hasOwnProperty(A) && A.startsWith(Le.D) && !0 === x[A]) {
                                z = !0;
                                break;
                            }
                    l = z ? "h0" : "h1";
                }
                x.start && !isNaN(x.start) && (n ? n.timing && (r = Math.round(a + n.timing.navigationStart - x.start)) : (r = a - x.start));
                isNaN(x.timeout) || (q = x.timeout);
            }
            return { Qb: d, Rb: c, Cc: e, Dc: f, vc: h, Hc: k, Ib: l, ud: q, Hb: r };
        },
        Xl = function (a, b) {
            b = void 0 === b ? "ol" : b;
            var c = function (e, f) {
                    null != f && (d += e + encodeURIComponent(f));
                },
                d = Ve;
            c("&t=", b);
            c("&s=", a.Ib);
            c("&h=", a.Hb);
            c("&g=", a.nh);
            c("&p=", a.Ih);
            c("&o=", a.ud);
            c("&l=", Te ? Ql - Na(Te) : void 0);
            c("&q=", a.Dc);
            c("&f=", a.vc);
            c("&e=", a.Hc);
            c("&i=", a.Cc);
            c("&d=", a.Qb);
            c("&c=", a.Rb);
            c("&tr=", a.gi);
            c("&jl=", a.Gh);
            c("&jf=", a.Eh);
            c("&ji=", a.Fh);
            c("&jq=", a.Hh);
            c("&jd=", a.Ch);
            c("&jx=", a.Dh);
            c("&hc=", a.jf);
            c("&fh=", a.Cf);
            d += "&sr=0.050000";
            c("&ps=", $l);
            c("&cb=", Ga());
            od(d);
        },
        am = !1,
        Ql,
        Sl,
        Tl,
        $l,
        Ul,
        Vl,
        Wl;
    ($l = Math.random()), (am = "0.050000" > $l);
    var dm = function () {
            if (!am || Ql) return;
            Ql = Va();
            Sl = (performance && performance.now()) || Ql;
            Tl = !!H.querySelector("body");
            var a = Zl(),
                b = a.ef;
            Vl = a.lf;
            Wl = b ? Ql - b : void 0;
            Cl(Yl);
        },
        fm = function (a) {
            var b = em;
            if (!am) return;
            try {
                var c = Va(),
                    d = (performance && performance.now()) || c,
                    e = Zl(),
                    f = e.lf,
                    h = e.ef,
                    k = h ? c - h : void 0;
                Cl(function () {
                    var l = Rl(d, b),
                        q = l.Qb,
                        r = l.Rb,
                        n = l.Cc,
                        t = l.Dc,
                        p = l.vc,
                        u = l.Hc,
                        v = l.Ib,
                        w = l.Hb,
                        y = m(Ul || {});
                    m(a, y);
                    m({ Ib: v, Hb: w, Qb: q, Rb: r, Fh: n, Hh: t, Ch: p, Dh: u, jf: f, Cf: k }, y);
                    Xl(y, "od");
                });
            } catch (l) {
                console.log("[odtick] - " + Le.D + ": exception: " + l);
            }
        };
    var hm = function (a) {
        if (gm(a)) return a;
        this.m = a;
    };
    hm.prototype.rh = function () {
        return this.m;
    };
    var gm = function (a) {
        return !a || "object" !== hb(a) || kb(a) ? !1 : "getUntrustedUpdateValue" in a;
    };
    hm.prototype.getUntrustedUpdateValue = hm.prototype.rh;
    var im = [];
    var lm = !1,
        mm = function (a) {
            return G["dataLayer"].push(a);
        },
        nm = function (a) {
            var b = L["dataLayer"],
                c = b ? b.subscribers : 1,
                d = 0;
            return function () {
                ++d === c && a();
            };
        };
    function om(a) {
        var b = a._clear;
        Ka(a, function (d, e) {
            "_clear" !== d && (b && gf(d, void 0), gf(d, e));
        });
        Te || (Te = a["gtm.start"]);
        dm();
        var c = a["gtm.uniqueEventId"];
        if (!a.event) return !1;
        c || ((c = Ye()), (a["gtm.uniqueEventId"] = c), gf("gtm.uniqueEventId", c));
        return cj(a);
    }
    function pm() {
        var a = im[0];
        if (null == a || "object" !== typeof a) return !1;
        if (a.event) return !0;
        if (La(a)) {
            var b = a[0];
            if ("config" === b || "event" === b || "js" === b) return !0;
        }
        return !1;
    }
    function qm() {
        for (var a = !1; !lm && 0 < im.length; ) {
            lm = !0;
            delete af.eventModel;
            cf();
            var d = im.shift();
            if (null != d) {
                var e = gm(d);
                if (e) {
                    var f = d;
                    d = gm(f) ? f.getUntrustedUpdateValue() : void 0;
                    for (var h = ["gtm.allowlist", "gtm.blocklist", "gtm.whitelist", "gtm.blacklist", "tagTypeBlacklist"], k = 0; k < h.length; k++) {
                        var l = h[k],
                            q = df(l, 1);
                        if (Da(q) || kb(q)) q = m(q);
                        bf[l] = q;
                    }
                }
                try {
                    if (Aa(d))
                        try {
                            d.call(ef);
                        } catch (y) {}
                    else if (Da(d)) {
                        var r = d;
                        if (g(r[0])) {
                            var n = r[0].split("."),
                                t = n.pop(),
                                p = r.slice(1),
                                u = df(n.join("."), 2);
                            if (void 0 !== u && null !== u)
                                try {
                                    u[t].apply(u, p);
                                } catch (y) {}
                        }
                    } else {
                        if (La(d)) {
                            a: {
                                var v = d;
                                if (v.length && g(v[0])) {
                                    var w = Ll[v[0]];
                                    if (w && (!e || !Ml[v[0]])) {
                                        d = w(v);
                                        break a;
                                    }
                                }
                                d = void 0;
                            }
                            if (!d) {
                                lm = !1;
                                continue;
                            }
                        }
                        a = om(d) || a;
                    }
                } finally {
                    e && cf(!0);
                }
            }
            lm = !1;
        }
        return !a;
    }
    function rm() {
        var a = qm();
        try {
            Nl(G["dataLayer"], Le.D);
        } catch (b) {}
        return a;
    }
    var tm = function () {
            var a = jd("dataLayer", []),
                b = jd("google_tag_manager", {});
            b = b["dataLayer"] = b["dataLayer"] || {};
            Sh(function () {
                b.gtmDom || ((b.gtmDom = !0), a.push({ event: "gtm.dom" }));
            });
            Cl(function () {
                b.gtmLoad || ((b.gtmLoad = !0), a.push({ event: "gtm.load" }));
            });
            b.subscribers = (b.subscribers || 0) + 1;
            var c = a.push;
            a.push = function () {
                var e;
                if (0 < L.SANDBOXED_JS_SEMAPHORE) {
                    e = [];
                    for (var f = 0; f < arguments.length; f++) e[f] = new hm(arguments[f]);
                } else e = [].slice.call(arguments, 0);
                var h = c.apply(a, e);
                im.push.apply(im, e);
                if (300 < this.length) for (E(4); 300 < this.length; ) this.shift();
                var k = "boolean" !== typeof h || h;
                return qm() && k;
            };
            var d = a.slice(0);
            im.push.apply(im, d);
            sm() && I(rm);
        },
        sm = function () {
            var a = !0;
            return a;
        };
    var um = {};
    um.fc = new String("undefined");
    var vm = function (a) {
        this.m = function (b) {
            for (var c = [], d = 0; d < a.length; d++) c.push(a[d] === um.fc ? b : a[d]);
            return c.join("");
        };
    };
    vm.prototype.toString = function () {
        return this.m("undefined");
    };
    vm.prototype.valueOf = vm.prototype.toString;
    um.Cg = vm;
    um.jd = {};
    um.dh = function (a) {
        return new vm(a);
    };
    var wm = {};
    um.Xh = function (a, b) {
        var c = Ye();
        wm[c] = [a, b];
        return c;
    };
    um.bf = function (a) {
        var b = a ? 0 : 1;
        return function (c) {
            var d = wm[c];
            if (d && "function" === typeof d[b]) d[b]();
            wm[c] = void 0;
        };
    };
    um.zh = function (a) {
        for (var b = !1, c = !1, d = 2; d < a.length; d++) (b = b || 8 === a[d]), (c = c || 16 === a[d]);
        return b && c;
    };
    um.Qh = function (a) {
        if (a === um.fc) return a;
        var b = Ye();
        um.jd[b] = a;
        return 'google_tag_manager["' + Le.D + '"].macro(' + b + ")";
    };
    um.Jh = function (a, b, c) {
        a instanceof um.Cg && ((a = a.m(um.Xh(b, c))), (b = za));
        return { vd: a, K: b };
    };
    var xm = ["input", "select", "textarea"],
        ym = ["button", "hidden", "image", "reset", "submit"],
        zm = function (a) {
            var b = a.tagName.toLowerCase();
            return !Fa(xm, function (c) {
                return c === b;
            }) ||
                ("input" === b &&
                    Fa(ym, function (c) {
                        return c === a.type.toLowerCase();
                    }))
                ? !1
                : !0;
        },
        Am = function (a) {
            return a.form ? (a.form.tagName ? a.form : H.getElementById(a.form)) : ud(a, ["form"], 100);
        },
        Bm = function (a, b, c) {
            if (!a.elements) return 0;
            for (var d = b.getAttribute(c), e = 0, f = 1; e < a.elements.length; e++) {
                var h = a.elements[e];
                if (zm(h)) {
                    if (h.getAttribute(c) === d) return f;
                    f++;
                }
            }
            return 0;
        };
    var Cm = !!G.MutationObserver,
        Dm = void 0,
        Em = function (a) {
            if (!Dm) {
                var b = function () {
                    var c = H.body;
                    if (c)
                        if (Cm)
                            new MutationObserver(function () {
                                for (var e = 0; e < Dm.length; e++) I(Dm[e]);
                            }).observe(c, { childList: !0, subtree: !0 });
                        else {
                            var d = !1;
                            pd(c, "DOMNodeInserted", function () {
                                d ||
                                    ((d = !0),
                                    I(function () {
                                        d = !1;
                                        for (var e = 0; e < Dm.length; e++) I(Dm[e]);
                                    }));
                            });
                        }
                };
                Dm = [];
                H.body ? b() : I(b);
            }
            Dm.push(a);
        };
    var Qm = G.clearTimeout,
        Rm = G.setTimeout,
        N = function (a, b, c) {
            if (fh()) {
                b && I(b);
            } else return ld(a, b, c);
        },
        Sm = function () {
            return new Date();
        },
        Tm = function () {
            return G.location.href;
        },
        Um = function (a) {
            return me(oe(a), "fragment");
        },
        Vm = function (a) {
            return ne(oe(a));
        },
        Wm = function (a, b) {
            return df(a, b || 2);
        },
        Xm = function (a, b, c) {
            var d;
            b ? ((a.eventCallback = b), c && (a.eventTimeout = c), (d = mm(a))) : (d = mm(a));
            return d;
        },
        Ym = function (a, b) {
            G[a] = b;
        },
        U = function (a, b, c) {
            b && (void 0 === G[a] || (c && !G[a])) && (G[a] = b);
            return G[a];
        },
        Zm = function (a, b, c) {
            return uf(a, b, void 0 === c ? !0 : !!c);
        },
        $m = function (a, b, c) {
            return 0 === Df(a, b, c);
        },
        an = function (a, b) {
            if (fh()) {
                b && I(b);
            } else nd(a, b);
        },
        bn = function (a) {
            return !!yl(a, "init", !1);
        },
        cn = function (a) {
            wl(a, "init", !0);
        },
        dn = function (a, b) {
            var c = (void 0 === b ? 0 : b) ? "www.google-analytics.com/gtag/js" : Re;
            c += "?id=" + encodeURIComponent(a) + "&l=dataLayer";
            N(hh("https://", "http://", c));
        },
        en = function (a, b) {
            var c = a[b];
            return c;
        },
        fn = function (a, b, c) {
            Ki && (lb(a) || Oi(c, b, a));
        };
    var gn = um.Jh;
    var hn = function (a) {
            if (!a || a.nodeType != Node.ELEMENT_NODE) return !1;
            var b = a.tagName.toUpperCase();
            return "SCRIPT" == b || "STYLE" == b || "LINK" == b;
        },
        jn = function (a, b, c) {
            try {
                null == c ? a.removeAttribute(b) : a.setAttribute(b, c);
            } catch (d) {
                return d;
            }
            return null;
        },
        kn = function (a, b, c) {
            var d = a.getAttribute(b);
            return jn(a, b, c)
                ? 8
                : function () {
                      jn(a, b, d);
                  };
        },
        nn = function (a, b, c) {
            var d,
                e,
                f = a.ownerDocument || a.document || document;
            c = (c || "").toLowerCase();
            "after" == c ? ((d = a.parentNode), (e = a.nextSibling)) : "insert" == c ? ((d = a), (e = a.firstChild)) : "append" == c ? ((d = a), (e = null)) : ((d = a.parentNode), (e = a));
            if (!d || d == f) return { result: 1, xh: [] };
            var h = ln(b, d);
            mn(h, "SCRIPT");
            mn(h, "NOSCRIPT");
            var k = [];
            if (h.firstChild)
                for (var l = h.firstChild; l; ) {
                    var q = l.nextSibling;
                    k.push(l);
                    d.insertBefore(l, e);
                    l = q;
                }
            var r = a.nextSibling;
            "replace" == c && d.removeChild(a);
            return {
                result: function () {
                    for (; 0 < k.length; ) d.removeChild(k.pop());
                    "replace" == c && d.insertBefore(a, r);
                },
                xh: k.slice(),
            };
        },
        on = {
            SELECT: [1, '<select multiple="multiple">', "</select>"],
            FIELDSET: [1, "<fieldset>", "</fieldset>"],
            MAP: [1, "<map>", "</map>"],
            OBJECT: [1, "<object>", "</object>"],
            TABLE: [1, "<table>", "</table>"],
            TBODY: [2, "<table><tbody>", "</tbody></table>"],
            COLGROUP: [2, "<table><colgroup>", "</colgroup></table>"],
            TR: [3, "<table><tbody><tr>", "</tr></tbody></table>"],
        },
        ln = function (a, b) {
            var c = 0,
                d = "",
                e = "",
                f = on[b.tagName];
            null != f && ((c = f[0]), (d = f[1]), (e = f[2]));
            var h = b.ownerDocument.createElement("div");
            fd(h, gd(d + (a || "") + e));
            for (var k = h; 0 < c; ) {
                var l = k.firstChild;
                if (null == l.firstChild) return b.ownerDocument.createElement("div");
                k = l;
                c--;
            }
            return k;
        },
        mn = function (a, b) {
            for (var c = a.getElementsByTagName(b), d = [], e = c.length - 1; 0 <= e; e--) {
                var f = c[e];
                f.parentNode.removeChild(f);
                d.push(f);
            }
        },
        pn = function (a) {
            var b = null,
                c = null;
            try {
                b = new Function("element", a);
            } catch (d) {
                c = d;
            }
            return { rd: b, error: c };
        },
        tn = function (a, b, c, d, e) {
            var f = a + "{" + (b + ": " + c + (d ? " !important" : "")) + "}";
            e && (f = e + "{" + f + "}");
            var h = document;
            if (h.createStyleSheet) {
                var k = qn(h),
                    l = k.rules.length;
                k.insertRule(f, l);
                return function () {
                    k.deleteRule ? k.deleteRule(l) : k.removeRule(l);
                    k.insertRule("x {}", l);
                };
            }
            var q = rn(f, h);
            sn(q, h);
            var r = q.parentNode;
            return function () {
                r.removeChild(q);
            };
        },
        un = null,
        qn = function (a) {
            if (un) return un;
            for (var b = a.styleSheets.length - 1; 0 <= b; b--) {
                var c = a.styleSheets[b];
                if (!c.href) {
                    var d = c.ownerNode;
                    if (d && d.parentNode && "HEAD" == d.parentNode.tagName) return (un = c);
                }
            }
            0 == a.styleSheets.length && a.createStyleSheet();
            return (un = a.styleSheets[0]);
        },
        rn = function (a, b) {
            var c = (b || document).createElement("style");
            void 0 !== c.cssText ? (c.cssText = a) : (c.innerHTML = a);
            return c;
        },
        sn = function (a, b) {
            var c = b || document,
                d = c.getElementsByTagName("head")[0];
            d || ((d = c.createElement("head")), c.body.parentNode.insertBefore(d, c.body));
            d.appendChild(a);
        },
        vn = function (a, b, c, d) {
            if (a.style.setProperty)
                try {
                    var e = a.style.getPropertyValue(b),
                        f = a.style.getPropertyPriority(b);
                    a.style.setProperty(b, c, d ? "important" : "");
                    return function () {
                        a.style.setProperty(b, "", f);
                        a.style.setProperty(b, e, f);
                    };
                } catch (k) {}
            var h = a.style.cssText;
            a.style.cssText += ";" + (b + ": " + c + (d ? " !important" : "")) + ";";
            return function () {
                a.style.cssText = h;
            };
        },
        xn = function (a, b, c, d) {
            if (hn(a)) return 7;
            if (b) return wn(a, b, d);
            if (c && c.parentNode) {
                var e = a.parentNode,
                    f = a.nextSibling;
                try {
                    c.parentNode.insertBefore(a, c.nextSibling);
                } catch (h) {
                    return 9;
                }
                return function () {
                    e.insertBefore(a, f);
                };
            }
            return 4;
        },
        wn = function (a, b, c) {
            var d = a.parentNode,
                e = a.nextSibling;
            c = (c || "").toLowerCase();
            try {
                if ("bottom" == c) b.appendChild(a);
                else if ("top" == c) b.insertBefore(a, b.childNodes[0] || null);
                else if ("before" == c)
                    if (b.parentNode) b.parentNode.insertBefore(a, b);
                    else return 5;
                else if ("after" == c)
                    if (b.parentNode) b.parentNode.insertBefore(a, b.nextSibling);
                    else return 5;
            } catch (f) {
                return 9;
            }
            return function () {
                try {
                    d.insertBefore(a, e);
                } catch (f) {}
            };
        },
        yn = function (a, b, c) {
            if (0 <= b && b < a.childNodes.length) {
                var d = a.childNodes[b];
                if (null != d && d.nodeType == Node.TEXT_NODE) {
                    var e = d.nodeValue;
                    d.nodeValue = c;
                    return function () {
                        d.nodeValue = e;
                    };
                }
                return 2;
            }
            return 3;
        },
        zn = function (a, b, c, d) {
            c ? (d = c.nextSibling) : d && (c = d.previousSibling);
            if (null != c && c.nodeType == Node.TEXT_NODE) {
                var e = c.nodeValue;
                c.nodeValue += a;
                return function () {
                    c.nodeValue = e;
                };
            }
            if (null != d && d.nodeType == Node.TEXT_NODE) {
                var f = d.nodeValue;
                d.nodeValue = a + d.nodeValue;
                return function () {
                    d.nodeValue = f;
                };
            }
            var h = (b.ownerDocument || b.document || document).createTextNode(a);
            d ? b.insertBefore(h, d) : b.appendChild(h);
            return function () {
                b.removeChild(h);
            };
        },
        An = function (a) {
            var b = document.createElement("a");
            a && (b.href = a);
            return b;
        };
    function En(a, b) {
        a = String(a);
        b = String(b);
        var c = a.length - b.length;
        return 0 <= c && a.indexOf(b, c) == c;
    }
    var Fn = new Ia();
    function Gn(a, b) {
        function c(h) {
            var k = oe(h),
                l = me(k, "protocol"),
                q = me(k, "host", !0),
                r = me(k, "port"),
                n = me(k, "path").toLowerCase().replace(/\/$/, "");
            if (void 0 === l || ("http" == l && "80" == r) || ("https" == l && "443" == r)) (l = "web"), (r = "default");
            return [l, q, r, n];
        }
        for (var d = c(String(a)), e = c(String(b)), f = 0; f < d.length; f++) if (d[f] !== e[f]) return !1;
        return !0;
    }
    function Hn(a) {
        return In(a) ? 1 : 0;
    }
    function In(a) {
        var b = a.arg0,
            c = a.arg1;
        if (a.any_of && Da(c)) {
            for (var d = 0; d < c.length; d++) {
                var e = m(a, {});
                m({ arg1: c[d], any_of: void 0 }, e);
                if (Hn(e)) return !0;
            }
            return !1;
        }
        switch (a["function"]) {
            case "_cn":
                return 0 <= String(b).indexOf(String(c));
            case "_css":
                var f;
                a: {
                    if (b) {
                        var h = ["matches", "webkitMatchesSelector", "mozMatchesSelector", "msMatchesSelector", "oMatchesSelector"];
                        try {
                            for (var k = 0; k < h.length; k++)
                                if (b[h[k]]) {
                                    f = b[h[k]](c);
                                    break a;
                                }
                        } catch (p) {}
                    }
                    f = !1;
                }
                return f;
            case "_ew":
                return En(b, c);
            case "_eq":
                return String(b) == String(c);
            case "_ge":
                return Number(b) >= Number(c);
            case "_gt":
                return Number(b) > Number(c);
            case "_lc":
                var l;
                l = String(b).split(",");
                return 0 <= Ea(l, String(c));
            case "_le":
                return Number(b) <= Number(c);
            case "_lt":
                return Number(b) < Number(c);
            case "_re":
                var q;
                var r = a.ignore_case ? "i" : void 0;
                try {
                    var n = String(c) + r,
                        t = Fn.get(n);
                    t || ((t = new RegExp(c, r)), Fn.set(n, t));
                    q = t.test(b);
                } catch (p) {
                    q = !1;
                }
                return q;
            case "_sw":
                return 0 == String(b).indexOf(String(c));
            case "_um":
                return Gn(b, c);
        }
        return !1;
    }
    var Jn = encodeURI,
        Y = encodeURIComponent,
        Kn = od;
    var Ln = function (a, b) {
        if (!a) return !1;
        var c = me(oe(a), "host");
        if (!c) return !1;
        for (var d = 0; b && d < b.length; d++) {
            var e = b[d] && b[d].toLowerCase();
            if (e) {
                var f = c.length - e.length;
                0 < f && "." != e.charAt(0) && (f--, (e = "." + e));
                if (0 <= f && c.indexOf(e, f) == f) return !0;
            }
        }
        return !1;
    };
    var Mn = function (a, b, c) {
        for (var d = {}, e = !1, f = 0; a && f < a.length; f++) a[f] && a[f].hasOwnProperty(b) && a[f].hasOwnProperty(c) && ((d[a[f][b]] = a[f][c]), (e = !0));
        return e ? d : null;
    };
    var Pn = function (a) {
            if (!Nn[a]) {
                Nn[a] = !0;
                var b = G[a] || {};
                G[a] = b;
                var c = function (e) {
                        return On[e];
                    },
                    d = b.get;
                b.get = d
                    ? function (e) {
                          return void 0 !== On[e] ? On[e] : d(e);
                      }
                    : c;
            }
        },
        Sn = function (a, b) {
            On[a] = b;
            for (var c = Qn(a), d = 0; d < c.length; d++) Rn(c[d], a, b);
            c = Qn("");
            for (var e = 0; e < c.length; e++) Rn(c[e], a, b);
        },
        Rn = function (a, b, c) {
            try {
                a(c, b, Le.D);
            } catch (d) {}
        },
        Qn = function (a) {
            Tn[a] = Tn[a] || [];
            return Tn[a];
        },
        On = {},
        Tn = {},
        Nn = {};
    var Un = function () {
            G.gaData = G.gaData || {};
            return G.gaData;
        },
        Vn = function (a, b) {
            b = void 0 === b ? !1 : b;
            G.gaData = G.gaData || {};
            var c = G.gaData,
                d = c.tracker_created;
            c.tracker_created = function (e) {
                b && a(e);
                d && Aa(d) && d(e);
                b || a(e);
            };
        },
        Wn = function (a) {
            var b = G[ki()];
            try {
                if (Aa(b) && Aa(b.getAll))
                    return b.getAll().filter(function (c) {
                        return c.get("trackingId") === a;
                    });
            } catch (c) {
                console.log("Optimize: GA Exception " + c + " trackingId: " + a + " exception: " + c);
            }
            return [];
        },
        bo = function (a, b) {
            var c = Xn[a];
            if (c)
                I(function () {
                    return b(c);
                });
            else {
                var d = Wn(a)[0];
                d
                    ? ((Xn[a] = d),
                      Yn || (Yn = d),
                      I(function () {
                          return b(d);
                      }))
                    : (Zn[a] || (Zn[a] = []),
                      Zn[a].push(b),
                      $n ||
                          (($n = !0),
                          Vn(function (e) {
                              var f = e.get("trackingId");
                              if (Zn[f]) {
                                  if (ao[f]) {
                                      ao[f] = !1;
                                      var h = G[ki()];
                                      Aa(h) && h("ga.require", "_" + Le.D);
                                  }
                                  Yn || (Yn = e);
                                  Xn[f] = e;
                                  for (var k = Zn[f], l; void 0 !== (l = k.shift()); ) l(e);
                                  Zn[f] = void 0;
                              }
                          })));
            }
        },
        co = function (a, b, c, d) {
            var e = G[ki()];
            if ("data" === b.hitType && c) {
                var f = G.gaData,
                    h = Number(f && f[d] && f[d].first_hit),
                    k = Va();
                !isNaN(h) && k > h && (b.queueTime = Math.min(2e3, k + 100 - h));
            }
            try {
                var l = "t0" != a.get("name") ? a.get("name") + ".send" : "send";
                e(l, b);
            } catch (q) {
                console.log("Optimize: failed to send hit using tracker: " + a.name + " exception " + q);
            }
        },
        eo = !1;
    var Xn = {},
        Zn = {},
        ao = {},
        Yn,
        $n = !1,
        fo,
        go = function (a, b, c) {
            bo(a, function (d) {
                I(function () {
                    co(d, b, c, a);
                });
            });
        },
        ho = function () {
            var a = !1;
            Vn(function () {
                if (!a) {
                    var b = G[ki()];
                    Aa(b) && (b("ga.require", "__" + Le.D), (a = !0));
                }
            }, !0);
        },
        io = function (a, b, c) {
            var d = Un(),
                e = (d[a] = d[a] || {});
            (e.pending_experiments = e.pending_experiments || {})[b] = c;
            e.experiments = e.experiments || {};
            e.experiments[b] = c;
        },
        jo = function (a) {
            var b = Un()[a];
            return b ? b.hitcount || 0 : 0;
        },
        mo = function (a, b, c, d) {
            Sn(b, c);
            var e = d;
            if (d) {
                var f = le(G.location, "host");
                le(oe(d), "host") === f && ((d = ""), ko(a) && !eo && (e = d));
            }
            Vn(function (r) {
                r.set("referrer", d ? d : void 0);
            }, !0);
            if (ko(a)) (L.ga4_referrer_override = e), lo(a, b, c);
            else {
                io(a, b, c);
                for (var h = Wn(a), k = da(h), l = k.next(); !l.done; l = k.next()) l.value.set("referrer", d ? d : void 0);
                if (0 < jo(a)) {
                    var q = h[0];
                    q && co(q, { hitType: "data" }, !0, a);
                }
            }
        },
        ko = function (a) {
            return !!a && "G-" === a.substring(0, 2);
        },
        lo = function (a, b, c) {
            ko(a) ? ll("experiment_impression", { _experiment_id: b, _variant_id: c }, a, !0) : (io(a, b, c), 0 < jo(a) && go(a, { hitType: "data" }, !0));
        };
    var qo = function (a, b, c) {
            function d() {
                f || ((f = !0), !0 !== no && (no = !1), oo(c), Nl(Ol(), e));
            }
            em = a;
            var e = "GTM-M538CNN_" + b,
                f = !1;
            Pl(e);
            G.google_optimize = G.google_optimize || {};
            var h = G.google_optimize;
            h["GTM-M538CNN"] = h["GTM-M538CNN"] || {};
            h["GTM-M538CNN"].optimize_dyn = function (l) {
                l.split(",").forEach(function (q) {
                    po[q] = !0;
                });
                no = !0;
                d();
            };
            ld(a, void 0, d);
            var k = Ol();
            G.setTimeout(function () {
                d();
            }, Number(k && k.hide && k.hide.timeout) || 1e4);
        },
        oo = function (a) {
            if (void 0 !== ro) {
                var b = ro - so,
                    c,
                    d;
                no ? (c = Va() - ro) : (d = Va() - ro);
                fm({ gi: b, Gh: c, Eh: d });
            }
            po.optimize_ready = !0;
            mm({ event: "opt.dyn" });
            mm({ event: "opt.js" });
            if (a && 0 < a.length) {
                var e = {};
                Ol().forEach(function (f) {
                    var h = f.event;
                    h && (e[h] = !0);
                });
                a.forEach(function (f) {
                    e[f] && mm({ event: f });
                });
            }
            I(function () {
                li("_" + Le.D);
            });
        },
        Ol = function () {
            return G["dataLayer"];
        },
        to = function (a, b, c, d, e, f, h) {
            function k(u, v) {
                v && (n += "&" + u + "=" + encodeURIComponent(v));
            }
            so = Va();
            if (a || b || c) {
                var l = void 0;
                if (b) {
                    var q = Hg().aw;
                    q && (l = q[0]);
                }
                if (f && (a || c || l)) {
                    var r = 1,
                        n,
                        t = "GTM-M538CNN_" + r++;
                    Pl(t);
                    var p = function (u) {
                        fo = u;
                        ro = Va();
                        a || b ? ((n = "?id=GTM-M538CNN"), a && k("cid", u), k("gclid", l), h && (k("gtm_auth", ""), k("gtm_preview", "")), (h || a) && k("cb", String(Math.random())), qo(n, r++, e)) : oo(e);
                        Nl(Ol(), t);
                    };
                    ko(d)
                        ? nl("client_id", p, d, !0)
                        : ((ao[d] = !0),
                          bo(d, function (u) {
                              return p(u.get("clientId"));
                          }));
                } else oo(e);
            }
        },
        po = {},
        so,
        ro,
        no,
        em;
    var uo = function (a, b) {
        this.uc = a;
        this.Mb = b;
    };
    uo.prototype.toString = function () {
        var a = "" + this.uc;
        1 < this.Mb && (a = a + "-" + this.Mb);
        return a;
    };
    var vo = function (a, b) {
        this.o = a;
        this.m = b;
    };
    vo.prototype.toString = function () {
        return this.m + "." + this.o;
    };
    var wo = function () {
            var a = df("optimize.cookie_path", 2);
            return g(a) ? a : "/";
        },
        yo = function (a, b) {
            var c = new xo(a, b);
            c.Nh();
            return c;
        },
        xo = function (a, b) {
            this.M = Math.floor(new Date() / 864e5);
            this.o = a || "auto";
            this.m = b || wo();
            this.C = new uo(Hf(this.o), If(this.m));
            this.F = [];
            this.map = {};
        };
    aa = xo.prototype;
    aa.qh = function (a) {
        if (!a) return "";
        var b = this.sd(a);
        return b ? b.o : "";
    };
    aa.$h = function (a, b, c, d, e) {
        var f, h;
        f = void 0 === f ? 10 : f;
        h = void 0 === h ? 3e3 : h;
        if (!a) return !1;
        void 0 == b && (b = "");
        this.Fc(a, new vo(b, c));
        this.Lg(e);
        return this.Kh(d, f, h);
    };
    aa.sd = function (a) {
        return this.map[a];
    };
    aa.ph = function () {
        for (var a = 0, b = 0; b < this.F.length; b++) "x" !== this.sd(this.F[b]).o[0] && a++;
        return a;
    };
    aa.Fc = function (a, b) {
        a && ("" === b.o ? this.vf(a) : (this.map[a] || this.F.push(a), (this.map[a] = b)));
    };
    aa.bi = function (a) {
        for (var b = 0; b < a.length; b++) this.Fc(a[b][0], a[b][1]);
    };
    aa.vf = function (a) {
        var b = Ea(this.F, a);
        0 <= b && this.F.splice(b, 1);
        delete this.map[a];
    };
    aa.Uh = function () {
        for (var a = [], b = 0; b < this.F.length; b++) {
            var c = this.F[b];
            this.map[c].m < this.M && a.push(c);
        }
        for (var d = 0; d < a.length; d++) this.vf(a[d]);
    };
    aa.oh = function () {
        for (var a = [], b = 0; b < this.F.length; b++) {
            var c = this.F[b];
            a.push([c, this.map[c]]);
        }
        return a;
    };
    aa.ih = function () {
        for (var a = 0, b = 0; b < this.F.length; b++) a = Math.max(a, this.map[this.F[b]].m);
        return 864e5 * a;
    };
    aa.toString = function () {
        if (0 == this.F.length) return "";
        for (var a = [], b = 0; b < this.F.length; b++) {
            var c = this.F[b];
            a.push(c + "." + this.map[c].toString());
        }
        return "GAX1." + this.C.toString() + "." + a.join("!");
    };
    aa.Kh = function (a, b, c) {
        var d = new Date();
        this.Uh();
        var e = this.ph();
        if (e > b || (e > (a || 10) && document.cookie.replace(/(?:;\s*)?(_gaexp=[^;]+)(?:;\s*)?/, this.toString()).length > c)) return !1;
        d.setTime(this.ih());
        if ("auto" != this.o) return (this.C = new uo(Hf(this.o), If(this.m))), 0 === Df("_gaexp", this.toString(), { path: this.m, domain: this.o, expires: d });
        for (var f = Af(), h = 0; h < f.length; h++) if (((this.C = new uo(Hf(f[h]), If(this.m))), 0 === Df("_gaexp", this.toString(), { path: this.m, domain: f[h], expires: d }))) return !0;
        return !1;
    };
    aa.Nh = function () {
        var a = xf("_gaexp", this.C.uc, this.C.Mb);
        if (a) {
            var b = this.Oh(a);
            b && this.bi(b.oh());
        }
    };
    aa.Oh = function (a) {
        for (var b = new xo(this.o, this.m), c = a.split("!"), d = 0; d < c.length; d++) {
            var e = c[d].split(".");
            if (3 == e.length) {
                if (isNaN(Number(e[1]))) return;
                b.Fc(e[0], new vo(e[2], Number(e[1])));
            }
        }
        return b;
    };
    aa.Lg = function (a) {
        a = a || {};
        var b = 0;
        a.hasOwnProperty("") && !isNaN(Number(a[""])) && (b = this.M - Na(a[""]));
        for (var c = 0; c < this.F.length; c++) {
            var d = this.F[c];
            if (a.hasOwnProperty(d) && !isNaN(Number(a[d]))) {
                var e = this.sd(d);
                e.m = Na(a[d]) + b;
                this.Fc(d, e);
            }
        }
    };
    var zo = null,
        Ao = [],
        Bo = 0,
        Co = null;
    function Do(a) {
        if (!G.MutationObserver) return !1;
        try {
            return zo || ((zo = new MutationObserver(Eo)), zo.observe(H.documentElement, { subtree: !0, childList: !0, attributes: !0, characterData: !0 }), (Bo = Va())), Ao.push(a), !0;
        } catch (b) {
            return !1;
        }
    }
    function Eo() {
        var a = Va() - Bo;
        0 <= a
            ? (Co && (G.clearTimeout(Co), (Co = null)), Fo())
            : Co ||
              (Co = G.setTimeout(function () {
                  Fo();
                  Co = null;
              }, 0 - a));
    }
    function Fo() {
        Bo = Va();
        var a = Ao;
        Ao = [];
        for (var b = da(a), c = b.next(); !c.done; c = b.next()) {
            var d = c.value;
            d();
        }
        zo && (zo.takeRecords(), Ao.length || (zo && (zo.disconnect(), (zo = null)), Co && (G.clearTimeout(Co), (Co = null))));
    }
    var Go = function (a, b) {
            (b && Do(a)) || G.setTimeout(a, 80);
        },
        Ho = function (a) {
            try {
                return Td(a);
            } catch (b) {
                return null;
            }
        },
        Io = function (a) {
            if (Nh) return !0;
            for (; a; ) {
                if (a.nextSibling) return !0;
                a = a.parentNode;
            }
            return !1;
        },
        Jo = function (a, b) {
            for (var c = Ho(a.S) || [], d = [], e = 0; e < c.length; e++) {
                var f = c[e];
                if (!f.gtmProgressiveApplied || !f.gtmProgressiveApplied[b]) {
                    if (a.Y && !Io(f)) break;
                    d.push(f);
                }
            }
            return d;
        },
        Ko = function (a, b) {
            return function () {
                a.gtmProgressiveApplied && delete a.gtmProgressiveApplied[b];
            };
        },
        Lo = function (a, b) {
            a.gtmProgressiveApplied || (a.gtmProgressiveApplied = {});
            a.gtmProgressiveApplied[b] = !0;
        },
        Mo = function (a, b, c) {
            var d;
            var e = [];
            if (b.da)
                if (b.da.od) d = [{ element: H.head }];
                else {
                    var f = Jo(b.da, b.id),
                        h = null;
                    b.Gc && (h = Jo(b.Gc, b.id + "-t"));
                    for (var k = 0; k < f.length; k++) {
                        var l = f[k],
                            q = void 0;
                        if (null != h && ((q = h.length > k ? h[k] : null), !q && !Nh && (null === b.Gc.R || b.Ye + e.length < b.Gc.R))) break;
                        e.push({ element: l, fi: q });
                    }
                    d = e;
                }
            else d = e;
            var r = d;
            if (!Nh && b.Fg && (!a || null == b.da.R || b.da.R != b.oc + r.length)) return !1;
            for (var n = 0; n < r.length; n++) {
                var t = r[n].element,
                    p = r[n].fi,
                    u = void 0;
                b.oc++;
                Lo(t, b.id);
                p && (b.Ye++, (u = b.id + "-t"), Lo(p, u));
                var v = b.Mg(t, p);
                Aa(v) && b.jb.push(v);
                b.jb.push(Ko(t, b.id));
                p && u && b.jb.push(Ko(p, u));
            }
            if ((b.da.R && b.da.R == b.oc) || (Nh && (!c || b.oc))) b.finished = !0;
            return !0;
        },
        No = function (a) {
            for (var b = {}, c = 0; c < a.ba.length; c++) {
                var d = a.ba[c];
                if (!d.da.od) {
                    var e = b[d.da.S];
                    e || (e = b[d.da.S] = Ho(d.da.S) || []);
                    for (var f = 0; f < e.length; f++) {
                        var h = e[f];
                        (h.gtmProgressiveApplied && h.gtmProgressiveApplied[d.id]) || (Lo(h, d.id), d.jb.push(Ko(h, d.id)));
                    }
                }
            }
        },
        Oo = function (a) {
            if (!a.Md) {
                for (var b = a.Gb; b < a.ba.length; b++) {
                    var c = a.ba[b],
                        d = b == a.Gb;
                    if (!c.finished && !Mo(d, c, a.Ef && a.Df)) break;
                    c.finished && d && a.Gb++;
                }
                a.ba.length > a.Gb
                    ? (!a.pending &&
                          a.Ef &&
                          ((a.pending = !0),
                          Go(function () {
                              a.pending = !1;
                              Oo(a);
                          }, a.Df)),
                      Nh ||
                          a.Dd ||
                          ((a.Dd = function () {
                              I(function () {
                                  Oo(a);
                              });
                          }),
                          pd(H, "DOMContentLoaded", a.Dd)))
                    : No(a);
            }
        },
        Po = {},
        Qo = {},
        Ro = void 0,
        So = function (a, b, c, d) {
            var e = Ro;
            if (!Sd || !e) return !1;
            var f = { id: e.id + ":" + e.ba.length, Mg: b, jb: [], Fg: c, da: a, oc: 0, Gc: d || null, Ye: 0, finished: !1 };
            e.ba.push(f);
            null === a ? ((f.finished = !0), b(null)) : Oo(e);
            return !0;
        },
        To = function (a) {
            var b = za;
            try {
                b = tn(a, "visibility", "hidden", !0);
            } catch (c) {}
            return function () {
                Aa(b) && b.apply();
                b = null;
            };
        },
        Uo = function (a, b, c, d) {
            var e = b;
            if (!Nh && !a.od) {
                var f = To(a.S);
                Ph.push(f);
                e = function (h, k) {
                    var l = b(h, k);
                    f();
                    return l;
                };
            }
            return So(a, e, c, d);
        };
    function rp() {
        return (G.gaGlobal = G.gaGlobal || {});
    }
    var sp = function () {
            var a = rp();
            a.hid = a.hid || Ga();
            return a.hid;
        },
        tp = function (a, b) {
            var c = rp();
            if (void 0 == c.vid || (b && !c.from_cookie)) (c.vid = a), (c.from_cookie = b);
        };
    var aq = window,
        bq = document,
        cq = function (a) {
            var b = aq._gaUserPrefs;
            if ((b && b.ioo && b.ioo()) || (a && !0 === aq["ga-disable-" + a])) return !0;
            try {
                var c = aq.external;
                if (c && c._gaUserPrefs && "oo" == c._gaUserPrefs) return !0;
            } catch (f) {}
            for (var d = sf("AMP_TOKEN", String(bq.cookie), !0), e = 0; e < d.length; e++) if ("$OPT_OUT" == d[e]) return !0;
            return bq.getElementById("__gaOptOutExtension") ? !0 : !1;
        };
    var dq = {};
    function fq(a) {
        delete a.eventModel[C.yb];
        hq(a.eventModel);
    }
    var hq = function (a) {
        Ka(a, function (c) {
            "_" === c.charAt(0) && delete a[c];
        });
        var b = a[C.oa] || {};
        Ka(b, function (c) {
            "_" === c.charAt(0) && delete b[c];
        });
    };
    var kq = function (a, b, c) {
            ll(b, c, a);
        },
        lq = function (a, b, c) {
            ll(b, c, a, !0);
        },
        sq = function (a, b) {};
    function mq(a, b) {}
    var Z = { g: {} };
    (Z.g.dee = ["google"]),
        (function () {
            (function (a) {
                Z.__dee = a;
                Z.__dee.h = "dee";
                Z.__dee.i = !0;
                Z.__dee.priorityOverride = 0;
            })(function () {
                var a = !1;
                return a ? "gtm.sync" : "gtm.js";
            });
        })();

    (Z.g.e = ["google"]),
        (function () {
            (function (a) {
                Z.__e = a;
                Z.__e.h = "e";
                Z.__e.i = !0;
                Z.__e.priorityOverride = 0;
            })(function (a) {
                return String(jf(a.vtp_gtmEventId, "event"));
            });
        })();

    (Z.g.asprv = ["google"]),
        (function () {
            function a() {
                Xm({ event: "optimize.domChange" });
                Do(a);
            }
            (function (b) {
                Z.__asprv = b;
                Z.__asprv.h = "asprv";
                Z.__asprv.i = !0;
                Z.__asprv.priorityOverride = 0;
            })(function (b) {
                var c = b.vtp_globalName,
                    d = !!b.vtp_listenForMutations,
                    e = Wm("eventModel");
                c && Pn(c);
                d && a();
                var f, h, k;
                e && ((f = e.name || ""), (h = e.callback), (k = e.remove));
                if (h && Aa(h))
                    if (((f = String(f)), !0 !== k)) {
                        var l = f,
                            q = h;
                        Qn(l).push(q);
                        if ("" !== l) void 0 !== On[l] && Rn(q, l, On[l]);
                        else for (var r in On) void 0 !== On[r] && Rn(q, r, On[r]);
                    } else {
                        var n = h,
                            t = Qn(f),
                            p = t.indexOf(n);
                        0 <= p && t.splice(p, 1);
                    }
                b.vtp_gtmOnSuccess();
            });
        })();

    var tq = {};
    (tq.macro = function (a) {
        if (um.jd.hasOwnProperty(a)) return um.jd[a];
    }),
        (tq.onHtmlSuccess = um.bf(!0)),
        (tq.onHtmlFailure = um.bf(!1));
    tq.dataLayer = ef;
    tq.callback = function (a) {
        We.hasOwnProperty(a) && Aa(We[a]) && We[a]();
        delete We[a];
    };
    tq.bootstrap = 0;
    tq._spx = !1;
    function uq() {
        L[Le.D] = tq;
        bb(Xe, Z.g);
        Tb = Tb || um;
        Ub = ec;
    }
    function vq() {
        xd.gtag_cs_api = !0;
        L = G.google_tag_manager = G.google_tag_manager || {};
        Vj();
        if (L[Le.D]) {
            var a = L.zones;
            a && a.unregisterChild(Le.D);
            li(Le.D);
        } else {
            for (var b = data.resource || {}, c = b.macros || [], d = 0; d < c.length; d++) Kb.push(c[d]);
            for (var e = b.tags || [], f = 0; f < e.length; f++) Nb.push(e[f]);
            for (var h = b.predicates || [], k = 0; k < h.length; k++) Mb.push(h[k]);
            for (var l = b.rules || [], q = 0; q < l.length; q++) {
                for (var r = l[q], n = {}, t = 0; t < r.length; t++) n[r[t][0]] = Array.prototype.slice.call(r[t], 1);
                Lb.push(n);
            }
            Pb = Z;
            Sb = Hn;
            uq();
            tm();
            Nh = !1;
            Oh = 0;
            if (("interactive" == H.readyState && !H.createEventObject) || "complete" == H.readyState) Qh();
            else {
                pd(H, "DOMContentLoaded", Qh);
                pd(H, "readystatechange", Qh);
                if (H.createEventObject && H.documentElement.doScroll) {
                    var p = !0;
                    try {
                        p = !G.frameElement;
                    } catch (x) {}
                    p && Rh();
                }
                pd(G, "load", Qh);
            }
            zl = !1;
            "complete" === H.readyState ? Bl() : pd(G, "load", Bl);
            a: {
                if (!Ki) break a;
                G.setInterval(Li, 864e5);
            }
            Ue = new Date().getTime();
        }
    }
    (function (a) {
        if (!G["__TAGGY_INSTALLED"]) {
            var b = !1;
            if (H.referrer) {
                var c = oe(H.referrer);
                b = "cct.google" === le(c, "host");
            }
            if (!b) {
                var d = uf("googTaggyReferrer");
                b = d.length && d[0].length;
            }
            b && ((G["__TAGGY_INSTALLED"] = !0), ld("https://cct.google/taggy/agent.js"));
        }
        var e = !0;
        if (e) {
            a();
            return;
        }
        var f = function () {
                var q = G["google.tagmanager.debugui2.queue"];
                q || ((q = []), (G["google.tagmanager.debugui2.queue"] = q), ld("https://www.google-analytics.com/debug/bootstrap"));
                return q;
            },
            h = "x" === me(G.location, "query", !1, void 0, "gtm_debug");
        if (!h && H.referrer) {
            var k = oe(H.referrer);
            h = "tagassistant.google.com" === le(k, "host");
        }
        if (!h) {
            var l = uf("__TAG_ASSISTANT");
            h = l.length && l[0].length;
        }
        G.__TAG_ASSISTANT_API && (h = !0);
        h && id
            ? f().push({
                  messageType: "CONTAINER_STARTING",
                  data: {
                      scriptSource: id,
                      resume: function () {
                          a();
                      },
                  },
              })
            : a();
    })(vq);
})();
