    <?php ob_start(); ?>
    <div class="draggable-component" id="social-network">
        <?php foreach ($this->list_socialNetwork as $socialNetwork) { ?>
            <div class="icon_container" title="<?= $socialNetwork->getLabel(); ?>" onclick="window.open('<?= $socialNetwork->getLink() ?>');">
                <img src="assets/icons/social/<?= $socialNetwork->getPicture(); ?>" alt="<?= $socialNetwork->getLabel(); ?>">
            </div>
        <?php } ?>
    </div>

    <?php $this->addContent(ob_get_contents()); ?>