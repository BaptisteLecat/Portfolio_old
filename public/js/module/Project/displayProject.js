function displayProject(data) {
    $("#project .app_container header h2").text(
        `Découvrez tout mes projets ${data.list_project[0].category.label}`
    );
    var language_html = "";
    data.list_technology.forEach((technology) => {
        language_html = language_html.concat(`                                    <div class="language">
                        <img src="assets/img/project/technology/${technology.picture}" alt="${technology.title}" title="${technology.title}">
                        <h6>${technology.label}</h6>
                    </div>`);
    });
    $("#project .app_container .language_wrapper").html(language_html);

    var project_html = "";
    data.list_project.forEach((project) => {
        project_html = project_html.concat(`                                    <div class="project">
                        <picture>
                            <img src="assets/img/project/thumbnails/${project.thumbnail}" alt="${project.title}" title="${project.title}">
                        </picture>
                        <div class="content">
                            <h6>${project.title}</h6>
                            <p>${project.content}</p>
                        </div>
                        <footer>
                            <p>${project.stringDate}</p>
                        </footer>
                    </div>`);
    });
    $("#project .app_container .project_wrapper").html(project_html);
}