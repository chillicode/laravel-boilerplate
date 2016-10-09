<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Repositories\Frontend\Access\User\UserRepositoryContract;

/**
 * Class ConfirmAccountController
 * @package App\Http\Controllers\Frontend\Auth
 */
class ConfirmAccountController extends Controller
{
	/**
	 * ConfirmAccountController constructor.
	 * @param UserRepositoryContract $user
	 */
	public function __construct(UserRepositoryContract $user)
	{
		$this->user = $user;
	}

	/**
	 * @param $token
	 * @return mixed
	 */
	public function confirm($token)
	{
		$this->user->confirmAccount($token);
		return redirect()->route('frontend.auth.login')->withFlashSuccess(trans('exceptions.frontend.auth.confirmation.success'));
	}

	/**
	 * @param $user
	 * @return mixed
	 */
	public function resend($user)
	{
		$this->user->resendConfirmationEmail($user);
		return redirect()->route('frontend.auth.login')->withFlashSuccess(trans('exceptions.frontend.auth.confirmation.resent'));
	}
}