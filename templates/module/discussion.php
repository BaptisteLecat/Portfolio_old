    <?php ob_start(); ?>
    <div class="draggable-component" id="discussion">
        <header>
            <h1>Discussion</h1>
        </header>
        <div class="message_wrapper">
            <?php foreach ($this->list_discussion as $discussion) { ?>
                <div class="message_container">
                    <picture><img src="assets/img/profile/<?= $discussion->getSender()->getPicture(); ?>" alt=""></picture>
                    <div class="content">
                        <h6><?= $discussion->getSender()->getName() . " " . $discussion->getSender()->getFirstName(); ?></h6>
                        <p><?= $discussion->getContent(); ?></p>
                    </div>
                </div>
            <?php } ?>
        </div>
        <footer>
            <div class="input_container">
                <button><img src="assets/icons/discussion/more.svg" alt=""></button>
                <input type="text" name="message" id="message" placeholder="Ecrire un message">
                <button><img src="assets/icons/discussion/message_circle.svg" alt=""></button>
            </div>
        </footer>
    </div>

    <?php
    $this->addContent(ob_get_contents());
    ?>