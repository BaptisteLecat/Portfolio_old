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
    <div class="project_container">
        <header>
            <picture class="close">
                <img src="assets/icons/close.svg" alt="close">
            </picture>
        </header>
        <img class="project-picture" src="assets/img/project/thumbnails/todo.png" alt="">
        <section>
            <div class="project_info">
                <h1>Todo</h1>
                <h6>2020 / 2021</h6>
            </div>
            <div class="btn_container">
                <button>Information</button>
                <button>Projet</button>
            </div>
        </section>
        <p>Ce projet a été réalisé en parallèle de mes études de BTS SIO, afin d'approfondir mes compétences en développement. Le projet est passé par plusieurs versions, en partant d'une idée simple : réaliser un outil de gestion de tâches.</p>
    </div>
</div>

<?php $this->addContent(ob_get_contents());
ob_flush(); ?>