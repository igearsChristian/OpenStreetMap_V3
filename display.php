<script>
</script>

<!-- 
redIcon : tech
blueIcon: Commerical
artIcon: art

 


-->
<?php

$sql = "SELECT * FROM locations";
        $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result) > 0) {

          
            while ($row = mysqli_fetch_assoc($result)) {
                 $image=$row['image'];
                 echo "<script>";  
                // by industry
                if ($row['category'] == 'Tech') {
                    switch($row['district']) {
                        case 'Kowloon':
                            echo "
                            var marker = L.marker([{$row['lat']}, {$row['long_']}], { icon: redIcon }).addTo(IT_K).bindPopup('<h3>{$row['name']}</h3> <img src=$image style=\"max-width: 100%; height: auto;\">');
                            marker.on('click', function () {
                                showInfoPanel('{$row['name']}','$image');
                            });
                        ";
                        break;
                        case 'HKI':
                            echo "
                            var marker = L.marker([{$row['lat']}, {$row['long_']}], { icon: redIcon }).addTo(IT_H).bindPopup('<h3>{$row['name']}</h3> <img src=$image style=\"max-width: 100%; height: auto;\">');
                            marker.on('click', function () {
                                showInfoPanel('{$row['name']}','$image');
                            });
                        ";
                        break;
                        case 'NT':
                            echo "
                            var marker = L.marker([{$row['lat']}, {$row['long_']}], { icon: redIcon }).addTo(IT_NT).bindPopup('<h3>{$row['name']}</h3> <img src=$image style=\"max-width: 100%; height: auto;\">');
                            marker.on('click', function () {
                                showInfoPanel('{$row['name']}','$image');
                            });
                        ";
                        break;
                    }
                //     echo "
                //     var marker = L.marker([{$row['lat']}, {$row['long_']}], { icon: redIcon }).addTo(IT_group).bindPopup('<h3>{$row['name']}</h3> <img src=$image style=\"max-width: 100%; height: auto;\">');
                //     marker.on('click', function () {
                //         showInfoPanel('{$row['name']}','$image');
                //     });
                // ";
                } else if ($row['category'] == 'Commerical'){
                    switch($row['district']) {
                        case 'Kowloon':
                            echo "
                            var marker = L.marker([{$row['lat']}, {$row['long_']}], { icon: blueIcon }).addTo(Com_K).bindPopup('<h3>{$row['name']}</h3> <img src=$image style=\"max-width: 100%; height: auto;\">');
                            marker.on('click', function () {
                                showInfoPanel('{$row['name']}','$image');
                            });
                        ";
                        break;
                        case 'HKI':
                            echo "
                            var marker = L.marker([{$row['lat']}, {$row['long_']}], { icon: blueIcon }).addTo(Com_H).bindPopup('<h3>{$row['name']}</h3> <img src=$image style=\"max-width: 100%; height: auto;\">');
                            marker.on('click', function () {
                                showInfoPanel('{$row['name']}','$image');
                            });
                        ";
                        break;
                        case 'NT':
                            echo "
                            var marker = L.marker([{$row['lat']}, {$row['long_']}], { icon: blueIcon }).addTo(Com_NT).bindPopup('<h3>{$row['name']}</h3> <img src=$image style=\"max-width: 100%; height: auto;\">');
                            marker.on('click', function () {
                                showInfoPanel('{$row['name']}','$image');
                            });
                        ";
                        break;
                    }
                //     echo "
                //     var marker = L.marker([{$row['lat']}, {$row['long_']}], { icon: blueIcon }).addTo(Commerical_group).bindPopup('<h3>{$row['name']}</h3> <img src=$image style=\"max-width: 100%; height: auto;\">');
                //     marker.on('click', function () {
                //         showInfoPanel('{$row['district']}','$image');
                //     });
                // ";
                
                } else if ($row['category'] == 'Art'){
                    switch($row['district']) {
                        case 'Kowloon':
                            echo "
                            var marker = L.marker([{$row['lat']}, {$row['long_']}], { icon: artIcon }).addTo(Art_K).bindPopup('<h3>{$row['name']}</h3> <img src=$image style=\"max-width: 100%; height: auto;\">');
                            marker.on('click', function () {
                                showInfoPanel('{$row['name']}','$image');
                            });
                        ";
                        break;
                        case 'HKI':
                            echo "
                            var marker = L.marker([{$row['lat']}, {$row['long_']}], { icon: artIcon }).addTo(Art_H).bindPopup('<h3>{$row['name']}</h3> <img src=$image style=\"max-width: 100%; height: auto;\">');
                            marker.on('click', function () {
                                showInfoPanel('{$row['name']}','$image');
                            });
                        ";
                        break;
                        case 'NT':
                            echo "
                            var marker = L.marker([{$row['lat']}, {$row['long_']}], { icon: artIcon }).addTo(Art_NT).bindPopup('<h3>{$row['name']}</h3> <img src=$image style=\"max-width: 100%; height: auto;\">');
                            marker.on('click', function () {
                                showInfoPanel('{$row['name']}','$image');
                            });
                        ";
                        break;
                    }
                //     echo "
                //     var marker = L.marker([{$row['lat']}, {$row['long_']}], { icon: artIcon }).addTo(Art_group).bindPopup('<h3>{$row['name']}</h3> <img src=$image style=\"max-width: 100%; height: auto;\">');
                //     marker.on('click', function () {
                //         showInfoPanel('{$row['name']}','$image');
                //     });
                // ";
                }

                // by industry
                if ($row['district'] == 'Kowloon') {
                    switch($row['category']) {
                        case 'Tech':
                            echo "
                            var marker2 = L.marker([{$row['lat']}, {$row['long_']}], { icon: redIcon }).addTo(K_IT).bindPopup('<h3>{$row['name']}</h3> <img src=$image style=\"max-width: 100%; height: auto;\">');
                            marker2.on('click', function () {
                                showInfoPanel('{$row['name']}','$image');
                            });
                        ";
                        break;
                        case 'Commerical':
                            echo "
                            var marker2 = L.marker([{$row['lat']}, {$row['long_']}], { icon: blueIcon }).addTo(K_Com).bindPopup('<h3>{$row['name']}</h3> <img src=$image style=\"max-width: 100%; height: auto;\">');
                            marker2.on('click', function () {
                                showInfoPanel('{$row['name']}','$image');
                            });
                        ";
                        break;
                        case 'Art':
                            echo "
                            var marker2 = L.marker([{$row['lat']}, {$row['long_']}], { icon: artIcon }).addTo(K_Art).bindPopup('<h3>{$row['name']}</h3> <img src=$image style=\"max-width: 100%; height: auto;\">');
                            marker2.on('click', function () {
                                showInfoPanel('{$row['name']}','$image');
                            });
                        ";
                        break;
                    }
                } else if ($row['district'] == 'HKI'){
                    switch($row['category']) {
                        case 'Tech':
                            echo "
                            var marker2 = L.marker([{$row['lat']}, {$row['long_']}], { icon: redIcon }).addTo(H_IT).bindPopup('<h3>{$row['name']}</h3> <img src=$image style=\"max-width: 100%; height: auto;\">');
                            marker2.on('click', function () {
                                showInfoPanel('{$row['name']}','$image');
                            });
                        ";
                        break;
                        case 'Commerical':
                            echo "
                            var marker2 = L.marker([{$row['lat']}, {$row['long_']}], { icon: blueIcon }).addTo(H_Com).bindPopup('<h3>{$row['name']}</h3> <img src=$image style=\"max-width: 100%; height: auto;\">');
                            marker2.on('click', function () {
                                showInfoPanel('{$row['name']}','$image');
                            });
                        ";
                        break;
                        case 'Art':
                            echo "
                            var marker2 = L.marker([{$row['lat']}, {$row['long_']}], { icon: artIcon }).addTo(H_Art).bindPopup('<h3>{$row['name']}</h3> <img src=$image style=\"max-width: 100%; height: auto;\">');
                            marker2.on('click', function () {
                                showInfoPanel('{$row['name']}','$image');
                            });
                        ";
                        break;
                    }              
                }
                else if ($row['district'] == 'NT'){
                    switch($row['category']) {
                    case 'Tech':
                        echo "
                        var marker2 = L.marker([{$row['lat']}, {$row['long_']}], { icon: redNT_groupIcon }).addTo(NT_IT).bindPopup('<h3>{$row['name']}</h3> <img src=$image style=\"max-width: 100%; height: auto;\">');
                        marker2.on('click', function () {
                            showInfoPanel('{$row['name']}','$image');
                        });
                    ";
                    break;
                    case 'Commerical':
                        echo "
                        var marker2 = L.marker([{$row['lat']}, {$row['long_']}], { icon: blueIcon }).addTo(NT_Com).bindPopup('<h3>{$row['name']}</h3> <img src=$image style=\"max-width: 100%; height: auto;\">');
                        marker2.on('click', function () {
                            showInfoPanel('{$row['name']}','$image');
                        });
                    ";
                    break;
                    case 'Art':
                        echo "
                        var marker2 = L.marker([{$row['lat']}, {$row['long_']}], { icon: artIcon }).addTo(NT_Art).bindPopup('<h3>{$row['name']}</h3> <img src=$image style=\"max-width: 100%; height: auto;\">');
                        marker2.on('click', function () {
                            showInfoPanel('{$row['name']}','$image');
                        });
                    ";
                    break;
                    }
                //     echo "
                //     var marker2 = L.marker([{$row['lat']}, {$row['long_']}], { icon: greenflagIcon }).addTo(NT_group).bindPopup('<h3>{$row['name']}</h3> <img src=$image style=\"max-width: 100%; height: auto;\">');
                //     marker2.on('click', function () {
                //         showInfoPanel('{$row['district']}','$image');
                //     });
                // ";              
                }
                echo "</script>";

 

            }
            
            
        } 
        mysqli_close($conn);
?>

<!--                     var marker = L.marker([{$row['lat']}, {$row['long_']}], { icon: artIcon }).addTo(Art_group).('<h1>{$row['name']}</h1>    <img src="./img/igears.jpg" />'); -->