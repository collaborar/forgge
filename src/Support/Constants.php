<?php

declare(strict_types=1);

namespace Forgge\Support;

final class Constants
{
	/**
	 * @var array<string, mixed>
	 */
	private static array $constants = [];

	/**
	 * Determine whether a constant is defined.
	 *
	 * @param string $name
	 * @return bool
	 */
	public static function is_defined(string $name): bool
	{
		return array_key_exists($name, self::$constants)
			|| defined($name);
	}

	/**
	 * Determine whether a constant is truthy.
	 *
	 * @param string $name
	 * @return bool
	 */
	public static function isTrue(string $name): bool
	{
		return self::is_defined($name) && (bool) self::get_constant($name);
	}

	/**
	 * Get a constant value.
	 *
	 * @param string $name
	 * @return mixed
	 */
	public static function get_constant(string $name): mixed
	{
		if (array_key_exists($name, self::$constants)) {
			return self::$constants[$name];
		}

		return defined($name) ? constant($name) : null;
	}

	/**
	 * Define a constant if not defined.
	 *
	 * @param string $name
	 * @param mixed $value
	 * @return void
	 */
	public static function define(string $name, mixed $value): void
	{
		if (!defined($name)) {
			define($name, $value);
		}
	}

	/**
	 * Set/override a "constant" only inside this class.
	 *
	 * Use it for tests purposes.
	 *
	 * @param string $name
	 * @param mixed $value
	 * @return void
	 */
	public static function set_constant(string $name, mixed $value): void
	{
		self::$constants[$name] = $value;
	}

	/**
	 * Unset a "constant" only inside this class.
	 *
	 * It's impossible to "undefine" a PHP constant. This is for tests only.
	 *
	 * @param string $name
	 * @return bool
	 */
	public static function unset_constant(string $name): bool
	{
		if (!array_key_exists($name, self::$constants)) {
			return false;
		}

		unset(self::$constants[$name]);
		return true;
	}

	/**
	 * Unset all "constants" only inside this class.
	 *
	 * @return void
	 */
	public static function unset_all(): void
	{
		self::$constants = [];
	}
}
