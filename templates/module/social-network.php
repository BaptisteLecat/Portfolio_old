    <div class="draggable-component" id="social-network">
    <?php foreach($this->list_socialNetwork as $socialNetwork){ ?>
        <div class="icon_container" title="<?= $socialNetwork->getLabel(); ?>" onclick="window.open('<?= $socialNetwork->getLink()?>');">
            <img src="assets/icons/social/<?= $socialNetwork->getPicture(); ?>">
        </div>
        <?php } ?>
    </div>