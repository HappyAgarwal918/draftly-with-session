@extends('layouts.master')

@section('privacy-basic-policy')

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
            window.dataLayer.push({ stVar3: 1 }, { isLoggedIn: "true" }, { event: "policiesWizard", eventCategory: "privacy policy wizard", eventAction: "complete questionnaire", eventLabel: "privacy policy" });
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
        <meta name="description" content="" />
        <link href="{{ asset ('assets/css/1611587689.css')}}" rel="stylesheet" type="text/css" />
        <script src="{{ asset ('assets/js/1611587689.js')}}"></script>
        <style>
            @media print {
                #ghostery-tracker-tally {
                    display: none !important;
                }
            }
        </style>
        <script src="{{ asset ('assets/js/clipboard.min.js')}}"></script>
        <script>
            _gscq.push(["targeting", "policyActive", "1"]);
        </script>
        <meta property="og:image" content="uploads/p/h/7/g/1y9eg2ur9hegs3x1s2nd.png" />
        <meta name="twitter:image" content="uploads/p/h/7/g/1y9eg2ur9hegs3x1s2nd.png" />
        <script src="{{ asset ('assets/js/embed.js')}}" id="app-convertbox-script" async="" data-uuid="1d8ce409-0f9c-438e-9982-7a7af22a83ed"></script>
        <script src="{{ asset ('assets/js/polyfill.min.js')}}"></script>
        <script src="{{ asset ('assets/js/embed-core.js')}}"></script>
       
        
        <script src="{{ asset('assets/js/tawk.js')}}"></script>
    </head>
    
    <body class="session policies edit">
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NS2X6F" height="0" width="0" style="display: none; visibility: hidden;"></iframe></noscript>

        <?php $id = $_GET['form-id'];  
            $a = DB::table('policy')->where('unique_id', $id)->first(); 
               $platforms = $a -> platforms;
               $register = $a -> register;
               $info_access = $a -> info_access;
               $info_delete = $a -> info_delete;
               $interact = $a -> interact;
               $contacts = $a -> contacts;
               $info_visible = $a -> info_visible;
               $publish = $a -> publish;
               $share = $a -> share;
               $sell = $a -> sell;
               $info = $a -> info;
               $california = $a -> california;
               $europe = $a -> europe;
               $teens = $a -> teens;
               $newsletters = $a -> newsletters;
               $newsletters_remote = $a -> newsletters_remote;
         ?>
       
        <div class="section sub-hero">
            <div class="container">
                <div class="row">
                    <div class="col-ms-12">
                        <h1>Privacy policy for <?php if($platforms == 'Website URL') {echo $a -> website_url;} 
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
                                            <h1>Privacy policy</h1>
