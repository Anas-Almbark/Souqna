<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Product;
use App\Models\Admin;

class ProductPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the user can create a new product.
     *
     * @param User $user
     * @return bool
     */
    public function create(User $user)
    {
        // Only allow users with active accounts to create products
        return $user->is_active === 1;
    }

    /**
     * Determine if the user can update the product.
     *
     * @param User $user
     * @param Product $product
     * @return bool
     */
    public function update(User $user, Product $product)
    {
        // Users can only update their own products
        return $user->id === $product->user_id && $user->is_active === 1;
    }

    /**
     * Determine if the user can delete the product.
     *
     * @param User $user
     * @param Product $product
     * @return bool
     */
    public function delete(User $user, Product $product)
    {
        // Users can only delete their own products
        return $user->id === $product->user_id && $user->is_active === 1;
    }

    /**
     * Determine if the user owns the product.
     *
     * @param User $user
     * @param Product $product
     * @return bool
     */

    
}
