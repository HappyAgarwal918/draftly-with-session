<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<link href="{{ asset('assets/css/1609791099.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/1611587689.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/bars-preview.css')}}" rel="stylesheet" />
<link href="{{ asset('assets/css/spectrum.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/cookieconsent.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/emojione.min.css')}}" rel="stylesheet" />
<link href="{{ asset('assets/css/css.css')}}" rel="stylesheet" type="text/css" />





<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


<link rel="icon" href="{{ asset('assets/images/legal-favicon.png')}}" type="image/gif" sizes="16x16">
<html lang="en" class="cb-customize-desktop chrome">
   

     <body>
      
        @include('layouts.header')
          @yield('index')
          @yield('create')
          @yield('login')
          @yield('content')
          @yield('pricing')
          @yield('testimonials')
          @yield('billing')
          @yield('payment')
          @yield('acceptable-use-policy-generator')
          @yield('cookie-consent-banner-generator')
          @yield('cookie-policy-generator')
          @yield('disclaimer-generator')
          @yield('dmca-policy-generator')
          @yield('privacy-policy-generator')
          @yield('refund-policy-generator')
          @yield('terms-and-conditions-generator')
          @yield('about')
          @yield('contact')
          @yield('bundle')
          @yield('legal')
          @yield('affiliates')
          @yield('signup')
          @yield('faq')
          @yield('partners')
          @yield('lostpass')
          @yield('resend')
          @yield('blog')
          @yield('blogs')
          @yield('acceptable-use-policy')
          @yield('acceptable-use-policy-2')
          @yield('acceptable-use-policy-3')
          @yield('acceptable-use-policy-4')
          @yield('acceptable-use-policy-5')
          @yield('acceptable-use-policy-6')
          @yield('acceptable-use-policy-7')
          @yield('acceptable-use-policy-8')
          @yield('acceptable-use-policy-9')
          @yield('acceptable-use-policy-10')
          @yield('acceptable-use-policy-11')
          @yield('acceptable-use-policy-12')
          @yield('cookie-policyy')
          @yield('cookie-policyy-2')
          @yield('cookie-policyy-3')
          @yield('cookie-policyy-4')
          @yield('cookie-policyy-5')
          @yield('cookie-policyy-6')
          @yield('cookie-policyy-7')
          @yield('cookie-policyy-8')
          @yield('cookie-policyy-9')
          @yield('disclaimer')
          @yield('disclaimer-2')
          @yield('disclaimer-3')
          @yield('disclaimer-4')
          @yield('disclaimer-5')
          @yield('disclaimer-6')
          @yield('disclaimer-7')
          @yield('disclaimer-8')
          @yield('disclaimer-9')
          @yield('disclaimer-10')
          @yield('disclaimer-11')
          @yield('disclaimer-12')
          @yield('dmca-policy')
          @yield('dmca-policy-2')
          @yield('dmca-policy-3')
          @yield('dmca-policy-4')
          @yield('dmca-policy-5')
          @yield('dmca-policy-6')
          @yield('dmca-policy-7')
          @yield('dmca-policy-8')
          @yield('privacy-policy')
          @yield('privacy-policy-2')
          @yield('privacy-policy-3')
          @yield('privacy-policy-4')
          @yield('privacy-policy-5')
          @yield('privacy-policy-6')
          @yield('privacy-policy-7')
          @yield('privacy-policy-8')
          @yield('privacy-policy-9')
          @yield('privacy-policy-10')
          @yield('privacy-policy-11')
          @yield('privacy-policy-12')
          @yield('privacy-policy-13')
          @yield('privacy-policy-14')
          @yield('privacy-policy-15')
          @yield('refund-policy')
          @yield('refund-policy-2')
          @yield('refund-policy-3')
          @yield('refund-policy-4')
          @yield('refund-policy-5')
          @yield('refund-policy-6')
          @yield('refund-policy-7')
          @yield('refund-policy-8')
          @yield('terms-and-conditions')
          @yield('terms-and-conditions-2')
          @yield('terms-and-conditions-3')
          @yield('terms-and-conditions-4')
          @yield('terms-and-conditions-5')
          @yield('terms-and-conditions-6')
          @yield('terms-and-conditions-7')
          @yield('terms-and-conditions-8')
          @yield('terms-and-conditions-9')
          @yield('terms-and-conditions-10')
          @yield('terms-and-conditions-11')
          @yield('acceptable-use-basic-policy')
          @yield('cookie-basic-policy')
          @yield('disclaimer-basic-policy')
          @yield('dmca-basic-policy')
          @yield('privacy-basic-policy')
          @yield('refund-basic-policy')
          @yield('terms-and-conditions-basic-policy')
          @yield('acceptable-use-premium-policy')
          @yield('cookie-premium-policy')
          @yield('disclaimer-premium-policy')
          @yield('dmca-premium-policy')
          @yield('privacy-premium-policy')
          @yield('refund-premium-policy')
          @yield('terms-and-conditions-premium-policy')
          @yield('complete')
          @yield('lifetime-deal')
          @yield('custom-clause')
          @yield('admin.User.Register')          
        @include('layouts.footer')


</body>


         
</html>
