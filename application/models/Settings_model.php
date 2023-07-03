<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Settings_model extends BaseModel
{
	protected string $table = 'settings';
	protected string $returnType = 'object';
	protected bool $useTimestamps = false;
	protected bool $useSoftDeletes = false;
}
