<!DOCTYPE html>
<html>

<?php
    session_start();
    if($_SESSION['mmflag']==1){
        $TTLS = $_SESSION['TTLS'];
        $HBS = $_SESSION['HBS'];
        $TP = $_SESSION['TP'];
        $OMDHAF = $_SESSION['OMDHAF'];
    }
?>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8">
    <link rel="stylesheet" href="css/illusions_des.css">
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="img/mys_icon.png" type="image/png">
    <title>Mysterious Melody</title>
</head>

<body>
    <nav class="navbar">
        <a class="navbarbtn" href="overview_page.html">HOME</a>
        <div class="dropdown">
            <button class="dropbtn">LIST
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="Shepard_tone.html">Shepard's Tone</a>
                <a href="Octave_illusion.php">Octave Illusion</a>
                <a href="Scale_illusion.html">Scale Illusion</a>
                <a href="Mysterious_melody.php">Mysterious Melody</a>
                <a href="Tritone_paradox.php">Tritone Paradox</a>
                <a href="Timbre_illusion.html">Timbre Illusion</a>
                <a href="DPOAE.html">DPOAE</a>
                <a href="Continuity_illusion.html">Continuity Illusion</a>
                <a href="Interleaved_melodies.php">Interleaved Melodies</a>
                <a href="Binaural_beats.html">Binaural Beats</a>
            </div>
        </div>
        <a class="navbarbtn" href="about_us.html">ABOUT US</a>
    </nav>

    <h1>Mysterious Melody</h1>
    <h3>Illusion description</h3>
    <hr>
    <div class="gridcontainer">
        <div class="textbox">
            <p> 
            <b>What is it?</b>
            <br>
            The mysterious melody illusion was first discovered in 1972 by Diana Deutsch. 
            A familiar tune was modified so that the notes were randomly scattered between three different octaves<sup>1</sup> . 
            When not informed what the tune was, listeners struggled to identify it, however once told they were able to hear the tune easily. 
            Listen to our recreation of the illusion here.
            <br>
            <br>
                <audio controls>
                    <source src="sound_files/mysterious_melody.mp3" type="audio/mpeg">
                </audio>
            <br>
            <br>
            <br>
            <b>What does this tell us about human hearing?</b>
            <br>
            The most important factors that determine our ability to recognise a familiar tune are the pattern of rising and falling pitch (the contour of the tune), the intervals between notes and the pitch chroma of the notes (read more about pitch chroma here). 
            In this experiment<sup>2</sup>, Deutsh transposed familiar melodies, preserving intervals and pitch chroma but randomly changing which octave each note was played in. 
            In the absence of prior information (being told what tune they were listening to), subjects were unable to identify the melodies. 
            This led Deutsch to conclude that ‘tune recognition takes place along a channel which is independent from that which gives rise to octave generalisation’. 
            <br>
            <br>
            As octave generalisation simply refers to our ability to recognise notes separated by octaves as being similar - in essence, acknowledging pitch chroma - this means preserving the pitch chroma of notes whilst their octave is altered is not sufficient to allow us to recognise a melody. 
            However, subjects were able to use octave generalisation to confirm the identity of a tune when first told what the tune was!  
            <br>
            <br>
            The significance of the prior information here, enabling us to perceive the familiar melody, demonstrates how top-down processing (the use of prior knowledge and context to process stimuli) plays a role in tune recognition.
            <br>
            <br>
            <br>
            <b>References</b>
            <ol>
                <li></li>
            </ol>
            </p>
        </div>


        <div class="poll">
                <span>Can you identify the correct melody?</span><br>
                <form action="mm.php" method="POST">
                    <input type="radio" name="mm" value="0" id="TTLS" required>
                    <label for="TTLS">Twinkle Twinkle Little Star</label><br>

                    <input type="radio" name="mm" value="1" id="HBS">
                    <label for="HBS">Happy Birthday Song</label><br>

                    <input type="radio" name="mm" value="2" id="TP">
                    <label for="TP">The Entertainer</label><br>

                    <input type="radio" name="mm" value="3" id="OMDHAF">
                    <label for="OMDHAF">Old McDonald Had A Farm</label><br>

                    <input type="submit" value="Submit" class="submit">
                </form>

                <?php 
                if($_SESSION['mmflag']==1){ echo "<br>Correct answer: The Entertainer";
                ?>
                    <div id="piechart"></div>
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    <script type="text/javascript">
                        google.charts.load('current', {'packages':['corechart']});
                        google.charts.setOnLoadCallback(drawChart);

                        function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                            ['Results', 'Responses'],
                            ['Twinkle Twinkle Little Star', <?php echo $TTLS; ?>],
                            ['Happy Birthday Song', <?php echo $HBS; ?>],
                            ['The Entertainer', <?php echo $TP; ?>],
                            ['Old McDonald Had A Farm', <?php echo $OMDHAF; ?>]
                            ]);

                            var options = {
                                'title': 'Results',
                                'titleTextStyle': {color:'#f2f2f2',fontSize:17, fontName:'Lato'},
                                'colors': ['#D52345', '#228CD5', '#23D5B3','#e8e227'],
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
                <?php } ?>
        </div>

    </div>
    
</body>
</html>

