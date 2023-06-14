@extends('layouts.master')

@section('acceptable-use-policy-12')

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <script async="" src="{{ asset('assets/js/app.js')}}" charset="UTF-8" crossorigin="*"></script>
        <script type="text/javascript" async="" src="{{ asset('assets/js/bat.js')}}"></script>
        <script type="text/javascript" async="" src="{{ asset('assets/js/analytics.js')}}"></script>
        <script type="text/javascript" async="" src="{{ asset('assets/js/js.js')}}"></script>
        <script type="text/javascript" async="" src="{{ asset('assets/js/analytics.js')}}"></script>
        <script async="" src="{{ asset('assets/js/default.js')}}" charset="UTF-8" crossorigin="*"></script>
        <script async="" src="{{ asset('assets/js/gtm.js')}}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            window.dataLayer.push({ stVar1: 3 }, { stVar3: 1 });
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
        <meta name="description" content="Create privacy policy, terms and conditions, refund policy and more for your website all in one place. Protect yourself and help your users feel secure." />
        <script src="{{ asset('assets/js/1611587689.js')}}"></script>
        <meta property="og:image" content="uploads/p/h/7/g/1y9eg2ur9hegs3x1s2nd.png" />
        <meta property="og:type" content="article" />
        <meta property="og:title" content="Bundle and Save!" />
        <meta property="og:description" content="Create privacy policy, terms and conditions, refund policy and more for your website all in one place. Protect yourself and help your users feel secure." />
        <meta property="og:url" content="bundle" />
        <meta name="twitter:image" content="uploads/p/h/7/g/1y9eg2ur9hegs3x1s2nd.png" />
        <meta name="twitter:card" content="summary" />
        <meta name="twitter:title" content="Bundle and Save!" />
        <meta name="twitter:description" content="Create privacy policy, terms and conditions, refund policy and more for your website all in one place. Protect yourself and help your users feel secure." />
        <meta name="twitter:url" content="bundle" />
        <link href="{{ asset ('assets/css/new.css')}}" rel="stylesheet" type="text/css" />
    </head>
<body class="guest create policies_bundle index">
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NS2X6F" height="0" width="0" style="display: none; visibility: hidden;"></iframe></noscript>
     <div class="section sub-hero">
        <div class="container">
            <div class="row">
                <div class="col-ms-12">
                    <h1>Review and confirm</h1>
                </div>
            </div>
        </div>
    </div>

<div id="container">
    <div class="container">
        <div class="row">
            <div id="content" class="col-ms-12">
                <div class="plugin-policies wizard aup step12" id="policies-wizard-summary">
                    <div class="row">
                        <div class="col-ms-12">
                            <div class="progress green stripes">
                                <div class="bar" style="width: 100%;">
                                    <div class="position">100%</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php $a = DB::table('policy')->where('unique_id', $id)->first(); ?>


                    <form id="" action="<?php if(isset(auth()->user()->admin) && auth()->user()->admin == 1){ echo 'complete?form-id='.$id; } elseif($a->premium == 1 || $a->company == 1 || $a->sell == 1 || $a->execute == 1 || $a->install == 1 || $a->bulk == 1 || $a->backup_fee == 1 || $a->actions == 1){ echo 'billing?form-id='.$id; } else{ echo 'complete?form-id='.$id; } ?>" method="post">
                        @csrf
                        <fieldset>                                    
                            <div class="control">
                                <label for="input_edit_wizard_key">
                                    <strong>
                                        <?php echo $a -> platforms; ?>
                                    </strong>
                                </label>

                                <div class="field">
                                  <?php if ($a->platforms = 'Mobile App Name'){ echo $a -> mobile_name; }
                                    if ($a->platforms = 'Website URL'){ echo $a -> website_url;} ?>
                                </div>
                            </div>

                        <div class="field">
                            <?php if($a->premium == 1 || $a->company == 1 || $a->sell == 1 || $a->execute == 1 || 
                            $a->install == 1 || $a->bulk == 1 || $a->backup_fee == 1 || $a->actions == 1){ ?>
                            <input type="hidden" name="url" value="<?php echo 'acceptable-use-premium-policy?form-id='.$id ?>" />
                            <input type="hidden" name="link" value="<?php echo 'billing?form-id='.$id ?>" />
                            <input type="hidden" name="type" value="Premium" />          
                            <?php } else { ?>
                            <input type="hidden" name="url" value="<?php echo 'acceptable-use-basic-policy?form-id='.$id ?>" />
                            <input type="hidden" name="link" value="<?php echo 'acceptable-use-basic-policy?form-id='.$id ?>" />
                            <input type="hidden" name="type" value="Basic" /> 
                            <?php } ?>
                        </div>

                            <div class="control">
                                <label for="input_edit_wizard_email"> Your email address </label>

                                <div class="field">
                                    <input class="text email input-md" id="input_edit_wizard_email" maxlength="255" type="text" name="email" value="" />

                                    <span class="help">You will receive your acceptable use policy to this email address</span>
                                </div>  
                                @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror                                      
                            </div>
                            @guest
                                    <div class="control">
                                        <label for="input_edit_wizard_email"> Set Your Password </label>

                                        <div class="field">
                                            <input class="text email input-md" id="input_edit_wizard_email" maxlength="255" type="password" name="password" value="" />
                                        </div>
                                    </div>
                                    @endguest
                            <div class="control">
                                <div class="field">
                                    <div class="checkbox inline">
                                        <input class="checkbox" id="input_edit_wizard_terms" type="checkbox" name="terms" value="1" />
                                        <label for="input_edit_wizard_terms"> I have read and agree to the <a target="_blank" href="legal">terms of service</a>. </label>
                                    </div>
                                </div>
                            </div>
                            <div class="control actions">
                                <input class="button submit next" type="submit" name="submit" value="Create My Acceptable Policy" />
                                <a class="back" href="acceptable-use-policy-11">Back</a>
                            </div>
                        </fieldset>
                        <input type="hidden" name="do_wizard" value="1" />
                    </form>                            
                </div>                       
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('assets/js/aup.min.js')}}"></script>    
<script>
      function duplicateEmail(element){
        var email = $(element).val();
        $.ajax({
            type: "POST",
            url: '{{url('checkemail')}}',
            data: {email:email},
            dataType: "json",
            success: function(res) {
                if(res.exists){
                    alert('true');
                }else{
                    alert('false');
                }
            },
            error: function (jqXHR, exception) {

            }
        });
    }
</script>   
</body>
</html>

@endsection