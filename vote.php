<?php
$ip = $_SERVER['REMOTE_ADDR'];
$filename = 'votes.txt';

if (file_exists($filename)) {
    $data = unserialize(file_get_contents($filename));

    if (isset($data['ips'][$ip]))
    {
        $data['ips'][$ip]['attempts']++;
        file_put_contents($filename, serialize($data));

        if ($data['ips'][$ip]['attempts'] == 2)
        {
            $message = "Ви вже проголосували!";
        }
        else
        {
            $message = "Шахрайська морда!!!<br> Стаття 158 кримінального кодексу Укрїни!!!<br> від 3-5 років ;)";
        }

        echo "
            <!DOCTYPE html>
            <html lang='ua'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Помилка</title>
                <style>
                    body {
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        height: 100vh;
                        margin: 0;
                        background-color: darkgrey;
                        color: white;
                        font-size: 5em;
                        text-align: center;
                    }
                    .message {
                        background-color: darkred;
                        padding: 20px;
                        border-radius: 10px;
                        box-shadow: 0 0 20px rgba(0, 0, 0, 0.8);
                    }
                </style>
            </head>
            <body>
                <div class='message'>
                    $message
                </div>
            </body>
            </html>
        ";
        exit;
    }
    else
    {
        $data['ips'][$ip] = ['attempts' => 1];
    }
}
else
{
    $data = ['votes' => [], 'ips' => []];
}

$language = $_POST['language'];
$data['votes'][$language] = isset($data['votes'][$language]) ? $data['votes'][$language] + 1 : 1;
$data['ips'][$ip]['attempts'] = 1;
file_put_contents($filename, serialize($data));
header("Location: index.php");
exit;
?>
