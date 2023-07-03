<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users_model extends BaseModel
{
	protected string $table = 'users';
	protected string $returnType = 'object';
	protected bool $useTimestamps = true;
	protected bool $useSoftDeletes = true;
}
