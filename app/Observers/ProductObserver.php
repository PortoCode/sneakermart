<?php

namespace App\Observers;

use App\Models\Product;

class ProductObserver
{
    /**
     * Handle the product "created" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function created(Product $product)
    {
        //
    }

    /**
     * Handle the product "updated" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function updated(Product $product)
    {
        //
    }

    /**
     * Handle the product "saved" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function saved(Product $product)
    {
        // Handle image upload
        if (request()->photo) {
            Product::withoutEvents(function () use ($product) {
                // Delete image
                if (request()->photo=='delete') {
                    $media = $product->getFirstMedia('products');
                    $media? $media->delete() : null;
                    $product->photo = null;

                // Add image from file (web)
                } elseif (file_exists(request()->photo)) {
                    $media = $product->addMedia(request()->photo)->toMediaCollection('products');
                    $product->photo = $media->getFullUrl();

                // Add image from base64 (api)
                } else {
                    $media = $product->addMediaFromBase64(request()->photo)->toMediaCollection('products');
                    $product->photo = $media->getFullUrl();
                }

                // Save changes
                $product->save();
            });
        }
    }

    /**
     * Handle the product "deleted" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function deleted(Product $product)
    {
        //
    }

    /**
     * Handle the product "restored" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function restored(Product $product)
    {
        //
    }

    /**
     * Handle the product "force deleted" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function forceDeleted(Product $product)
    {
        //
    }
}
