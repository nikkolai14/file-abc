<?php

require $_SERVER['DOCUMENT_ROOT'] .  '/vendor/autoload.php';

require_once($_SERVER['DOCUMENT_ROOT'] . '/configs/service.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/utilities/get-guest-file.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/utilities/add-converted-file.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/configs/file.php');

function convertImgtoText($fileId) {
    global $uploadDir;
    global $downloadsDir;
    global $api2ConvertMasterApiKey;

    $file = getGuestFileById($fileId);

    if (empty($file)) {
        header('Location: /');
        exit;
    }

    try {
        $config = new \OnlineConvert\Configuration();
        $config->setApiKey('main', $api2ConvertMasterApiKey);

        $config->downloadFolder = $downloadsDir;

        $client = new \OnlineConvert\Client\OnlineConvertClient($config, 'main');
        $syncApi = new \OnlineConvert\Api($client);
        $outputEndpoint = $syncApi->getOutputEndpoint();

        $filePath = $uploadDir . $file[0]['file_name'];

        $conversions = [
            'target' => 'txt',
            'options' => [
                'ocr' => true,
                'language' => 'eng',
                'ocr_engine' => 'red_kiwi'
            ]
        ];

        $syncJob = [
            'input' => [
                [
                    'type' => \OnlineConvert\Endpoint\InputEndpoint::INPUT_TYPE_UPLOAD,
                    'source' => $filePath 
                ]
            ],
            'conversion' => [$conversions]
        ];

        $job = $syncApi->postFullJob($syncJob)->getJobCreated();

        $outputEndpoint->downloadOutputs($job);

        $convertedFilePath = $job['output'][0]['id'] . '/';
        $convertedFilePath .= $job['output'][0]['filename'];

        addConvertedFile($fileId, $convertedFilePath);

        return true;
    } catch(Exception $e) {
        echo $e->getMessage();
        return false;
    }
}