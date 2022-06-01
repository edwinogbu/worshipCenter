<?php

use App\Models\Testimony;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\SermonController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CashBookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\TestimonyController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\IncomeExpenseSummary;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\NoticeBoardController;
use App\Http\Controllers\IncomeCategoryController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\ExpenseCategoryController;
use App\Http\Controllers\DeclarationCategoryController;
use App\Http\Controllers\IncomeExpenseSummaryContoller;
use App\Http\Controllers\NoticeBoardCategoryController;
use App\Http\Controllers\IncomeExpenseSummaryController;
use App\Http\Controllers\PropheticDeclarationController;
use App\Http\Controllers\UserPostController;

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
    return view('welcome');
});

Auth::routes();
// Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::prefix('user')->name('user.')->group(function(){

          Route::middleware(['guest:web'])->group(function(){
          Route::view('/login', 'dashboard.user.userLogin')->name('login');
          Route::view('/register', 'dashboard.user.register')->name('register');
          Route::post('/create', [UserController::class, 'create'])->name('create');
          Route::post('/check', [UserController::class, 'check'])->name('check');
          });

            Route::middleware(['auth:web'])->group(function(){
            // Route::view('/home', 'dashboard.user.home')->name('home');
            Route::get('/home', [ProfileController::class, 'dashboard'])->name('home');
            // Route::get('search/', [UserController::class, 'search'])->name('search');

            Route::post('logout', [UserController::class, 'logout'])->name('logout');





            route::get('blog-post-index', [BlogController::class, 'post_dashboard'])->name('post.index');
            route::get('create-post', [BlogController::class, 'create'])->name('post.create');
            route::post('store-post', [BlogController::class, 'store'])->name('posts.store');

            route::get('viewed-post/{id}', [BlogController::class, 'getViewPost']);
            route::post('status/{id}', [BlogController::class, 'status'])->name('status');
            route::post('Change-Status/{id}', [BlogController::class, 'ChangeStatus'])->name('status.change');

            route::get('edit-post/{id}', [BlogController::class, 'edit'])->name('post.edit');
            route::post('update-post/{id}', [BlogController::class, 'update'])->name('post.update');
            route::delete('delete-post/{blog}', [BlogController::class, 'destroy'])->name('post.delete');




            route::get('about-dashboard', [AboutController::class, 'index'])->name('about.dashboard');
            route::get('create-about', [AboutController::class, 'create'])->name('about.create');
            route::post('store-about', [AboutController::class, 'store'])->name('about.store');
            route::get('edit-about/{blog}', [AboutController::class, 'edit'])->name('about.edit');
            route::put('update-about/{blog}', [AboutController::class, 'update'])->name('about.update');
            route::delete('delete-about/{blog}', [AboutController::class, 'destroy'])->name('about.delete');



            route::get('category-dashboard', [CategoryController::class, 'index'])->name('category.index');
            route::get('create-category', [CategoryController::class, 'create'])->name('category.create');
            route::post('store-category', [CategoryController::class, 'store'])->name('category.store');
            route::get('edit-category/edit/{category}', [CategoryController::class, 'edit'])->name('category.edit');
            route::post('update-category/update/{category}', [CategoryController::class, 'update'])->name('category.update');
            route::delete('delete-category/{category}', [CategoryController::class, 'destroy'])->name('category.delete');




            route::get('testimony-dashboard', [TestimonyController::class, 'index'])->name('testimony.index');
            route::get('create-testimony', [TestimonyController::class, 'create'])->name('testimony.create');
            route::post('save-new-testimony', [TestimonyController::class, 'store'])->name('testimony.store');
            route::post('testimony-publish/{id}', [TestimonyController::class, 'publish'])->name('publish');

            route::get('edit-testimony/{testimony}', [TestimonyController::class, 'edit'])->name('testimony.edit');
            route::put('update-testimony/{testimony}', [TestimonyController::class, 'update'])->name('testimony.update');
            route::delete('delete-testimony/{testimony}', [TestimonyController::class, 'destroy'])->name('testimony.delete');



            route::get('appointment-dashboard', [AppointmentController::class, 'index'])->name('appointment.index');
            route::get('create-appointment', [AppointmentController::class, 'create'])->name('appointment.create');
            route::post('store-appointment', [AppointmentController::class, 'store'])->name('appointment.store');
            route::post('appointment-publish/{id}', [AppointmentController::class, 'booking'])->name('booking');

            route::get('edit-appointment/{appointment}', [AppointmentController::class, 'edit'])->name('appointment.edit');
            route::put('update-appointment/{appointment}', [AppointmentController::class, 'update'])->name('appointment.update');
            route::delete('delete-appointment/{appointment}', [AppointmentController::class, 'destroy'])->name('appointment.delete');




            route::get('userManagement-dashboard', [UserManagementController::class, 'index'])->name('userManagement.index');
            route::get('create-userManagement', [UserManagementController::class, 'create'])->name('userManagement.create');
            route::post('store-userManagement', [UserManagementController::class, 'store'])->name('userManagement.store');
            route::post('userManagement-publish/{id}', [UserManagementController::class, 'booking'])->name('booking');

            route::get('edit-userManagement/edit/{userManagement}', [UserManagementController::class, 'edit'])->name('userManagement.edit');
            route::get('show-userManagement/show/{userManagement}', [UserManagementController::class, 'show'])->name('userManagement.show');
            route::post('update-userManagement/update/{userManagement}', [UserManagementController::class, 'update'])->name('userManagement.update');
            route::delete('delete-userManagement/{id}', [UserManagementController::class, 'destroy'])->name('userManagement.delete');

            // CHANGE PASSWORD
            Route::get('/password/view', [UserManagementController::class, 'PasswordView'])->name('password.view');

           Route::post('/password/update', [UserManagementController::class, 'PasswordUpdate'])->name('password.update');




            route::get('incomeCategory-dashboard', [IncomeCategoryController::class, 'index'])->name('incomeCategory.index');
            route::get('create-incomeCategory', [IncomeCategoryController::class, 'create'])->name('incomeCategory.create');
            route::post('store-incomeCategory', [IncomeCategoryController::class, 'store'])->name('incomeCategory.store');
            route::post('incomeCategory-publish/{id}', [IncomeCategoryController::class, 'booking'])->name('booking');

            route::get('edit-incomeCategory/edit/{incomeCategory}', [IncomeCategoryController::class, 'edit'])->name('incomeCategory.edit');
            route::post('update-incomeCategory/update/{incomeCategory}', [IncomeCategoryController::class, 'update'])->name('incomeCategory.update');
            route::delete('delete-incomeCategory/{incomeCategory}', [IncomeCategoryController::class, 'destroy'])->name('incomeCategory.delete');
            // DYNAMIC ADD
            route::get('dynamic-create-incomeCategory', [IncomeCategoryController::class, 'dynamic'])->name('dynamic.incomeCategory.create');
            route::post('dynamic-store-incomeCategory', [IncomeCategoryController::class, 'dynamicStore'])->name('dynamic.incomeCategory.store');

            route::get('dashboard-income-dashboard', [IncomeController::class, 'index'])->name('income.index');
            route::get('create-income', [IncomeController::class, 'create'])->name('income.create');
            route::post('dash-store-income', [IncomeController::class, 'store'])->name('income.store');

            // INCOME STATUS
            route::post('income-approval/{income}', [ExpenseController::class, 'approvedBy'])->name('pastor.income.approved');


            route::post('income-publish/{id}', [IncomeController::class, 'booking'])->name('booking');

            route::get('edit-income/edit/{income}', [IncomeController::class, 'edit'])->name('income.edit');
            route::post('update-income/update/{income}', [IncomeController::class, 'update'])->name('income.update');
            route::delete('delete-income/{id}', [IncomeController::class, 'destroy'])->name('income.delete');






            route::get('expenseCategory-dashboard', [ExpenseCategoryController::class, 'index'])->name('expenseCategory.index');
            route::get('create-expenseCategory', [ExpenseCategoryController::class, 'create'])->name('expenseCategory.create');
            route::post('store-expenseCategory', [ExpenseCategoryController::class, 'store'])->name('expenseCategory.store');

            // EXPENSE STATUS
            route::post('expense-approval/{expense}', [ExpenseController::class, 'approvedBy'])->name('pastor.approved');

            route::post('expenseCategory-publish/{id}', [ExpenseCategoryController::class, 'booking'])->name('booking');

            route::get('edit-expenseCategory/edit/{expenseCategory}', [ExpenseCategoryController::class, 'edit'])->name('expenseCategory.edit');
            route::post('update-expenseCategory/update/{expenseCategory}', [ExpenseCategoryController::class, 'update'])->name('expenseCategory.update');
            route::delete('delete-expenseCategory/{expenseCategory}', [ExpenseCategoryController::class, 'destroy'])->name('expenseCategory.delete');



            route::get('expense-dashboard', [ExpenseController::class, 'index'])->name('expense.index');
            route::get('create-expense', [ExpenseController::class, 'create'])->name('expense.create');
            route::post('store-expense', [ExpenseController::class, 'store'])->name('expense.store');
            route::post('expense-publish/{id}', [ExpenseController::class, 'booking'])->name('booking');

            route::get('edit-expense/edit/{expense}', [ExpenseController::class, 'edit'])->name('expense.edit');
            route::post('update-expense/update/{expense}', [ExpenseController::class, 'update'])->name('expense.update');
            route::delete('delete-expense/delete/{expense}', [ExpenseController::class, 'destroy'])->name('expense.delete');
            Route::get('/printPreview',[ExpenseController::class ,'printPreview']);



            // ACCOUNT SUMMARY REPORT
            route::get('summary-dashboard-report', [IncomeExpenseSummaryController::class, 'index'])->name('incomeExpense.index');
            route::get('all-summary-dashboard-report', [IncomeExpenseSummaryController::class, 'summary'])->name('incomeExpense.summary.index');
            route::get('quarterly-summary-report', [IncomeExpenseSummaryController::class, 'quarterlySummary'])->name('incomeExpense.quarterlySummary.index');
            route::get('yearly-financial-summary-report', [IncomeExpenseSummaryController::class, 'yearlySummary'])->name('incomeExpense.yearlySummary.index');
                // CASHBOOK
            route::get('cashbook-summary-report', [CashBookController::class, 'index'])->name('cashBook.index');
            route::get('show-cashbook/detail/{cashBook}', [CashBookController::class, 'show'])->name('cashbook.show');
            route::get('create-cashbook', [CashBookController::class, 'create'])->name('cashbook.create');
            route::post('store-cashbook/New-Record', [CashBookController::class, 'store'])->name('cashbook.store');

            route::get('edit-cashbook/edit/{cashBook}', [CashBookController::class, 'edit'])->name('cashbook.edit');
            route::post('update-cashbook/update/{cashBook}', [CashBookController::class, 'update'])->name('cashbook.update');
            route::delete('delete-cashbook/delete/{cashBook}', [CashBookController::class, 'destroy'])->name('cashbook.delete');





            // CHART SUMMARY REPORT
            route::get('bar-chart-summary-report', [ChartController::class, 'barChart'])->name('barChart.index');
            // route::get('all-summary-dashboard-report', [IncomeExpenseSummaryController::class, 'summary'])->name('incomeExpense.summary.index');



            // PROPHETIC DECLARATION


            route::get('declarationCategory-dashboard', [DeclarationCategoryController::class, 'index'])->name('declarationCategory.index');
            route::get('create-declarationCategory', [DeclarationCategoryController::class, 'create'])->name('declarationCategory.create');
            route::post('store-declarationCategory', [DeclarationCategoryController::class, 'store'])->name('declarationCategory.store');
            route::post('declarationCategory-publish/{id}', [DeclarationCategoryController::class, 'booking'])->name('booking');

            route::get('show-declarationCategory/show/{declarationCategory}', [DeclarationCategoryController::class, 'show'])->name('declarationCategory.show');
            route::get('edit-declarationCategory/edit/{declarationCategory}', [DeclarationCategoryController::class, 'edit'])->name('declarationCategory.edit');
            route::post('update-declarationCategory/update/{declarationCategory}', [DeclarationCategoryController::class, 'update'])->name('declarationCategory.update');
            route::delete('delete-declarationCategory/{declarationCategory}', [DeclarationCategoryController::class, 'destroy'])->name('declarationCategory.delete');


            route::get('propheticDeclaration-dashboard', [PropheticDeclarationController::class, 'index'])->name('propheticDeclaration.index');
            route::get('create-propheticDeclaration', [PropheticDeclarationController::class, 'create'])->name('propheticDeclaration.create');
            route::post('store-propheticDeclaration', [PropheticDeclarationController::class, 'store'])->name('propheticDeclaration.store');
            route::post('publish/{id}', [PropheticDeclarationController::class, 'published'])->name('published');
            route::post('publishStatus/{id}', [PropheticDeclarationController::class, 'publishStatus'])->name('publishStatus');


            route::get('show-propheticDeclaration/show/{propheticDeclaration}', [PropheticDeclarationController::class, 'show'])->name('propheticDeclaration.show');
            route::get('edit-propheticDeclaration/edit/{propheticDeclaration}', [PropheticDeclarationController::class, 'edit'])->name('propheticDeclaration.edit');
            route::post('update-propheticDeclaration/update/{propheticDeclaration}', [PropheticDeclarationController::class, 'update'])->name('propheticDeclaration.update');
            route::delete('delete-propheticDeclaration/{propheticDeclaration}', [PropheticDeclarationController::class, 'destroy'])->name('propheticDeclaration.delete');

            // Notice BoardCategory
            route::get('noticeBoard-Category-dashboard', [NoticeBoardCategoryController::class, 'index'])->name('noticeBoardCategory.index');
            route::get('create-notice-Board-Category', [NoticeBoardCategoryController::class, 'create'])->name('noticeBoardCategory.create');
            route::post('store-noticeBoardCategory', [NoticeBoardCategoryController::class, 'store'])->name('noticeBoardCategory.store');
            route::post('noticeBoardCategory-publish/{id}', [NoticeBoardCategoryController::class, 'booking'])->name('booking');

            route::get('show-noticeBoardCategory/show/{noticeBoardCategory}', [NoticeBoardCategoryController::class, 'show'])->name('noticeBoardCategory.show');
            route::get('edit-noticeBoardCategory/edit/{noticeBoardCategory}', [NoticeBoardCategoryController::class, 'edit'])->name('noticeBoardCategory.edit');
            route::post('update-noticeBoardCategory/update/{noticeBoardCategory}', [NoticeBoardCategoryController::class, 'update'])->name('noticeBoardCategory.update');
            route::delete('delete-noticeBoardCategory/{noticeBoardCategory}', [NoticeBoardCategoryController::class, 'destroy'])->name('noticeBoardCategory.delete');

            //NOTICE BOARD
            route::get('noticeBoard-dashboard', [NoticeBoardController::class, 'index'])->name('noticeBoard.index');
            route::get('create-noticeBoard', [NoticeBoardController::class, 'create'])->name('noticeBoard.create');
            route::post('store-noticeBoard', [NoticeBoardController::class, 'store'])->name('noticeBoard.store');
            route::post('noticeBoard-publish/{id}', [NoticeBoardController::class, 'booking'])->name('booking');

            route::get('show-noticeBoard/show/{noticeBoard}', [NoticeBoardController::class, 'show'])->name('noticeBoard.show');
            route::get('edit-noticeBoard/edit/{noticeBoard}', [NoticeBoardController::class, 'edit'])->name('noticeBoard.edit');
            route::post('update-noticeBoard/update/{noticeBoard}', [NoticeBoardController::class, 'update'])->name('noticeBoard.update');
            route::delete('delete-noticeBoard/{noticeBoard}', [NoticeBoardController::class, 'destroy'])->name('noticeBoard.delete');

            //SERMON BOARD
            route::get('sermon-dashboard', [SermonController::class, 'index'])->name('sermon.index');
            route::get('create-sermon', [SermonController::class, 'create'])->name('sermon.create');
            route::post('store-sermon', [SermonController::class, 'store'])->name('sermon.store');
            route::get('download/{file}', [SermonController::class, 'download'])->name('download');
            route::post('sermon-display/{id}', [SermonController::class, 'view'])->name('view');

            route::get('show-sermon/show/{sermon}', [SermonController::class, 'show'])->name('sermon.show');
            route::get('edit-sermon/edit/{sermon}', [SermonController::class, 'edit'])->name('sermon.edit');
            route::post('update-sermon/update/{sermon}', [SermonController::class, 'update'])->name('sermon.update');
            route::delete('delete-sermon/{sermon}', [SermonController::class, 'destroy'])->name('sermon.delete');

                //MAKE POST
            route::get('/userPost', [PostController::class, 'index'])->name('userPost');
            route::post('/userPost', [PostController::class, 'store']);

            route::get('show-posting/show/{post}', [PostController::class, 'show'])->name('userPost.show');
            route::delete('userPosting/{post}', [PostController::class, 'destroy'])->name('userPost.delete');


            // LIKE POST
            route::post('/userPost/{post}/likes', [PostLikeController::class, 'store'])->name('userPost.likes');
            route::delete('/userPost-like/{post}/like', [PostLikeController::class, 'destroy'])->name('userPost.like.delete');


            // USER POST INFO
            route::get('/userPost/{user:first_name}/posts', [UserPostController::class, 'index'])->name('userPost.posts');
            // route::delete('/userPost-like/{post}/like', [PostLikeController::class, 'destroy'])->name('userPost.like.delete');




        });

    });

    Route::get('user profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('user-profile-detail/{profile}', [ProfileController::class, 'detail'])->name('profile.detail');
    Route::get('all-user-profile-detail', [ProfileController::class, 'viewAll'])->name('profile.view');
    Route::get('create-profile', [ProfileController::class, 'create'])->name('profile.create');
    Route::get('show-profile/{profile}', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('edit-profile/edit/{profile}', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('store-profile', [ProfileController::class, 'store'])->name('profile.store');
    Route::post('update-profile/update/{profile}', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('delete-profile/{profile}', [ProfileController::class, 'delete'])->name('profile.delete');


    // search user
    Route::get('search-user/', [ProfileController::class, 'search'])->name('profile.user.search');
    // Route::get('search/', [ProfileController::class, 'searchUser'])->name('profile.search');




    // route::get('/', [BlogController::class, 'homePage'])->name('post.home');
    // route::post('front-appointment-store', [BlogController::class, 'StoreFrontendAppointment'])->name('front.appointment.store');
    // route::get('single-post/{blog}', [BlogController::class, 'singlePage'])->name('post.single');
    // route::get('about-page', [BlogController::class, 'aboutPage'])->name('about.home');
    // route::get('top-story-page', [BlogController::class, 'topWeekStory'])->name('topStory.home');
    route::get('create-us-form', [ContactController::class, 'showForm']);
    route::post('contact-us-form', [ContactController::class, 'storeForm'])->name('contact.save');




    route::get('/', [HomePageController::class, 'homePage'])->name('post.home');
    route::post('front-appointment-store', [HomePageController::class, 'StoreFrontendAppointment'])->name('front.appointment.store');
    route::get('single-post/{blog}', [HomePageController::class, 'singlePage'])->name('post.single');
    route::get('about-page', [HomePageController::class, 'aboutPage'])->name('about.home');
    route::get('top-story-page', [HomePageController::class, 'topWeekStory'])->name('topStory.home');





    Route::view('blog', 'blog.frontend.index');
    Route::view('single', 'blog.single');
    Route::view('contact', 'blog.contact');
    Route::view('sermon', 'blog.sermon');
    Route::view('sermon-note', 'blog.sermon-note');
    Route::view('about', 'blog.about');
    Route::view('gallery', 'blog.gallery');
    Route::view('profile', 'dashboard.profile.create');
    Route::view('userLogin', 'dashboard.user.userLogin');
