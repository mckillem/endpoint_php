<?php

namespace app\controllers;

class RouterController extends Controller
{
	protected Controller $controller;

	function process(array $parameters): void
	{
		$parsedURL = $this->parseURL($parameters[0]);

		$this->controller = new OrderController();

		$this->controller->process($parsedURL);
	}

	private function parseURL(string $url): array
	{
		$parsedURL = parse_url($url);
		$parsedURL["path"] = ltrim($parsedURL["path"], "/");
		$parsedURL["path"] = trim($parsedURL["path"]);

		return explode("/", $parsedURL["path"]);
	}
}