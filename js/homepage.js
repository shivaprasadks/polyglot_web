//using vanilla js for the better understanding
(function () {
    // private
    document.getElementById('pushMe').addEventListener('click',function(){
        let sourceCode = document.getElementById('sourceCode').value;
        let e = document.getElementById('langList'),
        langCode = e.options[e.selectedIndex].value;
        
      

       var url = 'http://localhost/getData.php';
        var remoteUrl='http://13.234.128.68/getData.php';

        // fetch('http://13.234.128.68/getData.php', {
        fetch(url, {
            method: 'post',
            credentials: "same-origin", 
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({source: sourceCode, lang: langCode})
            }).then(res=>res.text())
            .then(res => document.getElementById('myOutput').innerHTML =res);
    })
  }());