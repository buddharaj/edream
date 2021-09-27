<?php

namespace Application\User;
interface IUserReadOnlyRepository
{
	/**
	 * Returns a name of the player
	 */
	public function getName();

	/**
	 * Returns a Id of the player
	 */
	public function getId();

	/**
	 * Returns the marker character
	 */
	public function getMarker();
}