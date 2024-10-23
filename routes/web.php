<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\User\CheckOutController;
use App\Http\Controllers\Admin\ChildCategoryController;
use App\Http\Controllers\Admin\CodSettingController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\FlashSaleController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\User\PaymentController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductImageGalleryController;
use App\Http\Controllers\Admin\RazorpaySettingController;
use App\Http\Controllers\Admin\ShippingRuleController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\FlashSaleController as UserFlashSaleController;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\UserAddressController;
use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\User\UserOrderController;
use App\Http\Controllers\User\UserProductController;
use App\Http\Controllers\User\UserProfileController;
use App\Http\Controllers\User\WishlistController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[HomeController::class,'index']);



Route::get('/about', function(){
    return view('user.pages.about');
});
Route::get('/contact',function(){
    return view('user.pages.contact');
});


// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/redirect/user/dashboard', [UserDashboardController::class,'index'])->name('dashboard');
    
    // user address routes
    Route::resource('redirect/user/address', UserAddressController::class);

    // user checkout routes
    Route::get('redirect/user/checkout', [CheckOutController::class, 'index'] )->name('user.checkout');
    Route::post('redirect/user/checkout/form-submit', [CheckOutController::class, 'checkOutFormSubmit'] )->name('user.checkout.form-submit');

    // payment routes
    Route::get('redirect/user/payment', [PaymentController::class, 'index'] )->name('user.payment');
    Route::get('payment-success', [PaymentController::class, 'paymentSuccess'])->name('user.payment.success');

    /** Razorpay routes */
    Route::post('redirect/user/razorpay/payment', [PaymentController::class, 'payWithRazorPay'])->name('user.razorpay.payment');

    /** cod routes */
    Route::post('redirect/user/cod/payment', [PaymentController::class, 'payWithCod'])->name('user.cod.payment');

    /** order routes */
    Route::get('redirect/user/orders', [UserOrderController::class, 'index'])->name('user.orders.index');
    Route::get('redirect/user/orders/show/{id}', [UserOrderController::class, 'show'])->name('user.orders.show');

    // wishlist routes
    Route::get('redirect/user/wishlist', [WishlistController::class, 'index'] )->name('user.wishlist');
    Route::get('redirect/user/wishlist/add-product', [WishlistController::class, 'addToWishlist'] )->name('user.wishlist.store');
    Route::get('redirect/user/wishlist/remove-product/{id}', [WishlistController::class, 'destroy'] )->name('user.wishlist.destroy');
    
});

Route::get('redirect',[HomeController::class,'redirect']);



// user profile routes
Route::get('/redirect/user/profile', [UserProfileController::class,'index'])->name('profile');
Route::put('/redirect/user/profile', [UserProfileController::class,'updateProfile'])->name('user.profile.update');
Route::post('/redirect/user/profile', [UserProfileController::class,'updatePassword'])->name('user.profile.update.password');

// flash sale route
Route::get('/redirect/user/flash-sale', [UserFlashSaleController::class,'index'])->name('flash-sale');

// product detail route
Route::get('/redirect/user/product-detail/{slug}', [UserProductController::class, 'showProduct'])->name('product-detail');

// ADD TO CART routes
Route::post('/redirect/user/add-to-cart', [CartController::class, 'addToCart'])->name('add-to-cart');
Route::get('/redirect/user/cart-details', [CartController::class, 'cartDetails'])->name('cart-details');
Route::post('/redirect/user/cart/update-quantity', [CartController::class, 'updateProductQty'])->name('cart.update-quantity');
Route::get('/redirect/user/cart/remove-product/{rowId}', [CartController::class, 'removeProduct'])->name('cart.remove-product');
Route::get('/redirect/user/cart/product-total', [CartController::class, 'cartTotal'])->name('cart.product-total');
Route::get('/redirect/user/apply-coupon', [CartController::class, 'applyCoupon'])->name('apply-coupon');
Route::get('/redirect/user/coupon-calculation', [CartController::class, 'couponCalculation'])->name('coupon-calculation');


