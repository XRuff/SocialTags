<?php

namespace XRuff\Components\SocialTags;

use Nette\Application\UI\Control;

class SocialTagsControl extends Control
{
	/** @var array */
	public $config;

	public function __construct(array $config) {
		$this->config = $config;
	}

	/**
	 * @return SocialTagsControl;
	 */
	public function create()
	{
		return $this;
	}

	/**
	 * @param string $title
	 * @param string $description
	 * @param string $image
	 */
	public function renderTwitter($title = null, $description = null, $image = null)
	{
		$template = $this->createTemplate()
			->setFile(dirname(__FILE__) . '/templates/twitter.latte');
		$template->title = $title;
		$template->description = $description;
		$template->image = $image;
		$template->config = (object) $this->config['twitter'];
		$template->render();
	}

	/**
	 * @param string $title
	 * @param string $description
	 * @param string $image
	 */
	public function renderFacebook($title = null, $description = null, $image = null)
	{
		$template = $this->createTemplate()
			->setFile(dirname(__FILE__) . '/templates/facebook.latte');
		$template->title = $title;
		$template->description = $description;
		$template->image = $image;
		$template->config = (object) $this->config['facebook'];
		$template->render();
	}
}
