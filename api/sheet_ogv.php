<?php

require_once __DIR__ . '/vendor/autoload.php';

$client = new Google_Client();
$client->setApplicationName('Google Sheets and PHP');
$client->setScopes([Google_Service_Sheets::SPREADSHEETS]);
$client->setAccessType('offline');
$client->setAuthConfig(__DIR__ . '/credentials.json');
$sheet_service = new Google_Service_Sheets($client);

$spreadsheetIds = [
    'CC' => "1fWJWmYv836zI40Zj1s3nJjBPYtMgFoo3q7xN93GFbao",
    'CN' => "150GQ_rljjIjwNUknwklfEu5xWoAyDap7Pei8UYaV1OA",
    'CS' => "1o7Hu1gu52K4Ntfp8X8ay5NyriMBY8sRQumVmr2RistI",
    'USJ' => "1-tRj_IqaWXO2Y8mHaPVMoovVY9e3ynLq0aVG8EzhKTA",
    'Kandy' => "1T_49zxTbtnveHRtjyDoBzfbfpeHGlHDpG0-YT2Mygr8",
    'Ruhuna' => "1tFQOE9MaOCmoDKiIeSEh665NdALzyvBxvsUxpH3e4U8",
    'SLIIT' => "1LOxyUhPybwWEftugJIVnM2bOnQRzlpuj0Nr0Px7iB7A",
    'NSBM' => "1CyPankUjC2JgvpfufyZYV00dPLX145fUEs4AWqJK6Lo",
    'NIBM' => "1c1jqqbt2iokOEz1vZPOHwyv1-1W3b5cH5i8HTyBUAhM",
    'Rajarata' => "1tQ3gzsGut95RzdJ7pVUgMxd0ym9pYdmtBXjffTP0cMA",
];

$spreadsheetId = "1I_AKWwt99k5NiecKtkaN94Jiz9G21yARMJKiRr7DjD0";

function append($values, $entity){

    global $sheet_service;
    global $spreadsheetId;
    global $spreadsheetIds;

    if (array_key_exists($entity, $spreadsheetIds)){
        $spreadsheetId = $spreadsheetIds[$entity];
    }

    $body = new Google_Service_Sheets_ValueRange([
        'values' => $values
    ]);

    $all_values = $values;
    array_splice( $all_values[0], 1, 0, [$entity] ); // splice in at position 3
    $all_body = new Google_Service_Sheets_ValueRange([
        'values' => $all_values
    ]); 
    

    $params = [
        'valueInputOption' => 'USER_ENTERED'
    ];

    $range = 'A:E';

    //Append to all sheet
    $result = $sheet_service->spreadsheets_values->append("1sfx2AW_eFqgAZipFMBW5gU5vgzxIQKAVcz7MVDIldRg",
        $range, $all_body, $params);

    //Append to entity sheet (or other)
    $result = $sheet_service->spreadsheets_values->append($spreadsheetId, $range, $body, $params);
    if($result->getUpdates()->getUpdatedCells() == 7){
        return true;
    }

    return false;

}



?>
