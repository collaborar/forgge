<?php

declare(strict_types=1);

namespace Forgge;

use League\Container\Container as LeagueContainer;
use League\Container\Definition\DefinitionInterface;

/**
 * League container modified container.
 *
 * When adding a service that contains RegisterHooksInterface, we add
 * a tag, so we can collect all services that contains this interface and
 * call registerHooks().
 */
class Container extends LeagueContainer
{
	public function add(string $id, mixed $concrete = null, bool $overwrite = false): DefinitionInterface
	{
		$definition = parent::add($id, $concrete, $overwrite);
		$this->addRegisterHooksTag($definition);
		return $definition;
	}

	public function addShared(string $id, mixed $concrete = null, bool $overwrite = false): DefinitionInterface
	{
		$definition = parent::addShared($id, $concrete, $overwrite);
		$this->addRegisterHooksTag($definition);
		return $definition;
	}

	/**
	 * Tag classes which implements the RegisterHooksInterface.
	 *
	 * @param DefinitionInterface $definition
	 * @return void
	 */
	private function addRegisterHooksTag(DefinitionInterface $definition): void
	{
		$class = $this->getClass($definition);
		if ($class !== null && is_a($class, RegisterHooksInterface::class, true)) {
			$definition->addTag(RegisterHooksInterface::class);
		}
	}

	private function getClass(DefinitionInterface $definition): ?string
	{
		$alias = $definition->getAlias();
		if (class_exists($alias)) {
			return $alias;
		}
		$concrete = $definition->getConcrete();
		if (is_string($concrete) && class_exists($concrete)) {
			return $concrete;
		}
		if (is_object($concrete) && ! $concrete instanceof \Closure) {
			return $concrete::class;
		}
		return null;
	}
}
