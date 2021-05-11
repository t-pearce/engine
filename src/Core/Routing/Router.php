<?php

namespace Engine\Core\Routing;

class Router
{
	use \Engine\Core\Traits\Singleton;

	/** @var RouteFactory[] */
	private array $routeFactories;

	public final function __construct() { }

	public function addRouteFactory(RouteFactory $factory) : self
	{
		$this->routeFactories[] = $factory;

		return $this;
	}

	public function canHandleRoute(string $route_string) : bool
	{
		foreach($this->routeFactories as $factory)
		{
			foreach($factory->getAllRoutes() as $route)
			{
				if($route->isRouteFor($route_string))
					return true;
			}
		}

		return false;
	}

	public function route(string $route_string) : ?\Engine\Core\Page\Page
	{
		foreach($this->routeFactories as $factory)
		{
			foreach($factory->getAllRoutes() as $route)
			{
				if($route->isRouteFor($route_string))
					return $route->getPage();
			}
		}
		
		return null;
	}

	/**
	 * @return Route[]
	 */
	public function getAllRoutes() : array
	{
		$routes = [];

		foreach($this->routeFactories as $factory)
		{
			foreach($factory->getAllRoutes() as $route)
			{
				$routes[] = $route;
			}
		}

		return $routes;
	}
}