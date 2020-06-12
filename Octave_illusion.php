<!DOCTYPE html>
<html>

<?php
    session_start();
    if($_SESSION['oiflag']==1){
        $left = $_SESSION['left'];
        $right = $_SESSION['right'];
        $unclear = $_SESSION['unclear'];
        if($_SESSION['oitextflag'] == 1){
            $oitext = $_SESSION['oitext'];
        }
    }
?>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8">
    <link rel="stylesheet" href="css/illusions_des.css">
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="img/oct_icon.png" type="image/png">
    <title>Octave Illusion</title>
</head>

<body>
    <nav class="navbar">
        <a class="navbarbtn" href="overview_page.html">HOME</a>
        <div class="dropdown">
            <button class="dropbtn">LIST
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="Shepard_tone.html">Shepard's Tones</a>
                <a href="Octave_illusion.php">Octave Illusion</a>
                <a href="Scale_illusion.html">Scale Illusion</a>
                <a href="Mysterious_melody.php">Mysterious Melody</a>
                <a href="Tritone_paradox.php">Tritone Paradox</a>
                <a href="Timbre_illusion.html">Timbre Illusion</a>
                <a href="DPOAE.html">DPOAE</a>
                <a href="Continuity_illusion.html">Continuity Illusion</a>
                <a href="Timing_seq.html">Timing and Sequence Perception</a>
                <a href="Galloping.html">Galloping Rhythm</a>
                <a href="Interleaved_melodies.php">Interleaved Melodies</a>
                <a href="Binaural_beats.html">Binaural Beats</a>
            </div>
        </div>
        <a class="navbarbtn" href="about_us.html">ABOUT US</a>
    </nav>

    <h1>Octave Illusion</h1>
    <h3>Illusion description</h3>
    <hr>
    <div class="gridcontainer">
        <div class="textbox">
            <p>
                <b>What is it?</b>
                <br>
                In this illusion, you will hear a sequence of alternating tones in each ear. 
                <br>
                <br>
                <audio controls>
                    <source src="sound_files/octave_illusion.mp3" type="audio/mpeg">
                </audio>
                <br>
                <br>
                <br>
                <b>How does it work? </b>
                <br>
                It is likely that what you heard is different from the actual sound pattern.
                Most often, people hear a repeating high tone in one ear and a repeating low tone in the other. 
                Other people report hearing different patterns, such as a periodic reversal of tones in each ear; studies show that left handed people are more likely to experience these variations<sup>1</sup>.
                <br>
                <br>
                The real sound pattern is presented below along with the most common perception. 
                <br>
                <br>
                <figure>
                    <img src="img/oct1-inverse.png">
                    <figcaption>Figure 1: The top two scores shows the pattern played to the left and right ears. The second set of scores demonstrated the most common perception.</figcaption>
                </figure>
                <br>
                One hypothesis is that the illusion utilises the ‘what’ and ‘where’ pathways in the brain. The dominant ear determines the pitch of the perceived tone (for example, a high tone heard in the right ear) - the ‘what’ pathway. The ear that receives the high tone determines the location of the sound (in this example the tone would be localised to the right) - the ‘where’ pathway<sup>2</sup>.
                <br>
                <br>
                <br>
                <b>Is this used anywhere?</b>
                <br>
                The octave illusion gave rise to further studies on the ‘what’ and ‘where’ pathways. Functional MRI studies have sought to determine the specific location of these pathways and subsequently, better understand neural sound processing. 
                <br>
                <br>
                <br>
                <b>What is in the detailed research? </b>
                <br>
                A 2018 study in Tokyo looked at identifying structures in the brain that are responsible for the illusory perception of the octave illusion. 
                <br>
                They tested 43 individuals and split them into two groups; those that reported hearing the illusory effect and those that did not perceive the illusion but heard the actual pattern of notes. 
                The research team then conducted fMRI studies on each individual and played them the octave illusion whilst in the scanner. 
                <br>
                The premise of the study was that by comparing the two groups they could identify neural structures that were involved in perceiving the illusory effect.
                <br>
                The research team identified several structures responsible for the octave illusion. Firstly, they found that the auditory cortex (area A1) was activated in both groups, which makes sense. 
                <br>
                A1 is most likely responsible for detecting changes in pitch and this has been established in previous studies. 
                <br>
                <figure>
                    <img src="img/oct2-inverse.png">
                    <figcaption>Figure 2: Depicts the auditory cortex.</figcaption>
                </figure>
                <br>
                The research team suggested that the aforementioned ‘what’ pathway lies in the anterior auditory cortex and comprises the planum polare. 
                <br>
                Activation of the planum polare was significantly increased in the illusory group and they suggest it is crucial for pitch determination. 
                <br>
                The team also suggested the ‘where’ pathway lies in the posterior auditory cortex and includes the inferior parietal lobule. 
                <br>
                <figure>
                    <img src="img/oct3.png">
                    <figcaption>Figure 3: Illustrated the parietal lobe in the brain.</figcaption>
                </figure>
                <br>
                Additionally, they looked at activation differences in the right premotor cortex (PMC). 
                <br>
                This area is involved in processing sensory information and planning an appropriate motor response. 
                <br>
                It had previously been shown to activate in response to rhythmic auditory stimuli.
                <br> 
                The results of this study show that activation in the right PMC was greater in the non- illusory group. 
                <br>
                The research team suggest that since this group does not perceive the illusion, they hear a rhythmic octave jump in each ear and this activates the PMC. 
                <br>
                Possibly, the individual threshold for perceiving rhythm affects our perception of the octave illusion <sup>3</sup>.
                <br>
                <br>
                <br>
                <b>References</b>
                <ol>
                    <li> Diana Deutsch, 1983, The Octave Illusion in relation to handedness and familial handedness background, Neuropsychologia</li>
                    <li>D Deutsch. P Roll., 1976, Separate “What” and “Where” Decision Mechanisms In Processing a Dichotic Tonal Sequence, Journal of Experimental Psychology: Human Perception and Performance</li>
                    <li>K Tanaka. H Kurasaki. S Kuriki., 2018, Neural representation of octave illusion in the human cortex revealed with functional magnetic resonance imaging, Hearing Research</li>
                </ol>
            </p>
        </div>

        <div class="poll">
                <span>In which ear do you hear the high tones?</span><br>
                <form action="oi.php" method="POST">
                    <input type="radio" name="oi" value="0" id="left" required>
                    <label for="left">Left ear</label><br>

                    <input type="radio" name="oi" value="1" id="right">
                    <label for="right">Right ear</label><br>

                    <input type="radio" name="oi" value="2" id="unclear">
                    <label for="unclear">Unclear</label><br>

                    <input type="submit" value="Submit" class="submit">
                </form>

                <?php if($_SESSION['oiflag']==1){ ?>
                    <div id="piechart"></div>
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    <script type="text/javascript">
                        google.charts.load('current', {'packages':['corechart']});
                        google.charts.setOnLoadCallback(drawChart);

                        function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                            ['Results', 'Responses'],
                            ['Left', <?php echo $left; ?>],
                            ['Right', <?php echo $right; ?>],
                            ['Unclear', <?php echo $unclear; ?>]
                            ]);

                            var options = {
                                'title': 'Results',
                                'titleTextStyle': {color:'#f2f2f2',fontSize:17, fontName:'Lato'},
                                'colors': ['#23D5B3', '#D52345', '228CD5'],
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
                <?php 
                    if($_SESSION['oitextflag'] == 1){
                        echo 'Interesting statistics:<br><br>' . $oitext; 
                    } 
                }
                ?>
        </div>

    </div>
     
</body>

</html>
