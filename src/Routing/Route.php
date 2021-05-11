<?php

namespace Engine\Core\Routing;

abstract class Route
{
	use \Engine\Core\Traits\Singleton;

	private static string $route;

	public final function __construct()
	{
		if(!isset(self::$route))
			throw new \LogicException("Route " . static::class . " does not have a defined route");
	}

	abstract public function getPage() : \Engine\Core\Page\Page;

	public function isRouteFor(string $route) : bool
	{
		return isset(self::$route) && self::$route === $route;
	}
}