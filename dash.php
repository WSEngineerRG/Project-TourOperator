<?php ?>

// For debug error sql !
SET GLOBAL sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));



<?php
foreach ($manager->getScoreByAuthorId($manager->getAuthorByName($review->Author->getName())) as $score) { var_dump($score); die;?>
    <?= $score->getValue() ?>
<?php } ?>