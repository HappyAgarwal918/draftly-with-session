<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('index');
});

Route::get('/create', function () {
    return view('create');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/pricing', function () {
    return view('pricing');
});

Route::get('/testimonials', function () {
    return view('testimonials');
});



Route::get('/settings', function () {
    return view('settings');
});

Route::get('/cookie-consent-banner', function () {
    return view('cookie-consent-banner');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/bundle', function () {
    return view('bundle');
});

Route::get('/legal', function () {
    return view('legal');
});

Route::get('/affiliates', function () {
    return view('affiliates');
});

Route::get('/signup', function () {
    return view('signup');
});

Route::get('/faq', function () {
    return view('faq');
});

Route::get('/partners', function () {
    return view('partners');
});

Route::get('/lostpass', function () {
    return view('lostpass');
});

Route::get('/resend', function () {
    return view('resend');
});



/* ------------- Blog Policy Generator ------------- */

Route::get('/acceptable-use-policy-generator', function () {
    return view('acceptable-use-policy-generator'); });

Route::get('/cookie-consent-banner-generator', function () {
    return view('cookie-consent-banner-generator'); });

Route::get('/cookie-policy-generator', function () {
    return view('cookie-policy-generator'); });

Route::get('/disclaimer-generator', function () {
    return view('disclaimer-generator'); });

Route::get('/dmca-policy-generator', function () {
    return view('dmca-policy-generator'); });

Route::get('/privacy-policy-generator', function () {
    return view('privacy-policy-generator'); });

Route::get('/refund-policy-generator', function () {
    return view('refund-policy-generator'); });

Route::get('/terms-and-conditions-generator', function () {
    return view('terms-and-conditions-generator'); });



/* ------------- Blog Pages ------------- */

Route::get('/blog', function () {
    return view('blog');
});

Route::get('/blogs', function () {
    return view('/blogs'); });


/* ------------- Basic Policies ------------- */

Route::get('/acceptable-use-basic-policy', function () {
    return view('acceptable-use-basic-policy'); });

Route::get('/cookie-basic-policy', function () {
    return view('cookie-basic-policy'); });

Route::get('/disclaimer-basic-policy', function () {
    return view('disclaimer-basic-policy'); });

Route::get('/dmca-basic-policy', function () {
    return view('dmca-basic-policy'); });

Route::get('/privacy-basic-policy', function () {
    return view('privacy-basic-policy'); });

Route::get('/refund-basic-policy', function () {
    return view('refund-basic-policy'); });

Route::get('/terms-and-conditions-basic-policy', function () {
    return view('terms-and-conditions-basic-policy'); });



/* ------------- Premium Policies ------------- */

Route::get('/acceptable-use-premium-policy', function () {
    return view('acceptable-use-premium-policy'); });

Route::get('/cookie-premium-policy', function () {
    return view('cookie-premium-policy'); });

Route::get('/disclaimer-premium-policy', function () {
    return view('disclaimer-premium-policy'); });

Route::get('/dmca-premium-policy', function () {
    return view('dmca-premium-policy'); });

Route::get('/privacy-premium-policy', function () {
    return view('privacy-premium-policy'); });

Route::get('/refund-premium-policy', function () {
    return view('refund-premium-policy'); });

Route::get('/terms-and-conditions-premium-policy', function () {
    return view('terms-and-conditions-premium-policy'); });



/* ------------- Acceptable Use Policy ------------- */

Route::get('/acceptable-use-policy','UserController@acceptableindex');
Route::post('/acceptable-use-policy-2','UserController@acceptable');
Route::post('/acceptable-use-policy-3','UserController@acceptable1');
Route::post('/acceptable-use-policy-4','UserController@acceptable2');
Route::post('/acceptable-use-policy-5','UserController@acceptable3');
Route::post('/acceptable-use-policy-6','UserController@acceptable4');
Route::post('/acceptable-use-policy-7','UserController@acceptable5');
Route::post('/acceptable-use-policy-8','UserController@acceptable6');
Route::post('/acceptable-use-policy-9','UserController@acceptable7');
Route::post('/acceptable-use-policy-10','UserController@acceptable8');
Route::post('/acceptable-use-policy-11','UserController@acceptable9');
Route::post('/acceptable-use-policy-12','UserController@acceptable10');



/* ------------- Cookie Policy ------------- */

Route::get('/cookie-policyy','cookies@cookieindex');
Route::post('/cookie-policyy-2','cookies@cookie');
Route::post('/cookie-policyy-3','cookies@cookie1');
Route::post('/cookie-policyy-4','cookies@cookie2');
Route::post('/cookie-policyy-5','cookies@cookie3');
Route::post('/cookie-policyy-6','cookies@cookie4');
Route::post('/cookie-policyy-7','cookies@cookie5');
Route::post('/cookie-policyy-8','cookies@cookie6');
Route::post('/cookie-policyy-9','cookies@cookie7');



/* ------------- Disclaimer Policy ------------- */

Route::get('/disclaimer','disclaimers@disclaimerindex');
Route::post('/disclaimer-2','disclaimers@disclaimer');
Route::post('/disclaimer-3','disclaimers@disclaimer1');
Route::post('/disclaimer-4','disclaimers@disclaimer2');
Route::post('/disclaimer-5','disclaimers@disclaimer3');
Route::post('/disclaimer-6','disclaimers@disclaimer4');
Route::post('/disclaimer-7','disclaimers@disclaimer5');
Route::post('/disclaimer-8','disclaimers@disclaimer6');
Route::post('/disclaimer-9','disclaimers@disclaimer7');
Route::post('/disclaimer-10','disclaimers@disclaimer8');
Route::post('/disclaimer-11','disclaimers@disclaimer9');
Route::post('/disclaimer-12','disclaimers@disclaimer10');



