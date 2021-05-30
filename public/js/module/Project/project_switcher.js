function projectSwitcher(category) {
    $.ajax({
        url: "js/module/project/project_switcher.php",
        type: "POST",
        data: "category=" + category,
        dataType: "HTML",
        success: function(data, status) {
            displayProject(JSON.parse(data));
        },

        error: function(result, status, error) {},
    });
}