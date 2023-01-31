<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\AboutusController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\AboutpersonController;
use App\Http\Controllers\Admin\CareerController;
use App\Http\Controllers\Admin\PersonController;
use App\Http\Controllers\Admin\CenteraboutController;
use App\Http\Controllers\Admin\DirectorController;
use App\Http\Controllers\Admin\ExpertpeopleController;
use App\Http\Controllers\Admin\OutputnewController;
use App\Http\Controllers\Admin\ProjectnewController;
use App\Http\Controllers\Admin\SupportaboutController;
use App\Http\Controllers\Admin\ContactcenterController;
use App\Http\Controllers\Admin\OptionsController;
use App\Http\Controllers\Admin\ProjectdocumentController;
use App\Http\Controllers\Admin\EventproductController;
use App\Http\Controllers\Admin\AboutwhatController;
use App\Http\Controllers\Admin\AboutmissionController;
use App\Http\Controllers\Admin\DonateaboutController;
use App\Http\Controllers\Admin\CenterfilterController;
use App\Http\Controllers\Admin\OutputcategoryController;
use App\Http\Controllers\Admin\OurcontactController;
use UniSharp\laravel\LaravelFilemanager\Lfm;


use App\Http\Controllers\Front\IndexController;
use App\Http\Controllers\Front\NewsController;
use App\Http\Controllers\Front\EventController;
use App\Http\Controllers\Front\EventsController;
use App\Http\Controllers\Front\CentersController;
use App\Http\Controllers\Front\ExpertsController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\OutputController;
use App\Http\Controllers\Front\ProjectController;
use App\Http\Controllers\Front\CareersController;
use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\Front\SupportController;
use App\Http\Controllers\Front\AboutwhatsController;
use App\Http\Controllers\Front\AboutmissionsController;
use App\Http\Controllers\Front\SearchController;
use App\Http\Controllers\Front\DonateController;

Auth::routes();

Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['role:admin'])->prefix('dashboard')->group(static function () {
    Route::get('/', [HomeController::class, 'index'])->name('homeAdmin');
    Route::resources([
        'slider' => SliderController::class,
        'aboutus' => AboutusController::class,
        'video' => VideoController::class,
        'article' => ArticleController::class,
        'aboutperson' => AboutpersonController::class,
        'career' => CareerController::class,
        'person' => PersonController::class,
        'centerabout' => CenteraboutController::class,
        'director' => DirectorController::class,
        'expertpeople' => ExpertpeopleController::class,
        'outputnew' => OutputnewController::class,
        'projectnew' => ProjectnewController::class,
        'supportabout' => SupportaboutController::class,
        'contactcenter' => ContactcenterController::class,
        'options' => OptionsController::class,
        'projectdocument' => ProjectdocumentController::class,
        'eventproduct' => EventproductController::class,
        'aboutwhat' => AboutwhatController::class,
        'aboutmission' => AboutmissionController::class,
        'donateabout' => DonateaboutController::class,
        'centerfilter' => CenterfilterController::class,
        'outputcategory' => OutputcategoryController::class,
        'ourcontact' => OurcontactController::class
    ]);
});

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){
        Route::get('/', [IndexController::class, 'hompage'])->name('/');
        Route::get('articles', [NewsController::class, 'list'])->name('articles');
        Route::get('articles/{slug}', [NewsController::class, 'show'])->name('article');
        Route::get('eventproducts/{id}', [EventController::class, 'list'])->name('eventproducts');
        Route::post('eventproducts/ajax-event-filter', [EventController::class, 'ajaxEventFilterList'])->name('eventproducts.ajaxEventFilter');
        Route::get('eventproduct/{slug}', [EventController::class, 'show'])->name('eventproduct');
        Route::get('events', [EventsController::class, 'index'])->name('events');
        Route::get('centerabouts', [CentersController::class, 'list'])->name('centerabouts');
        Route::get('centerabouts/{slug}', [CentersController::class, 'show'])->name('centerabout');
        Route::get('expertpeoples', [ExpertsController::class, 'list'])->name('expertpeoples');
        Route::post('expertpeoples/ajax-expert-filter', [ExpertsController::class, 'ajaxExpertFilterList'])->name('expertpeoples.ajaxExpertFilter');
        Route::get('expertpeoples/ajax-filter-details', [ExpertsController::class, 'ajaxFilterDetails'])->name('expertpeoples.ajaxFilterDetails');

        Route::get('expertpeoples/{slug}', [ExpertsController::class, 'show'])->name('expertpeople');



        Route::get('contact', [ContactController::class, 'index'])->name('contact');
        Route::get('outputnews/{id?}', [OutputController::class, 'list'])->name('outputnews');
        Route::post('outputnews/ajax-filter', [OutputController::class, 'ajaxFilterList'])->name('outputnews.ajaxFilter');
        Route::get('outputnew/{slug}', [OutputController::class, 'show'])->name('outputnew');
        Route::get('projectnews', [ProjectController::class, 'list'])->name('projectnews');
        Route::get('projectnews/{slug}', [ProjectController::class, 'show'])->name('projectnew');
        Route::post('save_yourSave', [IndexController::class, 'yourSave'])->name('yourSave');
        Route::post('save_callback', [ContactController::class, 'saveCallback'])->name('saveCallback');
        Route::get('careers', [CareersController::class, 'index'])->name('careers');
        Route::get('about', [AboutController::class, 'about'])->name('about');
        Route::get('about/{id}', [AboutController::class, 'personlist'])->name('personlist');
        Route::get('support', [SupportController::class, 'index'])->name('support');
        Route::get('donate', [DonateController::class, 'index'])->name('donate');
        Route::get('aboutwhats', [AboutwhatsController::class, 'index'])->name('aboutwhats');
        Route::get('aboutmissions', [AboutmissionsController::class, 'index'])->name('aboutmissions');
        Route::post('front_search', [SearchController::class, 'search'])->name('front_search');

 });


Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    UniSharp\LaravelFilemanager\Lfm::routes();
});


