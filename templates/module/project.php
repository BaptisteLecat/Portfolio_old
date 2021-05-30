<?php ob_start(); ?>
<div class="draggable-component" id="project">
    <nav>
        <header>
            <img src="assets/img/project/026-code.svg" alt="">
            <h1>Projets</h1>
        </header>
        <ul>
            <?php foreach ($this->list_category as $index => $category) { ?>
                <?php if ($index == $this->selectedCategory) { ?>
                    <li class="selected" name="<?= $index ?>">
                    <?php } else { ?>
                    <li name="<?= $index ?>">
                    <?php } ?>
                    <img src="assets/img/project/category/<?= $category->getPicture(); ?>" alt="<?= $category->getLabel(); ?>" title="<?= $category->getLabel(); ?>">
                    <h6><?= $category->getLabel(); ?></h6>
                    </li>
                <?php } ?>
        </ul>
    </nav>
    <div class="app_container">
        <header>
            <h2>Découvrez tout mes projets <?= $this->list_category[$this->selectedCategory]->getLabel(); ?></h2>
        </header>
        <section>
            <h3>Languages utilisés</h3>
            <div class="language_wrapper">
                <?php foreach ($this->technologiesForCategory() as $technology) { ?>
                    <div class="language">
                        <img src="assets/img/project/technology/<?= $technology->getPicture(); ?>" alt="<?= $technology->getLabel() ?>" title="<?= $technology->getLabel() ?>">
                        <h6><?= $technology->getLabel() ?></h6>
                    </div>
                <?php } ?>
            </div>
        </section>
        <section>
            <h3>Mes projets</h3>
            <div class="project_wrapper">

                <?php foreach ($this->projectsForCategory() as $project) { ?>
                    <div class="project">
                        <picture>
                            <img src="assets/img/project/thumbnails/<?= $project->getPicture(); ?>" alt="<?= $project->getTitle(); ?>" title="<?= $project->getTitle(); ?>">
                        </picture>
                        <div class="content">
                            <h6><?= $project->getTitle(); ?></h6>
                            <p><?= $project->getContent(); ?></p>
                        </div>
                        <footer>
                            <p><?= $project->getStringProjectDate(); ?></p>
                        </footer>
                    </div>
                <?php } ?>

            </div>
        </section>
    </div>
</div>

<?php $this->addContent(ob_get_contents());
ob_flush(); ?>