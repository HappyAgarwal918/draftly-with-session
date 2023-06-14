@extends('layouts.master')

@section('cookie-basic-policy')

@auth
<!DOCTYPE html>
<html lang="en" class="cb-customize-desktop chrome">
    <head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script async="" src="{{ asset ('assets/js/app.js')}}" charset="UTF-8" crossorigin="*"></script>
<script async="" src="{{ asset ('assets/js/default.js')}}" charset="UTF-8" crossorigin="*"></script>
<script async="" src="{{ asset ('assets/js/gtm.js')}}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            window.dataLayer.push({ stVar3: 1 }, { isLoggedIn: "true" }, { event: "policiesWizard", eventCategory: "cookie policy wizard", eventAction: "complete questionnaire", eventLabel: "cookie policy" });
        </script>
        <link rel="dns-prefetch" href="https://www.google-analytics.com/" />
        <link rel="dns-prefetch" href="https://www.googletagmanager.com/" />
        <link rel="dns-prefetch" href="https://bat.bing.com/" />
        <link rel="dns-prefetch" href="https://cdn.gumlet.com/" />
        <link rel="dns-prefetch" href="https://websitepolicies.gumlet.io/" />
        <link rel="dns-prefetch" href="https://app.convertbox.com/" />
        <link rel="dns-prefetch" href="https://cdn.convertbox.com/" />
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
        <title>View cookie policy for youtube.com/watch</title>
        <meta name="description" content="" />
        <script src="{{ asset ('assets/js/1611587689.js')}}"></script>
        <script src="{{ asset ('assets/js/clipboard.min.js')}}"></script>
        <style>
            @media print {
                #ghostery-tracker-tally {
                    display: none !important;
                }
            }
        </style>
        <script>
            _gscq.push(["targeting", "policyActive", "1"]);
        </script>
        <meta property="og:image" content="/uploads/p/h/7/g/1y9eg2ur9hegs3x1s2nd.png" />
        <meta name="twitter:image" content="/uploads/p/h/7/g/1y9eg2ur9hegs3x1s2nd.png" />
        <script src="{{ asset ('assets/js/embed.js')}}" id="app-convertbox-script" async="" data-uuid="1d8ce409-0f9c-438e-9982-7a7af22a83ed"></script>
        <script src="{{ asset ('assets/js/polyfill.min.js')}}"></script>
        <script src="{{ asset ('assets/js/embed-core.js')}}"></script>
        <link href="{{ asset ('assets/css/new.css')}}" rel="stylesheet" type="text/css" />
        <script src="{{ asset('assets/js/tawk.js')}}"></script>
    </head>

    <body class="session policies edit">
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NS2X6F" height="0" width="0" style="display: none; visibility: hidden;"></iframe></noscript>

        <?php $id = $_GET['form-id'];  
            $a = DB::table('policy')->where('unique_id', $id)->first(); 
               $essential = $a -> essential;
               $functionality = $a -> functionality;
               $third_party = $a -> third_party;
               $cookies_social = $a -> cookies_social;
               $contacts = $a -> contacts;
               ?>

        <div class="section sub-hero">
            <div class="container">
                <div class="row">
                    <div class="col-ms-12">
                        <h1>Cookie policy for <?php echo $a -> website_url; ?></h1>
                    </div>
                </div>
            </div>
        </div>

    <div id="container">
            <div class="container">
                <div class="row">
                    <div id="content" class="col-ms-12">
                        <nav id="tabs" class="tabs">
                                <button class="tablinks" onclick="policy(event, 'text')">View policy</button>
                                <button class="tablinks" onclick="policy(event, 'html')">HTML code</button>
                        </nav>

                        <div class="plugin-policies policies-edit">
                            <div class="content-view">
                                <div class="content-item frames policy-preview" data-role="tabs-frames">
                                    <div id="text" class="tabcontent">
                                    <div class="view" data-role="frame" data-frame="view" style="">
                                        <div class="box">
                                <h1>Cookie policy</h1>
                <p>This cookie policy ("Policy") describes what cookies are and how and they're being used by the <?php echo $a -> website_url; ?> website ("Website" or "Service") and any of its related products and services (collectively, "Services"). This Policy is a legally binding agreement between you ("User", "you" or "your") and this Website operator ("Operator", "we", "us" or "our"). You should read this Policy so you can understand the types of cookies we use, the information we collect using cookies and how that information is used. It also describes the choices available to you regarding accepting or declining the use of cookies. For further information on how we use, store and keep your personal data secure, see our <a target="_blank" rel="nofollow" href="http://sad.com/">privacy policy</a>.</p>
                <h2>What are cookies?</h2>
                <p>Cookies are small pieces of data stored in text files that are saved on your computer or other devices when websites are loaded in a browser. They are widely used to remember you and your
                preferences, either for a single visit (through a "session cookie") or for multiple repeat visits (using a "persistent cookie").</p>    
                <p>Session cookies are temporary cookies that are used during the course of your visit to the Website, and they expire when you close the web browser.</p>
                <p>Persistent cookies are used to remember your preferences within our Website and remain on your desktop or mobile device even after you close your browser or restart your computer. They ensure a consistent and efficient experience for you while visiting the Website and Services.</p>
                <p>Cookies may be set by the Website ("first-party cookies"), or by third parties, such as those who serve content or provide advertising or analytics services on the Website ("third party cookies"). These third parties can recognize you when you visit our website and also when you visit certain other websites.<a target="_blank" href="">Click here</a> to learn more about cookies and how they work.</p>

                <h2>What type of cookies do we use?</h2>
                <?php if($essential == 1) { echo '
                <h3>Necessary cookies</h3>
                <p>Necessary cookies allow us to offer you the best possible experience when accessing and navigating through our Website and using its features. For example, these cookies let us recognize that you have created an account and have logged into that account to access the content.</p> ';} ?>
                <?php if($functionality == 1) { echo '
                <h3>Functionality cookies</h3>
                <p>Functionality cookies let us operate the Website and Services in accordance with the choices you make. For example, we will recognize your username and remember how you customized the Website and Services during future visits.</p> ';} ?>
                <?php if($third_party == 1) { echo '
                <h3>Analytical cookies</h3>
                <p>These cookies enable us and third party services to collect aggregated data for statistical purposes on how our visitors use the Website. These cookies do not contain personal information such as names and email addresses and are used to help us improve your user experience of the Website.</p> ';} ?>
                <?php if($cookies_social == 1) { echo '
                <h3>Social media cookies</h3>
                <p>Third party cookies from social media sites (such as Facebook, Twitter, etc) let us track social network users when they visit or use the Website and Services, or share content, by using a tagging mechanism provided by those social networks.</p>
                <p>These cookies are also used for event tracking and remarketing purposes. Any data collected with these tags will be used in accordance with our and social networks’ privacy policies. We will not collect or share any personally identifiable information from the user.</p> ';} ?>
                <?php if($essential == 1 || $functionality == 1 || $third_party == 1 || $cookies_social == 1) { echo "
                <h2>What are your cookie options?</h2>
                <p>If you don't like the idea of cookies or certain types of cookies, you can change your browser's settings to delete cookies that have already been set and to not accept new cookies. Visit <a target='_blank' href='https://www.internetcookies.org'>internetcookies.org</a> to learn more about how to do this.</p> ";} ?>
                <?php if($essential == 0 || $functionality == 0 || $third_party == 0 || $cookies_social == 0) { echo '
                <p>We do not use cookies to track your internet or Website usage, to collect or store your personal information or for any other reason. However, please be advised that in some countries, data such as cookie IDs is considered to be personal information. To the extent we process such data that is considered personal information, we will process the data in accordance with our privacy and cookie policies.</p> ';} ?>

                <h2>Changes and amendments</h2>
                <p>We reserve the right to modify this Policy or its terms relating to the Website and Services at any time, effective upon posting of an updated version of this Policy on the Website. When we do, we will send you an email to notify you. Continued use of the Website and Services after any such changes shall constitute your consent to such changes.</p>
                <h2>Acceptance of this policy</h2>
                <p>You acknowledge that you have read this Policy and agree to all its terms and conditions. By accessing and using the Website and Services you agree to be bound by this Policy. If you do not agree to abide by the terms of this Policy, you are not authorized to access or use the Website and Services. This cookie policy was created with the
                <a target="_blank" href="/cookie-policy-generator">cookie policy generator</a>.</p>
                <h2>Contacting us</h2>
                <p>If you would like to contact us to understand more about this Policy or wish to contact us concerning any matter relating to our use of cookies
                <?php if($contacts == 'form') { echo '
                    , you may do so via the '; echo $a -> contact_form ;} ?>
                    <?php if($contacts == 'email') { echo '
                    , send an email to '; echo $a -> contact_email ;} ?>
                    <?php if($contacts == 'address') { echo '
                   , write a letter to '; echo $a -> contact_address ;} ?>
               </p>
                <p>This document was created on <?php echo $a -> created_at ; ?></p>
            </div>
            <h4 class="margin-bottom-small">Link to your policy (recommended)</h4>
                                        <p>We recommend linking to your policy directly from your website. We host it for free and it will ensure automatic updates and compliance with the latest requirements and regulations.</p>
                                        <h5 class="margin-bottom-small">Public link to your policy</h5>
                                        <pre class="link"><code id="policy-public-link">http://policies.imbuetech.in/cookie-basic-policy?form-id=<?php echo $id ?></code></pre>
                                        <ul class="buttons">
                                            <li>
                                                <a
                                                    id="policy-public-link-copy-button"
                                                    class="button copybtn"
                                                    onclick="return false;"
                                                    data-clipboard-target="#policy-public-link"
                                                    href=""
                                                >
                                                    Copy link
                                                </a>
                                            </li>
                                            <li><a class="button" target="_blank" href="http://policies.imbuetech.in/cookie-basic-policy?form-id=<?php echo $id ?>">View policy</a></li>
                                        </ul>
                                        <div class="row">
                                            <div class="col-ms-12 hidden-xs">
                                                <h4>Copy the policy</h4>
                                                <p>
                                                    If you rather not link to the policy directly, you may copy
                                                    <a onclick="$(&#39;#tabs .policy_html&#39;).click();$(&#39;#tabs .policy_html&#39;).click();return false;" href="">HTML code</a> or
                                                    <a onclick="$(&#39;#tabs .policy_text&#39;).click();$(&#39;#tabs .policy_text&#39;).click();return false;" href="">plain text</a> of
                                                    the policy to your website instead.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>



    <div id="html" class="tabcontent" style="display: none;">
                                        <div class="box">
                                            <pre id="policy-html-text">
     &lt;h1&gt;Cookie policy&lt;/h1&gt;<br>
&lt;p&gt;This cookie policy (&amp;quot;Policy&amp;quot;) describes what cookies are and how and they&amp;#039;re being used by the <?php echo $a -> website_url; ?> website (&amp;quot;Website&amp;quot; or &amp;quot;Service&amp;quot;) and any of its related products and services (collectively, &amp;quot;Services&amp;quot;). This Policy is a legally binding agreement between you (&amp;quot;User&amp;quot;, &amp;quot;you&amp;quot; or &amp;quot;your&amp;quot;) and this Website operator (&amp;quot;Operator&amp;quot;, &amp;quot;we&amp;quot;, &amp;quot;us&amp;quot; or &amp;quot;our&amp;quot;). You should read this Policy so you can understand the types of cookies we use, the information we collect using cookies and how that information is used. It also describes the choices available to you regarding accepting or declining the use of cookies. For further information on how we use, store and keep your personal data secure, see our &lt;a target="_blank" rel="nofollow" href="http://sad.com"&gt;privacy policy&lt;/a&gt;.&lt;/p&gt;<br>
&lt;h2&gt;What are cookies?&lt;/h2&gt;<br>
&lt;p&gt;Cookies are small pieces of data stored in text files that are saved on your computer or other devices when websites are loaded in a browser. They are widely used to remember you and your preferences, either for a single visit (through a &amp;quot;session cookie&amp;quot;) or for multiple repeat visits (using a &amp;quot;persistent cookie&amp;quot;).&lt;/p&gt;<br>
&lt;p&gt;Session cookies are temporary cookies that are used during the course of your visit to the Website, and they expire when you close the web browser.&lt;/p&gt;<br>
&lt;p&gt;Persistent cookies are used to remember your preferences within our Website and remain on your desktop or mobile device even after you close your browser or restart your computer. They ensure a consistent and efficient experience for you while visiting the Website and Services.&lt;/p&gt;<br>
&lt;p&gt;Cookies may be set by the Website (&amp;quot;first-party cookies&amp;quot;), or by third parties, such as those who serve content or provide advertising or analytics services on the Website (&amp;quot;third party cookies&amp;quot;). These third parties can recognize you when you visit our website and also when you visit certain other websites. &lt;a target="_blank" href=""&gt;Click here&lt;/a&gt; to learn more about cookies and how they work.&lt;/p&gt;<br>
&lt;h2&gt;What type of cookies do we use?&lt;/h2&gt;<br>
<?php if($essential == 1) { echo '
&lt;h3&gt;Necessary cookies&lt;/h3&gt;
&lt;p&gt;Necessary cookies allow us to offer you the best possible experience when accessing and navigating through our Website and using its features. For example, these cookies let us recognize that you have created an account and have logged into that account to access the content.&lt;/p&gt;<br>';} ?>
<?php if($functionality == 1) { echo '
&lt;h3&gt;Functionality cookies&lt;/h3&gt;
&lt;p&gt;Functionality cookies let us operate the Website and Services in accordance with the choices you make. For example, we will recognize your username and remember how you customized the Website and Services during future visits.&lt/p&gt; ';} ?>
<?php if($third_party == 1) { echo '
&lt;h3&gt;Analytical cookies&lt;/h3&gt;
&lt;p&gt;These cookies enable us and third party services to collect aggregated data for statistical purposes on how our visitors use the Website. These cookies do not contain personal information such as names and email addresses and are used to help us improve your user experience of the Website.&lt;/p&gt; ';} ?>
<?php if($cookies_social == 1) { echo '
&lt;h3&gt;Social media cookies&lt;/h3&gt;
&lt;p&gt;Third party cookies from social media sites (such as Facebook, Twitter, etc) let us track social network users when they visit or use the Website and Services, or share content, by using a tagging mechanism provided by those social networks.&lt;p&gt;
&lt;p&gt;These cookies are also used for event tracking and remarketing purposes. Any data collected with these tags will be used in accordance with our and social networks’ privacy policies. We will not collect or share any personally identifiable information from the user.&lt;p&gt; ';} ?>
&lt;h2&gt;Changes and amendments&lt;/h2&gt;<br>
&lt;p&gt;We reserve the right to modify this Policy or its terms relating to the Website and Services at any time, effective upon posting of an updated version of this Policy on the Website. When we do, we will send you an email to notify you. Continued use of the Website and Services after any such changes shall constitute your consent to such changes.&lt;/p&gt;<br>
&lt;h2&gt;Acceptance of this policy&lt;/h2&gt;<br>
&lt;p&gt;You acknowledge that you have read this Policy and agree to all its terms and conditions. By accessing and using the Website and Services you agree to be bound by this Policy. If you do not agree to abide by the terms of this Policy, you are not authorized to access or use the Website and Services. This cookie policy was created with the &lt;a target="_blank" href=""&gt;cookie policy generator&lt;/a&gt;.&lt;/p&gt;<br>
&lt;h2&gt;Contacting us&lt;/h2&gt;<br>
&lt;p&gt;If you would like to contact us to understand more about this Policy or wish to contact us concerning any matter relating to our use of cookies<?php if($contacts == 'form') { echo ', you may do so via the '; echo $a -> contact_form ;} ?><?php if($contacts == 'email') { echo ', send an email to '; echo $a -> contact_email ;} ?><?php if($contacts == 'address') { echo ', write a letter to '; echo $a -> contact_address ;} ?>&lt;/p&gt;<br>
&lt;p&gt;This document was created on <?php echo $a -> created_at ; ?>&lt;/p&gt;
                     
                                            </pre>
                                        </div>
                                        <h4 class="margin-bottom-small">Copy HTML code</h4>
                                        <p>If you rather not link to the policy directly, you may copy the HTML code of the policy directly to your website.</p>
                                        <ul class="buttons">
                                            <li>
                                                <a id="policy-html-text-copy-button" class="button copybtn" onclick="return false;" data-clipboard-target="#policy-html-text" href="">
                                                    Copy policy text
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <ul class="buttons main">
                                    <li>
                                        <a class="button" data-role="modal" data-src="#no-questionnaire-modal" onclick="return false" href="">Re-run questionnaire</a>
                                        <div id="no-questionnaire-modal" style="display: none;">
                                            <h4>The questionnaire for this policy cannot be re-run</h4>
                                            <p>Since we don't charge recurring fees, you may not continuously re-run the questionnaire for existing policies.</p>
                                            <p>Usually, your business policies won't change often so you shouldn't need to edit your policy often either.</p>
                                            <p>If something changed in your business, it's still cheaper to renew your premium policy to accommodate your new requirements rather than keep paying recurring fees every month.</p>
                                            <p>This allows us to keep the pricing affordable and accessible to everyone, especially comparing to the cost of hiring an attorney. We hope it makes sense.</p>
                                            <p>Renew your disclaimer now to be able to re-run the questionnaire.</p>
                                            <ul class="buttons">
                                                <li><a class="button" href="">Renew now for only $9.95</a></li>
                                                <li>
                                                    <a onclick="$.fancybox.close(); return false;" class="cancel" href="">Maybe later</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li><a class="button" href="custom-clause?form-id=<?php echo $id ?>">Custom clauses</a></li>
                                    <li>
                                        <form action="home" method="POST">
                                            @csrf
                                        <select name="id" style="display: none;"><option value="<?php echo $a -> id; ?>">a</option></select>
                                            <button class="button danger delete-user" data-html="Are you sure you want to delete this policy?" data-role="confirm" href="">Delete policy</button>
                                        </form>
                                    </li>
                                </ul>                               
                            </div>
                        </div>
                    </div>                  
                </div>
            </div>
        </div>
<script>
    $('.delete-user').click(function(e){
    e.preventDefault() // Don't post the form, unless confirmed
    if (confirm('Are you sure?')) {
    // Post the form
    $(e.target).closest('form').submit() // Post the surrounding form
    }
    });
</script>
<script>
    $(function () {
        var clipboard = new ClipboardJS(".copybtn");
        $(".copybtn").focusout(function () {
            $("#policy-public-link-copy-button").html("Copy link");
            $("#policy-html-text-copy-button").html("Copy policy text");
            $("#policy-plain-text-copy-button").html("Copy policy text");
        });
        clipboard.on("success", function (el) {
            $("#" + el.trigger.id).html("Copied!");
        });
        clipboard.on("error", function (el) {
            $("#" + el.trigger.id).html("Press Ctrl+C to copy");
        });
    });
</script>        
<script>
    !(function (e, t) {
        for (var c = t.querySelectorAll('a[href^="#cb"]'), a = 0; a < c.length; a++)
            c[a].addEventListener("click", function () {
                this.setAttribute("data-clicked", !0);
            });
        ((e = t.createElement("script")).src = "https://cdn.convertbox.com/convertbox/js/embed.js"),
            (e.id = "app-convertbox-script"),
            (e.async = true),
            (e.dataset.uuid = "1d8ce409-0f9c-438e-9982-7a7af22a83ed"),
            document.getElementsByTagName("head")[0].appendChild(e);
    })(window, document);
</script>
<script>
function policy(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>
</body>
</html>
@endauth


@guest

<!DOCTYPE html>
<!-- saved from url=(0054)policies/view/YBwbHstS -->
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <script async="" src="{{asset ('assets/js/gtm.js')}}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            window.dataLayer.push({ stVar3: 1 }, { isLoggedIn: "true" });
        </script>
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
        <title>Privacy policy for youtube.com/watch</title>
        <meta name="description" content="Privacy policy for youtube.com/watch" />
        <meta property="og:image" content="uploads/p/h/7/g/1y9eg2ur9hegs3x1s2nd.png" />
        <meta property="article:published_time" content="2021-03-23T03:44:29+00:00" />
        <meta name="twitter:image" content="uploads/p/h/7/g/1y9eg2ur9hegs3x1s2nd.png" />
        <meta name="robots" content="noindex,follow" />
        <link href="{{asset ('assets/css/view.min.css')}}" rel="stylesheet" type="text/css" />
        <style>
            @media print {
                #ghostery-tracker-tally {
                    display: none !important;
                }
            }
            .hdd{
                display: none !important;
            }
            #header{
                background: transparent !important;
            }
            .ftt{
                display: none !important;
            }
            #footer{
                background: transparent !important;
            }
            .ftt2{
                display: none!important;
            }
        </style>
    </head>
    <body class="user">
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NS2X6F" height="0" width="0" style="display: none; visibility: hidden;"></iframe></noscript>

        <?php $id = $_GET['form-id'];  
            $a = DB::table('policy')->where('unique_id', $id)->first(); 
               $essential = $a -> essential;
               $functionality = $a -> functionality;
               $third_party = $a -> third_party;
               $cookies_social = $a -> cookies_social;
               $contacts = $a -> contacts;
               ?>
        <header id="header">
            <div class="container">
                <div class="row">
                    <div class="col-ms-12">
                        <h1>Cookie policy for <?php echo $a -> website_url; ?></h1>
                    </div>
                </div>
            </div>
        </header>
        <div id="container">
            <div class="container">
                <div class="row">
                    <div class="col-ms-12">
                        <article>
                           <h1>Cookie policy</h1>
                <p>This cookie policy ("Policy") describes what cookies are and how and they're being used by the <?php echo $a -> website_url; ?> website ("Website" or "Service") and any of its related products and services (collectively, "Services"). This Policy is a legally binding agreement between you ("User", "you" or "your") and this Website operator ("Operator", "we", "us" or "our"). You should read this Policy so you can understand the types of cookies we use, the information we collect using cookies and how that information is used. It also describes the choices available to you regarding accepting or declining the use of cookies. For further information on how we use, store and keep your personal data secure, see our <a target="_blank" rel="nofollow" href="http://sad.com/">privacy policy</a>.</p>
                <h2>What are cookies?</h2>
                <p>Cookies are small pieces of data stored in text files that are saved on your computer or other devices when websites are loaded in a browser. They are widely used to remember you and your
                preferences, either for a single visit (through a "session cookie") or for multiple repeat visits (using a "persistent cookie").</p>    
                <p>Session cookies are temporary cookies that are used during the course of your visit to the Website, and they expire when you close the web browser.</p>
                <p>Persistent cookies are used to remember your preferences within our Website and remain on your desktop or mobile device even after you close your browser or restart your computer. They ensure a consistent and efficient experience for you while visiting the Website and Services.</p>
                <p>Cookies may be set by the Website ("first-party cookies"), or by third parties, such as those who serve content or provide advertising or analytics services on the Website ("third party cookies"). These third parties can recognize you when you visit our website and also when you visit certain other websites.<a target="_blank" href="">Click here</a> to learn more about cookies and how they work.</p>

                <h2>What type of cookies do we use?</h2>
                <?php if($essential == 1) { echo '
                <h3>Necessary cookies</h3>
                <p>Necessary cookies allow us to offer you the best possible experience when accessing and navigating through our Website and using its features. For example, these cookies let us recognize that you have created an account and have logged into that account to access the content.</p> ';} ?>
                <?php if($functionality == 1) { echo '
                <h3>Functionality cookies</h3>
                <p>Functionality cookies let us operate the Website and Services in accordance with the choices you make. For example, we will recognize your username and remember how you customized the Website and Services during future visits.</p> ';} ?>
                <?php if($third_party == 1) { echo '
                <h3>Analytical cookies</h3>
                <p>These cookies enable us and third party services to collect aggregated data for statistical purposes on how our visitors use the Website. These cookies do not contain personal information such as names and email addresses and are used to help us improve your user experience of the Website.</p> ';} ?>
                <?php if($cookies_social == 1) { echo '
                <h3>Social media cookies</h3>
                <p>Third party cookies from social media sites (such as Facebook, Twitter, etc) let us track social network users when they visit or use the Website and Services, or share content, by using a tagging mechanism provided by those social networks.</p>
                <p>These cookies are also used for event tracking and remarketing purposes. Any data collected with these tags will be used in accordance with our and social networks’ privacy policies. We will not collect or share any personally identifiable information from the user.</p> ';} ?>
                <?php if($essential == 1 || $functionality == 1 || $third_party == 1 || $cookies_social == 1) { echo "
                <h2>What are your cookie options?</h2>
                <p>If you don't like the idea of cookies or certain types of cookies, you can change your browser's settings to delete cookies that have already been set and to not accept new cookies. Visit <a target='_blank' href='https://www.internetcookies.org'>internetcookies.org</a> to learn more about how to do this.</p> ";} ?>
                <?php if($essential == 0 || $functionality == 0 || $third_party == 0 || $cookies_social == 0) { echo '
                <p>We do not use cookies to track your internet or Website usage, to collect or store your personal information or for any other reason. However, please be advised that in some countries, data such as cookie IDs is considered to be personal information. To the extent we process such data that is considered personal information, we will process the data in accordance with our privacy and cookie policies.</p> ';} ?>

                <h2>Changes and amendments</h2>
                <p>We reserve the right to modify this Policy or its terms relating to the Website and Services at any time, effective upon posting of an updated version of this Policy on the Website. When we do, we will send you an email to notify you. Continued use of the Website and Services after any such changes shall constitute your consent to such changes.</p>
                <h2>Acceptance of this policy</h2>
                <p>You acknowledge that you have read this Policy and agree to all its terms and conditions. By accessing and using the Website and Services you agree to be bound by this Policy. If you do not agree to abide by the terms of this Policy, you are not authorized to access or use the Website and Services. This cookie policy was created with the
                <a target="_blank" href="/cookie-policy-generator">cookie policy generator</a>.</p>
                <h2>Contacting us</h2>
                <p>If you would like to contact us to understand more about this Policy or wish to contact us concerning any matter relating to our use of cookies
                <?php if($contacts == 'form') { echo '
                    , you may do so via the '; echo $a -> contact_form ;} ?>
                    <?php if($contacts == 'email') { echo '
                    , send an email to '; echo $a -> contact_email ;} ?>
                    <?php if($contacts == 'address') { echo '
                   , write a letter to '; echo $a -> contact_address ;} ?>
               </p>
                <p>This document was created on <?php echo $a -> created_at ; ?></p>
                        </article>
                    </div>
                </div>
            </div>
        </div>
        
    </body>
</html>


@endguest
@endsection