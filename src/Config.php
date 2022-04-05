<?php

namespace Engine;

enum Config : string implements ConfigInterface 
{
	case HOST                  = "engine.host";
	case PAGE_DEFAULT_TEMPLATE = "engine.pageDefaultTemplate";
}