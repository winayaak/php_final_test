<?php

include 'db.php';
require 'vendor/autoload.php';

$results = $conn->query("SELECT * FROM book");

$pdf = new TCPDF();
$pdf->AddPage();
$pdf->SetFont('times', 'B', 15);

$html = '
<table border="1" cellspacing="0" cellpadding="5">
    <tr>
        <th>Book ID</th>
        <th>Title</th>
        <th>Author</th>
        <th>ISBN</th>
        <th>Category</th>
        <th>Price</th>
    </tr>';

while ($row = $results->fetch_assoc()) {

    $html .= '
    <tr>
        <td>' . $row['bid'] . '</td>
        <td>' . htmlspecialchars($row['title']) . '</td>
        <td>' . htmlspecialchars($row['author']) . '</td>
        <td>' . $row['isbn'] . '</td>
        <td>' . htmlspecialchars($row['category']) . '</td>
        <td>' . $row['price'] . '</td>
    </tr>';
}

$html .= '</table>';

$pdf->writeHTML($html, true, false, true, false, '');

$pdf->Output('books.pdf', 'I');

?>
