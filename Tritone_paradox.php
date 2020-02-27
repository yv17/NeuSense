<!DOCTYPE html>
<html>

<?php
    session_start();
    if($_SESSION['tpflag']==1){
        $atp1 = $_SESSION['atp1'];
        $dtp1 = $_SESSION['dtp1'];
        $atp2 = $_SESSION['atp2'];
        $dtp2 = $_SESSION['dtp2'];
        $atp3 = $_SESSION['atp3'];
        $dtp3 = $_SESSION['dtp3'];
    }
?>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/illusions_des.css">
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
</head>

<body>
    <nav class="navbar">
        <a class="navbarbtn" href="overview_page.html">HOME</a>
        <div class="dropdown">
            <button class="dropbtn">LIST
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="Ascending_pitch.html">Ascending Pitch</a>
                <a href="Octave_illusion.php">Octave Illusion</a>
                <a href="Scale_illusion.html">Scale Illusion</a>
                <a href="Scale_illusion.html">Mysterious Melody</a>
                <a href="Tritone_paradox.php">Tritone Paradox</a>
                <a href="Timbre_illusion.html">Timbre Illusion</a>
            </div>
        </div>
        <a class="navbarbtn" href="about_us.html">ABOUT US</a>
    </nav>

    <h1>Tritone Paradox</h1>
    <h3>Illusion description</h3>
    <hr>
    <div class="gridcontainer">
        <div class="textbox">  
            <audio controls>
                <source src="sound_files/tritone.mp3" type="audio/mpeg">
            </audio>     
        </div>

        <div id="tp_poll">
            <form action="tp.php" method="POST">
                <p>Tone 1:</p>
                <input type="radio" name="tp1" value="0" required> Ascending<br>
                <input type="radio" name="tp1" value="1"> Descending<br>

                <p>Tone 2:</p>
                <input type="radio" name="tp2" value="0" required> Ascending<br>
                <input type="radio" name="tp2" value="1"> Descending<br>

                <p>Tone 3:</p>
                <input type="radio" name="tp3" value="0" required> Ascending<br>
                <input type="radio" name="tp3" value="1"> Descending<br>
                <input type="submit" value="Submit">
            </form>

            <?php if($_SESSION['tpflag']==1){ ?>
                <div id="piechart"></div>
                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                <script type="text/javascript">
                    google.charts.load('current', {'packages':['corechart']});
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                        ['Results', 'Responses'],
                        ['Ascending', <?php echo $atp1; ?>],
                        ['Descending', <?php echo $dtp1; ?>]
                        ]);

                        var options = {
                                'title': 'Results 1',
                                'titleTextStyle': {color:'#f2f2f2',fontSize:17, fontName:'Lato'},
                                'colors': ['#23D5B3', '#D52345'],
                                'width':350, 'height':300, 
                                'pieHole':0.4,
                                'pieSliceText':'none',
                                'slices': {0: {offset: 0}, 1: {offset: 0}},
                                'chartArea':{left:'1vw',top:'0vw',width:'10vw',height:'10vw'},
                                'legend':{position: 'right', textStyle: {color: '#f2f2f2', fontSize: 11, fontName:'Lato'}},
                                backgroundColor: { fill:'transparent' }
                        };
                        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                        chart.draw(data, options);
                    }
                </script>
                <div id="piechart2"></div>
                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                <script type="text/javascript">
                    google.charts.load('current', {'packages':['corechart']});
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                        ['Results', 'Responses'],
                        ['Ascending', <?php echo $atp2; ?>],
                        ['Descending', <?php echo $dtp2; ?>]
                        ]);

                        var options = {
                                'title': 'Results 2',
                                'titleTextStyle': {color:'#f2f2f2',fontSize:17, fontName:'Lato'},
                                'colors': ['#23D5B3', '#D52345'],
                                'width':350, 'height':300, 
                                'pieHole':0.4,
                                'pieSliceText':'none',
                                'slices': {0: {offset: 0}, 1: {offset: 0}},
                                'chartArea':{left:'1vw',top:'0vw',width:'10vw',height:'10vw'},
                                'legend':{position: 'right', textStyle: {color: '#f2f2f2', fontSize: 11, fontName:'Lato'}},
                                backgroundColor: { fill:'transparent' }
                        };
                        var chart = new google.visualization.PieChart(document.getElementById('piechart2'));
                        chart.draw(data, options);
                    }
                </script>
                <div id="piechart3"></div>
                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                <script type="text/javascript">
                    google.charts.load('current', {'packages':['corechart']});
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                        ['Results', 'Responses'],
                        ['Ascending', <?php echo $atp3; ?>],
                        ['Descending', <?php echo $dtp3; ?>]
                        ]);

                        var options = {
                                'title': 'Results 3',
                                'titleTextStyle': {color:'#f2f2f2',fontSize:17, fontName:'Lato'},
                                'colors': ['#23D5B3', '#D52345'],
                                'width':350, 'height':300, 
                                'pieHole':0.4,
                                'pieSliceText':'none',
                                'slices': {0: {offset: 0}, 1: {offset: 0}},
                                'chartArea':{left:'1vw',top:'0vw',width:'10vw',height:'10vw'},
                                'legend':{position: 'right', textStyle: {color: '#f2f2f2', fontSize: 11, fontName:'Lato'}},
                                backgroundColor: { fill:'transparent' }
                        };
                        var chart = new google.visualization.PieChart(document.getElementById('piechart3'));
                        chart.draw(data, options);
                    }
                </script>
            <?php } ?>
        </div>
    </div>
    
</body>

</html>