<?php

declare(strict_types=1);

namespace Forgge;

interface RegisterHooksInterface
{

	/**
	 * Register actions and filters hooks.
	 *
	 * @return void
	 */
	public function register_hooks(): void;
}
