<?php

declare(strict_types=1);

namespace Forgge\Contracts;

interface RegisterHooksInterface
{

	/**
	 * Register actions and filters hooks.
	 *
	 * @return void
	 */
	public function registerHooks(): void;
}
