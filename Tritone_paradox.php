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
        $atp4 = $_SESSION['atp4'];
        $dtp4 = $_SESSION['dtp4'];
        if($_SESSION['tptextflag'] == 1){
            $tptext = $_SESSION['tptext'];
        }
    }
?>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8">
    <link rel="stylesheet" href="css/illusions_des.css">
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <link rel="icon" href="img/tri_icon.png" type="image/png">
    <title>Tritone Paradox</title>
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

    <h1>Tritone Paradox</h1>
    <h3>Illusion description</h3>
    <hr>
    <div class="gridcontainer">
        <div class="textbox">
        <b>What is the tritone paradox? </b>
        <br>
        <br>
        This illusion is best heard in groups! (But don’t worry if you are on your own). You will hear two consecutive tones and you must decide whether you think they are ascending or descending in pitch. You might find that other people disagree with you… 
        <br>
        <br>
        <audio controls>
                <source src="sound_files/tritone.mp3" type="audio/mpeg">
        </audio>     
        <br>
        <br>
        <br>
        <b>What is going on? </b>
        <br>
        <br>
        This illusion is based on the same concepts that underlie the Shepard tones, which you may have already listened to. The fundamental idea is that pitch is not just a linear scale of frequency, as often assumed, but actually possesses two dimensions: pitch height (which octave a tone belongs) and pitch chroma (where a tone lies in the octave). This is perhaps best demonstrated by the pitch helix shown below. 
        <br>
        <figure>
            <img src="img/tri1.png">
            <figcaption>Figure 1: The pitch helix. Demonstrates pitch chroma as a circle and pitch height forming a helix.</figcaption>
        </figure>
        <br>
        <i>Octave: Notes A through to G#, though can start and finish at any note. An A on a higher octave has double the frequency of an A below. (eg 440Hz in first octave and 880Hz in the next)<sup>1</sup></i>  
        <br>
        <br>
        Roger Shepard created complex tones that consist of multiple harmonics and are attenuated to fit a bell shaped curve. The results were tones that became ambiguous in relation to pitch height so people could only judge the tone based on a pitch circle. This meant the helix had collapsed into a circle! 
        <br>
        <br>
        <i>Harmonic: a note that has a positive integer multiple of the original note. For example if the original note has frequency 150 Hz, harmonics include 300 Hz (multiple of 2), 600 Hz (multiple of 4) and so forth.</i>
        <br>
        <br>
        People generally hear an ascending pattern if the shortest vector between two tones travels clockwise and a descending pattern if it is anticlockwise. In this illusion, the two tones are equidistant apart, for example C and F#. This is a tritone. Now it is unclear whether they are going up or down in pitch, does the vector go clockwise or anticlockwise? 
        <br>
        <figure>
            <img src="img/tri2.png">
            <figcaption>Figure 2. Demonstrates a tritone highlights in brown (C and F#). They are equidistant apart clockwise and anticlockwise.</figcaption>
        </figure> 
        <br>
        <br>
        <b>What is in the research? </b>
        <br>
        Diana Deutsch proposed the idea that people orientate their pitch class circle differently. For example one person may have the note C in the 12 o’clock position but another may have F in the 12 o’clock position. Subsequently, this appears to affect how they perceive a pitch change between a tritone, for example one would hear C - F# as ascending but the other person would hear it descending<sup>2</sup>.
        <br>
        <br>
        Deutch conducted further research and found evidence that the orientation of pitch class and tritone perception was related to linguistic exposure and particularly, the language people were exposed to at an early age. She took two groups of Vietnamese speakers (a tonal language), one group that had come to the US from Vietnam as an adult and one that had grown up in the US but had still been exposed to Vietnamese, and compared them to a group of native English speakers in California. She found that the two groups of Vietnamese speakers perceived the tritone similarly, despite growing up in different places. They also significantly differed from the native Californian English group<sup>3</sup>.
        <br>
        <br>
        Research by Stephanie Malek seeked to theorise a different model that could explain pitch circularity and the tritone paradox. She used the psychoacoustic idea of virtual pitch. This idea says that when we hear a complex tone that is composed of multiple frequencies, such as a Shepard tone, we extract the greatest common divisor between the multiple frequencies and perceive this ‘virtual pitch’.
        <br>
        <br>
        For example if the frequencies 100 Hz, 200Hz, and 400Hz were played as complex tone, the greatest common divisor is 100Hz, and we would perceive the pitch at 100Hz. She couples the idea of virtual pitch with a probabilistic threshold model to account for the different perceptions that people have<sup>4</sup>.
        <br>
        <br>
        Finally, a study by Shimizu et al investigated the neuronal response to Shepard tones using fMRI. They were particularly interested in the areas involved in maintaining the illusion of pitch circularity. They identified areas in the auditory cortex, temporal lobes and surprisingly in the occipital cortex (which is usually connected to vision). One of the unique aspects of the study was that the team developed a method of measuring activation over a long period of time in fMRI, which had been difficult beforehand<sup>5</sup>.   
        <br>
        <br>
        <br>
        <b>References</b>
        <ol>
            <li>Britannica Editors, 2010, https://www.britannica.com/art/octave-music, Encyclopaedia Britannica
            </li>
            <li>Deutsch, D., 1992, Paradoxes of musical pitch, Scientific American</li>
            <li>Deutsch, D., Henthorn T. and Dolson, M., 2004, Speech patterns heard early in life influence later perception of the tritone paradox. Music Perception</li>
            <li>Stephanie Malek, 2018, Pitch Class and Envelope Effects in the Tritone Paradox Are Mediated by Differently Pronounced Frequency Preference Regions, Frontiers in Psychology</li>
            <li>5.	Shimizu et al, 2007, Neuronal response to Shepard's tones. An auditory fMRI study using multifractal analysis, Brain Research</li>
        </ol>
    </div>

        <div class="poll">
            <form action="tp.php" method="POST">
                <span>Tone 1:</span><br>
                <input type="radio" name="tp1" value="0" id="tp1a" required>
                <label for="tp1a">Ascending</label><br>
                <input type="radio" name="tp1" value="1" id="tp1d">
                <label for="tp1d">Descending</label><br>
                <br>
                <span>Tone 2:</span><br>
                <input type="radio" name="tp2" value="2" id="tp2a" required>
                <label for="tp2a">Ascending</label><br>
                <input type="radio" name="tp2" value="3" id="tp2d">
                <label for="tp2d">Descending</label><br>
                <br>
                <span>Tone 3:</span><br>
                <input type="radio" name="tp3" value="4" id="tp3a" required>
                <label for="tp3a">Ascending</label><br>
                <input type="radio" name="tp3" value="5" id="tp3d">
                <label for="tp3d">Descending</label><br>
                <br>
                <span>Tone 4:</span><br>
                <input type="radio" name="tp4" value="6" id="tp4a" required>
                <label for="tp4a">Ascending</label><br>
                <input type="radio" name="tp4" value="7" id="tp4d">
                <label for="tp4d">Descending</label><br>

                <input type="submit" value="Submit" class="submit">
            </form>

            <?php if($_SESSION['tpflag']==1){ ?>
                <!--First pair of tritones-->
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
                                'title': 'Tritone pair 1',
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

                <!--Second pair of tritones-->
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
                                'title': 'Tritone pair 2',
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
                <!--Third pair of tritones-->
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
                                'title': 'Tritone pair 3',
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
                <!--Fourth pair of tritones-->
                <div id="piechart4"></div>
                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                <script type="text/javascript">
                    google.charts.load('current', {'packages':['corechart']});
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                        ['Results', 'Responses'],
                        ['Ascending', <?php echo $atp4; ?>],
                        ['Descending', <?php echo $dtp4; ?>]
                        ]);

                        var options = {
                                'title': 'Tritone pair 4',
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
                        var chart = new google.visualization.PieChart(document.getElementById('piechart4'));
                        chart.draw(data, options);
                    }
                </script>
                
            <?php 
                if($_SESSION['tptextflag'] == 1){
                    echo 'Interesting statistics:<br><br>' . $tptext; 
                } 
            }
            ?>
        </div>
    </div>
    
</body>

</html>
