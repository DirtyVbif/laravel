<?php

use App\Models\AccessLevel;
use App\Models\UserStatus;
use Illuminate\Support\Facades\Auth;

function accessLevel(int $level)
{
  return AccessLevel::isUserHasLevel($level);
}

function isAnonym()
{
  return accessLevel(1);
}

function isModerator()
{
  return AccessLevel::isUserModerator();
}

function isAdmin()
{
  return AccessLevel::isUserAdmin();
}

function user()
{
  return Auth::user();
}

function userStatus()
{
  return UserStatus::current();
}