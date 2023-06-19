<?php

$Black = "\033[0;30m";        # Black
$Red = "\033[0;31m";          # Red
$Green = "\033[0;32m";        # Green
$Yellow = "\033[0;33m";       # Yellow
$Blue = "\033[0;34m";         # Blue
$Purple = "\033[0;35m";       # Purple
$Cyan = "\033[0;36m";         # Cyan
$White = "\033[0;37m";        # White
$normal = "\033[0m";

echo "$White
                                 __                   
                                /\ \__                
 ____       __    __  _   _ __  \ \ ,_\   __  __  __  
/\_ ,`\   /'__`\ /\ \/'\ /\`'__\ \ \ \/  /\ \/\ \/\ \ 
\/_/  /_ /\  __/ \/>  </ \ \ \/   \ \ \_ \ \ \_/ \_/ \
  /\____\\ \____\ /\_/\_\ \ \_\    \ \__\ \ \___x___/'
  \/____/ \/____/ \//\/_/  \/_/     \/__/  \/__//__/                                       
Discord Username Random Available Checker \n
" . $normal;

$characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890'; 
echo $White . "Token Discord : " . $normal;
$token = trim(fgets(STDIN));
echo $White . "Min Length : " . $normal;
$minLength = trim(fgets(STDIN));
echo $White . "Max Length : " . $normal;
$maxLength = trim(fgets(STDIN));

echo $White . "How Much Username : " . $normal;
$numberOfWords = trim(fgets(STDIN));

for ($i = 0; $i < $numberOfWords; $i++) {
    $randomLength = rand($minLength, $maxLength);
    $randomWord = '';

    for ($j = 0; $j < $randomLength; $j++) {
        $randomIndex = rand(0, strlen($characters) - 1);
        $randomWord .= $characters[$randomIndex];
    }

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://discord.com/api/v9/users/@me/pomelo-attempt');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'authority: discord.com',
    'accept: */*',
    'accept-language: en-US,en;q=0.9',
    "authorization: $token",
    'content-type: application/json',
    'origin: https://discord.com',
    'referer: https://discord.com/channels/@me',
    'sec-ch-ua: "Not.A/Brand";v="8", "Chromium";v="114", "Google Chrome";v="114"',
    'sec-ch-ua-mobile: ?1',
    'sec-ch-ua-platform: "Android"',
    'sec-fetch-dest: empty',
    'sec-fetch-mode: cors',
    'sec-fetch-site: same-origin',
    'user-agent: Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36',
    'x-debug-options: bugReporterEnabled',
    'x-discord-locale: en-US',
    'x-discord-timezone: Asia/Bangkok',
    'x-super-properties: eyJvcyI6IldpbmRvd3MiLCJicm93c2VyIjoiQ2hyb21lIiwiZGV2aWNlIjoiIiwic3lzdGVtX2xvY2FsZSI6ImVuLVVTIiwiYnJvd3Nlcl91c2VyX2FnZW50IjoiTW96aWxsYS81LjAgKFdpbmRvd3MgTlQgMTAuMDsgV2luNjQ7IHg2NCkgQXBwbGVXZWJLaXQvNTM3LjM2IChLSFRNTCwgbGlrZSBHZWNrbykgQ2hyb21lLzExNC4wLjAuMCBTYWZhcmkvNTM3LjM2IiwiYnJvd3Nlcl92ZXJzaW9uIjoiMTE0LjAuMC4wIiwib3NfdmVyc2lvbiI6IjEwIiwicmVmZXJyZXIiOiIiLCJyZWZlcnJpbmdfZG9tYWluIjoiIiwicmVmZXJyZXJfY3VycmVudCI6IiIsInJlZmVycmluZ19kb21haW5fY3VycmVudCI6IiIsInJlbGVhc2VfY2hhbm5lbCI6InN0YWJsZSIsImNsaWVudF9idWlsZF9udW1iZXIiOjIwNjY1MywiY2xpZW50X2V2ZW50X3NvdXJjZSI6bnVsbH0=',
    'accept-encoding: gzip',
]);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"username":"'.$randomWord.'"}');

$response = curl_exec($ch);
$data = json_decode($response, true);

if ($data['taken'] === true) {
    echo "[" . date("h:i:s") . "]=>$Red Result =>$White $randomWord $Red telah diambil $White| Response : $response \n";
} elseif ($data['taken'] === false) {
    echo "[" . date("h:i:s") . "]=>$Green Result =>$White $randomWord $Green Username tersedia $White| Response : $response \n";
    file_put_contents('UsernameAvailable.txt', $randomWord . PHP_EOL, FILE_APPEND);
}   else {
    echo "[" . date("h:i:s") . "]=>$Red Result => Error! $White| Response : $response \n";
}
curl_close($ch);
}