// admin dashboard routes
Route::get('/redirect/admin/dashboard', [AdminDashboardController::class,'index'])->name('admin.dashboard');

// admin category routes
Route::resource('redirect/admin/category',CategoryController::class);

// admin Sub category routes
Route::resource('redirect/admin/sub-category',SubCategoryController::class);

// admin child category routes
Route::get('redirect/admin/get-subcategories', [ChildCategoryController::class, 'getSubCategories'])->name('get-subcategories');

Route::resource('redirect/admin/child-category',ChildCategoryController::class);


// admin brand routes
Route::resource('redirect/admin/brand',BrandController::class);

// admin product routes
Route::get('redirect/admin/product/get-subcategories', [ProductController::class, 'getSubCategories'])->name('product.get-subcategories');
Route::get('redirect/admin/product/get-childcategories', [ProductController::class, 'getChildCategories'])->name('product.get-childcategories');
Route::resource('redirect/admin/product', ProductController::class);

// admin product image gallery routes
Route::resource('redirect/admin/product-image-gallery', ProductImageGalleryController::class);

// admin profile routes
Route::get('redirect/admin/profile',[AdminController::class,'profile']);
Route::post('redirect/admin/profile/update',[AdminController::class,'updateProfile']);
Route::post('redirect/admin/profile/update/password',[AdminController::class,'updatePassword'])->name('update.password');

// admin slider routes
Route::resource('redirect/admin/slider',SliderController::class);

// admin flash sale route
Route::get('redirect/admin/flash-sale', [FlashSaleController::class,'index'])->name('flash-sale.index');
Route::put('redirect/admin/flash-sale', [FlashSaleController::class,'update'])->name('flash-sale.update');
Route::post('redirect/admin/flash-sale/add-product', [FlashSaleController::class,'addProduct'])->name('flash-sale.add-product');
Route::delete('redirect/admin/flash-sale/{id}', [FlashSaleController::class,'destroy'])->name('flash-sale.destroy');

// admin order routes
Route::get('redirect/admin/order-status', [OrderController::class,'changeOrderStatus'])->name('admin.order.status');
Route::get('redirect/admin/payment-status', [OrderController::class,'changePaymentStatus'])->name('admin.payment.status');
Route::get('redirect/admin/pending-orders', [OrderController::class,'pendingOrders'])->name('admin.pending-orders');
Route::get('redirect/admin/processed-orders', [OrderController::class,'processedOrders'])->name('admin.processed-orders');
Route::get('redirect/admin/shipped-orders', [OrderController::class,'shippedOrders'])->name('admin.shipped-orders');
Route::get('redirect/admin/out-for-delivery-orders', [OrderController::class,'outForDeliveryOrders'])->name('admin.out-for-delivery-orders');
Route::get('redirect/admin/delivered-orders', [OrderController::class,'deliveredOrders'])->name('admin.delivered-orders');
Route::get('redirect/admin/canceled-orders', [OrderController::class,'canceledOrders'])->name('admin.canceled-orders');
Route::resource('redirect/admin/order', OrderController::class);

// admin order transaction route
Route::get('redirect/admin/transaction', [TransactionController::class,'index'])->name('admin.transaction');

// admin coupon routes
Route::resource('redirect/admin/coupons', CouponController::class);

// admin Shipping Rule routes
Route::resource('redirect/admin/shipping-rule', ShippingRuleController::class);

 // RAZORPAY settings  routes
 Route::resource('redirect/admin/razorpay-setting', RazorpaySettingController::class);

 // cash on delivery settings  routes
 Route::get('redirect/admin/cod-setting', [CodSettingController::class,'index'])->name('admin.cod-setting');
 Route::put('redirect/admin/cod-setting/{id}', [CodSettingController::class,'update'])->name('admin.cod-setting.update');