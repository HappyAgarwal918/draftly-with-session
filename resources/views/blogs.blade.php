 @extends('layouts.master')

 @section('blogs')


<!DOCTYPE html>
<html lang="en" class="cb-customize-desktop chrome">
    <script type="text/javascript" async="" src="{{ asset('assets/js/bat.js')}}"></script>
    <script type="text/javascript" async="" src="{{ asset('assets/js/analytics.js')}}"></script>
    <script type="text/javascript" async="" src="{{ asset('assets/js/analytics.js')}}"></script>
    <script async="" src="{{ asset('assets/js/gtm.js')}}"></script>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <script>
            window.dataLayer = window.dataLayer || [];
            window.dataLayer.push({ stVar1: 3 }, { stVar3: 4 });
        </script>
        <link rel="dns-prefetch" href="https://www.google-analytics.com/" />
        <link rel="dns-prefetch" href="https://www.googletagmanager.com/" />
        <link rel="dns-prefetch" href="https://bat.bing.com/" />
        <link rel="dns-prefetch" href="https://cdn.gumlet.com/" />
        <link rel="dns-prefetch" href="https://websitepolicies.gumlet.io/" />
        <link rel="dns-prefetch" href="https://app.convertbox.com/" />
        <link rel="dns-prefetch" href="https://cdn.convertbox.com/" />       
        <script src="{{ asset('assets/js/1611587689.js')}}"></script>
        <script src="{{ asset('assets/js/gumlet.min.js')}}" async=""></script>
       <style type="text/css">
           img {
                max-width: fit-content;
            }
       </style>
    </head>

    <body>
        <div class="section sub-hero" bis_skin_checked="1">
            <div class="container" bis_skin_checked="1">
                <div class="row" bis_skin_checked="1">
                    <div class="col-ms-12" bis_skin_checked="1">
                        <span class="h1"> Blog </span>
                    </div>
                </div>
            </div>
        </div>
        <?php 
        $link = $_GET['link'];
    $user = DB::table('posts')->where('link', $link) -> first(); ?>

        <div id="container" bis_skin_checked="1">
            <div class="container" bis_skin_checked="1">
                <div class="row" bis_skin_checked="1">
                    <div id="content" class="col-ms-12" bis_skin_checked="1">
                        <div class="plugin-news news-view split-view" bis_skin_checked="1">
                            <div class="content" bis_skin_checked="1">
                                <div class="content-view" bis_skin_checked="1">
                                    <h1>{!! $user->title !!}</h1>

                                    <div class="content-article" bis_skin_checked="1">
                                        {!! $user->editor1 !!}
                                    </div>

                                    <div class="share-buttons" bis_skin_checked="1">
                                        <p class="italic">Don't forget to share this post!</p>
                                        <ul class="buttons">
                                            <li>
                                                <a
                                                    class="button icon-text facebook icon-social-facebook"
                                                    target="_blank"
                                                    href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.websitepolicies.com%2Fblog%2Fwhat-does-dmca-mean"
                                                >
                                                    <span>Facebook</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a
                                                    class="button icon-text linkedin icon-social-linkedin"
                                                    target="_blank"
                                                    href="https://www.linkedin.com/shareArticle?mini=true&amp;url=https%3A%2F%2Fwww.websitepolicies.com%2Fblog%2Fwhat-does-dmca-mean&amp;title=What+Does+DMCA+Mean+and+Does+DMCA+Work%3F"
                                                >
                                                    <span>LinkedIn</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a
                                                    class="button icon-text twitter icon-social-twitter"
                                                    target="_blank"
                                                    href="https://twitter.com/intent/tweet?url=https%3A%2F%2Fwww.websitepolicies.com%2Fblog%2Fwhat-does-dmca-mean&amp;text=What+Does+DMCA+Mean+and+Does+DMCA+Work%3F&amp;via=websitepolicies"
                                                >
                                                    <span>Twitter</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                    <ul class="article-info">
                                        <li class="date">
                                            Updated on January 26, 2021
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="sidebar" bis_skin_checked="1">
                                <div class="box generators" bis_skin_checked="1">
                                    <h5>Our current generators</h5>
                                    <ul class="list-icons square">
                                        <li>
                                            <a href="/acceptable-use-policy-generator">Acceptable use policy</a>
                                        </li>
                                        <li>
                                            <a href="/cookie-consent-banner-generator">Cookie consent banner</a>
                                        </li>
                                        <li>
                                            <a href="/cookie-policy-generator">Cookie policy</a>
                                        </li>
                                        <li>
                                            <a href="/disclaimer-generator">Disclaimer</a>
                                        </li>
                                        <li>
                                            <a href="/dmca-policy-generator">DMCA policy</a>
                                        </li>
                                        <li>
                                            <a href="/privacy-policy-generator">Privacy policy</a>
                                        </li>
                                        <li>
                                            <a href="/refund-policy-generator">Refund policy</a>
                                        </li>
                                        <li>
                                            <a href="/terms-and-conditions-generator">Terms and conditions</a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="box subscribe-box" bis_skin_checked="1">
                                    <div class="subscribe-form" bis_skin_checked="1">
                                        <p>Get updates on the latest legal requirements and regulations.</p>
                                        <p><a href="what-does-dmca-mean#cb8f647d18" class="button">Subscribe now</a></p>
                                        <p class="footer">Join 10,000+ subscribers</p>
                                    </div>
                                </div>

                                <!-- <div class="box articles" bis_skin_checked="1">
                                    <h5>More articles</h5>
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-ms-12 col-xs-6 col-sm-12 article" bis_skin_checked="1">
                                            <figure class="news wide">
                                                <div class="image" bis_skin_checked="1">
                                                    <a class="image" href="coppa-guide">
                                                        <img
                                                            alt="Guide to COPPA in Websites and Mobile Apps"
                                                            class="image lazyload gm-loaded gm-observing gm-observing-cb"
                                                            width="680"
                                                            height="357"
                                                            data-src="https://websitepolicies.gumlet.io/uploads/2/7/5/4/JW5U2UkNHvUpObzGvN3t_l.png"
                                                            src="/JW5U2UkNHvUpObzGvN3t_l.png"
                                                            style="max-width: 680px;"
                                                            loading="lazy"
                                                        />
                                                    </a>
                                                </div>
                                            </figure>
                                            <a class="title" href="coppa-guide">Guide to COPPA in Websites and Mobile Apps</a>
                                        </div>
                                        <div class="col-ms-12 col-xs-6 col-sm-12 article" bis_skin_checked="1">
                                            <figure class="news wide">
                                                <div class="image" bis_skin_checked="1">
                                                    <a class="image" href="data-protection-officer">
                                                        <img
                                                            alt="Who Needs a Data Protection Officer and Their Responsibilities"
                                                            class="image lazyload gm-loaded gm-observing gm-observing-cb"
                                                            width="680"
                                                            height="357"
                                                            data-src="https://websitepolicies.gumlet.io/uploads/w/a/z/w/yr11rqbjt28s8c8rs49m_l.png"
                                                            src="/yr11rqbjt28s8c8rs49m_l.png"
                                                            style="max-width: 680px;"
                                                            loading="lazy"
                                                        />
                                                    </a>
                                                </div>
                                            </figure>
                                            <a class="title" href="data-protection-officer">Who Needs a Data Protection Officer and Their Responsibilities</a>
                                        </div>
                                    </div>
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-ms-12 col-xs-6 col-sm-12 article" bis_skin_checked="1">
                                            <figure class="news wide">
                                                <div class="image" bis_skin_checked="1">
                                                    <a class="image" href="privacy-policy-mistakes" bis_size='{"x":119,"y":1269,"w":270,"h":19,"abs_x":119,"abs_y":1269}'>
                                                        <img
                                                            alt="Top 10 Privacy Policy Mistakes You Must Avoid"
                                                            class="image lazyload gm-loaded gm-observing gm-observing-cb"
                                                            width="680"
                                                            height="357"
                                                            data-src="https://websitepolicies.gumlet.io/uploads/y/6/k/z/v3axu1gf7qrmueflaq42_l.png"
                                                            src="/v3axu1gf7qrmueflaq42_l.png"
                                                            style="max-width: 680px; left: -10000px !important; position: absolute !important;"
                                                            loading="lazy"
                                                            bis_size='{"x":119,"y":1265,"w":270,"h":142,"abs_x":119,"abs_y":1265}'
                                                            bis_id="bn_bfgeptti5gugecyzu8e4nw"
                                                        />
                                                    </a>
                                                </div>
                                            </figure>
                                            <a class="title" href="privacy-policy-mistakes">Top 10 Privacy Policy Mistakes You Must Avoid</a>
                                        </div>
                                        <div class="col-ms-12 col-xs-6 col-sm-12 article" bis_skin_checked="1">
                                            <figure class="news wide">
                                                <div class="image" bis_skin_checked="1">
                                                    <a class="image" href="right-to-be-forgotten">
                                                        <img
                                                            alt="The Right to be Forgotten and the Best Way to Exercise it"
                                                            class="image lazyload gm-loaded gm-observing gm-observing-cb"
                                                            width="680"
                                                            height="357"
                                                            data-src="https://websitepolicies.gumlet.io/uploads/i/5/a/c/0wf3oa5z0pj8b75proqf_l.png"
                                                            src="/0wf3oa5z0pj8b75proqf_l.png"
                                                            style="max-width: 680px;"
                                                            loading="lazy"
                                                        />
                                                    </a>
                                                </div>
                                            </figure>
                                            <a class="title" href="right-to-be-forgotten">The Right to be Forgotten and the Best Way to Exercise it</a>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

@endsection