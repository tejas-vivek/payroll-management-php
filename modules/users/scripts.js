$(document).ready(function(){
    function sendAjaxRequest(action, data, callback){
        $.ajax({
            url: 'handler.php',
            type: 'POST',
            data: {action : action, ...data},
            dataType: 'json',
            success: callback,
            error: function(error){
                console.log('Error', error)
            }
        })
    }

    $('.deletebutton').click(function(){
        var id = $(this).data('id');
        if(confirm('Are you sure you want to delete this record?')){
            sendAjaxRequest('delete', {id: id}, function(response){
                if(response.success){
                    alert('Record deleted successfully!');
                    location.reload();
                } else {
                    alert('Failed to delete record!');
                }
            })
        }
    })

    $('form[id^="editForm"]').submit(function(e){
        e.preventDefault();

        var formId = $(this).attr('id');;

        var listAll = $(this).serializeArray();
        var formData = {};
        listAll.forEach(function(field){
            formData[field.name] = field.value;
        })
        sendAjaxRequest('update', formData, function(response){
            // console.log(response);
            if(response.success){
                alert("Record updated successfully");
                location.reload();
            } else {
                alert(response.message);
            }
        })
    })

    $('form[id^="passwordForm"]').submit(function(e){
        e.preventDefault();

        var formId = $(this).attr('id');;

        var formData = {};
        var listAll = $(this).serializeArray();
        listAll.forEach(function(field){
            formData[field.name] = field.value;
        })

        if(formData['password'].length<6){
            alert("The password must be atleast 6 characters long.");
            return false;
        }

        if(formData['password'] != formData['cpassword']){
            alert("Passwords do not match.");
            return false;
        }
        sendAjaxRequest('change_password', formData, function(response){
            // console.log(response);
            if(response.success){
                alert("Password updated successfully");
                location.reload();
            } else {
                alert('Failed to update password');
            }
        })
    })

    $('#addForm').submit(function(e){
        e.preventDefault();
        var listAll = $(this).serializeArray();
        var formData = {};

        listAll.forEach(function(field){
            formData[field.name] = field.value;
        })
        // console.log(formData);
        sendAjaxRequest('add', formData, function(response){
            // console.log(response);
            if(response.success){
                alert("Record added successfully");
                location.reload();
            } else {
                alert(response.message);
            }
        })
    })

    function fetchRecords(){
        sendAjaxRequest('get', {}, function(response){
            console.log(response);
        })
    }
    fetchRecords();
})