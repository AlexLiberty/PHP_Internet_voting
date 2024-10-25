<?php
$filename = 'votes.txt';

if (file_exists($filename)) {
    $data = unserialize(file_get_contents($filename));
    $totalVotes = array_sum($data['votes']);

    echo "<table style='border-collapse: collapse; width: 50%; margin: 0 auto;'>";
    echo "<tr><th style='border: 1px solid black; padding: 8px;'>Мова</th><th style='border: 1px solid black; padding: 8px;'>Голосів (%)</th><th style='border: 1px solid black; padding: 8px;'>Відсоток</th></tr>";
    foreach ($data['votes'] as $language => $votes)
    {
        $percentage = round(($votes / $totalVotes) * 100, 2);
        echo "<tr>
                <td style='border: 1px solid black; padding: 8px;'>$language</td>
                <td style='border: 1px solid black; padding: 8px;'>
                    <div style='width: {$percentage}%; background-color: #4CAF50; height: 15px;'>&nbsp;</div>
                </td>
                <td style='border: 1px solid black; padding: 8px;'>$percentage%</td>
              </tr>";
    }

    echo "</table>";

    echo "<br>" . "Загальна кількість проголосувавших: {$totalVotes}";
}
else
{
    echo "Голоси відсутні.";
}
?>

