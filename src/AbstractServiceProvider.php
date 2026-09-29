<?php

declare(strict_types=1);

namespace Forgge;

use League\Container\ServiceProvider\AbstractServiceProvider as LeagueServiceProvider;

abstract class AbstractServiceProvider extends LeagueServiceProvider
{
	/**
	 * Services provided by this provider.
	 *
	 * @var class-string[]
	 */
	protected array $provides = [];

	/**
	 * Determine whether this service provides the given id.
	 *
	 * @param string $id The id to check.
	 *
	 * @return bool
	 */
	public function provides(string $id): bool
	{
		if (in_array($id, $this->provides, true)) {
			return true;
		}

		if ($id !== RegisterHooksInterface::class) {
			return false;
		}

		foreach ($this->provides as $class) {
			if (is_a($class, RegisterHooksInterface::class, true)) {
				return true;
			}
		}

		return false;
	}
}