<?php if($platforms == 'Mobile App Name') { echo '
 <p>This privacy policy ("Policy") describes how the personally identifiable information ("Personal Information") you may provide in the '; echo $a -> mobile_name; echo 'mobile application ("Mobile Application" or "Service") and any of its related products and services (collectively, "Services") is collected, protected and used. It also describes the choices available to you regarding our use of your Personal Information and how you can access and update this information. This Policy is a legally binding agreement between you ("User", "you" or "your") and this Mobile Application developer ("Operator", "we", "us" or "our"). By accessing and using the Mobile Application and Services, you acknowledge that you have read, understood, and agree to be bound by the terms of this Policy. This Policy does not apply to the practices of companies that we do not own or control, or to individuals that we do not employ or manage.</p>';}
 elseif ($platforms == 'Website URL') { echo '
     This privacy policy ("Policy") describes how the personally identifiable information ("Personal Information") you may provide on the '; echo $a -> website_url; echo ' website ("Website" or "Service") and any of its related products and services (collectively, "Services") is collected, protected and used. It also describes the choices available to you regarding our use of your Personal Information and how you can access and update this information. This Policy is a legally binding agreement between you ("User", "you" or "your") and this Website operator ("Operator", "we", "us" or "our"). By accessing and using the Website and Services, you acknowledge that you have read, understood, and agree to be bound by the terms of this Policy. This Policy does not apply to the practices of companies that we do not own or control, or to individuals that we do not employ or manage. ';} ?>
<?php if($register == 1){ echo "
 <h2>Automatic collection of information</h2>
 <p>When you use the Mobile Application, our servers automatically record information that your device sends. This data may include information such as your device's IP address and location, device name and version, operating system type and version, language preferences, information you search for in the Mobile Application, access times and dates, and other statistics.</p>
 <p>Information collected automatically is used only to identify potential cases of abuse and establish statistical information regarding the usage of the Mobile Application and Services. This
     statistical information is not otherwise aggregated in such a way that would identify any particular user of the system.</p> ";}
 else{ echo '
<h2>Collection of information</h2>
<p>Our top priority is customer data security and, as such, we exercise the no logs policy. We may process only minimal user data, only as much as it is absolutely necessary to maintain the Mobile Application and Services. Information collected automatically is used only to identify potential cases of abuse and establish statistical information regarding the usage of the Mobile Application and Services. This statistical information is not otherwise aggregated in such a way that would identify any particular user of the system.</p> ';} ?>
<?php if($info_access == 1) { echo '
<h2>Collection of personal information</h2>
<p>You can access and use the Mobile Application and Services without telling us who you are or revealing any information by which someone could identify you as a specific, identifiable individual. If, however, you wish to use some of the features in the Mobile Application, you may be asked to provide certain Personal Information (for example, your name and e-mail address). We receive and store any information you knowingly provide to us when you create an account, publish content, or fill any online forms in the Mobile Application. When required, this information may include the following:</p>
 <ul>
     <li>Personal details such as name, country of residence, etc.</li>
     <li>Contact information such as email address, address, etc.</li>
     <li>Account details such as user name, unique user ID, password, etc.</li>
     <li>Geolocation data such as latitude and longitude.</li>
     <li>Certain features on the mobile device such as contacts, calendar, gallery, etc.</li>
     <li>Information about other individuals such as your family members, friends, etc.</li>
     <li>Any other materials you willingly submit to us such as articles, images, feedback, etc.</li>
 </ul> ';} ?>
<?php if ($info_delete == 1) { echo '
 <p>Some of the information we collect is directly from you via the Mobile Application and Services. However, we may also collect Personal Information about you from other sources such as public databases and our joint marketing partners. You can choose not to provide us with your Personal Information, but then you may not be able to take advantage of some of the features in the Mobile Application. Users who are uncertain about what information is mandatory are welcome to contact us.</p> ';} ?>
<h2>Use and processing of collected information</h2>
<?php if ($interact == 1) { echo '
 <p>In order to make the Mobile Application and Services available to you, or to meet a legal obligation, we need to collect and use certain Personal Information. If you do not provide the information that we request, we may not be able to provide you with the requested products or services. Any of the information we collect from you may be used for the following purposes:</p>
<ul>
    <li>Create and manage user accounts</li>
    <li>Send administrative information</li>
    <li>Respond to inquiries and offer support</li>
    <li>Request user feedback</li>
    <li>Improve user experience</li>
    <li>Administer prize draws and competitions</li>
    <li>Enforce terms and conditions and policies</li>
    <li>Protect from abuse and malicious users</li>
    <li>Respond to legal requests and prevent harm</li>
    <li>Run and operate the Mobile Application and Services</li>
</ul> ';}
else { echo ' 
<p>In order to make the Mobile Application and Services available to you, or to meet a legal obligation, we need to collect and use certain Personal Information. If you do not provide the information that we request, we may not be able to provide you with the requested products or services. Any of the information we collect from you may be used to help us run and operate the mobile Application and Services.</p> ';} ?>
<p>Processing your Personal Information depends on how you interact with the Mobile Application and Services, where you are located in the world and if one of the following applies: (i) you have given your consent for one or more specific purposes; this, however, does not apply, whenever the processing of Personal Information is subject to California Consumer Privacy Act or European data protection law; (ii) provision of information is necessary for the performance of an agreement with you and/or for any pre-contractual obligations thereof; (iii) processing is necessary for compliance with a legal obligation to which you are subject; (iv) processing is related to a task that is carried out in the public interest or in the exercise of official authority vested
in us; (v) processing is necessary for the purposes of the legitimate interests pursued by us or by a third party.</p>
<p>Note that under some legislations we may be allowed to process information until you object to such processing (by opting out), without having to rely on consent or any other of the following legal bases below. In any case, we will be happy to clarify the specific legal basis that applies to the processing, and in particular whether the provision of Personal Information is a statutory or contractual requirement, or a requirement necessary to enter into a contract.</p>
<?php if($info_visible == 1) {echo '
<h2>Managing information</h2>
<p>You are able to delete certain Personal Information we have about you. The Personal Information you can delete may change as the Mobile Application and Services change. When you delete Personal Information, however, we may maintain a copy of the unrevised Personal Information in our records for the duration necessary to comply with our obligations to our affiliates and partners, and for the purposes described below. If you would like to delete your Personal Information or permanently delete your account, you can do so on the settings page of your account in the Mobile Application or simply by contacting us.</p> ';} ?>
<h2>Disclosure of information</h2>
<?php if($publish == 1) { echo '
 <p>Depending on the requested Services or as necessary to complete any transaction or provide any service you have requested, we may share your information with your consent with our trusted third parties that work with us, any other affiliates and subsidiaries we rely upon to assist in the operation of the Mobile Application and Services available to you. We do not share Personal Information with unaffiliated third parties. These service providers are not authorized to use or disclose your information except as necessary to perform services on our behalf or comply with legal requirements. We may share your Personal Information for these purposes only with third parties whose privacy policies are consistent with ours or who agree to abide by our policies with respect to Personal Information. These third parties are given Personal Information they need only in order to perform their designated functions, and we do not authorize them to use or disclose Personal Information for their own marketing or other purposes.</p> ';}
 else { echo '
 <p>The maintain the highest level of privacy and protecting your Personal Information to the full extent, we do not share your Personal Information with anyone and for any reason.</p> ';} ?>
<?php if($share == 1) { echo '
 <p> We will disclose any Personal Information we collect, use or receive if required or permitted by law, such as to comply with a subpoena, or similar legal process, and when we believe in good faith that disclosure is necessary to protect our rights, protect your safety or the safety of others, investigate fraud, or respond to a government request.</p> ';} ?>
<h2>Retention of information</h2>
<p>We will retain and use your Personal Information for the period necessary to comply with our legal obligations, resolve disputes, and enforce our agreements unless a longer retention period is required or permitted by law. We may use any aggregated data derived from or incorporating your Personal Information
after you update or delete it, but not in a manner that would identify you personally. Once the retention period expires, Personal Information shall be deleted. Therefore, the right to access, the right to erasure, the right to rectification and the right to data portability cannot be enforced after the expiration of the retention period.</p>
<?php if($sell == 1) {echo '
<h2>Transfer of information</h2>
<p>Depending on your location, data transfers may involve transferring and storing your information in a country other than your own. You are entitled to learn about the legal basis of information transfers to a country outside the European Union or to any international organization governed by public international law or set up by two or more countries, such as the UN, and about the security measures taken by us to safeguard your information. If any such transfer takes place, you can find out more by checking the relevant sections of this Policy or inquire with us using the information provided in the contact section.</p> ';} ?>
<h2>The rights of users</h2>
<p>You may exercise certain rights regarding your information processed by us. In particular, you have the right to do the following: (i) you have the right to withdraw consent where you have previously given your consent to the processing of your information; (ii) you have the right to object to the processing of your information if the processing is carried out on a legal basis other than consent; (iii) you have the right to learn if information is being processed by us, obtain disclosure regarding certain aspects of the processing and obtain a copy of the information undergoing processing; (iv) you have the right to verify the accuracy of your information and ask for it to be updated or corrected; (v) you have the right, under certain circumstances, to restrict the processing of your information, in which case, we will not process your information for any purpose other than storing it; (vi) you have the right, under certain circumstances, to obtain the erasure of your Personal Information from us; (vii) you have the right to receive your information in a structured, commonly used and machine readable format and, if technically feasible, to have it transmitted to another controller without any hindrance. This provision is applicable provided that your information is processed by automated means and that the processing is based on your consent, on a contract which you are part of or on pre-contractual obligations thereof.</p>
<?php if($info != 'null') {echo ' 
 <h2>The right to object to processing</h2>
 <p>Where Personal Information is processed for the public interest, in the exercise of an official authority vested in us or for the purposes of the legitimate interests pursued by us, you may object to such processing by providing a ground related to your particular situation to justify the objection.</p>
 <h2>Data protection rights under GDPR</h2>
 <p>If you are a resident of the European Economic Area (EEA), you have certain data protection rights and the Operator aims to take reasonable steps to allow you to correct, amend, delete, or limit the use of your Personal Information. If you wish to be informed what Personal Information we hold about you and if you want it to be removed from our systems, please contact us. In certain circumstances, you have the following data protection rights:</p>
 <ul>
     <li>You have the right to request access to your Personal Information that we store and have the ability to access your Personal Information.</li>
     <li>You have the right to request that we correct any Personal Information you believe is inaccurate. You also have the right to request us to complete the Personal Information you believe is incomplete.</li>
     <li>You have the right to request the erase your Personal Information under certain conditions of this Policy.</li>
     <li>You have the right to object to our processing of your Personal Information.</li>
     <li>You have the right to seek restrictions on the processing of your Personal Information. When you restrict the processing of your Personal Information, we may store it but will not process it further.</li>
     <li>You have the right to be provided with a copy of the information we have on you in a structured, machine-readable and commonly used format.</li>
     <li>You also have the right to withdraw your consent at any time where the Operator relied on your consent to process your Personal Information.</li>
 </ul>
 <p>You have the right to complain to a Data Protection Authority about our collection and use of your Personal Information. For more information, please contact your local data protection authority in the European Economic Area (EEA).</p> ';} ?>
<?php if($california == 1) { echo ' 
 <h2>California privacy rights</h2>
 <p>In addition to the rights as explained in this Policy, California residents who provide Personal Information (as defined in the statute) to obtain products or services for personal, family, or household use are entitled to request and obtain from us, once a calendar year, information about the Personal Information we shared, if any, with other businesses for marketing uses. If applicable, this information would include the categories of Personal Information and the names and addresses of those businesses with which we shared such personal information for the immediately prior calendar year (e.g., requests made in the current year will receive information about the prior year). To obtain this information please contact us.</p> ';} ?>
<?php if($europe == 1) { echo '
 <h2>How to exercise these rights</h2>
 <p>Any requests to exercise your rights can be directed to the Operator through the contact details provided in this document. Please note that we may ask you to verify your identity before responding to such requests. Your request must provide sufficient information that allows us to verify that you are the person you are claiming to be or that you are the authorized representative of such person. You must include sufficient details to allow us to properly understand the request and respond to it. We cannot respond to your request or provide you with Personal Information unless we first verify your identity or authority to make such a request and confirm that the Personal Information relates to you.</p> ';} ?>
<?php if($teens == 1) { echo "
 <h2>Privacy of children</h2>
 <p>We do not knowingly collect any Personal Information from children under the age of 18. If you are under the age of 18, please do not submit any Personal Information through the Mobile Application and Services. We encourage parents and legal guardians to monitor their children's Internet usage and to help enforce this Policy by instructing their children never to provide Personal Information through the Mobile Application and Services without their permission. If you have reason to believe that a child under the age of 18 has provided Personal Information to us through the Mobile Application and Services, please contact us. You must also be at least 16 years of age to consent to the processing of your Personal Information in your country (in some countries we may allow your parent or guardian to do so on your behalf).</p> ";} ?>
<?php if($newsletters == 1) { echo '
 <h2>Email marketing</h2>
 <p>We offer electronic newsletters to which you may voluntarily subscribe at any time. We are committed to keeping your e-mail address confidential and will not disclose your email address to any third parties except as allowed in the information use and processing section or for the purposes of utilizing a third party provider to send such emails. We will maintain the information sent via e-mail in accordance with applicable laws and regulations.</p> ';} ?>
<?php if($newsletters_remote == 1) { echo '
 <p>In compliance with the CAN-SPAM Act, all e-mails sent from us will clearly state who the e-mail is from and provide clear information on how to contact the sender. You may choose to stop receiving our newsletter or marketing emails by following the unsubscribe instructions included in these emails or by contacting us. However, you will continue to receive essential transactional emails.</p> ';} ?>
<h2>Links to other resources</h2>
<p>The Mobile Application and Services contain links to other resources that are not owned or controlled by us. Please be aware that we are not responsible for the privacy practices of such other resources or third parties. We encourage you to be aware when you leave the Mobile Application and Services and to read the privacy statements of each and every resource that may collect Personal Information.</p>
<h2>Information security</h2>
<p>We secure information you provide on computer servers in a controlled, secure environment, protected from  unauthorized access, use, or disclosure. We maintain reasonable administrative, technical, and physical safeguards in an effort to protect against unauthorized access, use, modification, and disclosure of Personal Information in its control and custody. However, no data transmission over the Internet or wireless network can be guaranteed. Therefore, while we strive to protect your Personal Information, you acknowledge that (i) there are security and privacy limitations of the Internet which are beyond our control; (ii) the security, integrity, and privacy of any and all information and data exchanged between you and the Mobile Application and
Services cannot be guaranteed; and (iii) any such information and data may be viewed or tampered with in transit by a third party, despite best efforts.</p>
<h2>Data breach</h2>
<p>In the event we become aware that the security of the Mobile Application and Services has been compromised or users Personal Information has been disclosed to unrelated third parties as a result of external activity, including, but not limited to, security attacks or fraud, we reserve the right to take reasonably appropriate measures, including, but not limited to, investigation and reporting, as well as notification to and cooperation with law enforcement authorities. In the event of a data breach, we will make reasonable efforts to notify affected individuals if we believe that there is a reasonable risk of harm to the user as a result of the breach or if notice is otherwise required by law. When we do, we will send you an email.</p>
<h2>Changes and amendments</h2>
<p>We reserve the right to modify this Policy or its terms relating to the Mobile Application and Services from time to time in our discretion and will notify you of any material changes to the way in which we treat Personal Information. When we do, we will send you an email to notify you. We may also provide notice to you in other ways in our discretion, such as through contact information you have provided. Any updated version of this Policy will be effective immediately upon the posting of the revised Policy unless otherwise specified. Your continued use of the Mobile Application and Services after the effective date of the revised Policy (or such other act specified at that time) will constitute your consent to those changes. However, we will not,
without your consent, use your Personal Information in a manner materially different than what was stated at the time your Personal Information was collected.</p>
<h2>Acceptance of this policy</h2>
<p>You acknowledge that you have read this Policy and agree to all its terms and conditions. By accessing and using the Mobile Application and Services you agree to be bound by this Policy. If you do not agree to abide by the terms of this Policy, you are not authorized to access or use the Mobile Application and Services. This privacy policy was created with the <a target="_blank" href="privacy-policy-generator">privacy policy generator</a>.</p>
<h2>Contacting us</h2>
<p>If you would like to contact us to understand more about this Policy or wish to contact us concerning any matter relating to individual rights and your Personal Information<?php if($contacts == 'form') { echo ', you may do so via the '; echo $a -> contact_form ;} ?><?php if($contacts == 'email') { echo ', send an email to '; echo $a -> contact_email ;} ?><?php if($contacts == 'address') { echo ', write a letter to '; echo $a -> contact_address ;} ?></p>
<p>This document was created on <?php echo $a -> created_at ; ?></p>
                                        </div>
                                        <h4 class="margin-bottom-small">Link to your policy (recommended)</h4>
                                        <p>We recommend linking to your policy directly from your app. We host it for free and it will ensure automatic updates and compliance with the latest requirements and regulations.</p>
                                        <h5 class="margin-bottom-small">Public link to your policy</h5>
                                        <pre class="link"><code id="policy-public-link">http://policies.imbuetech.in/privacy-basic-policy?form-id=<?php echo $id ?></code></pre>
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
                                            <li><a class="button" target="_blank" href="http://policies.imbuetech.in/privacy-basic-policy?form-id=<?php echo $id ?>">View policy</a></li>
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
&lt;h1&gt;Privacy policy&lt;h1&gt;
<?php if($platforms == 'Mobile App Name') { echo '
 &lt;p&gt;This privacy policy ("Policy") describes how the personally identifiable information ("Personal Information") you may provide in the '; echo $a -> mobile_name; echo 'mobile application ("Mobile Application" or "Service") and any of its related products and services (collectively, "Services") is collected, protected and used. It also describes the choices available to you regarding our use of your Personal Information and how you can access and update this information. This Policy is a legally binding agreement between you ("User", "you" or "your") and this Mobile Application developer ("Operator", "we", "us" or "our"). By accessing and using the Mobile Application and Services, you acknowledge that you have read, understood, and agree to be bound by the terms of this Policy. This Policy does not apply to the practices of companies that we do not own or control, or to individuals that we do not employ or manage.&lt;/p&gt;';}
 elseif ($platforms == 'Website URL') { echo '
    &lt;p&gt; This privacy policy ("Policy") describes how the personally identifiable information ("Personal Information") you may provide on the '; echo $a -> website_url; echo ' website ("Website" or "Service") and any of its related products and services (collectively, "Services") is collected, protected and used. It also describes the choices available to you regarding our use of your Personal Information and how you can access and update this information. This Policy is a legally binding agreement between you ("User", "you" or "your") and this Website operator ("Operator", "we", "us" or "our"). By accessing and using the Website and Services, you acknowledge that you have read, understood, and agree to be bound by the terms of this Policy. This Policy does not apply to the practices of companies that we do not own or control, or to individuals that we do not employ or manage. &lt;/p&gt;';} ?>
<?php if($register == 1){ echo "
 &lt;h2&gt;Automatic collection of information&lt;/h2&gt;
 &lt;p&gt;When you use the Mobile Application, our servers automatically record information that your device sends. This data may include information such as your device's IP address and location, device name and version, operating system type and version, language preferences, information you search for in the Mobile Application, access times and dates, and other statistics.&lt;/p&gt;
 &lt;p&gt;Information collected automatically is used only to identify potential cases of abuse and establish statistical information regarding the usage of the Mobile Application and Services. This
     statistical information is not otherwise aggregated in such a way that would identify any particular user of the system.&lt;/p&gt; ";}
 else{ echo '
&lt;h2&gt;Collection of information&lt;/h2&gt;
&lt;p&gt;Our top priority is customer data security and, as such, we exercise the no logs policy. We may process only minimal user data, only as much as it is absolutely necessary to maintain the Mobile Application and Services. Information collected automatically is used only to identify potential cases of abuse and establish statistical information regarding the usage of the Mobile Application and Services. This statistical information is not otherwise aggregated in such a way that would identify any particular user of the system.&lt;/p&gt; ';} ?>
<?php if($info_access == 1) { echo '
&lt;h2&gt;Collection of personal information&lt;/h2&gt;
&lt;p&gt;You can access and use the Mobile Application and Services without telling us who you are or revealing any information by which someone could identify you as a specific, identifiable individual. If, however, you wish to use some of the features in the Mobile Application, you may be asked to provide certain Personal Information (for example, your name and e-mail address). We receive and store any information you knowingly provide to us when you create an account, publish content, or fill any online forms in the Mobile Application. When required, this information may include the following:&lt;/p&gt;
 &lt;ul&gt;
     &lt;li&gt;Personal details such as name, country of residence, etc.&lt;/li&gt;
     &lt;li&gt;Contact information such as email address, address, etc.&lt;/li&gt;
     &lt;li&gt;Account details such as user name, unique user ID, password, etc.&lt;/li&gt;
     &lt;li&gt;Geolocation data such as latitude and longitude.&lt;/li&gt;
     &lt;li&gt;Certain features on the mobile device such as contacts, calendar, gallery, etc.&lt;/li&gt;
     &lt;li&gt;Information about other individuals such as your family members, friends, etc.&lt;/li&gt;
     &lt;li&gt;Any other materials you willingly submit to us such as articles, images, feedback, etc.&lt;/li&gt;
 &lt;/ul&gt; ';} ?>
<?php if ($info_delete == 1) { echo '
 &lt;p&gt;Some of the information we collect is directly from you via the Mobile Application and Services. However, we may also collect Personal Information about you from other sources such as public databases and our joint marketing partners. You can choose not to provide us with your Personal Information, but then you may not be able to take advantage of some of the features in the Mobile Application. Users who are uncertain about what information is mandatory are welcome to contact us.&lt;/p&gt; ';} ?><br>
&lt;h2&gt;Use and processing of collected information&lt;/h2&gt;
<?php if ($interact == 1) { echo '
 &lt;p&gt;In order to make the Mobile Application and Services available to you, or to meet a legal obligation, we need to collect and use certain Personal Information. If you do not provide the information that we request, we may not be able to provide you with the requested products or services. Any of the information we collect from you may be used for the following purposes:&lt;/p&gt;
&lt;ul&gt;
    &lt;li&gt;Create and manage user accounts&lt;/li&gt;
    &lt;li&gt;Send administrative information&lt;/li&gt;
    &lt;li&gt;Respond to inquiries and offer support&lt;/li&gt;
    &lt;li&gt;Request user feedback&lt;/li&gt;
    &lt;li&gt;Improve user experience&lt;/li&gt;
    &lt;li&gt;Administer prize draws and competitions&lt;/li&gt;
    &lt;li&gt;Enforce terms and conditions and policies&lt;/li&gt;
    &lt;li&gt;Protect from abuse and malicious users&lt;/li&gt;
    &lt;li&gt;Respond to legal requests and prevent harm&lt;/li&gt;
    &lt;li&gt;Run and operate the Mobile Application and Services&lt;/li&gt;
&lt;/ul&gt; ';}
else { echo ' 
&lt;p&gt;In order to make the Mobile Application and Services available to you, or to meet a legal obligation, we need to collect and use certain Personal Information. If you do not provide the information that we request, we may not be able to provide you with the requested products or services. Any of the information we collect from you may be used to help us run and operate the mobile Application and Services.&lt;/p&gt; ';} ?> 
&lt;p&gt;Processing your Personal Information depends on how you interact with the Mobile Application and Services, where you are located in the world and if one of the following applies: (i) you have given your consent for one or more specific purposes; this, however, does not apply, whenever the processing of Personal Information is subject to California Consumer Privacy Act or European data protection law; (ii) provision of information is necessary for the performance of an agreement with you and/or for any pre-contractual obligations thereof; (iii) processing is necessary for compliance with a legal obligation to which you are subject; (iv) processing is related to a task that is carried out in the public interest or in the exercise of official authority vested
in us; (v) processing is necessary for the purposes of the legitimate interests pursued by us or by a third party.&lt;/p&gt;
&lt;p&gt;Note that under some legislations we may be allowed to process information until you object to such processing (by opting out), without having to rely on consent or any other of the following legal bases below. In any case, we will be happy to clarify the specific legal basis that applies to the processing, and in particular whether the provision of Personal Information is a statutory or contractual requirement, or a requirement necessary to enter into a contract.&lt;/p&gt;
<?php if($info_visible == 1) {echo '
&lt;h2&gt;Managing information&lt;/h2&gt;
&lt;p&gt;You are able to delete certain Personal Information we have about you. The Personal Information you can delete may change as the Mobile Application and Services change. When you delete Personal Information, however, we may maintain a copy of the unrevised Personal Information in our records for the duration necessary to comply with our obligations to our affiliates and partners, and for the purposes described below. If you would like to delete your Personal Information or permanently delete your account, you can do so on the settings page of your account in the Mobile Application or simply by contacting us.&lt;/p&gt; ';} ?> <br>
&lt;h2&gt;Disclosure of information&lt;/h2&gt;
<?php if($publish == 1) { echo '
 &lt;p&gt;Depending on the requested Services or as necessary to complete any transaction or provide any service you have requested, we may share your information with your consent with our trusted third parties that work with us, any other affiliates and subsidiaries we rely upon to assist in the operation of the Mobile Application and Services available to you. We do not share Personal Information with unaffiliated third parties. These service providers are not authorized to use or disclose your information except as necessary to perform services on our behalf or comply with legal requirements. We may share your Personal Information for these purposes only with third parties whose privacy policies are consistent with ours or who agree to abide by our policies with respect to Personal Information. These third parties are given Personal Information they need only in order to perform their designated functions, and we do not authorize them to use or disclose Personal Information for their own marketing or other purposes.&lt;/p&gt; ';}
 else { echo '
 &lt;p&gt;The maintain the highest level of privacy and protecting your Personal Information to the full extent, we do not share your Personal Information with anyone and for any reason.&lt;/p&gt; ';} ?>
<?php if($share == 1) { echo '
 &lt;p&gt; We will disclose any Personal Information we collect, use or receive if required or permitted by law, such as to comply with a subpoena, or similar legal process, and when we believe in good faith that disclosure is necessary to protect our rights, protect your safety or the safety of others, investigate fraud, or respond to a government request.&lt;/p&gt; ';} ?> <br>
&lt;h2&gt;Retention of information&lt;/h2&gt;
&lt;p&gt;We will retain and use your Personal Information for the period necessary to comply with our legal obligations, resolve disputes, and enforce our agreements unless a longer retention period is required or permitted by law. We may use any aggregated data derived from or incorporating your Personal Information
after you update or delete it, but not in a manner that would identify you personally. Once the retention period expires, Personal Information shall be deleted. Therefore, the right to access, the right to erasure, the right to rectification and the right to data portability cannot be enforced after the expiration of the retention period.&lt;/p&gt;
<?php if($sell == 1) {echo '
&lt;h2&gt;Transfer of information&lt;/h2&gt;
&lt;p&gt;Depending on your location, data transfers may involve transferring and storing your information in a country other than your own. You are entitled to learn about the legal basis of information transfers to a country outside the European Union or to any international organization governed by public international law or set up by two or more countries, such as the UN, and about the security measures taken by us to safeguard your information. If any such transfer takes place, you can find out more by checking the relevant sections of this Policy or inquire with us using the information provided in the contact section.&lt;/p&gt; ';} ?><br>
&lt;h2&gt;The rights of users&lt;/h2&gt;
&lt;p&gt;You may exercise certain rights regarding your information processed by us. In particular, you have the right to do the following: (i) you have the right to withdraw consent where you have previously given your consent to the processing of your information; (ii) you have the right to object to the processing of your information if the processing is carried out on a legal basis other than consent; (iii) you have the right to learn if information is being processed by us, obtain disclosure regarding certain aspects of the processing and obtain a copy of the information undergoing processing; (iv) you have the right to verify the accuracy of your information and ask for it to be updated or corrected; (v) you have the right, under certain circumstances, to restrict the processing of your information, in which case, we will not process your information for any purpose other than storing it; (vi) you have the right, under certain circumstances, to obtain the erasure of your Personal Information from us; (vii) you have the right to receive your information in a structured, commonly used and machine readable format and, if technically feasible, to have it transmitted to another controller without any hindrance. This provision is applicable provided that your information is processed by automated means and that the processing is based on your consent, on a contract which you are part of or on pre-contractual obligations thereof.&lt;/p&gt;
<?php if($info != 'null') {echo ' 
 &lt;h2&gt;The right to object to processing&lt;/h2&gt;
 &lt;p&gt;Where Personal Information is processed for the public interest, in the exercise of an official authority vested in us or for the purposes of the legitimate interests pursued by us, you may object to such processing by providing a ground related to your particular situation to justify the objection.&lt;/p&gt;
 &lt;h2&gt;Data protection rights under GDPR&lt;/h2&gt;
 &lt;p&gt;If you are a resident of the European Economic Area (EEA), you have certain data protection rights and the Operator aims to take reasonable steps to allow you to correct, amend, delete, or limit the use of your Personal Information. If you wish to be informed what Personal Information we hold about you and if you want it to be removed from our systems, please contact us. In certain circumstances, you have the following data protection rights:&lt;/p&gt;
 &lt;ul&gt;
     &lt;li&gt;You have the right to request access to your Personal Information that we store and have the ability to access your Personal Information.&lt;/li&gt;
     &lt;li&gt;You have the right to request that we correct any Personal Information you believe is inaccurate. You also have the right to request us to complete the Personal Information you believe is incomplete.&lt;/li&gt;
     &lt;li&gt;You have the right to request the erase your Personal Information under certain conditions of this Policy.&lt;/li&gt;
     &lt;li&gt;You have the right to object to our processing of your Personal Information.&lt;/li&gt;
     &lt;li&gt;You have the right to seek restrictions on the processing of your Personal Information. When you restrict the processing of your Personal Information, we may store it but will not process it further.&lt;/li&gt;
     &lt;li&gt;You have the right to be provided with a copy of the information we have on you in a structured, machine-readable and commonly used format.&lt;/li&gt;
     &lt;li&gt;You also have the right to withdraw your consent at any time where the Operator relied on your consent to process your Personal Information.&lt;/li&gt;
 &lt;/ul&gt;
 &lt;p&gt;You have the right to complain to a Data Protection Authority about our collection and use of your Personal Information. For more information, please contact your local data protection authority in the European Economic Area (EEA).&lt;/p&gt; ';} ?><br>
<?php if($california == 1) { echo ' 
 &lt;h2&gt;California privacy rights&lt;/h2&gt;
 &lt;p&gt;In addition to the rights as explained in this Policy, California residents who provide Personal Information (as defined in the statute) to obtain products or services for personal, family, or household use are entitled to request and obtain from us, once a calendar year, information about the Personal Information we shared, if any, with other businesses for marketing uses. If applicable, this information would include the categories of Personal Information and the names and addresses of those businesses with which we shared such personal information for the immediately prior calendar year (e.g., requests made in the current year will receive information about the prior year). To obtain this information please contact us.&lt;/p&gt; ';} ?><br>
<?php if($europe == 1) { echo '
 &lt;h2&gt;How to exercise these rights&lt;/h2&gt;
 &lt;p&gt;Any requests to exercise your rights can be directed to the Operator through the contact details provided in this document. Please note that we may ask you to verify your identity before responding to such requests. Your request must provide sufficient information that allows us to verify that you are the person you are claiming to be or that you are the authorized representative of such person. You must include sufficient details to allow us to properly understand the request and respond to it. We cannot respond to your request or provide you with Personal Information unless we first verify your identity or authority to make such a request and confirm that the Personal Information relates to you.&lt;/p&gt; ';} ?><br>
<?php if($teens == 1) { echo "
 &lt;h2&gt;Privacy of children&lt;/h2&gt;
 &lt;p&gt;We do not knowingly collect any Personal Information from children under the age of 18. If you are under the age of 18, please do not submit any Personal Information through the Mobile Application and Services. We encourage parents and legal guardians to monitor their children's Internet usage and to help enforce this Policy by instructing their children never to provide Personal Information through the Mobile Application and Services without their permission. If you have reason to believe that a child under the age of 18 has provided Personal Information to us through the Mobile Application and Services, please contact us. You must also be at least 16 years of age to consent to the processing of your Personal Information in your country (in some countries we may allow your parent or guardian to do so on your behalf).&lt;/p&gt; ";} ?><br>
<?php if($newsletters == 1) { echo '
 &lt;h2&gt;Email marketing&lt;/h2&gt;
 &lt;p&gt;We offer electronic newsletters to which you may voluntarily subscribe at any time. We are committed to keeping your e-mail address confidential and will not disclose your email address to any third parties except as allowed in the information use and processing section or for the purposes of utilizing a third party provider to send such emails. We will maintain the information sent via e-mail in accordance with applicable laws and regulations.&lt;/p&gt; ';} ?>
<?php if($newsletters_remote == 1) { echo '
 &lt;p&gt;In compliance with the CAN-SPAM Act, all e-mails sent from us will clearly state who the e-mail is from and provide clear information on how to contact the sender. You may choose to stop receiving our newsletter or marketing emails by following the unsubscribe instructions included in these emails or by contacting us. However, you will continue to receive essential transactional emails.&lt;/p&gt; ';} ?><br>
&lt;h2&gt;Links to other resources&lt;/h2&gt;
&lt;p&gt;The Mobile Application and Services contain links to other resources that are not owned or controlled by us. Please be aware that we are not responsible for the privacy practices of such other resources or third parties. We encourage you to be aware when you leave the Mobile Application and Services and to read the privacy statements of each and every resource that may collect Personal Information.&lt;/p&gt;
&lt;h2&gt;Information security&lt;/h2&gt;
&lt;p&gt;We secure information you provide on computer servers in a controlled, secure environment, protected from  unauthorized access, use, or disclosure. We maintain reasonable administrative, technical, and physical safeguards in an effort to protect against unauthorized access, use, modification, and disclosure of Personal Information in its control and custody. However, no data transmission over the Internet or wireless network can be guaranteed. Therefore, while we strive to protect your Personal Information, you acknowledge that (i) there are security and privacy limitations of the Internet which are beyond our control; (ii) the security, integrity, and privacy of any and all information and data exchanged between you and the Mobile Application and
Services cannot be guaranteed; and (iii) any such information and data may be viewed or tampered with in transit by a third party, despite best efforts.&lt;/p&gt;
&lt;h2&gt;Data breach&lt;/h2&gt;
&lt;p&gt;In the event we become aware that the security of the Mobile Application and Services has been compromised or users Personal Information has been disclosed to unrelated third parties as a result of external activity, including, but not limited to, security attacks or fraud, we reserve the right to take reasonably appropriate measures, including, but not limited to, investigation and reporting, as well as notification to and cooperation with law enforcement authorities. In the event of a data breach, we will make reasonable efforts to notify affected individuals if we believe that there is a reasonable risk of harm to the user as a result of the breach or if notice is otherwise required by law. When we do, we will send you an email.&lt;/p&gt;
&lt;h2&gt;Changes and amendments&lt;/h2&gt;
&lt;p&gt;We reserve the right to modify this Policy or its terms relating to the Mobile Application and Services from time to time in our discretion and will notify you of any material changes to the way in which we treat Personal Information. When we do, we will send you an email to notify you. We may also provide notice to you in other ways in our discretion, such as through contact information you have provided. Any updated version of this Policy will be effective immediately upon the posting of the revised Policy unless otherwise specified. Your continued use of the Mobile Application and Services after the effective date of the revised Policy (or such other act specified at that time) will constitute your consent to those changes. However, we will not,
without your consent, use your Personal Information in a manner materially different than what was stated at the time your Personal Information was collected.&lt;/p&gt;
&lt;h2&gt;Acceptance of this policy&lt;/h2&gt;
&lt;p&gt;You acknowledge that you have read this Policy and agree to all its terms and conditions. By accessing and using the Mobile Application and Services you agree to be bound by this Policy. If you do not agree to abide by the terms of this Policy, you are not authorized to access or use the Mobile Application and Services. This privacy policy was created with the &lt;a target="_blank" href="privacy-policy-generator"&gt;privacy policy generator&lt;/a&gt;.&lt;/p&gt;
&lt;h2&gt;Contacting us&lt;/h2&gt;
&lt;p&gt;If you would like to contact us to understand more about this Policy or wish to contact us concerning any matter relating to individual rights and your Personal Information<?php if($contacts == 'form') { echo ', you may do so via the '; echo $a -> contact_form ;} ?><?php if($contacts == 'email') { echo ', send an email to '; echo $a -> contact_email ;} ?><?php if($contacts == 'address') { echo ', write a letter to '; echo $a -> contact_address ;} ?>&lt;/p&gt;<br>
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
               $info_access = $a -> info_access;
               $info_delete = $a -> info_delete;
               $interact = $a -> interact;
               $contacts = $a -> contacts;
               $info_visible = $a -> info_visible;
               $publish = $a -> publish;
               $share = $a -> share;
               $sell = $a -> sell;
               $info = $a -> info;
               $california = $a -> california;
               $europe = $a -> europe;
               $teens = $a -> teens;
               $newsletters = $a -> newsletters;
               $newsletters_remote = $a -> newsletters_remote;
         ?>
        <header id="header">
            <div class="container">
                <div class="row">
                    <div class="col-ms-12">
                       <h1>Privacy policy for <?php if($platforms == 'Website URL') {echo $a -> website_url;} 
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
                          <h1>Privacy policy</h1>
<?php if($platforms == 'Mobile App Name') { echo '
 <p>This privacy policy ("Policy") describes how the personally identifiable information ("Personal Information") you may provide in the '; echo $a -> mobile_name; echo 'mobile application ("Mobile Application" or "Service") and any of its related products and services (collectively, "Services") is collected, protected and used. It also describes the choices available to you regarding our use of your Personal Information and how you can access and update this information. This Policy is a legally binding agreement between you ("User", "you" or "your") and this Mobile Application developer ("Operator", "we", "us" or "our"). By accessing and using the Mobile Application and Services, you acknowledge that you have read, understood, and agree to be bound by the terms of this Policy. This Policy does not apply to the practices of companies that we do not own or control, or to individuals that we do not employ or manage.</p>';}
 elseif ($platforms == 'Website URL') { echo '
     This privacy policy ("Policy") describes how the personally identifiable information ("Personal Information") you may provide on the '; echo $a -> website_url; echo ' website ("Website" or "Service") and any of its related products and services (collectively, "Services") is collected, protected and used. It also describes the choices available to you regarding our use of your Personal Information and how you can access and update this information. This Policy is a legally binding agreement between you ("User", "you" or "your") and this Website operator ("Operator", "we", "us" or "our"). By accessing and using the Website and Services, you acknowledge that you have read, understood, and agree to be bound by the terms of this Policy. This Policy does not apply to the practices of companies that we do not own or control, or to individuals that we do not employ or manage. ';} ?>
<?php if($register == 1){ echo "
 <h2>Automatic collection of information</h2>
 <p>When you use the Mobile Application, our servers automatically record information that your device sends. This data may include information such as your device's IP address and location, device name and version, operating system type and version, language preferences, information you search for in the Mobile Application, access times and dates, and other statistics.</p>
 <p>Information collected automatically is used only to identify potential cases of abuse and establish statistical information regarding the usage of the Mobile Application and Services. This
     statistical information is not otherwise aggregated in such a way that would identify any particular user of the system.</p> ";}
 else{ echo '
<h2>Collection of information</h2>
<p>Our top priority is customer data security and, as such, we exercise the no logs policy. We may process only minimal user data, only as much as it is absolutely necessary to maintain the Mobile Application and Services. Information collected automatically is used only to identify potential cases of abuse and establish statistical information regarding the usage of the Mobile Application and Services. This statistical information is not otherwise aggregated in such a way that would identify any particular user of the system.</p> ';} ?>
<?php if($info_access == 1) { echo '
<h2>Collection of personal information</h2>
<p>You can access and use the Mobile Application and Services without telling us who you are or revealing any information by which someone could identify you as a specific, identifiable individual. If, however, you wish to use some of the features in the Mobile Application, you may be asked to provide certain Personal Information (for example, your name and e-mail address). We receive and store any information you knowingly provide to us when you create an account, publish content, or fill any online forms in the Mobile Application. When required, this information may include the following:</p>
 <ul>
     <li>Personal details such as name, country of residence, etc.</li>
     <li>Contact information such as email address, address, etc.</li>
     <li>Account details such as user name, unique user ID, password, etc.</li>
     <li>Geolocation data such as latitude and longitude.</li>
     <li>Certain features on the mobile device such as contacts, calendar, gallery, etc.</li>
     <li>Information about other individuals such as your family members, friends, etc.</li>
     <li>Any other materials you willingly submit to us such as articles, images, feedback, etc.</li>
 </ul> ';} ?>
<?php if ($info_delete == 1) { echo '
 <p>Some of the information we collect is directly from you via the Mobile Application and Services. However, we may also collect Personal Information about you from other sources such as public databases and our joint marketing partners. You can choose not to provide us with your Personal Information, but then you may not be able to take advantage of some of the features in the Mobile Application. Users who are uncertain about what information is mandatory are welcome to contact us.</p> ';} ?>
<h2>Use and processing of collected information</h2>
<?php if ($interact == 1) { echo '
 <p>In order to make the Mobile Application and Services available to you, or to meet a legal obligation, we need to collect and use certain Personal Information. If you do not provide the information that we request, we may not be able to provide you with the requested products or services. Any of the information we collect from you may be used for the following purposes:</p>
<ul>
    <li>Create and manage user accounts</li>
    <li>Send administrative information</li>
    <li>Respond to inquiries and offer support</li>
    <li>Request user feedback</li>
    <li>Improve user experience</li>
    <li>Administer prize draws and competitions</li>
    <li>Enforce terms and conditions and policies</li>
    <li>Protect from abuse and malicious users</li>
    <li>Respond to legal requests and prevent harm</li>
    <li>Run and operate the Mobile Application and Services</li>
</ul> ';}
else { echo ' 
<p>In order to make the Mobile Application and Services available to you, or to meet a legal obligation, we need to collect and use certain Personal Information. If you do not provide the information that we request, we may not be able to provide you with the requested products or services. Any of the information we collect from you may be used to help us run and operate the mobile Application and Services.</p> ';} ?>
<p>Processing your Personal Information depends on how you interact with the Mobile Application and Services, where you are located in the world and if one of the following applies: (i) you have given your consent for one or more specific purposes; this, however, does not apply, whenever the processing of Personal Information is subject to California Consumer Privacy Act or European data protection law; (ii) provision of information is necessary for the performance of an agreement with you and/or for any pre-contractual obligations thereof; (iii) processing is necessary for compliance with a legal obligation to which you are subject; (iv) processing is related to a task that is carried out in the public interest or in the exercise of official authority vested
in us; (v) processing is necessary for the purposes of the legitimate interests pursued by us or by a third party.</p>
<p>Note that under some legislations we may be allowed to process information until you object to such processing (by opting out), without having to rely on consent or any other of the following legal bases below. In any case, we will be happy to clarify the specific legal basis that applies to the processing, and in particular whether the provision of Personal Information is a statutory or contractual requirement, or a requirement necessary to enter into a contract.</p>
<?php if($info_visible == 1) {echo '
<h2>Managing information</h2>
<p>You are able to delete certain Personal Information we have about you. The Personal Information you can delete may change as the Mobile Application and Services change. When you delete Personal Information, however, we may maintain a copy of the unrevised Personal Information in our records for the duration necessary to comply with our obligations to our affiliates and partners, and for the purposes described below. If you would like to delete your Personal Information or permanently delete your account, you can do so on the settings page of your account in the Mobile Application or simply by contacting us.</p> ';} ?>
<h2>Disclosure of information</h2>
<?php if($publish == 1) { echo '
 <p>Depending on the requested Services or as necessary to complete any transaction or provide any service you have requested, we may share your information with your consent with our trusted third parties that work with us, any other affiliates and subsidiaries we rely upon to assist in the operation of the Mobile Application and Services available to you. We do not share Personal Information with unaffiliated third parties. These service providers are not authorized to use or disclose your information except as necessary to perform services on our behalf or comply with legal requirements. We may share your Personal Information for these purposes only with third parties whose privacy policies are consistent with ours or who agree to abide by our policies with respect to Personal Information. These third parties are given Personal Information they need only in order to perform their designated functions, and we do not authorize them to use or disclose Personal Information for their own marketing or other purposes.</p> ';}
 else { echo '
 <p>The maintain the highest level of privacy and protecting your Personal Information to the full extent, we do not share your Personal Information with anyone and for any reason.</p> ';} ?>
<?php if($share == 1) { echo '
 <p> We will disclose any Personal Information we collect, use or receive if required or permitted by law, such as to comply with a subpoena, or similar legal process, and when we believe in good faith that disclosure is necessary to protect our rights, protect your safety or the safety of others, investigate fraud, or respond to a government request.</p> ';} ?>
<h2>Retention of information</h2>
<p>We will retain and use your Personal Information for the period necessary to comply with our legal obligations, resolve disputes, and enforce our agreements unless a longer retention period is required or permitted by law. We may use any aggregated data derived from or incorporating your Personal Information
after you update or delete it, but not in a manner that would identify you personally. Once the retention period expires, Personal Information shall be deleted. Therefore, the right to access, the right to erasure, the right to rectification and the right to data portability cannot be enforced after the expiration of the retention period.</p>
<?php if($sell == 1) {echo '
<h2>Transfer of information</h2>
<p>Depending on your location, data transfers may involve transferring and storing your information in a country other than your own. You are entitled to learn about the legal basis of information transfers to a country outside the European Union or to any international organization governed by public international law or set up by two or more countries, such as the UN, and about the security measures taken by us to safeguard your information. If any such transfer takes place, you can find out more by checking the relevant sections of this Policy or inquire with us using the information provided in the contact section.</p> ';} ?>
<h2>The rights of users</h2>
<p>You may exercise certain rights regarding your information processed by us. In particular, you have the right to do the following: (i) you have the right to withdraw consent where you have previously given your consent to the processing of your information; (ii) you have the right to object to the processing of your information if the processing is carried out on a legal basis other than consent; (iii) you have the right to learn if information is being processed by us, obtain disclosure regarding certain aspects of the processing and obtain a copy of the information undergoing processing; (iv) you have the right to verify the accuracy of your information and ask for it to be updated or corrected; (v) you have the right, under certain circumstances, to restrict the processing of your information, in which case, we will not process your information for any purpose other than storing it; (vi) you have the right, under certain circumstances, to obtain the erasure of your Personal Information from us; (vii) you have the right to receive your information in a structured, commonly used and machine readable format and, if technically feasible, to have it transmitted to another controller without any hindrance. This provision is applicable provided that your information is processed by automated means and that the processing is based on your consent, on a contract which you are part of or on pre-contractual obligations thereof.</p>
<?php if($info != 'null') {echo ' 
 <h2>The right to object to processing</h2>
 <p>Where Personal Information is processed for the public interest, in the exercise of an official authority vested in us or for the purposes of the legitimate interests pursued by us, you may object to such processing by providing a ground related to your particular situation to justify the objection.</p>
 <h2>Data protection rights under GDPR</h2>
 <p>If you are a resident of the European Economic Area (EEA), you have certain data protection rights and the Operator aims to take reasonable steps to allow you to correct, amend, delete, or limit the use of your Personal Information. If you wish to be informed what Personal Information we hold about you and if you want it to be removed from our systems, please contact us. In certain circumstances, you have the following data protection rights:</p>
 <ul>
     <li>You have the right to request access to your Personal Information that we store and have the ability to access your Personal Information.</li>
     <li>You have the right to request that we correct any Personal Information you believe is inaccurate. You also have the right to request us to complete the Personal Information you believe is incomplete.</li>
     <li>You have the right to request the erase your Personal Information under certain conditions of this Policy.</li>
     <li>You have the right to object to our processing of your Personal Information.</li>
     <li>You have the right to seek restrictions on the processing of your Personal Information. When you restrict the processing of your Personal Information, we may store it but will not process it further.</li>
     <li>You have the right to be provided with a copy of the information we have on you in a structured, machine-readable and commonly used format.</li>
     <li>You also have the right to withdraw your consent at any time where the Operator relied on your consent to process your Personal Information.</li>
 </ul>
 <p>You have the right to complain to a Data Protection Authority about our collection and use of your Personal Information. For more information, please contact your local data protection authority in the European Economic Area (EEA).</p> ';} ?>
<?php if($california == 1) { echo ' 
 <h2>California privacy rights</h2>
 <p>In addition to the rights as explained in this Policy, California residents who provide Personal Information (as defined in the statute) to obtain products or services for personal, family, or household use are entitled to request and obtain from us, once a calendar year, information about the Personal Information we shared, if any, with other businesses for marketing uses. If applicable, this information would include the categories of Personal Information and the names and addresses of those businesses with which we shared such personal information for the immediately prior calendar year (e.g., requests made in the current year will receive information about the prior year). To obtain this information please contact us.</p> ';} ?>
<?php if($europe == 1) { echo '
 <h2>How to exercise these rights</h2>
 <p>Any requests to exercise your rights can be directed to the Operator through the contact details provided in this document. Please note that we may ask you to verify your identity before responding to such requests. Your request must provide sufficient information that allows us to verify that you are the person you are claiming to be or that you are the authorized representative of such person. You must include sufficient details to allow us to properly understand the request and respond to it. We cannot respond to your request or provide you with Personal Information unless we first verify your identity or authority to make such a request and confirm that the Personal Information relates to you.</p> ';} ?>
<?php if($teens == 1) { echo "
 <h2>Privacy of children</h2>
 <p>We do not knowingly collect any Personal Information from children under the age of 18. If you are under the age of 18, please do not submit any Personal Information through the Mobile Application and Services. We encourage parents and legal guardians to monitor their children's Internet usage and to help enforce this Policy by instructing their children never to provide Personal Information through the Mobile Application and Services without their permission. If you have reason to believe that a child under the age of 18 has provided Personal Information to us through the Mobile Application and Services, please contact us. You must also be at least 16 years of age to consent to the processing of your Personal Information in your country (in some countries we may allow your parent or guardian to do so on your behalf).</p> ";} ?>
<?php if($newsletters == 1) { echo '
 <h2>Email marketing</h2>
 <p>We offer electronic newsletters to which you may voluntarily subscribe at any time. We are committed to keeping your e-mail address confidential and will not disclose your email address to any third parties except as allowed in the information use and processing section or for the purposes of utilizing a third party provider to send such emails. We will maintain the information sent via e-mail in accordance with applicable laws and regulations.</p> ';} ?>
<?php if($newsletters_remote == 1) { echo '
 <p>In compliance with the CAN-SPAM Act, all e-mails sent from us will clearly state who the e-mail is from and provide clear information on how to contact the sender. You may choose to stop receiving our newsletter or marketing emails by following the unsubscribe instructions included in these emails or by contacting us. However, you will continue to receive essential transactional emails.</p> ';} ?>
<h2>Links to other resources</h2>
<p>The Mobile Application and Services contain links to other resources that are not owned or controlled by us. Please be aware that we are not responsible for the privacy practices of such other resources or third parties. We encourage you to be aware when you leave the Mobile Application and Services and to read the privacy statements of each and every resource that may collect Personal Information.</p>
<h2>Information security</h2>
<p>We secure information you provide on computer servers in a controlled, secure environment, protected from  unauthorized access, use, or disclosure. We maintain reasonable administrative, technical, and physical safeguards in an effort to protect against unauthorized access, use, modification, and disclosure of Personal Information in its control and custody. However, no data transmission over the Internet or wireless network can be guaranteed. Therefore, while we strive to protect your Personal Information, you acknowledge that (i) there are security and privacy limitations of the Internet which are beyond our control; (ii) the security, integrity, and privacy of any and all information and data exchanged between you and the Mobile Application and
Services cannot be guaranteed; and (iii) any such information and data may be viewed or tampered with in transit by a third party, despite best efforts.</p>
<h2>Data breach</h2>
<p>In the event we become aware that the security of the Mobile Application and Services has been compromised or users Personal Information has been disclosed to unrelated third parties as a result of external activity, including, but not limited to, security attacks or fraud, we reserve the right to take reasonably appropriate measures, including, but not limited to, investigation and reporting, as well as notification to and cooperation with law enforcement authorities. In the event of a data breach, we will make reasonable efforts to notify affected individuals if we believe that there is a reasonable risk of harm to the user as a result of the breach or if notice is otherwise required by law. When we do, we will send you an email.</p>
<h2>Changes and amendments</h2>
<p>We reserve the right to modify this Policy or its terms relating to the Mobile Application and Services from time to time in our discretion and will notify you of any material changes to the way in which we treat Personal Information. When we do, we will send you an email to notify you. We may also provide notice to you in other ways in our discretion, such as through contact information you have provided. Any updated version of this Policy will be effective immediately upon the posting of the revised Policy unless otherwise specified. Your continued use of the Mobile Application and Services after the effective date of the revised Policy (or such other act specified at that time) will constitute your consent to those changes. However, we will not,
without your consent, use your Personal Information in a manner materially different than what was stated at the time your Personal Information was collected.</p>
<h2>Acceptance of this policy</h2>
<p>You acknowledge that you have read this Policy and agree to all its terms and conditions. By accessing and using the Mobile Application and Services you agree to be bound by this Policy. If you do not agree to abide by the terms of this Policy, you are not authorized to access or use the Mobile Application and Services. This privacy policy was created with the <a target="_blank" href="privacy-policy-generator">privacy policy generator</a>.</p>
<h2>Contacting us</h2>
<p>If you would like to contact us to understand more about this Policy or wish to contact us concerning any matter relating to individual rights and your Personal Information<?php if($contacts == 'form') { echo ', you may do so via the '; echo $a -> contact_form ;} ?><?php if($contacts == 'email') { echo ', send an email to '; echo $a -> contact_email ;} ?><?php if($contacts == 'address') { echo ', write a letter to '; echo $a -> contact_address ;} ?></p>
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