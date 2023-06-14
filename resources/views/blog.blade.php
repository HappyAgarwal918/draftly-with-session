@extends('layouts.master')

@section('blog')


<!DOCTYPE html>
<html lang="en" class="cb-customize-desktop chrome">
    <script type="text/javascript" async="" src="{{ asset('assets/js/bat.js')}}"></script>
    <script type="text/javascript" async="" src="{{ asset('assets/js/analytics.js')}}"></script>
    <script type="text/javascript" async="" src="{{ asset('assets/js/analytics.js')}}"></script>
    <script async="" src="{{ asset('assets/js/gtm.js')}}"></script>
   
    <body
        class="guest blog news index"
        bis_register="W3sibWFzdGVyIjp0cnVlLCJleHRlbnNpb25JZCI6ImVwcGlvY2VtaG1ubGJoanBsY2drb2ZjaWllZ29tY29uIiwiYWRibG9ja2VyU3RhdHVzIjp7IkRJU1BMQVkiOiJlbmFibGVkIiwiRkFDRUJPT0siOiJlbmFibGVkIiwiVFdJVFRFUiI6ImVuYWJsZWQifSwidmVyc2lvbiI6IjEuOC4wIiwic2NvcmUiOjEwODAwMH1d"
    >
       

        <div class="section sub-hero" bis_skin_checked="1">
            <div class="container" bis_skin_checked="1">
                <div class="row" bis_skin_checked="1">
                    <div class="col-ms-12" bis_skin_checked="1">
                        <h1>Blog</h1>
                    </div>
                </div>
            </div>
        </div>

        <?php $users = DB::table('posts')->orderBy('id', 'desc')->get(); ?>

        <div id="container" bis_skin_checked="1">
            <div class="container" bis_skin_checked="1">
                <div class="row" bis_skin_checked="1">
                    <div id="content" class="col-ms-12" bis_skin_checked="1">
                        <div class="plugin-news news-index split-view" bis_skin_checked="1">
                            <div class="content" bis_skin_checked="1">
                                <?php if(count($users)){
                                    foreach($users as $user){ ?>
                               <div class="col-ms-12 col-md-6 content-item infinitescroll-page-1" id="row-article-93" bis_skin_checked="1" style="height: 450px!important">
                                
                                            <figure class="news wide">
                                                <div class="image" bis_skin_checked="1">
                                                    <a class="image" href="/blogs?link=<?php echo $user->link ?>">
                                                        <img
                                                            alt="What Does DMCA Mean and Does DMCA Work?"
                                                            class="image lazyload gm-loaded gm-observing gm-observing-cb"
                                                            width="680"
                                                            height="357"
                                                            src="<?php echo $user->featured_image; ?>"
                                                            style="max-width: 390px; max-height: 206px;"
                                                            loading="lazy"
                                                        />
                                                    </a>
                                                </div>
                                            </figure>

                                            <header>
                                                <h2><a href="/blogs?link=<?php echo $user->link ?>"><?php echo $user->title; ?></a></h2>
                                            </header>

                                            <div class="article-text" bis_skin_checked="1">
                                                <p>
                                                    <?php echo substr($user->editor1 , '0','180'); ?>
                                                </p>
                                            </div>
                                            
                                        </div><?php }} ?>



                                        
                            </div>

                            <div class="sidebar" bis_skin_checked="1">
                                <div class="box generators" bis_skin_checked="1">
                                    <h5>Our current generators</h5>
                                    <ul class="list-icons square">
                                        <li>
                                            <a href="acceptable-use-policy-generator">Acceptable use policy</a>
                                        </li>
                                        <li>
                                            <a href="cookie-consent-banner-generator">Cookie consent banner</a>
                                        </li>
                                        <li>
                                            <a href="cookie-policy-generator">Cookie policy</a>
                                        </li>
                                        <li>
                                            <a href="disclaimer-generator">Disclaimer</a>
                                        </li>
                                        <li>
                                            <a href="dmca-policy-generator">DMCA policy</a>
                                        </li>
                                        <li>
                                            <a href="privacy-policy-generator">Privacy policy</a>
                                        </li>
                                        <li>
                                            <a href="refund-policy-generator">Refund policy</a>
                                        </li>
                                        <li>
                                            <a href="terms-and-conditions-generator">Terms and conditions</a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="box subscribe-box" bis_skin_checked="1">
                                    <div class="subscribe-form" bis_skin_checked="1">
                                        <p>Get updates on the latest legal requirements and regulations.</p>
                                        <p><a href="blog#cb8f647d18" class="button">Subscribe now</a></p>
                                        <p class="footer">Join 10,000+ subscribers</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

       
</html>


@endsection