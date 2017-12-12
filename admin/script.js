function addItem() {
    
    var description = $("#description").val();
    var location = $("#location").val();
    var turnedIn = $("#turnedIn").val();
 
    $.post("addItem.php", {
        description: description,
        location: location,
        turnedIn: turnedIn
    }, function (data, status) {
        // close the popup
        $("#add_new_record_modal").modal("hide");
 
        readItems();
 
        // clear fields from the popup
        $("#description").val("");
        $("#location").val("");
        $("#turnedIn").val("");
    });
}
 
//read items in database
function readItems() {
    $.get("readItems.php", {}, function (data, status) {
        $(".records_content").html(data);
    });
}