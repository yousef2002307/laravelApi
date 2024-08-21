<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    test 2222222



    <script>

        function getCookie(name){
            const value = `; ${document.cookie}`;
            const parts = value.split(`; ${name}=`);
            if (parts.length === 2) {
                return parts.pop().split(';').shift();
            }
        }
    
        function request(url, options){
            // get cookie
            const csrfToken = getCookie('XSRF-TOKEN');
            console.log(csrfToken);
            return fetch(url, {
                headers: {
                    'content-type': 'application/json',
                    'accept': 'application/json',
                    'X-XSRF-TOKEN': decodeURIComponent(csrfToken),
                },
                credentials: 'include',
                ...options,
            })
        }
    
        function logout(){
            return request('/logout', {
                method: 'POST'
            });
        }
    
        function login(){
            return request('/login', {
                method: "POST",
                body: JSON.stringify({
                    email: 'luz72@example.net',
                    'password': 'password'
                })
            })
        }
    
        fetch('/sanctum/csrf-cookie', {
            headers: {
                'content-type': 'application/json',
                'accept': 'application/json'
            },
            credentials: 'include'
        })
        .then(() => {
            return login();
        })
        .then(() => request('/api/v1/users')).catch(error => console.error('Error:', error)); // Add this line to catch and log errors
    
    </script>
    
</body>
</html>