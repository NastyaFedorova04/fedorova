<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Календарь</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
<?php
function holidaydate($date)
{
    $holidays = [
        '01-01', '01-07', // Пример праздничных дней
        // Добавьте остальные праздничные дни в формате 'месяц-день'
    ];

    return in_array($date->format('m-d'), $holidays);
}

function wekkenddate($date) {
    $dayOfWeek = $date->format('N');
    return ($dayOfWeek == 6 || $dayOfWeek == 7);
}

function allholidays($date) {
    return wekkenddate($date) || holidaydate($date);
}

function calendar($month = null, $year = null) {
    
    if ($month === null) {
      $month = date('n');
    }
    if ($year === null) {
      $year = date('Y');
    }
  
    $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
  
    $firstDay = date('N', strtotime("$year-$month-01"));
  
    echo "<table>";
    echo "<tr><th colspan='7'>" . date('F Y', strtotime("$year-$month-01")) . "</th></tr>";
    echo "<tr><th>Пн</th><th>Вт</th><th>Ср</th><th>Чт</th><th>Пт</th><th class='weekend'>Сб</th><th class='weekend'>Вс</th></tr>";
  
    echo "<tr>";
    for ($i = 1; $i < $firstDay; $i++) {
      echo "<td></td>";
    }
  
    $currentDay = 1;
    for ($i = $firstDay; $i <= 7; $i++) {
      echo "<td";
      $date = new DateTime("$year-$month-$currentDay");
      if ($currentDay == date('j') && $month == date('n') && $year == date('Y')) {
        echo " class='current-day'";
      } elseif (allholidays($date)) {
        echo " class='highlighted-day'";
      }
      echo ">$currentDay</td>";
      $currentDay++;
    }
    echo "</tr>";
  
    while ($currentDay <= $daysInMonth) {
      echo "<tr>";
      for ($i = 1; $i <= 7 && $currentDay <= $daysInMonth; $i++) {
        echo "<td";
        $date = new DateTime("$year-$month-$currentDay");
        if ($currentDay == date('j') && $month == date('n') && $year == date('Y')) {
          echo " class='current-day'";
        } elseif (allholidays($date)) {
          echo " class='highlighted-day'";
        }
        echo ">$currentDay</td>";
        $currentDay++;
      }
      echo "</tr>";
    }
  
    echo "</table>";
}

// Пример использования функции для вывода календаря на текущий месяц
calendar();
?>