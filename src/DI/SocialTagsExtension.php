<?php

namespace XRuff\Components\SocialTags\DI;

use Nette;
use XRuff\Components\SocialTags;

class SocialTagsExtension extends Nette\DI\CompilerExtension
{
	/** @var array $DEFAULTS */
	private $defaults = [
		'twitter' => [
			'card' => 'summary_large_image',
			'creator' => null,
			'title' => null,
			'description' => null,
			'image' => null,
		],
		'facebook' => [
			'appId' => null,
			'admins' => null,
			'url' => null,
			'siteName' => null,
			'type' => 'website',
			'title' => null,
			'description' => null,
			'image' => null,
			'locale' => 'cs_cz',
		],
	];

	public function loadConfiguration()
	{
		$builder = $this->getContainerBuilder();
		$this->validateConfig($this->defaults);

		$config = $this->config;

		$configuration = $builder->addDefinition($this->prefix('socialTagsControlFactory'))
			->setClass(SocialTags\SocialTagsControl::class)
			->setArguments([$config]);
	}

	/**
	 * @param Nette\Configurator $configurator
	 */
	public static function register(Nette\Configurator $configurator)
	{
		$configurator->onCompile[] = function ($config, Nette\DI\Compiler $compiler) {
			$compiler->addExtension('socialTags', new SocialTagsExtension());
		};
	}
}
