<?php
/**
 * Created by PhpStorm.
 * User: matt
 * Date: 5/12/14
 * Time: 7:58 PM
 */

namespace YA\Factories;

use YA\Contracts\YAServiceFactoryInterface;
use YA\Services\Hosting\DomainService;
use YA\Services\Hosting\HostingService;
use YA\Services\Hosting\SEOService;
use YA\Services\Hosting\SSLCertificateService;

class YAServiceFactory implements YAServiceFactoryInterface {

    public function create($attributes) {
        switch ($attributes['type']) {

            case 'domain':
                return DomainService::create($attributes);
                break;

            case 'hosting':
                return HostingService::create($attributes);
                break;

            case 'seo':
                return SEOService::create($attributes);
                break;

            case 'ssl':
                return SSLCertificateService::create($attributes);
                break;
        }
    }
} 