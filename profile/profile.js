$(function () { 
    if(localStorage.getItem("id") == "null"){
        $(location).prop("href","/login/");
    }
    $("#log_out").click(function(e){
        localStorage.setItem("id", "null");
        $(location).prop("href", "/login/");
    });
    $.ajax({ 
           type: 'post',
            url: 'load_profile.php',
            data:{
                "id" : localStorage.getItem("id")
            },
            success: function (response) {
                console.log(response);
                $('input[name="fullname"]').val(response["fullname"]);
                $('input[name="email"]').val(response["mail"]);
                $('input[name="email"]').prop('readonly', true);
                $('input[name="password"]').val(response["password"]);
                if(response["found"]){
                    var data = response["data"];
                    $('input[name="phno"]').val(data["phno"]);
                    $('input[name="age"]').val(data["age"]);
                    $('input[name="dob"]').val(data["dob"]);
                    $('input[name="address"]').val(data["address"]);
                    $('input[name="district"]').val(data["district"]);
                    $('input[name="state"]').val(data["state"]);
                    $('input[name="country"]').val(data["country"]);
                    $('input[name="pin"]').val(data["pin"]);
                }
            },
            error: function(){
                alert("error loading data");
            }
    });
    $('form').on('submit', function(event){
        event.preventDefault();
        $.ajax({
            type: "post",
            url: 'profile.php',
            data: $('form').serialize(),
            success: function(data){
                console.log(data);
            },
            error: function(data){
                console.log(data);
            }
        });
    });
});
