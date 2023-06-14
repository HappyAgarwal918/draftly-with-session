@extends('layouts.master')

@section('dmca-basic-policy')

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
            window.dataLayer.push({ stVar3: 1 }, { isLoggedIn: "true" });
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
        <script src="{{ asset ('assets/js/1611587689.js')}}"></script>
        <style>
            @media print {
                #ghostery-tracker-tally {
                    display: none !important;
                }
            }
        </style>
        <script src="clipboard.min.js')}}"></script>
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
            $fair_use = $a -> fair_use;
            $formatting = $a -> formatting;
            $court = $a -> court;
            $instructions = $a -> instructions;
            $actions = $a -> actions;
            $contacts = $a -> contacts;               
            ?>
        

        <div class="section sub-hero">
            <div class="container">
                <div class="row">
                    <div class="col-ms-12">
                        <h1>DMCA policy for <?php if($platforms == 'Website URL') {echo $a -> website_url;} 
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
            <h1>DMCA policy</h1>
            <p>
            <?php if($platforms == 'Website URL') { echo ' This Digital Millennium Copyright Act policy ("Policy") applies to the '; echo $a -> website_url; echo '&nbsp website ("Website" or "Service") and any of its related products and services (collectively, "Services") and outlines how this Website operator ("Operator", "we", "us" or "our") addresses copyright infringement notifications and how you ("you" or "your") may submit a copyright infringement complaint.';}

            elseif($platforms == 'Mobile App Name') { echo ' This Digital Millennium Copyright Act policy ("Policy") applies to the '; echo $a -> mobile_name; echo '&nbsp mobile application ("Mobile Application" or "Service") and any of its related products and services (collectively, "Services") and outlines how this Mobile Application developer ("Operator", "we", "us" or "our") addresses copyright infringement notifications and how you ("you" or "your") may submit a copyright infringement complaint.';} ?>
            </p>

            <p> Protection of intellectual property is of utmost importance to us and we ask our users and their authorized agents to do the same. It is our policy to expeditiously respond to clear
                notifications of alleged copyright infringement that comply with the United States Digital Millennium Copyright Act ("DMCA") of 1998, the text of which can be found at the U.S. Copyright
                Office <a target="_blank" href="https://www.copyright.gov/">website</a>. This DMCA policy was created with the
                <a target="_blank" href="dmca-policy-generator">DMCA policy generator</a>.
            </p>

            <h2>What to consider before submitting a copyright complaint</h2>

            <p><?php if($fair_use == 1) { echo ' Before submitting a copyright complaint to us, consider whether the use could be considered fair use. Fair use states that brief excerpts of copyrighted material may, under certain circumstances, be quoted verbatim for purposes such as criticism, news reporting, teaching, and research, without the need for permission from or payment to the copyright holder. ';} ?>
            </p>

            <p>Please note that if you are unsure whether the material you are reporting is in fact infringing, you may wish to contact an attorney before filing a notification with us.</p>
            <p>
                The DMCA requires you to provide your personal information in the copyright infringement notification. If you are concerned about the privacy of your personal information, you may wish to
                <a target="_blank" href="https://www.copyrighted.com/professional-takedowns">hire an agent</a> to report infringing material for you.
            </p>

            <h2>Notifications of infringement</h2>

            <?php if($formatting == 1) { echo '
            <p>If you are a copyright owner or an agent thereof, and you believe that any material available on our Services infringes your copyrights, then you may submit a written copyright infringement notification (&quot;Notification&quot;) using the contact details below pursuant to the DMCA. All such Notifications must comply with the DMCA requirements. You may refer to a <a target="_blank" href="">DMCA takedown notice generator</a> or other similar services to avoid making mistake and ensure compliance of your Notification.</p> ';} ?>
            <?php if($court == 1) { echo '
            <p>Filing a DMCA complaint is the start of a pre-defined legal process. Your complaint will be reviewed for accuracy, validity, and completeness. If your complaint has satisfied these requirements, our response may include the removal or restriction of access to allegedly infringing material. We may also require a court order from a court of competent jurisdiction, as determined by us in our sole discretion, before we take any action.</p> ';}
            else { echo ' <p>Filing a DMCA complaint is the start of a pre-defined legal process. Your complaint will be reviewed for accuracy, validity, and completeness. Our response may include the removal or restriction of access to allegedly infringing material.</p> ';} ?>

            <p>If we remove or restrict access to materials or terminate an account in response to a Notification of alleged infringement, we will make a good faith effort to contact the affected user with information concerning the removal or restriction of access.</p>

            <?php if ($instructions == 0) { echo '
            <p>Notwithstanding anything to the contrary contained in any portion of this Policy, the Operator reserves the right to take no action upon receipt of a DMCA copyright infringement notification if it fails to comply with all the requirements of the DMCA for such notifications.</p> ';} ?>

            <?php if ($actions == 1) { echo '
            <p>The process described in this Policy does not limit our ability to pursue any other remedies we may have to address suspected infringement.</p> ';} ?>
            

            <h2>Changes and amendments</h2>
            <p>
                We reserve the right to modify this Policy or its terms relating to the Website and Services at any time, effective upon posting of an updated version of this Policy on the Website. When we
                do, we will send you an email to notify you.
            </p>
            <h2>Reporting copyright infringement</h2>
            <p>If you would like to notify us of the infringing material or activity
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
        <pre class="link"><code id="policy-public-link">http://policies.imbuetech.in/dmca-basic-policy?form-id=<?php echo $id ?></code></pre>
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
            <li><a class="button" target="_blank" href="http://policies.imbuetech.in/dmca-basic-policy?form-id=<?php echo $id ?>">View policy</a></li>
        </ul>
        <div class="row">
            <div class="col-ms-12 hidden-xs">
                <h4>Copy the policy</h4>
                <p>
                    If you rather not link to the policy directly, you may copy
                    <a
                    onclick="$(&#39;#tabs .policy_html&#39;).click();$(&#39;#tabs .policy_html&#39;).click();return false;"
                        href=""
                    >
                        HTML code
                    </a>
                    or
                    <a
                    onclick="$(&#39;#tabs .policy_text&#39;).click();$(&#39;#tabs .policy_text&#39;).click();return false;"
                        href=""
                    >
                        plain text
                    </a>
                    of the policy to your website instead.
                </p>
            </div>
        </div>
    </div>
</div>
                                    
    <div id="html" class="tabcontent" style="display: none;">
                                        <div class="box">
                                            <pre id="policy-html-text">
&lt;h1&gt;DMCA policy&lt;/h1&gt;
&lt;p&gt;<?php if($platforms == 'Website URL') { echo ' This Digital Millennium Copyright Act policy ("Policy") applies to the '; echo $a -> website_url; echo '&nbsp website ("Website" or "Service") and any of its related products and services (collectively, "Services") and outlines how this Website operator ("Operator", "we", "us" or "our") addresses copyright infringement notifications and how you ("you" or "your") may submit a copyright infringement complaint.';}

elseif($platforms == 'Mobile App Name') { echo ' This Digital Millennium Copyright Act policy ("Policy") applies to the '; echo $a -> mobile_name; echo '&nbsp mobile application ("Mobile Application" or "Service") and any of its related products and services (collectively, "Services") and outlines how this Mobile Application developer ("Operator", "we", "us" or "our") addresses copyright infringement notifications and how you ("you" or "your") may submit a copyright infringement complaint.';} ?> 
&lt;p&gt;Protection of intellectual property is of utmost importance to us and we ask our users and their authorized agents to do the same. It is our policy to expeditiously respond to clear notifications of alleged copyright infringement that comply with the United States Digital Millennium Copyright Act (&amp;quot;DMCA&amp;quot;) of 1998, the text of which can be found at the U.S. Copyright Office &lt;a target="_blank" href="https://www.copyright.gov"&gt;website&lt;/a&gt;. This DMCA policy was created with the &lt;a target="_blank" href="dmca-policy-generator"&gt;DMCA policy generator&lt;/a&gt;.&lt;/p&gt;
&lt;h2&gt;What to consider before submitting a copyright complaint&lt;/h2&gt;
&lt;p&gt;<?php if($fair_use == 1) { echo ' Before submitting a copyright complaint to us, consider whether the use could be considered fair use. Fair use states that brief excerpts of copyrighted material may, under certain circumstances, be quoted verbatim for purposes such as criticism, news reporting, teaching, and research, without the need for permission from or payment to the copyright holder. ';} ?>&lt;/p&gt;
&lt;p&gt;Please note that if you are unsure whether the material you are reporting is in fact infringing, you may wish to contact an attorney before filing a notification with us.&lt;/p&gt;
&lt;p&gt;The DMCA requires you to provide your personal information in the copyright infringement notification. If you are concerned about the privacy of your personal information, you may wish to &lt;a target="_blank" href="https://www.copyrighted.com/professional-takedowns"&gt;hire an agent&lt;/a&gt; to report infringing material for you.&lt;/p&gt;
&lt;h2&gt;Notifications of infringement&lt;/h2&gt;
<?php if($formatting == 1) { echo '
&lt;p&gt;If you are a copyright owner or an agent thereof, and you believe that any material available on our Services infringes your copyrights, then you may submit a written copyright infringement notification (&quot;Notification&quot;) using the contact details below pursuant to the DMCA. All such Notifications must comply with the DMCA requirements. You may refer to a <a target="_blank" href="">DMCA takedown notice generator</a> or other similar services to avoid making mistake and ensure compliance of your Notification.&lt;p&gt; ';} ?>
<?php if($court == 1) { echo '
&lt;p&gt;Filing a DMCA complaint is the start of a pre-defined legal process. Your complaint will be reviewed for accuracy, validity, and completeness. If your complaint has satisfied these requirements, our response may include the removal or restriction of access to allegedly infringing material. We may also require a court order from a court of competent jurisdiction, as determined by us in our sole discretion, before we take any action.&lt;/p&gt; ';}
else { echo '&lt;p&gt;Filing a DMCA complaint is the start of a pre-defined legal process. Your complaint will be reviewed for accuracy, validity, and completeness. Our response may include the removal or restriction of access to allegedly infringing material.&lt;/p&gt; ';} ?>
&lt;p&gt;If we remove or restrict access to materials or terminate an account in response to a Notification of alleged infringement, we will make a good faith effort to contact the affected user with information concerning the removal or restriction of access.&lt;/p&gt;
<?php if ($instructions == 0) { echo '
&lt;p&gt;Notwithstanding anything to the contrary contained in any portion of this Policy, the Operator reserves the right to take no action upon receipt of a DMCA copyright infringement notification if it fails to comply with all the requirements of the DMCA for such notifications.&lt;/p&gt; ';} ?>
<?php if ($actions == 1) { echo '
&lt;p&gt;The process described in this Policy does not limit our ability to pursue any other remedies we may have to address suspected infringement.&lt;/p&gt; ';} ?>
&lt;h2&gt;Changes and amendments&lt;/h2&gt;
&lt;p&gt;We reserve the right to modify this Policy or its terms relating to the Website and Services at any time, effective upon posting of an updated version of this Policy on the Website. When we do, we will send you an email to notify you.&lt;/p&gt;
&lt;h2&gt;Reporting copyright infringement&lt;/h2&gt;
&lt;p&gt;If you would like to notify us of the infringing material or activity
            <?php if($contacts == 'form') { echo '
              , you may do so via the '; echo $a -> contact_form ;} ?>
              <?php if($contacts == 'email') { echo '
              , send an email to '; echo $a -> contact_email ;} ?>
              <?php if($contacts == 'address') { echo '
             , write a letter to '; echo $a -> contact_address ;} ?>&lt;/p&gt;
&lt;p&gt;This document was created on <?php echo $a -> created_at ; ?>&lt;/p&gt;
                                            </pre>
                                        </div>
                                        <h4 class="margin-bottom-small">Copy HTML code</h4>
                                        <p>If you rather not link to the policy directly, you may copy the HTML code of the policy directly to your website.</p>
                                        <ul class="buttons">
                                            <li>
                                                <a
                                                    id="policy-html-text-copy-button"
                                                    class="button copybtn"
                                                    onclick="return false;"
                                                    data-clipboard-target="#policy-html-text"
                                                    href=""
                                                >
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
            $fair_use = $a -> fair_use;
            $formatting = $a -> formatting;
            $court = $a -> court;
            $instructions = $a -> instructions;
            $actions = $a -> actions;
            $contacts = $a -> contacts;               
            ?>
        <header id="header">
            <div class="container">
                <div class="row">
                    <div class="col-ms-12">
                       <h1>DMCA policy for <?php if($platforms == 'Website URL') {echo $a -> website_url;} 
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
                            <h1>DMCA policy</h1>
            <p>
            <?php if($platforms == 'Website URL') { echo ' This Digital Millennium Copyright Act policy ("Policy") applies to the '; echo $a -> website_url; echo '&nbsp website ("Website" or "Service") and any of its related products and services (collectively, "Services") and outlines how this Website operator ("Operator", "we", "us" or "our") addresses copyright infringement notifications and how you ("you" or "your") may submit a copyright infringement complaint.';}

            elseif($platforms == 'Mobile App Name') { echo ' This Digital Millennium Copyright Act policy ("Policy") applies to the '; echo $a -> mobile_name; echo '&nbsp mobile application ("Mobile Application" or "Service") and any of its related products and services (collectively, "Services") and outlines how this Mobile Application developer ("Operator", "we", "us" or "our") addresses copyright infringement notifications and how you ("you" or "your") may submit a copyright infringement complaint.';} ?>
            </p>

            <p> Protection of intellectual property is of utmost importance to us and we ask our users and their authorized agents to do the same. It is our policy to expeditiously respond to clear
                notifications of alleged copyright infringement that comply with the United States Digital Millennium Copyright Act ("DMCA") of 1998, the text of which can be found at the U.S. Copyright
                Office <a target="_blank" href="https://www.copyright.gov/">website</a>. This DMCA policy was created with the
                <a target="_blank" href="dmca-policy-generator">DMCA policy generator</a>.
            </p>

            <h2>What to consider before submitting a copyright complaint</h2>

            <p><?php if($fair_use == 1) { echo ' Before submitting a copyright complaint to us, consider whether the use could be considered fair use. Fair use states that brief excerpts of copyrighted material may, under certain circumstances, be quoted verbatim for purposes such as criticism, news reporting, teaching, and research, without the need for permission from or payment to the copyright holder. ';} ?>
            </p>

            <p>Please note that if you are unsure whether the material you are reporting is in fact infringing, you may wish to contact an attorney before filing a notification with us.</p>
            <p>
                The DMCA requires you to provide your personal information in the copyright infringement notification. If you are concerned about the privacy of your personal information, you may wish to
                <a target="_blank" href="https://www.copyrighted.com/professional-takedowns">hire an agent</a> to report infringing material for you.
            </p>

            <h2>Notifications of infringement</h2>

            <?php if($formatting == 1) { echo '
            <p>If you are a copyright owner or an agent thereof, and you believe that any material available on our Services infringes your copyrights, then you may submit a written copyright infringement notification (&quot;Notification&quot;) using the contact details below pursuant to the DMCA. All such Notifications must comply with the DMCA requirements. You may refer to a <a target="_blank" href="">DMCA takedown notice generator</a> or other similar services to avoid making mistake and ensure compliance of your Notification.</p> ';} ?>
            <?php if($court == 1) { echo '
            <p>Filing a DMCA complaint is the start of a pre-defined legal process. Your complaint will be reviewed for accuracy, validity, and completeness. If your complaint has satisfied these requirements, our response may include the removal or restriction of access to allegedly infringing material. We may also require a court order from a court of competent jurisdiction, as determined by us in our sole discretion, before we take any action.</p> ';}
            else { echo ' <p>Filing a DMCA complaint is the start of a pre-defined legal process. Your complaint will be reviewed for accuracy, validity, and completeness. Our response may include the removal or restriction of access to allegedly infringing material.</p> ';} ?>

            <p>If we remove or restrict access to materials or terminate an account in response to a Notification of alleged infringement, we will make a good faith effort to contact the affected user with information concerning the removal or restriction of access.</p>

            <?php if ($instructions == 0) { echo '
            <p>Notwithstanding anything to the contrary contained in any portion of this Policy, the Operator reserves the right to take no action upon receipt of a DMCA copyright infringement notification if it fails to comply with all the requirements of the DMCA for such notifications.</p> ';} ?>

            <?php if ($actions == 1) { echo '
            <p>The process described in this Policy does not limit our ability to pursue any other remedies we may have to address suspected infringement.</p> ';} ?>
            

            <h2>Changes and amendments</h2>
            <p>
                We reserve the right to modify this Policy or its terms relating to the Website and Services at any time, effective upon posting of an updated version of this Policy on the Website. When we
                do, we will send you an email to notify you.
            </p>
            <h2>Reporting copyright infringement</h2>
            <p>If you would like to notify us of the infringing material or activity
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