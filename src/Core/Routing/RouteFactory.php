<?php

namespace Core\Routing;

abstract class RouteFactory
{
	use \Core\Traits\Factory;

	public final function __construct() { }

	/**
	 * @return Route[]
	 */
	public function getAllRoutes() : array
	{
		return $this->getAll();
	}

	public function getRoute(string $route) : Route
	{
		return $this->get($route);
	}

	/**
	 * @return Route[]
	 */
	private function defineObjects(): array
	{
		return $this->defineRoutes();
	}

	/**
	 * @return Route[]
	 */
	abstract protected function defineRoutes() : array;
}