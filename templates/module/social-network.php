    <div class="draggable-component" id="social-network">
    <?php foreach($this->list_socialNetwork as $socialNetwork){ ?>
        <div class="icon_container">
            <img src="assets/icons/social/<?= $socialNetwork->getPicture(); ?>" alt="">
        </div>
        <?php } ?>
    </div>