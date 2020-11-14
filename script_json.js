let submit = document.getElementById('result')
submit.addEventListener('click',function(){
    let xhr = new XMLHttpRequest();

    let name = document.getElementById("name").value;
    let phone = document.getElementById("phone").value;


    let json = JSON.stringify({
        method: "addUser",
        name: name,
        phone: phone
    });

    xhr.open("POST", '/untitled/index.php')
    xhr.setRequestHeader('Content-type', 'application/json; charset=utf-8');

    xhr.send(json);

    xhr.onload = function() {
        document.getElementById("test").innerHTML = xhr.response;
    };
})


