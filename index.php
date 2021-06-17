<?php

declare(strict_types=1);

require __DIR__.'/vendor/autoload.php';

use Knp\Snappy\Pdf;

lambda(static function (array $event) {
    $pdf = new Pdf('/opt/wkhtmltopdf');

    $options = [
        'encoding' => 'utf-8',
        'page-size' => 'A4',
        'margin-bottom' => 0,
        'margin-left' => 0,
        'margin-top' => 0,
        'margin-right' => 0,
        'disable-smart-shrinking' => true,
        'disable-javascript' => true,
    ];

    if (isset($event['options'])) {
        $options = \array_merge(
            $options,
            \json_decode($event['options'], true)
        );
    }

    $output = $pdf->getOutputFromHtml($event['html'], $options);

    if (empty($output)) {
        throw new \RuntimeException('Unable to generate the html');
    }

    return \base64_encode($output);
});
