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
            <p>
                Result: <br>
                <?php echo 'ATP1: ' . $atp1 . '<br>'; ?>
                <?php echo 'DTP1: ' . $dtp1 . '<br>'; ?>
                <?php echo 'ATP2: ' . $atp2 . '<br>'; ?>
                <?php echo 'DTP2: ' . $dtp2 . '<br>'; ?>
                <?php echo 'ATP3: ' . $atp3 . '<br>'; ?>
                <?php echo 'DTP3: ' . $dtp3 . '<br>'; ?>
            </p>
            <?php } ?>
        </div>
    </div>
    
</body>

</html>