@extends('layouts.master')

@section('disclaimer-basic-policy')

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
            window.dataLayer.push({ stVar3: 1 }, { isLoggedIn: "true" }, { event: "policiesWizard", eventCategory: "disclaimer wizard", eventAction: "complete questionnaire", eventLabel: "disclaimer" });
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
        <title>View disclaimer for saw</title>
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
        <meta property="og:image" content="uploads/p/h/7/g/1y9eg2ur9hegs3x1s2nd.png" />
        <meta name="twitter:image" content="uploads/p/h/7/g/1y9eg2ur9hegs3x1s2nd.png" />
        <script src="{{ asset ('assets/js/embed.js')}}" id="app-convertbox-script" async="" data-uuid="1d8ce409-0f9c-438e-9982-7a7af22a83ed"></script>
        <script src="{{ asset ('assets/js/polyfill.min.js')}}"></script>
        <script src="{{ asset ('assets/js/embed-core.js')}}"></script>
        <script async="" src="{{ asset ('assets/js/default.js')}}" charset="UTF-8" crossorigin="*" id="TawkScript-1615307332558"></script>
        <link href="{{ asset ('assets/css/new.css')}}" rel="stylesheet" type="text/css" />
        <script src="{{ asset('assets/js/tawk.js')}}"></script>
    </head>
    <body class="session policies edit">
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NS2X6F" height="0" width="0" style="display: none; visibility: hidden;"></iframe></noscript>
        
        <?php $id = $_GET['form-id'];  
            $a = DB::table('policy')->where('unique_id', $id)->first(); 
               $platforms = $a -> platforms;
               $platforms_other = $a -> platforms_other;
               $third_party = $a -> third_party;
               $cookies_social = $a -> cookies_social;
               $contacts = $a -> contacts;
               ?>

        <div class="section sub-hero">
            <div class="container">
                <div class="row">
                    <div class="col-ms-12">
                        <h1>Disclaimer for <?php if($platforms == 'Website URL') {echo $a -> website_url;} elseif($platforms == 'Mobile App Name') {echo $a -> mobile_name ; } elseif ($platforms_other == 'ebook Name') { echo $a -> ebook_name ; }  elseif($platforms_other == 'Landing Page') {echo $a-> landing_url ; } elseif ($platforms_other == 'Course Name') { echo $a -> course_name ; } elseif($platforms_other == 'Podcast') {echo $a -> podcast_name ; } elseif ($platforms_other == 'Video Channel') { echo $a -> video_name ; } ?>
                        </h1>
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
<h1>Disclaimer</h1>
<?php if($platforms == 'Mobile App Name') {echo '
<p> This disclaimer ("Disclaimer") sets forth the general guidelines, disclosures, and terms of your use of the '; echo $a -> mobile_name; echo ' mobile application ("Mobile Application" or "Service") and any of its related products and services (collectively, "Services"). This Disclaimer is a legally binding agreement between you ("User", "you" or "your") and this Mobile Application developer ("Operator", "we", "us" or "our"). By accessing and using the Mobile Application and Services, you acknowledge that you have read, understood, and agree to be bound by the terms of this Disclaimer. If you are entering into this Disclaimer on behalf of a business or other legal entity, you represent that you have the authority to bind such entity to this Disclaimer, in which case the terms "User", "you" or "your" shall refer to such entity. If you do not have such authority, or if you do not agree with the terms of this Disclaimer, you must not accept this Disclaimer and may not access and use the Mobile Application and Services. You acknowledge that this Disclaimer is a contract between you and the Operator, even though it is electronic and is not physically signed by you, and it governs your use of the Mobile Application and Services. </p> ';}
elseif($platforms == 'Website URL') {echo '
<p> This disclaimer ("Disclaimer") sets forth the general guidelines, disclosures, and terms of your use of the '; echo $a -> website_url; echo ' website ("Website" or "Service") and any of its related products and services (collectively, "Services"). This Disclaimer is a legally binding agreement between you ("User", "you" or "your") and this Website operator ("Operator", "we", "us" or "our"). By accessing and using the Website and Services, you acknowledge that you have read, understood, and agree to be bound by the terms of this Disclaimer. If you are entering into this Disclaimer on behalf of a business or other legal entity, you represent that you have the authority to bind such entity to this Disclaimer, in which case the terms "User", "you" or "your" shall refer to such entity. If you do not have such authority, or if you do not agree with the terms of this Disclaimer, you must not accept this Disclaimer and may not access and use the Website and Services. You acknowledge that this Disclaimer is a contract between you and the Operator, even though it is electronic and is not physically signed by you, and it governs your use of the Website and Services. </p> ';} ?>
<?php if($platforms_other == 'ebook Name') {echo '
<p> This disclaimer ("Disclaimer") sets forth the general guidelines, disclosures, and terms of your use of the '; echo $a -> ebook_name; echo ' eBook ("eBook" or "Materials"). This Disclaimer is a legally binding agreement between you ("User", "you" or "your") and '; echo $a -> company_name; echo ' ("Creator", "we", "us" or "our"). By accessing and using the Materials, you acknowledge that you have read, understood, and agree to be bound by the terms of this Disclaimer. If you are entering into this Disclaimer on behalf of a business or other legal entity, you represent that you have the authority to bind such entity to this Disclaimer, in which case the terms "User", "you" or "your" shall refer to such entity. If you do not have such authority, or if you do not agree with the terms of this Disclaimer, you must not accept this Disclaimer and may not access and use the Materials. You acknowledge that this Disclaimer is a contract between you and the Creator, even though it is electronic and is not physically signed by you, and it governs your use of the Materials. </p>';}
elseif($platforms_other == 'Landing Page') {echo '
<p> This disclaimer ("Disclaimer") sets forth the general guidelines, disclosures, and terms of your use of the '; echo $a -> landing_url; echo 'webpage ("Webpage" or "Service") and any of its related products and services (collectively, "Services"). This Disclaimer is a legally binding agreement between you ("User", "you" or "your") and this Webpage operator ("Operator", "we", "us" or "our"). By accessing and using the Webpage and Services, you acknowledge that you have read, understood, and agree to be bound by the terms of this Disclaimer. If you are entering into this Disclaimer on behalf of a business or other legal entity, you represent that you have the authority to bind such entity to this Disclaimer, in which case the terms "User", "you" or "your" shall refer to such entity. If you do not have such authority, or if you do not agree with the terms of this Disclaimer, you must not accept this Disclaimer and may not access and use the Webpage and Services. You acknowledge that this Disclaimer is a contract between you and the Operator, even though it is electronic and is not physically signed by you, and it governs your use of the Webpage and Services. </p>';}
elseif($platforms_other == 'Course Name') {echo '
<p> This disclaimer ("Disclaimer") sets forth the general guidelines, disclosures, and terms of your use of the '; echo $a -> course_name; echo ' Online course ("Online course" or "Materials"). This Disclaimer is a legally binding agreement between you ("User", "you" or "your") and '; echo $a -> company_name; echo ' ("Creator", "we", "us" or "our"). By accessing and using the Materials, you acknowledge that you have read, understood, and agree to be bound by the terms of this Disclaimer. If you are entering into this Disclaimer on behalf of a business or other legal entity, you represent that you have the authority to bind such entity to this Disclaimer, in which case the terms "User", "you" or "your" shall refer to such entity. If you do not have such authority, or if you do not agree with the terms of this Disclaimer, you must not accept this Disclaimer and may not access and use the Materials. You acknowledge that this Disclaimer is a contract between you and the Creator, even though it is electronic and is not physically signed by you, and it governs your use of the Materials. </p>';}
elseif($platforms_other == 'Podcast') {echo '
<p> This disclaimer ("Disclaimer") sets forth the general guidelines, disclosures, and terms of your use of the '; echo $a -> podcast_name; echo 'podcast ("Podcast" or "Materials"). This Disclaimer is a legally binding agreement between you ("User", "you" or "your") and '; echo $a -> company_name; echo ' ("Creator", "we", "us" or "our"). By accessing and using the Materials, you acknowledge that you have read, understood, and agree to be bound by the terms of this Disclaimer. If you are entering into this Disclaimer on behalf of a business or other legal entity, you represent that you have the authority to bind such entity to this Disclaimer, in which case the terms "User", "you" or "your" shall refer to such entity. If you do not have such authority, or if you do not agree with the terms of this Disclaimer, you must not accept this Disclaimer and may not access and use the Materials. You acknowledge that this Disclaimer is a contract between you and the Creator, even though it is electronic and is not physically signed by you, and it governs your use of the Materials. </p>';}
elseif($platforms_other == 'Video Channel') {echo '
<p> This disclaimer ("Disclaimer") sets forth the general guidelines, disclosures, and terms of your use of the '; echo $a -> video_name; echo 'video channel ("Video channel" or "Materials"). This Disclaimer is a legally binding agreement between you ("User", "you" or "your") and '; echo $a -> company_name; echo ' ("Creator", "we", "us" or "our"). By accessing and using the Materials, you acknowledge that you have read, understood, and agree to be bound by the terms of this Disclaimer. If you are entering into this Disclaimer on behalf of a business or other legal entity, you represent that you have the authority to bind such entity to this Disclaimer, in which case the terms "User", "you" or "your" shall refer to such entity. If you do not have such authority, or if you do not agree with the terms of this Disclaimer, you must not accept this Disclaimer and may not access and use the Materials. You acknowledge that this Disclaimer is a contract between you and the Creator, even though it is electronic and is not physically signed by you, and it governs your use of the Materials. </p>';} ?>

<h2>Representation</h2>
<p>
    Any views or opinions represented in the Mobile Application are personal and belong solely to the Operator and do not represent those of people, institutions or organizations that the Operator
    may or may not be associated with in professional or personal capacity unless explicitly stated. Any views or opinions are not intended to malign any religion, ethnic group, club,
    organization, company, or individual.
</p>
<h2>Content and postings</h2>
<p>
    You may print or copy any part of the Mobile Application and Services for your own personal, non-commercial use, but you may not copy any part of the Mobile Application and Services for any
    other purposes, and you may not modify any part of the Mobile Application and Services. Inclusion of any part of the Mobile Application and Services in another work, whether in printed or
    electronic or another form or inclusion of any part of the Mobile Application and Services on another resource by embedding, framing or otherwise without the express permission of the Operator
    is prohibited.
</p>
<p>
    You may submit new content in the Mobile Application. By uploading or otherwise making available any information to the Operator, you grant the Operator the unlimited, perpetual right to
    distribute, display, publish, reproduce, reuse and copy the information contained therein. You may not impersonate any other person through the Mobile Application and Services. You may not
    post content that is defamatory, fraudulent, obscene, threatening, invasive of another person's privacy rights or that is otherwise unlawful. You may not post content that infringes on the
    intellectual property rights of any other person or entity. You may not post any content that includes any computer virus or other code designed to disrupt, damage, or limit the functioning of
    any computer software or hardware. By submitting or posting content in the Mobile Application, you grant the Operator the right to edit and, if necessary, remove any content at any time and
    for any reason.
</p>
<h2>Compensation and sponsorship</h2>
<p>Some of the links in the Mobile Application may be "affiliate links". This means if you click on the link and purchase an item, the Operator will receive an affiliate commission.</p>
<h2>Reviews and testimonials</h2>
<p>
    Testimonials are received in various forms through a variety of submission methods. The testimonials are not necessarily representative of all of those who will use Mobile Application and
    Services, and the Operator is not responsible for the opinions or comments available in the Mobile Application, and does not necessarily share them. People providing testimonials in the Mobile
    Application may have been compensated with free products or discounts for use of their experiences. All opinions expressed are strictly the views of the reviewers.
</p>
<p>
    The testimonials displayed are given verbatim except for grammatical or typing error corrections. Some testimonials may have been edited for clarity, or shortened in cases where the original
    testimonial included extraneous information of no relevance to the general public. Testimonials may be reviewed for authenticity before they are available for public viewing.
</p>
<h2>Indemnification and warranties</h2>
<p>
    While we have made every attempt to ensure that the information contained in the Mobile Application is correct, the Operator is not responsible for any errors or omissions, or for the results
    obtained from the use of this information. All information in the Mobile Application is provided "as is", with no guarantee of completeness, accuracy, timeliness or of the results obtained
    from the use of this information, and without warranty of any kind, express or implied. In no event will the Operator be liable to you or anyone else for any decision made or action taken in
    reliance on the information in the Mobile Application, or for any consequential, special or similar damages, even if advised of the possibility of such damages. Information contained in the
    Mobile Application are subject to change at any time and without warning.
</p>
<h2>Changes and amendments</h2>
<p>
    We reserve the right to modify this Disclaimer or its terms relating to the Mobile Application and Services at any time, effective upon posting of an updated version of this Disclaimer in the
    Mobile Application. When we do, we will send you an email to notify you. Continued use of the Mobile Application and Services after any such changes shall constitute your consent to such
    changes.
</p>
<h2>Acceptance of this disclaimer</h2>
<p>
    You acknowledge that you have read this Disclaimer and agree to all its terms and conditions. By accessing and using the Mobile Application and Services you agree to be bound by this
    Disclaimer. If you do not agree to abide by the terms of this Disclaimer, you are not authorized to access or use the Mobile Application and Services. This disclaimer was created with the
    <a target="_blank" href="disclaimer-generator">disclaimer generator</a>.
</p>
<h2>Contacting us</h2>
<p>If you would like to contact us to understand more about this Disclaimer or wish to contact us concerning any matter relating to it
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
                                        <p>We recommend linking to your policy directly from your app. We host it for free and it will ensure automatic updates and compliance with the latest requirements and regulations.</p>
                                        <h5 class="margin-bottom-small">Public link to your policy</h5>
                                        <pre class="link"><code id="policy-public-link">http://policies.imbuetech.in/disclaimer-basic-policy?form-id=<?php echo $id ?></code></pre>
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
                                            <li><a class="button" target="_blank" href="http://policies.imbuetech.in/disclaimer-basic-policy?form-id=<?php echo $id ?>">View policy</a></li>
                                        </ul>
                                        <div class="row">
                                            <div class="col-ms-12 hidden-xs">
                                                <h4>Copy the policy</h4>
                                                <p>
                                                    If you rather not link to the policy directly, you may copy
                                                    <a onclick="$(&#39;#tabs .policy_html&#39;).click();$(&#39;#tabs .policy_html&#39;).click();return false;" href="">HTML code</a> or
                                                    <a onclick="$(&#39;#tabs .policy_text&#39;).click();$(&#39;#tabs .policy_text&#39;).click();return false;" href="">plain text</a> of
                                                    the policy to your app instead.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

     <div id="html" class="tabcontent" style="display: none;">
                                        <div class="box">
                                            <pre id="policy-html-text">
&lt;h1&gt;Disclaimer&lt;/h1&gt;
<?php if($platforms == 'Mobile App Name') {echo '
&lt;p&gt;This disclaimer (&amp;quot;Disclaimer&amp;quot;) sets forth the general guidelines, disclosures, and terms of your use of the '; echo $a -> mobile_name; echo ' mobile application (&amp;quot;Mobile Application&amp;quot; or &amp;quot;Service&amp;quot;) and any of its related products and services (collectively, &amp;quot;Services&amp;quot;). This Disclaimer is a legally binding agreement between you (&amp;quot;User&amp;quot;, &amp;quot;you&amp;quot; or &amp;quot;your&amp;quot;) and this Mobile Application developer (&amp;quot;Operator&amp;quot;, &amp;quot;we&amp;quot;, &amp;quot;us&amp;quot; or &amp;quot;our&amp;quot;). By accessing and using the Mobile Application and Services, you acknowledge that you have read, understood, and agree to be bound by the terms of this Disclaimer. If you are entering into this Disclaimer on behalf of a business or other legal entity, you represent that you have the authority to bind such entity to this Disclaimer, in which case the terms &amp;quot;User&amp;quot;, &amp;quot;you&amp;quot; or &amp;quot;your&amp;quot; shall refer to such entity. If you do not have such authority, or if you do not agree with the terms of this Disclaimer, you must not accept this Disclaimer and may not access and use the Mobile Application and Services. You acknowledge that this Disclaimer is a contract between you and the Operator, even though it is electronic and is not physically signed by you, and it governs your use of the Mobile Application and Services.&lt;/p&gt; ';}
elseif($platforms == 'Website URL') {echo '
    &lt;p&gt; This disclaimer (&quot;Disclaimer&quot;) sets forth the general guidelines, disclosures, and terms of your use of the '; echo $a -> website_url; echo 'website (&quot;Website&quot; or &quot;Service&quot;) and any of its related products and services (collectively, &quot;Services&quot;). This Disclaimer is a legally binding agreement between you (&quot;User&quot;, &quot;you&quot; or &quot;your&quot;) and this Website operator (&quot;Operator&quot;, &quot;we&quot;, &quot;us&quot; or &quot;our&quot;). By accessing and using the Website and Services, you acknowledge that you have read, understood, and agree to be bound by the terms of this Disclaimer. If you are entering into this Disclaimer on behalf of a business or other legal entity, you represent that you have the authority to bind such entity to this Disclaimer, in which case the terms &quot;User&quot;, &quot;you&quot; or &quot;your&quot; shall refer to such entity. If you do not have such authority, or if you do not agree with the terms of this Disclaimer, you must not accept this Disclaimer and may not access and use the Website and Services. You acknowledge that this Disclaimer is a contract between you and the Operator, even though it is electronic and is not physically signed by you, and it governs your use of the Website and Services.&lt;/p&gt;';} ?>
    <?php if($platforms_other == 'ebook Name') {echo '
    &lt;p&gt; This disclaimer (&quot;Disclaimer&quot;) sets forth the general guidelines, disclosures, and terms of your use of the '; echo $a -> ebook_name; echo 'eBook (&quot;eBook&quot; or &quot;Materials&quot;). This Disclaimer is a legally binding agreement between you (&quot;User&quot;, &quot;you&quot; or &quot;your&quot;) and '; echo $a -> company_name; echo '(&quot;Creator&quot;, &quot;we&quot;, &quot;us&quot; or &quot;our&quot;). By accessing and using the Materials, you acknowledge that you have read, understood, and agree to be bound by the terms of this Disclaimer. If you are entering into this Disclaimer on behalf of a business or other legal entity, you represent that you have the authority to bind such entity to this Disclaimer, in which case the terms &quot;User&quot;, &quot;you&quot; or &quot;your&quot; shall refer to such entity. If you do not have such authority, or if you do not agree with the terms of this Disclaimer, you must not accept this Disclaimer and may not access and use the Materials. You acknowledge that this Disclaimer is a contract between you and the Creator, even though it is electronic and is not physically signed by you, and it governs your use of the Materials. &lt;/p&gt;';}
    elseif($platforms_other == 'Landing Page') {echo '
     &lt;p&gt; This disclaimer (&quot;Disclaimer&quot;) sets forth the general guidelines, disclosures, and terms of your use of the '; echo $a -> landing_url; echo 'webpage (&quot;Webpage&quot; or &quot;Service&quot;) and any of its related products and services (collectively, &quot;Services&quot;). This Disclaimer is a legally binding agreement between you (&quot;User&quot;, &quot;you&quot; or &quot;your&quot;) and this Webpage operator (&quot;Operator&quot;, &quot;we&quot;, &quot;us&quot; or &quot;our&quot;). By accessing and using the Webpage and Services, you acknowledge that you have read, understood, and agree to be bound by the terms of this Disclaimer. If you are entering into this Disclaimer on behalf of a business or other legal entity, you represent that you have the authority to bind such entity to this Disclaimer, in which case the terms &quot;User&quot;, &quot;you&quot; or &quot;your&quot; shall refer to such entity. If you do not have such authority, or if you do not agree with the terms of this Disclaimer, you must not accept this Disclaimer and may not access and use the Webpage and Services. You acknowledge that this Disclaimer is a contract between you and the Operator, even though it is electronic and is not physically signed by you, and it governs your use of the Webpage and Services. &lt;/p&gt;';}
     elseif($platforms_other == 'Course Name') {echo ' &lt;p&gt; This disclaimer (&quot;Disclaimer&quot;) sets forth the general guidelines, disclosures, and terms of your use of the '; echo $a -> course_name; echo ' Online course (&quot;Online course&quot; or &quot;Materials&quot;). This Disclaimer is a legally binding agreement between you (&quot;User&quot;, &quot;you&quot; or &quot;your&quot;) and  '; echo $a -> company_name; echo ' (&quot;Creator&quot;, &quot;we&quot;, &quot;us&quot; or &quot;our&quot;). By accessing and using the Materials, you acknowledge that you have read, understood, and agree to be bound by the terms of this Disclaimer. If you are entering into this Disclaimer on behalf of a business or other legal entity, you represent that you have the authority to bind such entity to this Disclaimer, in which case the terms &quot;User&quot;, &quot;you&quot; or &quot;your&quot; shall refer to such entity. If you do not have such authority, or if you do not agree with the terms of this Disclaimer, you must not accept this Disclaimer and may not access and use the Materials. You acknowledge that this Disclaimer is a contract between you and the Creator, even though it is electronic and is not physically signed by you, and it governs your use of the Materials. &lt;/p&gt;';}
     elseif($platforms_other == 'Podcast') {echo '&lt;p&gt; This disclaimer (&quot;Disclaimer&quot;) sets forth the general guidelines, disclosures, and terms of your use of the '; echo $a -> podcast_name; echo ' podcast (&quot;Podcast&quot; or &quot;Materials&quot;). This Disclaimer is a legally binding agreement between you (&quot;User&quot;, &quot;you&quot; or &quot;your&quot;) and '; echo $a -> company_name; echo ' (&quot;Creator&quot;, &quot;we&quot;, &quot;us&quot; or &quot;our&quot;). By accessing and using the Materials, you acknowledge that you have read, understood, and agree to be bound by the terms of this Disclaimer. If you are entering into this Disclaimer on behalf of a business or other legal entity, you represent that you have the authority to bind such entity to this Disclaimer, in which case the terms &quot;User&quot;, &quot;you&quot; or &quot;your&quot; shall refer to such entity. If you do not have such authority, or if you do not agree with the terms of this Disclaimer, you must not accept this Disclaimer and may not access and use the Materials. You acknowledge that this Disclaimer is a contract between you and the Creator, even though it is electronic and is not physically signed by you, and it governs your use of the Materials. &lt;/p&gt;';}
     elseif($platforms_other == 'Video Channel') {echo '&lt;p&gt; This disclaimer (&quot;Disclaimer&quot;) sets forth the general guidelines, disclosures, and terms of your use of the '; echo $a -> video_name; echo 'video channel (&quot;Video channel&quot; or &quot;Materials&quot;). This Disclaimer is a legally binding agreement between you (&quot;User&quot;, &quot;you&quot; or &quot;your&quot;) and '; echo $a -> company_name; echo '  (&quot;Creator&quot;, &quot;we&quot;, &quot;us&quot; or &quot;our&quot;). By accessing and using the Materials, you acknowledge that you have read, understood, and agree to be bound by the terms of this Disclaimer. If you are entering into this Disclaimer on behalf of a business or other legal entity, you represent that you have the authority to bind such entity to this Disclaimer, in which case the terms &quot;User&quot;, &quot;you&quot; or &quot;your&quot; shall refer to such entity. If you do not have such authority, or if you do not agree with the terms of this Disclaimer, you must not accept this Disclaimer and may not access and use the Materials. You acknowledge that this Disclaimer is a contract between you and the Creator, even though it is electronic and is not physically signed by you, and it governs your use of the Materials. &lt;/p&gt;';} ?>
&lt;h2&gt;Representation&lt;/h2&gt;
&lt;p&gt;Any views or opinions represented in the Mobile Application are personal and belong solely to the Operator and do not represent those of people, institutions or organizations that the Operator may or may not be associated with in professional or personal capacity unless explicitly stated. Any views or opinions are not intended to malign any religion, ethnic group, club, organization, company, or individual.&lt;/p&gt;
&lt;h2&gt;Content and postings&lt;/h2&gt;
&lt;p&gt;You may print or copy any part of the Mobile Application and Services for your own personal, non-commercial use, but you may not copy any part of the Mobile Application and Services for any other purposes, and you may not modify any part of the Mobile Application and Services. Inclusion of any part of the Mobile Application and Services in another work, whether in printed or electronic or another form or inclusion of any part of the Mobile Application and Services on another resource by embedding, framing or otherwise without the express permission of the Operator is prohibited. &lt;/p&gt;
&lt;p&gt;You may submit new content in the Mobile Application. By uploading or otherwise making available any information to the Operator, you grant the Operator the unlimited, perpetual right to distribute, display, publish, reproduce, reuse and copy the information contained therein. You may not impersonate any other person through the Mobile Application and Services. You may not post content that is defamatory, fraudulent, obscene, threatening, invasive of another person's privacy rights or that is otherwise unlawful. You may not post content that infringes on the intellectual property rights of any other person or entity. You may not post any content that includes any computer virus or other code designed to disrupt, damage, or limit the functioning of any computer software or hardware. By submitting or posting content in the Mobile Application, you grant the Operator the right to edit and, if necessary, remove any content at any time and for any reason.&lt;h2&gt;Compensation and sponsorship&lt;/h2&gt;
&lt;p&gt;Some of the links in the Mobile Application may be &amp;quot;affiliate links&amp;quot;. This means if you click on the link and purchase an item, the Operator will receive an affiliate commission.
&lt;h2&gt;Reviews and testimonials&lt;/h2&gt;
&lt;p&gt;Testimonials are received in various forms through a variety of submission methods. The testimonials are not necessarily representative of all of those who will use Mobile Application and Services, and the Operator is not responsible for the opinions or comments available in the Mobile Application, and does not necessarily share them. People providing testimonials in the Mobile Application may have been compensated with free products or discounts for use of their experiences. All opinions expressed are strictly the views of the reviewers.&lt;/p&gt;
&lt;p&gt;The testimonials displayed are given verbatim except for grammatical or typing error corrections. Some testimonials may have been edited for clarity, or shortened in cases where the original testimonial included extraneous information of no relevance to the general public. Testimonials may be reviewed for authenticity before they are available for public viewing.&lt;p&gt;
&lt;h2&gt;Indemnification and warranties&lt;/h2&gt;
&lt;p&gt;While we have made every attempt to ensure that the information contained in the Mobile Application is correct, the Operator is not responsible for any errors or omissions, or for the results obtained from the use of this information. All information in the Mobile Application is provided &amp;quot;as is&amp;quot;, with no guarantee of completeness, accuracy, timeliness or of the results obtained from the use of this information, and without warranty of any kind, express or implied. In no event will the Operator be liable to you or anyone else for any decision made or action taken in reliance on the information in the Mobile Application, or for any consequential, special or similar damages, even if advised of the possibility of such damages. Information contained in the Mobile Application are subject to change at any time and without warning.&lt;/p&gt;
&lt;h2&gt;Changes and amendments&lt;/h2&gt;
&lt;p&gt;We reserve the right to modify this Disclaimer or its terms relating to the Mobile Application and Services at any time, effective upon posting of an updated version of this Disclaimer in the Mobile Application. When we do, we will send you an email to notify you. Continued use of the Mobile Application and Services after any such changes shall constitute your consent to such changes.&lt;/p&gt;
&lt;h2&gt;Acceptance of this disclaimer&lt;/h2&gt;
&lt;p&gt;You acknowledge that you have read this Disclaimer and agree to all its terms and conditions. By accessing and using the Mobile Application and Services you agree to be bound by this Disclaimer. If you do not agree to abide by the terms of this Disclaimer, you are not authorized to access or use the Mobile Application and Services. This disclaimer was created with the &lt;a target="_blank" href="disclaimer-generator"&gt;disclaimer generator&lt;/a&gt;.&lt;/p&gt;
&lt;h2&gt;Contacting us&lt;/h2&gt;<br>
&lt;p&gt;If you would like to contact us to understand more about this Policy or wish to contact us concerning any matter relating to our use of cookies<?php if($contacts == 'form') { echo ', you may do so via the '; echo $a -> contact_form ;} ?><?php if($contacts == 'email') { echo ', send an email to '; echo $a -> contact_email ;} ?><?php if($contacts == 'address') { echo ', write a letter to '; echo $a -> contact_address ;} ?>&lt;/p&gt;<br>
&lt;p&gt;This document was created on <?php echo $a -> created_at ; ?>&lt;/p&gt;
                                            </pre>
                                        </div>
                                        <h4 class="margin-bottom-small">Copy HTML code</h4>
                                        <p>If you rather not link to the policy directly, you may copy the HTML code of the policy directly to your app.</p>
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
                                        <a class="button danger" data-html="Are you sure you want to delete this policy?" data-role="confirm" href="">Delete policy</a>
                                    </li>
                                </ul>
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>

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
               $platforms = $a -> platforms;
               $platforms_other = $a -> platforms_other;
               $third_party = $a -> third_party;
               $cookies_social = $a -> cookies_social;
               $contacts = $a -> contacts;
               ?>
        <header id="header">
            <div class="container">
                <div class="row">
                    <div class="col-ms-12">
                       <h1>Disclaimer for <?php if($platforms == 'Website URL') {echo $a -> website_url;} elseif($platforms == 'Mobile App Name') {echo $a -> mobile_name ; } elseif ($platforms_other == 'ebook Name') { echo $a -> ebook_name ; }  elseif($platforms_other == 'Landing Page') {echo $a-> landing_url ; } elseif ($platforms_other == 'Course Name') { echo $a -> course_name ; } elseif($platforms_other == 'Podcast') {echo $a -> podcast_name ; } elseif ($platforms_other == 'Video Channel') { echo $a -> video_name ; } ?>
                        </h1>
                    </div>
                </div>
            </div>
        </header>
        <div id="container">
            <div class="container">
                <div class="row">
                    <div class="col-ms-12">
                        <article>
                           <h1>Disclaimer</h1>
<?php if($platforms == 'Mobile App Name') {echo '
<p> This disclaimer ("Disclaimer") sets forth the general guidelines, disclosures, and terms of your use of the '; echo $a -> mobile_name; echo ' mobile application ("Mobile Application" or "Service") and any of its related products and services (collectively, "Services"). This Disclaimer is a legally binding agreement between you ("User", "you" or "your") and this Mobile Application developer ("Operator", "we", "us" or "our"). By accessing and using the Mobile Application and Services, you acknowledge that you have read, understood, and agree to be bound by the terms of this Disclaimer. If you are entering into this Disclaimer on behalf of a business or other legal entity, you represent that you have the authority to bind such entity to this Disclaimer, in which case the terms "User", "you" or "your" shall refer to such entity. If you do not have such authority, or if you do not agree with the terms of this Disclaimer, you must not accept this Disclaimer and may not access and use the Mobile Application and Services. You acknowledge that this Disclaimer is a contract between you and the Operator, even though it is electronic and is not physically signed by you, and it governs your use of the Mobile Application and Services. </p> ';}
elseif($platforms == 'Website URL') {echo '
<p> This disclaimer ("Disclaimer") sets forth the general guidelines, disclosures, and terms of your use of the '; echo $a -> website_url; echo ' website ("Website" or "Service") and any of its related products and services (collectively, "Services"). This Disclaimer is a legally binding agreement between you ("User", "you" or "your") and this Website operator ("Operator", "we", "us" or "our"). By accessing and using the Website and Services, you acknowledge that you have read, understood, and agree to be bound by the terms of this Disclaimer. If you are entering into this Disclaimer on behalf of a business or other legal entity, you represent that you have the authority to bind such entity to this Disclaimer, in which case the terms "User", "you" or "your" shall refer to such entity. If you do not have such authority, or if you do not agree with the terms of this Disclaimer, you must not accept this Disclaimer and may not access and use the Website and Services. You acknowledge that this Disclaimer is a contract between you and the Operator, even though it is electronic and is not physically signed by you, and it governs your use of the Website and Services. </p> ';} ?>
<?php if($platforms_other == 'ebook Name') {echo '
<p> This disclaimer ("Disclaimer") sets forth the general guidelines, disclosures, and terms of your use of the '; echo $a -> ebook_name; echo ' eBook ("eBook" or "Materials"). This Disclaimer is a legally binding agreement between you ("User", "you" or "your") and '; echo $a -> company_name; echo ' ("Creator", "we", "us" or "our"). By accessing and using the Materials, you acknowledge that you have read, understood, and agree to be bound by the terms of this Disclaimer. If you are entering into this Disclaimer on behalf of a business or other legal entity, you represent that you have the authority to bind such entity to this Disclaimer, in which case the terms "User", "you" or "your" shall refer to such entity. If you do not have such authority, or if you do not agree with the terms of this Disclaimer, you must not accept this Disclaimer and may not access and use the Materials. You acknowledge that this Disclaimer is a contract between you and the Creator, even though it is electronic and is not physically signed by you, and it governs your use of the Materials. </p>';}
elseif($platforms_other == 'Landing Page') {echo '
<p> This disclaimer ("Disclaimer") sets forth the general guidelines, disclosures, and terms of your use of the '; echo $a -> landing_url; echo 'webpage ("Webpage" or "Service") and any of its related products and services (collectively, "Services"). This Disclaimer is a legally binding agreement between you ("User", "you" or "your") and this Webpage operator ("Operator", "we", "us" or "our"). By accessing and using the Webpage and Services, you acknowledge that you have read, understood, and agree to be bound by the terms of this Disclaimer. If you are entering into this Disclaimer on behalf of a business or other legal entity, you represent that you have the authority to bind such entity to this Disclaimer, in which case the terms "User", "you" or "your" shall refer to such entity. If you do not have such authority, or if you do not agree with the terms of this Disclaimer, you must not accept this Disclaimer and may not access and use the Webpage and Services. You acknowledge that this Disclaimer is a contract between you and the Operator, even though it is electronic and is not physically signed by you, and it governs your use of the Webpage and Services. </p>';}
elseif($platforms_other == 'Course Name') {echo '
<p> This disclaimer ("Disclaimer") sets forth the general guidelines, disclosures, and terms of your use of the '; echo $a -> course_name; echo ' Online course ("Online course" or "Materials"). This Disclaimer is a legally binding agreement between you ("User", "you" or "your") and '; echo $a -> company_name; echo ' ("Creator", "we", "us" or "our"). By accessing and using the Materials, you acknowledge that you have read, understood, and agree to be bound by the terms of this Disclaimer. If you are entering into this Disclaimer on behalf of a business or other legal entity, you represent that you have the authority to bind such entity to this Disclaimer, in which case the terms "User", "you" or "your" shall refer to such entity. If you do not have such authority, or if you do not agree with the terms of this Disclaimer, you must not accept this Disclaimer and may not access and use the Materials. You acknowledge that this Disclaimer is a contract between you and the Creator, even though it is electronic and is not physically signed by you, and it governs your use of the Materials. </p>';}
elseif($platforms_other == 'Podcast') {echo '
<p> This disclaimer ("Disclaimer") sets forth the general guidelines, disclosures, and terms of your use of the '; echo $a -> podcast_name; echo 'podcast ("Podcast" or "Materials"). This Disclaimer is a legally binding agreement between you ("User", "you" or "your") and '; echo $a -> company_name; echo ' ("Creator", "we", "us" or "our"). By accessing and using the Materials, you acknowledge that you have read, understood, and agree to be bound by the terms of this Disclaimer. If you are entering into this Disclaimer on behalf of a business or other legal entity, you represent that you have the authority to bind such entity to this Disclaimer, in which case the terms "User", "you" or "your" shall refer to such entity. If you do not have such authority, or if you do not agree with the terms of this Disclaimer, you must not accept this Disclaimer and may not access and use the Materials. You acknowledge that this Disclaimer is a contract between you and the Creator, even though it is electronic and is not physically signed by you, and it governs your use of the Materials. </p>';}
elseif($platforms_other == 'Video Channel') {echo '
<p> This disclaimer ("Disclaimer") sets forth the general guidelines, disclosures, and terms of your use of the '; echo $a -> video_name; echo 'video channel ("Video channel" or "Materials"). This Disclaimer is a legally binding agreement between you ("User", "you" or "your") and '; echo $a -> company_name; echo ' ("Creator", "we", "us" or "our"). By accessing and using the Materials, you acknowledge that you have read, understood, and agree to be bound by the terms of this Disclaimer. If you are entering into this Disclaimer on behalf of a business or other legal entity, you represent that you have the authority to bind such entity to this Disclaimer, in which case the terms "User", "you" or "your" shall refer to such entity. If you do not have such authority, or if you do not agree with the terms of this Disclaimer, you must not accept this Disclaimer and may not access and use the Materials. You acknowledge that this Disclaimer is a contract between you and the Creator, even though it is electronic and is not physically signed by you, and it governs your use of the Materials. </p>';} ?>

<h2>Representation</h2>
<p>
    Any views or opinions represented in the Mobile Application are personal and belong solely to the Operator and do not represent those of people, institutions or organizations that the Operator
    may or may not be associated with in professional or personal capacity unless explicitly stated. Any views or opinions are not intended to malign any religion, ethnic group, club,
    organization, company, or individual.
</p>
<h2>Content and postings</h2>
<p>
    You may print or copy any part of the Mobile Application and Services for your own personal, non-commercial use, but you may not copy any part of the Mobile Application and Services for any
    other purposes, and you may not modify any part of the Mobile Application and Services. Inclusion of any part of the Mobile Application and Services in another work, whether in printed or
    electronic or another form or inclusion of any part of the Mobile Application and Services on another resource by embedding, framing or otherwise without the express permission of the Operator
    is prohibited.
</p>
<p>
    You may submit new content in the Mobile Application. By uploading or otherwise making available any information to the Operator, you grant the Operator the unlimited, perpetual right to
    distribute, display, publish, reproduce, reuse and copy the information contained therein. You may not impersonate any other person through the Mobile Application and Services. You may not
    post content that is defamatory, fraudulent, obscene, threatening, invasive of another person's privacy rights or that is otherwise unlawful. You may not post content that infringes on the
    intellectual property rights of any other person or entity. You may not post any content that includes any computer virus or other code designed to disrupt, damage, or limit the functioning of
    any computer software or hardware. By submitting or posting content in the Mobile Application, you grant the Operator the right to edit and, if necessary, remove any content at any time and
    for any reason.
</p>
<h2>Compensation and sponsorship</h2>
<p>Some of the links in the Mobile Application may be "affiliate links". This means if you click on the link and purchase an item, the Operator will receive an affiliate commission.</p>
<h2>Reviews and testimonials</h2>
<p>
    Testimonials are received in various forms through a variety of submission methods. The testimonials are not necessarily representative of all of those who will use Mobile Application and
    Services, and the Operator is not responsible for the opinions or comments available in the Mobile Application, and does not necessarily share them. People providing testimonials in the Mobile
    Application may have been compensated with free products or discounts for use of their experiences. All opinions expressed are strictly the views of the reviewers.
</p>
<p>
    The testimonials displayed are given verbatim except for grammatical or typing error corrections. Some testimonials may have been edited for clarity, or shortened in cases where the original
    testimonial included extraneous information of no relevance to the general public. Testimonials may be reviewed for authenticity before they are available for public viewing.
</p>
<h2>Indemnification and warranties</h2>
<p>
    While we have made every attempt to ensure that the information contained in the Mobile Application is correct, the Operator is not responsible for any errors or omissions, or for the results
    obtained from the use of this information. All information in the Mobile Application is provided "as is", with no guarantee of completeness, accuracy, timeliness or of the results obtained
    from the use of this information, and without warranty of any kind, express or implied. In no event will the Operator be liable to you or anyone else for any decision made or action taken in
    reliance on the information in the Mobile Application, or for any consequential, special or similar damages, even if advised of the possibility of such damages. Information contained in the
    Mobile Application are subject to change at any time and without warning.
</p>
<h2>Changes and amendments</h2>
<p>
    We reserve the right to modify this Disclaimer or its terms relating to the Mobile Application and Services at any time, effective upon posting of an updated version of this Disclaimer in the
    Mobile Application. When we do, we will send you an email to notify you. Continued use of the Mobile Application and Services after any such changes shall constitute your consent to such
    changes.
</p>
<h2>Acceptance of this disclaimer</h2>
<p>
    You acknowledge that you have read this Disclaimer and agree to all its terms and conditions. By accessing and using the Mobile Application and Services you agree to be bound by this
    Disclaimer. If you do not agree to abide by the terms of this Disclaimer, you are not authorized to access or use the Mobile Application and Services. This disclaimer was created with the
    <a target="_blank" href="disclaimer-generator">disclaimer generator</a>.
</p>
<h2>Contacting us</h2>
<p>If you would like to contact us to understand more about this Disclaimer or wish to contact us concerning any matter relating to it
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