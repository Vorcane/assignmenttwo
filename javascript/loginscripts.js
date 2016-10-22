
function login() {
    "use strict";
    $('input#login-submit').on('click', function () {
        var username = $('input#username').val(),
            password = $('input#password').val();
        
        if (($.trim(username) !== '') && ($.trim(password) !== '')) {
            $.post('login.php', {username: username, password: password}, function (data) {
                $('div#login-data').text(data);
            });
            checklogin();
        }
    });
}

function checklogin() {
    "use strict";
    var cookiename = "sessionID=",
        cookiearray = document.cookie.split(';'); //Splits the cookie into a sub array
    $(document).ready(function () {
        for (var i = 0; i <cookiearray.length; i++) {
            var cookie = cookiearray[i]; //Gets the individual cookie from the array
            while (cookie.charAt(0)==' ') { //Clears blank space from the value
                cookie = cookie.substring(1);
            }
            if (cookie.indexOf(cookiename) == 0) { //If cookie exists do this
                //sends only value not the name of the cookie
                //$('div#login-form').text("I got into the if statement"); // Gets here
                var sessionID = cookie.substring(name.length+10,cookie.length);
                $.post('checklogin.php', {sessionID: sessionID}, function(data) { 
                    retdata = data.split(';');
                    if (retdata[0]==true) {
                        $('div#login-form').html(
                            "<h3>Welcome " + retdata[1] + "</h3>"
                            + "<button onclick='deletecookie(\x22sessionID\x22)' type='button'>Log out</button>"


                        ); //removes the login forms and replaces it with a greeting message, logout button and link to user account page
                    }
                })

            } else { //If cookie doesnt exist do this\

                } 
        }
    });
}

function deletecookie(name) {
    var d = new Date();
    document.cookie = name + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';    
}