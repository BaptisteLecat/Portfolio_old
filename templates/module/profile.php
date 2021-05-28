    <div class="draggable-component" id="profile">
        <picture><img src="assets/img/profile/<?= $profile->getPicture(); ?>" alt=""></picture>
        <div class="content">
            <h5><?= $profile->getName()." ".$profile->getFirstName(); ?></h5>
            <h6><?= $profile->birthdayToAge(); ?> ans</h6>
        </div>
        <div class="btn_container">
            <button onclick="window.open('assets/documents/lecatBaptiste_CVAlternanceInformatique.pdf')">Voir le CV</button>
        </div>
    </div>