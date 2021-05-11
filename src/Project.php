<?php

namespace Engine\Core;

use Engine\Core\Routing\RouteFactory;

abstract class Project
{
 /**
  * @return RouteFactory[]
  */
	public abstract function getRouteFactories() : array;
}