function activitySwitcher(activityElement, step) {
    //Step can be "next" or "previous"
    var url = setUrl(activityElement, step)
    $.ajax({
        url: "js/module/activity/activity_switcher.php",
        type: "POST",
        data: url,
        dataType: "HTML",
        success: function(data, status) {
            console.log(JSON.parse(data));
            console.log(status);
            displayActivity(JSON.parse(data), activityElement);
        },

        error: function(result, status, error) {
            console.log(result);
            console.log(status);
            console.log(error);
        },
    });
}

function setUrl(activityElement, step) {
    var url = "selectedExperience=" + setIndex(activityElement, step);
    if ($(activityElement).attr("id") == "Course") {
        url = "selectedCourse=" + setIndex(activityElement, step);
    }

    return url;
}

function setIndex(activityElement, step) {
    var index = parseInt($(activityElement).attr("name")) + 1;
    if (step == "previous") {
        var index = parseInt($(activityElement).attr("name")) - 1;
    }

    console.log(index);

    return index;
}