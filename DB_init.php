<?php 
include("DB.php");

$truncate_sql = "TRUNCATE TABLE locations";
mysqli_query($conn, $truncate_sql);

$inject_sql = "INSERT INTO locations (name, category, district, lat, long_, image)
VALUES 
    ('iGears Technology Ltd', 'Tech', 'NT', 22.357929802706558, 114.13166951186284, 'img/igears.jpg'), 
    ('Airside Shopping Mall', 'Commerical', 'Kowloon',22.331685749828214, 114.19804471409547, 'img/AirsideShoppingMall.jpeg'),
    ('Bakehouse', 'Commerical', 'HKI',22.276106695203463, 114.17174209142567, 'img/bakehouse.jpg'),
    ('Artwork1', 'Art', 'Kowloon',22.319453467325516, 114.1753796511518, 'img/artwork1.jpg'),
    ('Uniserve IT Solutions', 'Tech', 'HKI',22.28625652471037, 114.15290394358652, 'img/UIT.jpg'),
    ('iGears Technology Ltd2', 'Tech', 'NT', 22.3907410892048, 113.97511718190144, 'img/igears.jpg'), 
    ('iGears Technology Ltd3', 'Tech', 'NT', 22.422213074597927, 114.07323490350214, 'img/igears.jpg'),
    ('iGears Technology Ltd4', 'Tech', 'HKI', 22.28642889837917, 114.21227663503403, 'img/igears.jpg'),
    ('iGears Technology Ltd5', 'Tech', 'HKI', 22.272094279601262, 114.18178572404109, 'img/igears.jpg'),
    ('Hong Kong Disneyland', 'Commerical', 'NT',22.31444585028947, 114.04524888962466, 'img/disney.jpg'),
    ('OceanPark', 'Commerical', 'HKI',22.247558614274215, 114.17867184889244, 'img/OceanPark.jpg'),
    ('Flora Plaza', 'Commerical', 'NT',22.48610220053949, 114.14291976549178, 'img/FloraPlaza.jpg'),
    ('Green Code Plaza', 'Commerical', 'NT',22.50182387281758, 114.14858986508798, 'img/GreenCodEPlaza.jpg'),
    ('Artwork2', 'Art', 'NT',22.308305220208364, 114.25963482397867, 'img/artwork2.jpg'),
    ('Artwork3', 'Art', 'NT',22.391013218567252, 114.20747377755208, 'img/artwork3.jpg'),
    ('Artwork4', 'Art', 'Kowloon',22.333380739854462, 114.18406646325352, 'img/artwork4.jpg'),
    ('Hong Kong Railway Museum', 'Art', 'NT',22.448333983706977, 114.1657344603579, 'img/HKRM.jpg'),
    ('Caribbean Square', 'Commerical', 'NT',22.29198009346207, 113.94985474839986, 'img/CaribbeanSquare.jpg'),
    ('Siu Sai Wan Plaza', 'Commerical', 'HKI',22.26329189089745, 114.24920367307801, 'img/SiuSaiWanPlaza.jpg'),
    ('Stanley Market', 'Commerical', 'HKI',22.21876884119938, 114.21310679446802, 'img/SM.jpg'),
    ('iGears Technology Ltd6', 'Tech', 'HKI',22.283848654069658, 114.19831178015727, 'img/igears.jpg'),
    ('iGears Technology Ltd7', 'Tech', 'Kowloon',22.316940049747004, 114.22271781469931, 'img/igears.jpg')"

    
    
    ;

if (mysqli_query($conn, $inject_sql)) {
    header("Location: index_admin.php");
    exit();}

?>