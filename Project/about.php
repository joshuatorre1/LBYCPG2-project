<?php
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Donasyon</title>
        <link rel="stylesheet" type="text/css" href="assets/stylesheets/landing.css">
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
        <style>
            .container {
                width: 100%;
                height: 800px;
                display: flex;
                justify-content: center;
            }
            .p-container {
                position: relative;
                width: 50%;
                height: 300px;
                padding: 0.5rem 2.5rem;
                border-radius: 2rem;
                box-shadow: 0 9px 26px rgba(20, 121, 255, 0.25);
                transform: translateY(-70px);
            }
            p {
                text-align: center;
            }
        </style>
    </head>
    <body>
    <div id="nav-placeholder">

    </div>
    <script>
        $(function(){
            $("#nav-placeholder").load("navbar.php");
        });
    </script>

    <div class="container">
        <div class="p-container">
            <p>
                MatchingPillars is a Philippine-based social and technological company that aims to bridge the gap between the marginalized and the masses, with the goal of providing the necessary care and compassion to provide social awareness with the contemporary issues happening within the national setting. Managed by its founders, and currently the lead developers of the flagship project HANDOG, Joshua Torre and J-em Pareja continue to strive towards achieving social stability and curbing unrest during the trying times of the regular Filipino. Through HANDOG, the flagship project of lead developers Torre and Pareja, a centralized donation hub was created wherein contemporary issues happening within the country are presented to the visitors. HANDOG has partnered with multiple non-profit organizations recognized as legitimately registered through the Department of Social Welfare and Development. HANDOG aims to provide an ease of monitoring of inventory for its partner organizations, while exemplifying transparancy of records by publicly sharin the donations of individuals under a particular issue.
            </p>
        </div>
    </div>
    </body>
</html>