<?php

namespace Users;

interface UserRepository
{
    /**
     * @param \Users\User $user
     */
    public function persist(User $user);
}
