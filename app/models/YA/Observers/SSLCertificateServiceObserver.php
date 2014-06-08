<?php
/**
 * Created by PhpStorm.
 * User: matt
 * Date: 5/3/14
 * Time: 8:52 PM
 */

namespace YA\Observers;

use Carbon\Carbon;
use Prologue\Alerts\Facades\Alert;

class SSLCertificateServiceObserver {

    public function creating($service) {

        try {

            $g = stream_context_create(array("ssl" => array("capture_peer_cert" => true)));
            $r = stream_socket_client(
                "ssl://" . $service->domain . ":443",
                $errno,
                $errstr,
                30,
                STREAM_CLIENT_CONNECT,
                $g
            );
            $cont = stream_context_get_params($r);

            $cert_info = openssl_x509_parse($cont[ "options" ][ "ssl" ][ "peer_certificate" ]);

            $service->provider = $cert_info[ 'issuer' ][ 'CN' ];
            $service->expires = date('Y-m-d H:i:s', $cert_info['validTo_time_t']);
            $service->launch_date = date('Y-m-d H:i:s', $cert_info['validFrom_time_t']);
            $service->provider = $cert_info[ 'issuer' ][ 'O' ];

        } catch (\ErrorException $e) {

            Alert::error('The provided domain does not have an SSL certificate installed.')->flash();
            return false;
        }
    }
}