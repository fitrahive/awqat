<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Quotes_model extends BaseModel
{
	protected string $table = 'quotes';
	protected string $returnType = 'object';
	protected bool $useTimestamps = true;
	protected bool $useSoftDeletes = true;
}
