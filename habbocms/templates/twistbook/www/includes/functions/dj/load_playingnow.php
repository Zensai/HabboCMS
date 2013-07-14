<?php

$server = "178.32.3.53:1122";
$user = "admin";
$passw = "Scalda!";
$mountpoint = "/listen.mp3";

$fp = fopen("http://$user:$passw@$server/admin/stats","r")
         or die("Error reading Icecast data from $server.");

while(!feof($fp))
{
     $data .= fread($fp, 8192);
}

fclose($fp);

// Now parse the XML output for our mountpoint
$xml_parser = xml_parser_create();
xml_parse_into_struct($xml_parser, $data, $vals, $index);
xml_parser_free($xml_parser);

$params = array();
$level = array();
foreach ($vals as $xml_elem) {
     if ($xml_elem['type'] == 'open') {
        if (array_key_exists('attributes',$xml_elem)) {
            list($level[$xml_elem['level']],$extra) = 
array_values($xml_elem['att
ributes']);
         } else {
             $level[$xml_elem['level']] = $xml_elem['tag'];
         }
     }
     if ($xml_elem['type'] == 'complete') {
         $start_level = 1;
         $php_stmt = '$params';
         while($start_level < $xml_elem['level']) {
             $php_stmt .= '[$level['.$start_level.']]';
             $start_level++;
         }
         $php_stmt .= '[$xml_elem[\'tag\']] = $xml_elem[\'value\'];';
         eval($php_stmt);
     }
}

$listeners = $params['ICESTATS'][$mountpoint]['LISTENERS'];
$currenttrack = $params['ICESTATS'][$mountpoint]['TITLE'];

echo "$listeners listeners are currently connected.";
echo "<br />";
echo "Currently playing: $currenttrack";

?>
