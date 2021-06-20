<?php ob_start(); ?>
<div class="draggable-component card-info" draggable="true" id="<?= $activity->getInstanceName(); ?>" name="<?= $index ?>">
    <header>
        <h1><?= $activity->getInstanceName(); ?></h1>
    </header>
    <div class="picture_container">
        <button name="previous<?= $activity->getInstanceName(); ?>"><img src="assets/icons/next.svg" alt=""></button>
        <picture><img src="assets/img/<?= strtolower($activity->getInstanceName()); ?>/<?= $activity->getPicture(); ?>" alt=""></picture>
        <button name="next<?= $activity->getInstanceName(); ?>"><img src="assets/icons/next.svg" alt=""></button>
    </div>
    <div class="content">
        <h5><?= $activity->getTitle(); ?></h5>
        <h6><?= $activity->getDate(); ?></h6>
    </div>
    <div class="btn_container">
        <button name="about<?= $activity->getInstanceName(); ?>">En savoir plus</button>
    </div>
</div>

<?php $this->addContent(ob_get_contents()); ?>