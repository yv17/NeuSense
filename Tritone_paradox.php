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
                <a href="DPOAE.html">DPOAE</a>
                <a href="Continuity_illusion.html">Continuity Illusion</a>
                <a href="Interleaved_melodies.html">Interleaved Melodies</a>
                <a href="Binaural_beats.html">Binaural Beats</a>
            </div>
        </div>
        <a class="navbarbtn" href="about_us.html">ABOUT US</a>
    </nav>

    <h1>Tritone Paradox</h1>
    <h3>Illusion description</h3>
    <hr>
    <div class="gridcontainer">
        <div class="textbox">
        <b>What is the tritone paradox? </b>
        <br>
        <br>
        This illusion is best heard in groups! (But don’t worry if you are on your own). You will hear two consecutive tones and you must decide whether you think they are ascending or descending in pitch. You might find that other people disagree with you… 
        <audio controls>
                <source src="sound_files/tritone.mp3" type="audio/mpeg">
        </audio>     
        <br>
        <br>
        <b>What is going on? </b>
        <br>
        <br>
        This illusion is based on the same concepts that underlie the Shepard tones, which you may have already listened to. The fundamental idea is that pitch is not just a linear scale of frequency, as often assumed, but actually possesses two dimensions: pitch height (which octave a tone belongs) and pitch chroma (where a tone lies in the octave). This is perhaps best demonstrated by the pitch helix shown below. 

        Octave: Notes A through to G#, though can start and finish at any note. An A on a higher octave has double the frequency of an A below. (eg 440Hz in first octave and 880Hz in the next)1
        <br>
        <br>
        Roger Shepard created complex tones that consist of multiple harmonics and are attenuated to fit a bell shaped curve. The results were tones that became ambiguous in relation to pitch height so people could only judge the tone based on a pitch circle. This meant the helix had collapsed into a circle! 
        People generally hear an ascending pattern if the shortest vector between two tones travels clockwise and a descending pattern if it is anticlockwise. In this illusion, the two tones are equidistant apart, for example C and F#. This is a tritone. Now it is unclear whether they are going up or down in pitch, does the vector go clockwise or anticlockwise?  
        <br>
        <br>
        <b>What is in the research? </b>
        <br>
        Diana Deutsch proposed the idea that people orientate their pitch class circle differently. For example one person may have the note C in the 12 o’clock position but another may have F in the 12 o’clock position. Subsequently, this appears to affect how they perceive a pitch change between a tritone, for example one would hear C - F# as ascending but the other person would hear it descending.2 
        Deutch conducted further research and found evidence that the orientation of pitch class and tritone perception was related to linguistic exposure and particularly, the language people were exposed to at an early age. She took two groups of Vietnamese speakers (a tonal language), one group that had come to the US from Vietnam as an adult and one that had grown up in the US but had still been exposed to Vietnamese, and compared them to a group of native English speakers in California. She found that the two groups of Vietnamese speakers perceived the tritone similarly, despite growing up in different places. They also significantly differed from the native Californian English group3. 
        Research by Stephanie Malek seeked to theorise a different model that could explain pitch circularity and the tritone paradox. She used the psychoacoustic idea of virtual pitch. This idea says that when we hear a complex tone that is composed of multiple frequencies, such as a Shepard tone, we extract the greatest common divisor between the multiple frequencies and perceive this ‘virtual pitch’.
        For example if the frequencies 100 Hz, 200Hz, and 400Hz were played as complex tone, the greatest common divisor is 100Hz, and we would perceive the pitch at 100Hz. She couples the idea of virtual pitch with a probabilistic threshold model to account for the different perceptions that people have4.
        Finally, a study by Shimizu et al investigated the neuronal response to Shepard tones using fMRI. They were particularly interested in the areas involved in maintaining the illusion of pitch circularity. They identified areas in the auditory cortex, temporal lobes and surprisingly in the occipital cortex (which is usually connected to vision). One of the unique aspects of the study was that the team developed a method of measuring activation over a long period of time in fMRI, which had been difficult beforehand5.   
        <br>
        <br>
        <b>References</b>
        <ol>
            <li>Britannica Editors, 2010, https://www.britannica.com/art/octave-music, Encyclopaedia Britannica
            </li>
            <li>Deutsch, D., 1992, Paradoxes of musical pitch, Scientific American</li>
            <li>Deutsch, D., Henthorn T. and Dolson, M., 2004, Speech patterns heard early in life influence later perception of the tritone paradox. Music Perception</li>
        </ol>
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