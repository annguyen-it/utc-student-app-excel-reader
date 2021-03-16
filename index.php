<!doctype html>
<html>

<head>
  <title>Document</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="description" content="Demo Project">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="stylesheet" href="./style.css"> -->


  <style>
    table,
    th,
    td {
      border: 1px solid black;
      border-collapse: collapse;
    }

    h1 {
      text-transform: uppercase;
    }

    #fixed {
      position: fixed;
      right: 0;
      top: 0;
    }

    #fixed>a {
      font-size: 25px;
    }
  </style>
</head>

<body>
  <?php

  try {
    $command = escapeshellcmd("python main.py");
    // echo $command;
  } catch (Exception $e) {
    echo $e;
  }

  $output = shell_exec($command);

  $json = json_decode($output, true);

  // print_r($json);

  $student_json = $json['student_json'];
  $module_class_json = $json['module_class_json'];
  $module_json = $json['module_json'];
  $participate_json = $json['participate_json'];
  $schedule_json = $json['schedule_json'];
  ?>

  <h1 id="student">Sinh viên</h1>
  <table>
    <thead>
      <td></td>
      <td>Mã sinh viên</td>
      <td>Họ tên</td>
      <td>Mã lớp</td>
      <td>Ngày sinh</td>
    </thead>
    <?php
    $i = 1;
    foreach ($student_json as $row) {
    ?>
      <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $row['ID_Student'] ?></td>
        <td><?php echo $row['Student_Name'] ?></td>
        <td><?php echo $row['ID_Class'] ?></td>
        <td><?php echo $row['DoB'] ?></td>
      </tr>
    <?php
      $i++;
    }
    ?>
  </table>

  <h1 id="module-class">Lớp học phần</h1>
  <table>
    <thead>
      <td></td>
      <td>Mã lớp học phần</td>
      <td>Tên lớp học phần</td>
      <td>Mã học phần</td>
      <td>Năm học</td>
    </thead>
    <?php
    $i = 1;
    foreach ($module_class_json as $row) {
    ?>
      <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $row['ID_Module_Class'] ?></td>
        <td><?php echo $row['Module_Class_Name'] ?></td>
        <td><?php echo $row['ID_Module'] ?></td>
        <td><?php echo $row['School_Year'] ?></td>
      </tr>
    <?php
      $i++;
    }
    ?>
  </table>

  <h1 id="modulee">Học phần</h1>
  <table>
    <thead>
      <td></td>
      <td>Mã học phần</td>
    </thead>
    <?php
    $i = 1;
    foreach ($module_json as $row) {
    ?>
      <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $row ?></td>
      </tr>
    <?php
      $i++;
    }
    ?>
  </table>

  <h1 id="participate">Sinh viên - lớp học phần</h1>
  <table>
    <thead>
      <td></td>
      <td>Mã sinh viên</td>
      <td>Mã lớp học phần</td>
    </thead>
    <?php
    $i = 1;
    foreach ($participate_json as $row) {
    ?>
      <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $row['ID_Student'] ?></td>
        <td><?php echo $row['ID_Module_Class'] ?></td>
      </tr>
    <?php
      $i++;
    }
    ?>
  </table>

  <h1 id="schedule">Lịch học</h1>
  <table>
    <thead>
      <td>Mã lớp học phần</td>
      <td>Mã phòng</td>
      <td>Ca</td>
      <td>Ngày học</td>
      <td>Số sinh viên</td>
    </thead>
    <?php
    foreach ($schedule_json as $row) {
    ?>
      <tr>
        <td><?php echo $row['ID_Module_Class'] ?></td>
        <td><?php echo $row['ID_Room'] ?></td>
        <td><?php echo $row['Shift_Schedules'] ?></td>
        <td><?php echo $row['Day_Schedules'] ?></td>
        <td><?php echo $row['Number_Student'] ?></td>
      </tr>
    <?php
      $i++;
    }
    ?>
  </table>

  <div id="fixed">
    <a href="#student">Sinh viên</a>
    <a href="#module-class">Lớp học phần</a>
    <a href="#modulee">Học phần</a>
    <a href="#participate">Sinh viên - lớp học phần</a>
    <a href="#schedule">Lịch học</a>
  </div>
</body>

</html>
