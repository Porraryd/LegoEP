<?php
function load_image($value, $colorID)
{
    //itemTypeID, itemID, colorID, has_gif, has_jpg, has_largegif, has_largejpg
    $pic = query("SELECT * 
                FROM  `images` 
                WHERE itemID='$value'
                AND colorID='$colorID'
                ");

    $pics = mysql_fetch_row($pic);


    if ($pics[0] == 'P')
    {
        //check for small part images
        if($pics[3] == 1){
            $url = 'http://webstaff.itn.liu.se/~stegu76/img.bricklink.com' . '/' . $pics[0] . '/' . $pics[2] . '/' . $pics[1] . '.gif';
        }
        else if($pics[4] == 1)
        {
            $url = 'http://webstaff.itn.liu.se/~stegu76/img.bricklink.com' . '/' . $pics[0] . '/' . $pics[2] . '/' . $pics[1] . '.jpg';
        }
        else
        {
            $url = "images/lego_small.png";
        }
    }
    else
    {
            //check for small set images
        if($pics[3] == 1)
        {
            $url = 'http://webstaff.itn.liu.se/~stegu76/img.bricklink.com' . '/' . $pics[0] . '/' . $pics[1] . '.gif';
        }
        else if($pics[4] == 1)
        {
            $url = 'http://webstaff.itn.liu.se/~stegu76/img.bricklink.com' . '/' . $pics[0] . '/' . $pics[1] . '.jpg';
        }
        else
        {
            //$url = 'http://www.bricklink.com'  . '/S/' . $pics[6] . '.jpg';
            $url = "images/lego_small.png";
        }
    }
                
    //check for large images
    if($pics[5] == 1)
    {
        $url_l = 'http://webstaff.itn.liu.se/~stegu76/img.bricklink.com' . '/' . $pics[0] . 'L/' . $pics[1] . '.gif';
    }
    else if($pics[6] == 1)
    {
        $url_l = 'http://webstaff.itn.liu.se/~stegu76/img.bricklink.com' . '/' . $pics[0] . 'L/' . $pics[1] . '.jpg';
    }
    else
    {
        $url_l = "images/lego_big.png";
    }

    return array($url, $url_l);
}
?>