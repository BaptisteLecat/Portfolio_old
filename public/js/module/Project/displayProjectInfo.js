function displayProjectInfo(data) {
    $("#project .project_container .project-picture").attr("src", `assets/img/project/picture/${data.project.picture}`);
    $("#project .project_container section .project_info h1").text(data.project.title);
    $("#project .project_container section .project_info h6").text(data.project.stringDate);

    if(data.project.infoLink != null){
        $("#project .project_container section .btn_container a").css("display", "block");
        $("#project .project_container section .btn_container a").attr("href", data.project.infoLink);
        $("#project .project_container section .btn_container a:nth-child(2)").attr("href", data.project.mainLink);
    }else{
        $("#project .project_container section .btn_container a").first().css("display", "none");
        $("#project .project_container section .btn_container a:nth-child(2)").attr("href", data.project.mainLink);
    }

    $("#project .project_container p").text(data.project.longContent);
}