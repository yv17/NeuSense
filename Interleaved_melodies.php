<!DOCTYPE html>
<html>
    
<?php
    session_start();
    if($_SESSION['imflag']==1){
        $im0 = $_SESSION['im0'];
        $im1 = $_SESSION['im1'];
        $im2 = $_SESSION['im2'];
    }
?>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8">
    <link rel="stylesheet" href="css/illusions_des.css">
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="img/int_icon.png" type="image/png">
    <title>Interleaved Melodies</title>
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

    <h1>Interleaved Melodies</h1>
    <h3>Illusion description</h3>
    <hr>
    <div class="gridcontainer">
        <div class="textbox">
            <p> 
            <b>What are the interleaved melodies? </b>
            <br>
            Firstly, two melodies are played simultaneously. Each subsequent note comes from the other melody (for example if there is melody A and melody B, the note order will go: A B A B A…). Afterwards, the two melodies are played simultaneously again but the pitch range of one of the melodies has been shifted. You might find it is much easier to identify the individual melodies the second time. 
            <br>
            <br>
            <audio controls>
                <source src="sound_files/interleaved_melodies.mp3" type="audio/mpeg">
            </audio>
            <br>
            <br>
            <br>
            <b>Why does this happen? </b>
            <br>
            The illusion is a good demonstration of how we group notes together using pitch cues. When there are competing sources of sound, we assume that notes of a similar pitch are coming from the same source. When you listen to the interleaved melodies the first time they are in the same pitch range; you find it hard to look for seperate pitch cues and assume the notes are from the same source. Consequently, you find it hard to distinguish separate melodies. 
            The second time, the melodies are in different pitch ranges. You should find it easier to distinguish two different sound sources, hence you can distinguish the two separate melodies. This idea is similar to the one proposed in the Galloping Rhythm. 
            <br>
            <br>
            <br>
            <b>What is the research on interleaved melodies? </b>
            <br>
            A Canadian study looked at utilising functional MRI to look at the neural structures involved in processing the illusion. 
            They particularly focused on the effect of priming, they included an auditory sequence that incorporated a melody beforehand to prime the participants. 
            They found activation across the brain but they focused on activation in the inferior operculum. 
            The researchers suggested this area could be involved in holding the original melody in the working memory and then performing a matching task<sup>1</sup>.
            <br>
            <br>
            Interleaved melodies are also a tool for research in the larger field of auditory scene analysis. 
            This field looks at the way the human auditory system is able to ‘make sense of complex acoustic mixtures’<sup>2</sup>.
            For example, listening to your friend’s voice in a noisy street or picking out a single melodic line from complex orchestral music. 
            In music, interleaved melodies are also known as melodic fission. 
            <br>
            <br>
            The majority of research uses interleaved melodies to look at top down or bottom up processes. 
            Bottom up processes refer to the auditory systems capability to segregate multiple sounds by some sort of acoustical characteristic; for example by loudness, timbre or in this case, by pitch. 
            Top down processes are when the brain uses previously obtained information to decide how to focus on multiple sounds. 
            For example, if you listen to a specific melody and retain it in your working memory, and then you listen to the melody mixed with distractor tones (multiple sounds present) you can more easily focus on the melody because you have heard it before. 
            This is the idea behind priming.<sup>3</sup>
            <br>
            <br>
            Some research has utilised these ideas to investigate Autism Spectrum Disorder (ASD). 
            A particular paper compared the ability of children, with and without ASD, to identify the melody in the interleaved melodies illusion. 
            They found that children with ASD found it more difficult to identify the melody when there was a large semitone difference (large pitch difference) than children without. 
            Somewhat surprisingly, they found the children with ASD could identify the melody better than the other children when there was no semitone difference (in the same pitch range). 
            The researchers theorised that these children find it difficult to use pitch cues but they have superior local element processing. 
            This means they can identify individual notes and the specific notes of the melody, which others find difficult when there are no pitch cues<sup>4,5</sup>.
            <br>
            <br>
            <b>References</b>
            <ol>
                <li>C. Bey and R. Zatorre, 2003, Recognition of Interleaved Melodies: an fMRI study, Annals of the New York Academy of Sciences</li>
                <li>Pressnitzer, Suied and Shamma, 2011, Auditory Scene Analysis: the sweet music of ambiguity, Frontiers in human neuroscience</li>
                <li>Marozeu, Innes-Brown and Blamey, 2013, The acoustic and perceptual cues affecting melody segregation for listeners with a cochlear implant, Frontiers in Psychology</li>
                <li>Wenhart et al, 2019, Enhanced auditory disembedding in an interleaved melody recognition test is associated with absolute pitch ability, Nature Scientific Reports</li>
                <li>Bouvet et al, 2016, Auditory Stream Segregation in Autism Spectrum Disorder: Benefits and Downsides of Superior Perceptual Processes, Perception in Autism</li>
            </ol>
            </p>
        </div>

        <div class="poll">
                <span>Can you identify the correct melodies?</span><br>
                <form action="im.php" method="POST">
                    <input type="radio" name="im" value="0" id="im0" required>
                    <label for="im0">Twinkle Twinkle Little Star & Yankee Doodle</label><br>

                    <input type="radio" name="im" value="1" id="im1">
                    <label for="im1">Twinkle Twinkle Little Star & Happy Birthday Song</label><br>

                    <input type="radio" name="im" value="2" id="im2">
                    <label for="im2">Happy Birthday Song & Yankee Doodle</label><br>

                    <input type="submit" value="Submit" class="submit">
                </form>

                <?php 
                if($_SESSION['imflag']==1){ echo "<br>Correct answer:<br>Twinkle Twinkle Little Star & Yankee Doodle";
                ?>
                    <div id="piechart"></div>
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    <script type="text/javascript">
                        google.charts.load('current', {'packages':['corechart']});
                        google.charts.setOnLoadCallback(drawChart);

                        function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                            ['Results', 'Responses'],
                            ['Twinkle Twinkle Little Star & Yankee Doodle', <?php echo $im0; ?>],
                            ['Twinkle Twinkle Little Star & Happy Birthday Song', <?php echo $im1; ?>],
                            ['Happy Birthday Song & Yankee Doodle', <?php echo $im2; ?>]
                            ]);

                            var options = {
                                'title': 'Results',
                                'titleTextStyle': {color:'#f2f2f2',fontSize:17, fontName:'Lato'},
                                'colors': ['#23D5B3', '#D52345', '#228CD5'],
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

