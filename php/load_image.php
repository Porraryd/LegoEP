<?php

        function load_image($value){

                        $pic = query("SELECT * 
                                  FROM  `images` 
                            WHERE itemID='$value'
                            ");

                $pics = mysql_fetch_row($pic);


                    if ($pics[0] == 'S'){
                        //check for small set images
                        if($pics[3] == 1){
                                $url = 'http://webstaff.itn.liu.se/~stegu76/img.bricklink.com' . '/' . $pics[0] . '/' . $pics[1] . '.gif';
                        }else if($pics[4] == 1){
                                        $url = 'http://webstaff.itn.liu.se/~stegu76/img.bricklink.com' . '/' . $pics[0] . '/' . $pics[1] . '.jpg';
                                }else{
                                        $url = "";
                                }
                        }else{
                                //check for small part images
                        if($pics[3] == 1){
                                $url = 'http://webstaff.itn.liu.se/~stegu76/img.bricklink.com' . '/' . $pics[0] . '/' . $pics[2] . '/' . $pics[1] . '.gif';
                        }else if($pics[4] == 1){
                                        $url = 'http://webstaff.itn.liu.se/~stegu76/img.bricklink.com' . '/' . $pics[0] . '/' . $pics[2] . '/' . $pics[1] . '.jpg';
                                }else{
                                        $url = "";
                                }
                        }
                                //check for large images
                                if($pics[5] == 1){
                                $url_l = 'http://webstaff.itn.liu.se/~stegu76/img.bricklink.com' . '/' . $pics[0] . 'L/' . $pics[1] . '.gif';
                        }else if($pics[6] == 1){
                                        $url_l = 'http://webstaff.itn.liu.se/~stegu76/img.bricklink.com' . '/' . $pics[0] . 'L/' . $pics[1] . '.jpg';
                                }else{
                                        $url_l = "";
                                }
                        


                        return array($url, $url_l);
        }



?>