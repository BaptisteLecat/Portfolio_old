function projectInfo(projectId) {
    $.ajax({
        url: "js/module/project/project_info.php",
        type: "POST",
        data: "projectId=" + projectId,
        dataType: "HTML",
        success: function(data, status) {
            displayProjectInfo(JSON.parse(data));
        },

        error: function(result, status, error) {},
    });
}