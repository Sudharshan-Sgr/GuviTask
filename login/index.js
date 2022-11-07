 $(document).ready(function(){
            if(localStorage.getItem("id") != "null" && "id"  in localStorage){
                $(location).prop("href","/profile");
            }
            $('form').on("submit", function(e){
                e.preventDefault();
                $.ajax({
                    type:"post",
                    url: "login.php",
                    data : $('form').serialize(),
                    success : function(response){
                        localStorage.setItem("id", response["id"]);
                        $(location).prop("href", "/profile");
                    },
                    error: function(data){
                        alert("Authentication failed" + data["msg"]);
                    }
                })
            });
        });