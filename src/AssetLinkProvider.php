<?php

namespace Engine;

class AssetLinkProvider
{
	use \Engine\Traits\Singleton;

	public function getCssPath(string $file) : string
	{
		return ConfigManager::getInstance()->get(Config::HOST) . "css/{$file}.css";
	}
	public function getJsPath(string $file) : string
	{
		return ConfigManager::getInstance()->get(Config::HOST) . "js/{$file}.js";
	}
}