/* ------------- DMCA Policy ------------- */

Route::get('/dmca-policy','dmcas@dmcaindex');
Route::post('/dmca-policy-2','dmcas@dmca');
Route::post('/dmca-policy-3','dmcas@dmca1');
Route::post('/dmca-policy-4','dmcas@dmca2');
Route::post('/dmca-policy-5','dmcas@dmca3');
Route::post('/dmca-policy-6','dmcas@dmca4');
Route::post('/dmca-policy-7','dmcas@dmca5');
Route::post('/dmca-policy-8','dmcas@dmca6');



/* ------------- Privacy Policy ------------- */

Route::get('/privacy-policy','privacys@privacyindex');
Route::post('/privacy-policy-2','privacys@privacy');
Route::post('/privacy-policy-3','privacys@privacy1');
Route::post('/privacy-policy-4','privacys@privacy2');
Route::post('/privacy-policy-5','privacys@privacy3');
Route::post('/privacy-policy-6','privacys@privacy4');
Route::post('/privacy-policy-7','privacys@privacy5');
Route::post('/privacy-policy-8','privacys@privacy6');
Route::post('/privacy-policy-9','privacys@privacy7');
Route::post('/privacy-policy-10','privacys@privacy8');
Route::post('/privacy-policy-11','privacys@privacy9');
Route::post('/privacy-policy-12','privacys@privacy10');
Route::post('/privacy-policy-13','privacys@privacy11');
Route::post('/privacy-policy-14','privacys@privacy12');



/* ------------- Refund Policy ------------- */

Route::get('/refund-policy','refunds@refundindex');
Route::post('/refund-policy-2','refunds@refund');
Route::post('/refund-policy-3','refunds@refund1');
Route::post('/refund-policy-4','refunds@refund2');
Route::post('/refund-policy-5','refunds@refund3');
Route::post('/refund-policy-6','refunds@refund4');
Route::post('/refund-policy-7','refunds@refund5');
Route::post('/refund-policy-8','refunds@refund6');



/* ------------- Terms and Conditions ------------- */

Route::get('/terms-and-conditions','terms@termindex');
Route::post('/terms-and-conditions-2','terms@term');
Route::post('/terms-and-conditions-3','terms@term1');
Route::post('/terms-and-conditions-4','terms@term2');
Route::post('/terms-and-conditions-5','terms@term3');
Route::post('/terms-and-conditions-6','terms@term4');
Route::post('/terms-and-conditions-7','terms@term5');
Route::post('/terms-and-conditions-8','terms@term6');
Route::post('/terms-and-conditions-9','terms@term7');
Route::post('/terms-and-conditions-10','terms@term8');
Route::post('/terms-and-conditions-11','terms@term9');



Route::post('/contact','contacts@index');


Route::get('/lifetime-deal', function () {
    return view('lifetime-deal');
});

Route::post('/home','delete@delete');




Route::post('/complete','terms@term10');
Route::get('/complete', function () {
    return view('complete');
});

Route::post('/billing','terms@payment');
Route::get('/billing', function () {
    return view('billing');
});

Route::post('/payment','billings@index');
Route::get('/payment', function () {
    return view('payment');
});

// Route::get('/payment', 'PaymentController@index');
Route::post('/charge', 'PaymentController@charge');

Route::get('/invoice', function () {
    return view('invoice');
});




/* ------------- Custom Clause ------------- */

Route::post('/custom-clause-home','custom_clauses@index');
Route::get('/custom-clause', function () {
    return view('custom-clause');
});

Route::get('/custom-clause-home', function () {
    return view('custom-clause-home');
});

Route::get('/custom-clause-home/{id}', 'custom_clauses@destroy');



/* ------------- Login & Logout ------------- */

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/signup','registerations@index');

Auth::routes(['verify' => true]);


/* ------------- Admin Dashboard ------------- */

Route::get('/admin/Dashboard', 'admin\Dashboard@index');
Route::post('/logoupload', 'admin\Dashboard@store');


/* ------------- Admin Users ------------- */

Route::get('/admin/User', 'admin\UseradminController@index');
Route::get('/User/delete/{id}','admin\UseradminController@destroy');
Route::get('/UserEdit','admin\UseradminController@edit');
Route::get('/UserRestore/{id}','admin\UseradminController@restore');
Route::get('/User/Register','admin\UseradminController@addnew');
Route::post('/User/Registered','admin\UseradminController@addUser');

/* ------------- Admin Blog ------------- */

Route::get('/admin/Blog', 'admin\BlogController@index');
Route::post('ckeditor/upload', 'admin\BlogController@upload')->name('ckeditor.upload');
Route::post('admin/Blog', 'admin\BlogController@store');
Route::get('/blog/all', 'admin\BlogController@all');
Route::get('/blog/delete/{id}', 'admin\BlogController@destroy');
Route::get('/blog/restore/{id}', 'admin\BlogController@restore');

/* ------------- Admin Price ------------- */

Route::get('/admin/Price', 'admin\PriceController@index');
Route::get('/EditPrice','admin\PriceController@edit');
Route::get('/PriceEdited','admin\PriceController@editPrice');

/* ------------- Admin stripe ------------- */

Route::get('/admin/payment', 'admin\StripeController@index');
Route::get('/admin/stripe', 'admin\StripeController@stripe');
Route::get('/EditStripe','admin\StripeController@edit');
Route::get('/Edited','admin\StripeController@editPrice');