<?php

fscanf(STDIN, "%d",
    $surfaceN // the number of points used to draw the surface of Mars.
);

for ($i = 0; $i < $surfaceN; $i++)
{
    fscanf(STDIN, "%d %d",
        $landX, // X coordinate of a surface point. (0 to 6999)
        $landY // Y coordinate of a surface point. By linking all the points together in a sequential fashion, you form the surface of Mars.
    );
}

$maxSpeed = -40;
$height = 100;
$gravity = 3.711;

function landingSpeed($speed, $power, $gravity, $alt) {
    return ceil(sqrt(pow($speed, 2) + 2 * ($gravity - $power) * $alt));
}

// game loop
while (TRUE)
{
    fscanf(STDIN, "%d %d %d %d %d %d %d",
        $X,
        $Y,
        $hSpeed, // the horizontal speed (in m/s), can be negative.
        $vSpeed, // the vertical speed (in m/s), can be negative.
        $fuel, // the quantity of remaining fuel in liters.
        $rotate, // the rotation angle in degrees (-90 to 90).
        $power // the thrust power (0 to 4).
    );

    /*****************************
     * WITH ECONOMIC ACHIEVEMENT *
     * ***************************/

    $alt = $Y - $height;
    $landingSpeed = landingSpeed($vSpeed, 4, $gravity, $alt);

    $thr = floor($vSpeed / ($maxSpeed / 4));
    if ((int)$landingSpeed < abs($maxSpeed)) {
        $thr--;
    }

    $thr = ($thr < 0) ? 0 : $thr;
    $thr = ($thr > 4) ? 4 : $thr;

    echo("0 $thr\n");
}

?>