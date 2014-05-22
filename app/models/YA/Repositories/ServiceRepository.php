<?php
/**
 * Created by PhpStorm.
 * User: matt
 * Date: 5/11/14
 * Time: 6:41 PM
 */

namespace YA\Repositories;

use Dryval\ValidationException;
use YA\Contracts\ServiceRepositoryInterface;
use YA\Contracts\YAServiceFactoryInterface;

class ServiceRepository implements ServiceRepositoryInterface {

    /**
     * @var array
     */
    protected $serviceTypes = [
        'domain' => 'YA\Services\Hosting\DomainService',
        'hosting' => 'YA\Services\Hosting\HostingService',
        'seo' => 'YA\Services\Hosting\SEOService',
        'ssl' => 'YA\Services\Hosting\SSLService'
    ];

    public function __construct(YAServiceFactoryInterface $serviceFactory) {
        $this->serviceFactory = $serviceFactory;
    }

    /**
     * @return array
     */
    public function getServiceTypes() {
        return $this->serviceTypes;
    }

    /**
     * @param $service
     * @return bool
     */
    protected function validService($service) {
        return array_key_exists($service, $this->serviceTypes);
    }

    /**
     * @param array $attributes
     * @return mixed
     * @throws \Dryval\ValidationException
     */
    public function create(array $attributes) {

        if (!$this->validService($attributes[ 'type' ])) {
            throw new ValidationException('Invalid service type.');
        }

        return $this->serviceFactory->create($attributes);
    }

} 