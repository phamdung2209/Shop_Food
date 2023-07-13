<?php

    Route::group(['prefix' => 'laravel-filemanager','middleware' => 'check_admin_login'], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });

    Route::group(['prefix' => 'api-admin','namespace' => 'Admin','middleware' => 'check_admin_login'], function() {
        Route::get('','AdminController@index')->name('get.admin.index');

        Route::get('statistical','AdminStatisticalController@index')->name('admin.statistical');
        Route::get('contact','AdminContactController@index')->name('admin.contact');
        Route::get('contact/delete/{id}','AdminContactController@delete')->name('admin.contact.delete');

        Route::get('profile','AdminProfileController@index')->name('admin.profile.index');
        Route::post('profile/{id}','AdminProfileController@update')->name('admin.profile.update');
        /**
         * Route danh mục sản phẩm
         **/
        Route::group(['prefix' => 'category'], function(){
            Route::get('','AdminCategoryController@index')->name('admin.category.index');
            Route::get('create','AdminCategoryController@create')->name('admin.category.create');
            Route::post('create','AdminCategoryController@store');

            Route::get('update/{id}','AdminCategoryController@edit')->name('admin.category.update');
            Route::post('update/{id}','AdminCategoryController@update');

            Route::get('active/{id}','AdminCategoryController@active')->name('admin.category.active');
            Route::get('hot/{id}','AdminCategoryController@hot')->name('admin.category.hot');
            Route::get('delete/{id}','AdminCategoryController@delete')->name('admin.category.delete');

        });

        Route::group(['prefix' => 'keyword'], function(){
            Route::get('','AdminKeywordController@index')->name('admin.keyword.index');
            Route::get('create','AdminKeywordController@create')->name('admin.keyword.create');
            Route::post('create','AdminKeywordController@store');

            Route::get('update/{id}','AdminKeywordController@edit')->name('admin.keyword.update');
            Route::post('update/{id}','AdminKeywordController@update');
            Route::get('hot/{id}','AdminKeywordController@hot')->name('admin.keyword.hot');

            Route::get('delete/{id}','AdminKeywordController@delete')->name('admin.keyword.delete');

        });

        Route::group(['prefix' => 'attribute'], function(){
            Route::get('','AdminAttributeController@index')->name('admin.attribute.index');
            Route::get('create','AdminAttributeController@create')->name('admin.attribute.create');
            Route::post('create','AdminAttributeController@store');

            Route::get('update/{id}','AdminAttributeController@edit')->name('admin.attribute.update');
            Route::post('update/{id}','AdminAttributeController@update');
            Route::get('hot/{id}','AdminAttributeController@hot')->name('admin.attribute.hot');

            Route::get('delete/{id}','AdminAttributeController@delete')->name('admin.attribute.delete');

        });

        Route::group(['prefix' => 'user'], function(){
            Route::get('','AdminUserController@index')->name('admin.user.index');

            Route::get('update/{id}','AdminUserController@edit')->name('admin.user.update');
            Route::post('update/{id}','AdminUserController@update');


            Route::get('delete/{id}','AdminUserController@delete')->name('admin.user.delete');

        });

        Route::group(['prefix' => 'transaction'], function(){
            Route::get('','AdminTransactionController@index')->name('admin.transaction.index');
            Route::get('delete/{id}','AdminTransactionController@delete')->name('admin.transaction.delete');
            Route::get('order-delete/{id}','AdminTransactionController@deleteOrderItem')->name('ajax_admin.transaction.order_item');
            Route::get('view-transaction/{id}','AdminTransactionController@getTransactionDetail')->name('ajax.admin.transaction.detail');
            Route::get('action/{action}/{id}','AdminTransactionController@getAction')->name('admin.action.transaction');
        });


        Route::group(['prefix' => 'product'], function(){
            Route::get('','AdminProductController@index')->name('admin.product.index');
            Route::get('create','AdminProductController@create')->name('admin.product.create');
            Route::post('create','AdminProductController@store');

            Route::get('hot/{id}','AdminProductController@hot')->name('admin.product.hot');
            Route::get('active/{id}','AdminProductController@active')->name('admin.product.active');
            Route::get('update/{id}','AdminProductController@edit')->name('admin.product.update');
            Route::post('update/{id}','AdminProductController@update');

            Route::get('delete/{id}','AdminProductController@delete')->name('admin.product.delete');
            Route::get('delete-image/{id}','AdminProductController@deleteImage')->name('admin.product.delete_image');
        });

        Route::group(['prefix' => 'rating'], function(){
            Route::get('','AdminRatingController@index')->name('admin.rating.index');
            Route::get('delete/{id}','AdminRatingController@delete')->name('admin.rating.delete');
        });

        Route::group(['prefix' => 'menu'], function(){
            Route::get('','AdminMenuController@index')->name('admin.menu.index');
            Route::get('create','AdminMenuController@create')->name('admin.menu.create');
            Route::post('create','AdminMenuController@store');

            Route::get('update/{id}','AdminMenuController@edit')->name('admin.menu.update');
            Route::post('update/{id}','AdminMenuController@update');

            Route::get('active/{id}','AdminMenuController@active')->name('admin.menu.active');
            Route::get('hot/{id}','AdminMenuController@hot')->name('admin.menu.hot');
            Route::get('delete/{id}','AdminMenuController@delete')->name('admin.menu.delete');
        });
        Route::group(['prefix' => 'comment'], function(){
            Route::get('','AdminCommentController@index')->name('admin.comment.index');
            Route::get('delete/{id}','AdminCommentController@delete')->name('admin.comment.delete');
        });

        Route::group(['prefix' => 'article'], function(){
            Route::get('','AdminArticleController@index')->name('admin.article.index');
            Route::get('create','AdminArticleController@create')->name('admin.article.create');
            Route::post('create','AdminArticleController@store');

            Route::get('update/{id}','AdminArticleController@edit')->name('admin.article.update');
            Route::post('update/{id}','AdminArticleController@update');

            Route::get('active/{id}','AdminArticleController@active')->name('admin.article.active');
            Route::get('hot/{id}','AdminArticleController@hot')->name('admin.article.hot');
            Route::get('delete/{id}','AdminArticleController@delete')->name('admin.article.delete');

        });

        Route::group(['prefix' => 'slide'], function(){
            Route::get('','AdminSlideController@index')->name('admin.slide.index');
            Route::get('create','AdminSlideController@create')->name('admin.slide.create');
            Route::post('create','AdminSlideController@store');

            Route::get('update/{id}','AdminSlideController@edit')->name('admin.slide.update');
            Route::post('update/{id}','AdminSlideController@update');

            Route::get('active/{id}','AdminSlideController@active')->name('admin.slide.active');
            Route::get('hot/{id}','AdminSlideController@hot')->name('admin.slide.hot');
            Route::get('delete/{id}','AdminSlideController@delete')->name('admin.slide.delete');
        });

        Route::group(['prefix' => 'event'], function(){
            Route::get('','AdminEventController@index')->name('admin.event.index');
            Route::get('create','AdminEventController@create')->name('admin.event.create');
            Route::post('create','AdminEventController@store');

            Route::get('update/{id}','AdminEventController@edit')->name('admin.event.update');
            Route::post('update/{id}','AdminEventController@update');

            Route::get('delete/{id}','AdminEventController@delete')->name('admin.event.delete');
        });

        Route::group(['prefix' => 'page-static'], function(){
            Route::get('','AdminStaticController@index')->name('admin.static.index');
            Route::get('create','AdminStaticController@create')->name('admin.static.create');
            Route::post('create','AdminStaticController@store');

            Route::get('update/{id}','AdminStaticController@edit')->name('admin.static.update');
            Route::post('update/{id}','AdminStaticController@update');

            Route::get('delete/{id}','AdminStaticController@delete')->name('admin.static.delete');
        });

        Route::group(['prefix' => 'producer'], function(){
            Route::get('','AdminProducerController@index')->name('admin.producer.index');
            Route::get('create','AdminProducerController@create')->name('admin.producer.create');
            Route::post('create','AdminProducerController@store');

            Route::get('update/{id}','AdminProducerController@edit')->name('admin.producer.update');
            Route::post('update/{id}','AdminProducerController@update');

            Route::get('delete/{id}','AdminProducerController@delete')->name('admin.producer.delete');
        });

        Route::group(['prefix' => 'type'], function(){
            Route::get('','AdminTypeController@index')->name('admin.type.index');
            Route::get('create','AdminTypeController@create')->name('admin.type.create');
            Route::post('create','AdminTypeController@store');

            Route::get('update/{id}','AdminTypeController@edit')->name('admin.type.update');
            Route::post('update/{id}','AdminTypeController@update');

            Route::get('delete/{id}','AdminTypeController@delete')->name('admin.type.delete');
        });

        Route::group(['prefix' => 'discount-code'], function(){
            Route::get('','DiscountCodeController@index')->name('admin.discount.code.index');
            Route::get('create','DiscountCodeController@create')->name('admin.discount.code.create');
            Route::post('create','DiscountCodeController@store');

            Route::get('update/{id}','DiscountCodeController@edit')->name('admin.discount.code.update');
            Route::post('update/{id}','DiscountCodeController@update');

            Route::get('delete/{id}','DiscountCodeController@delete')->name('admin.discount.code.delete');
        });
        
    });
