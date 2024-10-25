<?php
$filename = 'votes.txt';

if (file_exists($filename)) {
    $data = unserialize(file_get_contents($filename));
    $totalVotes = array_sum($data['votes']);

    echo "<table style='border-collapse: collapse; width: 50%; margin: 0 auto;'>";
    echo "<tr><th style='border: 1px solid black; padding: 8px;'>Мова</th><th style='border: 1px solid black; padding: 8px;'>Голосів (%)</th></tr>";
    foreach ($data['votes'] as $language => $votes) {
        $percentage = round(($votes / $totalVotes) * 100, 2);
        echo "<tr>
                <td style='border: 1px solid black; padding: 8px;'>$language</td>
                <td style='border: 1px solid black; padding: 8px;'>
                    <div style='width: 100%; height: 40px; position: relative;'>
                        <div style='width: {$percentage}%; background-color: forestgreen; height: 100%; position: absolute;'>
                            <span style='position: absolute; left: 65%; top: 50%; transform: translate(-50%, -50%); color: black;'>$percentage%</span>
                        </div>
                    </div>
                </td>
              </tr>";
    }

    echo "</table>";

    echo "<br>" . "Загальна кількість проголосувавших: {$totalVotes}";
} else {
    echo "Голоси відсутні.";
}
?>
