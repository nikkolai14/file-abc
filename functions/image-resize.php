<?php

require $_SERVER['DOCUMENT_ROOT'] .  '/vendor/autoload.php';

require_once($_SERVER['DOCUMENT_ROOT'] . '/configs/service.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/utilities/get-guest-file.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/utilities/add-converted-file.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/configs/file.php');

global $uploadDir;
global $downloadsDir;
global $api2ConvertMasterApiKey;

$file = getGuestFileById($_GET['id']);

if (empty($file)) {
    header('Location: /');
    exit;
}

$config = new \OnlineConvert\Configuration();
$config->setApiKey('main', $api2ConvertMasterApiKey);

$config->downloadFolder = $downloadsDir;

$client = new \OnlineConvert\Client\OnlineConvertClient($config, 'main');
$syncApi = new \OnlineConvert\Api($client);
$outputEndpoint = $syncApi->getOutputEndpoint();

$filePath = $uploadDir . $file[0]['file_name'];

$resizeOptions = [
    'options' => [
        'resize_by' => 'px',
        'width' => (int) $_POST['image-resize-width'],
        'height' => (int) $_POST['image-resize-height']
    ]
];

$conversions = [
    'jpg' => [
        'target' => 'jpg'
    ],
    'png' => [
        'target' => 'png'
    ]
];

$conversions[$_POST['image-resize-save-as']] = array_merge(
    $conversions[$_POST['image-resize-save-as']],
    $resizeOptions
);

$syncJob = [
	'input' => [
        [
            'type' => \OnlineConvert\Endpoint\InputEndpoint::INPUT_TYPE_UPLOAD,
            'source' => $filePath 
        ]
	],
	'conversion' => [$conversions[$_POST['image-resize-save-as']]]
];

$job = $syncApi->postFullJob($syncJob)->getJobCreated();

$outputEndpoint->downloadOutputs($job);

$convertedFilePath = $job['output'][0]['id'] . '/';
$convertedFilePath .= $job['output'][0]['filename'];

addConvertedFile($_GET['id'], $convertedFilePath);

header('Location: /success.php?id=' . $_GET['id']);
exit;