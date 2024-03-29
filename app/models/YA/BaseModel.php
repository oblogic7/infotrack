<?php

namespace YA;


use Dryval\ValidationTrait;

class BaseModel extends \Eloquent
{

    use ValidationTrait;

	public function __construct($attributes = array())
	{
		parent::__construct($attributes);

		if ($this->useSti()) {
			$this->setAttribute($this->stiClassField, get_class($this));
		}
	}

    /**
     * @return bool
     */
    private function useSti()
	{
		return ($this->stiClassField && $this->stiBaseClass);
	}

    /**
     * @param bool $excludeDeleted
     * @return mixed
     */
    public function newQuery($excludeDeleted = TRUE)
	{
		$builder = parent::newQuery($excludeDeleted);
		// If I am using STI, and I am not the base class,
		// then filter on the class name.
		if ($this->useSti() && get_class(new $this->stiBaseClass) !== get_class($this)) {
			$builder->where($this->stiClassField, "=", get_class($this));
		}

		return $builder;
	}

    /**
     * @param array $attributes
     * @return mixed
     */
    public function newFromBuilder($attributes = array())
	{
		if ($this->useSti() && $attributes->{$this->stiClassField}) {
			$class            = $attributes->{$this->stiClassField};
			$instance         = new $class;
			$instance->exists = TRUE;
			$instance->setRawAttributes((array)$attributes, TRUE);

			return $instance;
		} else {
			return parent::newFromBuilder($attributes);
		}
	}
}