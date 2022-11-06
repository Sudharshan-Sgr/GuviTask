function func(){
    var name = document.getElementById("name").value;
    var emailid = document.getElementById("emailid").value;
    var password = document.getElementById("password").value;

    localStorage.setItem("name",name);
    localStorage.setItem("emailid",emailid);
    localStorage.setItem("password",password);

    localStorage.name = name;
    localStorage.emailid = emailid;
    localStorage.password = password;

}