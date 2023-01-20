<?php include 'logincheckemp.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Services</title>
    <link rel="stylesheet" href="assets/css/stylesheet2.css">
</head>

<body>
    <?php include 'assets/header2.php'; ?>
    <?php include 'database/service_API.php'; ?>
    <?php
    $noOpen = "";
    $noInProgress = "";

    $openServices = getOpenServices();
    if (count($openServices) == 0) {
        $noOpen = "Geen services die nog behandeld moeten worden";
    }
    $inProgressServices = getInProgressServices();
    if (count($inProgressServices) == 0) {
        $noInProgress = "Geen lopende services";
    }
    ?>
    <div class="employeeContainer">
        <div class="titleBox">
            <h1>Overzicht</h1>
        </div>
        <h3>Open</h3>
        <?php
        if (!($noOpen == null)) {
            echo $noOpen;
        } else {
            for ($x = 0; $x < ceil((count($openServices) / 2)); $x++) {
                $type1 = $openServices[$x * 2]["service_type"];
                $description1 = $openServices[$x * 2]["description"];
                $date1 = $openServices[$x * 2]["date"];
                $time = strtotime($date1);
                $date = getdate($time);
                $dateFormatted = $date['mday'] . "-" . $date['mon'] . "-" . $date['year'];
                echo '
            <div class="row">
                <div class="serviceBox">
                <div class="service">
                <div class="serviceContentBox">
                <div class="serviceContent"><p>' . $type1 . '</p></div>
                <div class="serviceContent"><p>' . $description1 . '</p></div>
                <div class="serviceContent"><p class="dateText">' . $dateFormatted . '</p></div>
                </div>
                <input type="button" class="button4" value="Bekijk">
            </div>';
                if (isset($openServices[($x * 2) + 1])) {
                    $type2 = $openServices[($x * 2) + 1]["service_type"];
                    $description2 = $openServices[($x * 2) + 1]["description"];
                    $date2 = $openServices[($x * 2) + 1]["date"];
                    $time = strtotime($date2);
                    $date = getdate($time);
                    $dateFormatted = $date['mday'] . "-" . $date['mon'] . "-" . $date['year'];
                    echo '</div>
                <div class="serviceBox">
                <div class="service">
                <div class="serviceContentBox">
                <div class="serviceContent"><p>' . $type2 . '</p></div>
                <div class="serviceContent"><p>' . $description2 . '</p></div>
                <div class="serviceContent"><p class="dateText">' . $dateFormatted . '</p></div>
                </div>
                <input type="button" class="button4" value="Bekijk">
            </div>
            ';
                }
                echo '</div>
            </div>';
            }
        } ?>
        <h3>Bezig</h3>
        <?php
        if (!($noInProgress[0] == null)) {
        } else {
            for ($x = 0; $x < ceil((count($inProgressServices) / 2)); $x++) {
                $type1 = $inProgressServices[$x * 2]["service_type"];
                $description1 = $inProgressServices[$x * 2]["description"];
                $date1 = $inProgressServices[$x * 2]["date"];
                $time = strtotime($date1);
                $date = getdate($time);
                $dateFormatted = $date['mday'] . "-" . $date['mon'] . "-" . $date['year'];

                echo '
            <div class="row">
                <div class="serviceBox">
                <div class="service">
                <div class="serviceContentBox">
                <div class="serviceContent"><p>' . $type1 . '</p></div>
                <div class="serviceContent"><p>' . $description1 . '</p></div>
                <div class="serviceContent"><p class="dateText">' . $dateFormatted . '</p></div>
                </div>
                <input type="button" class="button4" value="Bekijk">
            </div>';

                if (isset($inProgressServices[($x * 2) + 1])) {
                    $type2 = $inProgressServices[($x * 2) + 1]["service_type"];
                    $description2 = $inProgressServices[($x * 2) + 1]["description"];
                    $date2 = $inProgressServices[($x * 2) + 1]["date"];
                    $time = strtotime($date2);
                    $date = getdate($time);
                    $dateFormatted = $date['mday'] . "-" . $date['mon'] . "-" . $date['year'];

                    echo '</div>
                <div class="serviceBox">
                <div class="service">
                <div class="serviceContentBox">
                <div class="serviceContent"><p>' . $type2 . '</p></div>
                <div class="serviceContent"><p>' . $description2 . '</p></div>
                <div class="serviceContent"><p class="dateText">' . $dateFormatted . '</p></div>
                </div>
                <input type="button" class="button4" value="Bekijk">
            </div>
            ';
                }
                echo '</div>
            </div>';
            }
        }
        ?>
    </div>
</body>

</html>