//add item to the database
function addItem() {

	var description = $("#description").val();
	var location = $("#location").val();
	var turnedIn = $("#turnedIn").val();

	$.post("addItem.php", {
		description : description,
		location : location,
		turnedIn : turnedIn
	}, function(data, status) {
		// close the popup
		$("#add_new_item_modal").modal("hide");

		readItems();

		// clear fields from the popup
		$("#description").val("");
		$("#location").val("");
		$("#turnedIn").val("");
	});
}

// read items in database
function readItems() {
	$.get("readItems.php", {}, function(data, status) {
		$(".items_content").html(data);
	});
}


//delete item from database
function DeleteItem(itemID) {
	var confirmation = confirm("Are you sure you want to delete this item?");
	if (confirmation) {
		$.post("deleteItem.php", {
			itemID: itemID
		}, function (data, status) {
			readItems();
		});
	}
}


function GetItemDetails(itemID) {
    // Add item ID to the hidden field
    $("#hidden_item_id").val(itemID);
    $.post("readItemDetails.php", {
            itemID: itemID
        },
        function (data, status) {
            var item = JSON.parse(data);
            // Adds existing values to the modal popup fields
            $("#update_description").val(item.description);
            $("#update_location").val(item.location);
            $("#update_turnedIn").val(item.turnedIn);
        }
    );
    // Open modal popup
    $("#update_item_modal").modal("show");
}



function updateItemDetails() {
    // get values
    var description = $("#update_description").val();
    var location = $("#update_location").val();
    var turnedIn = $("#update_turnedIn").val();
 
    // get hidden field value
    var itemID = $("#hidden_item_id").val();
 
    // update the details by requesting to the server using ajax
    $.post("updateItemDetails.php", {
            itemID: itemID,
            description: description,
            location: location,
            turnedIn: turnedIn
        },
        function (data, status) {
            // hide modal popup
            $("#update_item_modal").modal("hide");
            // reload items
            readItems();
        }
    );
}
