<?php

use App\User;
use Illuminate\Database\Seeder;

abstract class AbstractDatabaseSeeder extends Seeder
{
    /**
     * @var User
     */
    protected $user;

    /**
     * @var bool
     */
    protected $user_exists = false;

    /**
     * @param string $className
     */
    protected function handleTestUser(string $className)
    {
        $this->fetchUser();

        if ($this->user_exists) {
            factory($className)->create([
                'user_id' => $this->user->id
            ]);
        }
    }

    /**
     * @return User
     */
    protected function fetchUser(): User
    {
        return $this->setUser(User::first());
    }

    /**
     * @param User|null $user
     * @return User|null
     */
    protected function setUser($user)
    {
        if($user === null) {
            $this->setUserExists(false);
        } else {
            $this->setUserExists(true);
        }

        return $this->user = $user;
    }

    /**
     * @param bool $bool
     * @return bool
     */
    protected function setUserExists(bool $bool = false): bool
    {
        return $this->user_exists = $bool;
    }
}