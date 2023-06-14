@extends('layouts.master')

@section('terms-and-conditions-basic-policy')

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
            window.dataLayer.push({ stVar3: 1 }, { isLoggedIn: "true" }, { event: "policiesWizard", eventCategory: "terms and conditions wizard", eventAction: "complete questionnaire", eventLabel: "terms and conditions" });
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
        <link rel="alternate" type="application/rss+xml" title="Feed" href="/blog/feed" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>View terms and conditions for asdfg</title>
        <meta name="description" content="" />
        <link href="{{ asset ('assets/css/1611587689.css')}}" rel="stylesheet" type="text/css" />
        <script src="{{ asset ('assets/js/1611587689.js')}}"></script>
        <script src="{{ asset ('assets/js/clipboard.min.js')}}"></script>
        <script>
            _gscq.push(["targeting", "policyActive", "1"]);
        </script>
        <meta property="og:image" content="/uploads/p/h/7/g/1y9eg2ur9hegs3x1s2nd.png" />
        <meta name="twitter:image" content="/uploads/p/h/7/g/1y9eg2ur9hegs3x1s2nd.png" />
        <script src="{{ asset ('assets/js/embed.js')}}" id="app-convertbox-script" async="" data-uuid="1d8ce409-0f9c-438e-9982-7a7af22a83ed"></script>
        <style>
            @media print {
                #ghostery-tracker-tally {
                    display: none !important;
                }
            }
        </style>
        <script src="{{ asset ('assets/js/polyfill.min.js')}}"></script>
        <script src="{{ asset ('assets/js/embed-core.js')}}"></script>
        <link href="{{ asset ('assets/js/bars-preview.css')}}" rel="stylesheet" />
        <link href="{{ asset ('assets/css/new.css')}}" rel="stylesheet" type="text/css" />
        <script src="{{ asset('assets/js/tawk.js')}}"></script>
    </head>
    <body class="session policies edit">
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NS2X6F" height="0" width="0" style="display: none; visibility: hidden;"></iframe></noscript>

         <?php $id = $_GET['form-id'];
            $a = DB::table('policy')->where('unique_id', $id)->first();
               $platforms = $a -> platforms;
               $register = $a -> register;
               $monitor = $a -> monitor;
               $contacts = $a -> contacts;
         ?>        

        <div class="section sub-hero">
            <div class="container">
                <div class="row">
                    <div class="col-ms-12">
                        <h1>Terms and conditions for <?php if($platforms == 'Website URL') {echo $a -> website_url;} 
                        elseif($platforms == 'Mobile App Name') {echo $a -> mobile_name;} ?></h1>
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
<h1>Terms and conditions</h1>
<?php if($platforms == 'Mobile App Name') {echo '
<p>These terms and conditions ("Agreement") set forth the general terms and conditions of your use of the '; echo $a -> mobile_name; echo '&nbsp mobile application ("Mobile Application" or "Service") and any of its related products and services (collectively, "Services"). This Agreement is legally binding between you ("User", "you" or "your") and this Mobile Application developer ("Operator", "we", "us" or "our"). By accessing and using the Mobile Application and Services, you acknowledge that you have read, understood, and agree to be bound by the terms of this Agreement. If you are entering
    into this Agreement on behalf of a business or other legal entity, you represent that you have the authority to bind such entity to this Agreement, in which case the terms "User", "you" or "your" shall refer to such entity. If you do not have such authority, or if you do not agree with the terms of this Agreement, you must not accept this Agreement and may not access and use the Mobile Application and Services. You acknowledge that this Agreement is a contract between you and the Operator, even though it is electronic and is not physically signed by you, and it governs your use of the Mobile Application and Services.</p> ';}
    elseif($platforms == 'Website URL') {echo '
    <p>These terms and conditions (&quot;Agreement&quot;) set forth the general terms and conditions of your use of the '; echo $a -> mobile_name; echo '&nbsp website (&quot;Website&quot; or &quot;Service&quot;) and any of its related products and services (collectively, &quot;Services&quot;). This Agreement is legally binding between you (&quot;User&quot;, &quot;you&quot; or &quot;your&quot;) and this Website operator (&quot;Operator&quot;, &quot;we&quot;, &quot;us&quot; or &quot;our&quot;). By accessing and using the Website and Services, you acknowledge that you have read, understood, and agree to be bound by the terms of this Agreement. If you are entering into this Agreement on behalf of a business or other legal entity, you represent that you have the authority to bind such entity to this Agreement, in which case the terms &quot;User&quot;, &quot;you&quot; or &quot;your&quot; shall refer to such entity. If you do not have such authority, or if you do not agree with the terms of this Agreement, you must not accept this Agreement and may not access and use the Website and Services. You acknowledge that this Agreement is a contract between you and the Operator, even though it is electronic and is not physically signed by you, and it governs your use of the Website and Services.</p> ';} ?>
<?php if($register == 1) {echo '
<h2>Accounts and membership</h2>
<p>You must be at least 18 years of age to use the Mobile Application and Services. By using the Mobile Application and Services and by agreeing to this Agreement you warrant and represent that you are at least 18 years of age. If you create an account in the Mobile Application, you are responsible for maintaining the security of your account and you are fully responsible for all activities that occur under the account and any other actions taken in connection with it. We may monitor and review new accounts before you may sign in and start using the Services. Providing false contact information of any kind may result in the termination of your account. You must immediately notify us of any unauthorized uses of your account or any other breaches of security.
    We will not be liable for any acts or omissions by you, including any damages of any kind incurred as a result of such acts or omissions.';} if($monitor == 1) {echo ' We may suspend, disable, or delete your account (or any part thereof) if we determine that you have violated any provision of this Agreement or that your conduct or content would tend to damage our reputation and goodwill. If we delete your account for the foregoing reasons, you may not re-register for our Services. We may block your email address and Internet protocol address to prevent further registration. ';} ?></p>
<h2>User content</h2>
<p>
    We do not own any data, information or material (collectively, "Content") that you submit in the Mobile Application in the course of using the Service. You shall have sole responsibility for
    the accuracy, quality, integrity, legality, reliability, appropriateness, and intellectual property ownership or right to use of all submitted Content. We may monitor and review the Content in
    the Mobile Application submitted or created using our Services by you. You grant us permission to access, copy, distribute, store, transmit, reformat, display and perform the Content of your
    user account solely as required for the purpose of providing the Services to you. Without limiting any of those representations or warranties, we have the right, though not the obligation, to,
    in our own sole discretion, refuse or remove any Content that, in our reasonable opinion, violates any of our policies or is in any way harmful or objectionable. You also grant us the license
    to use, reproduce, adapt, modify, publish or distribute the Content created by you or stored in your user account for commercial, marketing or any similar purpose.
</p>
<h2>Adult content</h2>
<p>
    Please be aware that there may be certain adult or mature content available in the Mobile Application. A warning will be shown to the User prior to adult content being displayed. Where there
    is mature or adult content, individuals who are less than 18 years of age or are not permitted to access such content under the laws of any applicable jurisdiction may not access such content.
    If we learn that anyone under the age of 18 seeks to conduct a transaction through the Services, we will require verified parental consent, in accordance with the Children's Online Privacy
    Protection Act of 1998 ("COPPA"). Certain areas of the Mobile Application and Services may not be available to children under 18 under any circumstances.
</p>
<h2>Backups</h2>
<p>
    We perform regular backups of the Content and will do our best to ensure completeness and accuracy of these backups. In the event of the hardware failure or data loss we will restore backups
    automatically to minimize the impact and downtime.
</p>
<h2>Links to other resources</h2>
<p>
    Although the Mobile Application and Services may link to other resources (such as websites, mobile applications, etc.), we are not, directly or indirectly, implying any approval, association,
    sponsorship, endorsement, or affiliation with any linked resource, unless specifically stated herein. Some of the links in the Mobile Application may be "affiliate links". This means if you
    click on the link and purchase an item, the Operator will receive an affiliate commission. We are not responsible for examining or evaluating, and we do not warrant the offerings of, any
    businesses or individuals or the content of their resources. We do not assume any responsibility or liability for the actions, products, services, and content of any other third parties. You
    should carefully review the legal statements and other conditions of use of any resource which you access through a link in the Mobile Application and Services. Your linking to any other
    off-site resources is at your own risk.
</p>
<h2>Prohibited uses</h2>
<p>
    In addition to other terms as set forth in the Agreement, you are prohibited from using the Mobile Application and Services or Content: (a) for any unlawful purpose; (b) to solicit others to
    perform or participate in any unlawful acts; (c) to violate any international, federal, provincial or state regulations, rules, laws, or local ordinances; (d) to infringe upon or violate our
    intellectual property rights or the intellectual property rights of others; (e) to harass, abuse, insult, harm, defame, slander, disparage, intimidate, or discriminate based on gender, sexual
    orientation, religion, ethnicity, race, age, national origin, or disability; (f) to submit false or misleading information; (g) to upload or transmit viruses or any other type of malicious
    code that will or may be used in any way that will affect the functionality or operation of the Mobile Application and Services, third party products and services, or the Internet; (h) to
    spam, phish, pharm, pretext, spider, crawl, or scrape; (i) for any obscene or immoral purpose; or (j) to interfere with or circumvent the security features of the Mobile Application and
    Services, third party products and services, or the Internet. We reserve the right to terminate your use of the Mobile Application and Services for violating any of the prohibited uses.
</p>
<h2>Intellectual property rights</h2>
<p>
    "Intellectual Property Rights" means all present and future rights conferred by statute, common law or equity in or in relation to any copyright and related rights, trademarks, designs,
    patents, inventions, goodwill and the right to sue for passing off, rights to inventions, rights to use, and all other intellectual property rights, in each case whether registered or
    unregistered and including all applications and rights to apply for and be granted, rights to claim priority from, such rights and all similar or equivalent rights or forms of protection and
    any other results of intellectual activity which subsist or will subsist now or in the future in any part of the world. This Agreement does not transfer to you any intellectual property owned
    by the Operator or third parties, and all rights, titles, and interests in and to such property will remain (as between the parties) solely with the Operator. All trademarks, service marks,
    graphics and logos used in connection with the Mobile Application and Services, are trademarks or registered trademarks of the Operator or its licensors. Other trademarks, service marks,
    graphics and logos used in connection with the Mobile Application and Services may be the trademarks of other third parties. Your use of the Mobile Application and Services grants you no right
    or license to reproduce or otherwise use any of the Operator or third party trademarks.
</p>
<h2>Limitation of liability</h2>
<p>
    To the fullest extent permitted by applicable law, in no event will the Operator, its affiliates, directors, officers, employees, agents, suppliers or licensors be liable to any person for any
    indirect, incidental, special, punitive, cover or consequential damages (including, without limitation, damages for lost profits, revenue, sales, goodwill, use of content, impact on business,
    business interruption, loss of anticipated savings, loss of business opportunity) however caused, under any theory of liability, including, without limitation, contract, tort, warranty, breach
    of statutory duty, negligence or otherwise, even if the liable party has been advised as to the possibility of such damages or could have foreseen such damages. To the maximum extent permitted
    by applicable law, the aggregate liability of the Operator and its affiliates, officers, employees, agents, suppliers and licensors relating to the services will be limited to an amount
    greater of one dollar or any amounts actually paid in cash by you to the Operator for the prior one month period prior to the first event or occurrence giving rise to such liability. The
    limitations and exclusions also apply if this remedy does not fully compensate you for any losses or fails of its essential purpose.
</p>
<h2>Indemnification</h2>
<p>
    You agree to indemnify and hold the Operator and its affiliates, directors, officers, employees, agents, suppliers and licensors harmless from and against any liabilities, losses, damages or
    costs, including reasonable attorneys' fees, incurred in connection with or arising from any third party allegations, claims, actions, disputes, or demands asserted against any of them as a
    result of or relating to your Content, your use of the Mobile Application and Services or any willful misconduct on your part.
</p>
<h2>Severability</h2>
<p>
    All rights and restrictions contained in this Agreement may be exercised and shall be applicable and binding only to the extent that they do not violate any applicable laws and are intended to
    be limited to the extent necessary so that they will not render this Agreement illegal, invalid or unenforceable. If any provision or portion of any provision of this Agreement shall be held
    to be illegal, invalid or unenforceable by a court of competent jurisdiction, it is the intention of the parties that the remaining provisions or portions thereof shall constitute their
    agreement with respect to the subject matter hereof, and all such remaining provisions or portions thereof shall remain in full force and effect.
</p>
<h2>Dispute resolution</h2>
<p>
    The formation, interpretation, and performance of this Agreement and any disputes arising out of it shall be governed by the substantive and procedural laws of Austria without regard to its
    rules on conflicts or choice of law and, to the extent applicable, the laws of Austria. The exclusive jurisdiction and venue for actions related to the subject matter hereof shall be the
    courts located in Austria, and you hereby submit to the personal jurisdiction of such courts. You hereby waive any right to a jury trial in any proceeding arising out of or related to this
    Agreement. The United Nations Convention on Contracts for the International Sale of Goods does not apply to this Agreement.
</p>
<h2>Changes and amendments</h2>
<p>
    We reserve the right to modify this Agreement or its terms relating to the Mobile Application and Services at any time, effective upon posting of an updated version of this Agreement in the
    Mobile Application. When we do, we will send you an email to notify you. Continued use of the Mobile Application and Services after any such changes shall constitute your consent to such
    changes.
</p>
<h2>Acceptance of these terms</h2>
<p>
    You acknowledge that you have read this Agreement and agree to all its terms and conditions. By accessing and using the Mobile Application and Services you agree to be bound by this Agreement.
    If you do not agree to abide by the terms of this Agreement, you are not authorized to access or use the Mobile Application and Services. This terms and conditions policy was created with the
    <a target="_blank" href="/terms-and-conditions-generator">terms and conditions generator</a>.
</p>
<h2>Contacting us</h2>
<p>If you would like to contact us to understand more about this Agreement or wish to contact us concerning any matter relating to it
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
            <pre class="link"><code id="policy-public-link">http://policies.imbuetech.in/terms-and-conditions-basic-policy?form-id=<?php echo $id ?></code></pre>
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
                <li><a class="button" target="_blank" href="http://policies.imbuetech.in/terms-and-conditions-basic-policy?form-id=<?php echo $id ?>">View policy</a></li>
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
&lt;/h1&gt;Terms and conditions&lt;/h1&gt;
<?php if($platforms == 'Mobile App Name') {echo '
&lt;p&gt;These terms and conditions ("Agreement") set forth the general terms and conditions of your use of the '; echo $a -> mobile_name; echo '&nbsp mobile application ("Mobile Application" or "Service") and any of its related products and services (collectively, "Services"). This Agreement is legally binding between you ("User", "you" or "your") and this Mobile Application developer ("Operator", "we", "us" or "our"). By accessing and using the Mobile Application and Services, you acknowledge that you have read, understood, and agree to be bound by the terms of this Agreement. If you are entering into this Agreement on behalf of a business or other legal entity, you represent that you have the authority to bind such entity to this Agreement, in which case the terms "User", "you" or "your" shall refer to such entity. If you do not have such authority, or if you do not agree with the terms of this Agreement, you must not accept this Agreement and may not access and use the Mobile Application and Services. You acknowledge that this Agreement is a contract between you and the Operator, even though it is electronic and is not physically signed by you, and it governs your use of the Mobile Application and Services.&lt;/p&gt; ';}
    elseif($platforms == 'Website URL') {echo '
&lt;p&gt;These terms and conditions (&quot;Agreement&quot;) set forth the general terms and conditions of your use of the '; echo $a -> mobile_name; echo '&nbsp website (&quot;Website&quot; or &quot;Service&quot;) and any of its related products and services (collectively, &quot;Services&quot;). This Agreement is legally binding between you (&quot;User&quot;, &quot;you&quot; or &quot;your&quot;) and this Website operator (&quot;Operator&quot;, &quot;we&quot;, &quot;us&quot; or &quot;our&quot;). By accessing and using the Website and Services, you acknowledge that you have read, understood, and agree to be bound by the terms of this Agreement. If you are entering into this Agreement on behalf of a business or other legal entity, you represent that you have the authority to bind such entity to this Agreement, in which case the terms &quot;User&quot;, &quot;you&quot; or &quot;your&quot; shall refer to such entity. If you do not have such authority, or if you do not agree with the terms of this Agreement, you must not accept this Agreement and may not access and use the Website and Services. You acknowledge that this Agreement is a contract between you and the Operator, even though it is electronic and is not physically signed by you, and it governs your use of the Website and Services.&lt;/p&gt; ';} ?>
<?php if($register == 1) {echo '
&lt;h2&gt;Accounts and membership&lt;/h2&gt;
&lt;p&gt;You must be at least 18 years of age to use the Mobile Application and Services. By using the Mobile Application and Services and by agreeing to this Agreement you warrant and represent that you are at least 18 years of age. If you create an account in the Mobile Application, you are responsible for maintaining the security of your account and you are fully responsible for all activities that occur under the account and any other actions taken in connection with it. We may monitor and review new accounts before you may sign in and start using the Services. Providing false contact information of any kind may result in the termination of your account. You must immediately notify us of any unauthorized uses of your account or any other breaches of security. We will not be liable for any acts or omissions by you, including any damages of any kind incurred as a result of such acts or omissions.';} if($monitor == 1) {echo ' We may suspend, disable, or delete your account (or any part thereof) if we determine that you have violated any provision of this Agreement or that your conduct or content would tend to damage our reputation and goodwill. If we delete your account for the foregoing reasons, you may not re-register for our Services. We may block your email address and Internet protocol address to prevent further registration. ';} ?>&lt;/p&gt;
&lt;h2&gt;User content&lt;/h2&gt;
&lt;p&gt; We do not own any data, information or material (collectively, "Content") that you submit in the Mobile Application in the course of using the Service. You shall have sole responsibility for the accuracy, quality, integrity, legality, reliability, appropriateness, and intellectual property ownership or right to use of all submitted Content. We may monitor and review the Content in the Mobile Application submitted or created using our Services by you. You grant us permission to access, copy, distribute, store, transmit, reformat, display and perform the Content of your user account solely as required for the purpose of providing the Services to you. Without limiting any of those representations or warranties, we have the right, though not the obligation, to, in our own sole discretion, refuse or remove any Content that, in our reasonable opinion, violates any of our policies or is in any way harmful or objectionable. You also grant us the license to use, reproduce, adapt, modify, publish or distribute the Content created by you or stored in your user account for commercial, marketing or any similar purpose.&lt;/p&gt;
&lt;h2&gt;Adult content&lt;/h2&gt;
&lt;p&gt; Please be aware that there may be certain adult or mature content available in the Mobile Application. A warning will be shown to the User prior to adult content being displayed. Where there is mature or adult content, individuals who are less than 18 years of age or are not permitted to access such content under the laws of any applicable jurisdiction may not access such content. If we learn that anyone under the age of 18 seeks to conduct a transaction through the Services, we will require verified parental consent, in accordance with the Children's Online Privacy Protection Act of 1998 ("COPPA"). Certain areas of the Mobile Application and Services may not be available to children under 18 under any circumstances.&lt;/p&gt;
&lt;h2&gt;Backups&lt;/h2&gt;
&lt;p&gt; We perform regular backups of the Content and will do our best to ensure completeness and accuracy of these backups. In the event of the hardware failure or data loss we will restore backups automatically to minimize the impact and downtime.&lt;/p&gt;
&lt;h2&gt;Links to other resources&lt;/h2&gt;
&lt;p&gt; Although the Mobile Application and Services may link to other resources (such as websites, mobile applications, etc.), we are not, directly or indirectly, implying any approval, association, sponsorship, endorsement, or affiliation with any linked resource, unless specifically stated herein. Some of the links in the Mobile Application may be "affiliate links". This means if you click on the link and purchase an item, the Operator will receive an affiliate commission. We are not responsible for examining or evaluating, and we do not warrant the offerings of, any businesses or individuals or the content of their resources. We do not assume any responsibility or liability for the actions, products, services, and content of any other third parties. You should carefully review the legal statements and other conditions of use of any resource which you access through a link in the Mobile Application and Services. Your linking to any other off-site resources is at your own risk.&lt;/p&gt;
&lt;h2&gt;Prohibited uses&lt;/h2&gt;
&lt;p&gt; In addition to other terms as set forth in the Agreement, you are prohibited from using the Mobile Application and Services or Content: (a) for any unlawful purpose; (b) to solicit others to perform or participate in any unlawful acts; (c) to violate any international, federal, provincial or state regulations, rules, laws, or local ordinances; (d) to infringe upon or violate our intellectual property rights or the intellectual property rights of others; (e) to harass, abuse, insult, harm, defame, slander, disparage, intimidate, or discriminate based on gender, sexual orientation, religion, ethnicity, race, age, national origin, or disability; (f) to submit false or misleading information; (g) to upload or transmit viruses or any other type of malicious code that will or may be used in any way that will affect the functionality or operation of the Mobile Application and Services, third party products and services, or the Internet; (h) to spam, phish, pharm, pretext, spider, crawl, or scrape; (i) for any obscene or immoral purpose; or (j) to interfere with or circumvent the security features of the Mobile Application and    Services, third party products and services, or the Internet. We reserve the right to terminate your use of the Mobile Application and Services for violating any of the prohibited uses.&lt;/p&gt;
&lt;h2&gt;Intellectual property rights&lt;/h2&gt;
&lt;p&gt;"Intellectual Property Rights" means all present and future rights conferred by statute, common law or equity in or in relation to any copyright and related rights, trademarks, designs, patents, inventions, goodwill and the right to sue for passing off, rights to inventions, rights to use, and all other intellectual property rights, in each case whether registered or unregistered and including all applications and rights to apply for and be granted, rights to claim priority from, such rights and all similar or equivalent rights or forms of protection and any other results of intellectual activity which subsist or will subsist now or in the future in any part of the world. This Agreement does not transfer to you any intellectual property owned by the Operator or third parties, and all rights, titles, and interests in and to such property will remain (as between the parties) solely with the Operator. All trademarks, service marks, graphics and logos used in connection with the Mobile Application and Services, are trademarks or registered trademarks of the Operator or its licensors. Other trademarks, service marks, graphics and logos used in connection with the Mobile Application and Services may be the trademarks of other third parties. Your use of the Mobile Application and Services grants you no right or license to reproduce or otherwise use any of the Operator or third party trademarks.&lt;/p&gt;
&lt;h2&gt;Limitation of liability&lt;/h2&gt;
&lt;p&gt; To the fullest extent permitted by applicable law, in no event will the Operator, its affiliates, directors, officers, employees, agents, suppliers or licensors be liable to any person for any indirect, incidental, special, punitive, cover or consequential damages (including, without limitation, damages for lost profits, revenue, sales, goodwill, use of content, impact on business, business interruption, loss of anticipated savings, loss of business opportunity) however caused, under any theory of liability, including, without limitation, contract, tort, warranty, breach of statutory duty, negligence or otherwise, even if the liable party has been advised as to the possibility of such damages or could have foreseen such damages. To the maximum extent permitted by applicable law, the aggregate liability of the Operator and its affiliates, officers, employees, agents, suppliers and licensors relating to the services will be limited to an amount greater of one dollar or any amounts actually paid in cash by you to the Operator for the prior one month period prior to the first event or occurrence giving rise to such liability. The    limitations and exclusions also apply if this remedy does not fully compensate you for any losses or fails of its essential purpose.&lt;/p&gt;
&lt;h2&gt;Indemnification&lt;/h2&gt;
&lt;p&gt; You agree to indemnify and hold the Operator and its affiliates, directors, officers, employees, agents, suppliers and licensors harmless from and against any liabilities, losses, damages or costs, including reasonable attorneys' fees, incurred in connection with or arising from any third party allegations, claims, actions, disputes, or demands asserted against any of them as a result of or relating to your Content, your use of the Mobile Application and Services or any willful misconduct on your part.&lt;/p&gt;
&lt;h2&gt;Severability&lt;/h2&gt;
&lt;p&gt; All rights and restrictions contained in this Agreement may be exercised and shall be applicable and binding only to the extent that they do not violate any applicable laws and are intended to be limited to the extent necessary so that they will not render this Agreement illegal, invalid or unenforceable. If any provision or portion of any provision of this Agreement shall be held to be illegal, invalid or unenforceable by a court of competent jurisdiction, it is the intention of the parties that the remaining provisions or portions thereof shall constitute their agreement with respect to the subject matter hereof, and all such remaining provisions or portions thereof shall remain in full force and effect.&lt;/p&gt;
&lt;h2&gt;Dispute resolution&lt;/h2&gt;
&lt;p&gt; The formation, interpretation, and performance of this Agreement and any disputes arising out of it shall be governed by the substantive and procedural laws of Austria without regard to its rules on conflicts or choice of law and, to the extent applicable, the laws of Austria. The exclusive jurisdiction and venue for actions related to the subject matter hereof shall be the courts located in Austria, and you hereby submit to the personal jurisdiction of such courts. You hereby waive any right to a jury trial in any proceeding arising out of or related to this    Agreement. The United Nations Convention on Contracts for the International Sale of Goods does not apply to this Agreement.&lt;/p&gt;
&lt;h2&gt;Changes and amendments&lt;/h2&gt;
&lt;p&gt; We reserve the right to modify this Agreement or its terms relating to the Mobile Application and Services at any time, effective upon posting of an updated version of this Agreement in the Mobile Application. When we do, we will send you an email to notify you. Continued use of the Mobile Application and Services after any such changes shall constitute your consent to such changes.&lt;/p&gt;
&lt;h2&gt;Acceptance of these terms&lt;/h2&gt;
&lt;p&gt;You acknowledge that you have read this Agreement and agree to all its terms and conditions. By accessing and using the Mobile Application and Services you agree to be bound by this Agreement.If you do not agree to abide by the terms of this Agreement, you are not authorized to access or use the Mobile Application and Services. This terms and conditions policy was created with the <a target="_blank" href="/terms-and-conditions-generator">terms and conditions generator</a>.&lt;/p&gt;
&lt;h2&gt;Contacting us&lt;/h2&gt;<br>
&lt;p&gt;If you would like to contact us to understand more about this Policy or wish to contact us concerning any matter relating to our use of cookies<?php if($contacts == 'form') { echo ', you may do so via the '; echo $a -> contact_form ;} ?><?php if($contacts == 'email') { echo ', send an email to '; echo $a -> contact_email ;} ?><?php if($contacts == 'address') { echo ', write a letter to '; echo $a -> contact_address ;} ?>&lt;/p&gt;<br>
&lt;p&gt;This document was created on <?php echo $a -> created_at ; ?>&lt;/p&gt;<br>
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
               $platforms = $a -> platforms;
               $register = $a -> register;
               $monitor = $a -> monitor;
               $contacts = $a -> contacts;
         ?>
        <header id="header">
            <div class="container">
                <div class="row">
                    <div class="col-ms-12">
                      <h1>Terms and conditions for <?php if($platforms == 'Website URL') {echo $a -> website_url;} 
                        elseif($platforms == 'Mobile App Name') {echo $a -> mobile_name;} ?></h1>
                    </div>
                </div>
            </div>
        </header>
        <div id="container">
            <div class="container">
                <div class="row">
                    <div class="col-ms-12">
                        <article>
                           <h1>Terms and conditions</h1>
<?php if($platforms == 'Mobile App Name') {echo '
<p>These terms and conditions ("Agreement") set forth the general terms and conditions of your use of the '; echo $a -> mobile_name; echo '&nbsp mobile application ("Mobile Application" or "Service") and any of its related products and services (collectively, "Services"). This Agreement is legally binding between you ("User", "you" or "your") and this Mobile Application developer ("Operator", "we", "us" or "our"). By accessing and using the Mobile Application and Services, you acknowledge that you have read, understood, and agree to be bound by the terms of this Agreement. If you are entering
    into this Agreement on behalf of a business or other legal entity, you represent that you have the authority to bind such entity to this Agreement, in which case the terms "User", "you" or "your" shall refer to such entity. If you do not have such authority, or if you do not agree with the terms of this Agreement, you must not accept this Agreement and may not access and use the Mobile Application and Services. You acknowledge that this Agreement is a contract between you and the Operator, even though it is electronic and is not physically signed by you, and it governs your use of the Mobile Application and Services.</p> ';}
    elseif($platforms == 'Website URL') {echo '
    <p>These terms and conditions (&quot;Agreement&quot;) set forth the general terms and conditions of your use of the '; echo $a -> mobile_name; echo '&nbsp website (&quot;Website&quot; or &quot;Service&quot;) and any of its related products and services (collectively, &quot;Services&quot;). This Agreement is legally binding between you (&quot;User&quot;, &quot;you&quot; or &quot;your&quot;) and this Website operator (&quot;Operator&quot;, &quot;we&quot;, &quot;us&quot; or &quot;our&quot;). By accessing and using the Website and Services, you acknowledge that you have read, understood, and agree to be bound by the terms of this Agreement. If you are entering into this Agreement on behalf of a business or other legal entity, you represent that you have the authority to bind such entity to this Agreement, in which case the terms &quot;User&quot;, &quot;you&quot; or &quot;your&quot; shall refer to such entity. If you do not have such authority, or if you do not agree with the terms of this Agreement, you must not accept this Agreement and may not access and use the Website and Services. You acknowledge that this Agreement is a contract between you and the Operator, even though it is electronic and is not physically signed by you, and it governs your use of the Website and Services.</p> ';} ?>
<?php if($register == 1) {echo '
<h2>Accounts and membership</h2>
<p>You must be at least 18 years of age to use the Mobile Application and Services. By using the Mobile Application and Services and by agreeing to this Agreement you warrant and represent that you are at least 18 years of age. If you create an account in the Mobile Application, you are responsible for maintaining the security of your account and you are fully responsible for all activities that occur under the account and any other actions taken in connection with it. We may monitor and review new accounts before you may sign in and start using the Services. Providing false contact information of any kind may result in the termination of your account. You must immediately notify us of any unauthorized uses of your account or any other breaches of security.
    We will not be liable for any acts or omissions by you, including any damages of any kind incurred as a result of such acts or omissions.';} if($monitor == 1) {echo ' We may suspend, disable, or delete your account (or any part thereof) if we determine that you have violated any provision of this Agreement or that your conduct or content would tend to damage our reputation and goodwill. If we delete your account for the foregoing reasons, you may not re-register for our Services. We may block your email address and Internet protocol address to prevent further registration. ';} ?></p>
<h2>User content</h2>
<p>
    We do not own any data, information or material (collectively, "Content") that you submit in the Mobile Application in the course of using the Service. You shall have sole responsibility for
    the accuracy, quality, integrity, legality, reliability, appropriateness, and intellectual property ownership or right to use of all submitted Content. We may monitor and review the Content in
    the Mobile Application submitted or created using our Services by you. You grant us permission to access, copy, distribute, store, transmit, reformat, display and perform the Content of your
    user account solely as required for the purpose of providing the Services to you. Without limiting any of those representations or warranties, we have the right, though not the obligation, to,
    in our own sole discretion, refuse or remove any Content that, in our reasonable opinion, violates any of our policies or is in any way harmful or objectionable. You also grant us the license
    to use, reproduce, adapt, modify, publish or distribute the Content created by you or stored in your user account for commercial, marketing or any similar purpose.
</p>
<h2>Adult content</h2>
<p>
    Please be aware that there may be certain adult or mature content available in the Mobile Application. A warning will be shown to the User prior to adult content being displayed. Where there
    is mature or adult content, individuals who are less than 18 years of age or are not permitted to access such content under the laws of any applicable jurisdiction may not access such content.
    If we learn that anyone under the age of 18 seeks to conduct a transaction through the Services, we will require verified parental consent, in accordance with the Children's Online Privacy
    Protection Act of 1998 ("COPPA"). Certain areas of the Mobile Application and Services may not be available to children under 18 under any circumstances.
</p>
<h2>Backups</h2>
<p>
    We perform regular backups of the Content and will do our best to ensure completeness and accuracy of these backups. In the event of the hardware failure or data loss we will restore backups
    automatically to minimize the impact and downtime.
</p>
<h2>Links to other resources</h2>
<p>
    Although the Mobile Application and Services may link to other resources (such as websites, mobile applications, etc.), we are not, directly or indirectly, implying any approval, association,
    sponsorship, endorsement, or affiliation with any linked resource, unless specifically stated herein. Some of the links in the Mobile Application may be "affiliate links". This means if you
    click on the link and purchase an item, the Operator will receive an affiliate commission. We are not responsible for examining or evaluating, and we do not warrant the offerings of, any
    businesses or individuals or the content of their resources. We do not assume any responsibility or liability for the actions, products, services, and content of any other third parties. You
    should carefully review the legal statements and other conditions of use of any resource which you access through a link in the Mobile Application and Services. Your linking to any other
    off-site resources is at your own risk.
</p>
<h2>Prohibited uses</h2>
<p>
    In addition to other terms as set forth in the Agreement, you are prohibited from using the Mobile Application and Services or Content: (a) for any unlawful purpose; (b) to solicit others to
    perform or participate in any unlawful acts; (c) to violate any international, federal, provincial or state regulations, rules, laws, or local ordinances; (d) to infringe upon or violate our
    intellectual property rights or the intellectual property rights of others; (e) to harass, abuse, insult, harm, defame, slander, disparage, intimidate, or discriminate based on gender, sexual
    orientation, religion, ethnicity, race, age, national origin, or disability; (f) to submit false or misleading information; (g) to upload or transmit viruses or any other type of malicious
    code that will or may be used in any way that will affect the functionality or operation of the Mobile Application and Services, third party products and services, or the Internet; (h) to
    spam, phish, pharm, pretext, spider, crawl, or scrape; (i) for any obscene or immoral purpose; or (j) to interfere with or circumvent the security features of the Mobile Application and
    Services, third party products and services, or the Internet. We reserve the right to terminate your use of the Mobile Application and Services for violating any of the prohibited uses.
</p>
<h2>Intellectual property rights</h2>
<p>
    "Intellectual Property Rights" means all present and future rights conferred by statute, common law or equity in or in relation to any copyright and related rights, trademarks, designs,
    patents, inventions, goodwill and the right to sue for passing off, rights to inventions, rights to use, and all other intellectual property rights, in each case whether registered or
    unregistered and including all applications and rights to apply for and be granted, rights to claim priority from, such rights and all similar or equivalent rights or forms of protection and
    any other results of intellectual activity which subsist or will subsist now or in the future in any part of the world. This Agreement does not transfer to you any intellectual property owned
    by the Operator or third parties, and all rights, titles, and interests in and to such property will remain (as between the parties) solely with the Operator. All trademarks, service marks,
    graphics and logos used in connection with the Mobile Application and Services, are trademarks or registered trademarks of the Operator or its licensors. Other trademarks, service marks,
    graphics and logos used in connection with the Mobile Application and Services may be the trademarks of other third parties. Your use of the Mobile Application and Services grants you no right
    or license to reproduce or otherwise use any of the Operator or third party trademarks.
</p>
<h2>Limitation of liability</h2>
<p>
    To the fullest extent permitted by applicable law, in no event will the Operator, its affiliates, directors, officers, employees, agents, suppliers or licensors be liable to any person for any
    indirect, incidental, special, punitive, cover or consequential damages (including, without limitation, damages for lost profits, revenue, sales, goodwill, use of content, impact on business,
    business interruption, loss of anticipated savings, loss of business opportunity) however caused, under any theory of liability, including, without limitation, contract, tort, warranty, breach
    of statutory duty, negligence or otherwise, even if the liable party has been advised as to the possibility of such damages or could have foreseen such damages. To the maximum extent permitted
    by applicable law, the aggregate liability of the Operator and its affiliates, officers, employees, agents, suppliers and licensors relating to the services will be limited to an amount
    greater of one dollar or any amounts actually paid in cash by you to the Operator for the prior one month period prior to the first event or occurrence giving rise to such liability. The
    limitations and exclusions also apply if this remedy does not fully compensate you for any losses or fails of its essential purpose.
</p>
<h2>Indemnification</h2>
<p>
    You agree to indemnify and hold the Operator and its affiliates, directors, officers, employees, agents, suppliers and licensors harmless from and against any liabilities, losses, damages or
    costs, including reasonable attorneys' fees, incurred in connection with or arising from any third party allegations, claims, actions, disputes, or demands asserted against any of them as a
    result of or relating to your Content, your use of the Mobile Application and Services or any willful misconduct on your part.
</p>
<h2>Severability</h2>
<p>
    All rights and restrictions contained in this Agreement may be exercised and shall be applicable and binding only to the extent that they do not violate any applicable laws and are intended to
    be limited to the extent necessary so that they will not render this Agreement illegal, invalid or unenforceable. If any provision or portion of any provision of this Agreement shall be held
    to be illegal, invalid or unenforceable by a court of competent jurisdiction, it is the intention of the parties that the remaining provisions or portions thereof shall constitute their
    agreement with respect to the subject matter hereof, and all such remaining provisions or portions thereof shall remain in full force and effect.
</p>
<h2>Dispute resolution</h2>
<p>
    The formation, interpretation, and performance of this Agreement and any disputes arising out of it shall be governed by the substantive and procedural laws of Austria without regard to its
    rules on conflicts or choice of law and, to the extent applicable, the laws of Austria. The exclusive jurisdiction and venue for actions related to the subject matter hereof shall be the
    courts located in Austria, and you hereby submit to the personal jurisdiction of such courts. You hereby waive any right to a jury trial in any proceeding arising out of or related to this
    Agreement. The United Nations Convention on Contracts for the International Sale of Goods does not apply to this Agreement.
</p>
<h2>Changes and amendments</h2>
<p>
    We reserve the right to modify this Agreement or its terms relating to the Mobile Application and Services at any time, effective upon posting of an updated version of this Agreement in the
    Mobile Application. When we do, we will send you an email to notify you. Continued use of the Mobile Application and Services after any such changes shall constitute your consent to such
    changes.
</p>
<h2>Acceptance of these terms</h2>
<p>
    You acknowledge that you have read this Agreement and agree to all its terms and conditions. By accessing and using the Mobile Application and Services you agree to be bound by this Agreement.
    If you do not agree to abide by the terms of this Agreement, you are not authorized to access or use the Mobile Application and Services. This terms and conditions policy was created with the
    <a target="_blank" href="/terms-and-conditions-generator">terms and conditions generator</a>.
</p>
<h2>Contacting us</h2>
<p>If you would like to contact us to understand more about this Agreement or wish to contact us concerning any matter relating to it
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