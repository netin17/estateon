<?php

namespace App\Traits;

use App\User;
use App\Property;
use App\Builder;

trait CommonTrait
{
    /**
     * Get user details by user ID.
     *
     * @param int $userId
     * @return \App\Models\User|null
     */
    public function getUserDetailsById($userId)
    {
        return User::find($userId);
    }

   /**
     * Get the count of properties owned by a user.
     *
     * @param int $userId
     * @return int
     */
    public function getUserPropertyCount($userId)
    {
        return Property::where('user_id', $userId)->count();
    }
   /**
     * Get the user status for builder.
     *
     * @param int $userId
     * @return int
     */
    public function getbuilderstatus($userId)
    {
        return Builder::where('user_id', $userId)->where('status','active')->first();
    }
}